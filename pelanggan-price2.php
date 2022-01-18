<?php
include('config.php');
include('helper.php');

if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$id = $_SESSION["id"];
$select = "SELECT * FROM package WHERE jenis_service = 'Birthday'";
$query = mysqli_query($conn, $select);

if (isset($_POST['order'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $kontak = $_POST['kontak'];
  $total_harga = $_POST['total_harga'];
  $harga = $_POST['harga'];
  $progress = 0;
  $material = $_POST['material'];
  $quantity = $_POST['quantity'];

  $query = mysqli_query($conn, "INSERT INTO service_order(user_id,email,name,kontak,service_detail,progress,qty,harga,total_harga) VALUES('$id','$email','$name','$kontak','$material','$progress','$quantity','$harga','$total_harga')");
  header("location:./pelanggan-order.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Birthday Package Pricelist</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
  }

  .modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .5;
  }
</style>

<body style="background-image: url(ballons.jpg);background-size:cover;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed top">
    <a class="navbar-brand" href="#"><img src="SeeULetter! logo.png" alt="" width="100px"></a>
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav" style="padding-right: 10%;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#package">Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contactus">Contact Us</a>
          </li>
          <?php if (!isset($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="btn btn-primary" href="login.php">Login</a>
            </li>
          <?php else : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['username'] ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="pelanggan-order.php?">My Order</a></li>
                <li><a class="dropdown-item" href="logout.php?logout=true">Logout</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container" style="background-color: #00000099;background-size:cover;color:white;transform:translateY(20%);height: auto;padding-bottom:1%">
      <h2 align="center" style="padding-top: 3%;" mt-2>Birthday Package Pricelist</h2>
      <br><br>
      <table class="table" style="color: white;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Material</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($selects = mysqli_fetch_assoc($query)) :
          ?>
            <tr>
              <td scope="row"><?= $no++ ?></td>
              <td><?= $selects['material'] ?></td>
              <td><?= $selects['size'] ?></td>
              <td>
                <?= rupiah((int)$selects['price']) ?> / pcs
              </td>
              <td><button data-harga="<?= $selects['price'] ?>" data-material="<?= $selects['material'] ?>" type="button" class="btn btnOrder btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Beli</button>
              </td>
            </tr>

          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <div class="modal fade" data-backdrop="false" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal">Birthday Package Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <h1>Service Order</h1>
              <fieldset>
                <legend>1.Biodata</legend>
                <div class="mb-3">
                  <label>Email:</label>
                  <input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                  <label>Nama:</label>
                  <input type="text" id="name" name="name" value="" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Kontak:</label>
                  <input type="text" id="kontak" name="kontak" class="form-control">
                </div>
                <legend>2.Needs</legend>
                <div class="mb-3">
                  <label>Service Detail:</label>
                  <input type="text" readonly id="material" name="material" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Quantity:</label>
                  <input type="number" id="quantity" name="quantity" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Harga:</label>
                  <input type="number" id="harga" name="harga" value="sesuai harga yang ditampilin di tabel" class="form-control" readonly>
                </div>
                <div class="mb-3">
                  <label>Total Harga:</label>
                  <input type="number" id="total_harga" name="total_harga" class="form-control" readonly>
                </div>
              </fieldset>
              <button type="submit" name="order" class="btn btn-primary">Order</button>
              <button type="button" name="cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </form>
          </div>
          <div class="modal-footer">
            <H3 style="padding-right: 7%;">Have a Nice Wedding/Birthday!</H3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    const btnOrder = document.getElementsByClassName('btnOrder');
    let harga = document.getElementById('harga');
    let total_harga = document.getElementById('total_harga');
    let quantity = document.getElementById('quantity');
    let material = document.getElementById('material');
    let harga_package = document.getElementById('harga_package');

    Array.prototype.forEach.call(btnOrder, function(element) {
      element.addEventListener("click", function() {
        harga_package = element.getAttribute("data-harga");
        harga.value = harga_package
        material.value = element.getAttribute("data-material");

        quantity.addEventListener('keyup', () => {
          total_harga.value = harga_package * quantity.value
        })
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>
<?php
include('config.php');
if ($_SESSION['admin'] != TRUE) {
  header('location:login.php');
}
$email = $_SESSION["email"];
$select = "SELECT * FROM service_order";
$query = mysqli_query($conn, $select);
if (isset($_GET['Id_hapus'])) {
  $idpesanan = $_GET['Id_hapus'];
  mysqli_query($conn, "DELETE FROM service_order WHERE id = '$idpesanan'");
  header("location: admin-order.php");
}

if (isset($_POST['update_progress'])) {
  $progress = $_POST['progress'];
  $id_order = $_POST['id_order'];
  mysqli_query($conn, "Update service_order set progress='$progress' where id='$id_order'");
  header("location: admin-order.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Service</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css">
  <!-- Icon -->
  <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons.css">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- About Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/about.css">

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script type="text/javascript">
    (function() {
      emailjs.init('user_Si1vNgkO5T0KHv80OQII6');
    })();
  </script>
  <script type="text/javascript">
    window.onload = function() {
      document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        this.contact_number.value = Math.random() * 100000 | 0;
        emailjs.sendForm('service_a2xisqe', 'template_3dsl76e', this)
          .then(function() {
            console.log('SUCCESS!');
            alert("Thank You, I'll Relpy ASAP")
          }, function(error) {
            console.log('FAILED...', error);
            alert("Sorry i think there is a little trouble")
          });
      });
    }
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed top">
    <a class="navbar-brand" href="#"><img src="SeeULetter! logo.png" alt="" width="100px"></a>
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav" style="padding-right: 10%;">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#package">Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contactus">Contact Us</a>
          </li>
          <?php if (!isset($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="btn btn-primary" href="login.php">Login</a>
            </li>
          <?php else : ?>
            <a class="btn btn-danger" href="logout.php?logout=true">Logout</a>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-top: 5%;">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Email</th>
          <th scope="col">Nama</th>
          <th scope="col">Kontak</th>
          <th scope="col">Service</th>
          <th scope="col">Progress</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($selects = mysqli_fetch_assoc($query)) :
        ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $selects['email'] ?></td>
            <td><?= $selects['name'] ?></td>
            <td><?= $selects['kontak'] ?></td>
            <td><?= $selects['service_detail'] ?></td>
            <td>
              <?php if ($selects['progress'] > 0) : ?>
                <div class="progress mt-2">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $selects['progress'] ?>" style="width: <?= $selects['progress'] ?>%;" aria-valuemin="0" aria-valuemax="100">
                    <?= $selects['progress'] ?>%
                  </div>
                </div>
              <?php else : ?>
                Belum diproses
              <?php endif; ?>
            </td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $selects['id'] ?>">
                Update Progress
              </button>
              <a class="btn btn-danger" href="admin-order.php?Id_hapus=<?= $selects['id'] ?>">Hapus</a>
            </td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal<?= $selects['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $selects['service_detail'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                  <div class="modal-body">
                    <div class="mb-3">
                      <input type="hidden" name="id_order" value="<?= $selects['id'] ?>">
                      <label for="exampleInputEmail1" class="form-label">Progress</label>
                      <input name="progress" type="number" class="form-control" value="<?= $selects['progress'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_progress" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>
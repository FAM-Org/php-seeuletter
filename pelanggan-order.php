<?php
include('config.php');
$id = $_SESSION["id"];
$select = "SELECT * FROM service_order WHERE user_id='$id'";
$query = mysqli_query($conn, $select);
if (isset($_GET['id_hapus'])) {
  $idpesanan = $_GET['id_hapus'];
  mysqli_query($conn, "DELETE FROM service_order WHERE id = '$idpesanan'");
  $_SESSION['message'] = "Berhasil Hapus";
  header("location: pelanggan-order.php");
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

<body style="background-image: url(ballons.jpg);background-size:cover;">

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed top">
    <a class="navbar-brand" href="#"><img src="SeeULetter! logo.png" alt="" width="100px"></a>
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">

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
        </ul>
      </div>
    </div>
    <?php if (!isset($_SESSION['username'])) : ?>
      <a class="btn btn-primary me-5" href="login.php">Login</a>
    <?php else : ?>
      <div class="dropdown pe-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['username'] ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="pelanggan-order.php?">My Order</a></li>
          <li><a class="dropdown-item" href="logout.php?logout=true">Logout</a></li>
        </ul>
      </div>
    <?php endif; ?>
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
          <th scope="col">Status</th>
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
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $selects['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $selects['progress'] ?>%">
                  <?= $selects['progress'] ?>%
                </div>
              <?php else : ?>
                Belum diproses
              <?php endif; ?>
            </td>
            <td><a class="btn btn-danger" href="pelanggan-order.php?id_hapus=<?= $selects['id'] ?>">Hapus</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <footer class="fixed-bottom" style="background-color:white;height: 100px;">
    <center>
      <p style="font-size: larger;transform:translateY(120%);">SeeU Letter! by UrName</p>
    </center>
  </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>
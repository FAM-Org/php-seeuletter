<?php
include('config.php');
$email = $_SESSION["email"];
$select = "SELECT * FROM service_order WHERE Status = 'Menunggu'";
$query = mysqli_query($conn, $select);
if (isset($_GET['Id'])) {
  $idpesanan = $_GET['Id'];
  mysqli_query($conn, "DELETE FROM service_order WHERE Id = '$idpesanan'");
  $_SESSION['message'] = "Berhasil Hapus";
  header("location: Admin_Details.php");
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
            <td><?= $selects['Email'] ?></td>
            <td><?= $selects['Name'] ?></td>
            <td><?= $selects['Kontak'] ?></td>
            <td><?= $selects['Service_detail'] ?></td>
            <td><?= $selects['Status'] ?></td>
            <td>
              <a class="btn btn-primary" href="Done.php?Id=<?= $selects['Id'] ?>">Done!</a>
              <a class="btn btn-danger" href="Admin_Details.php?Id=<?= $selects['Id'] ?>">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>

</html>
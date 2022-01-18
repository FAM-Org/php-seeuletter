<?php
include('config.php');
include('helper.php');

if ($_SESSION['admin'] != TRUE) {
    header('location:login.php');
}

$id = $_SESSION["id"];
$select = "SELECT * FROM package WHERE jenis_service = 'Wedding'";
$query = mysqli_query($conn, $select);
if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $material = $_POST['material'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    $query = mysqli_query($conn, "UPDATE package set  material= '$material', size= '$size', price='$price' where id = '$id' ");

    header("location:./admin-price1.php");
}
if (isset($_POST['confirm'])) {
    $material = $_POST['material'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    $query = mysqli_query($conn, "INSERT INTO package (material, size, price, jenis_service) VALUES ('$material','$size', '$price', 'Wedding')");

    header("location:./admin-price1.php");
}
if (isset($_GET['Id_hapus'])) {
    $idpesanan = $_GET['Id_hapus'];
    mysqli_query($conn, "DELETE FROM package WHERE id = '$idpesanan'");
    header("location: admin-price1.php");
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


    <div class="container">
        <h2 align="center" style="padding-top: 3%;" mt-2>Wedding Package Pricelist</h2>
        <br><br>
        <button class="btn btn-primary mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modaltambah">Tambah Package</button>
        <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaledit">Wedding Package Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <h1>Package Edit</h1>
                            <fieldset>

                                <div class="mb-3">
                                    <label>Material:</label>
                                    <input type="text" id="material" name="material" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Size:</label>
                                    <input type="text" id="size" name="size" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Price:</label>
                                    <input type="number" id="price" name="price" class="form-control">
                                </div>
                            </fieldset>
                            <button type="submit" name="confirm" class="btn btn-primary">Confirm</button>
                            <button type="button" name="cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table" style="color: white;">
            <thead class="bg-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Material</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody style="background-color: rgba(94, 94, 94, 0.72);">
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
                        <td><button type="button" class="btn btnOrder btn-primary" data-bs-toggle="modal" data-bs-target="#modaledit<?= $selects['id'] ?>">Edit</button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="admin-price1.php?Id_hapus=<?= $selects['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modaledit<?= $selects['id'] ?>" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modaledit">Wedding Package Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <h1>Package Edit</h1>
                                        <fieldset>
                                            <input type="text" id="id" name="id" value="<?= $selects['id'] ?>" hidden>
                                            <div class="mb-3">
                                                <label>Material:</label>
                                                <input type="text" id="material" name="material" value="<?= $selects['material'] ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Size:</label>
                                                <input type="text" id="size" name="size" value="<?= $selects['size'] ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Price:</label>
                                                <input type="text" id="price" name="price" value="<?= $selects['price'] ?>" class="form-control">
                                            </div>
                                        </fieldset>
                                        <button type="submit" name="edit" class="btn btn-primary">Save</button>
                                        <button type="button" name="cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
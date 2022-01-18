<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wedding Package Pricelist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="index.css">
</head>

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
            <h2 align="center" style="padding-top: 3%;" mt-2>Wedding Package Pricelist</h2>
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
                    <tr>
                        <td scope="row">1</td>
                        <td>Art Paper</td>
                        <td>21 x 30 cm</td>
                        <td>Rp. 5.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Beli</button></td>
                    </tr>

                    <tr>
                        <td scope="row">2</td>
                        <td>Art Paper</td>
                        <td>22 x 22 cm</td>
                        <td>Rp. 7.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Beli</button></td>
                    </tr>

                    <tr>
                        <td scope="row">3</td>
                        <td>Samson Craft</td>
                        <td>21 x 30 cm</td>
                        <td>Rp. 8.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Edit</button></td>
                    </tr>

                    <tr>
                        <td scope="row">4</td>
                        <td>Samson Craft</td>
                        <td>22 x 22 cm</td>
                        <td>Rp. 10.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Edit</button></td>
                    </tr>

                    <tr>
                        <td scope="row">1</td>
                        <td>Art Paper</td>
                        <td>21 x 30 cm</td>
                        <td>Rp. 5000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Edit</button></td>
                    </tr>

                    <tr>
                        <td scope="row">1</td>
                        <td>Art Carton</td>
                        <td>21 x 30 cm</td>
                        <td>Rp. 12.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Edit</button></td>
                    </tr>

                    <tr>
                        <td scope="row">1</td>
                        <td>Art Carton</td>
                        <td>22 x 22 cm</td>
                        <td>Rp. 15.000 / Pcs</td>
                        <td><button class="btn btn-primary" id="submit" data-bs-toggle="modal" data-bs-target="#modalbeli">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="modalbeli" tabindex="-1" aria-labelledby="modalbeli" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalbeli">Wedding Package Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <h1>Package Edit</h1>
                            <fieldset>
                                <div class="mb-3">
                                    <label>Material:</label>
                                    <input type="text" id="email" name="email" value="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Size:</label>
                                    <input type="text" id="username" name="username" value="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Price:</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control">
                                </div>
                            </fieldset>
                            <button type="submit" name="order" class="btn btn-primary">Save</button>
                            <button type="button" name="cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeeU Letter!</title>
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

    <section id="home" style="background-color: #00000099;background-size:cover;height: 800px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container jumbotron" style="text-align: center;transform:translateY(5%);">
                <h1 class="display-4" style="color: white;padding-bottom: 3%">SeeU Letter!</h1>
                <iframe style="height: 500px; width: 1000px" src="https://www.youtube.com/embed/X8X2IAMcORQ?rel=0&amp;autoplay=1&amp;controls=1&amp;showinfo=0&amp;mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="lead" style="color: white;padding-top: 3%">Exclusive invitation letters with 100+ attractive designs and can be shared with those who are farthest away. Keep in touch with your loved ones!</p>
            </div>
        </div>
    </section>

    <section id="package" style="background-color: #00000099;background-size:cover;">
        <div class="container" style="padding-top: 0%;">
            <h2 class="text-center display-5" style="color: white;">Packages</h2>
        </div>
        <div class="container" style="width: 40%;">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="card" style="width: 17rem;">
                        <img src="card1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Wedding Package</p>
                            <a class="btn btn-info tombol" href="pelanggan-price1.php"> Pricelist</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 17rem;">
                        <img src="card 2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> Birthday Package </p>
                            <a class="btn btn-info tombol" href="pelanggan-price2.php"> Pricelist </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </section>

    <section id="contactus" class="section-padding" style="background-color: #00000099;background-size:cover;">
        <div class="contact-form">
            <div class="container">
                <div class="row contact-form-area wow fadeInUp">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="contact-block">
                            <h2 style="color: white;">Contact Us</h2>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="hidden" name="contact_number">
                                            <input type="text" class="form-control" id="name" name="user_name" placeholder="Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="text" placeholder="Email" id="email" class="form-control" name="user_email" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group mb-3">
                                            <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="5" data-error="Write your message" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-primary" id="submit" type="submit">Send Message</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-3">
            <div>
                <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14517.575936787198!2d112.75451599042498!3d-7.254254508290915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9745f4723db%3A0xea981d415f7a1ffa!2sKaza%20Mall%20Surabaya!5e0!3m2!1sen!2sid!4v1642487847908!5m2!1sen!2sid"></object>
            </div>
        </div>
    </section>
    <footer style="background-color:white;height: 100px;">
        <center>
            <p style="font-size: larger;transform:translateY(120%);">SeeU Letter! by UrName</p>
        </center>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
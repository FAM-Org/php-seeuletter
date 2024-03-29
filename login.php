<?php
include('config.php');
if (isset($_POST['Login'])) {
    Login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <body>
        <div class="container" style="position:absolute;left:38%;top:20%;width: 400px;height: 500px;box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);padding: 40px;background: rgb(255, 248, 255);">
            <h4 align="center"><a class="navbar-brand" href="index.php#home"><img src="SeeULetter! logo.png" alt="" width="100px"></a></h4>
            <form action="" method="POST">
                <div class="form-group mb-2">
                    <label for="Name">Name</label f>
                    <input type="text" class="form-control" id="Username" name="Username" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="Password">Password</label for="Password">
                    <input type="password" class="form-control" id="Password" name="Password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                </div>
                <div class=" mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">
                        <label class="form-check-label" for="rememberme"> Remember me</label>
                    </div>
                </div>
                <button type="submit" name="Login" class="btn btn-primary" button>Login</button>
            </form>
            <hr class="mt-4">
            <div>
                <p class="text-center mb-0">Have not account yet? Sign-Up <a href="registrasi.php">here</a></p>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
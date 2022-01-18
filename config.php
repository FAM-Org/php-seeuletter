<?php
if (!isset($_SESSION)) {
    session_start();
}

$dbhost = "localhost";
$dbuser = "root";
$dbname = "web profile";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "<script>
            alert('Failed Connect into Database')'
            </script>";
}


function register($request)
{
    global $conn;
    $email = $request['email'];
    $username = $request['username'];
    $password = mysqli_real_escape_string($conn, $request['password']);

    $emailcheck = "SELECT email FROM user WHERE email='$email'";
    $select = mysqli_query($conn, $emailcheck);
    
    if (!mysqli_fetch_assoc($select)) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user VALUES ('$email', '$username', '$password', '', '')";
        mysqli_query($conn, $query);
        
        $_SESSION['registered'] = 'Berhasil registrasi, silahkan login';

        header("Location: login.php");
        exit();
    }
    $_SESSION['message'] = 'Email anda sudah pernah terdaftar!';

    header("Location: login.php");
    exit();
}

function Login($request)
{
    global $conn;

    $username = $request['username'];
    $password = $request['password'];

    $usernamecheck = "SELECT * FROM user WHERE Username='$username'";
    $select = mysqli_query($conn, $usernamecheck);

    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_assoc($select);
        $admin = $result['Admin'];
        if (password_verify($password, $result['Password'])) {
            $_SESSION['id'] = $result['Id'];
            $_SESSION['username'] = $result['Username'];
            $_SESSION['email'] = $result['Email'];

            $_SESSION['message'] = "Berhasil Login";

            if (isset($_POST['rememberme'])) {
                setcookie('username', $username, strtotime('+3 days'), '/');
                setcookie('password', $password, strtotime('+3 days'), '/');
            }
            if ($admin == 1):
                header("Location: admin-order.php");
            else :
                header("Location: index.php");
            endif;
           
            exit();
        } else {
            $_SESSION['message'] = "Password Salah";
            header("Location: login.php");
            exit();
        }
    }
    $_SESSION['message'] = 'Gagal Login';

    header("Location: login.php");
    exit();
}

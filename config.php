<?php
if (!isset($_SESSION)) {
    session_start();
}

$dbhost = "localhost";
$dbuser = "root";
$dbname = "SeeU Letter";
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

    $emailcheck = "SELECT email FROM users WHERE email='$email'";
    $select = mysqli_query($conn, $emailcheck);

    if (!mysqli_fetch_assoc($select)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES ('','$email', '$username', '$password', '')";
        mysqli_query($conn, $query);
        header("Location: login.php");
        exit();
    }

    header("Location: login.php");
    exit();
}

function Login($request)
{
    global $conn;

    $username = $request['username'];
    $password = $request['password'];

    $usernamecheck = "SELECT * FROM users WHERE Username='$username'";
    $select = mysqli_query($conn, $usernamecheck);

    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_assoc($select);

        if (password_verify($password, $result['Password'])) {
            $_SESSION['id'] = $result['Id'];
            $_SESSION['username'] = $result['Username'];
            $_SESSION['email'] = $result['Email'];
            $_SESSION['admin'] = $result['Admin'];


            if (isset($_POST['rememberme'])) {
                setcookie('username', $username, strtotime('+3 days'), '/');
                setcookie('password', $password, strtotime('+3 days'), '/');
            }
            if ($_SESSION['admin'] == 1) :
                header("Location: admin-order.php");
            else :
                header("Location: index.php");
            endif;

            exit();
        } else {

            header("Location: login.php");
            exit();
        }
    }

    header("Location: login.php");
    exit();
}

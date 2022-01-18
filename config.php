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
    $email = $request['Email'];
    $username = $request['Username'];
    $password = mysqli_real_escape_string($conn, $request['Password']);

    $emailcheck = "SELECT email FROM users WHERE email='$email'";
    $select = mysqli_query($conn, $emailcheck);

    if (!mysqli_fetch_assoc($select)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users VALUES ('','$username','$email',  '$password', '0')";
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

    $username = $request['Username'];
    $password = $request['Password'];

    $usernamecheck = "SELECT * FROM users WHERE username='$username'";
    $select = mysqli_query($conn, $usernamecheck);


    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_assoc($select);

        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['admin'] = $result['admin'];


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

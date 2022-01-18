<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] = "Berhasil Logout";
header("location:Login.php");
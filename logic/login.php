<?php
include_once("./db_connect.php");
$username = $_POST['username'];
$password = $_POST['password'];

$queryUser = "SELECT * FROM users WHERE username='$username' LIMIT 1";

$resultUser = mysqli_query($conn, $queryUser);

if (mysqli_num_rows($resultUser) == 1) {

    $row = mysqli_fetch_assoc($resultUser);

    session_start();

    if ($row['password'] == $password) {
        $_SESSION['name'] = $row['name'];
        echo "ok";
    } else {
        echo "Incorrent username and/or password";
    }
} else {
    echo "User does not exist";
}
?>
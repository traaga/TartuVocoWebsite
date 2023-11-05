<?php
include_once("./db_connect.php");
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$queryUser = "SELECT username FROM users WHERE username='$username' LIMIT 1";
$resultUser = mysqli_query($conn, $queryUser);

if (mysqli_num_rows($resultUser) == 0) {
    $queryAdd = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    $resultAdd = mysqli_query($conn, $queryAdd);

    if ($resultAdd === TRUE) {
        echo "registered";
    } else {
        echo "Error adding to database";
    }
} else {
    echo "1";
}
?>
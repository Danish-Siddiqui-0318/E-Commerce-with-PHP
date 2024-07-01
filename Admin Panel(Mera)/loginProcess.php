<?php

require_once ('db.php');
$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($connection, $query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['user'] = $row;
    header('location:index.php');
} else {
    header('location:login.php?msg=Login Failed');
}
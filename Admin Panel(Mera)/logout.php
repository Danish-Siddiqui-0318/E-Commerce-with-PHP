<?php

session_start();
$result = session_destroy();
if ($result) {
    header('location:login.php');
}
?>
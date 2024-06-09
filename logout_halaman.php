<?php 
session_start();

session_destroy();

header('location: login_halaman.php');

exit();
?>
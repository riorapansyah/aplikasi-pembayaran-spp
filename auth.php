<?php 
session_start();

if (!isset($_SESSION['login_user'])) {
    header('location: login_halaman.php');
    exit;
}

include('./component/navbar.php');
include('./component/header.php');
?>
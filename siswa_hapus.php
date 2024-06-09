<?php
    $koneksi = require 'koneksi.php';

    session_start();

    $id = $_GET['nisn'];

    $sql ="DELETE FROM siswa WHERE nisn= :id";
    $delete = $koneksi->prepare($sql);
    $delete->bindParam(':id', $id, PDO::PARAM_INT);

    if($delete->execute()){
        header('location:siswa_halaman.php');
    }
?>
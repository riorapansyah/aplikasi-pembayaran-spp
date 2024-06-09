<?php 
$koneksi = require('koneksi.php');

session_start();

$query = "DELETE FROM kelas WHERE id_kelas = :id";
$delete = $koneksi->prepare($query);
$delete->bindparam(':id', $_GET['id']);

if($delete->execute()){
    header("location:kelas_halaman.php");
}
?>
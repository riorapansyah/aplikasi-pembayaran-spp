<?php 
$koneksi = require('koneksi.php');

session_start();

$id = $_GET['id'];

$query = "DELETE FROM petugas WHERE id_petugas = :id_petugas";
$delete = $koneksi->prepare($query);
$delete->bindParam(':id_petugas', $id, PDO::PARAM_INT);

if($delete->execute()){
  header("location:petugas_halaman.php");
}
?>
<?php 
$koneksi = require('koneksi.php');

session_start();

$query = "DELETE FROM spp WHERE id_spp = :id";
$delete = $koneksi->prepare($query);
$delete->bindparam(':id', $_GET['id'], PDO::PARAM_INT);

if($delete->execute()){
    header("location:spp_halaman.php");
}
?>
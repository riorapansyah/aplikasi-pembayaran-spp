<?php 
$koneksi = require('koneksi.php');

$password = md5($_POST['password']);

 $query = "UPDATE petugas SET username = :username, password = :password, nama_petugas = :nama_petugas, level = :level WHERE id_petugas = :id_petugas";
 $update = $koneksi->prepare($query);
 $update->bindParam(':username', $_POST['username']);
 $update->bindParam(':password', $password);
 $update->bindParam(':nama_petugas', $_POST['nama_petugas']);
 $update->bindParam(':level', $_POST['level']);
 $update->bindParam(':id_petugas', $_POST['id_petugas']);

 if($update->execute()){
    echo "<script>alert('berhasil mengedit data'); document.location.href = 'petugas_halaman.php';</script>";
 } else{
    echo "<script>alert('gagal mengedit data')</script>";
 }
?>
<?php 
$host = 'localhost';
$db = 'ukk_p1_2023';
$user ='root';
$password ='password123';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

 try {
    $pdo =new PDO($dsn, $user, $password);

    if ($pdo) {
        echo "<script>console.log('koneksi database berhasil')</script>";
    }

 } catch (PDOException) {
    echo "<script>console.log('koneksi databse gagal')</script>";
 }

 return $pdo;
?>
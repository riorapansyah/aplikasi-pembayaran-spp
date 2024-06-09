<?php
$koneksi = require("koneksi.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT id_petugas, level FROM petugas WHERE username = ? and password = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$myusername, md5($mypassword)]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id_petugas = $result['id_petugas'];
        $level = $result['level'];

        $_SESSION['login_user'] = $myusername;
        $_SESSION['level'] = $level;

        if ($level == 'admin') {
            echo '<script>
            alert("Selamat Datang ' . $myusername . ' (Admin)");
            window.location.href="index.php";
            </script>';
        } elseif ($level == 'petugas') {
            echo '<script>
            alert("Selamat Datang ' . $myusername . ' (Petugas)");
            window.location.href="index.php";
            </script>';
        } elseif ($level == 'siswa') {
            echo '<script>
            alert("Selamat Datang ' . $myusername . ' (Siswa)");
            window.location.href="index.php";
            </script>';
        }
    } else {
        $error = "Username / Password kamu salah, Tolong coba lagi ya";
        echo '<script>
               alert("' . $error . '");
               window.location.href="login_halaman.php";
               </script>';
        die();
    }
}
?>

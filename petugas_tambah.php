<?php 
include('koneksi.php');
include('auth.php');
$koneksi = require('koneksi.php');

if (isset($_POST["tambah_petugas"])) {
    proses_tambah_petugas($_POST);
}
function proses_tambah_petugas($data){
    global $koneksi;

    $query = "INSERT INTO petugas VALUES (null,:username, :passowrd, :nama_petugas, :level)";
    $stmt = $koneksi->prepare($query);
    $stmt->execute([
        ':username' => $data['username'],
        ':password' => md5($data['password']),
        ':username' => $data['nama_Petugas'],
        ':username' => $data['level'],
    ]);

    if(!$stmt){
        echo "<script>
        alert('data petugas gagal ditambah!');
        document.location.href = 'petugas_tambah.php';
        </script>";
    } else {
        echo "<script>
        alert('data petugas berhasil ditambah!');
        document.location.href = 'petugas_halaman.php';
        </script>";
    }
}
?>

<body>
    <div class="container-fluid p-5 bg-light h-100">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Tambah Petugas</h3>
                    </div>
                    <div class="">
                        <a href="petugas_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="m-2">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Nisn Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Nama Petugas</label>
                        <input type="text" name="nama_petugas" id="" class="form-control" placeholder="masukkan Nis Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="masukkan nama siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Level</label>
                        <select name="level" id="" type="text" class="form-control">
                            <option>Level</option>
                            <option value="siswa">Siswa</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex gap-3 justify-content-center" name="tambah_petugas">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>
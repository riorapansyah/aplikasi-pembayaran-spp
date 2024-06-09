<?php 
$koneksi = require('koneksi.php');
include("auth.php");
?>

<body>
    <div class="container-fluid p-5 bg-light h-100">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Edit Petugas</h3>
                    </div>
                    <div class="">
                        <a href="petugas_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form method="post" action="petugas_aksi_edit.php">
						<?php
							$data = "SELECT * FROM petugas WHERE id_petugas = ".$_GET['id'];
							$petugas = $koneksi->query($data);
							while($d = $petugas->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="mb-3">
							<label class="p-2">Username</label>
							<input type="text" class="form-control" name="username" required="" value="<?php echo $d['username']; ?>" placeholder="Masukan nama anda">
							<input type="hidden" name="id_petugas" value="<?php echo $d['id_petugas']; ?>">
						</div>
						<div class="mb-3">
							<label class="p-2">New Password</label>
							<input type="Password" class="form-control" name="password" required="" value="" placeholder="Masukan email anda">
						</div>
                        <div class="mb-3">
							<label class="p-2">Nama Petugas</label>
							<input type="text" class="form-control" name="nama_petugas" required="" value="<?php echo $d['nama_petugas']; ?>" placeholder="Masukan email anda">
						</div>
						<div class="mb-3">
							<label class="p-2">Level</label>
							<select class="form-control" name="level">
								<option value="" selected="" disabled=""> Status </option>
								<option value="admin" <?php echo $d['level'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
								<option value="petugas" <?php echo $d['level'] === 'petugas' ? 'selected' : ''; ?>>Petugas</option>
								<option value="siswa" <?php echo $d['level'] === 'siswa' ? 'selected' : ''; ?>>siswa</option>
							</select>
						</div>
							<button type="submit" class="btn btn-block btn-primary">Edit</button>
						</div>
						<?php } ?>
					</form>
            </div>
        </div>
    </div>
</body>
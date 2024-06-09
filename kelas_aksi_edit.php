 <?php
 $koneksi = require('koneksi.php');

 $query = "UPDATE kelas SET nama_kelas = :nama_kelas, kompetensi_keahlian = :kompetensi_keahlian WHERE id_kelas = :id_kelas";
 $update = $koneksi->prepare($query);
 $update->bindparam(':nama_kelas', $_POST['nama_kelas']);
 $update->bindparam(':kompetensi_keahlian', $_POST['kompetensi_keahlian']);
 $update->bindparam(':id_kelas', $_POST['id_kelas'], PDO::PARAM_INT);


 if($update->execute()){
    echo "<script>
    alert('berhasil mengedit data');
    document.location.href = 'kelas_halaman.php';
    </script>";
 }
 ?>
<?php 
session_start();
include("koneksi.php");

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Tambah Data</title>
</head>

<body>

<h2>Tambah Siswa Baru</h2>

<form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>NIS:</label><br>
    <input type="text" name="nis" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>alamat:</label><br>
    <input type="alamat" name="alamat"><br><br>

    <button type="submit" name="submit">Simpan Data</button>
    <a href="index.php">Kembali</a>
</form>

<?php
if (isset($_POST['submit'])) {

    $nama  = $_POST['nama'];
    $nis   = $_POST['nis'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($koneksi,"INSERT INTO siswa (nama, nis, email, alamat)VALUES ('$nama', '$nis', '$email','$alamat')");

    if ($insert) {
        echo "<script>alert('Data berhasil disimpan');
        window.location='index.php';</script>";
    }
}
?>
</body>
</html>
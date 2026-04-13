<?php
include('koneksi.php');

session_start();
if ($_SESSION['role'] != 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>"><br><br>

    <label>NIS:</label><br>
    <input type="text" name="nis" value="<?= $data['nis']; ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $data['email']; ?>"><br><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= $data['alamat']; ?>"><br><br>

    <button type="submit" name="update">Perbarui</button>
    <a href="index.php">Batal</a>
</form>

<?php
if (isset($_POST['update'])) {

    $nama  = $_POST['nama'];
    $nis   = $_POST['nis'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($koneksi,
        "UPDATE siswa SET 
            nama='$nama', 
            nis='$nis', 
            email='$email',
            alamat='$alamat' 
        WHERE id='$id'"
    );

    if ($update) {
        echo "<script>
                alert('Data berhasil diupdate');
                window.location='index.php';
            </script>";
    }
}
?>

</body>
</html>
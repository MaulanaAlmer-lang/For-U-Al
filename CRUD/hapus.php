<?php
include('koneksi.php');

session_start();
if ($_SESSION['role'] != 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM siswa WHERE id='$id'");

if ($delete) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>
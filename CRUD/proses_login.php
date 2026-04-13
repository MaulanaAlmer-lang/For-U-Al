<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$data  = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {

    // simpan session
    $_SESSION['login']    = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role']; // TAMBAHAN

    // redirect berdasarkan role
    if ($data['role'] == 'admin') {
        header("Location: index.php");
    } else {
        header("Location: user.php");

    }
    exit;

} else {
    echo "Login gagal";
}
?>

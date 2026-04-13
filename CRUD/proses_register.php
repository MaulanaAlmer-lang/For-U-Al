<?php
include "koneksi.php";

$username  = $_POST['username'];
$password  = $_POST['password'];
$password2 = $_POST['password2'];

// role dari form, default user kalau tidak ada
$role = isset($_POST['role']) ? $_POST['role'] : 'user';

# 1. Cek password sama
if ($password !== $password2) {
    echo "Password tidak sama";
    exit;
}

# 2. Cek username sudah ada atau belum
$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

if (mysqli_num_rows($cek) >0 ) {
    $message = " <p style = 'color:red;'>Username sudah terdaftar!</p>";
} else {

# 3. Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$query= "INSERT INTO users (username, password, role) VALUES ('$username', '$password_hash', '$role')";
# 4. Simpan ke database (tambah role)
if ( mysqli_query($koneksi,$query)) {
  $message = " <p style = 'color:green;'>Registrasi Berhasi;</p>";
}

echo "Registrasi berhasil, silakan login";
}
?>

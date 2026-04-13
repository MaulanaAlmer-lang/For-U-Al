<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>

<h2>Form Registrasi</h2>

<form action="proses_register.php" method="POST">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password</label><br>
    <input type="password" name="password2" required><br><br>

    <label>Role</label><br>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>


    <button type="submit">Daftar</button>
</form>

<a href="index.php">Kembali ke Login</a>

</body>
</html>

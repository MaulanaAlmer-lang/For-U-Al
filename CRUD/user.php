<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
include ('koneksi.php'); 
?>


<!DOCTYPE html>
<html lang="id">
    <head>
        <tittle>Sistem Data Siswa</tittle>
        <style>
            body{font-family:sans-serif; margin:40px;}
            table{width:100%; border-collapse:collapse margin-top:50px; }
            th, td{border:1px solid#ddd; padding:12px; text-align:left;}
            th{background-color:#f4f4f4;}
            .btn{padding:8px 12px; text-decoration:none; border-radius:4px; display: inline-block;margin-bottom: 15px;}
            .btn-logout{background:red; color:white; }
        </style>
    </head>
    <body>
        <h2>Daftar siswa</h2>
        <a href="logout.php" class="btn btn-logout">Logout</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Alamat</th>
               
            </tr>

            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
            $no = 1;
            while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$data['nama'];?></td>
                <td><?=$data['nis'];?></td>
                <td><?=$data['email'];?></td>
                <td><?=$data['alamat'];?></td>
                
            </tr>
            <?php }?>
        </table>
    </body>
</html>
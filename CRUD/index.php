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
            table{width:100%; border-collapse:collapse margin-top:20px;}
            th, td{border:1px solid#ddd; padding:12px; text-align:left;}
            th{background-color:#f4f4f4;}
            .btn{padding:8px 12px; text-decoration:none; border-radius:4px; display: inline-block;margin-bottom: 15px;}
            .btn-tambah{background:#28a745; color:white;}
            .btn-logout{background:red; color:white;}
            .btn-edit{background:#ffc107; color:black;}
            .btn-hapus{background:#dc3545; color:white;}
        </style>
    </head>
    <body>
        <h2>Daftar siswa</h2>
        <a href="tambah.php" class="btn btn-tambah">+ Tambah Siswa</a>

        <a href="logout.php" class="btn btn-logout">Logout</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
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
                <td>
                    
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <a href="edit.php?id=<?=$data['id'];?>" class="btn btn-edit">Edit</a>
                            <a href="hapus.php?id=<?=$data['id'];?>" class="btn btn-hapus" onclick="return confirm('Hapus data?')">Hapus</a>
                        <?php } else { ?>
                            <span>Hanya lihat</span>
                        <?php } ?>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <a href="tambah.php" class="btn btn-tambah">+ Tambah Siswa</a>
                        <?php } ?>
                    
                </td>
            </tr>
            <?php }?>
        </table>
    </body>
</html>
<?php
include 'db_connection.php';
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: login.php");
        exit();
    }
    include "header.php";
?>

;
$sql = "SELECT p.*, j.nama_jabatan FROM pegawai p JOIN jabatan j ON p.jabatan_id = j.id order by nama ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Data Pegawai</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>NO</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Telpon</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $n=1; ?>    
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $n?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['no_tlp'] ?></td>
                <td><?= $row['nama_jabatan'] ?></td>
                <td>
                    <a href="edit_pegawai.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_pegawai.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                </td>
            </tr>
            <?php $n++; ?>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="tambah_pegawai.php" class="btn btn-success mb-3">Tambah Pegawai</a> 
    

</div>
<?php
    include "daftar_jabatan.php";
?>
</body>
</html>

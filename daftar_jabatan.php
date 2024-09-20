<?php
include 'db_connection.php';  
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: login.php");
        exit();
    }
    include "header.php";
?>                                                                                                                                                                                                                                                              

$sql = "SELECT * FROM jabatan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jabatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Jabatan</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>NO</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $n = 1; ?>   
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $n ?></td>
                <td><?= $row['nama_jabatan'] ?></td>
                <td><?= number_format($row['gaji_pokok'], 2) ?></td>
                <td><?= number_format($row['tunjangan'], 2) ?></td>
                <td>
                    <a href="edit_jabatan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_jabatan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                </td>
            </tr>
            <?php $n++; ?>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="tambah_jabatan.php" class="btn btn-success mt-3">Tambah Jabatan</a>
    <br>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a> 
</div>
</body>
</html>

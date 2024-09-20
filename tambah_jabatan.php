<?php
include 'db_connection.php';  
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: login.php");
        exit();
    }
    include "header.php";
?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jabatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Form Tambah Jabatan</h2>
    <form action="proses_tambah_jabatan.php" method="post">
        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
        </div>
        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok</label>
            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
        </div>
        <div class="form-group">
            <label for="tunjangan">Tunjangan</label>
            <input type="number" class="form-control" id="tunjangan" name="tunjangan" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Jabatan</button>
    </form>
</div>
</body>
</html>

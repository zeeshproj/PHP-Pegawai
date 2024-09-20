<?php
include 'db_connection.php';
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit();
}
include "header.php";
?>

$id = $_GET['id'];

$sql = "SELECT * FROM pegawai WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Pegawai tidak ditemukan!";
    exit;
}

$pegawai = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Hapus Pegawai</h2>
    <p>Apakah Anda yakin ingin menghapus data pegawai berikut?</p>
    <ul>
        <li><strong>NIK:</strong> <?= $pegawai['nik'] ?></li>
        <li><strong>Nama:</strong> <?= $pegawai['nama'] ?></li>
        <li><strong>Alamat:</strong> <?= $pegawai['alamat'] ?></li>
        <li><strong>Jenis Kelamin:</strong> <?= $pegawai['jenis_kelamin'] ?></li>
        <li><strong>No Telpon:</strong> <?= $pegawai['no_tlp'] ?></li>
        <li><strong>Jabatan:</strong> 
            <?php
            // Ambil nama jabatan berdasarkan jabatan_id
            $jabatan_id = $pegawai['jabatan_id'];
            $result_jabatan = $conn->query("SELECT nama_jabatan FROM jabatan WHERE id = $jabatan_id");
            $jabatan = $result_jabatan->fetch_assoc();
            echo $jabatan['nama_jabatan'];
            ?>
        </li>
    </ul>
    <form action="proses_hapus_pegawai.php" method="post">
        <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

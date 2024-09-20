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
$pegawai = $result->fetch_assoc();

if (!$pegawai) {
    echo "Pegawai tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Pegawai</h2>
    <form action="proses_edit_pegawai.php" method="post">
        <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?= $pegawai['nik'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"><?= $pegawai['alamat'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $pegawai['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="no_tlp">No Telpon</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $pegawai['no_tlp'] ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan_id">
                <?php
                // Ambil data jabatan dari database
                $result_jabatan = $conn->query("SELECT id, nama_jabatan FROM jabatan");
                while ($jabatan = $result_jabatan->fetch_assoc()) {
                    $selected = $pegawai['jabatan_id'] == $jabatan['id'] ? 'selected' : '';
                    echo "<option value='{$jabatan['id']}' $selected>{$jabatan['nama_jabatan']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

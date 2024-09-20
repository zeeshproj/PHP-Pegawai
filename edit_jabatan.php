<?php
include 'db_connection.php';
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: login.php");
        exit();
    }
    include "header.php";
?>

// Mendapatkan ID jabatan dari URL
$id = $_GET['id'];

// Query untuk mengambil data jabatan berdasarkan ID
$sql = "SELECT * FROM jabatan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $jabatan = $result->fetch_assoc();
} else {
    echo "Jabatan tidak ditemukan!";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jabatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Jabatan</h2>
    <form action="proses_edit_jabatan.php" method="post">
        <input type="hidden" name="id" value="<?php echo $jabatan['id']; ?>">
        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?php echo $jabatan['nama_jabatan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok</label>
            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?php echo $jabatan['gaji_pokok']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tunjangan">Tunjangan</label>
            <input type="number" class="form-control" id="tunjangan" name="tunjangan" value="<?php echo $jabatan['tunjangan']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>

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
    <title>Hapus Jabatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Hapus Jabatan</h2>
    <p>Apakah Anda yakin ingin menghapus jabatan <strong><?php echo $jabatan['nama_jabatan']; ?></strong>?</p>
    <form action="proses_hapus_jabatan.php" method="post">
        <input type="hidden" name="id" value="<?php echo $jabatan['id']; ?>">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="daftar_jabatan.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

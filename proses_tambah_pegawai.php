<?php
include 'db_connection.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_tlp = $_POST['no_tlp'];
$jabatan_id = $_POST['jabatan_id'];


$sql = "INSERT INTO pegawai (nik, nama, alamat, jenis_kelamin, no_tlp, jabatan_id) 
        VALUES ('$nik', '$nama', '$alamat', '$jenis_kelamin', '$no_tlp', $jabatan_id)";

if ($conn->query($sql) === TRUE) {
    echo "Pegawai berhasil ditambahkan!";
    
    header("Location: daftar_pegawai.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

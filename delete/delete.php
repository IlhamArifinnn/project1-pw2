<?php
// Sertakan file dbkoneksi.php
require '../dbkoneksi.php';

$table = $_GET['table'];

// Cek apakah ID pasien ada dalam request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buat query untuk menghapus pasien berdasarkan ID
    $sql = "DELETE FROM $table WHERE id = :id";

    // Prepare statement
    $stmt = $dbh->prepare($sql);

    // Bind parameter
    $stmt->bindParam(':id', $id);

    // Eksekusi query
    $stmt->execute();

    // Redirect kembali ke halaman datapasien.php
    header("Location: ../data/data_{$table}.php");
} else {
    // Jika tidak ada ID dalam request, redirect ke halaman data_pasien.php
    header("Location: ../data/data_{$table}.php");
}

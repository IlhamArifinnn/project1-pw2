<?php
// Memanggil file koneksi database
require_once '../dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form
if (isset($_POST['submit'])) {
    $_tanggal = $_POST['tanggal'];
    $_berat_bdn = $_POST['berat'];
    $_tinggi_bdn = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_id_pasien = $_POST['pasien_id'];
    $_id_dokter = $_POST['dokter_id'];

    $data = [$_tanggal, $_berat_bdn, $_tinggi_bdn, $_tensi, $_keterangan, $_id_pasien, $_id_dokter];

    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel pasien
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Mempersiapkan statement PDO untuk eksekusi query
    $stmt = $dbh->prepare($sql);

    // Mengeksekusi statement dengan menyertakan data yang telah ditangkap dari form
    $stmt->execute($data);

    // Redirect ke halaman data_pasien.php setelah proses penyimpanan selesai
    header("Location: ../data/data_periksa.php");
}

<?php
// Memanggil file koneksi database
require_once '../dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form
if (isset($_POST['submit'])) {
    $_nama = $_POST['nama'];
    $_gender = $_POST['gender'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_kategori = $_POST['kategori'];
    $_telpon = $_POST['telpon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja_id = $_POST['unit_kerja_id'];

    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel paramedik
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Mempersiapkan statement PDO untuk eksekusi query
    $stmt = $dbh->prepare($sql);

    // Mengeksekusi statement dengan menyertakan data yang telah ditangkap dari form
    $stmt->execute([$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id]);

    // Redirect ke halaman data_paramedik.php setelah proses penyimpanan selesai
    header("Location: ../data/data_paramedik.php");
    exit; // Pastikan untuk keluar dari skrip setelah melakukan redireksi header
}

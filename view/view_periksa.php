<?php
//1. Sertakan koneksi database
require_once '../dbkoneksi.php';

//2. Periksa apakah ID pemeriksaan telah disertakan dalam URL
if (isset($_GET['id'])) {
    // Dapatkan ID pemeriksaan dari parameter URL
    $periksa_id = $_GET['id'];

    //3. Query untuk mendapatkan detail pemeriksaan berdasarkan ID
    $stmt = $dbh->prepare('SELECT * FROM periksa WHERE id = ?');
    $stmt->execute([$periksa_id]);
    $periksa = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Jika tidak ada ID pemeriksaan yang diberikan, redirect kembali ke halaman data_periksa.php
    header("Location: ../data_periksa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemeriksaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Detail Pemeriksaan</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td><?php echo $periksa['tanggal']; ?></td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td><?php echo $periksa['berat']; ?></td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td><?php echo $periksa['tinggi']; ?></td>
                            </tr>
                            <tr>
                                <th>Tensi</th>
                                <td><?php echo $periksa['tensi']; ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><?php echo $periksa['keterangan']; ?></td>
                            </tr>
                            <tr>
                                <th>Id Pasien</th>
                                <td><?php echo $periksa['pasien_id']; ?></td>
                            </tr>
                            <tr>
                                <th>Id Dokter</th>
                                <td><?php echo $periksa['dokter_id']; ?></td>
                            </tr>
                        </table>
                        <div class="card-footer text-center">
                            <a href="../data/data_periksa.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
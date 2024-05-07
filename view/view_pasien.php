<?php
//1. Sertakan koneksi database
require_once '../dbkoneksi.php';

//2. Periksa apakah ID pasien telah disertakan dalam URL
if (isset($_GET['id'])) {
    // Dapatkan ID pasien dari parameter URL
    $pasien_id = $_GET['id'];

    //3. Query untuk mendapatkan detail pasien berdasarkan ID
    $stmt = $dbh->prepare('SELECT * FROM pasien WHERE id = ?');
    $stmt->execute([$pasien_id]);
    $pasien = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Jika tidak ada ID pasien yang diberikan, redirect kembali ke halaman data_pasien.php
    header("Location: ../data_pasien.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Detail Pasien</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Kode</th>
                                <td><?php echo $pasien['kode']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $pasien['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $pasien['tmp_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $pasien['tgl_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $pasien['gender']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $pasien['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $pasien['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th>Kelurahan ID</th>
                                <td><?php echo $pasien['kelurahan_id']; ?></td>
                            </tr>
                        </table>
                        <div class="card-footer text-center">
                            <a href="../data/data_pasien.php" class="btn btn-secondary">Kembali</a>
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
<?php
//1. Sertakan koneksi database
require_once '../dbkoneksi.php';

//2. Periksa apakah ID paramedik telah disertakan dalam URL
if (isset($_GET['id'])) {
    // Dapatkan ID paramedik dari parameter URL
    $paramedik_id = $_GET['id'];

    //3. Query untuk mendapatkan detail paramedik berdasarkan ID
    $stmt = $dbh->prepare('SELECT * FROM paramedik WHERE id = ?');
    $stmt->execute([$paramedik_id]);
    $paramedik = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Jika tidak ada ID paramedik yang diberikan, redirect kembali ke halaman data_paramedik.php
    header("Location: ../data_paramedik.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Paramedik</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Detail Paramedik</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $paramedik['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $paramedik['gender']; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $paramedik['tmp_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $paramedik['tgl_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?php echo $paramedik['kategori']; ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?php echo $paramedik['telpon']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $paramedik['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th>Id Unit Kerja</th>
                                <td><?php echo $paramedik['unit_kerja_id']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="../data/data_paramedik.php" class="btn btn-secondary">Kembali</a>
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
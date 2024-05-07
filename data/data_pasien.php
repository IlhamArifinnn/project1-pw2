<?php
//1. sertakan koneksi database
require '../dbkoneksi.php';
include_once '../layout/header.php';
include_once '../layout/sidebar.php';


//2 Query untuk mendapatkan data pasien
$query = $dbh->query('SELECT * FROM pasien');

$nomor = 1;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



</head>

<body>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pasien</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <a href="../form/form_pasien.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                                <table class="table table-head-fixed table-responsive-lg table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <!-- <th>Kelurahan ID</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Loop menggunakan foreach untuk menampilkan data pasien
                                        foreach ($query as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $nomor++ . "</td>";
                                            echo "<td>" . $row['kode'] . "</td>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td>" . $row['tmp_lahir'] . "</td>";
                                            echo "<td>" . $row['tgl_lahir'] . "</td>";
                                            echo "<td>" . $row['gender'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['alamat'] . "</td>";
                                            // echo "<td>" . $row['kelurahan_id'] . "</td>";
                                            echo "<td>";
                                            echo "<a href='../view/view_pasien.php?id=" . $row['id'] . "' class='btn btn-success btn-sm mr-2 mb-2'>View</a>";
                                            echo "<a href='../update/update_pasien.php?id=" . $row['id'] . "' class='btn btn-info btn-sm mr-2 mb-2'>Update</a>";
                                            echo "<a href='#' onclick='return confirmDelete(" . $row['id'] . ")' class='btn btn-danger btn-sm mb-2'>Delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                            <!-- <div class="card-footer">
                                <p class="mb-0 fst-italic text-secondary">Keterangan kelurahan:</p>
                                <ul class="text-secondary">
                                    <li>1: Beji</li>
                                    <li>2: Pancoran Mas</li>
                                    <li>3: Cipayung</li>
                                    <li>4: Sukmajaya</li>
                                    <li>5: Cilodong</li>
                                    <li>6: Limo</li>
                                    <li>7: Cinere</li>
                                    <li>8: Tugu</li>
                                    <li>9: Tapos</li>
                                    <li>10: Sawangan</li>
                                    <li>11: Bojongsari</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function confirmDelete(id) {
            var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (result) {
                window.location = '../delete/delete.php?table=pasien&id=' + id;
            }
            return false;
        }
    </script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <?php
    include_once '../layout/footer.php';
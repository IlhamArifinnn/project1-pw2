<?php
// Sertakan koneksi database
require_once '../dbkoneksi.php';

// Query untuk mendapatkan data kelurahan
$query_kelurahan = $dbh->query('SELECT * FROM kelurahan');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form Pasien</title>
</head>

<body>
    <div class="container">
        <div class="wrapper shadow p-4 bg-body rounded-3">
            <h2 class="text-center">Form Pasien</h2>
            <form action="../proses/proses_pasien.php" method="POST">
                <div class="form-group row">
                    <label for="kode" class="col-3 col-form-label">Kode</label>
                    <div class="col-8">
                        <input required id="kode" name="kode" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-3 col-form-label">Nama</label>
                    <div class="col-8">
                        <input required id="nama" name="nama" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tmp_lahir" class="col-3 col-form-label">Tempat Lahir</label>
                    <div class="col-8">
                        <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_lahir" class="col-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-8">
                        <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-8">
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" name="gender" id="gender_laki" value="L">
                            <label class="form-check-label" for="gender_laki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" name="gender" id="gender_perempuan" value="P">
                            <label class="form-check-label" for="gender_perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-3 col-form-label">Email</label>
                    <div class="col-8">
                        <input required id="email" name="email" type="email" class="form-control">
kkkk                    </div>
                </div>

                <div class="form-group row">
                    <label for="kelurahan_id" class="col-3 col-form-label">Kelurahan ID</label>
                    <div class="col-8">
                        <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                            <option value=""> Pilih Kelurahan </option>
                            <?php
                            // Tampilkan data kelurahan sebagai pilihan
                            foreach ($query_kelurahan as $row) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
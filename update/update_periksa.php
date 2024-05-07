<?php
// Sertakan koneksi database
require_once '../dbkoneksi.php';

// Periksa apakah parameter id telah disertakan dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data pemeriksaan berdasarkan ID
    $query = $dbh->prepare('SELECT * FROM periksa WHERE id = ?');
    $query->execute([$id]);
    $periksa = $query->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah pemeriksaan dengan ID yang diberikan ditemukan
    if (!$periksa) {
        echo "Pemeriksaan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Pemeriksaan tidak disediakan.";
    exit;
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $dokter_id = $_POST['dokter_id'];

    // Query untuk mengupdate data pemeriksaan
    $query = $dbh->prepare('UPDATE periksa SET tanggal = ?, berat = ?, tinggi = ?, tensi = ?, keterangan = ?, pasien_id = ?, dokter_id = ? WHERE id = ?');
    $result = $query->execute([$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id, $id]);

    // Periksa apakah pembaruan berhasil
    if ($result) {
        // Redirect ke halaman data pemeriksaan setelah update
        header("Location: ../data/data_periksa.php");
        exit;
    } else {
        echo "Gagal memperbarui data pemeriksaan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pemeriksaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-1">
        <h2 class="text-center mb-3">Update Data Pemeriksaan</h2>
        <form method="POST">
            <div class="form-group row">
                <label for="tanggal" class="col-4 col-form-label">Tanggal:</label>
                <div class="col-8">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $periksa['tanggal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-4 col-form-label">Berat Badan:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="berat" name="berat" value="<?php echo $periksa['berat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tinggi" class="col-4 col-form-label">Tinggi Badan:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="tinggi" name="tinggi" value="<?php echo $periksa['tinggi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tensi" class="col-4 col-form-label">Tensi:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="tensi" name="tensi" value="<?php echo $periksa['tensi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-4 col-form-label">Keterangan:</label>
                <div class="col-8">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"><?php echo $periksa['keterangan']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="pasien_id" class="col-4 col-form-label">ID Pasien:</label>
                <div class="col-8">
                    <select class="form-control" id="pasien_id" name="pasien_id">
                        <?php
                        // Ambil ID pasien dari database
                        $query_pasien = $dbh->query("SELECT id, nama FROM pasien");
                        while ($row_pasien = $query_pasien->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row_pasien['id'] . "'";
                            if ($row_pasien['id'] == $periksa['pasien_id']) {
                                echo " selected";
                            }
                            echo ">" . $row_pasien['id'] . " - " . $row_pasien['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="dokter_id" class="col-4 col-form-label">ID Dokter:</label>
                <div class="col-8">
                    <select class="form-control" id="dokter_id" name="dokter_id">
                        <?php
                        // Ambil ID dokter dari database
                        $query_dokter = $dbh->query("SELECT id, nama FROM paramedik");
                        while ($row_dokter = $query_dokter->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row_dokter['id'] . "'";
                            if ($row_dokter['id'] == $periksa['dokter_id']) {
                                echo " selected";
                            }
                            echo ">" . $row_dokter['id'] . " - " . $row_dokter['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
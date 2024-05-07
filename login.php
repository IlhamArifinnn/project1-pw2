<?php
require_once "dbkoneksi.php";
// session_start();

$login_message = "";

// if (isset($_SESSION["is_login"])) {
//     header("Location: admin.php");
//     exit; // untuk menghentikan eksekusi setelah melakukan redirect
// }

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash_password = hash("sha256", $password);

    // Prepared statement untuk menghindari SQL injection
    $query = $dbh->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $query->execute([$username, $hash_password]);
    $result = $query->fetch();

    if ($result) {
        $_SESSION["username"] = $result['username'];
        $_SESSION["is_login"] = true;


        header("Location: data/admin.php");
        exit;
    } else {
        $login_message =  "Akun tidak ditemukan";
    }
}

// Tutup koneksi setelah digunakan
$dbh = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login</title>
    <style>
        /* Custom CSS untuk menyesuaikan tampilan */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .login-form {
            max-width: 360px;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form class="login-form p-4" method="post" action="login.php">
                    <?php if (!empty($login_message)) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?php echo $login_message; ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="mb-4">Login Akun</h3>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username: admin" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password: 123" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100" name="login">Login sekarang</button>
                        <a href="index.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
                    </div>



                    <p class="text-center mt-3 mb-0">Belum punya akun? <a href="registrasi.php" class="text-decoration-none">Daftar sekarang</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
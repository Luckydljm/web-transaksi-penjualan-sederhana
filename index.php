<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Data Transaksi Penjualan Barang</title>
    <link rel="stylesheet" href="public/assets/css/main/app.css" />
    <link rel="shortcut icon" href="public/assets/images/logo/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="public/assets/images/logo/logo.png" type="image/png" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style>
body {
    background: url(../../../assets/images/4853433.png?45649b87e0b3f50bfa1372c6cdb4595f), linear-gradient(90deg, #2d499d, #3f5491);
}
</style>

<body>
    <div class="container">
        <div class="card shadow rounded-4 p-4 mt-5">
            <div class="row text-center">
                <div class="col">
                    <img src="public/assets/images/logo/logo.png" alt="Logo" width="70" />
                </div>
            </div>
            <div class="row text-center mt-3">
                <p class="auth-subtitle">
                    Selamat Datang di
                </p>
                <h3 class="auth-title">Aplikasi Data Transaksi Penjualan Barang</h3>
            </div>

            <div class="row mx-auto mt-3">
                <a href="layouts/template.php?page=dashboard" class="btn btn-primary">Masuk</a>
            </div>
        </div>
    </div>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>
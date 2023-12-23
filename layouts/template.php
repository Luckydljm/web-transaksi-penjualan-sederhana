<?php
session_start();
include '../config/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Data Transaksi Penjualan Barang</title>
    <?php include 'link_assets.php'; ?>

</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <?php include 'header.php'; ?>
            <div class="container-fluid">
                <?php include '../function.php'; ?>
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <?php include 'link_script.php'; ?>
</body>

</html>
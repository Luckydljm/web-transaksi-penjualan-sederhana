<?php 
    include '../../config/connect.php';
    session_start();
    
    // submit data
    if(isset($_POST['submit'])){
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $tanggal_transaksi = filter_var($tanggal_transaksi, FILTER_SANITIZE_STRING);
        $id_barang = $_POST['id_barang'];
        $id_barang = filter_var($id_barang, FILTER_SANITIZE_STRING);
        $harga = $_POST['harga'];
        $harga = filter_var($harga, FILTER_SANITIZE_STRING);
        $jumlah = $_POST['jumlah'];
        $jumlah = filter_var($jumlah, FILTER_SANITIZE_STRING);
        $diskon = $_POST['diskon'];
        $diskon = filter_var($diskon, FILTER_SANITIZE_STRING);

        $bayar = $_POST['harga']*$_POST['jumlah'];
        $all = $bayar*$_POST['diskon'];
        
        $total = $bayar-$all;
        $total = filter_var($total, FILTER_SANITIZE_STRING);
        
        $add_data = $conn->prepare("INSERT INTO `tb_transaksi`(tanggal_transaksi, id_barang, harga , jumlah, diskon, total) VALUES(?,?,?,?,?,?)");
        $add_data->execute([$tanggal_transaksi, $id_barang, $harga, $jumlah, $diskon, $total]);
        $_SESSION['success'] = "Data berhasil ditambahkan!";
        header('location:../../layouts/template.php?page=transaksi');
    }

?>
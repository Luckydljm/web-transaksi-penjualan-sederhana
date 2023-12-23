<?php 
    include '../../config/connect.php';
    session_start();
    
    // submit data
    if(isset($_POST['submit'])){
        $kd_barang = $_POST['kd_barang'];
        $kd_barang = filter_var($kd_barang, FILTER_SANITIZE_STRING);
        $nm_barang = $_POST['nm_barang'];
        $nm_barang = filter_var($nm_barang, FILTER_SANITIZE_STRING);
        $harga_barang = $_POST['harga_barang'];
        $harga_barang = filter_var($harga_barang, FILTER_SANITIZE_STRING);

        $select_data = $conn->prepare("SELECT * FROM `tb_barang` WHERE kd_barang = ?");
        $select_data->execute([$kd_barang]);

        if($select_data->rowCount() > 0){
            $_SESSION['registered'] = "Kode Barang telah terdaftar!";
            header('location:../../layouts/template.php?page=barang');
        }else{
            $add_data = $conn->prepare("INSERT INTO `tb_barang`(kd_barang, nm_barang, harga_barang) VALUES(?,?,?)");
            $add_data->execute([$kd_barang, $nm_barang, $harga_barang]);
            $_SESSION['success'] = "Data berhasil ditambahkan!";
            header('location:../../layouts/template.php?page=barang');
        }
    
    }

    // Update
   if(isset($_POST['update'])){

    $id_barang = $_POST['id_barang'];
    $id_barang = filter_var($id_barang, FILTER_SANITIZE_STRING);
    $kd_barang = $_POST['kd_barang'];
    $kd_barang = filter_var($kd_barang, FILTER_SANITIZE_STRING);
    $nm_barang = $_POST['nm_barang'];
    $nm_barang = filter_var($nm_barang, FILTER_SANITIZE_STRING);
    $harga_barang = $_POST['harga_barang'];
    $harga_barang = filter_var($harga_barang, FILTER_SANITIZE_STRING);
 
    $update_barang = $conn->prepare("UPDATE `tb_barang` SET kd_barang = ?, nm_barang = ?, harga_barang = ? WHERE id_barang = ?");
    $update_barang->execute([$kd_barang, $nm_barang , $harga_barang, $id_barang]);
 
    $_SESSION['update'] = "Data Barang berhasil diperbarui!";
    header('location:../../layouts/template.php?page=barang');
 
 }

    // delete
    if(isset($_POST['delete'])){

        $delete_id = $_POST['id_barang'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

        $verify_barang = $conn->prepare("SELECT * FROM `tb_barang` WHERE id_barang = ? LIMIT 1");
        $verify_barang->execute([$delete_id]);

        if($verify_barang->rowCount() > 0){
            
        $delete_barang = $conn->prepare("DELETE FROM `tb_barang` WHERE id_barang = ?");
        $delete_barang->execute([$delete_id]);
        $_SESSION['flash'] = "Data dihapus!";
        header('location:../../layouts/template.php?page=barang');
        
        }else{
            $_SESSION['flash_fail'] = "Data tidak ditemukan!";
            header('location:../../layouts/template.php?page=barang');
        }
    }
?>
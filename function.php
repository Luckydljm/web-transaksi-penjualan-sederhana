<?php
ob_start();
error_reporting(0);
$page = $_GET['page'];

// Dashboard
if ($page=='dashboard'){
	include "dashboard.php";
}
// barang
elseif ($page=='barang'){
    include "page/barang/barang.php";
}
// transaksi
elseif ($page=='transaksi'){
    include "page/transaksi/transaksi.php";
}

else{
    include "error_page.php";
}
?>
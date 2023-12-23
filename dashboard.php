<div class="page-heading">
    <h2>Dashboard</h2>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="icon dripicons dripicons-network-3"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <?php
                            $select_barang = $conn->prepare("SELECT * FROM `tb_barang`");
                            $select_barang->execute();
                            $total_barang =  $select_barang->rowCount();
                            ?>
                            <h6 class="text-muted font-semibold">Total Barang</h6>
                            <h6 class="font-extrabold mb-0"><?= $total_barang; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="icon dripicons dripicons-archive"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <?php
                            $select_transaksi = $conn->prepare("SELECT * FROM `tb_transaksi`");
                            $select_transaksi->execute();
                            $total_transaksi =  $select_transaksi->rowCount();
                            ?>
                            <h6 class="text-muted font-semibold">Total Transaksi</h6>
                            <h6 class="font-extrabold mb-0"><?= $total_transaksi; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
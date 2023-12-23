<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Data Transaksi</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="row">
                <div class="card-header d-flex justify-content-start">
                    <div class="mx-3 fs-5"><i class="bi bi-stack"></i></div>
                    <div class="fs-5">Data Transaksi</div>
                </div>
            </div>
        </div>
        <!-- Notifikasi Upload -->
        <?php
        if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['success']);
        }
        ?>

        <!-- List Transaksi -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Tabel Transaksi
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-primary modal-btn" data-bs-toggle="modal"
                            data-bs-target="#modalAddData">Tambah Data</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-gray-900 w-100" id="transaksiTable">
                    <thead>
                        <tr style="font-size: 0.9rem;">
                            <th>#</th>
                            <th>Tgl Transaksi</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        $show_transaksi = $conn->prepare("SELECT * FROM `tb_transaksi`, `tb_barang` WHERE tb_transaksi.id_barang = tb_barang.id_barang");
                        $show_transaksi->execute();
                        if($show_transaksi->rowCount() > 0){
                            while($fetch_transaksi = $show_transaksi->fetch(PDO::FETCH_ASSOC)){  
                                $no++;
                        ?>
                        <tr style="font-size: 0.9rem;">
                            <td><?= $no; ?></td>
                            <td><?= $fetch_transaksi['tanggal_transaksi']; ?></td>
                            <td><?= $fetch_transaksi['kd_barang']; ?></td>
                            <td><?= $fetch_transaksi['nm_barang']; ?></td>
                            <td><?php echo 'Rp ' . number_format($fetch_transaksi['harga'], 0, ',', '.') ?></td>
                            <td><?= $fetch_transaksi['jumlah']; ?></td>
                            <td><?= $fetch_transaksi['diskon']; ?></td>
                            <td><?php echo 'Rp ' . number_format($fetch_transaksi['total'], 0, ',', '.') ?></td>
                        </tr>
                        <?php
                            }
                            }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-10 text-end">
                        <h3>Subtotal:</h3>
                    </div>
                    <div class="col-2 text-end">
                        <?php
                        $show_transaksi = $conn->prepare("SELECT * FROM `tb_transaksi`");
                        $show_transaksi->execute();
                        if($show_transaksi->rowCount() > 0){
                            while($fetch_transaksi = $show_transaksi->fetch(PDO::FETCH_ASSOC)){ 
                                $sub_total += $fetch_transaksi['total'];
                            }
                        }
                        ?>

                        <h4>
                            <?php echo 'Rp ' . number_format($sub_total, 0, ',', '.') ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modals -->
<!-- add Data -->
<div class=" modal text-gray-900" id="modalAddData" tabindex="-1">
    <form action="../page/transaksi/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Transaksi</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal_transaksi" class="form-label">Tgl. Transaksi</label>
                        <input autocomplete="off" type="date" class="form-control tanggal_transaksi"
                            id="tanggal_transaksi" name="tanggal_transaksi" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_barang" class="form-label">Nama Barang</label>
                        <select id="id_barang" class="form-select" aria-label="Default select example" name="id_barang">
                            <option selected disabled>Pilih Barang</option>
                            <?php
                                $select_barang = $conn->prepare("SELECT * FROM `tb_barang`");
                                $select_barang->execute();
                                if($select_barang->rowCount() > 0){
                                    while($fetch_barang = $select_barang->fetch(PDO::FETCH_ASSOC)){
                                ?>
                            <option value="<?= $fetch_barang['id_barang']; ?>"> <?= $fetch_barang['nm_barang']; ?>
                            </option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input autocomplete="off" type="text" class="form-control harga" id="harga" name="harga"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input autocomplete="off" type="text" class="form-control jumlah" id="jumlah" name="jumlah"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon <span class="text-muted">(*Masukkan dalam bentuk
                                desimal)</span></label>
                        <input autocomplete="off" type="text" class="form-control diskon" id="diskon" name="diskon"
                            aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
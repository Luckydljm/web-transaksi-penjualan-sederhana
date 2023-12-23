<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Data Barang</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
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
                    <div class="fs-5">Data Barang</div>
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

        <?php
        if (isset($_SESSION['update'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['update']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['update']);
        }
        ?>

        <?php
        if (isset($_SESSION['flash'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['flash']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['flash']);
        }
        ?>

        <?php
        if (isset($_SESSION['flash_fail'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> <?= $_SESSION['flash_fail']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['flash_fail']);
        }
        ?>

        <?php
        if (isset($_SESSION['registered'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> <?= $_SESSION['registered']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['registered']);
        }
        ?>

        <!-- List Barang -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Contact Table
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-primary modal-btn" data-bs-toggle="modal"
                            data-bs-target="#modalAddData">Tambah Data</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-gray-900 w-100" id="barangTable">
                    <thead>
                        <tr style="font-size: 0.9rem;">
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        $show_barang = $conn->prepare("SELECT * FROM `tb_barang`");
                        $show_barang->execute();
                        if($show_barang->rowCount() > 0){
                            while($fetch_barang = $show_barang->fetch(PDO::FETCH_ASSOC)){  
                                $no++;
                        ?>
                        <tr style="font-size: 0.9rem;">
                            <td><?= $no; ?></td>
                            <td><?= $fetch_barang['kd_barang']; ?></td>
                            <td><?= $fetch_barang['nm_barang']; ?></td>
                            <td><?php echo 'Rp ' . number_format($fetch_barang['harga_barang'], 0, ',', '.') ?></td>
                            <td>
                                <button class="btn btn-sm btn-danger modal-btn btn-delete-barang" id="btnDeleteBarang"
                                    data-bs-toggle="modal" data-bs-target="#modalDeleteBarang"
                                    data-id_barang="<?= $fetch_barang['id_barang']; ?>"
                                    data-nm_barang="<?= $fetch_barang['nm_barang']; ?>"><i
                                        class="bi bi-x-lg"></i></button>
                                <button class="btn btn-sm btn-warning modal-btn btn-update-barang" id="btnUpdateBarang"
                                    data-bs-toggle="modal" data-bs-target="#modalUpdateBarang"
                                    data-id_barang="<?= $fetch_barang['id_barang']; ?>"
                                    data-kd_barang="<?= $fetch_barang['kd_barang']; ?>"
                                    data-nm_barang="<?= $fetch_barang['nm_barang']; ?>"
                                    data-harga_barang="<?= $fetch_barang['harga_barang']; ?>"><i
                                        class="bi bi-pencil-square"></i></button>
                            </td>
                        </tr>
                        <?php
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- modals -->
<!-- add Data -->
<div class=" modal text-gray-900" id="modalAddData" tabindex="-1">
    <form action="../page/barang/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Barang</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kd_barang" class="form-label">Kode Barang</label>
                        <input autocomplete="off" type="text" class="form-control kd_barang" id="kd_barang"
                            name="kd_barang" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_barang" class="form-label">Nama Barang</label>
                        <input autocomplete="off" type="text" class="form-control nm_barang" id="nm_barang"
                            name="nm_barang" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_barang" class="form-label">Harga</label>
                        <input autocomplete="off" type="text" class="form-control harga_barang" id="harga_barang"
                            name="harga_barang" aria-describedby="emailHelp" required>
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

<!-- edit baranag-->
<div class="modal text-gray-900" id="modalUpdateBarang" tabindex="-1">
    <form action="../page/barang/action.php" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Barang</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kd_barang" class="form-label">Kode Barang</label>
                        <input autocomplete="off" type="text" class="form-control kd_barang" id="kd_barang"
                            name="kd_barang" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_barang" class="form-label">Nama Barang</label>
                        <input autocomplete="off" type="text" class="form-control nm_barang" id="nm_barang"
                            name="nm_barang" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_barang" class="form-label">Harga</label>
                        <input autocomplete="off" type="text" class="form-control harga_barang" id="harga_barang"
                            name="harga_barang" aria-describedby="emailHelp" required>
                    </div>
                    <input type="hidden" class="id_barang" name="id_barang">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary modal-btn" name="update">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- delete barang -->
<div class="modal text-gray-900" id="modalDeleteBarang" tabindex="-1">
    <form action="../page/barang/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Barang</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <b class="nm_barang"></b>?</p>

                </div>
                <input type="hidden" class="id_barang" name="id_barang">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger modal-btn" name="delete">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>
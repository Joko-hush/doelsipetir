<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                    <?= $this->session->flashdata('message'); ?>

                    <?php unset($_SESSION['message']); ?>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('personalia'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('setting'); ?>">Setting</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content p-3">
        <div class="card shadow-lg">

            <div class="card-body">
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addmodal">
                    Tambah Eselon
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover" id="myTable">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            <?php foreach ($eselon as $p) : ?>
                                <tr>
                                    <td class="text-center"><?= $n++; ?></td>
                                    <td>
                                        <?= $p['nama']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Hapus?')" href="<?= base_url('setting/hapusEselon') . '?id=' . $p['id']; ?>">Hapus</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addmodalLabel">Form Tambah Eselon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('setting/masterEselon'); ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Eselon</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Eselon">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
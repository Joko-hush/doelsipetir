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
                        <li class="breadcrumb-item"><a href="<?= base_url('personalia/user'); ?>">Daftar Personil</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content p-3">
        <div class="card shadow-lg">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover" id="myTable">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>NRP/NIP/NIK</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            <?php foreach ($personil as $p) : ?>
                                <tr>
                                    <td class="text-center"><?= $n++; ?></td>
                                    <td>
                                        <a class="text-white" href="<?= base_url('personalia/detailUser') . '?id=' . $p['id']; ?>">
                                            <?= $p['name']; ?>
                                        </a>
                                    </td>
                                    <td class="text-center"><?= $p['nik']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p>Catatan:</p>
                    <ul>
                        <li>Daftar Personil yang sudah menggunakan aplikasi ini.</li>
                        <li>Klik pada nama untuk melihat detail.</li>
                    </ul>

                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
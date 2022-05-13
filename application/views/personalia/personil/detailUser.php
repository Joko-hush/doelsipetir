<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content p-3">
        <div class="card shadow-lg">
            <div class="card-header">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-center mx-auto">
                            <li class="nav-item"><a class="nav-link" href="#" role="button" onclick="showdapok()">Data Pokok</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" role="button" onclick="showdakel()">Data Keluarga</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" role="button" onclick="show()">Cetak</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div class="container" id="dapok" style="display: block;">
                        <div class="card card-warning shadow-lg">
                            <div class="card-header">
                                <h5>Data Pokok</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 p-2 text-center">
                                        <figure class="img-responsive mx-auto">
                                            <a href="<?= base_url('assets/img/dosier/') . $personil['image']; ?>">
                                                <img src="<?= base_url('assets/img/dosier/') . $personil['image']; ?>" alt="foto profil <?= $personil['name']; ?>" class="img img-responsive img-thumbnail rounded figure-img mx-auto" width="214px" height="214px">
                                            </a>
                                            <figcaption class="figure-caption">
                                                <h3><?= $personil['name']; ?></h3>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-md-4 table-responsive">
                                        <table class="table text-left table-bordered rounded">
                                            <tr>
                                                <th>Nama</th>
                                                <td><?= $personil['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NRP/NIP</th>
                                                <td><?= $personil['nik']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pangkat/Gol</th>
                                                <td><?= $personil['pangkat']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td><?= $personil['jabatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>TMT Jabatan</th>
                                                <td><?= $personil['tmt_jabatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td><?= $personil['kategori']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>TMT Kerja</th>
                                                <td><?= $personil['tmt_kerja']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4 table-responsive">
                                        <table class="table text-left table-bordered rounded">
                                            <tr>
                                                <th>Agama</th>
                                                <td><?= $personil['agama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gol Darah</th>
                                                <td><?= $personil['gol_darah']; ?></td>
                                            </tr>
                                            <?php
                                            list($y, $m, $d) = explode('-', $personil['tgl_lahir']);
                                            $ttl = $d . '-' . $m . '-' . $y;
                                            ?>
                                            <tr>
                                                <th>Tempat/Tgl Lahir</th>
                                                <td><?= $personil['tempat_lahir'] . ', ' . $ttl; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Telp</th>
                                                <td><?= $personil['tlp']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?= $personil['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>No. KTP</th>
                                                <?php
                                                $ktp = $this->db->get_where('jb_ktp', ['personil_id' => $personil['id']])->row_array();

                                                ?>
                                                <?php if (!$ktp) : ?>
                                                    <td>
                                                        <a class="link-text" href="#">
                                                            -
                                                        </a>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <a class="link-text" href="<?= base_url('assets/img/dosier/') . $ktp['doc']; ?>">
                                                            <?= $personil['ktp']; ?>
                                                        </a>
                                                    </td>

                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <th>No. BPJS</th>
                                                <?php
                                                $bpjs = $this->db->get_where('jb_bpjs', ['personil_id' => $personil['id']])->row_array();
                                                ?>
                                                <?php if ($bpjs) : ?>
                                                    <td>
                                                        <a class="link-text" href="<?= base_url('assets/img/dosier/') . $bpjs['doc']; ?>">
                                                            <?= $personil['bpjs']; ?>
                                                        </a>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <a class="link-text" href="#">
                                                            -
                                                        </a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?= $personil['alamat']; ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container" id="dakel" style="display: none;">

                        <div class="card card-warning shadow-lg mt-3">
                            <div class="card-header">
                                <h5>Daftar anggota keluarga</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table bordered text-center table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Hubungan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $n = 1; ?>
                                            <?php foreach ($keluarga as $k) : ?>
                                                <tr>
                                                    <td><?= $n++; ?></td>
                                                    <td>
                                                        <a class="text-light" href="<?= base_url('personalia/detailkeluarga') . '?id=' . $k['id']; ?>">
                                                            <?= $k['nama']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?= $k['hub']; ?></td>
                                                    <td>
                                                        <a class="badge badge-warning" href="<?= base_url('keluarga/edit') . '?id=' . $k['id']; ?>">
                                                            Edit
                                                        </a>
                                                        <a class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin??');" href="<?= base_url('keluarga/hapus') . '?id=' . $k['id']; ?>">
                                                            Hapus
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
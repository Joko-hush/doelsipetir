<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1><span>Riwayat Hidup</span></h1>
            </div>
        </div>

        <div class="mt-3 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="card shadow rounded">
                <div class="card-header bg-dark text-warning">
                    <h5>I. Data Pokok</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <figure class="img-responsive">
                                <a href="<?= base_url('assets/img/dosier/') . $staff['image']; ?>"><img src="<?= base_url('assets/img/dosier/') . $staff['image']; ?>" alt="foto profil <?= $staff['name']; ?>" class="img rounded" width="214px" height="214px"></a>
                                <figcaption class="text-center">
                                    <h3><?= $staff['name']; ?></h3>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 table-responsive">
                            <table class="table text-left table-bordered rounded">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $staff['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Pangkat/Gol</th>
                                    <td><?= $staff['pangkat']; ?></td>
                                </tr>
                                <tr>
                                    <th>NRP/NIP</th>
                                    <td><?= $staff['nik']; ?></td>
                                </tr>
                                <tr>
                                    <th>TMT</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>TMT PNS</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Suku bangsa</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 table-responsive">
                            <table class="table text-left table-bordered rounded">
                                <tr>
                                    <th>Agama</th>
                                    <td><?= $staff['agama']; ?></td>
                                </tr>
                                <tr>
                                    <th>Gol Darah</th>
                                    <td><?= $staff['gol_darah']; ?></td>
                                </tr>
                                <tr>
                                    <th>Sumber PA</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>TMT</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>TMT Jab</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>


        </div>

    </div>
</section>
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">


            <div class="text-center">
                <h5><span>II. Riwayat Pendidikan</span></h5>
            </div>

            <div data-bs-aos="fade-left" data-aos-delay="100">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div data-aos="fade-right" data-aos-delay="100">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">Pendidikan Umum</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Pendidikan</th>
                                        <th>Tahun</th>
                                        <th>Nama Pendidikan/Fakultas/ Prodi/Jurusan</th>
                                        <th>Prestasi</th>
                                        <th>ijazah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1; ?>
                                    <?php foreach ($dikum as $dik) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $dik['jenis_didik']; ?></td>
                                            <td><?= $dik['thn']; ?></td>
                                            <td><?= $dik['nama']; ?></td>
                                            <td><?= $dik['prestasi']; ?></td>
                                            <td>
                                                <a href="<?= base_url('assets/img/dosier/') . $dik['doc']; ?>">
                                                    <h5><i class="ri-folder-download-fill"></i></h5>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div data-aos="fade-right" data-aos-delay="100">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">Pendidikan Militer</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>DIKMA/DIKTU/DIKBANGUM</th>
                                                <th>Tahun</th>
                                                <th>Prestasi</th>
                                                <th>Kep</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>DIKBANGSPES/DIKJAB/DIKILPENGTEK</th>
                                                <th>Tahun</th>
                                                <th>Prestasi</th>
                                                <th>Kep</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- end pendidikan -->
            <hr>
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">

                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-title">III. Riwayat Penugasan Operasi</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Operasi</th>
                                            <th>Tahun</th>
                                            <th>Prestasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">

                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-title">IV. Tanda Kehormatan</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Tanda Kehormatan</th>
                                            <th>Tahun</th>
                                            <th>Prestasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- endcol -->
            </div>
            <!-- end penugasan -->



            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">V. Kemampuan Bahasa</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th colspan="2">Daerah</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Aktif/Pasif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th colspan="2">Asing</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Aktif/Pasif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">VI. Riwayat Penugasan Luar Negeri</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Macam Tugas</th>
                                    <th>Tahun</th>
                                    <th>Negara</th>
                                    <th>Prestasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- end riwayat penugasan -->
            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">VII. Kepangkatan</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Pangkat</th>
                                    <th>TMT</th>
                                    <th>Nomor Kep/Skep</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $n = 1; ?>
                                <?php foreach ($pangkat as $p) : ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td class="text-left"><?= $p['pangkat']; ?></td>
                                        <td><?= $p['tmt']; ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/img/dosier/') . $p['doc']; ?>" class="text-dark">

                                                <?= $p['no_skep']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- end kepangkatan -->
            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">VIII. Jabatan</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>TMT</th>
                                    <th>Nomor Kep/Skep</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- end jabatan -->
            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">IX. Keluarga</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th class="text-end">Status :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Nama Suami :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Jumlah Anak :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Alamat Tinggal :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end"></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">No. Hp</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Nama Ayah</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Nama Ibu</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">Alamat Orang Tua</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end"></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anak</th>
                                        <th>Tgl Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1; ?>
                                    <?php foreach ($anak as $an) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $an['nama']; ?></td>
                                            <td><?= $an['tanggal_lahir']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- end keluarga -->
            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">X. Prestasi</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Tahun</th>
                                    <th>Tempat</th>
                                    <th>Deskripsi</th>
                                    <th>Kep/Piagam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>


        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->
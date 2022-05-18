<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="card card-primary">
            <div class="card-header">
                <h3>Absensi</h3>
            </div>
            <div class="card-body">

                <div class="absen">
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="latitude d-none" id="latitude"></span>
                            <a href="<?= base_url('absensi/masuk'); ?>" class="btn btn-outline-success shadow-md" data-bs-toggle="tooltip" data-bs-placement="top" title="Absen Masuk">
                                <?php if ($hadir == 0) : ?>
                                    MASUK
                                <?php elseif ($pulang == 1) : ?>
                                    LEMBUR
                                <?php else : ?>
                                    PULANG
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('absensi/ijin'); ?>" class="btn btn-outline-danger shadow-md" data-bs-toggle="tooltip" data-bs-placement="top" title="absen jika tidak dapat hadir hari ini.">
                                IJIN/SAKIT
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="riwayat mt-3">
                    <h5>Riwayat Absen minggu ini</h5>
                    <div class="table-responsive">
                        <table id="riwayat_absen" class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam masuk</th>
                                    <th>Jam pulang</th>
                                    <th>Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($absen as $a) : ?>
                                    <tr>
                                        <td><?= $a['TGL_MASUK']; ?></td>
                                        <td><?= substr($a['TIME_IN'], 0, 8); ?></td>
                                        <td><?= substr($a['TIME_OUT'], 0, 8); ?></td>
                                        <td><?= $a['INFO']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>


    </div>
</section><!-- End Hero -->
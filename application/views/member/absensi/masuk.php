<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="card card-primary">
            <div class="card-header">
                <h3>Absensi</h3>
            </div>
            <div class="card-body">

                <div class="absen">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="" class="btn btn-outline-success shadow-md" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Absen Masuk">
                                <?php if ($hadir == 0) : ?>
                                    MASUK
                                <?php elseif ($pulang == 1) : ?>
                                    LEMBUR
                                <?php else : ?>
                                    PULANG
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="" class="btn btn-outline-danger shadow-md" data-bs-toggle="tooltip" data-bs-placement="top" title="absen jika tidak dapat hadir hari ini.">
                                IJIN/SAKIT
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="" class="btn btn-outline-warning shadow-md" data-bs-toggle="tooltip" data-bs-placement="top" title="Absen Masuk untuk dinas luar.">
                                Dinas Luar
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card-body text-center">

                    <div class="form-group">
                        <div class="video-box">
                            <span class="latitude d-none" id="latitude"></span>



                            <div class="webcam-capture mx-auto">
                                <div></div><video autoplay="autoplay"></video>
                            </div>

                        </div>


                    </div>

                </div>
                <div>
                    <?= $this->input->post('lokasi'); ?>
                    <?php if ($hadir == 0) : ?>
                        <div class="row mb-2 text-center mx-auto">
                            <div class="col">
                                <button class="btn rounded-pill btn-success btn-lg btn-block" onClick="captureimagedd(0)"><i class="fas fa-camera"></i> Absen masuk</button>
                            </div>

                        </div>
                    <?php else : ?>
                        <button class="btn rounded-pill btn-warning btn-lg btn-block" onClick="captureimagedd(0)"><i class="fas fa-camera"></i> Absen Pulang</button>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</div>
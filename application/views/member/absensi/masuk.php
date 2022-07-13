<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="card card-primary">
            <div class="card-header">
                <h3>Absensi</h3>
            </div>
            <div class="card-body">

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
</section><!-- End Hero -->

<script>
    var btnMsk = document.getElementById('btn_masuk');
    var btnPlg = document.getElementById('btn_pulang');

    window.addEventListener("load", () => {

        btnMsk.style.display = "none";
        btnPlg.style.display = "none";

    });
    setTimeout(function() {
        btnMsk.style.display = "block";
        btnPlg.style.display = "block";
    }, 10000);
</script>
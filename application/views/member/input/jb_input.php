<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h2><span>Dokumen Elektronik Absensi Personil Dustira</span></h2>
                <h2><span id="typed"></span></h2>
                <div class="mt-3">
                    <?= $this->session->flashdata('message'); ?>
                    <?php unset($_SESSION['message']); ?>
                </div>
            </div>
        </div>
        <div class="row gy-4 mt-3 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#dapok">
                        <i class="ri-shield-user-fill"></i>
                        <h3 class="text-white">
                            Lengkapi Data Pribadi
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#cardkartu">
                        <i class="ri-bank-card-line"></i>
                        <h3 class="text-white">
                            Tambahkan Kartu identitas
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modpangkat">
                        <i class="ri-vuejs-line"></i>
                        <h3 class="text-white">
                            Riwayat Pangkat
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a href="<?= base_url('member/jabatan'); ?>">
                        <i class="ri-user-star-line"></i>
                        <h3 class="text-white">
                            Riwayat Jabatan
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#pendidikan">
                        <i class="ri-building-2-fill"></i>
                        <h3 class="text-white">
                            Pendidikan Umum
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" href="<?= base_url('dikmil'); ?>">
                        <i class="ri-government-line"></i>
                        <h3 class="text-white">
                            Pendidikan Militer
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" href="<?= base_url('bahasa'); ?>">
                        <i class="ri-chat-smile-3-line"></i>
                        <h3 class="text-white">
                            Kemampuan Bahasa
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#tugasoperasi">
                        <i class="ri-gps-fill"></i>
                        <h3 class="text-white">
                            Riwayat Penugasan Operasi
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#luarnegeri">
                        <i class="ri-earth-line"></i>
                        <h3 class="text-white">
                            Riwayat Penugasan Luar Negeri
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#kehormatan">
                        <i class="ri-shield-star-line"></i>
                        <h3 class="text-white">
                            Tanda Kehormatan
                        </h3>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box rounded shadow">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#inputprestasi">
                        <i class="ri-star-smile-line"></i>
                        <h3 class="text-white">
                            Prestasi
                        </h3>
                    </a>
                </div>
            </div>



        </div>


    </div>






</section><!-- End Hero -->



<!-- ======= About Section ======= -->
<div class="modal fade" id="dapok" tabindex="-1" aria-labelledby="dapokLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dapokLabel">Data Pribadi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Data Pokok</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/inputdata'); ?>

                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nik">No. Kepegawaian</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nik" id="nik" placeholder="NRP / NIP / NIK" value="<?= $staff['nik']; ?>"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="jamKerja">Jam Kerja</label></div>
                                <div class="col-md-8">
                                    <select name="jamKerja" id="jamKerja" class="form-control">
                                        <?php if (!$staff['jam_kerja_id']) : ?>
                                            <option value="-">Pilih jam kerja</option>
                                        <?php else : ?>
                                            <?php
                                            $this->db->where('id', $staff['jam_kerja_id']);
                                            $jker = $this->db->get('jam_kerja')->row_array();
                                            $jkname = $jker['nama'];
                                            ?>
                                            <option value="<?= $staff['jam_kerja_id']; ?>"><?= $jkname; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($jamKerja as $jK) : ?>
                                            <option value="<?= $jK['id']; ?>"><?= $jK['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="name">Nama Lengkap</label></div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="name" id="name" value="<?= $staff['name']; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="tl">Tempat Lahir</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="tl" id="tl" value="<?= $staff['tempat_lahir']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="ttl">Tanggal Lahir</label></div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="date" name="ttl" id="ttl" value="<?= $staff['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="gender">Jenis kelamin</label></div>
                                <div class="col-md-8">
                                    <select name="gender" id="gender" class="form-select">

                                        <?php if ($staff['sex'] == 'L') : ?>
                                            <option value="L">Laki - laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php else : ?>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki - laki</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="darah">Gol. Darah</label></div>
                                <div class="col-md-8">
                                    <select name="darah" id="darah" class="form-select">
                                        <option value="<?= $staff['gol_darah']; ?>"><?= $staff['gol_darah']; ?></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="tlp">No. Hp</label></div>
                                <div class="col-md-8"><input class="form-control" type="tel" name="tlp" id="tlp" value="<?= $staff['tlp']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="email">Email</label></div>
                                <div class="col-md-8"><input class="form-control" type="email" name="email" id="email" value="<?= $staff['email']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="jabatan">Jabatan</label></div>
                                <div class="col-md-8">
                                    <select class="form-control" type="jabatan" name="jabatan" id="email">
                                        <?php if ($staff['jabatan'] == null) : ?>
                                            <option value="-">-</option>
                                        <?php else : ?>
                                            <option value="<?= $staff['jabatan']; ?>">
                                                <?php
                                                $this->db->where('id', $staff['jabatan']);
                                                $jbtn = $this->db->get('m_jabatan')->row_array();

                                                $this->db->where('id', $jbtn['subbagian_id']);
                                                $subbagian = $this->db->get('m_subbagian')->row_array();
                                                $sb = $subbagian['subbagian'];
                                                $j = $jbtn['nama'];
                                                echo $j . ' | ' . $sb;
                                                ?>
                                            </option>
                                        <?php endif; ?>
                                        <?php foreach ($jabatan as $j) : ?>
                                            <?php
                                            $this->db->where('id', $j['subbagian_id']);
                                            $subbagian = $this->db->get('m_subbagian')->row_array();
                                            $sb = $subbagian['subbagian'];
                                            ?>
                                            <option value="<?= $j['id']; ?>"><?= $j['nama'] . ' | ' . $sb; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Foto</label></div>
                                <div class="col-md-1"><img class="img img-thumbnail rounded-circle" width="96" src="<?= base_url('assets/img/dosier/') . $staff['image']; ?>" alt="avatar personil"></div>
                                <div class="col-md-7"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="agama">Agama</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="agama" id="agama" value="<?= $staff['agama']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="status">Status</label></div>
                                <div class="col-md-8"> <select name="status" id="status" class="form-select">
                                        <option value="<?= $staff['status']; ?>"><?= $staff['status']; ?></option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Tidak Kawin">Tidak Kawin</option>
                                        <option value="Janda">Janda</option>
                                        <option value="Duda">Duda</option>
                                    </select></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="suku">Suku Bangsa</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="suku" id="suku" value="<?= $staff['suku_bangsa']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="alamat">Alamat</label></div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?= $staff['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>



                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cardkartu" tabindex="-1" aria-labelledby="cardLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cardLabel">Input Kartu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input KTP</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>Isi data KTP</h5>
                            </div>
                            <?php echo form_open_multipart('member/ktp'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="no">No. KTP</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="no" id="no" placeholder="Masukan no KTP" value="<?= $kartuKtp['noktp']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="ktp">Upload Kartu</label></div>
                                <?php
                                if (!$kartuKtp['doc']) {
                                    $namaFileKtp = '';
                                    $extKtp = '';
                                } else {

                                    list($namaFileKtp, $extKtp) = explode('.', $kartuKtp['doc']);
                                }
                                ?>
                                <?php if ($extKtp == 'pdf') : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') . $kartuKtp['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') . 'pdf_icon.png'; ?>" alt="ktp" class="img img-thumbnail img-responsive">
                                        </a>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') . $kartuKtp['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') . $kartuKtp['doc']; ?>" alt="ktp" class="img img-thumbnail img-responsive">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>

                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>
                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Kartu NPWP</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>Isi data NPWP</h5>
                            </div>
                            <?php echo form_open_multipart('member/npwp'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="no">No. NPWP</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="no" id="no" placeholder="Masukan no npwp" value="<?= $npwp['npwp']; ?>"></div>
                            </div>
                            <?php
                            if (!$npwp['doc']) {
                                $namaFileNpwp = '';
                                $extNpwp = '';
                            } else {

                                list($namaFileNpwp, $extNpwp) = explode('.', $npwp['doc']);
                            }
                            ?>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Kartu</label></div>
                                <?php if ($extNpwp == 'pdf') : ?>
                                    <a href="<?= base_url('assets/img/dosier/') . $npwp['doc']; ?>" target="_blank()">
                                        <div class="col-md-4 text-center">
                                            <iframe src="<?= base_url('assets/img/dosier/') . $npwp['doc']; ?>" class="img img-thumbnail img-responsive"></iframe>
                                        </div>
                                    </a>
                                <?php else : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') . $npwp['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') . $npwp['doc']; ?>" class="img img-thumbnail img-responsive">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>

                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>
                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Kartu BPJS</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <?php
                        if (!$kartuBpjs['doc']) {
                            $namaFileBpjs = '';
                            $extBpjs = '';
                        } else {

                            list($namaFileBpjs, $extBpjs) = explode('.', $kartuBpjs['doc']);
                        }
<<<<<<< HEAD

=======
>>>>>>> a4e5510c7b8958b784455e9ed666a2623fd96475
                        ?>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>BPJS Kesehatan</h5>
                            </div>
                            <?php echo form_open_multipart('member/bpjs'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="no">No. bpjs</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="no" id="no" placeholder="Masukan no BPJS" value="<?= $kartuBpjs['bpjs']; ?>"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="fktp">FKTP</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="fktp" id="fktp" placeholder="KLINIK FKTP" value="<?= $kartuBpjs['fktp']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Kartu</label></div>
                                <?php if ($extBpjs == 'pdf') : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') . $kartuBpjs['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') . 'pdf_icon.png'; ?>" class="img img-thumbnail img-responsive" alt="dokumen">
                                        </a>
                                    </div>
                                    <!-- <?php else : ?> -->
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') . $kartuBpjs['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') . $kartuBpjs['doc']; ?>" class="img img-thumbnail img-responsive" alt="dokumen">
                                        </a>
                                    </div>
                                    <!-- <?php endif; ?> -->

                                    <div class="col-md-4"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>

                            </form>
                        </div>
                    </div>
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Kartu Keluarga</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>Kartu Keluarga</h5>
                            </div>
                            <?php echo form_open_multipart('member/kk'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="no">No. Kartu Keluarga</label></div>

                                <div class="col-md-8"><input class="form-control" type="text" name="no" id="no" placeholder="Masukan no kk" value="<?= $kk['no_kk']; ?>"></div>
                            </div>
                            <?php
                            if (!$kk['doc']) {
                                $namaFilekk = '';
                                $extkk = '';
                            } else {
                                list($namaFilekk, $extkk) = explode('.', $kk['doc']);
                            }

                            ?>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Kartu</label></div>
                                <?php if ($extkk == 'pdf') : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') .  $kk['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') .  'pdf_icon.png'; ?>" class="img img-thumbnail img-responsive">
                                        </a>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-4 text-center">
                                        <a href="<?= base_url('assets/img/dosier/') .  $kk['doc']; ?>" target="_blank()">
                                            <img src="<?= base_url('assets/img/dosier/') .  $kk['doc']; ?>" class="img img-thumbnail img-responsive">
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-4"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>

                            </form>
                        </div>
                        <?php if ($staff['pangkat'] !== ' KHL') : ?>
                            <div class="card card-success shadow-lg mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Input Kartu Istri/Suami</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                <div class="card-body">
                                    <div class="text-center mb-2">
                                        <h5>KARIS/KARSU</h5>
                                    </div>
                                    <?php
                                    if (!$kartuKaris['doc']) {
                                        $namaFileKaris = '';
                                        $extKaris = '';
                                    } else {
                                        list($namaFileKaris, $extKaris) = explode('.', $kartuKaris['doc']);
                                    }
                                    ?>
                                    <?php echo form_open_multipart('member/karis'); ?>
                                    <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                                    <div class="row form-group mt-3">
                                        <div class="col text-left"><label for="no">No. Kartu Istri/Suami</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="no" id="no" placeholder="Masukan no karis/karsu" value="<?= $kartuKaris['no']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col text-left"><label for="image">Upload Kartu</label></div>
                                        <?php if ($extKaris == 'pdf') : ?>
                                            <div class="col-md-4 text-center">
                                                <a href="<?= base_url('assets/img/dosier/') .  $kartuKaris['doc']; ?>" target="_blank()">
                                                    <img src="<?= base_url('assets/img/dosier/') .  'pdf_icon.png'; ?>" class="img img-thumbnail img-responsive">
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-md-4 text-center">
                                                <a href="<?= base_url('assets/img/dosier/') .  $kartuKaris['doc']; ?>" target="_blank()">
                                                    <img src="<?= base_url('assets/img/dosier/') .  $kartuKaris['doc']; ?>" class="img img-thumbnail img-responsive">
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-4"><input class="form-control" type="file" name="image" id="image"></div>
                                    </div>
                                    <div class="row form-group">
                                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <div></div>
                        <?php endif; ?>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modpangkat" tabindex="-1" aria-labelledby="pangkatLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pangkatLabel">Data Riwayat Pangkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Pangkat</th>
                                <th>TMT</th>
                                <th>No. Skep</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kepangkatan as $pkt) : ?>
                                <tr>
                                    <td><?= $pkt['pangkat']; ?></td>
                                    <td><?= $pkt['tmt']; ?></td>
                                    <td><?= $pkt['no_skep']; ?></td>
                                    <td>
                                        <a href="<?= base_url('member/Editkepangkatan/') . '?id=' . $pkt['id']; ?>" class="btn btn-outline-warning">EDIT</a>
                                        <a onclick="return confirm('Apakah Anda Yakin?');" href="<?= base_url('member/hapuskepangkatan/') . '?id=' . $pkt['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin?');">HAPUS</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Pangkat</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/pangkat'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="pangkat">Pangkat</label></div>
                                <div class="col-md-8">
                                    <select name="pangkat" id="pangkat" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($pangkat as $p) : ?>
                                            <option value="<?= $p['KDSTAFFPANGKAT'] . ', ' . $p['MEMO']; ?>"><?= $p['MEMO']; ?></option>
                                        <?php endforeach; ?>
                                    </select>


                                </div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="tmt">TMT</label></div>
                                <div class="col-md-8"><input class="form-control" type="date" name="tmt" id="tmt" placeholder="TMT Pangkat"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="skep">No Skep</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="skep" id="skep" placeholder="Skep Pangkat"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="ktp">Upload SKEP</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            <div class="row form-group">
                                <p>* upload skep menggunakan format pdf ukuran tidak boleh lebih dari 5MB.</p>
                            </div>

                            </form>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="jabatan" tabindex="-1" aria-labelledby="jabatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="jabatanLabel">Data Riwayat Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input jabatan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- <table id="myTable2" class="table table-hover table-sm bordered">
                                    <thead>
                                        <tr>
                                            <th>JABATAN</th>
                                            <th>TMT</th>
                                            <th>SKEP</th>
                                            <th>BAGIAN</th>
                                            <th>TMT BAGIAN</th>
                                            <th>UPLOAD SKEP</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jabatan as $jbtn) : ?>
                                            <tr>
                                                <td><?= $jbtn['jabatan']; ?></td>
                                                <td><?= $jbtn['tmt']; ?></td>
                                                <td><?= $jbtn['bagian']; ?></td>
                                                <td><?= $jbtn['tmt_bagian']; ?></td>
                                                <td><?= $jbtn['doc']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('member/editjabatan'); ?>" class="btn btn-warning">
                                                        Edit
                                                    </a>
                                                    <a href="<?= base_url('member/hapusjabatan'); ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table> -->
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <!-- <?php echo form_open_multipart('member/jabatan'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="jabatan">Jabatan</label></div>
                                <div class="col-md-8">
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($jabatan as $jbt) : ?>
                                            <option value="<?= $jbt['KDSTAFFJABATAN'] . ', ' . $jbt['MEMO']; ?>"><?= $jbt['MEMO']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="tmt">TMT Jabatan</label></div>
                                <div class="col-md-8"><input class="form-control" type="date" name="tmt" id="tmt" placeholder="TMT jabatan"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="skep">No Skep</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="skep" id="skep" placeholder="Skep jabatan"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="ktp">Upload SKEP</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            <div class="row form-group">
                                <p>* upload dokumen menggunakan format pdf ukuran tidak boleh lebih dari 5MB.</p>
                            </div>
                            </form> -->

                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pendidikan" tabindex="-1" aria-labelledby="pendidikanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendidikanLabel">Data Riwayat Pendidikan Umum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input pendidikan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable3" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <th>Tahun Lulus</th>
                                            <th>Nama Sekolah</th>
                                            <th>Prestasi</th>
                                            <th>Upload</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dikum as $du) : ?>
                                            <tr>
                                                <td><?= $du['jenis_didik']; ?></td>
                                                <td><?= $du['thn']; ?></td>
                                                <td><?= $du['nama']; ?></td>
                                                <td><?= $du['prestasi']; ?></td>
                                                <td><?= $du['doc']; ?></td>


                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="<?= base_url('member/editdikum') . '?id=' . $du['id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" href="<?= base_url('member/hpsdikum') . '?id=' . $du['id']; ?>" onclick="return confirm('Apakah Anda Yakin??');">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/pendidikan'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="jenis">Jenis Pendidikan</label></div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="jenis" id="jenis">
                                </div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="thn">Tahun Lulus</label></div>
                                <div class="col-md-8"><input class="form-control" type="year" name="thn" id="thn" placeholder="Tahun Lulus"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nama">Nama Sekolah</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Sekolah"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="prestasi">Prestasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="prestasi" id="prestasi"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload ijazah</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            <div class="row form-group">
                                <p>* upload dokumen menggunakan format pdf ukuran tidak boleh lebih dari 5MB.</p>
                            </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modbahasa" tabindex="-1" aria-labelledby="modbahasaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modbahasaLabel">Kemampuan Bahasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Bahasa Daerah</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable6" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bahasa</th>
                                            <th>Aktif/Pasif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bahasa as $bhs) : ?>
                                            <tr>
                                                <td><?= $bhs['nama']; ?></td>
                                                <td><?= $bhs['isactive']; ?></td>
                                                <td>

                                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');" href="<?= base_url('member/hapus_bahasa_daerah') . '?id=' . $bhs['id']; ?>">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/bhs_d'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="bahasa">Bahasa Daerah</label></div>
                                <div class="col-md-8"><input class="form-control" list="daftar-bahasa" name="bahasa" id="bahasa" placeholder="Bahasa daerah"></div>
                                <datalist id="daftar-bahasa">
                                    <option value="Bahasa Aceh">
                                    <option value="Bahasa Bali">
                                    <option value="Bahasa Batak">
                                    <option value="Bahasa Betawi">
                                    <option value="Bahasa Bugis">
                                    <option value="Bahasa Gorontalo">
                                    <option value="Bahasa Lampung">
                                    <option value="Bahasa Madura">
                                    <option value="Bahasa Makassar">
                                    <option value="Bahasa Melayu">
                                    <option value="Bahasa Minangkabau">
                                    <option value="Bahasa Sasak">
                                    <option value="Bahasa Sunda">
                                </datalist>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="isactive">Penggunaan Bahasa</label></div>
                                <div class="col-md-8"><input class="form-control" list="daftar-aktif" name="isactive" id="isactive" placeholder="Penggunaan Bahasa"></div>
                                <datalist id="daftar-aktif">
                                    <option value="Aktif">
                                    <option value="Pasif">

                                </datalist>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>

                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Bahasa Asing</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable7" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bahasa</th>
                                            <th>Aktif/Pasif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bhsasing as $ba) : ?>
                                            <tr>
                                                <td><?= $ba['nama']; ?></td>
                                                <td><?= $ba['isactive']; ?></td>
                                                <td>

                                                    <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');" href="<?= base_url('member/hapus_bahasa_asing') . '?id=' . $ba['id']; ?>">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/bhs_asing'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="bahasa">Bahasa Asing</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="bahasa" id="bahasa" placeholder="Bahasa Asing"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="isactive">Penggunaan Bahasa</label></div>
                                <div class="col-md-8"><input class="form-control" list="daftar-aktif" name="isactive" id="isactive" placeholder="Penggunaan Bahasa"></div>
                                <datalist id="daftar-aktif">
                                    <option value="Aktif">
                                    <option value="Pasif">
                                </datalist>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tugasoperasi" tabindex="-1" aria-labelledby="tugasoperasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tugasoperasiLabel">Riwayat Penugasan Operasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Tugas Operasi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable8" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nama Operasi</th>
                                            <th>Tahun</th>
                                            <th>Prestasi</th>
                                            <th>Doc</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tugasoperasi as $to) : ?>
                                            <tr class="text-center">
                                                <td><?= $to['nama']; ?></td>
                                                <td><?= $to['thn']; ?></td>
                                                <td><?= $to['prestasi']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('assets/img/dosier/') . $to['doc']; ?>" class="galery text-dark">
                                                        <?= $to['doc']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="<?= base_url('member/editto') . '?id=' . $to['id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin??');" href="<?= base_url('member/hpsto') . '?id=' . $to['id']; ?>">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/tugasOperasi'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nama">Nama Tugas Operasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Operasi"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="thn">Tahun Tugas Operasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="number" name="thn" id="thn" placeholder="Tahun Operasi"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="prestasi">Prestasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="prestasi" id="prestasi" placeholder="Prestasi"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Doc</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                            <div class="card-footer">
                                <p>Catatan :</p>
                                <ol>
                                    <li>Semua kolom harus di isi.</li>
                                    <li>Format file untuk upload (pdf, jpg, png, jpeg) tidak lebih dari 5Mb.</li>
                                </ol>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="luarnegeri" tabindex="-1" aria-labelledby="luarnegeriLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="luarnegeriLabel">Riwayat Penugasan Luar Negeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Tugas Operasi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable9" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nama Tugas</th>
                                            <th>Tahun</th>
                                            <th>Negara</th>
                                            <th>Prestasi</th>
                                            <th>Doc</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($luarnegeri as $tln) : ?>
                                            <tr>
                                                <td><?= $tln['nama']; ?></td>
                                                <td><?= $tln['thn']; ?></td>
                                                <td><?= $tln['negara']; ?></td>
                                                <td><?= $tln['prestasi']; ?></td>
                                                <td><?= $tln['doc']; ?></td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="<?= base_url('member/edittln') . '?id=' . $tln['id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');" href="<?= base_url('member/hpstln') . '?id=' . $tln['id']; ?>">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/tugasLuarNegeri'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nama">Macam Tugas</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Operasi"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="thn">Tahun</label></div>
                                <div class="col-md-8"><input class="form-control" type="number" name="thn" id="thn" placeholder="Tahun Operasi"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="negara">Negara</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="negara" id="negara" placeholder="negara"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="prestasi">Prestasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="prestasi" id="prestasi" placeholder="prestasi"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Doc</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kehormatan" tabindex="-1" aria-labelledby="kehormatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kehormatanLabel">Tanda Kehormatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Tanda Kehormatan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable10" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Jenis Tanda Kehormatan</th>
                                            <th>Tahun</th>
                                            <th>Prestasi</th>
                                            <th>Doc</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tandakehormatan as $tkh) : ?>
                                            <tr>
                                                <td><?= $tkh['nama']; ?></td>
                                                <td><?= $tkh['thn']; ?></td>
                                                <td><?= $tkh['prestasi']; ?></td>
                                                <td><?= $tkh['doc']; ?></td>
                                                <td>
                                                    <a class="btn btn-warning  btn-sm" href="<?= base_url('member/edittkh') . '?id=' . $tkh['id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" href="<?= base_url('member/hpstkh') . '?id=' . $tkh['id']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/tkh'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nama">Jenis tanda kehormatan</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nama" id="nama" placeholder="Jenis tanda kehormatan">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="thn">Tahun</label></div>
                                <div class="col-md-8"><input class="form-control" type="number" name="thn" id="thn" placeholder="Tahun">
                                    <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="prestasi">Prestasi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="prestasi" id="prestasi" placeholder="prestasi">
                                    <?= form_error('prestasi', '<small class="text-danger pl-3">', '</small>'); ?></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload Doc</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="inputprestasi" tabindex="-1" aria-labelledby="inputprestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputprestasiLabel">Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="card card-success shadow-lg mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Input Prestasi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="myTable11" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Kegiatan</th>
                                            <th>Tahun</th>
                                            <th>Tempat</th>
                                            <th>Deskripsi</th>
                                            <th>Kep/Piagam</th>
                                            <th>Doc</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prestasi as $star) : ?>
                                            <tr>
                                                <td><?= $star['kegiatan']; ?></td>
                                                <td><?= $star['thn']; ?></td>
                                                <td><?= $star['tempat']; ?></td>
                                                <td><?= $star['deskripsi']; ?></td>
                                                <td><?= $star['kep']; ?></td>
                                                <td><?= $star['doc']; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning  btn-sm" href="<?= base_url('member/editprestasi') . '?id=' . $star['id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?= base_url('member/hpsstar') . '?id=' . $star['id']; ?>">HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="text-center mb-2">
                                <h5>Silahkan isi data.</h5>
                            </div>
                            <?php echo form_open_multipart('member/prestasi'); ?>
                            <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="nama">Kegiatan</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="nama" id="nama" placeholder="Jenis tanda kehormatan"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="thn">Tahun</label></div>
                                <div class="col-md-8"><input class="form-control" type="number" name="thn" id="thn" placeholder="Tahun"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="tempat">Tempat</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="tempat" id="tempat" placeholder="tempat kegiatan"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="deskripsi">Deskripsi</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi kegiatan"></div>
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col text-left"><label for="kep">Kep/Piagam</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" name="kep" id="kep" placeholder="kep kegiatan"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col text-left"><label for="image">Upload kep/Piagam</label></div>
                                <div class="col-md-8"><input class="form-control" type="file" name="image" id="image"></div>
                            </div>

                            <div class="row form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>



            </div>
        </div>
    </div>
</div>
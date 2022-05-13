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
                         <li class="breadcrumb-item"><a href="<?= base_url('personalia/masterstaff'); ?>">Personil Dustira</a></li>
                         <li class="breadcrumb-item active"><?= $judul; ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <section class="content p-3">
         <div class="card shadow-lg">
             <div class="card-header text-center">
                 <h3><?= $staff['NAME_DISPLAY']; ?></h3>
             </div>
             <div class="card-body">
                 <form action="<?= base_url('personalia/detailStaff'); ?>" method="post">
                     <input type="hidden" name="kdstaff" value="<?= $staff['KDSTAFF']; ?>">
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="nama">Nama Lengkap</label>
                             </div>
                             <div class="col-md-8">
                                 <input class="form-control" type="text" name="nama" id="nama" value="<?= $staff['NAME_DISPLAY']; ?>">
                             </div>
                         </div>
                         <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="nip">No Nrp/Nip/Nik</label>
                             </div>
                             <div class="col-md-8">
                                 <input class="form-control" type="text" name="nip" id="nip" value="<?= $staff['NOMOR_NIP']; ?>">
                             </div>
                         </div>
                         <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="ttl">Tempat, Tanggal lahir</label>
                             </div>
                             <div class="col-md-8">
                                 <div class="input-group">
                                     <input type="text" id="ttl" name="tempatlahir" aria-label="Tempat Lahir" class="form-control" value="<?= $staff['TEMPATLAHIR']; ?>">
                                     <input type="date" name="tanggallahir" aria-label="Tanggal lahir" class="form-control" value="<?= substr($staff['TANGGALLAHIR'], 0, 10); ?>">
                                 </div>
                             </div>
                         </div>
                         <?= form_error('tempatlahir', '<small class="text-danger pl-3">', '</small>'); ?>
                         <?= form_error('tanggallahir', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="email">Email</label>
                             </div>
                             <div class="col-md-8">
                                 <input class="form-control" type="email" name="email" id="email" value="<?= $staff['EMAIL']; ?>">
                             </div>
                         </div>
                         <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="phone">No. Telp</label>
                             </div>
                             <div class="col-md-8">
                                 <input class="form-control" type="text" name="phone" id="phone" value="<?= $staff['NOMOR_HP1']; ?>">
                             </div>
                         </div>
                         <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label" for="ktp">No. KTP</label>
                             </div>
                             <div class="col-md-8">
                                 <input class="form-control" type="text" name="ktp" id="ktp" value="<?= $staff['NOMOR_KTP']; ?>">
                             </div>
                         </div>
                         <?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-sm-4 text-end">
                             </div>
                             <div class="col-sm-8">
                                 <a href="#" onclick="history.back();" class="btn btn-success mr-3">Kembali</a>
                                 <button onclick="return confirm('Apakah Anda yakin untuk menyimpan perubahan data ini?');" class="btn btn-warning" type="submit">Simpan Perubahan</button>
                             </div>
                         </div>
                     </div>

                 </form>
             </div>
             <div class="card-footer">
                 <p><strong>*</strong> Untuk menambahkan Personil Silahkan gunakan Aplikasi Simrs.<br><strong>*</strong> Disini dapat melakukan edit data personil untuk melengkapi data pokok.</p>
             </div>
         </div>


     </section>
     <!-- /.content -->
 </div>
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
                         <li class="breadcrumb-item active"><?= $judul; ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <section class="content p-3">
         <div class="card shadow-lg">
             <div class="card-header text-center">
                 <h3>Daftar Personil Rs. Dustira dari Master Staff</h3>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered table-sm" id="myTable">
                         <thead class="text-center">
                             <tr>
                                 <th>NO</th>
                                 <th>NAMA</th>
                                 <th>NOMOR NRP/NIP/NIK</th>
                                 <th>Tempat, Tanggal lahir</th>
                                 <th>ACTION</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $n = 1; ?>
                             <?php foreach ($staff as $s) : ?>
                                 <tr>
                                     <td><?= $n++; ?></td>
                                     <td><?= $s['NAME_DISPLAY']; ?></td>
                                     <td data-bs-toggle="tooltip" data-bs-placement="top" title="Jika no Nrp/Nip/Nik ini kosong silahkan di lengkapi. Karena jika kosong tidak dapat membuat akun di aplikasi Doel si petir"><?= $s['NOMOR_NIP']; ?></td>
                                     <td><?= $s['TEMPATLAHIR'] . ', ' . $s['TANGGALLAHIR']; ?></td>
                                     <td>
                                         <a href="<?= base_url('personalia/detailStaff') . '?id=' . $s['KDSTAFF']; ?>" class="btn btn-outline-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Untuk melihat detail dan mengubah data">Lihat/Ubah</a>
                                     </td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>

                 </div>
             </div>
             <div class="card-footer">
                 <p><strong>*</strong> Untuk menambahkan Personil Silahkan gunakan Aplikasi Simrs.<br><strong>*</strong> Disini dapat melakukan edit data personil untuk melengkapi data pokok.</p>
             </div>
         </div>


     </section>
     <!-- /.content -->
 </div>
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1><?= $judul; ?></h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Blank Page</li>
                         </ol>
                     </div>
                     <div class="mt-3">

                         <?= $this->session->flashdata('message'); ?>
                         <?php unset($_SESSION['message']); ?>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->

         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title"><?= $judul; ?></h3>

                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered table-sm text-center" id="myTable">
                             <thead>
                                 <tr>
                                     <th>NO</th>
                                     <th>NAMA</th>
                                     <th>PANGKAT</th>
                                     <th>JABATAN</th>
                                     <th>UNIT</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $n = 1; ?>
                                 <?php foreach ($absenPersonil as $ap) : ?>
                                     <?php
                                        if (!$ap['jabatan']) {
                                            $jab['nama'] = '';
                                            $jab['subbagian'] = '';
                                        } else {
                                            $this->db->select('A.nama');
                                            $this->db->select('B.subbagian');
                                            $this->db->from('m_jabatan as A');
                                            $this->db->join('m_subbagian as B', 'B.id=A.subbagian_id', 'left');
                                            $this->db->where('A.id', $ap['jabatan']);
                                            $jab = $this->db->get()->row_array();
                                        }
                                        ?>
                                     <tr>
                                         <td><?= $n++; ?></td>
                                         <td>
                                             <a href="<?= base_url('personalia/rincianAbsen') . '?id=' . $ap['nik']; ?>" style="text-decoration: none;" class="text-white">
                                                 <?= $ap['name']; ?>
                                             </a>
                                         </td>
                                         <td><?= $ap['pangkat']; ?></td>
                                         <td><?= $jab['nama']; ?></td>
                                         <td><?= $jab['subbagian']; ?></td>
                                     </tr>
                                 <?php endforeach; ?>

                             </tbody>

                         </table>
                     </div>
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                     Catatan :
                     <ol>
                         <li>Untuk melihat detail absen klik pada nama.</li>
                     </ol>
                 </div>
                 <!-- /.card-footer-->
             </div>
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
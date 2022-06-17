<div class="main">
   <!-- MAIN CONTENT -->
   <div class="main-content">
      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat datang <?= $this->session->userdata("nama")  ?></h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url("siswacontroller") ?>">Siswa</a></li>
               <li class="breadcrumb-item active"><a href="#">Form</a></li>
            </ol>
         </nav>
      </div>

      <div class="container-fluid">
         <!-- TOP METRICS -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title"><?= ucwords($aksi)  ?> Soal Tes</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("success", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("siswacontroller/") . $aksi ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" name="nama" class="form-control" value="<?= $siswa->nama ?>" placeholder="<?= $siswa->nama ?>" required>
                           </div>
                           <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" class="form-control" value="<?= $siswa->email ?>" placeholder="<?= $siswa->email ?>" readonly>
                           </div>
                           <div class="form-group">
                              <label for="">Alamat</label>
                              <input type="text" name="alamat" class="form-control" value="<?= $siswa->alamat ?>" placeholder="<?= $siswa->alamat ?>">
                           </div>
                           <div class="form-group">
                              <label for="">Tingkatan</label>
                              <input type="text" class="form-control" readonly value="<?= $siswa->tingkatan ?>" placeholder="<?= $siswa->tingkatan ?>">
                           </div>
                           <div class="form-group">
                              <label for="">Angkatan</label>
                              <input type="text" class="form-control" readonly value="<?= $angkatan->aangkatan ?>" placeholder="<?= $angkatan->aangkatan ?>">
                           </div>
                           <div class="form-group">
                              <label for="">Kelas</label>
                              <input type="text" class="form-control" readonly value="<?= $kelas->knama ?>" placeholder="<?= $kelas->knama ?>">
                           </div>
                           <div class="form-group">
                              <label for="">Password Baru</label>
                              <input type="password" name="password" class="form-control">
                           </div>

                        </div>
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <!-- END TOP METRICS -->


         <!-- END PERFORMANCE INDEX -->
      </div>
   </div>
   <!-- END MAIN CONTENT -->

</div>
<script>
   const datamateri = <?= json_encode($materi) ?>;
</script>
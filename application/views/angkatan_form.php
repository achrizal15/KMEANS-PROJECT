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
               <li class="breadcrumb-item"><a href="<?= base_url("angkatancontroller") ?>">Angkatan</a></li>
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
                     <h3 class="card-title"><?= ucwords($aksi)  ?> Angkatan</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("angkatancontroller/") . $aksi ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= isset($angkatan)?$angkatan->id:""?>">

                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama Angkatan</label>
                           <input type="text" required class="form-control" name="angkatan" value="<?= isset($angkatan) ? $angkatan->angkatan : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Awal Pendaftaran</label>
                           <input type="date" required class="form-control" name="awal_pendaftaran" value="<?=isset($angkatan) ? date('Y-m-d',strtotime($angkatan->awal_pendaftaran)):'' ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Akhir Pendaftaran</label>
                           <input type="date" required class="form-control" name="akhir_pendaftaran" value="<?=isset($angkatan) ? date('Y-m-d',strtotime($angkatan->akhir_pendaftaran)):'' ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Awal Periode</label>
                           <input type="date" required class="form-control" name="awal_periode" value="<?=isset($angkatan) ? date('Y-m-d',strtotime($angkatan->awal_periode)):'' ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Akhir Periode</label>
                           <input type="date" required class="form-control" name="akhir_periode" value="<?=isset($angkatan) ? date('Y-m-d',strtotime($angkatan->akhir_periode)):'' ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <input type="text" hidden value="<?= isset($angkatan) ? $angkatan->status : "Aktif" ?>" name="status">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                           <a href="" class="btn btn-danger">Reset</a>
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
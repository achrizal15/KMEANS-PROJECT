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
               <li class="breadcrumb-item"><a href="<?= base_url("matericontroller") ?>">Materi</a></li>
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
                     <h3 class="card-title"><?= ucwords($aksi)  ?> Materi</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("matericontroller/") . $aksi ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($materi) ? $materi->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama</label>
                           <input type="text" required class="form-control" name="nama" value="<?= isset($materi) ? $materi->nama : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Tingkatan</label>
                           <select name="tingkatan" data-parsley-errors-container=".tingkatanError" class="form-control select-basic" id="select-role" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php if (isset($materi)) :  ?>
                                 <option <?= $materi->tingkatan=="SD"?"selected":""  ?> value="SD">SD</option>
                                 <option <?= $materi->tingkatan=="SMP"?"selected":""  ?> value="SMP">SMP</option>
                                 <option <?= $materi->tingkatan=="SMA"?"selected":""  ?> value="SMA">SMA</option>
                              <?php else : ?>
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                              <?php endif  ?>
                           </select>
                           <span class="tingkatanError"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">File Pendukung Materi <small>(Opsional)</small></label>
                           <input type="file" class="dropify" name="doc" data-max-file-size="10000K" data-default-file="<?= isset($materi) ? base_url("assets/file/" . $materi->file) : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label>Deskripsi <small>(opsional)</small></label>
                           <textarea name="deskripsi" id="" class="form-control" placeholder="Tuliskan tentang materi ini"><?= isset($materi)?$materi->deskripsi:""  ?></textarea>
                        </div>
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
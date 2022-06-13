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
               <li class="breadcrumb-item"><a href="<?= base_url("soaltescontroller") ?>">soaltes</a></li>
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
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("soaltescontroller/") . $aksi ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($soaltes) ? $soaltes->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Soal</label>
                           <textarea required class="form-control" name="soal"><?= isset($soaltes) ? $soaltes->soal : "" ?></textarea>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Gambar Soal
                              <small>(Opsional)</small></label>
                           <input type="file" class="dropify" accept="image/png, image/gif, image/jpeg" name="doc" data-default-file="<?= isset($soaltes) ? base_url("assets/file/" . $soaltes->file) : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Pilihan Ganda 1 <small>(Kunci Jawaban)</small></label>
                           <textarea required class="form-control" name="jawabankunci"><?= isset($soaltes) ? $soaltes->jawaban : "" ?></textarea>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Pilihan Ganda 2</label>
                           <textarea required class="form-control" name="jawaban[]"><?= isset($pilihan_ganda) ? $pilihan_ganda[0]->jawaban : "" ?></textarea>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Pilihan Ganda 3</label>
                           <textarea required class="form-control" name="jawaban[]"><?= isset($pilihan_ganda) ? $pilihan_ganda[1]->jawaban : "" ?></textarea>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Tingkatan</label>
                           <select name="tingkatan" data-parsley-errors-container=".tingkatanError" class="form-control select-basic" id="select-tingkatan" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php if (isset($soaltes)) :  ?>
                                 <option <?= $soaltes->tingkatan == "SD" ? "selected" : ""  ?> value="SD">SD</option>
                                 <option <?= $soaltes->tingkatan == "SMP" ? "selected" : ""  ?> value="SMP">SMP</option>
                                 <option <?= $soaltes->tingkatan == "SMA" ? "selected" : ""  ?> value="SMA">SMA</option>
                              <?php else : ?>
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                              <?php endif  ?>
                           </select>
                           <span class="tingkatanError"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Materi</label>
                           <select name="materi_id" data-parsley-errors-container=".materiError" class="form-control select-basic" id="select-materi" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($materi as $key => $value) : ?>
                                 <option <?= isset($soaltes) && $soaltes->materi_id == $value->mid ? "selected" : "" ?> value="<?= $value->mid ?>"><?= ucwords($value->mnama) ?> (<?= $value->mtingkatan  ?>)</option>
                              <?php endforeach ?>
                           </select>
                           <span class="materiError"></span>
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
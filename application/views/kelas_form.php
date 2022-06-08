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
               <li class="breadcrumb-item"><a href="<?= base_url("kelascontroller") ?>">Kelas</a></li>
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
                     <h3 class="card-title"><?= ucwords($aksi)  ?> Kelas</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("kelascontroller/") . $aksi ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($kelas) ? $kelas->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama</label>
                           <input type="text" required class="form-control" name="nama" value="<?= isset($kelas) ? $kelas->nama : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Hari</label>
                           <select name="hari" data-parsley-errors-container=".hariError" class="form-control select-basic" id="select-hari" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <option value="Senin" <?= isset($kelas) && $kelas->hari == "Senin" ? "selected" : "" ?>>Senin</option>
                              <option value="Selasa" <?= isset($kelas) && $kelas->hari == "Selasa" ? "selected" : "" ?>>Selasa</option>
                              <option value="Rabu" <?= isset($kelas) && $kelas->hari == "Rabu" ? "selected" : "" ?>>Rabu</option>
                              <option value="Kamis" <?= isset($kelas) && $kelas->hari == "Kamis" ? "selected" : "" ?>>Kamis</option>
                              <option value="Jumat" <?= isset($kelas) && $kelas->hari == "Jumat" ? "selected" : "" ?>>Jumat</option>
                              <option value="Sabtu" <?= isset($kelas) && $kelas->hari == "Sabtu" ? "selected" : "" ?>>Sabtu</option>
                              <option value="Minggu" <?= isset($kelas) && $kelas->hari == "Minggu" ? "selected" : "" ?>>Minggu</option>
                           </select>
                           <span class="hariError"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Waktu</label>
                           <input type="time" required class="form-control" name="waktu" value="<?= isset($kelas) ? $kelas->waktu : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Tingkatan</label>
                           <select name="tingkatan" data-parsley-errors-container=".tingkatanError" class="form-control select-basic" id="select-tingkatan" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php if (isset($kelas)) :  ?>
                                 <option <?= $kelas->tingkatan == "SD" ? "selected" : ""  ?> value="SD">SD</option>
                                 <option <?= $kelas->tingkatan == "SMP" ? "selected" : ""  ?> value="SMP">SMP</option>
                                 <option <?= $kelas->tingkatan == "SMA" ? "selected" : ""  ?> value="SMA">SMA</option>
                              <?php else : ?>
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                              <?php endif  ?>
                           </select>
                           <span class="tingkatanError"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Guru</label>
                           <select name="guru_id" data-parsley-errors-container=".guruError" class="form-control select-basic" id="select-guru" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($guru as $key => $value) : ?>
                                 <?php if (strtolower($value->rnama) != "guru") continue;  ?>
                                 <option <?=isset($kelas)&& $kelas->guru_id==$value->uid?"selected":"" ?> value="<?= $value->uid ?>"><?= ucwords($value->unama) ?></option>
                              <?php endforeach ?>
                           </select>
                           <span class="guruError"></span>
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
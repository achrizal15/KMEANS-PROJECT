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
          <li class="breadcrumb-item active"><a href="#">Penerimaan</a></li>
          <!-- <li class="breadcrumb-item active">Current</li> -->
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <div class="card mb-5">
      <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
        <form action="<?=base_url('penerimaancontroller/update_kelas')?>" id="save-kmeans" method="POST">

        </form>
        <div class="card-body item-kmeans">
      
        </div>
      </div>
      <!-- TOP METRICS -->
      <div class="row mb-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Manage
            </div>
            <div class="card-body">
              <form id="form-manage-data-kmeans">
                <div class="form-group">
                  <label for="validationCustom02">Angkatan</label>
                  <select name="angkatan" data-parsley-errors-container=".angkatanError" class="form-control dont-change select-basic" id="select-angkatan" required>
                    <option selected value="" hidden>Pilih Satu</option>
                    <?php foreach ($angkatan as $av) :  ?>
                      <option value="<?= $av->aid ?>"><?= $av->aangkatan ?></option>
                    <?php endforeach;  ?>
                  </select>
                  <span class="angkatanError"></span>
                </div>
                <div class="form-group">
                  <label for="validationCustom02">Tingkatan</label>
                  <select name="tingkatan" data-parsley-errors-container=".tingkatanError" class="form-control dont-change select-basic" id="select-tingkatan" required>
                    <option selected value="" hidden>Pilih Satu</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                  </select>
                  <span class="tingkatanError"></span>
                </div>
                <div class="form-group select-c">
                  <label for="validationCustom02">Cluster 1</label>
                  <select name="c1" data-parsley-errors-container=".c1Error" class="form-control select-basic" id="select-c1">
                  </select>
                  <span class="c1Error"></span>
                </div>
                <div class="form-group select-c"">
                  <label for=" validationCustom02">Cluster 2</label>
                  <select name="c2" data-parsley-errors-container=".c2Error" class="form-control select-basic" id="select-c2">
                  </select>
                  <span class="c2Error"></span>
                </div>

                <button class="btn btn-info btn-block">Tampilkan Data</button>
                <button class="btn btn-warning btn-block" type="button" id="generate-kmeans">GENERATE KMEANS</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Siswa</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="siswa-pendaftar-table">
                <h6 class="text-center">
                  Data belum ditampilkan
                </h6>
              </div>
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
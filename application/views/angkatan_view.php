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
          <li class="breadcrumb-item active"><a href="#">Angkatan</a></li>
          <!-- <li class="breadcrumb-item active">Current</li> -->
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <!-- TOP METRICS -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Angkatan</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <!-- <a href="<?= base_url("angkatancontroller/action/add") ?>" class="btn btn-primary mb-3">TAMBAH</a> -->
              <span>Otomatis akan membuka angkatan baru jika periode berakhir.</span>
              <div class="table-responsive">
                <table class="table table-bordered" id="angkatan-table">
                  <thead>
                    <tr>
                      <th>ANGKATAN</th>
                      <th>AWAL PENDAFTARAN</th>
                      <th>AKHIR PENDAFTARAN</th>
                      <th>AWAL PERIODE</th>
                      <th>AKHIR PERIODE</th>
                      <th class="text-nowrap">CREATED AT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($angkatan as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= ucwords($value->aangkatan)  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->aawal_pendaftaran))  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->aakhir_pendaftaran))  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->aawal_periode))  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->aakhir_periode))  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->acreated_at))  ?></td>
                       
                      </tr>
                    <?php endforeach;  ?>
                  </tbody>
                </table>
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
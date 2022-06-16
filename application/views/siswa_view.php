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
          <li class="breadcrumb-item active"><a href="#">Materi</a></li>
          <!-- <li class="breadcrumb-item active">Current</li> -->
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <!-- TOP METRICS -->
      <div class="card mb-3">
        <div class="card-body">
        <form id="filter-table">
            <div class="row">
              <div class="col-md-6">
                <input placeholder="Cari" name="search" id="input-cari" type="search" class="form-control">
              </div>
              <div class="col-md-2">
                <select name="tingkatan" id="tingkatan-filter" style="width: 100%;" class="form-control select-basic">
                  <option value="">Pilih Tingkatan</option>
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                </select>
              </div>
              <div class="col-md-2">
                <button style="width: 100%;" class="btn btn-primary" type="submit">Filter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Siswa</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="siswa-table">
                  <thead>
                    <tr>
                      <th>NAMA</th>
                      <th>EMAIL(UNIQUE)</th>
                      <th>ALAMAT</th>
                      <th>ASAL SEKOLAH</th>
                      <th>ANGKATAN</th>
                      <th>KELAS</th>
                      <th>TINGKATAN</th>
                      <th class="text-nowrap">CREATED AT</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($siswa as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= ucwords($value->snama)  ?></td>
                        <td class="align-middle"><?= $value->semail  ?></td>
                        <td class="align-middle"><?= $value->salamat  ?></td>
                        <td class="align-middle"><?= $value->sasal_sekolah  ?></td>
                        <td class="align-middle"><?= $value->aangkatan  ?></td>
                        <td class="align-middle"><?= $value->knama?$value->knama:"Belum mendapatkan kelas"  ?></td>
                        <td class="align-middle"><?= $value->stingkatan  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->screated_at))  ?></td>
                        <td class="align-middle" width="150px">
                          <a id="delete-siswa" data-id="<?= $value->sid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                        </td>
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
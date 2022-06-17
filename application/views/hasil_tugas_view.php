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
          <li class="breadcrumb-item active"><a href="#">Pengumpulan</a></li>
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
              <h3 class="card-title">Daftar Jam Pembelajaran</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
        
              <div class="table-responsive">
                <table class="table table-bordered" id="pembelajaran-table">
                  <thead>
                    <tr>
                      <th>SISWA</th>
                      <th>JAWABAN</th>
                      <th>FILE</th>
                      <th class="text-nowrap">CREATED AT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tugas as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= $value->snama  ?></td>
                        <td class="align-middle"><?= $value->njawaban ?></td>
                        <td class="align-middle">
                          <?php if ($value->pfile) :  ?>
                            <a href="<?=base_url("assets/file/$value->nfile")?>">Download</a>
                          <?php endif  ?>
                        </td>                      
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->pcreated_at))  ?></td>
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
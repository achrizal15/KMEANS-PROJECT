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
          <li class="breadcrumb-item active"><a href="#">Nilai</a></li>
          <!-- <li class="breadcrumb-item active">Current</li> -->
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <!-- TOP METRICS -->

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Nilai SD</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="soaltes-table">
                  <thead>
                    <tr>
                      <th>NAMA SISWA</th>
                      <?php foreach ($materi as $m) :  ?>
                        <?php if ($m->mtingkatan != "SD") continue;  ?>
                        <th><?= strtoupper($m->mnama) ?></th>
                      <?php endforeach  ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($siswa as $s) :  ?>
                      <?php if ($s->stingkatan != "SD") continue;  ?>
                      <tr>
                        <td><?= ucwords($s->snama)  ?></td>
                        <?php foreach ($materi as $m) :  ?>
                          <?php if ($m->mtingkatan != "SD") continue;
                          $nilai = $this->nilaitesmodels->get(["siswa_id" => $s->sid, "materi_id" => $m->mid]);
                          ?>
                          <td><?= $nilai != null ? $nilai->nilai : 0  ?></td>
                        <?php endforeach  ?>
                      </tr>
                    <?php endforeach;  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Nilai SMP</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="soaltes-table">
                  <thead>
                    <tr>
                      <th>NAMA SISWA</th>
                      <?php foreach ($materi as $m) :  ?>
                        <?php if ($m->mtingkatan != "SMP") continue;  ?>
                        <th><?= strtoupper($m->mnama) ?></th>
                      <?php endforeach  ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($siswa as $s) :  ?>
                      <?php if ($s->stingkatan != "SMP") continue;  ?>
                      <tr>
                        <td><?= ucwords($s->snama)  ?></td>
                        <?php foreach ($materi as $m) :  ?>
                          <?php if ($m->mtingkatan != "SMP") continue;
                          $nilai = $this->nilaitesmodels->get(["siswa_id" => $s->sid, "materi_id" => $m->mid]);
                          ?>
                          <td><?= $nilai != null ? $nilai->nilai : 0  ?></td>
                        <?php endforeach  ?>
                      </tr>
                    <?php endforeach;  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Nilai SMA</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="soaltes-table">
                  <thead>
                    <tr>
                      <th>NAMA SISWA</th>
                      <?php foreach ($materi as $m) :  ?>
                        <?php if ($m->mtingkatan != "SMA") continue;  ?>
                        <th><?= strtoupper($m->mnama) ?></th>
                      <?php endforeach  ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($siswa as $s) :  ?>
                      <?php if ($s->stingkatan != "SMA") continue;  ?>
                      <tr>
                        <td><?= ucwords($s->snama)  ?></td>
                        <?php foreach ($materi as $m) :  ?>
                          <?php if ($m->mtingkatan != "SMA") continue;
                          $nilai = $this->nilaitesmodels->get(["siswa_id" => $s->sid, "materi_id" => $m->mid]);
                          ?>
                          <td><?= $nilai != null ? $nilai->nilai : 0  ?></td>
                        <?php endforeach  ?>
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
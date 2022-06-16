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
                <select name="materi" id="materi-filter" style="width: 100%;" class="form-control select-basic">
                  <option value="">Pilih Materi</option>
                  <?php foreach ($materi as $m) : ?>
                    <option value="<?= $m->mnama ?>"><?= $m->mnama ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-2">
                <button style="width: 100%;" class="btn btn-primary" type="submit">Filter</button>
              </div>
            </div>
          </form>
          <div class="mt-3">
            <table class="table table-striped table-sm" style="width: 100%;">
              <thead>
                <tr class="table-info">
                  <th colspan="4" class="text-center">JUMLAH SOAL TES</th>
                </tr>
                <tr>
                  <th></th>
                  <td>SD</td>
                  <td>SMP</td>
                  <td>SMA</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($materi as $item) :  ?>
                  <tr>
                    <th><?= $item->mnama  ?></th>
                    <td>
                      <?php
                      $jumlah_soalSD = 0;
                      foreach ($soaltest as $j) : ?>
                        <?php if ($j->stingkatan == 'SD' && $j->smateri_id == $item->mid) : ?>
                          <?php $jumlah_soalSD++; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      <?= $jumlah_soalSD  ?>
                    </td>
                    <td>  <?php
                      $jumlah_soalSMP = 0;
                      foreach ($soaltest as $j) : ?>
                        <?php if ($j->stingkatan == 'SMP' && $j->smateri_id == $item->mid) : ?>
                          <?php $jumlah_soalSMP++; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      <?= $jumlah_soalSMP  ?></td>
                    <td> <?php
                      $jumlah_soalSMA = 0;
                      foreach ($soaltest as $j) : ?>
                        <?php if ($j->stingkatan == 'SMA' && $j->smateri_id == $item->mid) : ?>
                          <?php $jumlah_soalSMA++; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      <?= $jumlah_soalSMA  ?></td>
                  </tr>
                <?php endforeach;  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Soal Tes</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <a href="<?= base_url("soaltescontroller/action/add") ?>" class="btn btn-primary mb-3">TAMBAH</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="soaltes-table">
                  <thead>
                    <tr>
                      <th>TINGKATAN</th>
                      <th>SOAL</th>
                      <th>FILE</th>
                      <th>JAWABAN</th>
                      <th>MATERI</th>
                      <th class="text-nowrap">CREATED AT</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($soaltest as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= $value->stingkatan  ?></td>
                        <td class="align-middle" ><div style="width: 200px;" class="text-truncate"><?= $value->ssoal  ?></div></td>
                        <td class="align-middle"><img width="100" src="<?= base_url("assets/file/$value->sfile") ?>" alt=""></td>
                        <td class="align-middle"><?= $value->sjawaban ?></td>
                        <td class="align-middle"><?= $value->mnama ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->screated_at))  ?></td>
                        <td class="align-middle" width="150px">
                          <a href="<?= base_url("soaltescontroller/action/edit/" . $value->sid) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>

                          <a id="delete-soaltes" data-id="<?= $value->sid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
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
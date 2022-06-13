<div id="wrapper" class="container pt-5">
  <div class="card">
    <div class="card-body text-center">
      <h5> SELAMAT DATANG DI ELERNING SISTEM SACHIO</h5>
    </div>
  </div>
  <div class="row align-items-center mt-5">
    <div class="col-md-6">
      <a href="<?= base_url('authcontroller/login') ?>">
        <div class="card">
          <div class="card-body text-center text-danger">
            <i class="fa-solid fa-user-headset" style="font-size: 100px;"></i>
            <h5 class="text-center mt-2">STAFF DAN GURU</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body text-center text-primary">
          <i class="fa-solid fa-user-graduate" style="font-size: 100px;"></i>
          <h5 class="text-center mt-2">SISWA</h5>
        </div>
      </div>
    </div>

  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="text-center mt-2">INFORMASI PENDAFTARAN PESERTA DIDIK BARU</h5>
      <br>
      <ol>
        <li>Pendaftaran dapat dilakukan ketika angkatan baru telah dibuka.</li>
        <li>Pilih angkatan yang tersedia dibawah ini.</li>
        <li>Isi form yang dibutuhkan.</li>
        <li>Mengerjakan tes akademik.</li>
        <li>Menunggu konfirmasi.</li>
      </ol>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th>Angkatan</th>
            <th>Tanggal Buka</th>
            <th>Tanggal Tutup</th>
            <th>Link</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($angkatan) == 0) {
            echo "<tr><td class='text-center' colspan='4'>Pendafataran belum dibuka</td></tr>";
          } else {
            foreach ($angkatan as $a) : ?>
              <tr>
                <td><?= $a->aangkatan ?></td>
                <td><?= date("Y-m-d", strtotime($a->aawal_pendaftaran)) ?></td>
                <td><?= date("Y-m-d", strtotime($a->aakhir_pendaftaran)) ?></td>
                <td><?php if (date("Y-m-d", strtotime($a->aawal_pendaftaran)) <= date("Y-m-d")) :  ?>
                    <a href="<?= base_url('authcontroller/register_siswa/').$a->aid ?>">Daftar</a>
                  <?php endif; ?>
                </td>
              </tr>
          <?php endforeach;
          } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>
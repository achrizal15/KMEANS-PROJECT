<div id="wrapper" class="container pt-5">
    <div class="card shadow p-5">
        <h5 class="text-center">TES AKADEMIK </h5>
        <hr>
        <table>
            <tr>
                <th style="width: 100px;">
                    NAMA
                </th>
                <th> : </th>
                <td>
                    <?= $siswa->nama  ?>
                </td>
                <th>
                </th>
                <th style="width: 100px;">Asal Sekolah</th>
                <th> : </th>
                <td><?= $siswa->asal_sekolah  ?></td>

            </tr>
            <tr>
                <th style="width: 100px;">
                    Tingkatan
                </th>
                <th> : </th>
                <td>
                    <?= $siswa->tingkatan  ?>
                </td>
                <th>
                </th>
                <th style="width: 100px;">Angkatan</th>
                <th> : </th>
                <td><?= $angkatan->angkatan  ?></td>
            </tr>
        </table>
        <hr>
        <p>Kerjakan soal pilihan ganda berikut!</p>
        <article>
            <form action="<?= base_url("home/tes_akademik_submit") ?>" method="POST">
                <ol>
                    <?php foreach ($soal as $ks => $s) : ?>
                        <li><?php if ($s->sfile != null) :  ?>
                                <img src="<?= base_url("assets/file/" . $s->sfile) ?>" width="250">
                                <br>
                            <?php endif;  ?>
                            <?= $s->ssoal ?>
                        </li>
                        <input type="hidden" name="item[<?=$ks?>][soal]" value="<?=$s->sid?>">
                        <?php $jawaban = $this->soaltesmodels->get_pilihan_ganda($s->sid);
                        foreach ($jawaban as $key => $item) :  ?>
                            <div class="form-check" style="margin-bottom: <?= $key == 2 ? '20px' : '' ?> ;">
                         <input class="form-check-input" id="jawaban<?= $ks . $key ?>" type="radio" name="item[<?= $ks ?>][jawaban]" value="<?= $item->id ?>">
                      
                                <label class="form-check-label" for="jawaban<?= $ks . $key ?>">
                                    <?= $item->jawaban ?>
                                </label>
                            </div>
                        <?php endforeach;  ?>
                    <?php endforeach; ?>
                </ol>
                <button type="submit" class="btn btn-primary mt-3">Selesai</button>
            </form>
        </article>
    </div>
</div>
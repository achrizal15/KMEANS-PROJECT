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
                    <li class="breadcrumb-item"><a href="<?= base_url("pembelajarancontroller") ?>">pembelajaran</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Form</a></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <!-- TOP METRICS -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="<?= base_url('home/landing_siswa') ?>"><i class="fa-solid fa-arrow-left"></i></a> <?= $pem->pnama  ?> </h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata("message") ? custom_alert_messages("success", $this->session->flashdata("message")) : "" ?>
                        <br>
                        <table>
                            <tr>
                                <td>Guru</td>
                                <td width="20px"> : </td>
                                <td><?= ucwords($pem->snama) ?></td>
                            </tr>
                            <tr>
                                <td>Materi</td>
                                <td width="20px"> : </td>
                                <td><?= ucwords($pem->mnama) ?></td>
                            </tr>
                            <tr>
                                <td>Tugas</td>
                                <td width="20px"> : </td>
                                <td><?= $pem->tjudul ? "Ada tugas" : "Tidak ada tugas" ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pertemuan</td>
                                <td width="20px"> : </td>
                                <td><?= date("d-m-Y", strtotime($pem->pcreated_at)) ?></td>
                            </tr>
                            <tr>
                                <td class="align-top">Penjelasan Materi</td>
                                <td class="align-top" width="20px"> : </td>
                                <td>
                                    <textarea class="form-control text-justify" cols="100" rows="10" readonly>
                                                <?= $pem->pdeskripsi ?>
                                            </textarea>
                                </td>
                            </tr>
                            <?php if ($pem->tjudul) :  ?>
                                <form action="<?= base_url('pengumpulancontroller/submit_pengumpulan') ?>" method="POST" enctype="multipart/form-data">
                                    <tr>
                                        <td class="align-top">Judul Tugas</td>
                                        <td class="align-top" width="20px"> : </td>
                                        <td>
                                            <?= $pem->tjudul ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-top">Jawaban anda</td>
                                        <td class="align-top" width="20px"> : </td>
                                        <td>
                                            <input type="text" hidden name="p_id" value="<?= $pem->pid ?>">

                                            <textarea name="jawaban" class="form-control text-justify" cols="100" rows="10" placeholder="Ketik jawaban anda disini."><?= isset($jawaban) ? $jawaban->jawaban : ""  ?></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-top">Upload File (Jika dibutuhkan)</td>
                                        <td class="align-top" width="20px"> : </td>
                                        <td>
                                            <input type="file" name="doc">
                                            <?php if (isset($jawaban)) :  ?>
                                                <?php if($jawaban->file!=null) : ?>
                                                    <a href="<?=  base_url("assets/file/" . $jawaban->file) ?>" target="_blank">Download file</a>
                                                    <?php endif  ?>
                                            <?php endif  ?>
                                        </td>
                                    </tr>

                                <?php endif  ?>
                        </table>
                        <br>
                        <?php if ($pem->tjudul != null) : ?>
                            <button class="btn btn-info" type="submit">Kumpulkan Tugas</button>
                            </form>
                        <?php endif  ?>
                    </div>
                </div>
            </div>

            <!-- END TOP METRICS -->


            <!-- END PERFORMANCE INDEX -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
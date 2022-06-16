<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <div class="content-heading">
            <div class="heading-left">
                <h1 class="page-title">Selamat Datang <?= $this->session->userdata("nama")  ?></h1>
                <!-- <p class="page-subtitle">Dashboard ringkasan fitur</p> -->
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Parent</a></li>
					<li class="breadcrumb-item active">Current</li> -->
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <!-- TOP METRICS -->
            <?php echo $this->session->flashdata("message") ? custom_alert_messages("success", $this->session->flashdata("message")) : "" ?>
            <div class="row">
                <?php foreach ($pembelajaran as $key => $value) : ?>
                    <div class="col-sm-12 col-lg-6">
                        <div class="card text-left">
                            <div class="card-header">
                                <?= $value->pnama ?>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Guru</td>
                                        <td width="20px"> : </td>
                                        <td><?= ucwords($value->snama) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Materi</td>
                                        <td width="20px"> : </td>
                                        <td><?= ucwords($value->mnama) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tugas</td>
                                        <td width="20px"> : </td>
                                        <td><?= $value->tjudul ? "Ada tugas" : "Tidak ada tugas" ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pertemuan</td>
                                        <td width="20px"> : </td>
                                        <td><?= date("d-m-Y",strtotime($value->pcreated_at)) ?></td>
                                    </tr>

                                </table>

                                <a href="<?= base_url("pengumpulancontroller/pengumpulan/".$value->pid) ?>" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>

            </div>
            <!-- END TOP METRICS -->



        </div>

        <!-- END PERFORMANCE INDEX -->
    </div>
</div>
<!-- END MAIN CONTENT -->

</div>
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
                        <h3 class="card-title"><?= ucwords($aksi)  ?> MATERI </h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                        <div class="container">
                            <?php foreach ($pertemuan as $key => $value) : ?>
                                <h3><?= ucwords($value->snama)  ?></h3>

                            <?php endforeach;  ?>
                            
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
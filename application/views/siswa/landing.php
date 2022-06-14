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
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-left">
                        <div class="card-header">
						<?= $value->pnama ?>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $value->mnama ?></h5>
                            <p class="card-text"><?= $value->pdeskripsi ?>.
                            </p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>
				<?php endforeach;  ?>
                <!-- <div class="col-sm-6 col-lg-3">
					<div class="widget widget-metric_1 animate">
						<span class="icon-wrapper custom-bg-purple"><i class="fa-solid fa-dolly"></i></span>
						<div class="right">
							<span class="value"><?= $stok_out  ?> <i class="change-icon change-up fa fa-sort-up text-indicator-green"></i></span>
							<span class="title">STOK KELUAR <span class="change text-indicator-green"></span></span>
						</div>
					</div>
				</div> -->
            </div>
            <!-- END TOP METRICS -->



        </div>

        <!-- END PERFORMANCE INDEX -->
    </div>
</div>
<!-- END MAIN CONTENT -->

</div>
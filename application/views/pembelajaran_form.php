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
                        <h3 class="card-title"><?= ucwords($aksi)  ?> pembelajaran</h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                        <form action="<?= base_url("pembelajarancontroller/") . $aksi ?>" data-parsley-validate
                            novalidate method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="mb-3">
                                        <label for="validationCustom02">Kelas</label>
                                        <select name="kelas_id" data-parsley-errors-container=".kelasError"
                                            class="form-control select-basic" id="select-kelas" required>
                                            <option selected value="" hidden>Pilih Satu</option>
                                            <?php foreach ($kelas as $key => $value) : ?>
                                            <?php if ($value->kguru_id!=$this->session->userdata("id"))continue?>
                                            <option value="<?= $value->kid ?>"
                                                <?=isset($pembelajaran)&&$pembelajaran->kelas_id == $value->kid?"selected":""?>>
                                                <?= $value->knama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <span class="kelasError"></span>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="validationCustom02">Materi</label>
                                        <select name="materi_id" data-parsley-errors-container=".materiError"
                                            class="form-control select-basic" id="select-materi" required>
                                            <option selected value="" hidden>Pilih Satu</option>
                                            <?php foreach ($materi as $key => $value) : ?>
                                            <option value="<?= $value->mid ?>"
                                                <?= isset($pembelajaran) && $pembelajaran->materi_id == $value->mid ? "selected" : "" ?>>
                                                <?= $value->mnama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <span class="materiError"></span>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="validationCustom02">File Pendukung Materi
                                            <small>(Opsional)</small></label>
                                        <input type="file" class="dropify" name="doc"
                                            data-default-file="<?= isset($pembelajaran) ? base_url("assets/file/" . $pembelajaran->file) : "" ?>">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <input type="hidden" name="guru_id" value=<?= $this->session->userdata("id")  ?>>
                                    <div class=" mb-3">
                                        <label>Deskripsi <small>(opsional)</small></label>
                                        <textarea name="deskripsi" id="" class="form-control"
                                            placeholder="Tuliskan tentang materi ini"><?= isset($pembelajaran)?$pembelajaran->deskripsi:""  ?></textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="checkbox" id="tugasHandler">
                                        <label for="tugasHandler">
                                            Berikan tugas
                                        </label>

                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                                <div class="col-md-6 " style="visibility:hidden" id="formTugas">
                                   <h3>Tugas</h3>
                                   <div class=" mb-3">
                                        <label>Judul</label>
                                        <input name="judul" id="" class="form-control"><?= isset($tugas->judul)?$tugas->judul:""  ?>
                                    </div>
                                   <div class=" mb-3">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" id="" class="form-control"><?= isset($tugas->deskripsi)?$tugas->deskripsi:""  ?> </textarea>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- END TOP METRICS -->


            <!-- END PERFORMANCE INDEX -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
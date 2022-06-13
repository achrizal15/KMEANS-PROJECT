<div id="wrapper" class="container pt-5">
    <div class="card shadow">
        <div class="card-body p-5">
            <h5 class="text-center mb-5"> REGISTER SISWA</h5>
            <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
            <form action="<?= base_url("authcontroller/add_siswa") ?>" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $angkatan->id ?>" name="angkatan_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Nama</label>
                            <input type="text" required class="form-control" name="nama">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02">Email</label>
                            <input type="email" required class="form-control" name="email">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02">Alamat</label>
                            <input type="text" required class="form-control" name="alamat">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Asal Sekolah</label>
                            <input type="text" required class="form-control" name="asal_sekolah">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02">Password</label>
                            <input type="password" required class="form-control" name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02">Tingkatan</label>
                            <select name="tingkatan" data-parsley-errors-container=".tingkatanError" class="form-control select-basic" id="select-role" required>
                                <option selected value="" hidden>Pilih Satu</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                            </select>
                            <span class="tingkatanError"></span>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="<?= base_url("authcontroller/landing/") ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
        </div>
        </form>
    </div>

</div>
</div>
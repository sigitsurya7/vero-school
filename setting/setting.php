<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Setting</h4>
                <p class="card-title-des">Setting Sekolah</p>
            </div>
            <div class="card-body">
                <form action="../api/settings-api" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="namaSekolah">Nama Sekolah: <?php echo $settings['namasekolah']?></label>
                                <input type="text" class="form-control" name="namasekolah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="idServer">ID SERVER: <?php echo $settings['idserver']?></label>
                                <input type="text" class="form-control" name="idserver">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="alamatSekolah">Alamat Sekolah: <?php echo $settings['alamatsekolah']?></label>
                                <input type="text" class="form-control" name="alamatsekolah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="npsnSekolah">NPSN Sekolah: <?php echo $settings['npsnsekolah']?></label>
                                <input type="text" class="form-control" name="npsnsekolah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="alamatSekolah">Email Sekolah: <?php echo $settings['email']?></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="npsnSekolah">Nomor tlp Sekolah: <?php echo $settings['nomortlp']?></label>
                                <input type="text" class="form-control" name="nomortlp">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="namaKepalaSekolah">Nama Kepala Sekolah: <?php echo $settings['namakepalasekolah']?></label>
                                <input type="text" class="form-control" name="namakepalasekolah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="logosekolah">Logo Sekolah: </label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo $base_url['foto']?>/<?php echo $settings['logosekolah']?>" alt="LogoSekolah" width="100%">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="logosekolah">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary waves-effect waves-light">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: Pastikan sebelum input data sudah benar :)</p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
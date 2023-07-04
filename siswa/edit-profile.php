<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-ttile">Edit Prodfile</h4>
                <form action="../api/siswa-api" method="POST">
                    <input type="hidden" name="idpendaftaran" value="<?php echo $authsiswa['idpendaftaran']; ?>">
                    <div class="form-group mb-3">
                        <label for="tempat">Tempat Lahir: </label>
                        <input type="text" class="form-control" name="tempat">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggalLahir">Tanggal Lahir: </label>
                        <input type="date" class="form-control" name="ttl">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat: </label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group mb-3">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" name="agama">
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit" name="addBiodata" value="addDataBiodata">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
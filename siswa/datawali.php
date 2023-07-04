<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Isi Data Orang Tua Dengan Benar!
                </h4>
            </div>
            <div class="card-body">
                <form action="../api/siswa-api" method="POST">
                    <div class="form-group mb-3">
                        <label for="namaWali">Nama Wali / Orang Tua :</label>
                        <input name="namawali" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomorWhatsApp">No WhatsApp Wali / Orang Tua:</label>
                        <input name="nowhatsapp" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="idpendaftaran" value="<?php echo $authsiswa['idpendaftaran']; ?>">
                        <button type="submit" name="addWali" value="addDataWali" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="card-title-des">
                    Note : Masukan data dengan benar agar kartu absensi bisa di gunakan :)
                </p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="form-group mb-3">
                        <label for="namaWali">Nama :</label>
                        <input type="text" class="form-control" value="<?php echo $profileWali['namawali']; ?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="namaWali">Nomor WhatsApp :</label>
                        <input type="text" class="form-control" value="<?php echo $profileWali['nowhatsapp']; ?>" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
<?php

    require_once '../layouts/head.php';

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Import Data Master Buku</h4>
                <p class="card-title-desc">
                    <a type="button" href="../assets/file/datamasterbuku.xlsx" class="btn btn-success waves-effect btn-label waves-light" download="datamaster.xlsx"><i class="bx bx-download label-icon"></i> Download file </a>
                </p>
            </div>
            <div class="card-body">

                <form action="../api/importbuku-api.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control mb-3" type="file" name="file">
                    <input class="btn btn-primary" name="buku" type="submit">
                </form>    

            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: pastikan upload data sesuai dengan file yang sudah di sediakan :)!</p>
            </div>
        </div>
    </div>
</div>


<?php

    require_once '../layouts/footer.php';

?>
<?php 

    require_once "../layouts/head.php";
    
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Import Data Master Siswa</h4>
                <p class="card-title-desc">
                    <a type="button" href="../assets/file/datamastersiswa.xlsx" class="btn btn-success waves-effect btn-label waves-light" download="datamaster.xlsx"><i class="bx bx-download label-icon"></i> Download file </a>
                </p>
            </div>
            <div class="card-body">

                <form action="../api/import-api.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control mb-3" type="file" name="file">
                    <input name="importData" value="importDataMaster" class="btn btn-primary" type="submit">
                </form>    

            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: pastikan upload data sesuai dengan file yang sudah di sediakan :)!</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Import Data Guru</h4>
                <p class="card-title-desc">
                    <a type="button" href="../assets/file/datamasterguru.xlsx" class="btn btn-success waves-effect btn-label waves-light" download="datamasterguru.xlsx"><i class="bx bx-download label-icon"></i> Download file </a>
                </p>
            </div>
            <div class="card-body">

                <form action="../api/import-api.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control mb-3" type="file" name="file">
                    <input name="importData" value="importDataGuru" class="btn btn-primary" type="submit">
                </form>    

            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: pastikan upload data sesuai dengan file yang sudah di sediakan :)!</p>
            </div>
        </div>
    </div>
</div>

<?php require_once "../layouts/footer.php"?>
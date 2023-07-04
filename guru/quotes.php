<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary waves-effect waves-light mt-2 mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bx bx-plus font-size-16 align-middle me-2"></i>Tambah Data
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah data <?php echo $file2; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../api/guru-api" method="POST">
                        <div class="modal-body">
                            <div class="form-group" style="text-align: left;">
                                <p for="isi">Isi:</p>
                                <input type="hidden" name="namaguru" value="<?php echo $_SESSION['namaguru']; ?>">
                                <textarea class="form-control" name="deskripsi" id="" placeholder="Apa yang anda pikirkan ?" cols="100%" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" value="quotes" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" data-masonry='{"percentPosition": true }'>
            <?php foreach($quotes as $row): ?>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote font-size-14 mb-0">
                            <p><?php echo $row['deskripsi']?></p>
                            <footer class="blockquote-footer mt-0 font-size-12">
                                Created By : <cite title="Source Title"><?php echo $row['namaguru']; ?></cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
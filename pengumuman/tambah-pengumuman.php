<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'operator') {
        // The user does not have the required role, so redirect them or display an error message
        echo '<script type="text/javascript">';
        echo 'window.location.href="../error/403.php";';
        echo '</script>';
        exit;
    }
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pengumuman</h4>
                <p class="card-title-des">Masukan Pengumuman</p>
            </div>
            <div class="card-body">
                <form action="../api/pengumuman-api.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="judulPengumuman">Judul Pengumuman :</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsiPengumuman">Isi Pengumuman :</label>
                        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary waves-effect waves-light">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: Pastikan Data sudah benar ! <i class="bx bx-smile"></i></p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
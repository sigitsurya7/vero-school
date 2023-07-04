<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'guru') {
        // The user does not have the required role, so redirect them or display an error message
        echo '<script type="text/javascript">';
        echo 'window.location.href="../error/403.php";';
        echo '</script>';
        exit;
    }

?>


<div class="row">
    <div class="col-xl-4">
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rekap Data Bulanan</h4>
            </div>
            <div class="card-body">
                <form action="rekap" method="POST">
                    <div class="form-group mb-3">
                        <label for="example-date-input" class="form-label">Dari Tanggal</label>
                        <input class="form-control" name="from" type="date" value="<?php echo $date?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-date-input" class="form-label">Sampai Tanggal</label>
                        <input class="form-control" name="to" type="date" value="<?php echo $date?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-8"></div>
</div>


<?php

    require_once '../layouts/footer.php';

?>
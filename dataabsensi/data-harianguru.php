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
    <div class="col-xl-12">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data harian Siswa</h4>
                    <p class="card-title-des">Tanggal hari ini : <?php echo tgl_indo($date); ?></p>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-stripped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Jam Masuk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach ($attendanceGuru as $a): ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $a['namaguru']?></td>
                                    <td><?php echo $a['jam']?></td>
                                </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
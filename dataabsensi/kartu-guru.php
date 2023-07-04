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
                <h4 class="card-title">Data Kartu Siswa</h4>
                <p class="card-title-des">Jika UID tidak ada maka tambahkan siswa</p>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-stripped dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Guru</th>
                            <th>UID KARTU</th>
                            <th>Nama Guru</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($cGuru as $c):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $c['idguru']?></td>
                                <td><?php echo $c['uid']?></td>
                                <td><?php echo $c['namaguru']?></td>
                                <td><a href="add-cardguru?idguru=<?php echo $c['idguru'] ?>" class="btn btn-primary"><i class="bx bx-plus-circle font-size-16 align-middle me-2 "></i>Add UID</a></td>
                            </tr>
                        <?php $no++; ?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
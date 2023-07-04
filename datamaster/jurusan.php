<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
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
            <div class="p-3 px-lg-4 border-bottom">
                <div class="row">
                    <div class="col-xl-4 col-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title">jurusan</h5>
                                <p class="text-muted text-truncate mb-0">Masukan data master untuk jurusan siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-5">
                        <ul class="list-inline user-chat-nav text-end mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="bx bx-plus font-size-16 align-middle me-2"></i>Tambah Data
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah data <?php echo $file2; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="../api/jurusan-api" method="POST">
                                                    <div class="modal-body">
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                            <p for="namajurusan">ID jurusan:</p>
                                                            <input type="text" name="idjurusan" class="form-control">
                                                        </div>
                                                        <div class="form-group" style="text-align: left;">
                                                            <p for="namajurusan">Nama jurusan:</p>
                                                            <input type="text" name="namajurusan" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                        </ul>                                                                                                                                                                                                                                                                                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID jurusan</th>
                                <th>Nama jurusan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            <?php foreach($jurusan as $p):?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $p['idjurusan']?></td>
                                <td><?php echo $p['namajurusan']?></td>
                                <td><a href="../api/jurusan.php?hapus&id=<?php echo $p['id']?>" class="btn btn-danger"><i class="bx bx-error-circle font-size-16 align-middle me-2 "></i> Hapus</a></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <p class="card-title-des">Data <?php echo strtoupper($file2) ?></p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
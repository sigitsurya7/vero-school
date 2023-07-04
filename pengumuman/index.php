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
            <div class="p-3 px-lg-4 border-bottom">
                <div class="row">
                    <div class="col-xl-4 col-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title">Pengumuman</h5>
                                <p class="text-muted text-truncate mb-0">Buat Pengumuman untuk Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-5">
                        <ul class="list-inline user-chat-nav text-end mb-0">
                            <li class="list-inline-item">
                                <a href="tambah-pengumuman" type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Data
                                </a>
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
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            <?php foreach($pengumuman as $p):?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $p['judul']?></td>
                                <td><?php echo $p['deskripsi']?></td>
                                <td><?php echo $p['datecreated']?></td>
                                <td><a href="../api/pengumuman-api.php?hapus&id=<?php echo $p['id']?>" class="btn btn-danger"><i class="bx bx-error-circle font-size-16 align-middle me-2 "></i> Hapus</a></td>
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

<?php require_once '../layouts/footer.php'?>
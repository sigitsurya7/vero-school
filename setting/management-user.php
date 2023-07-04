<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-4 col-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title">Management User</h5>
                                <p class="text-muted text-truncate mb-0">Masukan data User</p>
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
                                            <form action="../api/managementuser-api" method="POST">
                                                <div class="modal-body">
                                                <div class="form-group" style="text-align: left;">
                                                        <p for="nama">Nama:</p>
                                                        <input type="text" name="nama" class="form-control">
                                                    </div>
                                                    <div class="form-group" style="text-align: left;">
                                                        <p for="username">Username:</p>
                                                        <input type="text" name="username" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="password">Password:</p>
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="role">Role User:</p>
                                                        <select class="form-control" name="role" id="role">
                                                            <option value="admin">Admin</option>
                                                            <option value="bp">BP</option>
                                                            <option value="kesiswaan">Kesiswaan</option>
                                                            <option value="operator">Operator</option>
                                                            <option value="tu">Tata Usaha</option>
                                                            <option value="perpustakaan">Perpustakaan</option>
                                                        </select>
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
                <table id="datatable" class="table table-stripped dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($authuser as $l):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $l['nama']; ?></td>
                            <td><?php echo $l['username']; ?></td>
                            <td><?php echo $l['role']; ?></td>
                            <td><a href="../api/management-user?hapus&id=<?php echo $l['id']?>" class="btn btn-danger"><i class="bx bx-error-circle font-size-16 align-middle me-2 "></i> Hapus</a></td>
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
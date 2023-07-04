<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Management User Guru</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-stripped dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Wali Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($authguru as $l):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $l['namaguru']; ?></td>
                            <td><?php echo $l['username']; ?></td>
                            <td><?php echo $l['role']; ?></td>
                            <td><?php echo $l['idkelas']; ?></td>
                            <td><a href="../api/management-user?hapus&id=<?php echo $l['idguru']?>" class="btn btn-danger"><i class="bx bx-error-circle font-size-16 align-middle me-2 "></i> Hapus</a></td>
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

    require_once "../layouts/footer.php";

?>
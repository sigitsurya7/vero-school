<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pendaftaran</th>
                            <th>NIS</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($dataSiswa as $u): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $u['idpendaftaran']; ?></td>
                            <td><?php echo $u['nis']?></td>
                            <td><?php echo $u['namasiswa']?></td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
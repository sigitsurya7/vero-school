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
                            <th>ID Guru</th>
                            <th>Nama Guru</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($absenGuru as $row):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['idguru']; ?></td>
                            <td><?php echo $row['namaguru']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['jam']; ?></td>
                            <td><?php echo $row['status']; ?></td>
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
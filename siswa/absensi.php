<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    YUK Liat Absensi Kamu Selama Ini...
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach($absensi as $a ):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo tgl_indo($a['date']); ?></td>
                                <td><?php echo $a['jam']?></td>
                                <td><?php echo $a['status']; ?></td>
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

    require_once '../layouts/footer.php';

?>
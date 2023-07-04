<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Prestasi</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Prestasi</th>
                            <th>Deskripsi Prestasi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach($prestasi as $l):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $l['namasiswa']; ?></td>
                                <td><?php echo $l['judul']; ?></td>
                                <td><?php echo $l['deskripsi']; ?></td>
                                <td><?php echo tgl_indo($l['date']); ?></td>
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
<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pengembalian Buku</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach($pengembalian as $p):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p['namasiswa']?></td>
                                <td><?php echo $p['idkelas']?></td>
                                <td><?php echo $p['idjurusan']?></td>
                                <td><?php echo $p['namabuku']?></td>
                                <td><?php echo tgl_indo($p['loandate'])?></td>
                                <td><?php echo tgl_indo($p['returndate'])?></td>
                                <td><?php echo $p['keterangan']?></td>
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
<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Buku Perpustakaan
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-stripped dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Peminjaman Buku</th>
                            <th>Tanggal Pengembalian Buku</th>
                            <th>Status Peminjaman / Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach($perpus as $p):?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $p['namabuku']; ?></td>
                                <td><?php echo tgl_indo($p['loandate']); ?></td>
                                <td><?php echo tgl_indo($p['returndate']); ?></td>
                                <td>
                                    <?php
                                        if($p['keterangan'] == "PEMINJAMAN" && $p['returndate'] <= $date){
                                            echo "SUDAH WAKTUNYA MENGEMBALIKAN";
                                        }else{
                                            echo "MEMINJAM";
                                        }
                                    ?>
                                </td>
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
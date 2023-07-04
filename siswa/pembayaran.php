<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rekap Pembayaran</h4>

                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Pembayaran</th>
                            <th>Nama Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($paymentHistory as $p): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p['payment_code']; ?></td>
                                <td>
                                    <?php
                                        if($p['payment_type'] == "primary"){
                                            echo $p['payment_name'].' '.$p['month'];
                                        }else{
                                            echo $p['payment_name'];
                                        }
                                    ?>
                                </td>
                                <td><?php echo tgl_indo($p['date']); ?></td>
                                <td><?php echo $p['amount']; ?></td>
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
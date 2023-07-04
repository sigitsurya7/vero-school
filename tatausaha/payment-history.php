<?php

    require_once '../layouts/head.php';
    $idpendaftaran = $payment_name = (filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING));

    //** Payment History PRIMARY */
    $sql = "SELECT * FROM masterpayment JOIN payment_history ON masterpayment.payment_code=payment_history.payment_code JOIN datasiswa ON payment_history.idpendaftaran=datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran = '$idpendaftaran' AND masterpayment.payment_type='primary'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $primary = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Payment History ADDITIONAL */
    $sql = "SELECT * FROM masterpayment JOIN payment_history ON masterpayment.payment_code=payment_history.payment_code JOIN datasiswa ON payment_history.idpendaftaran=datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran = '$idpendaftaran' AND masterpayment.payment_type='additional'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $additional = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pembayaran Primary
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembayaran</th>
                            <th>Code Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach($primary as $p):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p['payment_name']; ?></td>
                                <td><?php echo $p['payment_code']; ?></td>
                                <td><?php echo tgl_indo($p['date']); ?></td>
                                <td><?php echo $p['amount']; ?></td>
                            </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pembayaran Additional
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembayaran</th>
                            <th>Code Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach($additional as $a):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $a['payment_name']; ?></td>
                                <td><?php echo $a['payment_code']; ?></td>
                                <td><?php echo $a['date']; ?></td>
                                <td><?php echo $a['amount']; ?></td>
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
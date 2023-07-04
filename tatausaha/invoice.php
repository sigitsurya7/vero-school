<?php

    require_once '../layouts/head.php';
    $idpendaftaran = $payment_name = (filter_input(INPUT_GET, 'idpendaftaran', FILTER_SANITIZE_STRING));

    //** Payment History PRIMARY */
    $sql = "SELECT * FROM masterpayment JOIN payment_history ON masterpayment.payment_code=payment_history.payment_code JOIN datasiswa ON payment_history.idpendaftaran=datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran = '$idpendaftaran'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $primary = $stmt->fetch(PDO::FETCH_BOTH);

?>

<?php echo $primary['namasiswa']; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <div class="mb-4">
                                <img src="<?php echo $base_url['foto']?>/<?php echo $settings['logosekolah']?>" alt="" height="24"><span class="logo-txt"><?php echo $settings['namasekolah']?></span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="mb-4">
                                <h4 class="float-end font-size-16">Invoice # <?php echo $primary['id']; ?></h4>
                            </div>
                        </div>
                    </div>


                    <p class="mb-1"><?php echo $settings['alamatsekolah']?></p>
                    <p class="mb-1"><i class="mdi mdi-email align-middle mr-1"></i> abc@123.com</p>
                    <p><i class="mdi mdi-phone align-middle mr-1"></i> 012-345-6789</p>
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <h5 class="font-size-15 mb-3">Atas Nama:</h5>
                            <h5 class="font-size-14 mb-2"><?php echo $primary['namasiswa']?></h5>
                            <p class="mb-1">Kelas : <?php echo $primary['idkelas']; ?></p>
                            <p class="mb-1">Jurusan : <?php echo $primary['idjurusan']; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div>
                                <h5 class="font-size-15">Tanggal Pembayaran:</h5>
                                <p><?php echo tgl_indo($primary['date']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-2 mt-3">
                    <h5 class="font-size-15">Nama Pembayaran : <?php echo $primary['payment_name']; ?></h5>
                </div>
                <div class="p-4 border rounded">
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Kode Pembayaran</th>
                                    <th class="text-end" style="width: 120px;">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1"><?php echo $primary['payment_code'];?></h5>
                                    </td>
                                    <td class="text-end"><?php echo rupiah($primary['amount']); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row" colspan="2" class="text-end">Nominal Yang harus di bayarkan</th>
                                    <td class="text-end"><?php echo rupiah($primary['payment_amount']); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end">
                                        <h4 class="m-0"><?php echo rupiah($primary['amount'])?></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-print-none mt-3">
                    <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
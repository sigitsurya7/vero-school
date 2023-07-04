<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-4 col-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title">Master Pembayaran</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-5">
                        <ul class="list-inline user-chat-nav text-end mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="bx bx-plus font-size-16 align-middle me-2"></i>Tambah Data
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah data <?php echo $file2; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../api/payment-api" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="paymentCode">Kode Pembayaran:</p>
                                                        <input type="text" name="payment_code" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="paymentName">Nama Pembayaran:</p>
                                                        <input type="text" name="payment_name" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="paymentType">Tipe Pembayaran:</p>
                                                        <select name="payment_type" id="paymentType" class="form-control">
                                                            <option value="primary">Primary</option>
                                                            <option value="additional">Additional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="schoolYear">Tahun Ajaran:</p>
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <select name="fromyear" id="fromYear" class="form-control">
                                                                        <?php
                                                                            $currentYear = date('Y');
                                                                            $years = array();
                                                                            for ($i = $currentYear; $i <= $currentYear + 30; $i++) {
                                                                              $years[] = $i;
                                                                            }
                                                                            foreach ($years as $year):
                                                                        ?>
                                                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <select name="toyear" class="form-control" id="toYear">
                                                                        <?php
                                                                            $currentYear = date('Y');
                                                                            $years = array();
                                                                            for ($i = $currentYear; $i <= $currentYear + 30; $i++) {
                                                                              $years[] = $i;
                                                                            }
                                                                            foreach ($years as $year):
                                                                        ?>
                                                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="idKelas">Kelas:</p>
                                                        <select name="idkelas" id="idKelas" class="form-control">
                                                            <option value="all">Semua Kelas</option>
                                                            <?php foreach($level as $lvl):?>
                                                            <option value="<?php echo $lvl['idlevel']?>"><?php echo $lvl['namalevel']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="add" value="addData" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>                                                                                                                                                                                                                                                                                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pembayaran</th>
                            <th>Nama Pembayaran</th>
                            <th>Tahun Ajaran</th>
                            <th>Tipe</th>
                            <th>Tarif Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($mpayment as $mp):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $mp['payment_code']; ?></td>
                            <td><?php echo $mp['payment_name']; ?></td>
                            <td><?php echo $mp['school_year']; ?></td>
                            <td><?php echo $mp['payment_type']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#MP<?php echo $mp['payment_id']?>">
                                    <i class="bx bx-plus font-size-16 align-middle me-2"></i>Setting Transaksi
                                </button>
                                <div class="modal fade" id="MP<?php echo $mp['payment_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah data <?php echo $file2; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../api/payment-api" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="payment_amount">Nama siswa:</p>
                                                        <input type="hidden" name="payment_id" value="<?php echo $mp['payment_id']; ?>">
                                                        <input type="text" name="payment_amount" class="form-control" id="currency-mask">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" value="updateData" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: <br> Primary = Pembayaran bulanan. <br> Additional = Pembayaran tambahan diluar Primary</p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
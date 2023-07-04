<?php

    require_once '../layouts/head.php';
    $idpendaftaran = (filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING));

?>
<?php echo $idpendaftaran; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Pembayaran Primary
                </h4>
            </div>
            <div class="card-body">
                <form action="../api/payment-api" method="POST">
                    <div class="form-group mb-3">
                        <label for="namaPembayaran">Nama Pembayaran:</label>
                        <select name="payment_code" class="form-control" id="payment_name">
                            <?php foreach($mpayment as $p):?>
                                <?php
                                
                                    if($p['payment_type'] == 'primary'){
                                        echo "<option value='".$p['payment_code']."'>".$p['payment_name']."</option>";
                                    }
                                    
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Month">Untuk Bulan</label>
                        <select name="month" class="form-control" id="date">
                            <?php
                            
                            for ($month = 1; $month <= 12; $month++) {
                                // Get the month name
                                $monthName = date('F', mktime(0, 0, 0, $month, 1));
                                // Output the month name
                                echo "<option value='".$monthName."'>".$monthName."</option>";
                            }                            
                            
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="payment_amount">Total Bayar</label>
                        <input type="text" name="amount" class="form-control">
                        <input type="hidden" name="idpendaftaran" value="<?php echo $idpendaftaran; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addtrx" value="primary" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Pembayaran Additional
                </h4>
            </div>
            <div class="card-body">
                <form action="../api/payment-api" method="POST">
                    <div class="form-group mb-3">
                        <label for="namaPembayaran">Nama Pembayaran:</label>
                        <select name="payment_code" class="form-control" id="payment_name">
                            <?php foreach($mpayment as $p):?>
                                <?php
                                
                                    if($p['payment_type'] == 'additional'){
                                        echo "<option value='".$p['payment_code']."'>".$p['payment_name']."</option>";
                                    }
                                    
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="payment_amount">Total Bayar</label>
                        <input type="text" name="amount" class="form-control">
                        <input type="hidden" name="idpendaftaran" value="<?php echo $idpendaftaran; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addtrx" value="additional" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
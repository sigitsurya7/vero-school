<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Siswa
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($siswa as $s):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $s['idpendaftaran']; ?></td>
                                <td><?php echo $s['namasiswa']; ?></td>
                                <td><?php echo $s['idkelas']; ?></td>
                                <td><?php echo $s['idjurusan']; ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <form action="payment-history" method="POST">
                                                <input type="hidden" name="idpendaftaran" value="<?php echo $s['idpendaftaran']; ?>">
                                                <button type="submit" class="btn btn-primary"><i class="bx bx-history font-size-16 align-middle me-2"></i>History</button>
                                            </form>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="payment-trx" method="POST">
                                                <input type="hidden" name="idpendaftaran" value="<?php echo $s['idpendaftaran']; ?>">
                                                <button type="submit" class="btn btn-primary"><i class="bx bx-plus font-size-16 align-middle me-2"></i>Pay</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
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
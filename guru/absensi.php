<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="width: 10px;">NO</th>
                            <th>Nama</th>
                            <th style="width: 350px;">Absensi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;?>
                    <?php foreach($dataSiswa as $row):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['namasiswa']?></td>
                            <td>
                            <?php
                                $status = '<div class="row">
                                <div class="col-2">
                                    <form action="../api/guru-api" method="POST">
                                        <input type="hidden" name="uid" value="'.$row['uid'].'">
                                        <input type="hidden" name="status" value="IZIN">
                                        <button class="btn btn-warning" type="submit" name="add" value="stts">IZIN</button>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <form action="../api/guru-api" method="POST">
                                        <input type="hidden" name="uid" value="'.$row['uid'].'">
                                        <input type="hidden" name="status" value="SAKIT">
                                        <button class="btn btn-danger" type="submit" name="add" value="stts">SAKIT</button>
                                    </form>
                                </div>
                            </div>';
                                foreach($absen as $data){
                                    if($row['idpendaftaran'] == $data['idpendaftaran']){
                                    $status = $data['status'];
                                    break;
                                    }
                                    }
                                    echo $status;
                                    ?>
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

    require_once "../layouts/footer.php";

?>
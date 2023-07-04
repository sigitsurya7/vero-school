<?php

require_once "../layouts/head.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'operator') {
    // The user does not have the required role, so redirect them or display an error message
    echo '<script type="text/javascript">';
    echo 'window.location.href="../error/403.php";';
    echo '</script>';
    exit;
}

?>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data harian Siswa</h4>
                    <p class="card-title-des">Tanggal hari ini : <?php echo tgl_indo($date); ?></p>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-stripped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>Status</td>
                                <td>Jam Masuk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach ($attendance as $a): ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $a['namasiswa']?></td>
                                    <td><?php echo $a['idkelas']?></td>
                                    <td><?php echo $a['status']?></td>
                                    <td><?php echo $a['jam']?></td>
                                </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-header">Data Per-Kelas</h4>
            </div>
            <div class="card-body">
                <form action="data-kelas" method="POST">
                    <div class="form-group mb-3">
                        <label for="pilihKelas">Pilih Kelas</label>
                        <select class="form-control" name="idkelas" id="">
                            <?php foreach($kelas as $kls): ?>
                                <option value="<?php echo $kls['namakelas']?>"><?php echo $kls['namakelas']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SUBMIT" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
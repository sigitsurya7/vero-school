<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Siswa Kesiswaan</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-stripped dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Kelas</th>
                            <?php
                                if(JENJANG == "SMK"){
                                    echo "<th>Jurusan</th>";
                                }
                            ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($siswa as $p):?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $p['nis']?></td>
                            <td><?php echo $p['namasiswa']?></td>
                            <td><?php echo $p['idkelas']?></td>
                            <?php
                                if(JENJANG == "SMK"){
                                    echo "<td>";
                                    echo $p['idjurusan'];
                                    echo "</td>";
                                }
                            ?>
                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#<?php echo $p['idpendaftaran']?>">
                                    <i class="bx bx-plus font-size-16 align-middle me-2"></i>Buat Laporan
                                </button>
                                <div class="modal fade" id="<?php echo $p['idpendaftaran']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Data Laporan : <?php echo $p['namasiswa']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../api/siswa-api" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="namasiswa">Nama siswa:</p>
                                                        <input type="text" name="namasiswa" value="<?php echo $p['namasiswa']?>" class="form-control" disabled>
                                                        <input type="hidden" name="idpendaftaran" value="<?php echo $p['idpendaftaran']; ?>">
                                                        <input type="hidden" name="nowhatsapp" value="<?php echo $p['nowhatsapp']; ?>">
                                                        <input type="hidden" name="namasiswa" value="<?php echo $p['namasiswa']; ?>">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="judulLaporan">Judul Laporan:</p>
                                                        <input type="text" name="judul" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="deskripsiLaporan">Deskripsi:</p>
                                                        <input type="text" name="deskripsi" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="jenisLaporan">Jenis Laporan: </p>
                                                        <select name="jenis" id="jenis" class="form-control">
                                                            <option value="prestasi">Prestasi</option>
                                                            <option value="pelanggaran">Pelanggaran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="addReport" value="addDataReport" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

    require_once '../layouts/footer.php';

?>
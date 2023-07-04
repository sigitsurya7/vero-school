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
                                <h5 class="card-title">Peminjaman Buku</h5>
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
                                            <form action="../api/perpus-api" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="namasiswa">Nama siswa:</p>
                                                        <select name="idpendaftaran" id="namaSiswa" data-trigger placeholder="This is a search placeholder">
                                                            <?php foreach($siswa as $d):?>
                                                            <option value="<?php echo $d['idpendaftaran']?>"><?php echo $d['namasiswa']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="namasiswa">Nama Buku:</p>
                                                        <select name="book" class="form-control" id="book" data-trigger placeholder="This is a search placeholder">
                                                            <?php foreach($buku as $d):?>
                                                            <option value="<?php echo $d['idbuku'].','.$d['jumlah']?>"><?php echo $d['namabuku']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="tanggalpeminjaman">Tanggal Peminjaman:</p>
                                                        <input type="date" class="form-control" name="loandate">
                                                    </div>
                                                    <div class="form-group mb-3" style="text-align: left;">
                                                        <p for="tanggalpengembalian">Tanggal Pengembalian:</p>
                                                        <input type="date" class="form-control" name="returndate">
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
                            <th>NO</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach($peminjaman as $p):?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p['namasiswa']?></td>
                                <td><?php echo $p['idkelas']?></td>
                                <td><?php echo $p['idjurusan']?></td>
                                <td><?php echo $p['namabuku']?></td>
                                <td><?php echo tgl_indo($p['loandate'])?></td>
                                <td><?php echo tgl_indo($p['returndate'])?></td>
                                <td>
                                    <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#D<?php echo $p['trxid']?>">
                                        <i class="bx bx-book font-size-16 align-middle me-2"></i>Kembalikan Buku
                                    </button>
                                    <div class="modal fade" id="D<?php echo $p['trxid']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="KembalikanLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="../api/perpus-api" method="POST">
                                                    <div class="modal-body">
                                                        <?php
                                                            $keterangan = '';
                                                            $now = new DateTime();
                                                            $returndate = new DateTime($p['returndate']);
                                                            if($returndate < $now){
                                                                $keterangan = 'Pengembalian Buku Telat';
                                                            }else if($returndate >= $now ){
                                                                $keterangan = 'Pengembalian Buku Tepat Waktu';
                                                            }
                                                        
                                                        ?>
                                                        <div class="form-group mb-3">
                                                            <p><b>Nama Buku :</b> <?php echo $p['namabuku'] ?></p>
                                                            <input type="hidden" name="idbuku" value="<?php echo $p['idbuku']?>">
                                                            <input type="hidden" name="id" value="<?php echo $p['trxid']?>">
                                                            <input type="hidden" name="namabuku" value="<?php echo $p['namabuku']?>">
                                                            <input type="hidden" name="idpendaftaran" value="<?php echo $p['idpendaftaran']?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <p><b>Tanggal Peminjaman</b> : <?php echo $p['loandate'] ?></p>
                                                            <input type="hidden" name="loandate" value="<?php echo $p['loandate']?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <p><b>Tanggal Pengembalian :</b> <?php echo $p['returndate'] ?></p>
                                                            <input type="hidden" name="returndate" value="<?php echo $date ?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <p><b>Keterangan :</b> <?php echo $keterangan ?></p>
                                                            <input type="hidden" name="keterangan" value="<?php echo $keterangan?>">
                                                            <input type="hidden" name="unit" value="<?php echo $p['unit']?>">
                                                            <input type="hidden" name="jumlah" value="<?php echo $p['jumlah']?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="update" value="updateData">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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
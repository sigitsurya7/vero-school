<?php

    require_once '../layouts/head.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Buku</h4>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Penerbit</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($buku as $book):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $book['namabuku']?></td>
                            <td><?php echo $book['penerbit']?></td>
                            <td><?php echo $book['deskripsi']?></td>
                            <td><?php echo $book['jumlah']?></td>
                        </tr>
                        <?php $no++;?>
                        <?php endforeach;?>
                    </tbody>
                </table> 

            </div>
            <div class="card-footer">
                <p class="card-title-des">Note: pastikan upload data sesuai dengan file yang sudah di sediakan :)!</p>
            </div>
        </div>
    </div>
</div>

<?php

    require_once '../layouts/footer.php';

?>
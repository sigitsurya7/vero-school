<?php

    require_once "../layouts/head.php";

?>

<div class="row">
    <div class="col-sm-12">
        <h4 class="mb-3">Laporan Siswa <?php echo $authsiswa['namasiswa']; ?></h4>

        <div class="row mb-3 mt-3" data-masonry='{"percentPosition": true }'>
            <?php foreach($laporan as $row): ?>
            <div class="col-sm-6 col-lg-4">
                <div class="card <?php if($row['jenis'] == "prestasi"){ echo "bg-primary text-white"; }else if($row['jenis'] == "pelanggaran"){ echo "bg-danger text-white";} ?>">
                    <div class="card-body">

                        <blockquote class="card-blockquote font-size-14 mb-0">
                            <p><?php echo $row['deskripsi']?></p>
                            <footer class="blockquote-footer mt-0 text-white font-size-12 mb-0">
                                Laporan : <cite title="Source Title"><?php echo tgl_indo($row['date']); ?></cite>
                            </footer>
                        </blockquote>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <label class="title" for="Note">Note : <br> Biru = Prestasi <br> Merah = pelanggaran</label>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
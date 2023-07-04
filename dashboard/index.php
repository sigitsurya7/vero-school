<?php

    require_once "../layouts/head.php";

?>

<div style="<?php if (!$isAdmin && !$isOperator) {echo 'display: none';} ?>">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Level</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="<?php echo $datalevel; ?>"></span>
                            </h4>
                        </div>

                        <div class="col-6">
                            <i data-feather="database" width="100%"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Rombel</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="<?php echo $datarombel; ?>"></span>
                            </h4>
                        </div>

                        <div class="col-6">
                            <i data-feather="database" width="100%"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>

        <div class="col-xl-3 col-md-6" style="<?php echo $isJenjang; ?>">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Jurusan</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="<?php echo $datajurusan; ?>"></span>
                            </h4>
                        </div>

                        <div class="col-6">
                            <i data-feather="database" width="100%"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Siswa</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="<?php echo $datasiswa; ?>"></span>
                            </h4>
                        </div>

                        <div class="col-6">
                            <i data-feather="database" width="100%"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Pengumuman</h5>
                    </div>

                    <div class="px-3" data-simplebar style="max-height: 352px;">
                        <ul class="list-unstyled activity-wid mb-0">
                            <?php foreach($pengumuman as $a): ?>
                            <li class="activity-list activity-border">
                                <div class="activity-icon avatar-md">
                                    <span class="avatar-title bg-primary text-white rounded-circle">
                                    <i class="bx bx-ghost font-size-24"></i>
                                    </span>
                                </div>
                                <div class="timeline-list-item">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 overflow-hidden me-4">
                                            <h5 class="font-size-14 mb-1"><?php echo $a['judul']?></h5>
                                            <p class="text-truncate text-muted font-size-13"><?php echo $a['deskripsi']?></p>
                                        </div>
                                        <div class="flex-shrink-0 text-end me-3">
                                            <h6 class="mb-1"><?php echo $a['createdby']?></h6>
                                            <div class="font-size-13"><?php echo tgl_indo($a['datecreated'])?></div>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            <?php endforeach; ?>                        
                        </ul>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->

        <div class="col-xl-4">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Data Absensi Harian</h5>
                    </div>
                    <div class="px-2 py-2">
                        <p class="mb-1">Data Siswa Belum Absen : <span class="float-end"><?php echo $countAttendance; ?></span></p>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?php echo $countAttendance; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                            </div>
                        </div>
                    </div>
                    <div class="px-2 py-2">
                        <p class="mb-1">Data Siswa Masuk : <span class="float-end"><?php echo $dataAttendance; ?></span></p>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?php echo $dataAttendance; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</div>

<div class="mb-3" style="<?php if (!$isSiswa) {echo 'display: none';} ?>">
    <div class="row" <?php echo $status; ?>>
        <div class="col-12">
            <div class="alert alert-danger alert-top-border alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-3 align-middle text-danger"></i><strong>Hi <?php echo $authsiswa['namasiswa']; ?></strong> , Kamu belum melakukan absen hari ini.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo $stats; ?>
        </div>
    </div>
</div>

<div style="<?php if (!$isWali && !$isSiswa) {echo 'display: none';} ?>">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Pengumuman</h5>
                    </div>

                    <div class="px-3" data-simplebar style="max-height: 352px;">
                        <ul class="list-unstyled activity-wid mb-0">
                            <?php foreach($pengumuman as $a): ?>
                            <li class="activity-list activity-border">
                                <div class="activity-icon avatar-md">
                                    <span class="avatar-title bg-primary text-white rounded-circle">
                                    <i class="bx bx-ghost font-size-24"></i>
                                    </span>
                                </div>
                                <div class="timeline-list-item">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 overflow-hidden me-4">
                                            <h5 class="font-size-14 mb-1"><?php echo $a['judul']?></h5>
                                            <p class="text-truncate text-muted font-size-13"><?php echo $a['deskripsi']?></p>
                                        </div>
                                        <div class="flex-shrink-0 text-end me-3">
                                            <h6 class="mb-1"><?php echo $a['createdby']?></h6>
                                            <div class="font-size-13"><?php echo tgl_indo($a['datecreated'])?></div>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            <?php endforeach; ?>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="<?php if (!$isGuru && !$isKesiswaan && !$isBp) {echo 'display: none';} ?>">
    <div class="row">
        <div class="col-12">
            Ini Tampilan Guru, Kesiswaan dan BP.
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
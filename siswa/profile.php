<?php

    require_once "../layouts/head.php";

?>

<div class="col-xl-12 col-sm-6">
    <div class="card text-center">
        <div class="card-body">
            <div class="mx-auto mb-4">
                <img src="<?php echo $base_url['foto']?>/fotosiswa/<?php echo $authsiswa['foto']?>" alt="" class="avatar-xl rounded-circle img-thumbnail">
            </div>
            <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"><?php echo $authsiswa['namasiswa']; ?></a></h5>
            <p class="text-muted mb-2"><?php echo $authsiswa['idlevel'].' / '.$authsiswa['idkelas']?></p>
            
        </div>

        
            
        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">Profile</span>
                </a>
            </li>
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Card</span>
                </a>
            </li>
        </ul>

    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home-1" role="tabpanel">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">NISN</th>
                                    <th style="width: 50px; text-align: center;">:</th>
                                    <th style="width: 50px;"><?php echo $authsiswa['nisn']?></th>
                                </tr>
                                <tr>
                                    <th style="width: 50px;">NIS</th>
                                    <th style="width: 50px; text-align: center;">:</th>
                                    <th style="width: 50px;"><?php echo $authsiswa['nis']?></th>
                                </tr>
                                <tr>
                                    <th style="width: 50px;">Tempat, Tanggal Lahir</th>
                                    <th style="width: 50px; text-align: center;">:</th>
                                    <th style="width: 50px;"><?php echo $authsiswa['tempat'].' , '.tgl_indo($authsiswa['ttl'])?></th>
                                </tr>
                                <tr>
                                    <th style="width: 50px;">ALAMAT</th>
                                    <th style="width: 50px; text-align: center;">:</th>
                                    <th style="width: 50px;"><?php echo $authsiswa['alamat']?></th>
                                </tr>
                                <tr>
                                    <th style="width: 50px;">Agama</th>
                                    <th style="width: 50px; text-align: center;">:</th>
                                    <th style="width: 50px;"><?php echo $authsiswa['agama']?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane" id="profile-1" role="tabpanel">
                        <p class="mb-0">
                            <table class="table table-stripped table-responsive">
                                <thead>
                                    <tr>
                                        <th>UID CARD</th>
                                        <th style="width: 50px; text-align: center;">:</th>
                                        <th><?php echo $authsiswa['uid']?></th>
                                    </tr>
                                    <tr>
                                        <th>Status Kartu</th>
                                        <th style="width: 50px; text-align: center;">:</th>
                                        <th><?php echo $cardStatus ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="edit-profile" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
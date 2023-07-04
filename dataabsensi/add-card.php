<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'operator') {
        // The user does not have the required role, so redirect them or display an error message
        echo '<script type="text/javascript">';
        echo 'window.location.href="../error/403.php";';
        echo '</script>';
        exit;
    }
    $idpendaftaran = $_GET["idpendaftaran"];
    $sql = "SELECT * FROM datasiswa JOIN card ON datasiswa.idpendaftaran=card.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaran'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $addcard = $stmt->fetch(PDO::FETCH_ASSOC);

    $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            $("#getUID").load("UIDcontainer.php");
        setInterval(function() {
            $("#getUID").load("UIDcontainer.php");
        }, 500);
    });
</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Kartu</h4>
            </div>
            <div class="card-body">
                <form action="../api/card" method="POST">
                    <div class="form-group mb-3">
                        <label for="NamaSiswa">Nama Siswa:</label>
                        <input type="text" class="form-control" name="idpendaftaran" value="<?php echo $addcard['idpendaftaran']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="NamaSiswa">Nama Siswa:</label>
                        <input type="text" class="form-control" value="<?php echo $addcard['namasiswa']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="NamaSiswa">Kelas:</label>
                        <input type="text" class="form-control" value="<?php echo $addcard['idkelas']?>" disabled>
                    </div>
                    <div class="form-group mb-3" style="<?php echo $isJenjang?>">
                        <label for="NamaSiswa">Jurusan:</label>
                        <input type="text" class="form-control" value="<?php echo $addcard["idjurusan"]?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="NamaSiswa">UID: Tempelkan Kartu Pada Alat Terdekat</label>
                        <input type="hidden" class="form-control" name="idpendaftaran" value="<?php echo $addcard['idpendaftaran']?>">
                        <textarea type="text" class="form-control" name="uid" id="getUID" value="Tempelkan Kartu"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="addSiswa" value="addData" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
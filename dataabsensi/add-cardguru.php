<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'operator') {
        // The user does not have the required role, so redirect them or display an error message
        echo '<script type="text/javascript">';
        echo 'window.location.href="../error/403.php";';
        echo '</script>';
        exit;
    }
    $idguru = $_GET["idguru"];
    $sql = "SELECT * FROM dataguru JOIN cardguru ON dataguru.idguru=cardguru.idguru WHERE dataguru.idguru='$idguru'";
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
                        <label for="idGuru">ID Guru:</label>
                        <input type="text" class="form-control" name="idguru" value="<?php echo $addcard['idguru']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="NamaGuru">Nama Guru:</label>
                        <input type="text" class="form-control" value="<?php echo $addcard['namaguru']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="UID">UID: Tempelkan Kartu Pada Alat Terdekat</label>
                        <input type="hidden" class="form-control" name="idguru" value="<?php echo $addcard['idguru']?>">
                        <textarea type="text" class="form-control" name="uid" id="getUID" value="Tempelkan Kartu"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="add" value="addDataGuru" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
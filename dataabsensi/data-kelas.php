<?php

    require_once "../layouts/head.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' && $_SESSION['role'] != 'operator') {
        // The user does not have the required role, so redirect them or display an error message
        echo '<script type="text/javascript">';
        echo 'window.location.href="../error/403.php";';
        echo '</script>';
        exit;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //** SANITIZE and FILTER DATA INPUT */
        $idkelas = filter_input(INPUT_POST, 'idkelas', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM attendance JOIN card ON attendance.uid = card.uid JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idkelas='$idkelas' AND attendance.date='$date' ORDER BY datasiswa.namasiswa ASC";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();
        $absen = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $kelas = filter_input(INPUT_POST, 'idkelas', FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM datasiswa JOIN card ON datasiswa.idpendaftaran = card.idpendaftaran WHERE idkelas ='$kelas' GROUP BY namasiswa ASC";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-titile">Data Kelas <?php echo $kelas; ?></h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                <?php foreach($dataSiswa as $row):?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['namasiswa']?></td>
                        <td><?php echo $row['idkelas']?></td>
                        <td>
                        <?php
                            $status = "Belum Absensi";
                            $jam = "";
                            foreach($absen as $data){
                                if($row['idpendaftaran'] == $data['idpendaftaran']){
                                $status = $data['status'];
                                $jam = $data['jam'];
                                break;
                                }
                                }
                                echo $status;
                                ?>
                        </td>
                        <td><?php echo $jam ?></td>
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
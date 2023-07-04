<?php
    
    require_once "../config/db.php";
    require_once "../config/auth.php";

    //** Get Setting */
    $query = ('SELECT * FROM setting where 1');
    $stmt = $db->prepare($query);
    $stmt->execute();

    $settings = $stmt->fetch(PDO::FETCH_BOTH);   

    //** GET DATA PENGUMUMAN */
    $sql = ("SELECT * FROM pengumuman ORDER BY id DESC");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $pengumuman= $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** SISWA LOGIN */
    if($_SESSION['role'] == 'siswa' ||$_SESSION['role'] == 'wali' ){
        $idpendaftaransiswa = $_SESSION['idpendaftaran'];
        $day = date('Y-m-d');
        $sql = ("SELECT * FROM datasiswa JOIN biodatasiswa ON datasiswa.idpendaftaran=biodatasiswa.idpendaftaran JOIN card ON biodatasiswa.idpendaftaran=card.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaransiswa'");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $authsiswa = $stmt->fetch(PDO::FETCH_BOTH);

        $sql = "SELECT COUNT(attendance.status) FROM attendance JOIN card ON attendance.uid = card.uid JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaransiswa' AND attendance.date='$day'";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $statusId = $stmt->fetchColumn();
        $status = '';
        if ($statusId < 1){
            $status = '';
        }else{
            $status ='style="display:none"';
        }

        $stats = '';
        $cardStatus = '';
        $stmt = $db->prepare("SELECT * FROM datawali WHERE idpendaftaran='$idpendaftaransiswa' AND (namawali IS NULL OR nowhatsapp IS NULL)");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stats = '<script> alert("Kartu Mu Belum Aktif");
                        window.location.href = "../siswa/datawali"; </script>';
            $cardStatus = "<button class='btn btn-danger'>Card Not Activated</button>";
        } else {
            // There are no null values in the namawali and whatsapp columns
            // Data is not null
            $stats = "";
            $cardStatus = "<button class='btn btn-success'>Card Is Activated</button>";
        }
        

        $sql = "SELECT * FROM attendance JOIN card ON attendance.uid = card.uid JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaransiswa'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $absensi = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM buku JOIN perpustakaan ON buku.idbuku = perpustakaan.idbuku JOIN datasiswa ON perpustakaan.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaransiswa'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $perpus = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM report WHERE idpendaftaran = '$idpendaftaransiswa'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM payment_history JOIN masterpayment ON payment_history.payment_code = masterpayment.payment_code WHERE payment_history.idpendaftaran = '$idpendaftaransiswa'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $paymentHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM datawali where idpendaftaran = '$idpendaftaransiswa'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $profileWali = $stmt->fetch(PDO::FETCH_BOTH);

    }

    //** GET DATA LEVEL */
    $sql = ("SELECT * FROM level");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $level = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET DATA kelas */
    $sql = ("SELECT * FROM kelas");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $kelas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET DATA jurusan */
    $sql = ("SELECT * FROM jurusan");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $jurusan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET DATA SISWA */
    $sql = ('SELECT * FROM datasiswa JOIN authsiswa ON datasiswa.idpendaftaran = authsiswa.idpendaftaran JOIN datawali ON authsiswa.idpendaftaran =  datawali.idpendaftaran WHERE authsiswa.role = "siswa" GROUP BY datasiswa.namasiswa ASC');
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET card GURU */

    $sql = "SELECT * FROM dataguru JOIN cardguru ON dataguru.idguru = cardguru.idguru GROUP BY dataguru.namaguru ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $cGuru = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET Auth User */
    $sql = ("SELECT * FROM authuser");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $authuser = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** GET Auth User */
    $sql = ("SELECT * FROM authguru JOIN dataguru ON authguru.idguru = dataguru.idguru");
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $authguru = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** ROW COUNT DATA */
    $sql = ('SELECT COUNT(*) FROM level');
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $datalevel = $stmt->fetchColumn();

    $sql = ('SELECT COUNT(*) FROM kelas');
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $datarombel = $stmt->fetchColumn();

    $sql = ('SELECT COUNT(*) FROM jurusan');
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $datajurusan = $stmt->fetchColumn();

    $sql = ('SELECT COUNT(*) FROM datasiswa');
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $datasiswa = $stmt->fetchColumn();

    $sql = 'SELECT idkelas, COUNT(*) AS count FROM datasiswa GROUP BY idkelas';
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = ("SELECT COUNT(*) FROM attendance WHERE status !='PULANG' AND date='$date'");
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $dataAttendance = $stmt->fetchColumn();

    $countAttendance = $datasiswa-$dataAttendance;

    //** Absensi Siswa */

    //** CARD */
    $sql = 'SELECT * FROM datasiswa JOIN card ON datasiswa.idpendaftaran=card.idpendaftaran GROUP BY datasiswa.namasiswa ASC';
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $card = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Attendance */
    $sql = "SELECT * FROM attendance JOIN card ON attendance.uid = card.uid JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran WHERE attendance.status !='PULANG' AND attendance.date='$date'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Attendance Guru */
    $sql = "SELECT * FROM attendance JOIN cardguru ON attendance.uid = cardguru.uid JOIN dataguru ON cardguru.idguru = dataguru.idguru WHERE attendance.status = 'MASUK' AND attendance.date='$date'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $attendanceGuru = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Perpustakaan */
    $sql = "SELECT * FROM buku GROUP BY namabuku ASC";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $buku = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Peminjaman */
    $sql = "SELECT * FROM buku JOIN perpustakaan ON buku.idbuku = perpustakaan.idbuku JOIN datasiswa ON perpustakaan.idpendaftaran = .datasiswa.idpendaftaran WHERE perpustakaan.keterangan ='PEMINJAMAN'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $peminjaman = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Pengembalian */
    $sql = "SELECT * FROM buku JOIN perpustakaan ON buku.idbuku = perpustakaan.idbuku JOIN datasiswa ON perpustakaan.idpendaftaran = datasiswa.idpendaftaran WHERE perpustakaan.keterangan !='PEMINJAMAN'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $pengembalian = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Tata Usaha */
    $sql = "SELECT * FROM masterpayment";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $mpayment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $typePayment = $stmt->fetch(PDO::FETCH_BOTH);

    //** Kesiswaan Report */
    $sql ="SELECT * FROM report JOIN datasiswa ON report.idpendaftaran=datasiswa.idpendaftaran WHERE jenis='pelanggaran'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $pelanggaran = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql ="SELECT * FROM report JOIN datasiswa ON report.idpendaftaran=datasiswa.idpendaftaran WHERE jenis='prestasi'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $prestasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //** Guru Section */
    if($_SESSION['role'] == "guru"){
        $namaguru = $_SESSION['namaguru'];
        $idguru = $_SESSION['idguru'];

        //** Quotes */
        $sql = "SELECT * FROM quotes WHERE namaguru='$namaguru'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //** AUTH GURU */
        $sql = "SELECT * FROM dataguru WHERE idguru='$idguru'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $authGuru = $stmt->fetch(PDO::FETCH_BOTH);

        $kelas = $authGuru['idkelas'];

        $walikelas ='';
        if($authGuru['idkelas'] == NULL){
            $walikelas = 'style="display:none"';
        }else{
            $walikelas = '';
        }

        $sql = "SELECT * FROM attendance JOIN card ON attendance.uid = card.uid JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idkelas='$kelas' AND attendance.date='$date' ORDER BY datasiswa.namasiswa ASC";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();
        $absen = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM datasiswa JOIN card ON datasiswa.idpendaftaran = card.idpendaftaran WHERE idkelas ='$kelas' GROUP BY namasiswa ASC";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $dataSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //** Rekap Absensi Guru */
        $sql = "SELECT * FROM attendance JOIN cardguru ON attendance.uid = cardguru.uid JOIN dataguru ON cardguru.idguru = dataguru.idguru WHERE dataguru.idguru = '$idguru'";
        $stmt = $db->prepare($sql);

        $stmt->execute();
        $absenGuru = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo $date;
    }

?>
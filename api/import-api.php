<?php

    require_once '../vendor/autoload.php';
    require_once '../config/db.php';
    require_once '../config/get.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

    if (array_key_exists('importData', $_POST) && $_POST['importData'] == 'importDataMaster' && isset($_FILES['file'])) {
        if ($_FILES['file']['error'] == 0) {
            // File was uploaded successfully
    
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            $foto = 'default.png';
    
            $numrow = 1;
            foreach($worksheet as $row){

                $no = $row['A'];
                $nisn = $row['B'];
                $nis = $row['C'];
                $namasiswa = $row['D'];
                $level = $row['E'];
                $kelas = $row['F'];
                $jurusan = $row['G'];

                if($no == "" && $nisn == "" && $nis == "" && $namasiswa == "" && $level == "" && $kelas == "" && $jurusan == "")
                continue;

                if($numrow > 1){
                    $idpendaftaran = $settings['idserver'].'00'.$level.'000'.$no;
                    $username = $jurusan.'000'.$no;
                    $usernamewali = 'wali'.$jurusan.'000'.$no;
                    $password = password_hash($nis, PASSWORD_DEFAULT);
                    $foto = 'default.png';

                    $sql = "INSERT INTO datasiswa (idpendaftaran, namasiswa, nisn, nis, idlevel, idkelas, idjurusan, foto) VALUES (:idpendaftaran, :namasiswa, :nisn, :nis, :idlevel, :idkelas, :idjurusan, :foto)";

                    $stmt = $db->prepare($sql);

                    $params = array(
                        ':idpendaftaran' => $idpendaftaran,
                        ':namasiswa' => $namasiswa,
                        ':nisn' => $nisn,
                        ':nis' => $nis,
                        ':idlevel' => $level,
                        'idkelas' => $kelas,
                        ':idjurusan' => $jurusan,
                        ':foto' => $foto
                    );

                    $stmt->execute($params);

                    $sql1 = "INSERT INTO biodatasiswa (idpendaftaran) VALUES (:idpendaftaran)";

                    $stmt1 = $db->prepare($sql1);

                    $params1 = array(
                        ':idpendaftaran' => $idpendaftaran
                    );

                    $stmt1->execute($params1);

                    $sql2 = "INSERT INTO datawali (idpendaftaran) VALUES (:idpendaftaran)";

                    $stmt2 = $db->prepare($sql2);

                    $params2 = array(
                        ':idpendaftaran' => $idpendaftaran
                    );

                    $stmt2->execute($params2);
                    
                    $sql3 = "INSERT INTO authsiswa (idpendaftaran, username, password, role) VALUES (:idpendaftaran, :username, :password, :role)";

                    $stmt3 = $db->prepare($sql3);

                    $params3 = array(
                        ':idpendaftaran' => $idpendaftaran,
                        ':username' => $username,
                        ':password' => $password,
                        ':role' => 'siswa'
                    );

                    $stmt3->execute($params3);

                    $sql4 = "INSERT INTO authsiswa (idpendaftaran, username, password, role) VALUES (:idpendaftaran, :username, :password, :role)";

                    $stmt4 = $db->prepare($sql4);

                    $params4 = array(
                        ':idpendaftaran' => $idpendaftaran,
                        ':username' => $usernamewali,
                        ':password' => $password,
                        ':role' => 'wali'
                    );

                    $stmt4->execute($params4);

                    $sql5 = "INSERT INTO card (idpendaftaran) VALUES (:idpendaftaran)";

                    $stmt5 = $db->prepare($sql5);

                    $params5 = array(
                        ':idpendaftaran' => $idpendaftaran
                    );

                    $stmt5->execute($params5);

                }
                $numrow++;
            }
        }
    }else if(array_key_exists('importData', $_POST) && $_POST['importData'] == 'importDataGuru' && isset($_FILES['file'])){
        if ($_FILES['file']['error'] == 0) {
            // File was uploaded successfully
    
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            $foto = 'default.png';
    
            $numrow = 1;
            foreach($worksheet as $row){

                $no = $row['A'];
                $namaguru = $row['B'];
                $nip = $row['C'];
                $gurumapel = $row['D'];
                $idkelas = $row['E'];

                if($no == "" && $namaguru == "" && $nip == "" && $gurumapel == "" && $idkelas == "" && $kelas == "" && $jurusan == "")
                continue;

                if($numrow > 1){
                    $idguru = $settings['idserver'].'00'.$no;
                    $password = password_hash($idguru, PASSWORD_DEFAULT);
                    $foto = 'default.png';

                    $sql = "INSERT INTO dataguru (idguru, namaguru, nip, gurumapel, idkelas, foto) VALUES (:idguru, :namaguru, :nip, :gurumapel, :idkelas, :foto)";

                    $stmt = $db->prepare($sql);

                    $params = array(
                        ':idguru' => $idguru,
                        ':namaguru' => $namaguru,
                        ':nip' => $nip,
                        ':gurumapel' => $gurumapel,
                        ':idkelas' => $idkelas,
                        ':foto' => $foto
                    );

                    $stmt->execute($params);

                    $sql2 = "INSERT INTO authguru (idguru, namaguru, username, password, role) VALUES (:idguru, :namaguru, :username, :password, :role)";
                    $stmt2 = $db->prepare($sql2);

                    $params2 = array(
                        ':idguru' => $idguru,
                        ':namaguru' => $namaguru,
                        ':username' => $idguru,
                        ':password' => $password,
                        ':role' => 'guru'
                    );

                    $stmt2->execute($params2);

                    $sql3 = "INSERT INTO cardguru (idguru) VALUES (:idguru)";

                    $stmt3 = $db->prepare($sql3);

                    $params3 = array(
                        ':idguru' => $idguru
                    );

                    $stmt3->execute($params3);

                }
                $numrow++;
            }
        }
    }
    header('Location: ../');
    
    

?>
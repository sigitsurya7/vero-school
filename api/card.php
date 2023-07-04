<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'operator') {
        if (array_key_exists('addSiswa', $_POST) && $_POST['addSiswa'] == 'addData') {

            //** SANITIZE and FILTER DATA INPUT */
            $uid = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING);
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);

            //** SQL Query */
            $sql = ('UPDATE card SET uid=:uid WHERE idpendaftaran=:idpendaftaran');
            $stmt = $db->prepare($sql);

            $params = array(
                ":uid" => $uid,
                ":idpendaftaran" => $idpendaftaran
            );

            $stmt->execute($params);
            header('Location: ../dataabsensi/kartu-siswa');
            $db = null;
            exit;
        }else if(array_key_exists('add', $_POST) && $_POST['add'] == 'addDataGuru'){

           //** SANITIZE and FILTER DATA INPUT */
           $uid = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING);
           $idguru = filter_input(INPUT_POST, 'idguru', FILTER_SANITIZE_STRING);

           //** SQL Query */
           $sql = ('UPDATE cardguru SET uid=:uid WHERE idguru=:idguru');
           $stmt = $db->prepare($sql);

           $params = array(
               ":uid" => $uid,
               ":idguru" => $idguru
           );

           $stmt->execute($params);
           header('Location: ../dataabsensi/kartu-guru');
           $db = null;
           exit; 
        }
    }

?>

<?php

    require_once "../config/db.php";
    session_start();

    if($_SESSION['role'] == 'guru'){
        if(array_key_exists('add', $_POST) && $_POST['add'] == 'quotes'){
            
            //** SANITIZE DATA */
            $namaguru = filter_input(INPUT_POST, 'namaguru', FILTER_SANITIZE_STRING);
            $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_SANITIZE_STRING);
            $datecreated = date('Y-m-d');

            $sql = "INSERT INTO quotes (namaguru, deskripsi, datecreated) VALUES (:namaguru, :deskripsi, :datecreated)";
            $stmt = $db->prepare($sql);

            $params = array(
                ":namaguru" => $namaguru,
                "deskripsi" => $deskripsi,
                ":datecreated" => $datecreated
            );

            $stmt->execute($params);
            header("Location: ../guru/quotes");
            $db = null;
            exit;

        }else if(array_key_exists('add', $_POST) && $_POST['add'] == 'stts'){
            
            //** SANITIZE DATA */
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
            $date = date('Y-m-d');
            $jam = date('H:i');
            $uid = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING);

            $sql = "INSERT INTO attendance (uid, status, date, jam) VALUES (:uid, :status, :date, :jam)";
            $stmt = $db->prepare($sql);

            $params = array (
                ":uid" => $uid,
                ":status" => $status,
                ":date" => $date,
                ":jam" => $jam
            );

            $stmt->execute($params);
            header("Location: ../guru/absensi");
            $db = null;
            exit;

        }
    }

?>
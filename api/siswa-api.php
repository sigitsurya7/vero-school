<?php

    require_once "../config/db.php";
    session_start();

    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'siswa' || $_SESSION['role'] == 'wali' || $_SESSION['role'] == 'walikelas' || $_SESSION['role'] == 'kesiswaan'){
        if (array_key_exists('addWali', $_POST) && $_POST['addWali'] == 'addDataWali'){
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $namawali = filter_input(INPUT_POST, 'namawali', FILTER_SANITIZE_STRING);
            $nowhatsapp = filter_input(INPUT_POST, 'nowhatsapp', FILTER_SANITIZE_STRING);

            $sql = "UPDATE datawali SET namawali=:namawali, nowhatsapp=:nowhatsapp WHERE idpendaftaran=:idpendaftaran";
            $stmt = $db->prepare($sql);

            $params = array(
                ":idpendaftaran" => $idpendaftaran,
                ":namawali" => $namawali,
                ":nowhatsapp" => $nowhatsapp
            );

            $stmt->execute($params);
            header('Location: ../dashboard');
            $db = null;
            exit;
        }else if(array_key_exists('addReport', $_POST) && $_POST['addReport'] == 'addDataReport'){
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
            $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_SANITIZE_STRING);
            $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
            $nowhatsapp = filter_input(INPUT_POST, 'nowhatsapp', FILTER_SANITIZE_STRING);
            $namasiswa = filter_input(INPUT_POST, 'namasiswa', FILTER_SANITIZE_STRING);
            $datecreated = date('Y-m-d');

            $sql = "INSERT INTO report (idpendaftaran, judul, deskripsi, jenis, date) VALUES (:idpendaftaran, :judul, :deskripsi, :jenis, :date)";
            $stmt = $db->prepare($sql);

            $params = array(
                ":idpendaftaran" => $idpendaftaran,
                ":judul" => $judul,
                ":deskripsi" => $deskripsi,
                ":jenis" => $jenis,
                ":date" => $datecreated
            );

            $msg = "Laporan Siswa".PHP_EOL."Jenis : ".strtoupper($jenis)." siswa".PHP_EOL."Nama : $namasiswa".PHP_EOL."Judul Laporan : $judul".PHP_EOL."$deskripsi";

            $data = array('number' => $nowhatsapp, 'message' => $msg);

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                ),
            );
            $context  = stream_context_create($options);
            file_get_contents('http://203.194.112.115:8000/send-message', false, $context);

            $stmt->execute($params);
            header('Location: ../kesiswaan/'.$jenis);

        }else if(array_key_exists('addBiodata', $_POST) && $_POST['addBiodata'] == 'addDataBiodata'){
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $tempat = filter_input(INPUT_POST, 'tempat', FILTER_SANITIZE_STRING);
            $ttl = filter_input(INPUT_POST, 'ttl', FILTER_SANITIZE_STRING);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
            $agama = filter_input(INPUT_POST, 'agama', FILTER_SANITIZE_STRING);

            $sql = "UPDATE biodatasiswa SET tempat=:tempat, ttl=:ttl, alamat=:alamat, agama=:agama WHERE idpendaftaran=:idpendaftaran";
            $stmt = $db->prepare($sql);

            $params = array(
                ":idpendaftaran" => $idpendaftaran,
                ":tempat" => $tempat,
                ":ttl" => $ttl,
                ":alamat" => $alamat,
                ":agama" => $agama
            );

            $stmt->execute($params);
            header('Location: ../siswa/profile');
        }
    }

?>
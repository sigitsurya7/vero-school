<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //** SANITIZE and FILTER DATA */
            $idjurusan = filter_input(INPUT_POST, 'idjurusan', FILTER_SANITIZE_STRING);
            $namajurusan = filter_input(INPUT_POST, 'namajurusan', FILTER_SANITIZE_STRING);

            //** SQL QUERY */
            $sql = ('INSERT INTO jurusan (idjurusan, namajurusan) VALUES (:idjurusan, :namajurusan)');
            $stmt = $db->prepare($sql);

            $params = array(
                ":idjurusan" => $idjurusan,
                ":namajurusan" => $namajurusan
            );

            $stmt->execute($params);
            header('Location: ../datamaster/jurusan');
            $db = null;
            exit;
        }else if(isset($_GET['hapus'])){
            $id = $_GET['id'];

            $sql = ('DELETE FROM jurusan WHERE id=:id');
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../datamaster/jurusan');
            $db = null;
            exit;
        }
    }

?>
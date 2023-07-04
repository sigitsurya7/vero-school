<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //** SANITIZE and FILTER DATA */
            $namakelas = filter_input(INPUT_POST, 'namakelas', FILTER_SANITIZE_STRING);
            $idkelas = str_replace(' ', '', $namakelas);

            //** SQL QUERY */
            $sql = ('INSERT INTO kelas (idkelas, namakelas) VALUES (:idkelas, :namakelas)');
            $stmt = $db->prepare($sql);

            $params = array(
                ":idkelas" => $idkelas,
                ":namakelas" => $namakelas
            );

            $stmt->execute($params);
            header('Location: ../datamaster/kelas');
            $db = null;
            exit;
        }else if(isset($_GET['hapus'])){
            $id = $_GET['id'];

            $sql = ('DELETE FROM kelas WHERE id=:id');
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../datamaster/kelas');
            $db = null;
            exit;
        }
    }

?>
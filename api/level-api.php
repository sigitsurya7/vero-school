<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //** SANITIZE and FILTER DATA */
            $namalevel = filter_input(INPUT_POST, 'namalevel', FILTER_SANITIZE_STRING);
            $idlevel = str_replace(' ', '', $namalevel);

            //** SQL QUERY */
            $sql = ('INSERT INTO level (idlevel, namalevel) VALUES (:idlevel, :namalevel)');
            $stmt = $db->prepare($sql);

            $params = array(
                ":idlevel" => $idlevel,
                ":namalevel" => $namalevel
            );

            $stmt->execute($params);
            header('Location: ../datamaster/level');
            $db = null;
            exit;
        }else if(isset($_GET['hapus'])){
            $id = $_GET['id'];

            $sql = ('DELETE FROM level WHERE id=:id');
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../datamaster/level');
            $db = null;
            exit;
        }
    }

?>
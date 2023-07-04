<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'operator'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            //** SANITIZE and FILTER DATA INPUT */
            $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
            $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_SANITIZE_STRING);
            $createdby = $_SESSION['nama'];
            $datecreated = date('Y-m-d');

            //** SQL Query */
            $sql = ('INSERT INTO pengumuman (judul, deskripsi, createdby, datecreated) VALUES (:judul, :deskripsi, :createdby, :datecreated)');
            $stmt = $db->prepare($sql);

            $params = array(
                ":judul" => $judul,
                ":deskripsi" => $deskripsi,
                ":createdby" => $createdby,
                ":datecreated" => $datecreated
            );

            $stmt->execute($params);
            header('Location: ../pengumuman');
            $db = null;
            exit;
        }else if (isset($_GET['hapus'])){
            $id = $_GET['id'];

            $sql = ('DELETE FROM pengumuman WHERE id=:id');
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../pengumuman');
            $db = null;
            exit;
        }
    }

?>
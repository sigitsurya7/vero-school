<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            //** SANITIZE and FILTER DATA INPUT */
            $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
            $pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            // Password Hash
            $password = password_hash($pw, PASSWORD_DEFAULT);

            //** SQL Query */
            $sql = ('INSERT INTO authuser (nama, username, password, role) VALUES (:nama, :username, :password, :role)');
            $stmt = $db->prepare($sql);

            $params = array(
                ":nama" => $nama,
                ":username" => $username,
                ":password" => $password,
                ":role" => $role
            );

            $stmt->execute($params);
            header('Location: ../setting/management-user');
            $db = null;
            exit;
        }else if (isset($_GET['hapus'])){
            $id = $_GET['id'];

            $sql = ('DELETE FROM authuser WHERE id=:id');
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../setting/management-user');
            $db = null;
            exit;
        }
    }

?>
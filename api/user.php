<?php

require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // handle create operation
    // Sanitize Data
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    // Encryption Password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare Query
    $sql = ("INSERT INTO authuser (nama, username, password, role) VALUES (:nama, :username, :password, :role)");
    $stmt = $db->prepare($sql);

    $params = array(
        ':nama' => $nama,
        ':username' => $username,
        ':password' => $password,
        ':role' => $role
    );

    $stmt->execute($params);

    //** Refreh Page After Complete */
    header('Location: ../login');
    exit;

} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // handle read operation
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // handle update operation
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // handle delete operation
}

?>
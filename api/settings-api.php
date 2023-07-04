<?php

    require_once "../config/db.php";
    require_once "../config/setting.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            //** SANITIZE and FILTER DATA INPUT */
            $idserver = filter_input(INPUT_POST, 'idserver', FILTER_SANITIZE_STRING);
            $namasekolah = filter_input(INPUT_POST, 'namasekolah', FILTER_SANITIZE_STRING);
            $alamatsekolah = filter_input(INPUT_POST, 'alamatsekolah', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $nomortlp = filter_input(INPUT_POST, 'nomortlp', FILTER_SANITIZE_STRING);
            $npsnsekolah = filter_input(INPUT_POST, 'npsnsekolah', FILTER_SANITIZE_STRING);
            $namakepalasekolah = filter_input(INPUT_POST, 'namakepalasekolah', FILTER_SANITIZE_STRING);
            $logosekolah = $_FILES['logosekolah']['name'];

            // Check if the user has provided a new photo
            if ($logosekolah) {
                // Generate a unique filename for the lo$logosekolah
                $logosekolah = uniqid() . '_' . $logosekolah;

                // Save the photo to the server
                move_uploaded_file($_FILES['logosekolah']['tmp_name'], "../assets/uploads/$logosekolah");
            }

            //** SQL Query */
            $sql = ('UPDATE setting SET idserver=:idserver, namasekolah=:namasekolah, alamatsekolah=:alamatsekolah, email=:email, nomortlp=:nomortlp, npsnsekolah=:npsnsekolah, namakepalasekolah=:namakepalasekolah, logosekolah=:logosekolah WHERE id=:id');
            
            $stmt = $db->prepare($sql);

            $params = array(
                ":id" => '1',
                ":idserver" => $idserver,
                ":namasekolah" => $namasekolah,
                ":alamatsekolah" => $alamatsekolah,
                ":email" => $email,
                ":nomortlp" => $nomortlp,
                ":npsnsekolah" => $npsnsekolah,
                ":namakepalasekolah" => $namakepalasekolah,
                ":logosekolah" => $logosekolah
            );

            $stmt->execute($params);
            header('Location: ../pengumuman');
            $db = null;
            exit;
        }
    }

?>
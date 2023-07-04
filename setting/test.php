<?php

    require_once "../config/db.php";
    
    $sql = "SELECT * FROM buku JOIN perpustakaan ON buku.idbuku = perpustakaan.idbuku JOIN datasiswa ON perpustakaan.idpendaftaran = datasiswa.idpendaftaran WHERE datasiswa.idpendaftaran='$idpendaftaransiswa'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $perpus = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
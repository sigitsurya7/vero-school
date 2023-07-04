<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'perpustakaan'){
        if (array_key_exists('add', $_POST) && $_POST['add'] == 'addData'){
    
            //** SANITIZE and FILTER DATA INPUT */
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $loandate = filter_input(INPUT_POST, 'loandate', FILTER_SANITIZE_STRING);
            $returndate = filter_input(INPUT_POST, 'returndate', FILTER_SANITIZE_STRING);
    
            // Retrieve the selected book from the select dropdown and split the value into an array
            $selected = explode(',', filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING));
            // Assign the first value in the array to $idbuku
            $idbuku = $selected[0];
            // Assign the second value in the array to $jumlah
            $jumlah = $selected[1];
    
            $unit = '1';
            $total = $jumlah-$unit;
            $keterangan = 'PEMINJAMAN';
    
            //** SQL Query */
            $sql = ('INSERT INTO perpustakaan (idbuku, idpendaftaran, loandate, returndate, unit, keterangan) VALUES (:idbuku, :idpendaftaran, :loandate, :returndate, :unit, :keterangan)');
            $stmt = $db->prepare($sql);
    
            $params = array(
                ":idbuku" => $idbuku,
                ":idpendaftaran" => $idpendaftaran,
                ":loandate" => $loandate,
                ":returndate" => $returndate,
                ":unit" => $unit,
                ":keterangan" => $keterangan
            );
    
            $stmt->execute($params);
    
            $sql1 = ('UPDATE buku SET jumlah=:total WHERE idbuku=:idbuku');
            $stmt1 = $db->prepare($sql1);
    
            $params1 = array(
                ":idbuku" => $idbuku,
                ":total" => $total
            );
    
            $stmt1->execute($params1);

            
    
            header('Location: ../perpustakaan/peminjaman');
            $db = null;
            exit;
            
        }else if (array_key_exists('update', $_POST) && $_POST['update'] == 'updateData'){
            //** SANITIZE and FILTER DATA INPUT */
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $idbuku = filter_input(INPUT_POST, 'idbuku', FILTER_SANITIZE_STRING);
            $loandate = filter_input(INPUT_POST, 'loandate', FILTER_SANITIZE_STRING);
            $returndate = filter_input(INPUT_POST, 'returndate', FILTER_SANITIZE_STRING);
            $keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);
            $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
            $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_STRING);

            $nowUnit = $unit-$unit;
            $total = $jumlah+$unit;

            $sql = ('UPDATE perpustakaan SET idbuku=:idbuku, idpendaftaran=:idpendaftaran, loandate=:loandate, returndate=:returndate, unit=:unit, keterangan=:keterangan WHERE trxid=:id');
            $stmt = $db->prepare($sql);
    
            $params = array(
                ":id" => $id,
                ":idbuku" => $idbuku,
                ":idpendaftaran" => $idpendaftaran,
                ":loandate" => $loandate,
                ":returndate" => $returndate,
                ":unit" => $nowUnit,
                ":keterangan" => $keterangan
            );
    
            $stmt->execute($params); 

            $sql1 = ('UPDATE buku SET jumlah=:total WHERE idbuku=:idbuku');
            $stmt1 = $db->prepare($sql1);
    
            $params1 = array(
                ":idbuku" => $idbuku,
                ":total" => $total
            );
    
            $stmt1->execute($params1);

            
    
            header('Location: ../perpustakaan/pengembalian');
            $db = null;
            exit;

            
        }
    }
    

?>
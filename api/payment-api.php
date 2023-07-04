<?php

    require_once "../config/db.php";
    session_start();

    //** CRUD API */
    if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'tatausaha'){
        if (array_key_exists('add', $_POST) && $_POST['add'] == 'addData'){
    
            //** SANITIZE and FILTER DATA INPUT */
            $payment_name = filter_input(INPUT_POST, 'payment_name', FILTER_SANITIZE_STRING);
            $payment_code = filter_input(INPUT_POST, 'payment_code', FILTER_SANITIZE_STRING);
            $payment_type = filter_input(INPUT_POST, 'payment_type', FILTER_SANITIZE_STRING);
            $school_year = filter_input(INPUT_POST, 'school_year', FILTER_SANITIZE_STRING);
            $idkelas = filter_input(INPUT_POST, 'idkelas', FILTER_SANITIZE_STRING);
            
            //** Demonate */
            $fromyear = filter_input(INPUT_POST, 'fromyear', FILTER_SANITIZE_STRING);
            $toyear = filter_input(INPUT_POST, 'toyear', FILTER_SANITIZE_STRING);

            $school_year = $fromyear.'/'.$toyear;
    
            //** SQL Query */
            $sql = ('INSERT INTO masterpayment (payment_name, payment_code, payment_type, school_year, idkelas) VALUES (:payment_name, :payment_code, :payment_type, :school_year, :idkelas)');
            $stmt = $db->prepare($sql);
    
            $params = array(
                ":payment_name" => $payment_name,
                ":payment_code" => $payment_code,
                ":payment_type" => $payment_type,
                ":school_year" => $school_year,
                ":idkelas" => $idkelas
            );
    
            $stmt->execute($params);
            
            header('Location: ../tatausaha/master-pembayaran');
            $db = null;
            exit;
            
        }else if (array_key_exists('update', $_POST) && $_POST['update'] == 'updateData'){
            //** SANITIZE and FILTER DATA INPUT */
            $payment_id = filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_STRING);
            $payment_amount = filter_input(INPUT_POST, 'payment_amount', FILTER_SANITIZE_STRING);

            $sql = ('UPDATE masterpayment SET payment_amount=:payment_amount  WHERE payment_id=:payment_id');
            $stmt = $db->prepare($sql);
    
            $params = array(
                ":payment_id" => $payment_id,
                ":payment_amount" => $payment_amount
            );
    
            $stmt->execute($params);

            header('Location: ../tatausaha/master-pembayaran');
            $db = null;
            exit;
            
        }else if(array_key_exists('addtrx', $_POST) && $_POST['addtrx'] == 'primary'){
            $payment_code = filter_input(INPUT_POST, 'payment_code', FILTER_SANITIZE_STRING);
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_STRING);
            $amount =filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);

            $id = $payment_code.$idpendaftaran;
            $date = date('Y-m-d');

            $sql = "INSERT INTO payment_history (id, payment_code, idpendaftaran, amount, date, month) VALUES (:id, :payment_code, :idpendaftaran, :amount, :date, :month)";
            $stmt = $db->prepare($sql);

            $params = array(
                ":id" => $id,
                ":payment_code" => $payment_code,
                ":idpendaftaran" => $idpendaftaran,
                ":amount" => $amount,
                ":date" => $date,
                ":month" => $month
            );
    
            $stmt->execute($params);

            header('Location: ../tatausaha/invoice?idpendaftaran='.$idpendaftaran);
            $db = null;
            exit;
        }else if(array_key_exists('addtrx', $_POST) && $_POST['addtrx'] == 'additional'){
            $payment_code = filter_input(INPUT_POST, 'payment_code', FILTER_SANITIZE_STRING);
            $idpendaftaran = filter_input(INPUT_POST, 'idpendaftaran', FILTER_SANITIZE_STRING);
            $amount =filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);
            
            $id = $payment_code.$idpendaftaran;
            $date = date('Y-m-d');

            $sql = "INSERT INTO payment_history (id, payment_code, idpendaftaran, amount, date) VALUES (:id, :payment_code, :idpendaftaran, :amount, :date)";
            $stmt = $db->prepare($sql);

            $params = array(
                ":id" => $id,
                ":payment_code" => $payment_code,
                ":idpendaftaran" => $idpendaftaran,
                ":amount" => $amount,
                ":date" => $date
            );
    
            $stmt->execute($params);

            header('Location: ../tatausaha/invoice?idpendaftaran='.$idpendaftaran);
            $db = null;
            exit;
        }
    }
    

?>
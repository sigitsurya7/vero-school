<?php

    require_once '../vendor/autoload.php';
    require_once '../config/db.php';
    require_once '../config/get.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        if ($_FILES['file']['error'] == 0) {
            // File was uploaded successfully
    
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
            $numrow = 1;
            foreach($worksheet as $row){

                $idbuku = $row['A'];
                $namabuku = $row['B'];
                $penerbit = $row['C'];
                $jumlah = $row['D'];

                if($idbuku == "" && $namabuku == "" && $penerbit == "" && $jumlah == "")
                continue;

                if($numrow > 1){

                    $penerbit =  str_replace(' ', '', $penerbit);

                    $sql = "INSERT INTO buku (idbuku, namabuku, penerbit, jumlah) VALUES (:idbuku, :namabuku, :penerbit, :jumlah)";

                    $stmt = $db->prepare($sql);

                    $params = array(
                        ':idbuku' => $idbuku,
                        ':namabuku' =>$namabuku,
                        ':penerbit' => $penerbit,
                        ':jumlah' => $jumlah
                    );

                    $stmt->execute($params);

                }
                $numrow++;

                header('Location: ../perpustakaan/data-buku');
            }
        }
    }
    header('Location: ../');
    
    

?>
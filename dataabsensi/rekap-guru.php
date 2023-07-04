<?php
    require_once "../layouts/head.php";
    require_once "../config/db.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //** SANITIZE and FILTER DATA INPUT */
        $from = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_STRING);
        $to = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_STRING);

        $sql1 = "SELECT * FROM dataguru GROUP BY namaguru ASC";
        $stmt = $db->prepare($sql1);
        
        $stmt->execute();
        $rowSiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $sql = "SELECT dataguru.idguru, dataguru.namaguru, cardguru.idguru, cardguru.uid, attendance.uid, attendance.date, attendance.status
                FROM dataguru INNER JOIN cardguru on dataguru.idguru=cardguru.idguru INNER JOIN attendance ON cardguru.uid=attendance.uid
                WHERE attendance.date BETWEEN '$from' AND '$to'";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Initialize an array to hold the data
        $data = array();

        foreach ($result as $row) {
            // Extract the data from the current row
            $idguru = $row['idguru'];
            $namaguru = $row['namaguru'];
            $date = new DateTime($row['date']);
            $dayz = $date->format('j');
            $status = $row['status'];
          
            // Check if we already have an entry for this idguru in the data array
            if (!isset($data[$idguru])) {
              // If not, create a new entry for this idguru
              $data[$idguru] = array(
                'namaguru' => $namaguru,
                'data' => array()
              );
            }
          
            // Add the date and status data to the data array for this idguru
            $data[$idguru]['data'][] = array(
              'date' => $dayz,
              'status' => $status
            );
          }
          
          // Convert the data array to a JSON object
          $desc = array_multisort(array_column($data, 'namaguru'), SORT_ASC, $data);

          $json = json_encode(array_values($data));
          
          $data = json_decode($json, true);

          $to = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_STRING);

          $date = new DateTime($to);
          $days = $date->format('j');

          $h = '';
          for($o = 1; $o <= $days; $o++){
            foreach($data as $datarow){
                foreach ($datarow['data'] as $b){
                    if($b['date'] == $o){
                        $h = '<td>i</td';
                    }else{
                        $h = '<td>l</td>';
                    }
                }
            }
          }

        
    }

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap display" style="width: 100%;">
                    <thead style="text-align: center;">
                        <tr>
                            <th rowspan="2" width="10px">No</th>
                            <th rowspan="2">Nama</th>
                            <th colspan="<?php echo $days?>" width="50px">Tanggal</th>
                            <th colspan="4">Jumlah</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= $days; $i++): ?>
                            <th width="1%"><?php echo $i; ?></th>
                            <?php endfor; ?>
                            <th>Hadir</th>
                            <th>Alpha</th>
                            <th>Ijin</th>
                            <th>Sakit</th>
                        </tr>
                    </thead>
                    <tbody id="rows" style="text-align: center;">
                        <?php $no=1;?>
                        <?php foreach ($data as $dataRow): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $dataRow['namaguru']; ?></td>
                                <?php
                                    for ($i = 1; $i <= $days; $i++) {
                                        $found = false;
                                        foreach ($dataRow['data'] as $b) {
                                        if ($b['date'] == $i) {
                                        // Tambahkan data ke dalam tanggal yang sesuai
                                            if($b['status'] == 'MASUK'){
                                                echo "<td><p>H</p></td>";
                                            }else if($b['status'] == 'ALPHA'){
                                                echo "<td><p>A</p></td>";
                                            }else if($b['status'] == 'IJIN'){
                                                echo "<td><p>I</p></td>";
                                            }else if($b['status'] == 'SAKIT'){
                                                echo "<td><p>S</p></td>";
                                            }
                                        $found = true;
                                        break;
                                        }
                                        }
                                        if (!$found) {
                                        // Tambahkan data kosong ke tanggal yang tidak sesuai
                                        echo "<td></td>";
                                        }
                                    }
                                ?>
                                <?php
                                    // Initialize the counter variable
                                    $masuk_count = 0;
                                    $alpha_count = 0;
                                    $ijin_count = 0;
                                    $sakit_count = 0;

                                    // Loop through the data in the $b['status'] array
                                    foreach ($dataRow['data'] as $b) {
                                        if ($b['status'] == 'MASUK') {
                                            // Increment the counter variable if 'MASUK' is found
                                            $masuk_count++;
                                        }else if ($b['status'] == 'ALPHA') {
                                            // Increment the counter variable if 'ALPHA' is found
                                            $alpha_count++;
                                        }else if ($b['status'] == 'IJIN') {
                                            // Increment the counter variable if 'IJIN' is found
                                            $ijin_count++;
                                        }else if ($b['status'] == 'SAKIT') {
                                            // Increment the counter variable if 'SAKIT' is found
                                            $sakit_count++;
                                        }
                                    }
                                ?>
                                <td><?php echo $masuk_count?></td>
                                <td><?php echo $alpha_count?></td>
                                <td><?php echo $ijin_count?></td>
                                <td><?php echo $sakit_count?></td>
                            </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

    require_once "../layouts/footer.php";

?>
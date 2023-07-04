<?php

date_default_timezone_set('Asia/Jakarta');
include_once '../config/setting.php';
class Absensi{
	// Connection
	private $conn;

	// Table
	private $db_table = "attendance";
	private $db_table1 = "card";
	private $db_table2 = "invalid";
    private $db_table3 = "cardguru";

	// Columns
	public $id;
    public $idpendaftaran;
    public $idguru;
    public $nama;
    public $status;
    public $last_status;
    public $nowhatsapp;
    public $kelas;
    public $tanggal;
    public $waktu;
	public $uid;
    public $date;

	// Db connection
	public function __construct($db){
		$this->conn = $db;
	}

	// CREATE
	public function createData(){
	//1. Cek user
        $scheme = $_SERVER['REQUEST_SCHEME'];
        $host = $_SERVER['HTTP_HOST'];

        // Create the base URL
        $base_url['whatsApp'] = "$scheme://$host:8000";

		$sqlQuery = "SELECT * FROM ". $this->db_table1 ." JOIN datasiswa ON card.idpendaftaran = datasiswa.idpendaftaran JOIN datawali ON datasiswa.idpendaftaran = datawali.idpendaftaran WHERE uid = :uid LIMIT 0,1";
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->bindParam(":uid", $this->uid);
		$stmt->execute();
		if($stmt->errorCode() == 0) {
			while(($dataRow = $stmt->fetch(PDO::FETCH_ASSOC)) != false) {
                $this->uid = $dataRow['uid'];
				$this->idpendaftaran = $dataRow['idpendaftaran'];
                
                $this->nama = $dataRow['namasiswa'];
                $this->kelas = $dataRow['idkelas'];

                $this->nowhatsapp = $dataRow['nowhatsapp'];
			}
		} else {
			$errors = $stmt->errorInfo();
			echo($errors[2]);
		}
		$itemCount = $stmt->rowCount();
		
		if($itemCount > 0){
			//UID terdaftar -> cek status terakhir
            $sql = "SELECT attendance.id, attendance.uid, attendance.status, attendance.date
            FROM attendance, card
            WHERE attendance.id = (SELECT MAX(attendance.id) 
            FROM attendance WHERE attendance.uid = :uid) 
            AND card.uid = :uid";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":uid", $this->uid);
            $stmt->bindParam(":idpendaftaran", $this->idpendaftaran);
            $stmt->execute();
            $itemCount = $stmt->rowCount();
            
            if($itemCount > 0){
				//error handling
				if($stmt->errorCode() == 0) {
					while(($dataRow = $stmt->fetch(PDO::FETCH_ASSOC)) != false) {
						$this->last_status = $dataRow['status'];
                        $this->date = $dataRow['date'];
						//echo($this->last_status);
					}
				} else {
					$errors = $stmt->errorInfo();
					echo($errors[2]);
				}
			}else{
				$this->last_status = "PULANG";
			}

            //set status
            if ($this->last_status == "MASUK"){
				$this->status = "PULANG";
			}else{
				$this->status= "MASUK";
			}
            
           $current_time = date('H:i');

           if($this->last_status == 'MASUK' && $this->date < date('Y-m-d')){
                $this->status = "MASUK";

                $sqlQuery = "INSERT INTO ". $this->db_table ."
					SET	uid =:uid, status = :now_status, date = :tanggal, jam = :waktu";
						
                $this->waktu = date("H:i");
                $this->tanggal = date('Y-m-d');
                $this->nama;
                
                $stmt = $this->conn->prepare($sqlQuery);
            
                // sanitize
                $this->uid=htmlspecialchars(strip_tags($this->uid));
            
                // bind data
                $stmt->bindParam(":uid", $this->uid);
                $stmt->bindParam(":now_status", $this->status);
                $stmt->bindParam(":waktu", $this->waktu);
                $stmt->bindParam(":tanggal", $this->tanggal);

                if($stmt->execute()){
                    return true;
                 }
                 return false;
           }else if($this->status == "MASUK" && $this->date == date('Y-m-d')){
                $this->status= "INVALID";
                $this->waktu = date("H:i");
                $this->nama;
            
                return true;

            }else if($this->status == "PULANG" && $current_time < '12:00'){
                $this->status = 'INVALID1';
                $this->waktu = date("H:i");
                $this->nama;

                $msg = "Pelanggaran siswa atas Nama : ".$this->nama.PHP_EOL."Melakukan absen pulang sebelum waktunya";

                $data = array('number' => $this->nowhatsapp, 'message' => $msg);

                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data),
                    ),
                );
                $context  = stream_context_create($options);
                file_get_contents('http://203.194.112.115:8000/send-message', false, $context);

                return true;
                
            }else{
                $sqlQuery = "INSERT INTO ". $this->db_table ."
					SET	uid =:uid, status = :now_status, date = :tanggal, jam = :waktu";
						
                $this->waktu = date("H:i");
                $this->tanggal = date('Y-m-d');
                $this->nama;
                
                $stmt = $this->conn->prepare($sqlQuery);
            
                // sanitize
                $this->uid=htmlspecialchars(strip_tags($this->uid));
            
                // bind data
                $stmt->bindParam(":uid", $this->uid);
                $stmt->bindParam(":now_status", $this->status);
                $stmt->bindParam(":waktu", $this->waktu);
                $stmt->bindParam(":tanggal", $this->tanggal);

                $msg = DESCRIPTION.PHP_EOL."LAPORAN ABSENSI".PHP_EOL."Nama : ".$this->nama.PHP_EOL."Kelas : ".$this->kelas.PHP_EOL."Status : ".$this->status.PHP_EOL."Pada tanggal : ".tgl_indo($this->tanggal).PHP_EOL."Jam : ".$this->waktu.PHP_EOL."TERIMA KASIH";

                $data = array('number' => $this->nowhatsapp, 'message' => $msg);

                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data),
                    ),
                );
                $context  = stream_context_create($options);
                file_get_contents('http://203.194.112.115:8000/send-message', false, $context);

                if($stmt->execute()){
                    return true;
                 }
                 return false;
            }

        }else if($itemCount == 0){
            $sqlQuery = "SELECT * FROM ". $this->db_table3 ." WHERE uid = :uid LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":uid", $this->uid);
            $stmt->execute();
            if($stmt->errorCode() == 0) {
                while(($dataRow = $stmt->fetch(PDO::FETCH_ASSOC)) != false) {
                    $this->uid = $dataRow['uid'];
                    $this->idguru = $dataRow['idguru'];
                }
            } else {
                $errors = $stmt->errorInfo();
                echo($errors[2]);
            }
            $itemCount = $stmt->rowCount();
            
            if($itemCount > 0){
                //UID terdaftar -> cek status terakhir
                $sql = "SELECT attendance.id, attendance.uid, attendance.status, attendance.date, cardguru.idguru, dataguru.namaguru 
                FROM attendance, cardguru, dataguru
                WHERE attendance.id = (SELECT MAX(attendance.id) 
                FROM attendance WHERE attendance.uid = :uid) 
                AND cardguru.uid = :uid AND dataguru.idguru = :idguru";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":uid", $this->uid);
                $stmt->bindParam(":idguru", $this->idguru);
                $stmt->execute();
                $itemCount = $stmt->rowCount();
                
                if($itemCount > 0){
                    //error handling
                    if($stmt->errorCode() == 0) {
                        while(($dataRow = $stmt->fetch(PDO::FETCH_ASSOC)) != false) {
                            $this->last_status = $dataRow['status'];
                            $this->idguru = $dataRow['idguru'];
                            $this->nama = $dataRow['namaguru'];
                            $this->date = $dataRow['date'];
                            //echo($this->last_status);
                        }
                    } else {
                        $errors = $stmt->errorInfo();
                        echo($errors[2]);
                    }
                }else{
                    $this->last_status ="PULANG";
                }
    
                //set status
                if ($this->last_status == "MASUK"){
                    $this->status = "PULANG";
                }else{
                    $this->status= "MASUK";
                }
                
               $current_time = date('H:i');
    
                if($this->status == "MASUK" && $this->date == date('Y-m-d')){
                    $this->status= "INVALID";;
                    $this->uid=htmlspecialchars(strip_tags($this->uid));
    
                    $sqlQuery = "INSERT INTO
                                ". $this->db_table2 ."
                            SET
                                uid = :uid,
                                status = :now_status,
                                date = :date, 
                                jam = :waktu";
                    $this->waktu = date("H:i:s");
                    $this->date = date('Y-m-d');
                    
                    $stmt = $this->conn->prepare($sqlQuery);
                
                    // sanitize
                    $this->uid=htmlspecialchars(strip_tags($this->uid));
                
                    // bind data
                    $stmt->bindParam(":uid", $this->uid);
                    $stmt->bindParam(":now_status", $this->status);
                    $stmt->bindParam(":date", $this->date);
                    $stmt->bindParam(":waktu", $this->waktu);
                
                    if($stmt->execute()){
                    return true;
                    }
                    return false;
    
                }else if($this->status == "PULANG" && $current_time > '12:00'){
                    $sqlQuery = "INSERT INTO ". $this->db_table ."
                        SET	uid =:uid, status = :now_status, date = :tanggal, jam = :waktu";
                            
                    $this->waktu = date("H:i");
                    $this->tanggal = date('Y-m-d');
                    
                    $stmt = $this->conn->prepare($sqlQuery);
                
                    // sanitize
                    $this->uid=htmlspecialchars(strip_tags($this->uid));
                
                    // bind data
                    $stmt->bindParam(":uid", $this->uid);
                    $stmt->bindParam(":now_status", $this->status);
                    $stmt->bindParam(":waktu", $this->waktu);
                    $stmt->bindParam(":tanggal", $this->tanggal);
    
                    if($stmt->execute()){
                        return true;
                     }
                     return false;
                }else{
                    $sqlQuery = "INSERT INTO ". $this->db_table ."
                        SET	uid =:uid, status = :now_status, date = :tanggal, jam = :waktu";
                            
                    $this->waktu = date("H:i");
                    $this->tanggal = date('Y-m-d');
                    
                    $stmt = $this->conn->prepare($sqlQuery);
                
                    // sanitize
                    $this->uid=htmlspecialchars(strip_tags($this->uid));
                
                    // bind data
                    $stmt->bindParam(":uid", $this->uid);
                    $stmt->bindParam(":now_status", $this->status);
                    $stmt->bindParam(":waktu", $this->waktu);
                    $stmt->bindParam(":tanggal", $this->tanggal);
    
                    if($stmt->execute()){
                        return true;
                     }
                     return false;
                }
    
            }else{
                $this->status = 'ERR';
                $this->waktu = date("H:i");

                $Write="<?php $" . "UIDCard='" . $this->uid . "'; " . "echo $" . "UIDCard;" . " ?>";
			    file_put_contents('../dataabsensi/UIDContainer.php',$Write);

                return true;
            } 
        }
    }
}
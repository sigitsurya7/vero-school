<?php
    require_once 'setting.php';

    // Connect to the database using PDO
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, 
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);

    // Set up a secure connection using SSL/TLS
    $db->setAttribute(PDO::MYSQL_ATTR_SSL_CA, '/path/to/ca_cert.pem');
    $db->setAttribute(PDO::MYSQL_ATTR_SSL_KEY, '/path/to/client_key.pem');
    $db->setAttribute(PDO::MYSQL_ATTR_SSL_CERT, '/path/to/client_cert.pem');

    //** Get DB API */
    class Database {

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
    
?>
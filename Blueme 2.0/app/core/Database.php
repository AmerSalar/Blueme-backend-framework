<?php
defined('ROOTPATH') OR exit("Access denied!");
Trait Database {
    
    private static $pdo = null;
    private function connect() {
        if (self::$pdo == null) {
            try {
                $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME .";charset=".DB_CHARSET;
                self::$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }

                
        }
        return self::$pdo;
    }
    public function query($query, $data = []) {
        $con = $this->connect();
        $statem = $con->prepare($query);
        $check = $statem->execute($data);
        if($check) {
            $result = $statem->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
            return $result;
            }
        }

        return false;
    }
    public function getRow($query, $data = []) {
        $con = $this->connect();
        $statem = $con->prepare($query);
        $check = $statem->execute($data);
        if($check) {
            $result = $statem->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
            return $result[0];
            }
        }

        return false;
    }
    
}
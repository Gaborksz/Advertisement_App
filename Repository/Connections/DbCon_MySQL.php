<?php 

class DbCon_MySQL {

    private $host = 'localhost';
    private $user = 'advertisementDb_admin';
    private $password = 'admin';
    private $dbname = 'advertisement_Db';
    
    public function connect() {
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
        
        try  {
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch ( PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

}
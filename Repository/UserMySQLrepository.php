<?php

Class UserMySQLRepository implements UserRepositoryInt {

    private DbCon_MySQL $dbCon;



    public function __construct(DbCon_MySQL $dbCon)
    {
        $this->dbCon = $dbCon;
    }


    public function getUsers()
    {
        
        try {
            $sql = "SELECT * FROM users";
            $statement = $this->dbCon->connect()->prepare($sql);        
            $statement->execute();

            $usersAsRawList = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $usersAsRawList;

        } catch (PDOException $e) {    
            die("Query failed: " . $e->getMessage());
        }
    }      
}
<?php

Class AdvertMySQLRepository implements AdvertRepositoryInt {
    
    private DbCon_MySQL $dbCon;



    public function __construct(DbCon_MySQL $dbCon)
    {
        $this->dbCon = $dbCon;
    }


    public function getAdverts()
    {
        
        try {
            $sql = "SELECT * FROM advertisements 
                    LEFT JOIN users 
                    ON advertisements.userId = users.id";
            
            $statement = $this->dbCon->connect()->prepare($sql);        
            $statement->execute();

            $advertsAsRawList = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $advertsAsRawList;

        } catch (PDOException $e) {    
            die("Query failed: " . $e->getMessage());
        }
    } 
}
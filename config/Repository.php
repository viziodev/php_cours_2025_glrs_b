<?php 
namespace App\Config;
abstract class Repository{
    protected Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }

     protected  function findAll(string $sql,callable $convert):array{
      try {
           $stmt = $this->database->getPdo()->query($sql);
            $datas=[];
             while ($row = $stmt->fetch()) {
                $datas[]=$convert($row);
             }
            return $datas;
      } catch (\PDOException $ex) {
          echo("Erreur ".$ex->getMessage());
          exit;
     }  
      return [];

     }
    protected  function findById(int $id,string $sql,callable $convert):object|null{
        try {
            $stmt = $this->database->getPdo()->query($sql);
            $stmt->execute([$id]);
              if ($row = $stmt->fetch()) {
                return $convert($row);
              }
       
       } catch (\PDOException $ex) {
           echo("Erreur ".$ex->getMessage());
           exit;
      }  
       return null;
    }

    protected  function executeNoQuey(string $sql,array $data):int{
        try {
            $stmt = $this->database->getPdo()->prepare($sql);  
            $stmt->execute($data);
             return    $stmt->rowCount();
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  

       return  0;
    }


}
<?php 
require_once "./../config/Database.php";
class CompteRepository{
    
    private Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }
    public function selectAllCompte():array{
        $sql="select * from compte";
       try {
            //2-Executer la Requete
            //3-Recuperer les donnees sous forme de tableau
              $stmt = $this->database->getPdo()->query($sql);
              $comptes=[];
               while ($row = $stmt->fetch()) {
                  $comptes[]=Compte::toCompte($row);
               }
              return $comptes;
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return [];
    }

    public function selectCompteById(int $id):Compte|null{
        $sql="select * from compte where id=$id";
        try {
              $stmt = $this->database->getPdo()->query($sql);
              $row = $stmt->fetch();
              return Compte::toCompte($row);
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }

    public function selectCompteByNum(string $num):Compte|null{
        $sql="select * from compte where numero='$num'";
        try {
              $stmt = $this->database->getPdo()->query($sql);
              if($row = $stmt->fetch()){
                return Compte::toCompte($row);
              }
             
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }

    public function insertCompte(Compte $compte):int{
        $sql="INSERT INTO `compte` ( `numero`, `dateCreation`, `solde`) VALUES ('".$compte->getNumero()."', '2025-05-15', '".$compte->getSolde()."');";
        $nbreCompteInsere =0;
        try {
               $nbreCompteInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
             echo("Erreur ".$ex->getMessage());
             exit;
        }  

        return  $nbreCompteInsere;
    }

}
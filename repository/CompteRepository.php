<?php 
require_once "./../config/Database.php";
class CompteRepository{
    
    private Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }
    public function selectAllCompte(int|null $clientId, int $page,int $limit):array{
        /*
           
           page=1 ==>  Limit 0,6     offset=(1-1)*6=0     //Ligne  1 ---> 5
           page=2 ==>  Limit 6,6     offset=(2-1)*6=6      //Ligne  6 ---> 11
           page=3 ==>  Limit 12,6    offset=(3-1)*6=12    //Ligne 12 ---> 17


           page=? ==> Limit offset,limit
                      offset=(page-1)*limit
        
        */
          $where=" where c.`client_id`=u.id ";
         if ($clientId!=null) {
               $where.=" and client_id =$clientId" ;
         }
        $offset=($page-1)*$limit;
        $sql="select c.*,u.nomComplet as titulaire from `compte`c, utilisateur u  $where LIMIT $offset,$limit";
        
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
        $sql="select c.*,u.nomComplet as titulaire  from `compte`c, utilisateur u where c.`client_id`=u.id and  c.id=$id";
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
        $sql="select c.*,u.nomComplet as titulaire from `compte`c, utilisateur u where c.`client_id`=u.id and  numero like '$num'";
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
        $dateString=  $compte->getDateCreation()->format("Y-m-d");
        $clientId=$compte->getTitulaire();
        $sql="INSERT INTO `compte` ( `numero`, `dateCreation`, `solde`,client_id) VALUES ('".$compte->getNumero()."',"."'$dateString'".", '".$compte->getSolde()."', $clientId);";
        $nbreCompteInsere =0;
        try {
               $nbreCompteInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
             echo("Erreur ".$ex->getMessage());
             exit;
        }  

        return  $nbreCompteInsere;
    }

    public function updateCompte(int  $compteId,int $montant):int{
        $sql="UPDATE `compte` SET `solde` = `solde` + '$montant' WHERE `compte`.`id` = $compteId;";
        $nbreCompteInsere =0;
        try {
               $nbreCompteInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
             echo("Erreur ".$ex->getMessage());
             exit;
        }  
        return  $nbreCompteInsere;
    }

    //SELECT id FROM `compte` ORDER by `id` desc LIMIT 0,1;


    public function selectLastInsertId():int{
        $sql="SELECT id FROM `compte` ORDER by `id` desc LIMIT 0,1";
        try {
              $stmt = $this->database->getPdo()->query($sql);
              if($row = $stmt->fetch()){
                return $row["id"];
              }
             
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return 0;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `compte`";
        try {
              $stmt = $this->database->getPdo()->query($sql);
              if($row = $stmt->fetch()){
                return $row["count"];
              }
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return 0;
    }
}
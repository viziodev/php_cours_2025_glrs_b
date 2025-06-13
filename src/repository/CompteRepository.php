<?php 
namespace App\Repository;

use App\Models\Compte;
use App\Config\Repository;

class CompteRepository extends Repository{
    
   
    public function __construct()
    {
        parent::__construct();
    }
    public function selectAllCompte(int|null $clientId, int $page,int $limit):array{
          $where="  ";
          if ($clientId!=null) {
               $where.=" and client_id =$clientId" ;
          }
          $offset=($page-1)*$limit;
          $sql="select c.*,u.nomComplet as titulaire from `compte`c, utilisateur u   $where LIMIT $offset,$limit";
          return $this->findAll($sql,['App\\Models\\Compte', 'toCompte']);
    }

    public function selectCompteById(int $id):Compte|null{
        $sql="select c.*,u.nomComplet as titulaire  from `compte`c, utilisateur u where c.`client_id`=u.id and  c.id=?";
        return $this->findById($id,$sql,['App\\Models\\Compte', 'toCompte']);
    }

    public function selectCompteByNum(string $num):Compte|null{
       
        try {
            $sql="select c.*,u.nomComplet as titulaire from `compte`c, utilisateur u where c.`client_id`=u.id and  numero like ?";
           
            $stmt = $this->database->getPdo()->prepare($sql);  
            $stmt->execute([$num]);
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
        $sql="INSERT INTO `compte` ( `numero`, `dateCreation`, `solde`,client_id) VALUES (?,?,?,?);";
        return $this->executeNoQuey($sql,[$compte->getNumero(),$dateString,$compte->getSolde(),$clientId]);

    }

    public function updateCompte(int  $compteId,int $montant):int{
     
        $nbreCompteInsere =0;
        try {
            $sql="UPDATE `compte` SET `solde` = ? + '$montant' WHERE `compte`.`id` = ?;";
            $stmt = $this->database->getPdo()->prepare($sql);  
            $stmt->execute([$montant,$compteId]);
             
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
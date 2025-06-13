<?php 
namespace App\Repository;
use  App\Config\Database;
use App\Config\Repository;
use App\Models\Transaction;

class TransactionRepository extends Repository{
    
    
  public function __construct()
  {
      parent::__construct();
  }
    public function selectAll(int $page,int $limit,int $compteId):array{
        $offset=($page-1)*$limit;
     
       try {
          $sql="SELECT t.*,c.solde FROM `transaction` t,compte c WHERE t.compte_id=c.id and  t.compte_id=? LIMIT $offset,$limit";
            $stmt = $this->database->getPdo()->prepare($sql);  
            $stmt->execute([$compteId]);
              $transactions=[];
               while ($row = $stmt->fetch()) {
                  $transactions[]=Transaction::toTransaction($row);
               }
              return $transactions;
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return [];
    }


    

    public function insertTransaction(Transaction $transaction):int{
     
        try {
          $dateString=  $transaction->getDate()->format("Y-m-d");
          $sql="INSERT INTO `transaction` (`type`,`date`, `montant`,`compte_id`,`solde_apres`) VALUES (?,?,?,?,?);";
          $stmt = $this->database->getPdo()->prepare($sql);  
          $stmt->execute([$transaction->getType(),$dateString,$transaction->getMontant(),$transaction->getCompteId(),$transaction->getSoldeApres()]);
        } catch (\PDOException $ex) {
             echo("Erreur ".$ex->getMessage());
             exit;
        }  
        return  0;
    }

    //SELECT id FROM `compte` ORDER by `id` desc LIMIT 0,1;


    public function selectLastTransaction(int $compteId):Transaction|null{
   
        try {
              $sql="SELECT * FROM `transaction` WHERE  compte_id=? ORDER by `id` desc LIMIT 0,1";
              $stmt = $this->database->getPdo()->prepare($sql);  
              $stmt->execute([$compteId]);
              if($row = $stmt->fetch()){
                return Transaction::toTransaction($row );
              }
             
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }

    public function count(int $compteId):int{
     
        try {
          $sql="SELECT count(id) as count FROM `transaction`  WHERE  compte_id=?";
          $stmt = $this->database->getPdo()->prepare($sql);  
          $stmt->execute([$compteId]);
              if($row = $stmt->fetch()){
                return $row["count"]??0;
              }
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return 0;
    }

    public function selectTotalTransaction(int $compteId,$type="DEPOT"):int|null{
       
      
        try {
             $sql="select sum(montant) as total from transaction  WHERE  compte_id=? and type=?";
             $stmt = $this->database->getPdo()->prepare($sql);  
             $stmt->execute([$compteId,$type]);
              if($row = $stmt->fetch()){
                return $row["total"]??0;
              }
             
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }
}
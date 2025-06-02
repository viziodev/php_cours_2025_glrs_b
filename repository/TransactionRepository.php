<?php 
require_once "./../config/Database.php";
class TransactionRepository{
    
    private Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }
    public function selectAll(int $page,int $limit,int $compteId):array{
        $offset=($page-1)*$limit;
        $sql="SELECT t.*,c.solde FROM `transaction` t,compte c WHERE t.compte_id=c.id and  t.compte_id=$compteId LIMIT $offset,$limit";
       try {
            //2-Executer la Requete
            //3-Recuperer les donnees sous forme de tableau
              $stmt = $this->database->getPdo()->query($sql);
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
        $dateString=  $transaction->getDate()->format("Y-m-d");
        $sql="INSERT INTO `transaction` (`type`,`date`, `montant`,`compte_id`) VALUES ('".$transaction->getType()."',"."'$dateString'".", '".$transaction->getMontant()."','".$transaction->getCompteId()."');";
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


    public function selectLastTransaction(int $compteId):Transaction|null{
        $sql="SELECT * FROM `transaction` WHERE  compte_id=$compteId ORDER by `id` desc LIMIT 0,1";
        try {
              $stmt = $this->database->getPdo()->query($sql);
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
        $sql="SELECT count(id) as count FROM `transaction`  WHERE  compte_id=$compteId";
        try {
              $stmt = $this->database->getPdo()->query($sql);
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
        $sql="select sum(montant) as total from transaction  WHERE  compte_id=$compteId and type='$type'";
      
        try {
              $stmt = $this->database->getPdo()->query($sql);
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
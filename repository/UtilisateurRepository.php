<?php 
require_once "./../config/Database.php";
class UtilisateurRepository{
    
    private Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }

    public function selectUserByLoginAndPassword(string $login,string $password):Utilisateur|null{
        $sql="SELECT * FROM `utilisateur` WHERE login='$login' and password='$password';";
        try {
              $stmt = $this->database->getPdo()->query($sql);
             if($row = $stmt->fetch()){
                return Utilisateur::toUser($row);
             }
            
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }

    
}
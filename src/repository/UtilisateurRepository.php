<?php 
namespace App\Repository;
use  App\Config\Database;
use App\Models\Utilisateur;

class UtilisateurRepository{
    
    private Database $database;
    public function __construct()
    {
        $this->database=new Database();
    }

    public function selectUserByLoginAndPassword(string $login,string $password):null|Utilisateur{
        $sql="SELECT * FROM `utilisateur` WHERE login='$login' and password='$password';";
        try {
              $stmt = $this->database->getPdo()->query($sql);
             if($row = $stmt->fetch()){
                return Utilisateur::toUser($row );
             } 
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return null;
    }

    public function selectAllUserByRole(string $role="CLIENT"):array{
        $sql="SELECT * FROM `utilisateur` WHERE role='$role'";
        try {
              $stmt = $this->database->getPdo()->query($sql);
              $users=[];
             while($row = $stmt->fetch()){
                $users[]=Utilisateur::toUser($row );
             } 
             return  $users;
       } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
       }  
        return [];
    }

    
}
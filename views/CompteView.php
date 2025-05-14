<?php 
require_once "./models/Compte.php";
require_once "./models/CompteCheque.php";
class CompteView{
    
    public static function saisieCompte():Compte{
          $solde=(float)  readline("Saisir le Solde");
          do {
            print("1-Epargne\n");
            print("2-Cheque\n");
            $type=(int)readline("Veuillez saisir le type compte");
          } while ($type!=1 && $type!=2);
          if ($type==2) {
            $compte =new CompteCheque($solde);
          }
         
          return $compte;
    }

    public static function afficheCompte(array $comptes):void{
         foreach ($comptes as  $compte) {
            print("$compte\n");
         }
  }
}
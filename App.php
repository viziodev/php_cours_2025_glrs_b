<?php 
require_once "./services/CompteService.php";
require_once "./views/CompteView.php";
class App{
    public  static function main():void{
        $compteService=new CompteService();
             do {
                $choix=self::menu();
                switch ($choix) {
                    case '1':
                        $compte=CompteView::saisieCompte();
                        $compteService->addCompte( $compte);
                        break;
                   case '2':
                        CompteView::afficheCompte($compteService->listerCompte());
                        break;
                    default:
                        # code...
                        break;
                }
             } while ($choix <= 10);
    }

    public static function menu():string{
        print("1-Creer un Compte\n");
        print("2-Lister les Comptes\n");
        print("3-Quitter\n");
        return readline("Veuillez faire un choix");

    }
}

App::main();


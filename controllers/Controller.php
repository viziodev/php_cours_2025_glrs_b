<?php 
abstract class Controller{
   
    protected function __construct()
    {
        
    }
    /*
        callAction: Elle gere les actions d'un controllers
    */
    protected abstract function callAction();


    protected function renderView(string $view,array $data=[])
    {
        /*
          extract : La fonction extract() en PHP permet d’importer 
          les éléments d’un tableau associatif dans la table
           des symboles (en variables PHP locales). Autrement dit, chaque clé du tableau devient une variable, et sa valeur devient la valeur de cette variable.
           Exemple : 
           $data = [
            'nom' => 'Alice',
            'age' => 25
           ];
            $nom= $data['nom'];
            $age= $data['age'];
            ou
             extract($data );  
             echo $nom=> 'Alice'
             echo $age=> 25

              $data=[
                "comptes"=> $comptes,
                "nbrePage"=> $nbrePage,
               ];
               extract($data);
               $comptes,$nbrePage

        */
         extract($data);
         require_once "../views/layout/header.inc.php";
         require_once "../views/$view.html.php";
         require_once "../views/layout/footer.inc.php";
    }

}
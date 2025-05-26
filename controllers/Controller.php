<?php 
abstract class Controller{
    protected CompteService $compteService;
    protected function __construct()
    {
        
    }

    public abstract function callAction();


    protected function renderView(string $view,array $data=[])
    {
         extract($data);
        require_once "../views/layout/header.inc.php";
        require_once "../views/$view.html.php";
        require_once "../views/layout/footer.inc.php";
    }

}
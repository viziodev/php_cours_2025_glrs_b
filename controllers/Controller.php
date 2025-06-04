<?php 
abstract class Controller{
    protected $layout="base";
   
    protected function __construct()
    {
        
    }
    /*
        callAction: Elle gere les actions d'un controllers
    */
    protected abstract function callAction();


    protected function renderView(string $path,array $data=[])
    {
           extract($data);
            ob_start();
               require_once "../views/$path.html.php";
           $view= ob_get_clean();

           require_once "../views/layout/$this->layout.layout.php";
        
    }

}
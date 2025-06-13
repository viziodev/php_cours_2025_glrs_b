<?php 
namespace App\Config;
abstract class Controller{
    protected $layout="base";
    protected Validator $validator;
   
    protected function __construct()
    {
        if (session_status()==PHP_SESSION_NONE) {
            session_start();
         }
         $this->validator=new Validator();
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
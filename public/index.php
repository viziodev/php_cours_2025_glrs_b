<?php 


//SPA ==>Single Page Application
//Request

$controller =$_REQUEST['controller']??"compte";//form
        switch ( $controller ) {
            case 'compte':
                require_once "../controllers/CompteController.php";
                $controller=new  CompteController();
               break;
            case 'transaction':
                require_once "../controllers/TransactionController.php";
                $controller=new  TransactionController();
                break;
           default:
               # code...
               break;
        }


?>

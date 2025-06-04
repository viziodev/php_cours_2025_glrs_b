<?php 


//SPA ==>Single Page Application
//Request

$controller =$_REQUEST['controller']??"security";//form
        switch ( $controller ) {
            case 'security':
                require_once "../controllers/SecurityController.php";
                $controller=new  SecurityController();
               break;
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

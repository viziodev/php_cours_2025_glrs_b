<?php 
require '../vendor/autoload.php';
$controller =$_REQUEST['controller']??"security";//form
        switch ( $controller ) {
            case 'security':
                $controller=new \App\Controllers\SecurityController();
               break;
            case 'compte':
                $controller=new  \App\Controllers\CompteController();
               break;
            case 'transaction':
                $controller=new  \App\Controllers\TransactionController();
                break;
           default:
               # code...
               break;
        }

?>

<?php 
require_once "../controllers/CompteController.php";
$page =$_GET['page']??"list";//form
 $compteController=new  CompteController();
 switch ($page) {
    case 'list':
        $compteController->showList();
        break;
    case 'form':
            $compteController->loadForm();
            break;
    case 'create':
                $compteController->createCompte();
                break;
    default:
        # code...
        break;
 }


?>

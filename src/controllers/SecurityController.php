<?php 
namespace App\Controllers;

use App\Config\Controller;
use App\Services\UtilisateurService;

class SecurityController extends Controller{
    private UtilisateurService $userService;
    public  function __construct()
    {
        parent::__construct();
        $this->userService=new UtilisateurService();
        $this->layout="connexion";
        $this->callAction();
    }

    public function callAction(){
        $action =$_REQUEST['action']??"form";//form
        switch ( $action) {
           case 'form':
               $this->loadForm();
               break;
           case 'login':
                $this->login();
                break;
           case 'logout':
                $this->logout();
                   break;
           
           default:
               # code...
               break;
        } 
    }

    public function login(){
         //1-Recuperer
            extract($_REQUEST);
         //2-Validation
           $this->validator->isEmpty($login,'login',"Login est obligatoire");
           $this->validator->isEmail($login,'login',"Login  doit etre un email");
           $this->validator->isEmpty($password,'password',"Password est obligatoire");
         //3-Authentification
          if ($this->validator->isValid()) {
                $user= $this->userService->seConnecter($login,$password);
                if ($user==null) {
                    $this->validator->addErreur("connexion","Login ou Password incorrect");
                    $_SESSION['erreurs']= $this->validator->getErreurs();
                    header("location:index.php");
                    exit;
                }
                $_SESSION['user']=$user->toArray();      
                header("location:index.php?controller=compte&action=list");
          }else{
                   $_SESSION['erreurs']= $this->validator->getErreurs();
                   header("location:index.php");
                   exit;
          }  
    }
    public function loadForm(){
       
        $this->renderView("security/login",[]);
    }

    public function logout(){
        $_SESSION['user']=array();
        unset($_SESSION['user']);
        session_unset();      
        session_destroy();
        header("location:index.php?controller=security&action=form");
    }



}
<?php 
namespace  App\Services;

use App\Models\Utilisateur;
use App\Repository\UtilisateurRepository;

class UtilisateurService{
    private UtilisateurRepository $userRepository;

    public function __construct()
    {
     $this->userRepository =new UtilisateurRepository();
    }
    /**
     * Get the value of comptes
     */
    public function seConnecter(string $login,string $password): Utilisateur|null
    {
     return  $this->userRepository->selectUserByLoginAndPassword($login,$password);
    }

    public function listeClient(): array
    {
       return  $this->userRepository->selectAllUserByRole();
    }
    
}
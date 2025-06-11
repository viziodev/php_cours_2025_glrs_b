<?php 
require_once "./../models/Compte.php";
require_once "./../repository/CompteRepository.php";
class CompteService{
    private CompteRepository $compteRepository;
    private const LIMIT=6;
    public function __construct()
    {
     $this->compteRepository =new CompteRepository();
    }
    /**
     * Get the value of comptes
     */
    public function listerCompte(int|null $clientId,int $page=1,int $limit=self::LIMIT): array
    {
     return  $this->compteRepository->selectAllCompte($clientId,$page,$limit);
    }
    public function addCompte(Compte $compte): void
    {
      $compte->setNumero($this->generateNumero());
      $this->compteRepository->insertCompte($compte);
    }
    public function searchCompteByNum(string $numero): Compte|null
    {
      return $this->compteRepository->selectCompteByNum($numero);
    }

    public function searchCompteById(int $id): Compte|null
    {
      return $this->compteRepository->selectCompteById($id);
    }

    private function generateNumero():string{
      $lastId=$this->compteRepository->selectLastInsertId();
      return "NUM_".($lastId+1);
    }

    public function  getNbrePage():int {
       $totalElement=$this->compteRepository->count();
       return ceil( $totalElement/self::LIMIT);
    }
}
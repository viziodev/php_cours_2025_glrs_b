<?php 
require_once "./../models/Transaction.php";
require_once "./../repository/TransactionRepository.php";
require_once "./../repository/CompteRepository.php";
class TransactionService{
    private TransactionRepository $transactionRepository;
    private CompteRepository $compteRepository;
    private const LIMIT=6;
    public function __construct()
    {
     $this->transactionRepository =new TransactionRepository();
     $this->compteRepository =new CompteRepository();
    }
    /**
     * Get the value of comptes
     */
    public function listerTransactionUnCompte(int $compteId,int $page=1,int $limit=self::LIMIT): array
    {
     return  $this->transactionRepository->selectAll($page,$limit,$compteId);
    }

    public function listerStatistiques(int $compteId): array
    {
      $transaction=$this->transactionRepository->selectLastTransaction($compteId);
       return [
         "totalDepot"=> $this->transactionRepository->selectTotalTransaction($compteId),
         "totalRetrait"=>$this->transactionRepository->selectTotalTransaction($compteId,"RETRAIT"),
         "nbreTransaction"=>$this->transactionRepository->count($compteId),
         "lastDate"=>$transaction==null?'':$this->getDateToString($transaction->getDate())
       ];
    }

    public function getDateToString(DateTime $date): string
    {
      return $date->format("d/m/Y");
    }

    public function addTransaction(Transaction $transaction): void
    {
      //Transaction SGBD ==> ACID
        $montant=$transaction->getType()=="DEPOT"?$transaction->getMontant():-1*$transaction->getMontant();
        $compte =$this->compteRepository->selectCompteById($transaction->getCompteId());
        $soldeApres= $compte->getSolde()+$montant;
        $transaction->setSoldeApres($soldeApres);
        $this->transactionRepository->insertTransaction($transaction);
       $this->compteRepository->updateCompte($transaction->getCompteId(), $montant);
    }
    
}
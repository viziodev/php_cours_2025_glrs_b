<?php 
class CompteCheque extends Compte{
    private const  Frais=0.08;

   //Java super objet parent i.e Compte
   //PHP parent objet parent i.e Compte
    public function  __construct(){   
          // parent::__construct();//super()
    }
    public  function retrait(Transaction $transaction){
        $montant=self::Frais*$transaction->getMontant();
        $this->solde-=$montant;
        $this->addTransaction($transaction);

    }
    public  function depot(Transaction $transaction){
        $montant=self::Frais*$transaction->getMontant();
        $this->solde+=$montant;
        $this->addTransaction($transaction);
       
    }

}
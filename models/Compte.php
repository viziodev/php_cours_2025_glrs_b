<?php 
 class Compte{
    protected int $id;
    protected \DateTime $dateCreation; 
    protected float $solde;
    protected  string $numero;
    protected  string $titulaire;
    //OneToMany
    private  array $transactions=[];

    //public abstract function retrait(Transaction $transaction);
   // public abstract function depot(Transaction $transaction);

    //self ==> Compte
    //$this==> objet qui utilise la methode de la classe
    public function  __construct(float $solde=0,string $titulaire=""){   
         $this->solde=$solde;
         $this->titulaire=$titulaire;
         $this->dateCreation=new DateTime();
    }
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): Compte
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }
    public function getDateCreationToString(): string
    {
        return $this->dateCreation->format("d/m/Y");
    }

    /**
     * Set the value of dateCreation
     */
    public function setDateCreation(\DateTime $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of solde
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     */
    public function setSolde(float $solde): Compte
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero(string $numero): Compte
    {
        $this->numero = $numero;

        return $this;
    }

    public function __toString()
    {
          return "Id: ".  $this->id." Solde: ".$this->solde;
    }

    /**
     * Get the value of transactions
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * Set the value of transactions
     */
    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

   public static function toCompte($row):Compte{
       $compte=new Compte();
       $compte->setId($row['id']);
       $compte->setNumero($row['numero']);
       $compte->setDateCreation(new DateTime($row['dateCreation']));
       $compte->setSolde($row['solde']);
       $compte->setTitulaire($row['titulaire']);
      return $compte;

    }
    

    /**
     * Get the value of titulaire
     */
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire
     */
    public function setTitulaire(string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }
}
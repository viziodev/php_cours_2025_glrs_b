<?php 
abstract class Compte{
    protected static int $nbre=0;
    protected int $id;
    protected \DateTime $dateCreation; 
    protected float $solde;
    protected  string $numero;
    //OneToMany
    private  array $transactions=[];

    public abstract function retrait(Transaction $transaction);
    public abstract function depot(Transaction $transaction);

    //self ==> Compte
    //$this==> objet qui utilise la methode de la classe
    public function  __construct(float $solde){   
        Compte::$nbre++;
        $this->id=Compte::$nbre;
        $this->numero="NUM_".$this->id;
        $this->solde=$solde;
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
}
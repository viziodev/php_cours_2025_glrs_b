<?php 

class Transaction{
    private static int $nbre=0;
    private int $id;
    private \DateTime $date; 
    private float $montant;
    //Constructeur
    //Java ==> Transaction.nbreCompte++
    //PHP ==> self::$nbreCompte++;
    public function  __construct(){   
        self::$nbre++;
        $this->id=self::$nbre;
    }
  //this.nomAttribut  ==> $this->nomAttribut
    /**
     * Get the value of montant
     */
    public function getMontant(): float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     */
    public function setMontant(float $montant): void
    {
        $this->montant = $montant;
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
    public function setId(int $id): void
    {
        $this->id = $id;

       
    }
    /**
     * Get the value of date
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;

 
    }
    public function __toString()
    {
          return "Id: ".  $this->id." Montant: ".$this->montant;
    }
}
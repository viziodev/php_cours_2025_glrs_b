<?php 

class Transaction{

    private int $id;
    private \DateTime $date; 
    private float $montant;
    private string $type;
    private float $soldeApres;
    private int $compteId;

    //Attributs de Styles
    public string  $textStyleMontant;
    public string  $bgStyleType;
    public string  $sensTransaction;
    //Constructeur
    //Java ==> Transaction.nbreCompte++
    //PHP ==> self::$nbreCompte++;
    public function  __construct(int $compteId=0,float $montant=0,string $type="DEPOT"){   
        $this->compteId=$compteId;
        $this->montant=$montant;
        $this->type=$type;
        $this->date=new DateTime();
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

    public static function toTransaction($row):Transaction{
        $transaction=new Transaction();
        $transaction->setId($row['id']);
        $transaction->setDate(new DateTime($row['date']));
        $transaction->setMontant($row['montant']);
        $transaction->setType($row['type']);
        $transaction->setSoldeApres($row['solde_apres']??0);
        //Styles
        $transaction->textStyleMontant=$row['type']=="DEPOT"?"text-success":"text-danger";
        $transaction->bgStyleType=$row['type']=="DEPOT"?"bg-success":"bg-danger";
        $transaction->sensTransaction=$row['type']=="DEPOT"?"+":"-";

        return $transaction;
 
     }

     public function getDateToString(): string
      {
        return $this->date->format("d/m/Y");
      }

    /**
     * Get the value of type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of soldeApres
     */
    public function getSoldeApres(): float
    {
        return $this->soldeApres;
    }

    /**
     * Set the value of soldeApres
     */
    public function setSoldeApres(float $soldeApres): self
    {
        $this->soldeApres = $soldeApres;

        return $this;
    }

    /**
     * Get the value of compteId
     */
    public function getCompteId(): int
    {
        return $this->compteId;
    }

    /**
     * Set the value of compteId
     */
    public function setCompteId(int $compteId): self
    {
        $this->compteId = $compteId;

        return $this;
    }
}
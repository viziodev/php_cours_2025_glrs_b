<?php 
namespace App\Config;
class Validator{
    private  $erreurs=[];

    /**
     * Get the value of erreurs
     */
    public function getErreurs()
    {
        return $this->erreurs;
    }

    /**
     * Set the value of erreurs
     */
    public function addErreur(string $key,$erreur): void
    {
        $this->erreurs[$key] = $erreur;
    }

    public function isValid(): bool
    {
        return empty($this->erreurs);
    }

    //Regles de Validation 
     public function isEmpty(string $data,string $key,string $erreur):bool{
       if (empty($data)) {
        $this->addErreur($key, $erreur);
        return true;
       }
       return false;
     }

     public function isEmail(string $data,string $key,string $erreur):bool{
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
           $this->addErreur($key, $erreur);
           return false;
        }
        return true;
      }

      public function isNumber(int|float $data,string $key,string $erreur,int $min=10000,int $max=1000000):bool{
        if (!filter_var($data, FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max] ])) {
            $this->addErreur($key, $erreur);
           return false;
        }
        return true;
      }

      

}
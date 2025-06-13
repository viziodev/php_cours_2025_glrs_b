<?php 
class Utilisateur{
    private int $id;
    private string $nomComplet;
    private string $role;
    private string $login;
    private string $password;

  
    /**
     * Get the value of nomComplet
     */
    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    /**
     * Set the value of nomComplet
     */
    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of login
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public static function toUser($row):Utilisateur{
        $user=new Utilisateur();
        $user->setId($row['id']);
        $user->setNomComplet($row['nomComplet']);
        $user->setLogin($row['login']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
 
     }

     public  function toArray():array{
        return [
           "id"=>$this->id,
           "nomComplet"=>$this->nomComplet,
           "login"=>$this->login,
           "password"=>$this->password,
           "role"=>$this->role,
        ];
 
     }
}
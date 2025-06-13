<?php   
 $erreurs=[];
if(isset($_SESSION['erreurs'])){
    $erreurs=$_SESSION['erreurs'];
    unset($_SESSION['erreurs']);
}
?>

<div class="container d-flex justify-content-center align-items-center w-50" style="height: 93vh;">
<div class="card p-4 shadow-sm login  ">
    <div class="text-center mb-1">
      <div class="logo mb-1">
        <i class="bi bi-bank fs-1 text-primary"></i>
      </div>
      <h2 class="fw-bold">BankManager</h2>
      <p class="text-muted">Système de Gestion de Comptes</p>
    </div>
    <h4 class="text-center mb-1">Connexion</h4>
    <div>
          <small id="helpId" class="form-text text-danger"><?php echo $erreurs['connexion']??''?></small>
    </div>
    
    <form action="index.php" method="POST">
     <input type="hidden" name="action" value="login">
     <input type="hidden" name="controller" value="security"/>
      <div class="mb-3">
        <label for="identifiant" class="form-label">Identifiant</label>
        <input type="text" name="login" class="form-control" id="identifiant" placeholder="Entrez votre identifiant">
        <small id="helpId" class="form-text text-danger"><?php echo $erreurs['login']??''?></small>
      </div>
      <div class="mb-3">
        <label for="motdepasse" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe">
        <small id="helpId" class="form-text text-danger"><?php echo $erreurs['password']??''?></small>
      </div>
      <div class="mb-3 text-end">
        <a href="#" class="small text-primary">Mot de passe oublié ?</a>
      </div>
      <button type="submit" class="btn btn-dark w-100">Se connecter</button>
    </form>
  </div>

  </div>
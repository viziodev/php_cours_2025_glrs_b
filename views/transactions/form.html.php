<main>


<div class="container my-4">
<style>
    .text-green {
      color: green;
    }
    .badge-orange {
      background-color: orange;
      color: white;
    }
    .note {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .form-section {
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
  </style>

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nouvelle transaction</h2>
    <a href="index.php?controller=transaction&action=list&id=<?php echo $compte->getId()?>" class="btn btn-secondary">← Retour au compte</a>
  </div>

  <div class="row g-4">
    <!-- Informations du compte -->
        <?php require_once("../views/transactions/partial/infos.compte.html.php");?>
      <!-- Règles de transaction -->
     
    <!-- Formulaire transaction -->
         <div class="col-md-8 " >
           <div class="form-section" style="height: 350px;">
        <h5>Détails de la transaction</h5>

        <form action="index.php" method="POST">
         <input type="hidden" name="action" value="create">
         <input type="hidden" name="controller" value="transaction"/>
         <input type="hidden" name="id" value="<?php echo $compte->getId()?>"/>
          <div class="mb-3">
            <label for="typeTransaction" class="form-label">Type de transaction</label>
            <select class="form-select" name="type" id="typeTransaction" required>
              <option selected disabled>Sélectionner un type</option>
              <option value="DEPOT">Dépôt</option>
              <option value="RETRAIT">Retrait</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="montant" class="form-label">Montant (FCFA)</label>
            <input name="montant" type="number" class="form-control" id="montant" placeholder="Entrez le montant" min="1000" required>
            <div class="form-text">Montant minimum : 1 000 FCFA</div>
          </div>

          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Effectuer la transaction</button>
            <button type="reset" class="btn btn-light">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</main>
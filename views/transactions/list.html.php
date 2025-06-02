<main>
<style>
    .card-title small {
      font-size: 0.8rem;
    }
    .btn-supprimer {
      background-color: #dc3545;
      color: white;
    }
    .btn-modifier {
      background-color: #ffc107;
      color: black;
    }
    .text-green {
      color: green;
    }
    .text-red {
      color: red;
    }
    .badge-orange {
      background-color: orange;
      color: white;
    }
  </style>

<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Détails du compte</h2>
    <div>
      <a href="index.php?controller=transaction&action=form&id=<?php echo $compte->getId()?>" class="btn btn-dark">+ Nouvelle transaction</a>
    </div>
  </div>

<div class="row mb-2">
  <div class="col">
        <div class="card mt-3" >
          <div class="card-body">
          <h5 class="card-title">Statistiques</h5>
            <div class="row gap-2">
             <div class="col-md-5"><strong>Total des dépôts:</strong> <span class="text-green"> <?php  echo $statistiques['totalDepot'];?> FCFA</span></div>
             <div class="col-md-5"><strong>Total des retraits:</strong> <span class="text-red"><?php  echo $statistiques['totalRetrait'];?> FCFA</span></div>
            </div> 
            <div class="row gap-2">
              <div class="col-md-5"><strong>Nombre de transactions:</strong> <?php  echo $statistiques['nbreTransaction'];?> </div>
              <div class="col-md-5"><strong>Dernière transaction:</strong> <?php  echo $statistiques['lastDate'];?> </div>
            </div>
          </div>
        </div>
  </div>
</div>
  <div class="row g-3" >
    <!-- Informations du compte -->
    <?php require_once("../views/transactions/partial/infos.compte.html.php");?>
    <!-- Historique des transactions -->
    <div class="col-md-8 " >
      <div class="card" style="height: 350px;">
        <div class="card-body">
          <h5 class="card-title">Historique des transactions</h5>
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Solde après</th>
              
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transactions as  $transaction):?>
              <tr>
                 <td><?php echo $transaction->getId() ?></td>
                 <td><?php echo $transaction->getDateToString() ?></td>
                 <td><span class="badge <?php echo $transaction->bgStyleType ?>"><?php echo $transaction->getType() ?></span></td>
                 <td class="<?php echo $transaction->textStyleMontant ?>">
                   <?php echo $transaction->sensTransaction ?>
                   <?php echo $transaction->getMontant() ?>FCFA
                </td>
                 <td><?php echo $transaction->getSoldeApres() ?> FCFA</td>

              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <nav >
            <ul class="pagination d-flex justify-content-center">
              <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- Statistiques -->
 
  </div>
</div>
</main>
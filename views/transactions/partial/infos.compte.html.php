
    <!-- Informations du compte -->
    <div class="col-md-4 " >
      <div class="card" style="height: 350px;">
        <div class="card-body">
          <h5 class="card-title">Informations du compte</h5>
          <p><strong>N° Compte:</strong> <a href="#"><?php  echo $compte->getNumero();?></a></p>
          <p><strong>Titulaire:</strong> <?php  echo $compte->getTitulaire();?></p>
          <p><strong>Type:</strong> <span class="badge bg-success">Épargne</span></p>
          <p><strong>Solde actuel:</strong> <span class="text-green"><?php  echo $compte->getSolde();?> FCFA</span></p>
          <p><strong>Date de création:</strong> <?php  echo $compte->getDateCreationToString();?></p>
          <p><strong>Statut:</strong> <span class="badge badge-orange">Bloqué 🔒</span></p>
          <p><strong>Date de déblocage:</strong> 15/04/2023</p>
        </div>
     </div>
   </div>
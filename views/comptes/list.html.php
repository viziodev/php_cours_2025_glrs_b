
        <main  class="p-5 bg-light">
            <div class="container ">
                <h3>Liste des Compte</h3>
                <div class="card">
                    <div class="card-header">
                        <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="index.php?page=form"
                        role="button"
                        >Nouveau </a >
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>ID</th>
                                    <th>Numero</th>
                                    <th>Date Creation</th>
                                    <th>Solde</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($comptes as $compte):?>
                                    <tr>
                                        <td scope="row"><?=$compte->getId()?></td>
                                        <td><?=$compte->getNumero()?></td>
                                        <td></td>
                                        <td><?=$compte->getSolde()?></td>
                                    </tr>
                                <?php endforeach?>    
                                </tbody>
                        </table>
                    </div>
                    
                </div>
                
                

            </div>
        </main>
        
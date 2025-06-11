
        <main  class="p-1 bg-light">
            <div class="container ">
                <div class="d-flex justify-content-between my-1">
                <h3>Liste des Compte</h3>
             <?php
               if ($_SESSION['user']['role']=="ADMIN"): ?>
                    <div class="">
                       <a
                        name=""
                        id=""
                        class="btn btn-outline-dark"
                        href="index.php?controller=compte&action=form"
                        role="button"
                        > <i class="fas fa-plus"></i>Nouveau </a >
                    </div>
               <?php endif ?>
                </div>
                   <div class="shadow p-2 mb-1 bg-body rounded my-1">
                       <form class="d-flex" method="post">
                         <input type="hidden" name="action" value="list"/>
                         <input type="hidden" name="controller" value="compte"/>
                         <div class="row">
                            <div class=" d-flex gap-4">
                                <label for="" class="form-label  ">Numero</label>
                                <input
                                    type="text"
                                    name="numero"
                                    id=""
                                    class="form-control  col-6"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                                <div class="col ">
                                    <button type="submit" class="btn btn-dark" >Search</button>
                                </div>
                                 
                            </div>
                               
                            </div>
                       </form>
                       

                   </div>
                
                    <div class="shadow p-3 mb-5 bg-body rounded">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                             
                                    <th>Numero</th>
                                    <th>Titulaire</th>
                                    <th>Date Creation</th>
                                    <th>Solde</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($comptes as $compte):?>
                                    <tr>
                                        
                                        <td><?=$compte->getNumero()?></td>
                                        <td><?=$compte->getTitulaire()?></td>
                                        <td><?=$compte->getDateCreationToString()?></td>
                                        <td><?=$compte->getSolde()?></td>
                                        <th>
                                            <a
                                            name=""
                                            id=""
                                            class="btn btn-outline-dark btn-sm"
                                            href="index.php?controller=transaction&action=list&id=<?=$compte->getId()?>"
                                            role="button"
                                            > <i class="fas fa-eye"></i>Transactions </a >
                                          </th>
                                    </tr>
                                <?php endforeach?>    
                                </tbody>
                        </table>
                        <nav aria-label="Page navigation example ">
                          <ul class="pagination pagination-sm d-flex justify-content-center">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">Precedent</span>
                              </a>
                            </li>
                          <?php for ($page=1; $page <=$nbrePage ; $page++):?> 
                               <li class="page-item"><a class="page-link  <?=$currentPage==$page?'active':''?>  " href="index.php?action=list&page=<?=$page?>"><?php echo $page;?></a></li>
                          <?php endfor ?>
                            
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">Suivant</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                    
                </div>
        </main>
        
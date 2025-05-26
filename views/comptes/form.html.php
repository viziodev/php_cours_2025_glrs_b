 <main  class="p-5 bg-light">
            <div class="container ">
                <h3>Nouveau Compte</h3>
               
                    <div class="shadow p-3 mb-5 bg-body rounded">
                       <form action="index.php" method="post">
                          <input type="hidden" name="action" value="create">
                          <input type="hidden" name="controller" value="compte"/>
                          <div class="mb-3">
                            <label for="" class="form-label">Solde</label>
                              <input
                                type="number"
                                class="form-control"
                                name="solde"
                                id=""
                                aria-describedby="helpId"
                                placeholder=""
                             />
                            <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Creer
                            </button>
                            
                       </form>
                    </div>
                    
                </div>
                
                

    
        </main>
       
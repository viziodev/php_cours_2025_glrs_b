 <main  class="p-5 bg-light" style="height:90vh">
            <div class="container d-flex justify-content-center align-items-center">
                    <div class="shadow  p-3 mb-5 bg-body rounded w-50">
                         <h3>Nouveau Compte</h3>
                       <form action="index.php" method="post">
                          <input type="hidden" name="action" value="create">
                          <input type="hidden" name="controller" value="compte"/>
                          <div class="mb-3">
                            <label for="" class="form-label">Titulaire</label>
                              <input
                                type="text"
                                class="form-control"
                                name="titulaire"
                                id=""
                                aria-describedby="helpId"
                                placeholder=""
                             />
                            <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

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
                        <div class="d-flex justify-content-end">

                                    <button
                                                    type="submit"
                                                    class="btn btn-dark"
                                                >
                                                    Creer
                                                </button>
                        </div>
                           
                            
                       </form>
                    </div>
                    
                </div>
                
                

    
        </main>
       
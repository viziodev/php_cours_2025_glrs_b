<?php   
 $erreurs=[];
 $data=[];
if(isset($_SESSION['erreurs'])){
    $erreurs=$_SESSION['erreurs'];
    $data=$_SESSION['data'];
    unset($_SESSION['erreurs']);
    unset($_SESSION['data']);
   
}
?>
 
 <main  class="p-5 bg-light" style="height:90vh">
            <div class="container d-flex justify-content-center align-items-center">
                    <div class="shadow  p-3 mb-5 bg-body rounded w-50">
                         <h3>Nouveau Compte</h3>
                       <form action="index.php" method="post">
                          <input type="hidden" name="action" value="create">
                          <input type="hidden" name="controller" value="compte"/>
                            
                            <div class="mb-3">
                              <label for="" class="form-label">Titulaire</label>
                              <select
                                class="form-select form-select-md"
                                name="titulaire"
                                id=""
                              >
                                <option value="0" selected>Selectionner un client</option>
                                <?php foreach ($clients as $client) :?>
                                    <option <?php  echo  isset($data['titulaire']) && $client->getId()== $data['titulaire']?'selected':'' ?>  value="<?php echo $client->getId(); ?>"><?php echo $client->getNomComplet(); ?></option>
                                 <?php endforeach?>
                              </select>
                              <small id="helpId" class="form-text text-danger"><?php echo $erreurs['titulaire']??''?></small>
                            </div>
                            

                           <div class="mb-3">
                            <label for="" class="form-label">Solde</label>
                              <input
                                type="number"
                                class="form-control"
                                name="solde"
                                id=""
                                value="<?php echo $data['solde']??'' ?>"
                                aria-describedby="helpId"
                                placeholder=""
                             />
                            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['solde']??''?></small>
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
       
<?php
    include_once 'navbar.php';
?>
    <!-- Start FORM modify Section --->
    <div class="container mt-5">
    <div class="row justify-content-center" >
                    <a href="index.php">
                        <span class="btn btn-info mt-1">
                        <i class="fa fa-angle-left"></i> Retour</span>
                    </a>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                        <h3 class="text-center my-2"><i class="fa fa-edit"></i> Modifier Une Chambre</h3>
            <div class="card-body"> 
                <form class="form-horizontal" action="" method="POST">
                    <table class="table table-hover mt-4 text-center">
                        <tr class="text-center">
                            <th>
                                <label >Code De Chambre :</label>
                            </th>
                            <th>
                                <input type="number" name="code" class="form-control" autocomplete="off" placeholder="Entrer Le Code De Chambre" required="required" />
                            </th>
                        </tr>
                        <tr class="text-center">
                            <th>
                                <label >Nombre De Lit :</label>
                            </th>
                            <th>
                                <input type="number" name="nbrlit" class="form-control" autocomplete="off" placeholder="Entrer Le Nombre De Lit" required="required" />
                            </th>
                        </tr>
                        <tr  class="text-center">
                            <th>
                                <label > Prix :</label>
                            </th>
                            <th>
                                <input type="text" name="prix" class="form-control" autocomplete="off" placeholder="Entrer Le Prix En Dirham" required="required" />
                            </th>
                        </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                    <div class="float-left">
                        <button class="btn btn-success mt-2" type="submit">
                            <i class="fa fa-save"></i> Enregistrer</span>
                        </button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-info mt-2" type="reset">
                            <i class="fa fa-exclamation-circle"></i> Rénitialiser</span>
                        </button>
                    
                </form>
            </div>
        </div>
    </div>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 


    // Start post form Section 




            $nbr_lit = $_POST['nbrlit'] ;
            $prix = $_POST['prix'];      
            $code = $_POST['code'];          

             // check if this chambre is set or not
            $stmt =  $con->prepare("SELECT code_ch FROM chambre WHERE code_ch = ? LIMIT 1 ") ;
            $stmt->execute(array($code));
            $count = count($stmt->fetchAll());

            if ($count == 1 ) {
                $stmt =  $con->prepare("UPDATE chambre SET code_ch = ? , nombre_lit = ? , prix = ? WHERE code_ch = ? ") ;
                
                $stmt->execute(array($code,$nbr_lit ,$prix, $code));

                //echo success message 
                $themsg = '<div class="alert alert-success mt-4">' . $stmt->rowCount() . ' Record Updated </div>';

                echo $themsg;
                $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
            } else {
                //echo danger message 
                $themsg = '<div class="alert alert-danger mt-4">Cette Chambre n\'existe pas</div>';

                echo $themsg;
                $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
        
                header("refresh:1;url=$url");
            }
            header("refresh:1;url=$url");
        }
    

?>
</body>
</html>
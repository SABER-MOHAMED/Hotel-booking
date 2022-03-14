<?php
    include_once 'navbar.php';
?>
    <!-- Start FORM modify Section --->
    <div class="container mt-5">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                        <h3 class="text-center my-2">Modifier La Chambre Numéro <a class="link-primary"  href="index.php" ><?= $_GET['id'] ?></a></h3>
            <div class="card-body"> 
                <form class="form-horizontal" action="" method="POST">
                    <table class="table table-hover mt-4 text-center">
                    <tr class="text-center">
                        <th>
                            <label >Nombre De Lit :</label>
                        </th>
                        <th>
                            <input type="number" name="nbrlit" class="form-control" autocomplete="off" placeholder="Entrer Le Nombre De Lit" required="required" />
                            <input value="1" type="hidden" name="id" />
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
            $id = $_POST['id'];          

            $stmt =  $con->prepare("UPDATE chambre SET nombre_lit = ? , prix = ? WHERE code_ch = ? ") ;
            
            $stmt->execute(array($nbr_lit ,$prix, $id));

            //echo success message 
            $themsg = '<div class="alert alert-success mt-4">' . $stmt->rowCount() . ' Record Updated </div>';

            echo $themsg;
            $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
    
            header("refresh:1;url=$url");
        }
    

?>
</body>
</html>
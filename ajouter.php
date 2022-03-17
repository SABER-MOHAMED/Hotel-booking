<?php
    include 'navbar.php';
?>

    <!-- End Navbar Section --->

    <!-- Start body Section --->
    <div class="container mt-5">
    <div class="row justify-content-center" >
        <div class="col-md-8"><a href="index.php">
                            <span class="btn btn-info mt-1">
                            <i class="fa fa-angle-left"></i> Retour</span>
                        </a>
            <div class="card mt-2">
                <div class="card-header">
                        <h3 class="text-center my-2"><i class="fa fa-plus mt-2"></i> Ajouter Une Chambre</h3>
            <div class="card-body"> 
                <form class="form-horizontal"  method="post">
                    <table class="table table-hover mt-4 text-center">
                        <tr class="text-center">
                            <th>
                                <label >Code de Chambre:</label>
                            </th>
                            <th>
                                <input type="number" name="code" class="form-control" autocomplete="off" required="required" />
                            </th>
                        </tr>
                        <tr class="text-center">
                            <th>
                                <label >Nombre De Lit :</label>
                            </th>
                            <th>
                                <input type="number" name="nbrlit" class="form-control" autocomplete="off" required="required" />
                            </th>
                        </tr>
                        <tr  class="text-center">
                            <th>
                                <label > Prix :</label>
                            </th>
                            <th>
                                <input type="number" name="prix" class="form-control" autocomplete="off" required="required" />
                            </th>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
    <div class="float-left">
                        <button class="btn btn-success mt-2" type="submit">
                            <i class="fa fa-plus"></i> Ajouter</span>
                        </button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-info mt-2" type="reset">
                            <i class="fa fa-exclamation-circle"></i> Rénitialiser</span>
                        </button>
                    </div>
                </form>
    </div>
</div>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 


    // Start post form Section 



            $code = $_POST['code'];
            $nbr_lit = $_POST['nbrlit'] ;
            $prix = $_POST['prix'];      

            // check if this code is unique or not
            $stmt =  $con->prepare("SELECT code_ch FROM chambre WHERE code_ch = ? ") ;
            $stmt->execute(array($code));
            $count = count($stmt->fetchAll());

            if ($count == 0 ) {

                $stmt =  $con->prepare("INSERT INTO chambre (code_ch , nombre_lit , prix) VALUES (? , ? , ? ) ") ;
                
                $stmt->execute(array($code ,$nbr_lit ,$prix));

                //echo success message 
                $themsg = '<div class="alert alert-success mt-4">' . $stmt->rowCount() . ' Record Inserted </div>';

                echo $themsg;
                $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
        
                header("refresh:1;url=$url");
            } else {
                //echo danger message 
                $themsg = '<div class="alert alert-danger mt-4">This Code is Already Used </div>';

                echo $themsg;
                $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
        
                header("refresh:1;url=$url");
            }
        }
    

?>
</body>
</html>
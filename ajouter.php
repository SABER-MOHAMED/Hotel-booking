<?php
    include 'navbar.php';
?>

    <!-- End Navbar Section --->

    <!-- Start body Section --->
    <div class="container mt-5">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                        <h3 class="text-center my-2">Add Chambre</h3>
            <div class="card-body"> 
                <form class="form-horizontal"  method="post">
                    <table class="table table-hover mt-4 text-center">
                    <tr class="text-center">
                        <th>
                            <label >Nombre De Lit :</label>
                        </th>
                        <th>
                            <input type="text" name="nbrlit" class="form-control" autocomplete="off" required="required" />
                        </th>
                    </tr>
                    <tr  class="text-center">
                        <th>
                            <label > Prix :</label>
                        </th>
                        <th>
                            <input type="text" name="prix" class="form-control" autocomplete="off" required="required" />
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




            $nbr_lit = $_POST['nbrlit'] ;
            $prix = $_POST['prix'];      

            $stmt =  $con->prepare("INSERT INTO chambre ( nombre_lit , prix) VALUES ( ? , ? ) ") ;
            
            $stmt->execute(array($nbr_lit ,$prix));

            //echo success message 
            $themsg = '<div class="alert alert-success mt-4">' . $stmt->rowCount() . ' Record Inserted </div>';

            echo $themsg;
            $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
    
            header("refresh:1;url=$url");
        }
    

?>
</body>
</html>
<?php
    include_once 'navbar.php';
    include_once 'connect.php';
                                /*===========================================
                                * ====== SELECT ALL ROOMS FROM DATABASE ====
                                =============================================*/
    $limit = 4;
    $stmt =  $con->prepare("SELECT * FROM chambre LIMIT $limit") ;
    $stmt->execute();
    $data = $stmt->fetchAll();

?>
    <!-- Start dashboard Section --->

    <div class="container mt-5">
    <div class="row justify-content-center" >
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Dashboard
                        <h5 class="float-right">Good Evening
                            <a class="link-primary"  href="#">
                                Amine 
                            </a>
                        </h5>
                </div>

                <div class="card-body">
                    <div class="mt-4 text-center"><h3>La Gestion Des Chambres</h3></div>
                    <div class="row  mt-4 my-5 ">
                        <div class=" ml-4"><a href="ajouter.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter Une Chambre</a></div>
                        <div class=" ml-4"><a href="afficher.php" class="btn btn-info "><i class="fa fa-trash"></i> Supprimer Une Chambre</a></div>
                        <div class=" ml-4"><a href="modifier.php" class="btn btn-warning "><i class="fa fa-edit"></i> Modifier Une Chambre</a></div>
                    </div>
                </div>

    </div>
</div>
<!-- End Dashboard section --->

</body>
</html>
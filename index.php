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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                        <h5 class="float-right">Good Evening
                            <a class="link-primary"  href="#">
                                Amine 
                            </a>
                        </h5>
                </div>

                <div class="card-body">
                    <!---<div class="mt-4 text-center"><h3>La Gestion Des Chambres</h3></div>
                    <div class="row ml-4 mt-4">
                        <div class="col-md-3 ml-4"><a href="/posts/create" class="btn btn-success">Ajouter Une Chambre</a></div>
                        <div class="col-md-3 ml-4"><a href="#" class="btn btn-warning ">Modifier Une Chambre</a></div>
                        <div class="col-md-3 ml-4"><a href="supprimer.php" class="btn btn-info ">Supprimer Une Chambre</a></div>
                    </div>
                </div>--->
                <div class="">
                    <h3 class=""><?= $limit ?> dernières chambres Ajoutés</h3>
                </div>
                    <table class="table table-striped mt-4 text-center">
                        <tr class="text-center">
                            <th>Code De Chambre</th>
                            <th>Nombre De Lit</th>
                            <th>Prix</th>
                            <th>Gérer</th>
                        </tr>
                <?php
                    foreach($data as $room) {
                ?>
                        <tr>
                            <th><?= $room['code_ch'] ?></th>
                            <td><?= $room['nombre_lit'] ?></td>
                            <td><?= $room['prix'] ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="modifier.php?id=<?= $room['code_ch'] ?>" >
                                    <span class="btn btn-success">
                                    <i class="fa fa-edit"></i>Edit </span>
                                </a>
                                <a href="supprimer.php?id=<?= $room['code_ch'] ?>">
                                    <span class="btn btn-danger ml-2">
                                    <i class="fa fa-trash"></i> Delete</span>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
                    </table>
                    </div>
                </div>
                        <a href="ajouter.php">
                            <span class="btn btn-info mt-2">
                            <i class="fa fa-plus"></i> Ajouter Une Chambre</span>
                        </a> 
                        <a href="afficher.php">
                            <span class="btn btn-warning mt-2 float-right">
                            <i class="fa fa-list"></i> Afficher Tous</span>
                        </a>
    </div>
</div>
<!-- End Dashboard section --->

</body>
</html>
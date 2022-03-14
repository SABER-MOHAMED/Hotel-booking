<?php
    include_once 'navbar.php';
    include_once 'connect.php';
                                /*===========================================
                                * ====== SELECT ALL ROOMS FROM DATABASE ====
                                =============================================*/

    $stmt =  $con->prepare("SELECT * FROM chambre") ;
    $stmt->execute();
    $data = $stmt->fetchAll();

?>
<div class="container mt-5">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="index.php">
                            <span class="btn btn-info mt-1">
                            <i class="fa fa-angle-left"></i> Retour</span>
                        </a>
                        <h5 class="text-center">Tous Les Chambres  Ajoutés</h5>
                </div>
    <!-- Start dashboard Section --->
                    <table class="table table-hover mt-4 text-center">
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
                            <span class="btn btn-info mt-2 float-right">
                            <i class="fa fa-plus"></i> Ajouter</span>
                        </a>
    </div>
</div>
<!-- End Dashboard section --->

</body>
</html>
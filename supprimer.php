<?php
    include 'connect.php';   // fichier responsable sur la connexion avec la base de donnée
    include 'navbar.php';

    $id = isset($_GET["id"]) ? $_GET["id"] : 0 ;
                                                                            // check if there is a room with that id
            $stmt =  $con->prepare("SELECT * FROM chambre WHERE code_ch = ? ") ;
            $stmt->execute(array($id));
            $count = $stmt->rowCount();
            
        if ($count != 0 ) {
                                                                            // DELETE ROOM FROM DB
            $stmt =  $con->prepare("DELETE FROM chambre WHERE code_ch = ? ") ;
            $stmt->execute(array($id));
?>
    <div class="container mt-5 ">
        <div class="alert alert-success text-center">
            <h3>Les informations de cette Chambre a été Supprimer </h3>
        </div>
        <div class="alert alert-success text-center">
            <h5 >vous serez redirigé vers la page d'accueil dans 3 secondes</h5>
        </div>
    </div>

<?php
            } 
            else {  
?>
                <div class="container mt-5 ">
                    <div class="alert alert-success text-center">
                        <h3>Il n'y a pas de Chambre avec cet identifiant</h3>
                    </div>
                    <div class="alert alert-success text-center">
                        <h5 >vous serez redirigé vers la page d'accueil dans 3 secondes</h5>
                    </div>
                </div>
<?php
                }

    $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : $url = 'index.php';      
    
    header("refresh:3;url=$url");
?>
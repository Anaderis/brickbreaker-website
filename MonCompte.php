<?php

session_start();

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
}
require_once "auth-home.php";


ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["delete_game"])) {

    echo var_dump($_SESSION);
    $_SESSION['delete_game'] = isset($_POST['delete_game']) ? $_POST['delete_game'] : "";
    
    }


/*---- Fonction pour supprimer un joueur -----*/
// function deleteUser (){

// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/photodeprofil/compte.png" />
    <link rel="stylesheet" href="./css/style-account.css">
    <title>Mon Compte</title>

    <!-- Police -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Reddit+Mono:wght@200..900&display=swap" rel="stylesheet">



</head>

<!-- ---------------------------Connexion ADMIN----------------------------------------  -->

<?php if ($_SESSION['type'] == "admin") {?>

<body>

    <main>
                    
                        <?php 
                        if(isset($_SESSION['Loggedin'])){
                            echo '<a href="./PHP/Login/logout.php"><button type="button" class="button">Logout</button></a>';
                        } else {
                            echo '<a href="./login.php"><button class="button" type="button">Login</button></a>';
                        }
                        ?>
                        <div class=conteneur>
                            <div class = logo_conteneur>
                                <a href="./home.php">
                                    <img class="logo" src="./Assets/icon-Login.png">
                                </a>    
                            </div>
                
                    <div class = logo_conteneur>
                        <img class="photo" alt="user" src="<?php echo './Uploads_photos/'. $_SESSION['Photo'] ?>"  />
                        
                        <h1>
                            <?php
                                    echo 'Bienvenue '. $_SESSION['User'];
                                ?>
                        </h1>
                        
                    </div>
                    <form action="MonCompte.php" method="post">
                        <input type="submit" value="Users" name="all_users" class="button">
                        <input type="submit" value="Games" name="all_games" class="button">
                    </form>
                </div>
    
                </main> 
    
    <?php

     /* ------------------------------     Gérer les joueurs  ------------------------------------------ */
     
     

    if (isset ($_POST["all_users"])) {

        echo '<h2 class="title">All the users</h2>';


        $i = 0;

        $sqlQuery = 'SELECT * FROM t_user';
        $sth = $dbco->query($sqlQuery);
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth->execute();

        //On affiche les infos de la table
        $keys = array_keys($resultat);
        

        foreach ($resultat as $keys => $resultats) {

            // $_SESSION['resultats'] = $resultats;
            
            echo $keys;
            
            $i++;
            ?>
           
                
           <div class="article">
                        <div>
                            <h3>
                                <?php echo $resultats['user_name'] ?>
                            </h3>
                        </div>

                            
                        <div class="ligne">

                                <div>

                                    <img src="./Assets/star.png" class="picto">

                                        <?php 
                                            echo $resultats['user_type'];
                                        ?>

                                </div>


                                <div>
                                    <?php echo $resultats['user_email'] ?>
                                </div>

                        

                            <div>
                                <?php if($resultats['game_photo']){?>
                                    <a href= "<?php echo './Uploads_photos/' . $resultats['game_photo'] ?>" download = "<?php echo $resultats['game_photo']?>">Download profile pic </a>
                                <?php }?>
                            </div>

                            <div>
                                <form action="./PHP/MonCompte/supp_user.php" method="post">
                                    <input type="submit" value="Delete user" name="delete_player" class="button"> 
                                    <input type="delete" value="<?php echo $resultats['user_ID']?>" name="delete_id" style="display : none">                           
                                </form>
                            </div>

                            <div>
                                <form action="./PHP/MonCompte/modify_user.php" method="post" class="read" method="post" enctype="multipart/form-data">
                                    <input type="submit" value="Modify user" name="modify_player" class="button"> 
                                    <input type="modify" value="<?php echo $resultats['user_ID']?>" name="modify_id" style="display : none">                           
                                </form>
                            </div>


                        <div>
                            <img class="photoMount" alt="user" src="<?php echo './Uploads_photos/'. $resultats['game_photo'] ?>"  />
                        </div>               
                </div>
            </div> 
           

            <?php
        }

        echo "<p class=count> Résultats : $i</p>";
    }
    ?>



<?php 

    /*------------------------------     Gérer les JEUX  ------------------------------------------*/


    
    if (isset ($_POST["all_games"])) {

        echo "<h2>All the games</h2>";

        $i = 0;

        $sqlQuery = 'SELECT * FROM t_user WHERE user_type = "creator" ';
        $sth = $dbco->query($sqlQuery);
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth->execute();

        //On affiche les infos de la table
        $keys = array_keys($resultat);


        foreach ($resultat as $resultats) {
            $i++;
            ?>

            <div class="article">
            <div>
                                    <h3>
                                        <?php echo $resultats['game_name'] ?>
                                    </h3>
            </div>
                <div class="ligne">
                                


                                <div>

                                    <img src="./Assets/star.png" class="picto">

                                        <?php 
                                            echo $resultats['user_name'];
                                        ?>

                                </div>


                                <div>
                                        <?php echo $resultats['user_type'] ?>
                                </div>


                                    


                                <div>

                                    <form action="./PHP/MonCompte/modify_game.php" method="post" class="read" enctype="multipart/form-data">
                                            <input type="submit" value="Modify game" name="modify_game" class="button"> 
                                            <input type="modify" value="<?php echo $resultats['user_ID']?>" name="modify_id" style="display : none">                           
                                    </form>
                                </div>

                                
                                <div>
                                    
                                    <form action="./MonCompte.php" method="post">
                                            <input type="delete" value=<?php echo './Uploads/' . $resultats['user_game']?> name="delete_game" style="display : none">
                                            <input type="submit" value="Delete file" class="button"> 
                                            
                                            <?php 
                                            
                                            if( isset($_SESSION["delete_game"])){
                                                if ($_SESSION["delete_game"] !== '') {
                                                    unlink('./Uploads/' . $resultats['user_game']);
                                                    $_SESSION["last_delete_game"] = $_SESSION["delete_game"];
                                                    $_SESSION["delete_game"] = '';
                                                }
                                            }
                                        
                                            
                                            ?>
                                    </form>
                                </div>

                                <div>
                                        <?php if($resultats['game_photo']){?>
                                            <a href= "<?php echo './Uploads/' . $resultats['user_game'] ?>" download = "<?php echo $resultats['user_game']?>">Download game </a>
                                                    <?php }?>
                                </div>
                                <div >
                                    <img  class="photoMount" alt="user" src="<?php echo './Uploads_photos/'. $resultats['game_photo'] ?>"  />
                                </div> 
            </div>                                    
        </div>                               
<?php

}

        echo "<p class=count> Résultats : $i</p>";
    }
?>





    
            </div>
        </div>
    

    </body>
<?php } else {
    echo "A venir, un avenir";
}?>

</html>
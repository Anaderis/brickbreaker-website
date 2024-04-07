<?php

session_start();

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
}
require_once "auth-home.php";


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
    <link rel="stylesheet" href="./css/style-equipment.css">
    <title>Mon Compte</title>

    <!-- Footer -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />



</head>

<!-- ---------------------------Connexion ADMIN----------------------------------------  -->

<?php if ($_SESSION['type'] = "admin") {?>

<body>
    <header>
        <nav>
            <a href="./wow-armory.php">
                <img class="logoWOW" src="./Assets/logo.png" alt="logoWOW">
            </a>
        </nav>
    </header>


    <main>
        <div>
            <div>
                <div>
                    <div>
                        <img class="photo" alt="user" src="<?php echo './Uploads_photos/'. $_SESSION['Photo'] ?>"  />
                        <h1>
                            <?php
                                    echo 'bonjour '. $_SESSION['User'];
                                ?>
                        </h1>
                    </div>
                    <form action="MonCompte.php" method="post">
                        <input type="submit" value="Users" name="all_users">
                        <input type="submit" value="Games" name="all_games">
                    </form>
                </div>
    
    <?php

     /* ------------------------------     Gérer les joueurs  ------------------------------------------ */
     
     

    if (isset ($_POST["all_users"])) {

        echo "<h2>All the users</h2>";


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
           <div class="actu">
                <article class="article">
                    <div class="articleMount">
                        <div class="textMount">
                            <h3>
                                <?php echo $resultats['user_name'] ?>
                            </h3>

                            <div class="criteriaMount">


                                <div class="difficulty">

                                    <img src="./Assets//starr.png" class="picto">

                                        <?php 
                                            echo $resultats['user_type'];
                                        ?>

                                </div>


                                <div class="mountDetail">
                                    <?php echo $resultats['user_email'] ?>
                                </div>
                                <div class="mountDetail">
                                    <?php echo $resultats['game_name'] ?>
                                </div>

                            </div>
                            <?php if($resultats['game_photo']){?>
                            <a href= "<?php echo './Uploads_photos/' . $resultats['game_photo'] ?>" download = "<?php echo $resultats['game_photo']?>">Download profile pic </a>
                            <?php }?>

                            <form action="./PHP/MonCompte/supp_user.php" method="post">
                             <input type="submit" value="Delete user" name="delete_player"> 
                             <input type="delete" value="<?php echo $resultats['user_ID']?>" name="delete_id" style="display : none">                           
                            </form>

                            <form action="./PHP/MonCompte/modify_user.php" method="post" class="read" method="post" enctype="multipart/form-data">
                             <input type="submit" value="Modify user" name="modify_player"> 
                             <input type="modify" value="<?php echo $resultats['user_ID']?>" name="modify_id" style="display : none">                           
                            </form>


                        </div>
                        <img class="photoMount" alt="user" src="<?php echo './Uploads_photos/'. $resultats['game_photo'] ?>"  />

                    </div>
                </article>
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
       <div class="actu">
                <article class="article">
                    <div class="articleMount">
                        <div class="textMount">
                            <h3>
                                <?php echo $resultats['game_name'] ?>
                            </h3>

                            <div class="criteriaMount">


                                <div class="difficulty">

                                    <img src="./Assets//starr.png" class="picto">

                                        <?php 
                                            echo $resultats['user_name'];
                                        ?>

                                </div>


                                <!-- <div class="mountDetail">
                                    <?php echo $resultats['user_email'] ?>
                                </div> -->
                                <div class="mountDetail">
                                    <?php echo $resultats['game_name'] ?>
                                </div>

                            </div>
                            <?php if($resultats['user_game']){?>
                            <a href= "<?php echo './Uploads/' . $resultats['user_game'] ?>" download = "<?php echo $resultats['user_game']?>">Download game file </a>
                            <?php }?>

                            <form action="./MonCompte.php" method="post">
                             <input type="submit" value="Delete game" name="delete_game"> 
                                <?php unlink('./Uploads/' . $resultats['user_game']); ?>
                            </form>

                            <form action="./PHP/MonCompte/modify_game.php" method="post" class="read" enctype="multipart/form-data">
                             <input type="submit" value="Modify game" name="modify_game"> 
                             <input type="modify" value="<?php echo $resultats['user_ID']?>" name="modify_id" style="display : none">                           
                            </form>


                        </div>
                        <img class="photoMount" alt="user" src="<?php echo './Uploads_photos/'. $resultats['game_photo'] ?>"  />

                    </div>
                </article>
            </div>

        <?php
    }

    echo "<p class=count> Résultats : $i</p>";
}
?>





    
            </div>
        </div>
    </main>
</body>

<?php }?>

</html>
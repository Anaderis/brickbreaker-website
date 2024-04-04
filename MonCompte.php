<?php

session_start();

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
}
require_once "auth-home.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/photodeprofil/compte.png" />
    <link rel="stylesheet" href="./css/moncompte.css">
    <title>Mon Compte</title>

    <!-- Footer -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />



</head>

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

                        
                        
                        <!-- /* Connexion en tant qu'administrateur */ -->
                        <h1>
                            <?php

                            if ($_SESSION['type'] = "admin") {
                                    echo 'bonjour '. $_SESSION['User'];
                                }else{
                                    echo "Vous n'êtes pas Admin, ". $_SESSION['User'];
                                }
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

        $i = 0;

        $sqlQuery = 'SELECT * FROM t_user';
        $sth = $dbco->query($sqlQuery);
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth->execute();

        //On affiche les infos de la table
        $keys = array_keys($resultat);
    
        echo "bonjou";

        foreach ($resultat as $resultats) {
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

                                    <img src="./Assets/mounts/picto/star.png" class="picto">

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
                            <a href= "<?php echo './Uploads/' . $resultats['game_photo'] ?>" download = "<?php echo $resultats['game_photo']?>">Download profile pic </a>
                            <?php }?>


                        </div>
                        <img src="<?php echo $resultats['game_photo'] ?>" class="photoMount" />
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

    $i = 0;

    $sqlQuery = 'SELECT * FROM t_user WHERE user_type = "creator" ';
    $sth = $dbco->query($sqlQuery);
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth->execute();

    //On affiche les infos de la table
    $keys = array_keys($resultat);

    echo "bonjou";

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

                                <img src="./Assets/mounts/picto/star.png" class="picto">

                                    <?php 
                                        echo 'Creator : ' . $resultats['user_name'];
                                    ?>

                            </div>


                            <div class="mountDetail">
                                <?php echo $resultats['user_email'] ?>
                            </div>
                            <div class="mountDetail">
                                <?php echo $resultats['game_name'] ?>
                            </div>

                        </div>
                        <?php if($resultats['user_game']){?>
                        <a href= "<?php echo './Uploads/' . $resultats['user_game'] ?>" download = "<?php echo $resultats['user_game']?>"> Download the game </a>
                        <?php }?>

                        


                    </div>
                    <img src="<?php echo $resultats['game_photo'] ?>" class="photoMount" />
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

</html>
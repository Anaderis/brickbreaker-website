<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';

/* On ferme la connexion */
// $conn = null;

if(isset($_SESSION["Loggedin"])){
    $userpseudo = $_SESSION['Loggedin'];
}else{
    session_destroy();
}

include "auth-home.php";


?>

<!DOCTYPE html>
<html>

<head>

    <link rel="icon" type="image/x-icon" href="./Assets/icon-Login.png" />
    <meta charset="utf-8" />
    <title>BrickBox</title>


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="./css/style-account.css" />


    <!-- <style>
        form {
            background-image: url('./Assets/header-mounts.jpg');
            background-size: cover;
            height: 800px;
            width: 100%;
        }
    </style> -->


</head>

<body>

    <div class="imgHeaderMount">

        <header>

            <nav id="menus">
                <ul>
                    <li>
                        <a href="./home.php">
                            <img src="./Assets/icon-Login.png" alt="BrickBox" class="logo" /></a>
                    </li>
                    <li><a href="#">Games</a></li>
                    <li><a href="#">The team</a></li>
                    <li><a href="./register_copy.php">Register</a></li>

                    <li>
                        <?php 
                            if(isset($_SESSION['Loggedin'])){
                                echo '<a href="./MonCompte.php">' .$userpseudo.'</a>';
                            }else{
                                echo '<a href="./login_copy.php">My account</button></a>';
                            }
                        ?>
                    </li>
                    <li>
                        <?php 
                        if(isset($_SESSION['Loggedin'])){
                            echo '<a href="./PHP/Login/logout.php"><button class="login" type="button">Logout</button></a>';
                        } else {
                            echo '<a href="./login_copy.php"><button class="login2" type="button">Login</button></a>';
                        }
                        ?>
                    </li>
                </ul>

            </nav>

            <section>
            
            <div class="formMount">
                <div class="filter">
                <h1>Welcome to Brick Breaker Box</h1>
                <form action="home.php" method="post" class="formMount">
                <input type="submit" value="Play" name="submit" class="logins">
                    </form>
                </div>
            </div>
            
            </section>

        </header>

    </div>





    <!-- /*----------------------------Connexion BDD------------------------*/ -->




    <?php


    //On récupère les infos de la table 
    




    if (isset ($_POST["submit"])) {

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
                                    
                                    <form action="#" method="post">
                                            <input type="submit" value="Play" class="button"> 
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


</body>

</html>
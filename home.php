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

    <link rel="icon" type="image/x-icon" href="./Assets/icon.png" />
    <meta charset="utf-8" />
    <title>WoW Collection</title>


    <!-- Footer -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="./css/style-equipment.css" />


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
                        <a href="./wow-armory.php">
                            <img src="./Assets/logo.png" alt="World of warcraft" class="logo" /></a>
                    </li>
                    <li><a href="./bdd-mount.php">Games</a></li>
                    <li><a href="./equipements.php">The team</a></li>
                    <li><a href="./equipements.php">Contact us</a></li>

                    <li>
                        <?php 
                            if(isset($_SESSION['Loggedin'])){
                                echo '<a href="./MonCompte.php">' .$userpseudo.'</a>';
                            }else{
                                echo '<a href="./login.php">My account</button></a>';
                            }
                        ?>
                    </li>
                    <li>
                        <?php 
                        if(isset($_SESSION['Loggedin'])){
                            echo '<a href="./PHP/Login/logout.php"><button class="login" type="button">Logout</button></a>';
                        } else {
                            echo '<a href="./login.php"><button class="login2" type="button">Login</button></a>';
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
                <input type="submit" value="Play" name="submit" class="login">
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

        $sqlQuery = 'SELECT * FROM t_user';
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
                                <?php echo "bonjour"; ?>
                                <!-- $resultats['user_name'] -->
                            </h3>
                        <img src="./Uploads/<?php echo $resultats['user_game'] ?>" class="photoMount" />
                    </div>
                </article>
            </div>
            </section>







            <?php
        }

        echo "<p class=count> Résultats : $i</p>";
    }



    ?>


</body>

</html>
<?php

session_start();
// $_SESSION['resultats'];

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
   
}

require_once "../../auth-home.php";


if (isset($_POST["modify_game"])) {

$_SESSION['modify_ID'] = isset($_POST['modify_id']) ? $_POST['modify_id'] : "";

}


?>

<!DOCTYPE html>
<html lang="en">

<body>

<form action="modify_game.php" method="post" enctype="multipart/form-data">

        <input type="text" name="gamename" placeholder="New game name">

        <label for="file">Upload your game</label>
            <input type="file" name="file"> 

        <label for="file">Upload your photo</label>
            <input type="file" name="photo"> 
            

            <input type="submit" name="submit-register" value="Register">

</form>

<?php



// echo $_POST["submit-register"];


if(isset($_POST["submit-register"])){

    $gamename = $_POST["gamename"];
    $isphoto = true;
    $isfile = true;

    //Intégration dans un tableau de tous les éléments du fichier

    /*--------------------AJOUT DU FILE DU JEU ---------------------------*/

    if(isset($_FILES['file']) && $_FILES['file']['size']>0){

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    

    //Vérification de l'extension du fichier. 
    //Le explode va créer deux éléments : le nom du fichier + l'extension car le séparateur est le point.
    //On veut donc récupérer le dernier élément du tableau, l'extension

    $tabExtension = explode('.', $name);

    //Transforme le texte en minuscules
    $extension = strtolower(end($tabExtension));
    
    //Tableau des extensions que l'on accepte
    $extensions = ['c', 'txt', 'pdf', 'py'];

    $maxSize = 400000;

    $array = in_array($extension, $extensions);


    // echo $extension;
    // echo gettype($extensions[0]);
    // echo $array;


    //Vérification d'un nom unique de fichier

        
        
        
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0){ 
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
            // if (is_file($file)){
            //     unlink($file);
            // } 
        move_uploaded_file($tmpName, '../../Uploads/'.$file);
        echo "fichier upload";
        }
        // else if ($error!=0) {
        //     echo "Something bad happened with your game file";
        // }
        else if ($size >= $maxSize){
            echo "File is too large";
        }
        else if (!in_array($extension, $extensions)){
            echo "Bad file extension";
        }

        


}

    /*--------------------AJOUT DE LA PHOTO ---------------------------*/


    if(isset($_FILES['photo']) && $_FILES['photo']['size']>0){


        $tmpName = $_FILES['photo']['tmp_name'];
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];
    
        //Vérification de l'extension du fichier. 
        //Le explode va créer deux éléments : le nom du fichier + l'extension car le séparateur est le point.
        //On veut donc récupérer le dernier élément du tableau, l'extension
    
        $tabExtension = explode('.', $name);
    
        // Transforme le texte en minuscules
        $extension = strtolower(end($tabExtension));
        //
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif','webp'];
    
        $maxSize = 400000;
    
        $array = in_array($extension, $extensions);
    
    
        echo $extension;
        echo gettype($extensions[0]);
        echo $array;

        
    
    
        // Vérification d'un nom unique de fichier

        

        
    
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            $photo = $uniqueName.".".$extension;
            // if (is_file($file)){
            //     unlink($file);
            // }
            move_uploaded_file($tmpName, '../../Uploads_photos/'.$photo);
            echo "fichier upload";
        
        }
        else if ($size >= $maxSize){
            echo "Photo is too large";
        }
        // else if ($error!=0) {
        //     echo "Something bad happened with your photo";
        // }
        else if (!in_array($extension, $extensions)){
            echo "Bad photo extension";
        }

        



    }

        if ($_FILES['file']['size'] == 0) {
            $isfile=false;
        }
        if ($_FILES['photo']['size'] == 0) {
            $isphoto=false;
        }

    
    if ($isfile == true) {
    $sqlQuery = 'UPDATE t_user SET 
    user_game = :file, game_name = :gamename
    WHERE user_ID = :id';
    $sth = $dbco->prepare($sqlQuery);
    
    $sth->bindParam(':file', $file, PDO::PARAM_STR);
    $sth->bindParam(':gamename', $gamename, PDO::PARAM_STR);
    $sth->bindParam(':id', $_SESSION['modify_ID'], PDO::PARAM_STR);
    $sth->execute();

    echo $_SESSION['modify_ID'];
    }

    if ($isphoto == true) {

        $sqlQuery = 'UPDATE t_user SET 
        game_photo = :photo, game_name = :gamename
        WHERE user_ID = :id';
        $sth = $dbco->prepare($sqlQuery);
        $sth->bindParam(':photo', $photo, PDO::PARAM_STR);
        $sth->bindParam(':gamename', $gamename, PDO::PARAM_STR);
        $sth->bindParam(':id', $_SESSION['modify_ID'], PDO::PARAM_STR);
        $sth->execute();
    
        echo $_SESSION['modify_ID'];

    }

    if ($isphoto == true && $isfile == true) {

        $sqlQuery = 'UPDATE t_user SET 
        user_game = :file, game_photo = :photo, game_name = :gamename
        WHERE user_ID = :id';
        $sth = $dbco->prepare($sqlQuery);
        $sth->bindParam(':photo', $photo, PDO::PARAM_STR);
        $sth->bindParam(':file', $file, PDO::PARAM_STR);
        $sth->bindParam(':gamename', $gamename, PDO::PARAM_STR);
        $sth->bindParam(':id', $_SESSION['modify_ID'], PDO::PARAM_STR);
        $sth->execute();
    
        echo $_SESSION['modify_ID'];

    }


    // header('Location:../../MonCompte.php');
    // exit;
}






?>

</body>
</html>
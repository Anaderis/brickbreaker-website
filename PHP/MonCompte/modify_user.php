<?php

session_start();
// $_SESSION['resultats'];

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
   
}

require_once "../../auth-home.php";


if (isset($_POST["modify_player"])) {

$_SESSION['modify_ID'] = isset($_POST['modify_id']) ? $_POST['modify_id'] : "";

}


?>

<form action="modify_user.php" method="post">

        <input type="text" name="Userregister" placeholder="New username">


        <input type="email" name="emailregister" placeholder="New email adress">
        <input type="password" name="passwordregister" placeholder="New Password">
        <label for="type">Change status :</label>

        <select id="status" name="type">
                <option value="">...</option>
                <option value="creator">Creator</option>
                <option value="player">Player</option>
        </select>

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

    echo "bonjour monsieur";
    $emailregister = $_POST["emailregister"];
    $haveemail = false;
    $Userregister = $_POST["Userregister"];
    $haveuser = false ;
    $passwordregister = $_POST["passwordregister"];
    $havepassword = false ;
    $usertype = $_POST["type"];
    $havetype = false ;
    $gamename = $_POST["gamename"];
    $havegamename = false ;
    $isfile = false ;
    $isphoto = false ;


    //Intégration dans un tableau de tous les éléments du fichier

    /*--------------------AJOUT DU FILE DU JEU ---------------------------*/

    if(isset($_FILES['file'])){

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


    echo $extension;
    echo gettype($extensions[0]);
    echo $array;


    //Vérification d'un nom unique de fichier

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './Uploads/'.$file);
        echo "fichier upload";
    
    }
    else if ($size >= $maxSize){
        echo "File is too large";
    }
    else if ($error!=0) {
        echo "Something bad happened with your game file";
    }
    else if (!in_array($extension, $extensions)){
        echo "Bad file extension";
    }


}

    /*--------------------AJOUT DE LA PHOTO ---------------------------*/

    if(isset($_FILES['photo'])){

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
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $photo = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, './Uploads_photos/'.$photo);
            echo "fichier upload";
        
        }
        else if ($size >= $maxSize){
            echo "Photo is too large";
        }
        else if ($error!=0) {
            echo "Something bad happened with your photo";
        }
        else if (!in_array($extension, $extensions)){
            echo "Bad photo extension";
        }

    }

    // Gestion des champs du formulaire

    $errors = array();

    if(!filter_var($emailregister, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }
    if(strlen($passwordregister)<8){
        array_push($errors, "Password must be at least 8 characters long"); 
    }

    if ($_FILES['file']['size'] > 0) {
        $set[] = ' user_game = ' . ':file';
        $isfile=true;
    }
    if ($_FILES['photo']['size'] > 0) {
        $set[] = ' game_photo = ' . ':photo';
        $isphoto=true;
    }

    if (!empty ($_POST['Userregister'])) // si une region à été choisie
        {
            $set[] = ' user_name = ' . ':Userregister';
            $haveuser = true;
        }
        if (!empty ($_POST['emailregister'])) // si une region à été choisie
        {
            $set[] = ' user_email = ' . ':emailregister';
            $haveemail = true;
        }
        if (!empty ($_POST['passwordregister'])) // si une region à été choisie
        {
            $set[] = ' user_password = ' . ':passwordregister';
            $havepassword = true;
        }
        if (!empty ($_POST['type'])) // si une region à été choisie
        {
            $set[] = ' user_type = ' . ':type';
            $havetype = true;
        }
        if (!empty ($_POST['gamename'])) // si une region à été choisie
        {
            $set[] = ' game_name = ' . ':gamename';
            $havegamename = true;
        }




        if (isset ($set)) {
            $sqlQuery .= " SET " . implode(', ', $set);
        }

// $id=$resultats['user_ID'];
// echo $id;

    $sqlQuery = 'UPDATE t_user SET user_name = :Userregister, user_type = :type, user_password = :passwordregister,
    user_game = :file, user_email = :emailregister, game_name = :gamename, game_photo = :photo
    WHERE user_ID = :id';
    $sth = $dbco->prepare($sqlQuery);
    if ($haveuser){
        $sth->bindParam(':Userregister', $Userregister, PDO::PARAM_STR);

    }
    if ($havetype){
        $sth->bindParam(':type', $usertype, PDO::PARAM_STR);
    }
    if ($havepassword) {
        $sth->bindParam(':passwordregister', $passwordregister, PDO::PARAM_STR);
    }
    if ($isfile) {
        $sth->bindParam(':file', $file, PDO::PARAM_STR);
    }
    if ($haveemail){
        $sth->bindParam(':emailregister',  $emailregister, PDO::PARAM_STR);
    }
    if ($havegamename) {
        $sth->bindParam(':gamename', $gamename, PDO::PARAM_STR);
    }
    if ($isphoto){
        $sth->bindParam(':photo', $photo, PDO::PARAM_STR);
    }
    $sth->bindParam(':id', $_SESSION['modify_ID'], PDO::PARAM_STR);
    $sth->execute();

    echo $_SESSION['modify_ID'];


    header('Location:../../MonCompte.php');
    exit;
}






?>
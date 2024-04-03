<?php

//------------------------------------
//  _____ _               _    
// /  __ \ |             | |   
// | /  \/ |__   ___  ___| | __
// | |   | '_ \ / _ \/ __| |/ /
// | \__/\ | | |  __/ (__|   < 
//  \____/_| |_|\___|\___|_|\_\
//------------------------------------  
                        
if(isset($_POST["submit-register"])){
    $emailregister = $_POST["email-register"];
    $Userregister = $_POST["User-register"];
    $passwordregister = $_POST["password-register"];
    $passwordrepeatregister = $_POST["password-check-register"];
    $usertype = $_POST["type"];

    //Intégration dans un tableau de tous les éléments du fichier

    if(isset($_FILES['file'])){

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    move_uploaded_file($tmpName, './Uploads/'.$name);

    //Vérification de l'extension du fichier. 
    //Le explode va créer deux éléments : le nom du fichier + l'extension car le séparateur est le point.
    //On veut donc récupérer le dernier élément du tableau, l'extension

    $tabExtension = explode('.', $name);

    // Transforme le texte en minuscules
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte
    $extensions = ['c', 'png', 'jpeg', 'txt'];

    $maxSize = 400000;

    //Filtre des extensions acceptées

    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName, './Uploads/'.$name);
    }
    else{
        echo "Bad extension file";
    }

    // Contrôle de la taille du fichier

    if(in_array($extension, $extensions) && $size <= $maxSize){
        move_uploaded_file($tmpName, './Uploads/'.$name);
    }
    else{
        echo "File is too large";
    }

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        move_uploaded_file($tmpName, './Uploads/'.$name);
    }
    else{
        echo "Something bad happened";
    }

    // Vérification d'un nom unique de fichier

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './Uploads/'.$file);
    }

   
    // $req = $conn->prepare('INSERT INTO t_user (user_game) VALUES (?)');
    // $req->execute([$file]);
    // echo "Image enregistrée";

    // Les points d'interrogation permettent d'éviter les injections SQL

    }

    // Gestion des champs du formulaire

    $errors = array();

    if(empty($emailregister) OR empty($Userregister) OR empty($passwordregister) OR empty($passwordrepeatregister)OR empty($usertype)){
        array_push($errors, "All fields are required" );
    }
    if(!filter_var($emailregister, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }
    if(strlen($passwordregister)<8){
        array_push($errors, "Password must be at least 8 characters long"); 
    }
    if($passwordregister != $passwordrepeatregister){
        array_push($errors, "Password does not match"); 
    }
    if(count($errors)>0){
        foreach($errors as $error){
            echo"<div class='alert alert-danger'>$error</div>";
        }
    }else{
        require_once "DB_Conn.php";
        $passwordHash = password_hash($passwordregister, PASSWORD_DEFAULT);
        // Fonction pour génèrer un random ID 
        function generateRandomId() {
            return rand(1, 999999);
        }

        // Génère un random ID
        $randomId = generateRandomId();

        // Check si l'ID existe déjà dans la base de données
        $sqlCheck = "SELECT user_ID FROM t_user WHERE user_ID = '$randomId'";
        $result = $conn->query($sqlCheck);

        if ($result->num_rows > 0) {
            // Si l'Id existe déjà, génère une nouvelle
            $randomId = generateRandomId();
        }

        function sanitizeEmail($emailregister) {
            return filter_var($emailregister, FILTER_SANITIZE_EMAIL);
        }
        // Filtre et valide l'email
        $sanitizedEmail = sanitizeEmail($emailregister);
        
        // Check si l'email existe déjà dans la base de données
        $sqlCheck = "SELECT user_email FROM t_user WHERE user_email = '$sanitizedEmail'";
        $result = $conn->query($sqlCheck);
        
        if ($result->num_rows > 0) {
            array_push($errors, "Email already exist." );
        } else {
            $sql = "INSERT INTO t_user (user_ID, user_email, user_password, user_name, user_type, user_game) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $preparestmt = mysqli_stmt_prepare($stmt, $sql);
            if($preparestmt){
                mysqli_stmt_bind_param($stmt, "ssssss", $randomId, $emailregister, $passwordregister, $Userregister, $usertype, $file);
                mysqli_stmt_execute($stmt);
            }else{
                array_push($errors, "Something went wrong"); 
            }
        }
        // Ferme la base de données
        $conn->close();
    }
}
    

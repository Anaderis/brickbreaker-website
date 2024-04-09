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
    $gamename = $_POST["gamename"];
    //Intégration dans un tableau de tous les éléments du fichier

    /*--------------------AJOUT DU FILE DU JEU ---------------------------*/

    if(isset($_FILES['file']) && $usertype=="creator"){

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    //Vérification de l'extension du fichier. 
    //Le explode va créer deux éléments : le nom du fichier + l'extension car le séparateur est le point.
    //On veut donc récupérer le dernier élément du tableau, l'extension

    $tabExtension = explode('.', $name);

    // Transforme le texte en minuscules
    $extension = strtolower(end($tabExtension));
    //
    //Tableau des extensions que l'on accepte
    $extensions = ['c', 'txt', 'pdf', 'py'];

    $maxSize = 400000;

    $array = in_array($extension, $extensions);


    // echo $extension;
    // echo gettype($extensions[0]);
    // echo $array;


    // Vérification d'un nom unique de fichier

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './Uploads/'.$file);
        echo "File uploaded ";
    
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

    if(isset($_FILES['photo']) && $usertype=="creator"){

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
    
    
        // echo $extension;
        // echo gettype($extensions[0]);
        // echo $array;
    
    
        // Vérification d'un nom unique de fichier
    
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $photo = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, './Uploads_photos/'.$photo);
            echo "Photo uploaded";
        
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
        $sqlCheck = "SELECT user_email FROM t_user WHERE user_email = ':sanitizedemail'";
        $result = $conn->query($sqlCheck);
        $result ->bindParam(':sanitizedemail', $sanitizedEmail, PDO::PARAM_STR);

        if ($result->num_rows > 0) {
            array_push($errors, "Email already exist." );
        } else {
            $sql = "INSERT INTO t_user (user_ID, user_email, user_password, user_name, user_type, user_game, game_photo, game_name) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
            $stmt = mysqli_stmt_init($conn);
            $preparestmt = mysqli_stmt_prepare($stmt, $sql);
            if($preparestmt){
                mysqli_stmt_bind_param($stmt, "ssssssss", $randomId, $emailregister, $passwordregister, $Userregister, $usertype, $file, $photo, $gamename);
                mysqli_stmt_execute($stmt);
            }else{
                array_push($errors, "Something went wrong"); 
            }
        }
        // Ferme la base de données
        $conn->close();
    }
}
    

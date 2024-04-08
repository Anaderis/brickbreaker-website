<?php

session_start();
// $_SESSION['resultats'];

if (isset ($_SESSION["Loggedin"])) {
    $user = $_SESSION["Loggedin"];
   
}
require_once "../../auth-home.php";

// $delete_ID = isset($_POST['delete_id']) ? $_POST['delete_id'] : "";

if (isset ($_POST["delete_game"])) {
    unlink('./Uploads/' . $resultats['user_game']);
}

// $id=$resultats['user_ID'];
// echo $id;


// $sqlQuery = 'DELETE FROM t_user WHERE user_Id = :id';
// $sth = $dbco->prepare($sqlQuery);
// $sth->bindParam(':id', $delete_ID, PDO::PARAM_STR);
// $sth->execute();
// }

header('Location:../../MonCompte.php');
exit;


?>
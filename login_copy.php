<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/icon-Login.png" />
    <link rel="stylesheet" href="./css/login.css">
    <title>Sign In</title>

    <!-- Police -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Reddit+Mono:wght@200..900&display=swap" rel="stylesheet">


</head>
<body>

    <main>
        <div class="already">
            <button type="button" class="button"><a href="./register_copy.php">Register</a></button>
        </div>
                    <div class=conteneur>
                        <div class = logo_conteneur>
                            <a href="./home.php">
                                <img class="logo" src="./Assets/icon-Login.png">
                            </a>    
                        </div>

                        <div class=background_color>
                            
                                <form action="login_copy.php" method="POST">
                                    <div class=conteneur_again>
                                        <div>
                                            <h2>Sign In</h2>
                                        </div>

                                            <div class="padding">
                                                <h6>Username</h6> 
                                                <input type="text" name="User" placeholder="Enter your username">
                                            </div>
                                            
                                            <div class="padding">
                                                <h6>Password</h6>
                                                <input type="password" name="password" placeholder="Enter your password">
                                            </div>

                                            <div class=cta>

                                            <input type="submit" name="submit"  value="Login">
                                            
                                            </div>

                                            <div class=error>
                                            <?php include "./PHP/Login/auth.php"?>

                                            </div>
                                    </div>
                                </form> 
                            
                        </div> 
                        
                    </div>
                     
    </main> 
</body>
</html>

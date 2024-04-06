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
        <!-- Login -->
                    <div class=conteneur>
                        <div class = logo_conteneur>
                            <a href="./home.php">
                                <img class="logo" src="./Assets/icon-Login.png">
                            </a>    
                        </div>

                        <div class=background_color>
                            <div>
                                <h2>Sign In</h2>
                            </div>
                                <form action="login_copy.php" method="POST">
                                    <div>
                                            <h6>Username</h6> 
                                            <input type="text" name="User" placeholder="Enter your UserName">
                                            <h6>Password</h6>
                                            <input type="password" name="password" placeholder="Enter your PassWord">
                                        
                                            <div class=cta>
                                            <?php include "./PHP/Login/auth.php"?>

                                            <input type="submit" name="submit"  value="Login">
                                            </div>
                                    </div>
                                </form> 
                        </div>  
                    </div>
    </main> 
</body>
</html>

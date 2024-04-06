<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/icon-Login.png" />
    <link rel="stylesheet" href="./css/register.css">
    <title>Sign In</title>

    <!-- Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Police -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">



</head>
<body>

    
    <main>

    <div class="already">
    <button type="button" class="button"><a href="./login_copy.php">Sign in</a></button>
    </div>

            <div class=conteneur>
                        <div class = logo_conteneur>
                            <a href="./home.php">
                                <img class="logo" src="./Assets/icon-Login.png">
                            </a>    
                        </div>


                        <div class=background_color>
                            
                            <form action="register.php" method="post" enctype="multipart/form-data">
                                <div class=conteneur_again>
                                    <div>
                                        <h2>Sign Up</h2>
                                    </div>
                                        
                                        <div class="padding">
                                            <h6>Email Adress</h6>
                                            <input type="email" name="email-register" placeholder="Enter your email adress">
                                        </div>
                                        
                                        <div class="padding">
                                            <h6>Username</h6>
                                            <input type="text" name="User-register" placeholder="Enter your username">
                                        </div>
                                    
                                   
                                        <div class="padding">
                                            <h6>Password</h6>
                                            <input type="password" name="password-register" placeholder="Enter your password">
                                        </div>

                                        <div class="padding">
                                            <h6>Repeat Password</h6> 
                                            <input type="password" name="password-check-register" placeholder="Repeat your password">
                                        </div>

                                        <div class="padding">
                                            <label for="type">You are :</label>
                                                <select id="status" name="type">
                                                        <option value="...">...</option>
                                                        <option value="creator">A creator</option>
                                                        <option value="player">A player</option>
                                                </select>
                                        </div>
                                        
                                        <div id="upload" style="display: none">

                                        

                                            <label for="file">Upload your game</label>
                                            <input type="file" name="file"> 

                                            <label for="file">Upload your photo</label>
                                            <input type="file" name="photo"> 

                                            <div>
                                                <h6>Give your game a name</h6>
                                                <input type="text" name="gamename" placeholder="Enter your name game">
                                            </div>
                                        </div>
    
                                        <div class ="cta">
                                            <input type="submit" name="submit-register" value="Register">
                                        </div>

                                        <div class="error">
                                            <?php include "./PHP/Login/adduser.php"?>
                                        </div>
                                
                                        </div>
                                </form> 
                        </div>  
                    </div>
    </main> 
    <script src="java.js"></script> 
</body>
</html>

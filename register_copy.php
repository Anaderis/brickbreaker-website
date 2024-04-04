<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/icon-Login.png" />
    <link rel="stylesheet" href="./css/login.css">
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
    <header>
        <nav>
            <a href="./bdd-mount.php">
                <img class="logoWOW" src="./Assets/logo.jpg" alt="logoWOW">
            </a>
        </nav>
    </header>

    
    <main>
                    
                            <h2>Sign Up</h2>
                      
                        
                        <form action="register.php" method="post" enctype="multipart/form-data">
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <h6>Email Adress</h6>
                                            <input type="email" name="email-register" placeholder="Enter your Email Adress">
                                        </div>
                                        <div>
                                            <h6>UserName</h6>
                                            <input type="text" name="User-register" placeholder="Enter your UserName">
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <h6>PassWord</h6>
                                            <input type="password" name="password-register" placeholder="Enter your PassWord">
                                        </div>
                                        <div>
                                            <h6>Repeat PassWord</h6> 
                                            <input type="password" name="password-check-register" placeholder="Repeat your PassWord">
                                        </div>
                                        <div>
                                            <label for="type">You are :</label>
                                                <select id="status" name="type">
                                                    <option value="">...</option>
                                                    <option value="creator">A creator</option>
                                                    <option value="player">A player</option>
                                                </select>
                                        </div>

                                        <div>

                                        <label for="file">Upload your game</label>
                                        <input type="file" name="file"> 

                                        <label for="file">Upload your photo</label>
                                        <input type="file" name="photo"> 

                                        </div>
                                    
                                    </div>
                                </div>
                                <?php include "./PHP/Login/adduser.php"?>
                                <div>
                                    <input type="submit" name="submit-register" value="Register">
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </main>
    <script src="java.js"></script> 
</body>
</html>

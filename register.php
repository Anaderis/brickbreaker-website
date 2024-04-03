<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/iconelogin" href="./Assets/icon-Login.png" />
    <link rel="stylesheet" href="./css/login.css">
    <title>Sign In</title>

</head>

<body>

<section class="vh-100" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <h1 class="text-white mb-4">Sign up</h1>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Email Adress</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                            
                                <input type="email" class="form-control form-control-lg" id="email-register" name="email-register" placeholder="Enter your Email Adress">
                                        
                            </div>
                        </div>


                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Username</h6>
 
                            </div>
                            <div class="col-md-9 pe-5">

                            <input type="text" name="User-register" class="form-control" rows="3" placeholder="Enter your UserName">
                            
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">PassWord</h6>
 
                            </div>
                            <div class="col-md-9 pe-5">

                            <input type="password" name="password-register" class="form-control" rows="3" placeholder="Enter your password">
                            
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Repeat PassWord</h6>
 
                            </div>
                            <div class="col-md-9 pe-5">

                            <input type="password" name="password-check-register" class="form-control" rows="3" placeholder="Repeat your password">
                            
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">

                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0"><label for="type">You are :</label></h6>
 
                            </div>
                            <div class="col-md-9 pe-5">

                            <select name="type" class="form-control" rows="3">
                                                    <option value="">...</option>
                                                    <option value="admin">An administrator</option>
                                                    <option value="creator">A creator</option>
                                                    <option value="player">A player</option>
                            </select>  

                            </div>
                        </div>

                        <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0"><label for="file">Upload your game file</label></h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" />
                                <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant file. Max file
                                size 50 MB</div>

                                </div>
                            </div>

                            <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <?php include "./PHP/Login/adduser.php"?>
                                    <input type="submit" name="submit-register" value="Register" class="btn btn-primary btn-lg">
                                </div>

                        </div>
        </div>
      </div>
    </div>
  </div>
</section>
                        



                                        
                    
                                            
                                                
                                       

                                        
                                        
                                
                                
                                    
                                
                                
                                
    


</body>
</html>

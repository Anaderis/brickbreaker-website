<!DOCTYPE html>
<html lang="en">
<head>
    

</head>
<body>

                        
                        <form action="register.php" method="post">
                            
                                
                                            <h6>Email Adress</h6>
                                            <input type="email" id="email-register" name="email-register" placeholder="Enter your Email Adress">
                                      
                                        
                                            <h6>UserName</h6>
                                            <input type="text" name="User-register" placeholder="Enter your UserName">
                                        
                                            <h6>PassWord</h6>
                                            <input type="password" name="password-register" placeholder="Enter your PassWord">
                                        
                                            <h6>Repeat PassWord</h6> 
                                            <input type="password" name="password-check-register" placeholder="Repeat your PassWord">

                                            <label for="user-type">Are you a creator, administrator or player?</label>
                                                <select name="user-type">
                                                    <option value="">User type</option>
                                                    <option value="1">Administrator</option>
                                                    <option value="2">Creator</option>
                                                    <option value="3">Player</option>
                                                </select>
                                        
                                <?php include "./new_user.php"?>
                                <div class="submitbuttonregister">
                                    <input type="submit" name="submit-register" value="Register">
                                </div>
                                
                                
                        </form>
                    
</body>
</html>

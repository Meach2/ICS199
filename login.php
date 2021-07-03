<?php include 'header.php' ; ?>
    
    <body>
        <div class="row">
            <div class="col"></div>
            <div class="col-md-6 login-form-2" style="background-color: #090702;">
                <h3>Login</h3>
                <form action="login.php" method="POST" onsubmit="return validation();">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Your Username *" name="userid" value="" id="userid" />
                    </div>
                    <div class="form-group">
                        <input type="password"  class="form-control" name="password" placeholder="Your Password *" value="" id="password" />
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="SUBMIT" />
                        </div>
                    </div>
                    <div class="form-group">

                    <!-- PHP FOR LOGIN GOES HERE -->
                    <?php
                    $server = 'localhost';
                    $user = 'root';
                    $password = '';
                    $db = 'ics199greengrocerdb';
                
                    //create connection
                    $dbc = new mysqli($server,$user,$password,$db);
                
                    //Check Connection 
                    if ($dbc->connect_error) {
                        die("Connection Failed: " . $dbc->connect_error);
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')	{
                        if (isset($_POST['userid'])) {	
                            $userid=mysqli_real_escape_string($dbc, trim(strip_tags($_POST['userid'])));
                            $password= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['password'])));
                            // create query
                            $Hashed_Pass = password_hash($password, PASSWORD_DEFAULT);
                            $query = "SELECT user_name, Encrypted_password from users WHERE User_name='$userid'";
                            $legalagreementquery = "SELECT legalagreement from users WHERE User_name='$userid'";
                            
                            // run query
                            $result = @mysqli_query ($dbc, $query); // Run the query.
                            $row = mysqli_fetch_array($result);
                            if ($row != null) {
                            $password = $row["Encrypted_password"];
                            $result2 = @mysqli_query ($dbc, $legalagreementquery);
                            $row2 = mysqli_fetch_array($result2);
                            $legalagreement = $row2["legalagreement"]; // Run the query.
                            }
                            if(password_verify($_POST['password'], $password)){
                                
                            // Check the result:
                            if (@mysqli_num_rows($result) == 1) {
                                $_SESSION['userid']=$userid;
                                $_SESSION['admin'] = $row['admin'];
                                $_SESSION['legalagreement'] = $legalagreement;
                                header('location:index.php');
                                
                            } 
                        
                        }else { // Not a match!
                            ?> <script> alert("Login unsuccessful"); </script><?php
                        }
                        }
                    }
                
                ?>
                

                        <a href="store.php" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                </form>
                <a href="legalpage.php" class="ForgetPwd">Not a member? Sign up</a>
            </div>
            <div class="col"></div>
        </div>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    
    <?php 
    mysqli_close($dbc);	
    include 'footer.php' ; ?>

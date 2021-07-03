<?php include 'header.php' ; ?>

        <!-- Page Content-->
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h2>Register For A New Account</h2>
                    <hr />
                    <p>Sign up for a new account to start ordering your groceries</p>
                    <form action="userSignUp.php" method="POST" name="userSignUp" > <!-- FORM NAME userSignUp will run script "userSignUp.php" -->
                        <div class="form-row">
                            <div class="form-group col-md-8">
                            <input type="text" class="form-control" placeholder="User Name" name="Username"> <!-- Username field for DataBase-->
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                            <input type="text" class="form-control" placeholder="Password" name="Pass"> <!-- Username field for DataBase-->
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" placeholder="Email" name="Email"> <!--Email field for database-->
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="form-group col-md-6">
                              <input type="text" class="form-control" placeholder="First name" name="First_Name"> <!--firstName field for the dataBase-->
                             </div>
                             <div class="form-group col-md-6">
                               <input type="text" class="form-control" placeholder="Last name" name="Last_Name"> <!-- lastName field for the dataBase-->
                             </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Street Address" name="Street"> <!--street field for the dataBase-->
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="City" name="City"> <!--city field for the dataBase-->
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Postal Code" name="Zip"> <!--zip field for the dataBase-->
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Phone Number" name="Phone_Number"> <!--Phone_Number field for the dataBase-->
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg" name="submit" type="submit">Submit »</button>
                      </form> <!-- END OF FORM -->
                    
    
                </div>
                <div class="col-md-4 mb-5"> <!-- empty column just to give some spacing-->
                </div>
            </div>
        
        </div>
<?php include 'footer.php' ; ?>
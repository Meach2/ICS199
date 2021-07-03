<?php 
    //Simple script to test DB Connection

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    $dbc = mysqli_connect($server,$user,$password,$db);


$error = '<script>alert("Opps looks like theres an error in your input please try again")</script>';
$phonereg = '"/^[6-9][0-9]{9}$/"';

//End of connection set up
// Start of actual form submition
if(isset($_POST['submit'])){ //checks to see if the submit button was pressed
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  
    $Username = test_input($_POST['Username']); //Grabs data from form name 'Username' and sets $Username as value
    $Email = test_input($_POST['Email']);
    $First_Name = test_input($_POST['First_Name']);
    $Last_Name = test_input($_POST['Last_Name']);
    $Pass = test_input($_POST['Pass']);
    $Hashed_Pass = password_hash($Pass, PASSWORD_DEFAULT);
    $Street = test_input($_POST['Street']);
    $City = test_input($_POST['City']);
    $Zip = test_input($_POST['Zip']);
    $Phone_Number = test_input($_POST['Phone_Number']);
    //they have to agree to legal sequence to get here so it's always 1.
    $legalagreement = '1';
    //$user_id = 10005; // Auto sets user_id since I havent set up the sequence yet
    $admin = 0; // Admin is always 0

    //Start of SQL insert statment
    if(strlen($Phone_Number)==10 && ctype_digit($Phone_Number)){
      $phonegood = true;
    }else $phonegood = false;
    if(strlen($Zip)==6 && ctype_alnum($Zip)){
      $zipgood = true;
    }else $zipgood = false;
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Opps looks like there is an invalid email please try again");'; 
      echo 'window.location.href = "signup.php";';
      echo '</script>';
     
    }elseif($phonegood === false) {

      echo '<script type="text/javascript">'; 
      echo 'alert("Opps looks like there is an invalid phone number please try again");'; 
      echo 'window.location.href = "signup.php";';
      echo '</script>';
    }elseif($zipgood === false){
      echo '<script type="text/javascript">'; 
      echo 'alert("Opps looks like there is an invalid postal code please try again");'; 
      echo 'window.location.href = "signup.php";';
      echo '</script>';
    }else{
    $sql= "INSERT INTO users (USER_ID, Administrator, User_name, Encrypted_password, Firstname, Lastname, Email_Address, Home_Address, Phone_Number, Postal_Code, City, legalagreement) 
  VALUES (NEXT VALUE FOR user_id_sequence,'$admin', '$Username', '$Hashed_Pass', '$First_Name', '$Last_Name', '$Email', '$Street','$Phone_Number' , '$Zip', '$City', '$legalagreement')";
    //Runs the insert statment or dies in an error
    
  $run = mysqli_query($dbc,$sql);
    // if run is sucessful print out message of success

    }
}


                   //Closes connection
mysqli_close($dbc);
//header('Location:signup.php') ;
include 'signup.php';
 ?>
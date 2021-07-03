<?php
    //Simple script to test DB Connection

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    $dbc = mysqli_connect($server,$user,$password,$db);



   

//End of connection set up
// Start of actual form submition
if(isset($_POST['submit'])){ //checks to see if the submit button was pressed
   
    $uploadDir = 'media/sample/'; 
    $uploadfile = $uploadDir . basename($_FILES['userfile']['name']);

    $Prod_Name = $_POST['name']; //Grabs data from form 
    $Prod_Img = ($_FILES['userfile']['name']);
    $Price = $_POST['Product_Price'];
    $Desc = $_POST['Product_Description'];
    $Cat = $_POST['Categories'];
    $Path = './media/sample/';
    $FileAndPath =  $Path . $Prod_Img;
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        //echo "File is valid, and was successfully uploaded.\n";
    } else {
       // echo "Possible file upload attack!\n";
    }
    
    //echo 'Here is some more debugging info:<br>';
    //print_r ($FileAndPath);





    //Start of SQL insert statment
    $sql= "INSERT INTO product (PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
  VALUES (NEXT VALUE FOR product_id_sequence,'$Desc', '$Prod_Name','$Price', '$FileAndPath', '$Cat')";
    //Runs the insert statment or dies in an error
  $run = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
    // if run is sucessful print out message of success
    
}



                   //Closes connection
mysqli_close($dbc);


include 'addProduct.php';
 ?>
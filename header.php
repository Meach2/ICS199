<?php //SESSION MUST BE STARTED BEFORE DOC TYPE!
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Green Grocer!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
    </head>

<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Green Grocer</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                
                    <ul class="navbar-nav ml-auto">


<?php
 $server = 'localhost';
 $user = 'root';
 $password = '';
 $db = 'ics199greengrocerdb';

 $dbc = mysqli_connect($server,$user,$password,$db);
 
if (isset($_SESSION["userid"])) {
    $USERID = $_SESSION['userid'];
$query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc();
$legal = $_SESSION['legalagreement'];
$admin = $row['Administrator'];
}
if (isset($_SESSION["userid"])  && $legal == 0) {
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="legalpage.php">Legal</a></li>';
} else {
if (!isset($_SESSION["userid"]))	{
    echo '<li class="nav-item"><a class="nav-link" href="store.php">Store</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>';  
}
else	{
    echo '<li class="nav-item"><a class="nav-link" href="store.php">Store</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="shoppingcart.php">Shopping Cart</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="orderHistory.php">Order History</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="legalpage.php">Legal</a></li>';
    echo $_SESSION['admin'];
    if (isset($_SESSION['userid']) && $admin == 1)	{
        
        echo '<li class="nav-item"><a class="nav-link" href="addproduct.php">Add Products</a></li>';

                                
    }
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
}}
?>
                    </ul>
                    
                    
                </div>
                <ul class="navbar-nav ml-auto">
                
                </ul>
                <?php
                
                if (isset($_SESSION['userid']))	{
                    $USERID = $_SESSION['userid'];
                    ?>
                <a class="navbar-brand" href="#!"> <?php echo "Welcome $USERID"; ?></a>
                <?php
                }
                ?>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-success py-5 mb-5">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-12">
                        <h1 class="display-4 text-white mt-5 mb-2">Green Grocer</h1>
                        <p class="lead mb-5 text-white-50">We're the Green Grocer, we're green and mean and sell beans.  We're ready to be your online grocery chain for veggies so you can feed your brain.  Green Grocer is natural, local and fresh.  We have produce that is better than the rest.  We're so local we're loco.  I encourage you to place your order, and don't refrain! What I'm trying to say, is we're not the same.  A grocer who on your wallet doesn't inflict pain.</p>
                    </div>
                </div>
            </div>
        </header>
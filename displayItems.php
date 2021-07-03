<?php ?>
<style>
    <?php include 'CSS/styles.css'; ?>
</style>
<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    //create connection
    $conn = new mysqli($server,$user,$password,$db);

    //Check Connection 
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
$sql = "SELECT * FROM product";

if(isset($_POST['submit'])){
    $Catagory = $_POST['Categories'];

    if($Catagory == 'produce'){
        $sql = "SELECT * FROM product WHERE Categories = 'produce' ;";
    }elseif ($Catagory == 'dairy'){
        $sql = "SELECT * FROM product WHERE Categories = 'dairy';";
    }
    elseif ($Catagory == 'grain'){
        $sql = "SELECT * FROM product WHERE Categories = 'grain';";
    }
    elseif ($Catagory == 'junkfood'){
        $sql = "SELECT * FROM product WHERE Categories = 'junk food';";
    }
    elseif ($Catagory == 'bakedgoods'){
        $sql = "SELECT * FROM product WHERE Categories = 'baked goods';";
    }
    elseif ($Catagory == 'frozenfood'){
        $sql = "SELECT * FROM product WHERE Categories = 'frozen food';";
    }
    elseif ($Catagory == 'meat'){
        $sql = "SELECT * FROM product WHERE Categories = 'meat';";
    }
    elseif ($Catagory == 'seafood'){
        $sql = "SELECT * FROM product WHERE Categories = 'seafood';";
    }
    elseif ($Catagory == 'kitchensupplies'){
        $sql = "SELECT * FROM product WHERE Categories = 'kitchen supplies';";
    }
}

    //$sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data from each row
        $counter = 0;
        while($row = $result->fetch_assoc()) {
            $IDNUM = $row["Categories"];
            $categoryName = '';
            $prod_id = $row['PRODUCT_ID'];
            $sql2 = "SELECT * FROM categories";
            $result2 = $conn->query($sql2);
            
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    if (strcmp($IDNUM, $row2["Category_Id"]) == 0){
                        $categoryName = $row2["Name_Category"];
                    }
                }
            }

 
            echo "
                <div class='col-md-4 mb-5'>
                    <div class='card h-100'>
                        <img style='height: 300px;' class='card-img-top' src='".$row["Image_Product"] . "'>
                            <div class='card-body'>
                                <h4 class='card-title'>" .ucwords($row["Name_Product"]) . "  <font size ='-10'>" . strtolower($categoryName) . "</font></h4>
                                <p class='card-text'> 
                                    <div class='container'>
                                        <div class='row'>
                                        <div class='col-8' style='color:white;'> ". $row["Information_product"] . "</div>
                                        <div class='col-8' style='color:white;'> Product ID: ". $row["PRODUCT_ID"] . "</div>";
                                                    //Display different depending on login
                                        if(!isset($_SESSION["userid"])){
                                            echo "<div class='col-4'> <a class='btn btn-success' href='login.php'>$" . number_format($row["Price_Product"], 2) . "</a> </div>";
                                        } else{
                                            echo "<div class='col-4'> <div class='btn btn-success no-click' style='cursor:default;'>$" . number_format($row["Price_Product"], 2) . "</div></div>";
                                        }
                                        echo " 
                                        </div>
                                    </div>
                                </p>
                            </div>

                        <div class='card-footer'></div>";
?><?php
                        if (isset($_SESSION["userid"]))	{
                               //testing with add to cart
?>
                        <form action='addToCart.php' method='POST'>
                                    <input type='number' name ='PRODUCT_ID'  value= "<?= $prod_id ?>"  placeholder ='". $row["PRODUCT_ID"] ."' style='display:none;'>
                                    <input type='text' name='USER_ID' value='" . $_SESSION['userid'] . "' placeholder='". $_SESSION['userid'] ."' style='display:none;'>
                                            
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='col-6'><input type='number'  deafault='1' name='QUANTITY' min='1' max='100' increment='1' class='form-control' placeholder='Quantity' name='Quantity'></div>
                                            <div class='col-6'><input onclick="alert('Item successfully added to cart')" type='submit' value='Add to cart'></div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            
                echo" </div>                
                </div>";
                     $counter++;
                    if ($counter == 3){
                            echo "</div><div class='row'>";
                            $counter = 0;
                        }
        }
    }   else{
        echo "0 Results";
    }

    $conn->close();
    ?>



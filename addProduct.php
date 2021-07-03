<?php include 'header.php' ;?>
        <!-- Page Content-->
        <link href='css/style.css' rel='stylesheet' />
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mb-5">
                    <h2>Add New Product</h2>
                    <hr />
                    <form action="addProduct_back.php" method="POST" name="addProduct" enctype="multipart/form-data"> <!-- FORM NAME addProduct will run script "addProduct.php" -->
                        <div>
                        <label for="Categories" class="greenletters">Pick a category:</label>
                        <select name="Categories" id="Categories" class="greenback">
                            <option value="produce">Produce</option>
                            <option value="dairy">Dairy</option>
                            <option value="grain">grain</option>
                            <option value="junkfood">Junk Food</option>
                            <option value="bakedgoods">Baked Goods</option>
                            <option value="frozenfood">Frozen Food</option>
                            <option value="meat">Meat</option>
                            <option value="seafood">Seafood</option>
                            <option value="kitchensupplies">Kitchen Supplies </option>
                        </select>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Product Name" name="name"> <!--Product_Name field for database-->
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <input type="number" min="0.00" max="10000" step="0.01" class="form-control" placeholder="Product Price ($)" name="Product_Price"> <!--Product_Price field for the dataBase-->
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control" placeholder="Product Description" name="Product_Description"></textarea><!--Product_Description field for the dataBase-->
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="form-group col-md-12">
                               <input type="file" class="form-control" placeholder="Product Image:" name="userfile"> <!-- Product_Image field for the dataBase-->
                               <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit">
                             </div>
                        </div>
                        
                      </form> <!-- END OF FORM -->
                    
    
                </div>
                <div class="col-md-3 mb-5"> <!-- empty column just to give some spacing-->
                </div>
            </div>
        
        </div>


<?php include 'footer.php';?>

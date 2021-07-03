<?php include 'header.php' ;?>
        <!-- Page Content-->
        <link href='css/style.css' rel='stylesheet' />
        <div class="container">
        <label for="Categories">Pick a category:</label>
        <form action ="" method="POST" name="catagory_pick">
        <select name="Categories" id="Categories">
            <option value="all">All</option>
             <option value="produce">Produce</option>
             <option value="dairy">Dairy</option>
             <option value="grain">Grain</option>
             <option value="junkfood">Junk Food</option>
             <option value="bakedgoods">Baked Goods</option>
             <option value="frozenfood">Frozen Food</option>
             <option value="meat">Meat</option>
             <option value="seafood">Seafood</option>
             <option value="kitchensupplies">Kitchen Supplies </option>
        </select>
        <button class="btn btn-success btn-lg" name="submit" type="submit">Submit »</button>
        </form>
            <div class="maybeThisWorks">
                <div class='row'>
                    <?php 
                    include('displayItems.php');
                    ?>
            </div>
        </div>
   <?php include 'footer.php' ;?>

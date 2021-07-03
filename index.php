<?php include 'header.php' ; ?>
        <!-- Page Content-->
        <link href='css/style.css' rel='stylesheet'>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h2>What We Do</h2>
                    <hr />
                    <p>We are a small scale island based grocery store. Proudly serving Victoria and the surrounding communities with second to none customer service. We offer same day delivery on any product made south of Duncan, to any residence within 25km of our store.</p>
                   
                   
<?php

                    
                    if (!(isset($_SESSION["userid"]))) {
                        echo "
                    <p>Sign up now to place your first order!</p>
                    <a class='btn btn-success btn-lg' href='legalpage.php'>Create an account</a>
                    ";
                    }
?>

                </div>
                <div class="col-md-4 mb-5">
                    <h2>Contact Us</h2>
                    <hr />
                    <address>
                        <strong>Green Grocer</strong>
                        <br />
                        4598 Camosun Rd
                        <br />
                        Victoria, BC, V7J 2K0
                        <br />
                    </address>
                    <address>
                        <abbr title="Phone">P:</abbr>
                        (250) 456-7890
                        <br />
                        <abbr title="Email">E:</abbr>
                        <a href="mailto:#">info@greengrocer.com</a>
                    </address>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="assets/images/Bread.jpg" alt="..." />
                        <div class="card-body">
                            <h4 class="card-title">Bread</h4>
                            <p class="card-text">White and Whole-Wheat bread are 25% off now through August!</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-success" href="login.html">Buy Now!</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="assets/images/islandFarms2.jpg" alt="..." />
                        <div class="card-body">
                            <h4 class="card-title">Milk</h4>
                            <p class="card-text">Island Farms 2% milk. On sale now for just $2.99.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-success" href="login.html">Buy Now!</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="assets/images/Ruffles2.jpg" alt="..." />
                        <div class="card-body">
                            <h4 class="card-title">Ruffles All-Dressed Chips</h4>
                            <p class="card-text">These chips are on sale for this week only. Buy 2 bags for just $5.00.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-success" href="login.html">Buy Now!</a></div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- Footer-->
 <?php include 'footer.php' ; ?>

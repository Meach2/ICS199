<?php include 'header.php';?>
        <!-- Page Content-->
        <link href='css/style.css' rel='stylesheet' />
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h2>Contact Direct</h2>
                    <hr />
                    <p>Please fill out this form with any questions and we will respond as quickly as possible</p>
                    <form action="contactForm.php" method="GET" name="contactForm"> <!-- FORM NAME contactForm will run script "contactForm.php" -->
                        <div class="form-row">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                          </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8 ">
                              <label for="inputEmail4"></label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                      </form>
                    <a class="btn btn-success btn-lg" href="#!">Submit »</a>
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
                        <a id="greenemail" href="mailto:#">info@greengrocer.com</a>
                    </address>
                </div>
            </div>
        
        </div>
<?php include 'footer.php'; ?>

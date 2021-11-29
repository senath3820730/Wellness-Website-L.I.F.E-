<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="plugins/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/contact-us.css">
    <script src="scripts/contact-us-validation.js"></script>
</head>

<body>
    <div class="wrapper">
        
            <?php require_once("includes/header.php"); ?>

            <?php if(isUserLoggedIn()) { ?>
            <?php require_once("includes/logged-in-navigation.php");?> <!-- the logged in navigation bar has a myServices and logout links for logged in users-->
            <?php } else{?> 
                <?php require_once("includes/navigation.php");?>
            <?php } ?>

            <content class="box content">
                <div class = "content-head">
                    <content class ="main-heading">
                        Contact Us
                    </content>
                </div>
                    
                 
                <form id="contact-us-form" method="post" action="mailto:LIFE@localcouncil.com">
                         
                    <fieldset>
                            <h2>Submit your enquiry here:</h2>   
                            <label class="label">Address:</label>
                            <input name="address" type="text" id="address" placeholder="Enter your address"></input> <br>
                       
                        
                            <label class="label">Email:</label>
                            <input name="email"  type="email" id="email" placeholder="Enter a valid email address"></input> <br>
                        
    
                            <label class="label">Enquiry:</label>
                            <textarea name="message" rows="10" cols="30" placeholder="Enter your enquiry"></textarea> <br>

                            <input id="enquiry-submit" type="submit" value="Submit"></input>
                            <input id="enquiry-reset" type="reset" value="Reset"></input>

                            <h3>Get in touch:</h3>
                            <ul class= "contact-list"> 
                                <li >Phone: +61 4XX XXX XXX</li>
                                <li >Email: LIFE@localcouncil.com</li>
                            </ul> 
                     
                        </fieldset>       

                </form>


            </content>

            <?php require_once("includes/resources.php"); ?>

            <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
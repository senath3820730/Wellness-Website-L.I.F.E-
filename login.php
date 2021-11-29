<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        
            <?php require_once("includes/header.php"); ?>

            <?php require_once("includes/navigation.php"); ?>

            <content class="box content">
                <div class = "content-head">
                    <content class ="main-heading">
                        Login
                    </content>
                </div>
                    
                <div id = 'no-account'> Please Login to access My Services or <a href='register.php'>register</a> to join us. </div>

                <form method="post">
                         
                        <fieldset>
                            <h2>Login here:</h2>   
                        
                            <label class="label">Username:</label>
                            <input class="input" name="email" id="email" placeholder="jondoe@mail.com"
                            <?php displayValue($_POST, 'email'); ?> /> <br>
                            <?php displayError($errors, 'email'); ?>                      
                            <br>
                            <label class="label">Password:</label>
                            <input class="input" name="password" type="password" id="password" />
                            <?php displayError($errors, 'password'); ?> 
                            <br><br>
                            <input class="input" id="enquiry-submit" type="submit" name="login" value="Login"></input>
                            <a href="index.php"><input class="input" type="button" value="Cancel"></input></a>
                     
                        </fieldset>    

                </form>


            </content>

            <?php require_once("includes/resources.php"); ?>

            <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);

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
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script> // displays the value of the age slider 
        $(document).ready(function () {
            const age = $("#age");
            const ageChange = function () {
                $("#age-display").text(age.val());
            }

            ageChange();
            age.mousemove(ageChange).change(ageChange);
        });
    </script>
</head>

<body>
    <div class="wrapper">
        
            <?php require_once("includes/header.php"); ?>

            <?php require_once("includes/navigation.php"); ?>

            <content class="box content">
                <div class = "content-head">
                    <content class ="main-heading">
                        Register
                    </content>
                </div>
                    
                 
                <form method="post">
                         
                        <fieldset>
                            <h2>Get registered here:</h2>   
                            <label class="label">First Name:</label>
                            <input class="input" name="first-name" type="text" id="first-name" placeholder="Jon"
                            <?php displayValue($_POST, 'first-name'); ?> /> <br> 
                            <?php displayError($errors, 'first-name'); ?>

                            <label class="label">Last Name:</label>
                            <input class="input" name="last-name" type="text" id="last-name" placeholder="Doe"
                            <?php displayValue($_POST, 'last-name'); ?> /> <br>
                            <?php displayError($errors, 'last-name'); ?>
                            
                        
                            <label class="label">Email Address:</label>
                            <input class="input" name="email" id="email" placeholder="jondoe@mail.com"
                            <?php displayValue($_POST, 'email'); ?> /> <br>
                            <?php displayError($errors, 'email'); ?>
                            

                           <label class="label">Confirm Email:</label>
                           <input class="input" name="confirm-email" id="confirm-email" placeholder="jondoe@mail.com" onpaste = "return false"/> <br>
                           <?php displayError($errors, 'confirm-email'); ?> 
                            
                            
                            <label class="label">Phone Number:</label>
                            <input class="input" name="phone-number" type="text" id="phone-number" placeholder="+61 4XX XXX XXX"
                            <?php displayValue($_POST, 'phone-number'); ?> /> <br> 
                            <?php displayError($errors, 'phone-number'); ?>


                            <label class="label">Age:</label>
                            <input class="input" name="age" type="range" min="1" max="120" id="age" 
                                <?php displayValue($_POST, 'age'); ?>
                                <?php if(!isset($_POST['age'])) echo 'value="1"'; ?> />      
                            <div id="age-display"></div><br>
                            <?php displayError($errors, 'age'); ?>
                         
                            
                            <label class="label">Student Status:</label> 
                            <div class = "radio-box">
                                <div><input name="student" type="radio" id="student-yes" value="true"
                                <?php displayChecked($_POST, 'student', 'true'); ?> /> Yes</div> <br>
                                <div><input name="student" type="radio" id="student-no" value="false"
                                <?php displayChecked($_POST, 'student', 'false'); ?> /> No</div>
                            </div>                                                       
                            <?php displayError($errors, 'student'); ?>


                            <label class="label">Employment Status:</label> 
                            <div class = "radio-box">
                                <div><input name="employment" type="radio" id="employment-yes" value="true" 
                                <?php displayChecked($_POST, 'employment', 'true'); ?> /> Yes</div> <br>
                                <div><input name="employment" type="radio" id="employment-no" value="false"
                                <?php displayChecked($_POST, 'employment', 'false'); ?> />No</div>
                            </div>                                                          
                            <?php displayError($errors, 'employment'); ?> <br>


                            <label class="label">Password:</label>
                            <input class="input" name="password" type="password" id="password" />
                            <?php displayError($errors, 'password'); ?>  
                            

                            <label class="label">Confirm password:</label>
                            <input class="input" name="confirm-password" type="password" id="confirm-password" />
                            <?php displayError($errors, 'confirm-password'); ?>   
                   

                            <input class="input" id="enquiry-submit" type="submit" name="register" value="Register"></input>
                            <a href="index.php"><input class="input" type="button" value="Cancel"></input></a>
                     
                        </fieldset>    

                </form>


            </content>

            <?php require_once("includes/resources.php"); ?>

            <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
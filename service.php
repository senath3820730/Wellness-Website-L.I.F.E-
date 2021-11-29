<?php require_once('includes/authorise.php'); ?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    }

?>
<!-- Code referenced in README.txt-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/service.css">
</head>
<body>
    <div class="wrapper">
    <?php require_once("includes/header.php"); ?>
        <?php require_once('includes/logged-in-navigation.php'); ?>

        <content class="box content">
            <div class = "content-head">
                <content class ="main-heading">
                    My Services
                </content>
            </div>

            <div class = "service-icon <?php echo $service['name'];?>-icon"><img src="<?php echo $service['image_path']; ?>" width = "180" height="200" ><div class = "icon-name"><?php echo $service['name']; ?></div></div>

            <?php if($id === 1) { ?>

                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>
                    <div class="service-descrip"> Select a type of yoga to practice below. There are three choices of instructions you can chose from, even if you just began your journey in yoga 
                        or your a regular practitioner.
                    </div>
                    <form class = "form" method="post">
                        <label class="label">Select a type of yoga exercise:</label> <br>
                        <div class = "radio-box">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div><input type="radio" id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                            <?php } ?> 
                        </div>
                        <input class="input" name="service" type="submit" value="Go"></input>
                        <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='error-display'>You must select a yoga type.</div>
                        <?php } ?>
                    </form>

                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>
                    <div class="form">
                        <label class="type-label"><?php echo $serviceInstruction['service_type']; ?></label> <br>
                        <video controls class = "tutorial"><source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                            Video tag is not supported in this browser.
                        </video>
                        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                            <label for = "duration"class="label">Duration:</label>
                            <input class="input center-box" name="duration" type="text" id="duration"
                                <?php displayValue($_POST, 'duration'); ?> /><br>
                            <?php displayError($errors, 'duration'); ?> 

                            <input class="button-input" name="activity" type="submit" value="Record Activity"></input>
                            <a href=""><input class="input" type="button" value="Cancel"></input></a>
                        </form>
                    </div>

                    <?php } else { ?>
                        <div class="success-message">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Yoga</strong>.
                        </div>
                        <div>
                            <a href=""><input class="input" type="button" value="More <?php echo $service['name']; ?>"></input></a>
                            <a href="myServices.php"><input class="input" type="button" value="Exit"></input></a>
                        </div>
                    <?php } ?>    
                <?php } ?>
            <?php } if($id === 2) { ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>
                    <div class="service-descrip"> Select the medium of meditation aid you wish to receive below, you can choose a video that will help your posture or an audio clip that
                        will calm your mind while you meditate.
                    </div>
                    <form class = "form" method="post">
                        <label class="label">Select a type of meditation to practice:</label> <br>
                        <div class = "radio-box">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div><input type="radio" id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                            <?php } ?> 
                        </div>
                        <input class="input" name="service" type="submit" value="Go"></input>
                        <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='error-display'>You must select a practice type.</div>
                        <?php } ?>
                    </form>

                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>
                    <div class="form">
                        <label class="type-label"><?php echo $serviceInstruction['service_type']; ?></label> <br>
                        <?php if($serviceInstruction['service_type'] === "Video") {?>
                            <video controls class = "tutorial">
                                <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                                Video tag is not supported in this browser.
                            </video>
                        <?php } else { ?>
                            <audio controls class = "tut-audio">
                                <source src="<?php echo $serviceInstruction['path']; ?>" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        <?php } ?>
                        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                            <label for = "duration"class="label">Duration:</label>
                            <input class="input center-box" name="duration" type="text" id="duration"
                                <?php displayValue($_POST, 'duration'); ?> /><br>
                            <?php displayError($errors, 'duration'); ?> 

                            <input class="button-input" name="activity" type="submit" value="Record Activity"></input>
                            <a href=""><input class="input" type="button" value="Cancel"></input></a>
                        </form>
                    </div>

                    <?php } else { ?>
                        <div class="success-message">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> meditation</strong>.
                        </div>
                        <div>
                            <a href=""><input class="input" type="button" value="More <?php echo $service['name']; ?>"></input></a>
                            <a href="myServices.php"><input class="input" type="button" value="Exit"></input></a>
                        </div>
                    <?php } ?>    
                <?php } ?>
            <?php } if($id === 3) { ?>    
                <?php if(!isset($_POST['type']) || !isset($_POST['amount'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>
                    <div class="service-descrip"> Select a type and amount of stretching below, depending on your selection, you will be presented with a video tutorial that will
                        help you perform your selection of stretching.
                    </div>
                    <form class = "form" method="post">

                        <label class="label">Select a type of stretching:</label> <br>
                        <div class = "radio-box">
                            <?php $amountArr = []; ?> 
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <?php $pos = stripos($t, " "); ?> 
                                <?php $t = substr($t, $pos+1); ?> <!-- takes the characters after the space. For example in  Medium Upper-body, only Upper-body is taken-->
                                <?php if (!in_array($t, $amountArr)) { ?> 
                                    <?php array_push($amountArr, $t);?> <!-- removes duplicates  -->
                                    <div><input type="radio" id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                                <?php } ?> 
                            <?php } ?> 
                        </div>

                        <label class="label">Select amount of stretching to perform:</label> <br>
                        <div class = "radio-box">
                            <?php $typeArr = []; ?>
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <?php $t = strtok($t,' '); ?> <!-- takes the characters before the space.-->
                                <?php if (!in_array($t, $typeArr)) { ?>
                                    <?php array_push($typeArr, $t);?>
                                    <div><input type="radio" id="<?php echo $t; ?>" name="amount" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                                <?php } ?> 
                            <?php } ?> 
                        </div>
                        <input class="input" name="service" type="submit" value="Go"></input>
                        <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='error-display'>You must select a type and amount of stretching.</div>
                        <?php } ?>
                    </form>
                <?php } else { ?>
                    <?php $combinedType = $_POST['amount'] . " " . $_POST['type']; ?> <!-- Concattenating the post values in order to get the video path from the database-->
                    <?php $serviceInstruction = getServiceInstruction($id, $combinedType); ?> 
                    <div class="form">
                        <label class="type-label"><?php echo $serviceInstruction['service_type']; ?> Stretching</label> <br>
                        <video controls class = "tutorial">
                            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                            Video tag is not supported in this browser.
                        </video>
                        <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                            <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>" />
                            <label for = "duration"class="label">Duration:</label>
                            <input class="input center-box" name="duration" type="text" id="duration"
                                <?php displayValue($_POST, 'duration'); ?> /><br>
                            <?php displayError($errors, 'duration'); ?> 

                            <input class="button-input" name="activity" type="submit" value="Record Activity"></input>
                            <a href=""><input class="input" type="button" value="Cancel"></input></a>
                        </form>
                    </div>

                    <?php } else { ?>
                        <div class="success-message">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $combinedType; ?> stretching</strong>.
                        </div>
                        <div>
                            <a href=""><input class="input" type="button" value="More <?php echo $service['name']; ?>"></input></a>
                            <a href="myServices.php"><input class="input" type="button" value="Exit"></input></a>
                        </div>
                    <?php } ?>    
                <?php } ?>
            <?php } if($id === 4) {?>

                <?php if (!empty(getPlanUser(getLoggedInUser()['email'])['email'])) { ?>
                    <?php if(!isset($_POST['delete-plan'])) { ?> <!-- removes the meals from the user_meal table, if the user chooses re-select. -->
                        <form method="post">
                            <div class='meal-instruction'> 
                                You have already selected a meal plan. Please press Re-select to select a different mean plan.<br>
                                <input class="input" name="delete-plan" type="submit" value="Re-select"></input>
                                <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                            </div>
                            
                        </form>
                    <?php } else{ ?>
                        <?php deleteUserPlan(getLoggedInUser()['email'])?> <!-- database function to delete the user's meal plan -->
                        <?php redirect('service.php?id=4'); ?>
                    <?php } ?>
                <?php } elseif(!isset($_POST['type']) || !isset($_POST['calories'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>
                    
                    <div class="service-descrip"> By selecting a diet type and calorie intake below we will present you with some healthy meal options. These meals are carefully selected to provide all essential
                        nutrients to live a healthy life!
                    </div>

                    <form class = "form" method="post">

                        <label class="label">Select a type of diet:</label> <br>
                        <div class = "radio-box">
                            <?php $dietArr = []; ?>
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <?php $t = strtok($t,' '); ?>
                                <?php if (!in_array($t, $dietArr)) { ?>
                                    <?php array_push($dietArr, $t);?>
                                    <div><input type="radio" id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                                <?php } ?> 
                            <?php } ?> 
                        </div>
                        <label class="label">Select your calorie intake per day:</label> <br>
                        <div class = "radio-box">
                            <?php $calorieArr = []; ?>
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <?php $pos = stripos($t, " "); ?>
                                <?php $t = substr($t, $pos+1); ?>
                                <?php if (!in_array($t, $calorieArr)) { ?> 
                                    <?php array_push($calorieArr, $t);?>
                                    <div><input type="radio" id="<?php echo $t; ?>" name="calories" value="<?php echo $t; ?>"></input><?php echo $t; ?></div> <br>
                                <?php } ?> 
                            <?php } ?> 
                        </div>
                        <input class="input" name="service" type="submit" value="Go"></input>
                        <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='error-display'>You must select a diet type and calorie intake.</div>
                        <?php } ?>
                    </form>
                <?php } else {?> 
                    <?php $email = getLoggedInUser()['email']; ?>
                    <?php $healthyCombinedType =  $_POST['type'] . " " . $_POST['calories']; ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $healthyCombinedType); ?>
                    <?php if ($serviceInstruction['service_type'] == "Vegetarian 1600kcal") { ?> <!-- if the chosen meal plan is equal to this selection -->
                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 
                                    <!-- If user confirms the meal plan, the meals of the meal plan are stored in the user_meal table (by calling the addmeal() function.) -->
                                    <?php
                                    addmeal($email, 27, 0, 'Breakfast');
                                    addmeal($email, 4, 1.25, 'Breakfast');

                                    addmeal($email, 28, 0, 'Lunch');
                                    addmeal($email, 6, 0, 'Lunch');

                                    addmeal($email, 29, 0, 'Dinner');
                                    addmeal($email, 30, 0, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>
                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of: <!-- meal plan for the selection-->
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 1600 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                           
                            <!-- Gets the meal information from the meal table and displays it as a meal plan beloe.-->
                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(27),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(27),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(27),'name')[0];?> - <?php echo array_column(getMeal(27),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(4),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(4),'name')[0];?>"> <!--1.25 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(4),'name')[0];?> (1.25 servings) - <?php echo (array_column(getMeal(4),'kilocalories')[0])*1.25;?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(28),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(28),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(28),'name')[0];?> - <?php echo array_column(getMeal(28),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(6),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(6),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(6),'name')[0];?> - <?php echo array_column(getMeal(6),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(29),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(29),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(29),'name')[0];?> - <?php echo array_column(getMeal(29),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(30),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(30),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(30),'name')[0];?> - <?php echo array_column(getMeal(30),'kilocalories')[0];?> kcal</span><br>
                            </div>
                        </div>
                    
                    <?php } if ($serviceInstruction['service_type'] == "Vegetarian 2000kcal") { ?>  

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 30, 0, 'Breakfast');
                                    addmeal($email, 32, 0, 'Breakfast');

                                    addmeal($email, 33, 0, 'Lunch');
                                    addmeal($email, 22, 0, 'Lunch');
                                    addmeal($email, 35, 0, 'Lunch');

                                    addmeal($email, 36, 0, 'Dinner');
                                    addmeal($email, 13, 2, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 2000 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(30),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(30),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(30),'name')[0];?> - <?php echo array_column(getMeal(30),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(32),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(32),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(32),'name')[0];?> - <?php echo array_column(getMeal(32),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(33),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(33),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(33),'name')[0];?> - <?php echo array_column(getMeal(33),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(22),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(22),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(22),'name')[0];?> - <?php echo array_column(getMeal(22),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(35),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(35),'name')[0];?>">
                                <span class = "item-descrip"><?php echo array_column(getMeal(35),'name')[0];?> - <?php echo array_column(getMeal(35),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(36),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(36),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(36),'name')[0];?> - <?php echo array_column(getMeal(36),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(13),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(13),'name')[0];?>"> <!--2 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(13),'name')[0];?> (2 servings) - <?php echo (array_column(getMeal(13),'kilocalories')[0])*2;?> kcal</span><br>
                            </div>
                        </div>
                    <?php } if ($serviceInstruction['service_type'] == "Vegetarian 2500kcal") { ?>    

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 37, 0, 'Breakfast');
                                    addmeal($email, 38, 0, 'Breakfast');

                                    addmeal($email, 39, 0, 'Lunch');
                                    addmeal($email, 40, 0, 'Lunch');
                                    addmeal($email, 4, 0, 'Lunch');

                                    addmeal($email, 41, 0, 'Dinner');
                                    addmeal($email, 13, 2, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 2500 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(37),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(37),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(37),'name')[0];?> - <?php echo array_column(getMeal(37),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(38),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(38),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(38),'name')[0];?> - <?php echo array_column(getMeal(38),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(39),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(39),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(39),'name')[0];?> - <?php echo array_column(getMeal(39),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(40),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(40),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(40),'name')[0];?> - <?php echo array_column(getMeal(40),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(4),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(4),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(4),'name')[0];?> - <?php echo array_column(getMeal(4),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(41),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(41),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(41),'name')[0];?> - <?php echo array_column(getMeal(41),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(13),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(13),'name')[0];?>"> <!--2 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(13),'name')[0];?> (2 servings) - <?php echo (array_column(getMeal(13),'kilocalories')[0])*2;?> kcal</span><br>
                            </div>
                        </div>
                    <?php } if ($serviceInstruction['service_type'] == "Vegetarian 3000kcal") { ?>  

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 42, 0, 'Breakfast');
                                    addmeal($email, 1, 1.5, 'Breakfast');
                                    addmeal($email, 26, 0, 'Breakfast');

                                    addmeal($email, 44, 0, 'Lunch');
                                    addmeal($email, 22, 0, 'Lunch');
                                    addmeal($email, 13, 2, 'Lunch');
                                    addmeal($email, 24, 0, 'Lunch');

                                    addmeal($email, 25, 0, 'Dinner');
                                    addmeal($email, 26, 0, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 3000 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(42),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(42),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(42),'name')[0];?> - <?php echo array_column(getMeal(42),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(1),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(1),'name')[0];?>"> <!--1.5 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(1),'name')[0];?> (1.5 servings) - <?php echo (array_column(getMeal(1),'kilocalories')[0])*1.5;?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(26),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(26),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(26),'name')[0];?> - <?php echo array_column(getMeal(26),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(44),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(44),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(44),'name')[0];?> - <?php echo array_column(getMeal(44),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(22),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(22),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(22),'name')[0];?> - <?php echo array_column(getMeal(22),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(13),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(13),'name')[0];?>"> <!--2 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(13),'name')[0];?> (2 servings) - <?php echo (array_column(getMeal(13),'kilocalories')[0])*2;?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(24),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(24),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(24),'name')[0];?> - <?php echo array_column(getMeal(24),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(25),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(25),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(25),'name')[0];?> - <?php echo array_column(getMeal(25),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(26),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(26),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(26),'name')[0];?> - <?php echo array_column(getMeal(26),'kilocalories')[0];?> kcal</span><br>
                            </div>
                        </div>    
                    <?php } if ($serviceInstruction['service_type'] == "Non-vegetarian 1600kcal") { ?>

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 1, 0, 'Breakfast');
                                    addmeal($email, 5, 0, 'Breakfast');
                                    addmeal($email, 6, 0, 'Breakfast');

                                    addmeal($email, 2, 0, 'Lunch');
                                    addmeal($email, 4, 0, 'Lunch');

                                    addmeal($email, 3, 0, 'Dinner');
                                    addmeal($email, 47, 0, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 1600 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(1),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(1),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(1),'name')[0];?> - <?php echo array_column(getMeal(1),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(5),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(5),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(5),'name')[0];?> - <?php echo array_column(getMeal(5),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(6),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(6),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(6),'name')[0];?> - <?php echo array_column(getMeal(6),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(2),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(2),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(2),'name')[0];?> - <?php echo array_column(getMeal(2),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(4),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(4),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(4),'name')[0];?> - <?php echo array_column(getMeal(4),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(3),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(3),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(3),'name')[0];?> - <?php echo array_column(getMeal(3),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(47),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(47),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(47),'name')[0];?> - <?php echo array_column(getMeal(47),'kilocalories')[0];?> kcal</span><br>
                            </div>
                        </div>
                    <?php } if ($serviceInstruction['service_type'] == "Non-vegetarian 2000kcal") { ?>

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 7, 0, 'Breakfast');
                                    addmeal($email, 10, 0, 'Breakfast');
                                    
                                    addmeal($email, 8, 0, 'Lunch');
                                    addmeal($email, 13, 0, 'Lunch');

                                    addmeal($email, 11, 0, 'Dinner');
                                    addmeal($email, 12, 0, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 2000 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(7),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(7),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(7),'name')[0];?> - <?php echo array_column(getMeal(7),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(10),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(10),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(10),'name')[0];?> - <?php echo array_column(getMeal(10),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(8),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(8),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(8),'name')[0];?> - <?php echo array_column(getMeal(8),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(13),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(13),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(13),'name')[0];?> - <?php echo array_column(getMeal(13),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(11),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(11),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(11),'name')[0];?> - <?php echo array_column(getMeal(11),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(12),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(12),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(12),'name')[0];?> - <?php echo array_column(getMeal(12),'kilocalories')[0];?> kcal</span><br>
                            </div>
                        </div>
                    <?php } if ($serviceInstruction['service_type'] == "Non-vegetarian 2500kcal") { ?>

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 14, 0, 'Breakfast');
                                    addmeal($email, 15, 0, 'Breakfast');
                                    addmeal($email, 16, 0, 'Breakfast');

                                    addmeal($email, 17, 0, 'Lunch');
                                    addmeal($email, 18, 0, 'Lunch');

                                    addmeal($email, 20, 0, 'Dinner');
                                    addmeal($email, 12, 1.5, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">

                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 2500 kcal </li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>

                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(14),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(14),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(14),'name')[0];?> - <?php echo array_column(getMeal(14),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(15),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(15),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(15),'name')[0];?> - <?php echo array_column(getMeal(15),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(16),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(16),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(16),'name')[0];?> - <?php echo array_column(getMeal(16),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(17),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(17),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(17),'name')[0];?> - <?php echo array_column(getMeal(17),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(18),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(18),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(18),'name')[0];?> - <?php echo array_column(getMeal(18),'kilocalories')[0];?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(20),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(20),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(20),'name')[0];?> - <?php echo array_column(getMeal(20),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(12),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(12),'name')[0];?>"> <!--1.5 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(12),'name')[0];?> (1.5 servings) - <?php echo (array_column(getMeal(12),'kilocalories')[0])*1.5;?> kcal</span><br>
                            </div>
                        </div>
                    <?php } if ($serviceInstruction['service_type'] == "Non-vegetarian 3000kcal") { ?>

                        <?php if (isset($_POST['confirm-meal'])){?>
                            <div class='meal-instruction'> 

                                    <?php
                                    addmeal($email, 21, 0, 'Breakfast');
                                    addmeal($email, 1, 1.25, 'Breakfast');
                                    addmeal($email, 22, 0, 'Breakfast');

                                    addmeal($email, 23, 0, 'Lunch');
                                    addmeal($email, 13, 2, 'Lunch');
                                    
                                    addmeal($email, 20, 0, 'Dinner');
                                    addmeal($email, 12, 0, 'Dinner');
                                    ?>

                                    Your personalised meal plan has been saved! <br>
                                    <a href="myServices.php"><input class="input" type="button" value="More Services"></input></a>

                                </div>
                        <?php } else {?>
                            <form method="post">
                                <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />
                                <input type="hidden" name="calories" value="<?php echo $_POST['calories']; ?>" />
                                <div class='meal-instruction'> 
                                    Please reveiew the meal plan selected for you below and confirm to save it. <br>
                                    <input class="input" name="confirm-meal" type="submit" value="Confirm"></input>
                                    <a href="myServices.php"><input class="input" type="button" value="Cancel"></input></a>
                                </div>
                            </form>  
                        <?php } ?>

                        <div class = "meal-card">
                            
                            <div class = "meal-header">
                                Your Meal plan consisting of:
                                <ul>
                                    <li>Diet: <?php echo $_POST['type'] ?> </li>
                                    <li>Approximate calories per day: 3000 kcal</li>
                                    <li>3 meals per day</li>
                                </ul>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Breakfast: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(21),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(21),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(21),'name')[0];?> - <?php echo array_column(getMeal(21),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(1),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(1),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(1),'name')[0];?> (1.25 servings) - <?php echo (array_column(getMeal(1),'kilocalories')[0])*1.25;?> kcal</span><br><!--1.25 servings-->
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(22),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(22),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(22),'name')[0];?> - <?php echo array_column(getMeal(22),'kilocalories')[0];?> kcal</span><br>
                            </div>
                                
                            <div class = "menu-item">
                                <div class='item-header'>Lunch: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(23),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(23),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(23),'name')[0];?> (2 servings) - <?php echo array_column(getMeal(23),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(13),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(13),'name')[0];?>"> <!--2 servings-->
                                <span class = "item-descrip"><?php echo array_column(getMeal(13),'name')[0];?> - <?php echo (array_column(getMeal(13),'kilocalories')[0])*2;?> kcal</span><br>
                            </div>
                            
                            <div class = "menu-item">
                                <div class='item-header'>Dinner: </div> <br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(20),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(20),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(20),'name')[0];?> - <?php echo array_column(getMeal(20),'kilocalories')[0];?> kcal</span><br>
                                <img class="menu-thumb" src="<?php echo array_column(getMeal(12),'image_path')[0];?>"  alt="<?php echo array_column(getMeal(12),'name')[0];?>"> 
                                <span class = "item-descrip"><?php echo array_column(getMeal(12),'name')[0];?> - <?php echo array_column(getMeal(12),'kilocalories')[0];?> kcal</span><br>
                            </div>
                        </div>
                    <?php } ?> 
                <?php } ?>          
            <?php } ?>          
        </content>
    </div>

    <?php require_once("includes/resources.php"); ?>
    <?php require_once('includes/footer.php'); ?>
</body>
</html>
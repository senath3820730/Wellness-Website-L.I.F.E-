<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/healthyhabits.css">
</head>

<body>
    <div class="wrapper">
        
        <?php require_once("includes/header.php"); ?>

        <?php if(isUserLoggedIn()) { ?>
            <?php require_once("includes/logged-in-navigation.php");?>
            <?php } else{?> 
                <?php require_once("includes/navigation.php");?>
            <?php } ?>

        <content class="box content">
                
            <div class = "content-head">
                <content class = "table-contents">
                    <h4>Contents</h4>
                    <ul class = "content-list">
                        <li><a class = "content-links" href = "#sec1">Live a healthy lifesyle</a></li><br>
                        <li><a class = "content-links" href = "#sec2">Meal Planner</a></li><br>
                    </ul>
                </content>

                <content class ="main-heading">
                    Healthy Habits
                </content>
            </div>

            <div class = "main-content">
                        

                <h2 id = "sec1">Live a healthy lifesyle </h2>
                <p>
                    We all want to live long healthy lives but it can be difficult to maintain a healthy life, while meeting the stressful demands 
                    in order to be successful. Therefore we can start by incorporating healthy habits into our lives, this means doing the things we 
                    usually do but chosing the more healthier options. Firstly, start doing some physical activity, just 30 minuties of exercise  per 
                    day for five days will help you control your weight, reduce blood pressure, reduce risk of heart disease and much more. These exercises
                    dont have to be intense, some stretching and a brisk walk for 30 minuties (done consistenly) can be life changing! 
                    <video controls class = "media-right"><source src="assets/videos/healthyhabits1.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                </p>
                <p>
                    Another very important way of living healthy is having a healthy diet. Incorporating the following foods to your diet 
                    can work wonders for your health:
                    <ul>
                        <li> Grain foods: foods in high fibre, mostly wholegrain.</li>
                        <li> Wide variety of vegetables: Low in calories and will provide you with many nutrients.</li>
                        <li> Fruits: Also low in calories and will help you stay protected against chronic diseases.</li>
                        <li> Water: Your body needs on average about 2.7 - 3.4 liters of water to stay hydrated.</li>
                    </ul>
                    If you have a hard time planning your meals or just dont have enough time, do not worry, our custom meal planner will do the job
                    for you. Check it out below to get a meal plan according to your calorie intake, type of diet and number of meals.
                </p> 
                <br>
                
            </div>
                
        </content>

        <?php require_once("includes/resources.php"); ?>

        <?php require_once("includes/footer.php"); ?>


    </div>
</body>

</html>
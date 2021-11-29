<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/yoga.css">
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
                        <li><a href = "#sec1">How does yoga work?</a></li><br>
                        <li><a href = "#sec2">The health benefits of yoga</a></li><br>
                        <li><a href = "#sec3">Yoga poses you need to know</a></li>
                    </ul>
                    
                </content>

                <content class ="main-heading">
                    Yoga
                </content>
            </div>

            <div class = "main-content">
                        
                    
                <h2 id = "sec1">How does yoga work? </h2>
                <p>
                    Yoga is a practice that has a history spanning over centuries. It combines breathing techniques, movement 
                    and meditation to increase physical as well as mental health.  There are various types of yoga an individual 
                    can chose from, depending on their goals.<br>
                    However all of these types of yoga involves three things:
                    <video controls class = "media-right"><source src="assets/videos/yoga-vid1.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                    <ul>
                        <li>concentration</li>
                        <li>deep breathing</li>
                        <li>physical poses</li>
                    </ul>
                </p>

                <p>
                    Start your journey in practicing yoga with five minuties and five poses, there is no such thing as minimum duration
                    so concenrate on every breath. It is crutial to make sure that you are not doing any complex poses as a beginner, hence
                    start off with some basic poses (we will cover these poses below). 
                </p>

                <p>
                    Everyone starts somewhere, so be aware of the poses
                    while you practice, it is important that the positions that you put your body in are safe, therefore dont hesitate to 
                    pause a video instruction or a look twice at a demonstration. The great thing about yoga is that you do not need any more 
                    equipment than a yoga mat (even a cheap exercise matt would work). Learning yoga in real life classes is not much different
                    to learning online for free, so you can have all the benifits at no cost!
                </p>

                <h2 id ="sec2">The health benefits of yoga</h2>    
                <p>
                    As stated above practicing yoga has numerous health benifits both physically and mentally. These are some of the many benifits:
                    <img src="assets/images/yoga-pic1.jpg" width= "430" height="260"alt="A woman practicing yoga." class = "media-right">
                    <ul>
                        <li> Practicing Yoga can uplift your mood and provide you with more energy. </li>
                        <li> Scientific research confirms yoga can give cardiovascular benifits and lower cholesterol levels. </li>
                        <li> Practicing Yoga helps you sleep better. </li>
                        <li> Yoga helps in alleviating stress. </li>
                        <li> As yoga involves basic stretching it provides relief for back pain.</li>
                        <li> Johns Hopkins university has published studies that show yoga eases arthritis.</li>
                        <li> Practicing yoga can help getting rid of balance issues. </li>
                        <li> Deep breathing combined with steady movements increase bloodflow to muscles.</li>
                        <li> The common practice of holding a pose in yoga develops strength. </li>

                    </ul>
                </p>

                <h2 id = "sec3">Yoga poses you need to know</h2> 
                <p>
                    These are some basics poses that you can learn more about and practice everyday, each one has their own unique benifit.
                    <dl>
                        <dt>Cat Pose </dt>
                        <dd> This pose involves being in a "tabletop" position  with your hands and knees on the ground. This pose is beneficial to the spine</dd>

                        <video controls class = "media-right"><source src="assets/videos/yoga-vid2.mp4" type="video/mp4">
                            Video tag is not supported in this browser.
                        </video>

                        <dt>Boat Pose</dt>
                        <dd> 
                            This pose is done by sitting and lifting your thighs, while stretching your hands towards your feet. This pose is 
                            beneficial to the abdominal muscles.
                        </dd>

                        <dt>Camel Pose </dt>
                        <dd> Get down on your knees and reach for your heels while arching your back backwards. This pose is beneficial for the lower back.</dd>
                        
                        <dt>Bridge Pose </dt>
                        <dd> 
                            This pose is done by lying on your back and lifting your glutes, while stretching your hands towards your feet. 
                            This pose is an energizing one, practicing it in the morning can be beneficial.
                        </dd>

                        <dt>Child's Pose</dt>
                        <dd> 
                            This pose is done by sitting on your knees and stretching your hands outwards while keeping them on the ground. 
                            This pose is a more restful one, it can be done at the start of your yoga sessions.
                        </dd>

                        <dt>Cobra Pose </dt>
                        <dd> 
                            Lie down on your stomach and keep your hands under your shoulders and push youself up, while keeping your hips and legs grounded.
                            This pose relieves lower back pain.
                        </dd>

                        <dt>Cow Pose </dt>
                        <dd> 
                            This is simillar to the cat pose, the only difference is arching your back forwards(stomach towards the ground).
                            This is a very gentle and convenient way to warm up the spine.
                        </dd>
                    </dl>
                </p>
                   
            </div>
                
        </content>

        <?php require_once("includes/resources.php"); ?>

        <?php require_once("includes/footer.php"); ?>
    </div>
</body>

</html>



<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/slick/slick.css"/> <!-- links the jquery stylesheets and scripts of slick for the carousel -->
    <link rel="stylesheet" type="text/css" href="plugins/slick/slick-theme.css"/>
    <script type="text/javascript" src="plugins/slick/slick.min.js"></script>
    <script src = "scripts/carousel.js"></script>
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

                <div class="carousel">
                    <div><img class = "slide" src="assets/images/yogaslide.png" ></div>
                    <div><img class = "slide" src="assets/images/meditationslide.png" ></div>
                    <div><img class = "slide" src="assets/images/stretchingslide.png" ></div>
                    <div><img class = "slide" src="assets/images/healthyslide.png" ></div>
                </div>

                <a href="yoga.php">
                <content class = "sub yoga"> 
                    <img src="assets/images/yogathumb.jpg"  alt="a picture of a woman doing yoga" class = "thumbImg"> 
                    <p class=description>
                        Roll out a matt and let us get started! Yoga will help you improve
                        your, strength, balance and flexibility, it also helps you relax and sleep better. Age is not a
                        factor when it comes to yoga, it is a proven practice of calming the mind and strengthening the body.
                        Discover various health benifits and learn some of the basic yoga poses today!
                    </p>
                </content><br>
                </a>
                <a href="meditation.php">
                <content class = "sub meditation"> 
                    <img src="assets/images/meditationthumb.jpg"  alt="a picture of two people meditating" class = "thumbImg">
                    <p class=description>
                        Bring yourself back to the present moment by Meditating. This simple 
                        practice can be done anywhere and it can help you improve your mental health in many ways, 
                        such as sharpening your focus and  reducing anxiety. Discover ways to increase concentration 
                        and stress less by following these simple meditation tips today!
                    </p>
                </content><br>
                </a>
                <a href="stretching.php">
                <content class = "sub stretching"> 
                    <img src="assets/images/stretchingthumb.jpg"  alt="a picture of a lady stretching" class = "thumbImg">
                    <p class=description>
                        Attain an ideal posture and reduce body aches by stretching! Stretching 
                        takes little time but gives numerous benifits, not only does it increase your range of motion
                        but it also improves your performance in physical activities. Discover ways to heal your body by 
                        stretching and follow these stretching techniques today!
                    </p>
                </content><br>
                </a>
                <a href="healthyhabits.php">
                <content class = "sub healthyhabits"> 
                    <img src="assets/images/healthythumb.jpg"  alt="a picture of a lady stretching" class = "thumbImg">
                    <p class=description>
                        Live a longer life by following some healthy habits. Nutrition is one of the keys to living a
                        healthy life and our meal planner will help you organize some healthy meals specifically for you!
                    </p>
                </content><br>
                </a>
            </content>

            <?php require_once("includes/resources.php"); ?>

            <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
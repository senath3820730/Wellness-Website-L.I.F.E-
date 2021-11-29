<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/stretching.css">
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
                        <li><a class = "content-links" href = "#sec1">Why you should stretch</a></li><br>
                        <li><a class = "content-links" href = "#sec2">Benefits of Stretching </a></li><br>
                        <li><a class = "content-links" href = "#sec3">Stretching techniques and tips</a></li><br>
                    </ul>
                </content>

                <content class ="main-heading">
                    Stretching
                </content>
            </div>

            <div class = "main-content">
                        

                <h2 id = "sec1">Why you should stretch </h2>
                <p>
                    Many people think that stretching needs to be performed by athletes and people who workout, this is not true. Stretching
                    needs to be performed by everyone daily, it is what increases the mobility of our muscles and prepares your muscles to handle 
                    strain. It is very important to maintain flexibility in order to keep joints in a healthy range of motion. Tight
                    muscles are experienced very commonly as people tend to stay still for prolonged periods, which can damage muscles when they
                    are used for a strenous activity.
                </p>

                <p>
                    <video controls class = "media-left"><source src="assets/videos/stretching1.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                    
                    Stretching takes very little time out of your day. You should stretch areas of your body that are citical for mobility:
                    <dl>
                        <dt> Lower Body </dt>
                        <dd> The hamstrings, quadriceps, hip flexors and front thighs.</dd>
                        <dt> Upper body  </dt>
                        <dd> The lower back, shoulders, neck and both biceps and triceps. </dd>
                    </dl> 
                </p>
        
                <p>
                    Stretching needs to be done over a period of time constantly to yield great results. If you are just about to start 
                    stretching after a long period of being relatively inactive, it is important that you should not attempt complex stretching
                    but rarher perform a common simple stretching routine, which overtime makes you more flexible and lets you move into complex
                    stretching techniques. Once you have stretched consistenly for a certain period of time, the body experiences a much better range 
                    of motion and prepares the muscles for strain in your daily activities. Find out more benifits of stretching in the 
                    <a href = "#sec2">Benefits of Stretching </a> section below.
                </p>
                

                <h2 id ="sec2">Benefits of Stretching</h2>    
                <img src="assets/images/stretching-pic1.jpg" width= "430" height="260"alt="A woman practicing meditation." class = "media-right">
                <p>
                    
                    <ul>
                        <li> Increases your joint range of motion to help you move them through their full range. </li>
                        <li> Stretching will help increase performance in physical activities.</li>
                        <li> Practicing stretching will make your muscles work most effectively. </li>
                        <li> Stretching will decrease the chances of injuring yourself, while performing physical activities.</li>
                        <li> A visible benifit of stretching is that it improves your posture overtime, while strengthening the back and shoulder muscles.</li>
                        <li> Stretching can help you relieve pain and discomfort that you experience in certain muscles of your body.</li>
                        <li> Muscle stamina increases by stretching adequately, as stretching your muscles daily helps them grow stronger. </li>
                        <li> Practicing stretching decreases stress, as stress can be felt in different parts of the body and stretching these areas are likely 
                            to bring you physical and mental relief.</li>
                        <li> Performing basic stretching techniques increases energy levels, when you are feeling lazy.</li>
                        <li> Stretching enhances muscular relaxation, by enabling the circulation of oxygen and essential nutrients. </li>
                        <li> Many basic stretching routines and techniques are widely available for free in the internet.</li>
                    </ul>
                </p>

                <h2 id = "sec3">Stretching techniques and tips</h2> 
                Below are some basic stretching techniques followed by some tips to get you started:
                <p> 
                    <h3>The Tricep Stretch:</h3>
                    Bring your elbow behind your ear and with your opposite hand apply pressure to your elbow, you will feel a stretching sensation in your tricep.
                    Hold this position for upto 30 seconds on each arm.

                    <h3>The Shoulder Stretch: </h3>
                    <video controls class = "media-right"><source src="assets/videos/stretching2.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                    Bring your arm across your chest and hold it in this position with the elbow of your opposite, you will feel a stretching sensation in your shoulder.
                    Do this stretch with your back straight (standing up is better), repeat for the other arm and hold it for 30 seconds.

                    <h3>The Neck Stretches: </h3>
                    Bend your neck down towards your shoulder and hold for 30 seconds, do this for each side (front, back, left and right). Next, roll your head slowly in circles 
                    for 5 - 10 repetitions, then roll the opposite way. This stretch can be done sitting or standing.

                    <h3>The Hamstring Stretch:</h3>
                    Sit on the floor and extend your legs, stretch your hands towards your feet, while moving your toes inward. hold this position for both legs for upto 30
                    seconds. Do not worry if you cannot touch your feet with your fingers, just stretch as far as you are able to and you will feel your hamstrings stretch.

                    <h3>The Quad Stretch:</h3>
                    You need to be standing upright for this stretch, reach back and hold your foot with your hand of the same side, hold this position for 30 seconds and 
                    repeat the same for the other leg. Keep your feet hip-width apart for this stretch to have good balance.
                </p>
                
            </div>
                
        </content>

        <?php require_once("includes/resources.php"); ?>

        <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
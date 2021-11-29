<?php require_once('includes/functions.php'); ?>
<!doctype html>
<html>

<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/meditation.css">
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
                        <li><a class = "content-links" href = "#sec1">What is meditation?</a></li><br>
                        <li><a class = "content-links" href = "#sec2">Impact of Meditation </a></li><br>
                        <li><a class = "content-links" href = "#sec3">How to Meditate, With Tips</a></li><br>
                    </ul>
                </content>

                <content class ="main-heading">
                    Meditation
                </content>
            </div>

            <div class = "main-content">
                        
                    
                <h2 id = "sec1">What is meditation? </h2>
                <p>
                    Meditation is a practice that stemmed from India a few thousand years ago. This practice was quickly adopted by 
                    many releigons. Meditation is done by concentrating on your environment and focusing your thoughts into the present,
                    not allowing the mind to go astray. The reason this technique has stood the test of time and is widely used around 
                    the globe is due to the fact that it is scientifically proven to increase your attention span and increase awareness.<br>
                    The three most important components to practice Meditation:
                    <ul>
                        <li>Using a solidified technique</li>
                        <li>logic relaxation</li>
                        <li>Self-generated mental state</li>
                    </ul>
                </p>

                <p>
                    <video controls class = "media-left"><source src="assets/videos/meditation1.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                    In Buddhism, it is stated that two very important mental qualities are developed by way of meditation. 
                    They are:
                    <dl>
                        <dt> Tranquility (Pali: samantha) </dt>
                        <dd> Mind-calmness is achieved to steady, compose and focus the mind.</dd>
                        <dt> Insight (Pali: vipassana)  </dt>
                        <dd> This quality is achieved to gain insight into the true nature of reality. </dd>
                    </dl>
                </p>

                <p>
                    A study conducted in 2014 showed that meditation causes the reduction of anxiety and depression, if practiced frequently 
                    for two to six months. The average human brain emits gamma waves, whenever we reach high levels of cognitive functioning and 
                    concentration. Neuroscientists have linked that individuals that are exceptionally intelligent, happy and have high memory 
                    capacity produce high levels of gamma brain-waves. An experiment was done in 2002 with a Tibetan monk, on the amount of gamma 
                    waves emitted while in a meditative state, the results were astonishing! Gamma waves were radiating from the monk's brain for 
                    the whole duration of the practice, the brain-waves were about 800 times stronger than the average human can produce, showing 
                    undiscovered levels of concentration and cognitive ability.  
                </p>
                <h2 id ="sec2">Impact of Meditation</h2>    
                <img src="assets/images/meditation-pic1.jpg" width= "430" height="260"alt="A woman practicing meditation." class = "media-right">
                <p>
                    There are numerous scientifically proven impacts on practicing meditaion, here are some of the few:
                    <ul>
                        <li> Practicing Meditation helps you to develop a stronger understanding of yourself. </li>
                        <li> Meditation is the equivalent to weightlifting, for your attention span.</li>
                        <li> It also helps the mind calm down over time, increasing positive feelings, which generates kindness. </li>
                        <li> The reason Meditation is practiced by many people is that it reduces the secretion of the 'stress hormone', known as cortisol.</li>
                        <li> Studies show that meditation reduce the symptoms of depression, as fewer negative thoughts are experienced.</li>
                        <li> Practicing meditaion can reduce anxiety by decreasing stress levels.</li>
                        <li> Meditation helps control pain, as ones perception of pain is connected to their state of mind.</li>
                        <li> There are many different defined forms of meditation that dont need equipment or special space, it can be done anywhere.</li>
                        <li> Schools can implement this practice, to give meditation breaks for kids, as it reduces additional trauma.</li>
                        <li>  Meditation helps with addiction, mindfulness based meditation helps people disconnect the sense of craving from substance abuse.</li>
                        <li> Support for practicing meditation is available for free in the internet.</li>
                    </ul>
                </p>

                <h2 id = "sec3">How to Meditate, With Tips</h2> 
                <p> 
                    <h3>Create a schedule:</h3>
                    Having a fixed time for meditation, can train your brain to dial in to the relaxing part of the day, This will help you 
                    to reach a meditative state rather quickly. However, any time of the day is a good time to meditate so do not worry if your day schedule is not
                    at a fixed time.

                    <h3>Have a space for meditation:</h3>
                    <video controls class = "media-right"><source src="assets/videos/meditation2.mp4" type="video/mp4">
                        Video tag is not supported in this browser.
                    </video>
                    When you first start meditating, it is beneficial to be in a peaceful environment. The definition of a comfortable environment differs from 
                    person to person. Therefore, make your meditaive space your own, whether it be lighting a candle or sitting on your favourite cushion. With 
                    higher meditation hours you will be able to reach a meditaive state regardless of your environment.

                    <h3>Get Settled: </h3>
                    Sit on your chair, cushion, bed or whichever comfortable position you prefer. Make sure to have your back straight and relax every other part of 
                    your body.

                    <h3>Pay attention to your breathing:</h3>
                    This helps you focus your thoughts into a single thing, concentrate on your nostrils as you slowly breathe, feel your breath enter and 
                    leave your nose.

                    <h3>The 'monkey mind' is normal:</h3>
                    If you are struggling with focusing your thoughts, don't worry, let it happen. Meditation is not about forcing yourself into concentration, hence
                    the more you practice the less your mind will wander and you will gain a stronger meditative state. 
                </p>
                
            </div>
                
        </content>

        <?php require_once("includes/resources.php"); ?>

        <?php require_once("includes/footer.php"); ?>

    </div>
</body>

</html>
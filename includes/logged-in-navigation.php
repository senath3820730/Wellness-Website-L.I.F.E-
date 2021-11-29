<nav class="box navbar">
    <ul id = "navs"><!-- The navigation bar for logged in users-->
        <li class = "align nav-element"><a class="nav-button" href="index.php">Home</a></li>
        <li class = "align nav-element"><a class="nav-button" href="yoga.php">Yoga</a></li>
        <li class = "align nav-element"><a class="nav-button" href="meditation.php">Meditation</a></li>
        <li class = "align nav-element"><a class="nav-button" href="stretching.php">Stretching</a></li>
        <li class = "align nav-element"><a class="nav-button" href="healthyhabits.php">Healthy Habits</a></li>
        <li class = "align nav-element"><a class="nav-button" href="contact-us.php">Contact Us</a></li>
        <li class = "align"><a class="reg-log" href="myServices.php">My Services</a></li>
        <li class = "align"><a class="reg-log" href="logout.php">Logout</a></li>
        <li class = "align" id = "user-nav-element"><img id= "nav-img" src="assets/images/user-profile.png" height="30"> Hello, <?= getLoggedInUser()['first_name']; ?>!</li>
    </ul>
</nav>
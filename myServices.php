<?php require_once('includes/authorise.php'); ?>
<?php $services = getServices(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>L.I.F.E</title>
    <meta name="keywords" content="L.I.F.E, your virtual wellness centre">
    <meta name="author" content="Senath Helitha Lokumannage">
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/MyServices.css">
</head>

<body>
    <div class="wrapper">
        
        <?php require_once("includes/header.php"); ?>

        <?php require_once("includes/logged-in-navigation.php"); ?>

        <content class="box content">
                
            <div class = "content-head">

                <content class ="main-heading">
                    My Services
                </content>
            </div>

            <div class='greeting-head'>
                <h2>Greetings <?= getLoggedInUser()['first_name']; ?>, welcome to your own services page!</h2>
                <h3>Select from our host of services</h3>
            </div>
            <?php foreach($services as $service) { ?>
                <a href="service.php?id=<?php echo $service['service_id']; ?>" class = "service-icon"><img src="<?php echo $service['image_path']; ?>" width = "180" height="200"><div class = "icon-name"><?php echo $service['name']; ?></div></a>
            <?php } ?>    

        </content>

        <?php require_once("includes/resources.php"); ?>

        <?php require_once("includes/footer.php"); ?>

    </div>
</body>
</html>

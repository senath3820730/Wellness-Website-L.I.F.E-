<?php 

require_once('../includes/functions.php');
$users = getUsers();

const API_KEY = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; 
$url= "api.openweathermap.org/data/2.5/weather?id=2158177&units=metric&appid=" . API_KEY;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
        
            
    $response = curl_exec($ch);
        
    $data = json_decode($response, true);

    $weather = $data['weather'][0]['main'];
    $temperature = round($data['main']['temp']);
    // depending on the weather information retreived a message is written
    if ($weather == "Thunderstorm") {
        $message = "There seems to be a thunderstorm outside";
    }
    elseif ($weather == "Drizzle") {
        $message = "You may need to carry an umbrella for the drizzle outside";
    }
    elseif ($weather == "Rain") {
        $message = "You may need to carry an umbrella for the rain outside";
    }
    elseif ($weather == "Snow") {
        $message = "You may need to wear a jacket as it is snowing outside.";
    }
    elseif ($weather == "Clear") {
        $message = "The weather is clear today";
    }
    elseif ($weather == "Clouds") {
        $message = "It seems to be cloudy outside";
    }
    elseif ($weather == "Mist") {
        $message = "It seems to be misty outside";
    }
    elseif ($weather == "Haze") {
        $message = "There seems to be a haze outside";
    }
    elseif ($weather == "Fog") {
        $message = "It seems to be foggy outside";
    }
    else {
        $message = "Weather conditions are not suitable for commuting";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>

    <script>
    
        function searchServices() {
            const service = $("#service").val();
            $.get("../search/search-services.php", { service }).done(function (data) {
                
                $("#services").html(data);
            });
        }

        $(document).ready(function () {
            
            searchServices();

            $("#search").submit(function (e) {
                e.preventDefault();

                searchServices();
            });
        });
    </script>
    <title>Administrator Portal</title>
</head>

<body>
 
    


	<div class="page-header">
		<h1 class = "mx-auto text-center font-weight-normal">ADMIN PORTAL </h1>
        <div class = "p-2" style = "background-color: #6497b1;"> 
            <h2>Welcome, administrator.</h2>
            <h3 class = "font-weight-light"><?php echo $message?> (<?php echo $temperature?>&#176;C).</h3>
        </div>
	</div>

    <div class="container">
        <div class = "mt-2 mb-2 p-2 rounded-lg" style = "background-color: #c2deee;">
            <h4 class = "font-weight-light"> Select a user below to view their statistics:</h4>
    
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "background-color: #6497b1; color: black;">
                    Users
                </button>
                <form method="post">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach($users as $user) { ?>
                            <button class="dropdown-item" name = "user-button" type="submit" value="<?php echo $user['first_name'].' '.$user['last_name'] ?>"> <?php echo $user['first_name'] . " " . $user['last_name'] . " <span style='color:grey;'>|</span> " . $user['email']; ?> </button>
                        <?php } ?>
                    </div>
                </form>
            </div>
            
            <?php if (isset($_POST['user-button'])) {?> 
                <form id="search">
                    <div class="form-group row mt-2">
                        <div class="col-md-4">
                            <label for="service" class="control-label font-weight-bold">Search services for <?php echo $_POST['user-button']?>.</label>
                            <input id="service" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Search" />
                    </div>
                </form>
                <div id="services"></div>
            <?php } ?>                   
        </div>

        <!-- Code referenced in README.txt --> 
        <hr>
        <footer>
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright &copy; 2021 Senath Lokumannage</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="#" class="text-dark">Terms of Use</a>
                    <span class="text-muted mx-2">|</span>
                    <a href="#" class="text-dark">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
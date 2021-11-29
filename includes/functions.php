<?php


// Code referenced in README.txt
require_once('database-functions.php');

const USER_SESSION_KEY = 'user';

session_start();


function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class = 'error-display'>{$errors[$name]}</div>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function displayChecked($form, $name, $value) {
    if(isset($form[$name]) && $form[$name] === $value)
        echo 'checked';
}

function redirect($location) {
    header("Location: $location");
    exit();
}

function trimArray(&$array, $exclude = []) {
    foreach($array as $key => &$value) {
        if(is_string($value) && !in_array($key, $exclude))
            $value = trim($value);
    }
}

function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';

    $key = 'password';
    if(!isset($form[$key]) || strlen($form[$key]) < 6)
        $errors[$key] = 'Password is required and must contain at least 6 characters.';

    if(count($errors) === 0) {
        $user = getUser($form['email']);

        if($user !== false && $form['password'] === $user['password'])
           
            $_SESSION[USER_SESSION_KEY] = $user;
        else
            $errors[$key] = 'Login failed, email and / or password incorrect. Please try again.';
    }

    return $errors;
}

function logoutUser() {
    session_unset();
}

function registerUser($form) {
    $errors = [];

    $key = 'first-name';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'First name is required.';
    if (!ctype_alpha(trim($form[$key]))) 
    $errors[$key] = 'First name is invalid.';

    $key = 'last-name';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'Last name is required.';
    if (!ctype_alpha(trim($form[$key]))) 
        $errors[$key] = 'Last name is invalid.';

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';
    else if(getUser($form[$key]) !== false)
        $errors[$key] = 'Email is already registered.';

    $key = 'confirm-email';
    if(isset($form['email']) && (!isset($form[$key]) || $form['email'] !== $form[$key]))
        $errors[$key] = 'Email does not match.';

    $key = 'phone-number';
    if(!isset($form[$key]) || preg_match('/^\+61 4\d{2} \d{3} \d{3}$/', $form[$key]) !== 1)
        $errors[$key] = 'Phone number is invalid. Must be in the format: +61 4xx xxx xxx';

    $key = 'age';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 16, 'max_range' => 120]]) === false)
        $errors[$key] = 'Minimum age is 16.';

    $key = 'student';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select student status.';

    $key = 'employment';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select employment status.';
    
    $key = 'password';
    if(!isset($form[$key]) ||  preg_match('/^[A-Z](?=.*(-|_)).{6,}[0-9]$/', $form[$key]) !== 1)
        $errors[$key] = 'Password is required and must contain at least 8 characters.';
    
    $key = 'confirm-password';
    if(isset($form['password']) && (!isset($form[$key]) || $form['password'] !== $form[$key]))
        $errors[$key] = 'Passwords do not match.';

    if(count($errors) === 0) {
        $user = [
            'firstname' => htmlspecialchars(trim($form['first-name'])),
            'lastname' => htmlspecialchars(trim($form['last-name'])),
            'email' => trim($form['email']),
            'phone' => htmlspecialchars(trim($form['phone-number'])),
            'age' => filter_var($form['age'], FILTER_VALIDATE_INT),
            'student_status' => (int) filter_var($form['student'], FILTER_VALIDATE_BOOLEAN),
            'employment_status' => (int) filter_var($form['employment'], FILTER_VALIDATE_BOOLEAN),
            'password' => $form['password']
        ];

        insertUser($user);

        loginUser([
            'email' => $user['email'],
            'password' => $form['password']
        ]);
    }

    return $errors;
}

function recordActivity($email, $serviceID, $form) {
    $errors = [];

    $key = 'duration';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 480]]) === false)
        $errors[$key] = 'Duration must be a whole number and not be less than 1 or greater than 480.';
    
    if ($serviceID == 3) {
        $type = $form['amount'] . " " .$form['type'];
    }else{
        $type = $form['type'];
    }

    if(count($errors) === 0) {
        $activity = [
            'email' => $email,
            'service_id' => $serviceID,
            'service_type' => $type,
            'duration_minutes' => filter_var($form['duration'], FILTER_VALIDATE_INT)
        ];

        insertActivity($activity);
    }

    return $errors;
}

//adds user's meal to the user_meal table in the database
function addmeal($email, $mealID, $servings, $mealTime) {
    $meal = [
        'email' => $email,
        'meal_id' => $mealID,
        'servings' => $servings,
        'meal_time' => $mealTime
    ];

    insertMeal($meal);
}

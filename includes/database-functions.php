<?php

// Constants.
const SERVER_NAME = 'rmit.australiaeast.cloudapp.azure.com';
const DB_NAME = 'XXXXXXXXXX';
const USERNAME = DB_NAME;
const PASSWORD = 'XXXXXXXX';

const DNS = 'mysql:host=' . SERVER_NAME . ';dbname=' . DB_NAME;

function createConnection() {
    return new PDO(DNS, USERNAME, PASSWORD);
}

function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}

function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getUsers() {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user');

    $statement->execute();

    return $statement->fetchAll();
}

function getUser($email) {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user where email = :email');

    $statement->execute(['email' => $email]);

    return $statement->fetch();
}

function getPlanUser($email) {
    $pdo = createConnection();
    $statement = $pdo->prepare('select * from user_meal where email = :email');

    $statement->execute(['email' => $email]);

    return $statement->fetch();
}

function deleteUserPlan($email) {
    $pdo = createConnection();

    $statement = $pdo->prepare('delete from user_meal where email = :email');

    return $statement->execute(['email' => $email]);
}

function insertUser($user) {
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user
        (email, password, first_name, last_name, phone, age, is_student, is_employed) values
        (:email, :password, :firstname, :lastname, :phone, :age, :student_status, :employment_status)');

    return $statement->execute($user);
}

function insertMeal($meal) {
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user_meal
        (email, meal_id, servings, meal_time) values
        (:email, :meal_id, :servings, :meal_time)');

    return $statement->execute($meal);
}

function getServices() {
    return prepareExecuteAndFetchAll('select * from service');
}

function getService($id) {
    return prepareExecuteAndFetch('select * from service where service_id = :id', ['id' => $id]);
}

function getMeal($id) {
    return prepareExecuteAndFetchAll('select * from meal where meal_id = :id', ['id' => $id]);
}

function getServiceInstructions($id) {
    return prepareExecuteAndFetchAll('select * from service_instruction where service_id = :id', ['id' => $id]);
}

function getServiceInstruction($id, $type) {
    return prepareExecuteAndFetch(
        'select * from service_instruction where service_id = :id and service_type = :type',
        ['id' => $id, 'type' => $type]);
}

function insertActivity($activity) {
    return prepareAndExecute(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, now(), :duration_minutes)', $activity);
}

function getSearchServices($name = null) {
    if(empty($name))
        return prepareExecuteAndFetchAll('select * from service');

    return prepareExecuteAndFetchAll(
        'select * from service where name like concat(\'%\', :name, \'%\')', ['name' => $name]);
}



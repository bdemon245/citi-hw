<?php
session_start();
if (isset($_POST["submit"])) {
    $errors = [];
    $email = $_POST['email'];
    $pass =  $_POST['pass'];
    $cfPass =  $_POST['cf-pass'];
    $robot = $_POST['ck-human'];
    //pushing items into error array
    //email error
    $errors['email']['invalid'] = stripos($_POST['email'], '@') <= 0 || stripos($_POST['email'], '.com') <= 0 ?  "<span style=\"color: #a81212;\">Invalid Email</span>" : null;

    //password errors
    $errors['pass']['short'] = strlen($pass) < 8 ? "<span style=\"color: #a81212;\">Password must be 8 characters or long</span><br>" : null;
    $errors['cf-pass']['short'] = strlen($cfPass) < 8 ? "<span style=\"color: #a81212;\">Password must be 8 characters or long</span>" : null;
    $errors['pass']['unmatch'] = $pass != $cfPass ? "<span style=\"color: #a81212;\">Password didn't match</span>" : null;
    //error for human verifiation
    $errors['robot'] = isset($robot) ? "<span style=\"color: #a81212;\">Robots are not allowed</span>" : null;

    $_SESSION['errors'] = $errors;
    $foundErrors =
        (isset($errors['pass']['unmatch'])) ||
        (isset($errors['pass']['short'])) ||
        (isset($errors['email']['invalid'])) ||
        (isset($errors['robot']));

    if ($foundErrors) {
        $_SESSION['cachedData'] = $_POST;
        header("Location: ../index.php");
    }
    if (!$foundErrors) {
        $_SESSION['data'] = $_POST;
        header("Location: ../include/connection.php");
    }
} else {
    echo "submit data first";
}

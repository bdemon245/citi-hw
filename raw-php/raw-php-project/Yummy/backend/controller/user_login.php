<?php
session_start();
include_once  "../inc/env.php";
$request = $_POST;
if ($request['login'] === "submitted") {
    # code...
    $email = $request['email'];
    $password = $request['password'];
    $save_login = isset($request['save_login']);

    $errors = [];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email_invalid'] =  "Please enter a valid email";

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    $user = mysqli_num_rows($result) > 0;
    $login = password_verify($password, $data['password']);

    if (!$user) {
        $_SESSION['login_error'] = "No Users found!";
        header("location: ../login.php");
    } else if (!$login) {
        $_SESSION['login_error'] = "Password is incorrect!";
        header("location: ../login.php");
    } else {
        header("location: ../dashboard.php");
        $_SESSION["success"] = "Log in successfull🎉";
        $_SESSION["first_name"] = $data['first_name'];
        $_SESSION["last_name"] = $data['last_name'];
        $_SESSION['auth'] = $login;
    }
}

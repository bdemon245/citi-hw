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


    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $id = $data['id'];
        $is_verified = password_verify($password, $data['password']);

        if ($is_verified) {
            header("location: ../dashboard.php");
            $_SESSION["success"] = "Logged in successfully!🎉";
            $_SESSION["first_name"] = $data['first_name'];
            $_SESSION["last_name"] = $data['last_name'];
            $_SESSION['auth'] = $is_verified;
        } else {
            $_SESSION['incorrect_password'] = "Some peanuts 🥜 might be helpful.";
            header("location: ../login.php");
        }
    } else {
        $_SESSION['user_not_found'] = "Who are you?😑";
        header("location: ../login.php");
    }
}

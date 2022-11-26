<?php
session_start();
include_once  "../inc/env.php";
$request = $_POST;
if ($request['submit'] == "submitted") {
    $fname = $request['fname'];
    $lname = $request['lname'];
    $email = $request['email'];
    $password = $request['password'];
    $rp_password = $request['rp_password'];

    $errors = [];
    foreach ($request as $key => $value) {
        # code...
        if (empty($value))
            $errors[$key] = "This feild is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email_invalid'] =  "Please enter a valid email";

    if ($password === $rp_password)
        $hidden_pass = password_hash($password, PASSWORD_BCRYPT);
    else
        $errors['password_unmatch'] = "Password didn't match";



    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("location: ../register.php");
    } else {
        $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$hidden_pass')";

        $store = mysqli_query($conn, $query);

        if ($store) {
            # code...
            $query = "SELECT * FROM users WHERE email = '$email' ";
            $result  = mysqli_query($conn, $query);

            $data = mysqli_fetch_assoc($result);
            $_SESSION['success'] = "Registration Successfull";
            $_SESSION['user'] = $data;
            header("location: ../register.php");
        } else echo "Something went wrong";
    }
} else echo "Access Denied";
// session_unset();

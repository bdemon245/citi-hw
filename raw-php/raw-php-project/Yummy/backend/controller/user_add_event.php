<?php
session_start();
include "../inc/env.php";
$request = $_POST;
if (isset($request['submit_event'])) {
    $event_title = $request['event_title'];
    $event_detail = $request['event_detail'];
    $price = $request['price'];
    $event_image = $_FILES['event_image'];

    $errors = [];

    //set error if fields are empty
    foreach ($request as $key => $value) {
        # code...
        if (empty($value)) {
            $errors[$key] = "This field can't be empty!";
        }
    }

    // set error if image size is zero(no image uploded) or invalid
    $givenFormat = explode("/", $event_image['type'])[1];
    $validFormat = ["jpg", "jpeg", "png", "svg", "webp"];

    if ($event_image['size'] <= 0) {
        $errors['event_image'] = "Please Upload An Image";
    } else if (in_array($givenFormat, $validFormat) === false) {
        $errors['event_image'] = "Please Provide reccomended file";
    }



    if (count($errors) > 0) {
        header("location: ../add_event.php");
        $_SESSION['errors'] = $errors;
    } else {
        //setting path & file name
        $path = "../../uploads/events/";
        $file_name = uniqid("event") . ".$givenFormat";

        //query for storing event-info
        $query = "INSERT INTO events(title, detail, price, image) VALUES ('$event_title', '$event_detail', '$price', '$file_name')";
        $store = mysqli_query($conn, $query);
        if ($store) {
            //save the file
            move_uploaded_file($event_image['tmp_name'], $path . $file_name);
            header("location: ../add_event.php");
            $_SESSION['success'] = ucwords("Event Uploded Successfully");
        } else echo "db_error; Query execution failed!😥";
    }
} else {
    "Access Denied";
}

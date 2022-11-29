<?php
session_start();
include "../inc/env.php";
$request = $_POST;
if (isset($request['submit_banner'])) {
    $banner_title = $request['banner_title'];
    $banner_detail = $request['banner_detail'];
    $promo_video = $request['promo_video'];
    $banner_image = $_FILES['banner_image'];

    $errors = [];
    foreach ($request as $key => $value) {
        # code...
        if (empty($value)) {
            $errors[$key] = "This field can't be empty!";
        }
    }
    if ($banner_image['size'] <= 0) {
        $errors['banner_image'] = "Please Upload An Image";
    };

    $givenFormat = explode("/", $banner_image['type'])[1];
    $validFormat = ["jpg", "jpeg", "png", "svg", "webp"];


    if (in_array($givenFormat, $validFormat) === false) {
        $errors['banner_image'] = "Please Provide reccomended file";
    }
    if (count($errors) > 0) {
        header("location: ../add_banner.php");
        $_SESSION['errors'] = $errors;
    } else {
        $image = uniqid("banner") . ".$givenFormat";
        $fileSaved = move_uploaded_file($banner_image['tmp_name'], "../banners_image/$image");
        if ($fileSaved) {
            $query = "INSERT INTO banners(banner_title, banner_detail, promo_video, banner_image) VALUES ('$banner_title', '$banner_detail', '$promo_video', '$image')";
            $store = mysqli_query($conn, $query);
            if ($store) {
                header("location: ../add_banner.php");
                $_SESSION['success'] = "Banner Uploded Successfully";
            }
            echo "db_error; Query execution failed!😥";
        } else echo "File couldn't be saved!😫";
    }
} else {
    "Access Denied";
}

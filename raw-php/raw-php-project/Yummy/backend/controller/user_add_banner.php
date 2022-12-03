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

    //set error if fields are empty
    foreach ($request as $key => $value) {
        # code...
        if (empty($value)) {
            $errors[$key] = "This field can't be empty!";
        }
    }

    // set error if image size is zero(no image uploded)
    if ($banner_image['size'] <= 0) {
        $errors['banner_image'] = "Please Upload An Image";
    };


    //set error if given format is not valid
    $givenFormat = explode("/", $banner_image['type'])[1];
    $validFormat = ["jpg", "jpeg", "png", "svg", "webp"];
    if (in_array($givenFormat, $validFormat) === false) {
        $errors['banner_image'] = "Please Provide reccomended file";
    }


    if (count($errors) > 0) {
        header("location: ../add_banner.php");
        $_SESSION['errors'] = $errors;
    } else {
        //setting path & file name
        $path = "../../uploads/banners/";
        $file_name = uniqid("banner") . ".$givenFormat";

        //converting a normal url into embeded url
        $components = preg_split("/&/", $promo_video);
        $str = $components[0];
        $pattern = "/watch\?v=/i";
        if (preg_match($pattern, $str))
            $promo_video = preg_replace($pattern, 'embed/', $str);

        //query for storing banner-info
        $query = "INSERT INTO banners(banner_title, banner_detail, promo_video, banner_image) VALUES ('$banner_title', '$banner_detail', '$promo_video', '$file_name')";
        $store = mysqli_query($conn, $query);
        if ($store) {
            //save the file
            move_uploaded_file($banner_image['tmp_name'], $path . $file_name);
            header("location: ../add_banner.php");
            $_SESSION['success'] = "Banner Uploded Successfully";
        } else echo "db_error; Query execution failed!😥";
    }
} else {
    "Access Denied";
}

<?php
session_start();
include "../inc/env.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM banners WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $banner = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['banner'] = $banner;
        $_SESSION['id'] = $id;
        header("location: ../edit_banner.php");
    }
} else if (isset($_POST['submit_banner'])) {
    $request = $_POST;
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
    // if ($banner_image['size'] <= 0) {
    //     $errors['banner_image'] = "Please Upload An Image";
    // };
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header('location: ../edit_banner.php');
    } else {
        $old_image = $_SESSION['banner']['banner_image'];
        $id = $_SESSION['id'];

        //if image changed
        if ($banner_image['size'] > 0) {
            $givenFormat = explode("/", $banner_image['type'])[1];
            $path = "../../uploads/banners/";
            $file_name = uniqid("banner") . ".$givenFormat";
            move_uploaded_file($banner_image['tmp_name'], $path . $file_name);
            unlink($path . $old_image);
            $query = "UPDATE banners SET banner_image = '$file_name' WHERE id='$id'";
            $update = mysqli_query($conn, $query);
        }

        //converting a normal url into embeded url
        $components = preg_split("/&/", $promo_video);
        $str = $components[0];
        $pattern = "/watch\?v=/i";
        if (preg_match($pattern, $str))
            $promo_video = preg_replace($pattern, 'embed/', $str);

        $query = "UPDATE banners SET banner_title = '$banner_title', banner_detail = '$banner_detail', promo_video = '$promo_video' WHERE id='$id'";
        $update = mysqli_query($conn, $query);
        if ($update) {
            $_SESSION['success'] = "Banner Info Updated";
            header("location: ../view_banners.php");
        }
    }
}

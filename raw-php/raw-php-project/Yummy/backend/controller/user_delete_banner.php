<?php
session_start();
include "../inc/env.php";
$id =  $_GET['id'];

//get the banner_image name from database
$query = "SELECT banner_image FROM banners WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$banner = mysqli_fetch_assoc($result);

//store the banner_image name in a variable & set a path
$file_name = $banner['banner_image'];
$image_path = "../../uploads/banners/$file_name";

//delete the specified banner from database
$query = "DELETE FROM banners WHERE id = '$id'";
$result = mysqli_query($conn, $query);

//if banner deleted from db then delete from files as well 
if ($result) {
    if (file_exists($image_path))
        unlink($image_path);
    header("location: ../view_banners.php");
}

<?php
session_start();
include "../inc/env.php";
$id = $_GET['id'];
$query = "SELECT banner_status FROM banners WHERE id= '$id'";

$result = mysqli_query($conn, $query);
$banner = mysqli_fetch_assoc($result);

//set every banner to inactive
$query = "UPDATE banners SET banner_status = '0' WHERE 1";
$update = mysqli_query($conn, $query);

if ($banner['banner_status'] == 0) {
    $query = "UPDATE banners SET banner_status = '1' WHERE id ='$id'";
    $_SESSION['active'] = "Banner Activated";
} else {
    $query = "UPDATE banners SET banner_status = '0' WHERE id ='$id'";
    $_SESSION['deactive'] = "Banner Deactivated";
}
$update = mysqli_query($conn, $query);
if ($update) {
    header("Location: ../view_banners.php");
}

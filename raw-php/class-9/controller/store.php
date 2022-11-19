<?php
session_start();
include("../include/connection.php");

$request = $_SESSION['user-data'];
$author_email = $request['author-email'];
$post_title = $request['post-title'];
$post_detail  = $request['post-detail'];
$post_author  = $request['post-author'];
$query = "INSERT INTO posts (`author_email`, `post_title`, `post_detail`, `author_name`) VALUES ('$author_email','$post_title','$post_detail','$post_author')";

$store = mysqli_query($conn, $query);
if($store){
    $messege = "<span class=\"badge text-bg-success\">Success</span>";
    $_SESSION['success'] = $messege;
    header("Location: ../index.php");
}



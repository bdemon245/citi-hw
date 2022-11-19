<?php
session_start();
// echo "Hello World";
$id = $_GET['id'];
include_once("../include/connection.php");
$query = "DELETE FROM posts WHERE id = $id";
$delete = mysqli_query($conn, $query);

if($delete){
    $_SESSION['messege'] = "Deleted Successfully";
    header("location: ../view_post.php");
}
session_unset();
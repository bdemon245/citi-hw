<?php
session_start();
include_once("../include/connection.php");
if($_POST['update']=='updated'){
    $id = $_GET['id'];
    
    $request = $_POST;
    $author_email = $request['author-email'];
    $post_title = $request['post-title'];
    $post_detail = $request['post-detail'];
    $post_author =$request['post-author'];
    $is_robot = isset($request['is-robot']);


    $errors=[];

    $errors['robot'] = $is_robot ? "<span style=\"color: red;\">Roobots are not allowed</span>" : null;

    if(isset($errors['robot'])){
        $_SESSION['user-data'] = $_POST;
        $_SESSION['errors'] = $errors;
        header('Location: ../edit_post.php');
    }else{
        $query = "UPDATE posts SET author_email='$author_email',post_title='$post_title',post_detail='$post_detail',author_name='$post_author' WHERE id=$id";
        $update = mysqli_query($conn, $query);
        if($update){
            $_SESSION['updated'] = "Updated Successfully";
            header("location: ../view_post.php");
        }
    }


}else echo "permission denied";
session_unset();
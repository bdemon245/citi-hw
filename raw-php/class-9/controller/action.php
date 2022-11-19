<?php
session_start();
if($_POST['submit']=='submitted'){
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
        header('Location: ../index.php');
    }else{
        $_SESSION['user-data'] = $_POST;
        header('Location: ./store.php');
    }


}else echo "submit data first";
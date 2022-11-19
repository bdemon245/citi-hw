<?php
include_once("./include/connection.php");
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
// var_dump($post);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Class 8</title>
</head>

<body class="">
    <nav class="navbar navbar-expand-lg bg-light px-5 mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LocalHost</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav flex-grow-1">
                    <a class="nav-link active ms-auto" aria-current="page" href="./show_post.php">Shwoing Post</a>
                    <a class="nav-link ms-auto" href="">Options</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container bg-light p-3">
            <div class="card bg-light m-5">
                <div class="card-title "> <h3 class="text-center mb-3"><?=$post['post_title']?></h3></div>
                <div class="card-body">
                    <blockquote class="blockquote">
                        <p class="mb-3"><?=$post['post_detail']?></p>
                        <footer class="blockquote-footer"><cite title="Source Title"><?=$post['author_name']?></cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
<?php
session_unset();
?>
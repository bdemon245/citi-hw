<?php
session_start();
include("include/connection.php");
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, 1);
// var_dump($posts);
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
                    <a class="nav-link ms-auto" href="./index.php">Create Post</a>
                    <a class="nav-link active view-post" aria-current="page" href="./view_post.php">View Post</a>
                    <a class="nav-link ms-auto" href="#">Options</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="contianer-sm p-5">
            <table class="table table-striped ">
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Post Detail</th>
                    <th>Author's Info</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php
                foreach ($posts as $key => $post) { ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $post['post_title'] ?></td>
                        <td><?php if (strlen($post['post_detail']) > 50) echo substr($post['post_detail'], 0, 50) . "...";
                            else echo $post['post_detail']; ?></td>
                        <td>
                            <p>Name : <span class="text-secondary"><?= $post['author_name'] ?></span></p>
                            <p>Email : <span class="text-secondary"><?= $post['author_email'] ?></span></p>
                        </td>
                        <td class="text-center">
                            <a href="./show_post.php?id=<?= $post['id'] ?>">
                                <span class="badge text-bg-primary me-3">Show</span>
                            </a>
                            <a href="./edit_post.php?id=<?= $post['id'] ?>">
                                <span class="badge text-bg-success me-3">Edit</span>
                            </a>
                            <a href="./controller/delete_post.php?id=<?= $post['id'] ?>">
                                <span class="badge text-bg-danger me-3">Delete</span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <?php
        if (isset($_SESSION['messege'])) { ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">Alert</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?= $_SESSION['messege'] ?>
                </div>
            </div>
        <?php }
        if (isset($_SESSION['updated'])) { ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">Alert</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?= $_SESSION['updated'] ?>
                </div>
            </div>
        <?php } ?>
    </main>
</body>

</html>

<?php session_unset();

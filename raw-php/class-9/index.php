<?php
session_start();


$not_verified = isset($_SESSION['errors']) ? $_SESSION['errors']['robot'] : null;

$request = isset($_SESSION['user-data']) ? $_SESSION['user-data'] : null;
$author_email = isset($request['author-email']) ? $request['author-email'] : null;
$post_title = isset($request['post-title']) ? $request['post-title'] : null;
$post_detail  = isset($request['post-detail']) ? $request['post-detail'] : null;
$post_author  = isset($request['post-author']) ? $request['post-author'] : null;

$isSuccess = isset($_SESSION['success']);
// var_dump($isSuccess);
$messege = isset($_SESSION['success']) ? $_SESSION['success'] : null;
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
                    <a class="nav-link active ms-auto" aria-current="page" href="./index.php">Create Post</a>
                    <a class="nav-link view-post" href="./view_post.php">View Post</a>
                    <a class="nav-link ms-auto" href="">Options</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container bg-light">
            <div class="card bg-light text-center py-3">
                <div class="card-title bg-light">Share your thoughts</div>
                <div class="card-body bg-light">
                    <form action="./controller/action.php" method="post" class="container-sm justify-content-center
                    px-5
                    flex-column">
                        <div class="form-floating mb-3">
                            <input type="email" name="author-email" value="<?= $author_email ?>" class="form-control bg-light" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="post-title" value="<?= $post_title ?>" class="form-control bg-light" id="floatingInput" placeholder="Post title">
                            <label for="floatingPassword">Post Title</label>
                        </div>
                        <div class="form-floating my-3">
                            <textarea name="post-detail" value="<?= $post_detail ?>" class="form-control bg-light" id="floatingInput" placeholder="Description Here"><?= $post_detail ?></textarea>
                            <label for="floatingPassword">Description Here</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="post-author" value="<?= $post_author ?>" class="form-control bg-light" id="floatingInput" placeholder="Author's Name">
                            <label for="floatingPassword">Author's Name</label>
                        </div>
                        <div class="d-flex flex-column align-items-start mt-3">
                            <div class="form-check form-switch d-inline-block">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="is-robot" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Yes, I am a robot</label>
                            </div>
                            <?= $not_verified ?>
                            <button type="submit" class="btn btn-primary d-inline-block mt-3" name="submit" value="submitted">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <? if ($isSuccess) { ?>
            <div class="d-flex fle-grow-1 justify-content-center mt-3">
                <?= $messege ?>
            </div>
        <? } ?>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
<?php
session_unset();
?>
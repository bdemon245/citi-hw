<?php
session_start();
//errors
$unmatchPass = (isset($_SESSION['errors']['pass']['unmatch'])) ? $_SESSION['errors']['pass']['unmatch'] : null;
$tooShortPass1 = (isset($_SESSION['errors']['pass']['short'])) ? $_SESSION['errors']['pass']['short'] : null;
$tooShortPass2 = (isset($_SESSION['errors']['cf-pass']['short'])) ? $_SESSION['errors']['pass']['short'] : null;
$invalidEmail = (isset($_SESSION['errors']['email']['invalid'])) ? $_SESSION['errors']['email']['invalid'] : null;
$robot = isset($_SESSION['errors']['robot']) ? $_SESSION['errors']['robot'] : null;

//cached data
$cachedEmail = isset($_SESSION['cachedData']['email']) ?
    ($_SESSION['cachedData']['email']) : '';

function errorPassUnamtch($unmatchPass)
{
    echo $unmatchPass;
}
function shortPass($tooShortPass)
{
    echo $tooShortPass;
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./include/style.css">
    <title>Class 7</title>
</head>

<body>
    <h1 class="heading">Raw PHP-Class 7</h1>
    <div class="content">
            <form action="./controller/action.php" method="post" class="form-control ">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email</label>
                    <input required type="email" name="email" id="email" class="form-control input" value="<?php echo $cachedEmail; ?>">
                    <?php
                    echo $invalidEmail;
                    ?>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Enter password</label>

                    <input type="password" name="pass" id="pass" class="form-control input" required>
                    <?php
                    shortPass($tooShortPass1);
                    errorPassUnamtch($unmatchPass);
                    ?>
                </div>
                <div class="mb-1">
                    <label for="pass" class="form-label">Confirm password</label>
                    <input type="password" name="cf-pass" id="pass" class="form-control input" required>
                    <?php
                    shortPass($tooShortPass2);
                    errorPassUnamtch($unmatchPass);
                    ?>
                </div>
                <div class="ck-human mb-3">
                    <input type="checkbox" name="ck-human" id="ck-human" checked>
                    <span class="mr-3">I am a robot</span>
                    <div><?php
                    echo $robot;
                    ?></div>
                </div>
                <div class="btn-wrapper mb-3">
                    <!-- <button type="submit" name="login" value="submited" class="btn btn-primary w-40 mx-1">Login</button><span >OR</span> -->
                    <button type="submit" name="submit" value="submited" class="btn btn-primary w-45 mx-1">Register</button>
                </div>
            </form>
    </div>
</body>

</html>
<?php
session_unset();
?>
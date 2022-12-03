<?php
include "./inc/header.php";

$data_recieved = isset($_SESSION['banner']);
if ($data_recieved) {
    $path = "../uploads/banners/";
    $image = $path . $_SESSION['banner']['banner_image'];
    $title = $_SESSION['banner']['banner_title'];
    $detail = $_SESSION['banner']['banner_detail'];


    $promo_video = $_SESSION['banner']['promo_video'];
    $pattern = "/embed\//";
    $promo_video = preg_replace($pattern, "watch?v=", $promo_video);
}

//setting erros in a variable
$error_title = isset(($_SESSION['errors']['banner_title'])) ? ($_SESSION['errors']['banner_title']) : null;
$error_detail = isset(($_SESSION['errors']['banner_detail'])) ? ($_SESSION['errors']['banner_detail']) : null;
$error_video = isset(($_SESSION['errors']['promo_video'])) ? ($_SESSION['errors']['promo_video']) : null;
$error_image = isset(($_SESSION['errors']['banner_image'])) ? ($_SESSION['errors']['banner_image']) : null;

//seting labels if there is no error
$label_title = "enter banner title";
$label_detail = "enter banner detail";
$label_video = "enter promo video link";

//function for setting is-invalid class for input field red-border
function is_invalid($var)
{
    if (isset($var)) echo "is-invalid";
}

//function for setting error
function set_error($error, $label)
{
    echo isset($error) ? $error : ucwords("$label");
}



?>


<div class="container p-3">
    <div class="card">
        <div class="card-title">
            <div class="bg-primary text-light text-center p-3 bold h4 rounded-top ">Edit Banner</div>
        </div>
        <div class="card-body">
            <form class="form-floating" action="./controller/user_edit_banner.php" method="POST" enctype="multipart/form-data">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label>
                            <img class="rounded-3" src=<?= isset($image) ? $image : "https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" ?> alt="" style="width: 100%; height: 100%;" id="image_holder" class="mb-3">
                            <input type="file" name="banner_image" id="banner_image" value="" hidden>
                            <?php if (isset($error_image)) { ?>
                                <span class="text-danger"><?= $error_image ?></span>
                            <?php
                            } ?>
                            <span class="text-secondary d-block">*Reccomended File Formats<em>( jpg, jpeg, png, webp, svg)</em></span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?php is_invalid($error_title) ?>" id="banner_title" name="banner_title" placeholder="Your banner title" value="<?php if (isset($title)) echo $title;
                                                                                                                                                                                    else if (isset($_SESSION['old_data']['banner_title']))
                                                                                                                                                                                        echo $_SESSION['old_data']['banner_title'];
                                                                                                                                                                                    else ""  ?>">
                            <label for="banner_title" class="text-secondary"><?php set_error($error_title, $label_title) ?></label>
                        </div>

                        <div class="form-floating mt-3">
                            <textarea class="form-control <?php is_invalid($error_detail) ?>" placeholder="Type your messege here..." id="banner_detail" name="banner_detail" style="min-height: 8rem;"><?php if (isset($detail)) echo $detail;
                                                                                                                                                                                                        else if (isset($_SESSION['old_data']['banner_detail']))
                                                                                                                                                                                                            echo $_SESSION['old_data']['banner_detail'];
                                                                                                                                                                                                        else ""  ?></textarea>
                            <label for="banner_detail" class="text-secondary"><?php set_error($error_detail, $label_detail) ?></label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="url" class="form-control <?php is_invalid($error_video) ?>" id="floatingInputValue" placeholder="https://www.youtube.com/watch?v=id" value="<?php if (isset($promo_video)) echo $promo_video;
                                                                                                                                                                                        else if (isset($_SESSION['old_data']['promo_video']))
                                                                                                                                                                                            echo $_SESSION['old_data']['promo_video'];
                                                                                                                                                                                        else ""  ?>" name="promo_video">
                            <label for="floatingInputValue" class="text-secondary"><?php set_error($error_video, $label_video) ?></label>
                        </div>
                        <button type="submit" name="submit_banner" value="submitted" class="btn btn-primary  mt-3"> <i class="fas fa-save"></i> Save Banner</button>
            </form>
        </div>
    </div>

</div>
</div>
</div>


<!-- //toast for added banner -->
<?php
if (isset($_SESSION['success'])) { ?>
    <div class="toast show" style="position: absolute; bottom: 8vh; right: 2vw;">
        <div class="toast-header bg-success text-light">
            <strong class="mr-auto"><i class="fa-solid fa-circle-check me-3"></i>Great</strong>
            <!-- <small>11 mins ago</small> -->
            <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast show" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
} ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
</script>
<script derfer>
    const bannerInput = $('#banner_image');
    const imageHolder = $('#image_holder');
    bannerInput.change(function() {
        let blob = this.files[0];
        let url = URL.createObjectURL(blob);
        imageHolder.attr('src', url);
    })
</script>



<?php
include "./inc/footer.php";
unset($_SESSION['errors']);
unset($_SESSION['success']);

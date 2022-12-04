<?php
include "./inc/header.php";


//setting erros in a variable
$error_title = isset(($_SESSION['errors']['event_title'])) ? ($_SESSION['errors']['event_title']) : null;
$error_detail = isset(($_SESSION['errors']['event_detail'])) ? ($_SESSION['errors']['event_detail']) : null;
$error_price = isset(($_SESSION['errors']['price'])) ? ($_SESSION['errors']['price']) : null;
$error_image = isset(($_SESSION['errors']['event_image'])) ? ($_SESSION['errors']['event_image']) : null;

//seting labels if there is no error
$label_title = "enter event title";
$label_detail = "enter event detail";
$label_price = "enter event price";

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
            <div class="bg-primary text-light text-center p-3 bold h4 rounded-top ">Add Event</div>
        </div>
        <div class="card-body">
            <form class="form-floating" action="./controller/user_add_event.php" method="POST" enctype="multipart/form-data">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label>
                            <img class="rounded-3" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="" style="width: 100%; height: 100%;" id="image_holder" class="mb-3">
                            <input type="file" name="event_image" id="event_image" hidden>
                            <?php if (isset($error_image)) { ?>
                                <span class="text-danger"><?= $error_image ?></span>
                            <?php
                            } ?>
                            <span class="text-secondary d-block">*Reccomended File Formats<em>( jpg, jpeg, png, webp, svg)</em></span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?php is_invalid($error_title) ?>" id="event_title" name="event_title" placeholder="Your event title" value="">
                            <label for="event_title" class="text-secondary"><?php set_error($error_title, $label_title) ?></label>
                        </div>

                        <div class="form-floating mt-3">
                            <textarea class="form-control <?php is_invalid($error_detail) ?>" placeholder="Type your messege here..." id="event_detail" name="event_detail" style="min-height: 8rem;"></textarea>
                            <label for="event_detail" class="text-secondary"><?php set_error($error_detail, $label_detail) ?></label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="text" class="form-control <?php is_invalid($error_price) ?>" id="floatingInputValue" placeholder="$00.00" value="" name="price">
                            <label for="floatingInputValue" class="text-secondary"><?php set_error($error_price, $label_price) ?></label>
                        </div>
                        <button type="submit" name="submit_event" value="submitted" class="btn btn-primary  mt-3"> <i class="fas fa-save"></i> Save event</button>
            </form>
        </div>
    </div>

</div>









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
    const eventInput = $('#event_image');
    const imageHolder = $('#image_holder');
    eventInput.change(function() {
        let blob = this.files[0];
        let url = URL.createObjectURL(blob);
        imageHolder.attr('src', url);
    })
</script>



<?php
include "./inc/footer.php";
unset($_SESSION['errors']);
unset($_SESSION['success']);

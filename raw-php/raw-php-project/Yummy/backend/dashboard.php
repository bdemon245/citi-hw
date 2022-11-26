<?php
session_start();

include_once "./inc/header.php";
?>









<?php
include_once "./inc/footer.php";



//toast for successful login
if (isset($_SESSION['success'])) { ?>
    <div class="toast show" style="position: absolute; bottom: 8vh; right: 2vw;">
        <div class="toast-header">
            <strong class="mr-auto">Welcome back, <?php
                                                    if (isset($_SESSION['success'])) {
                                                        echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                                                    } ?></strong>
            <!-- <small>11 mins ago</small> -->
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>

<?php
}
unset($_SESSION['success']);

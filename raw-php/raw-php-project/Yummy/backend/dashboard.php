<?php
session_start();

if (isset($_SESSION['auth'])) {
    # code...
    include_once "./inc/header.php";


?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>









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
} else {
    header("location: ./login.php");
}
unset($_SESSION['success']);

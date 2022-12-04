<?php
include "./inc/env.php";
$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);

$events = mysqli_fetch_all($result, 1);

$path = "../uploads/events/";



include "./inc/header.php";
?>

<div class="container p-3">
    <div class="card">
        <div class="card-title">
            <div class="bg-primary text-light text-center p-3 bold h4 rounded-top ">Viewing All Events</div>
        </div>
        <div class="card-body">
            <table class="table-striped container">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" class="px-3 text-center">#</th>
                        <th scope="col">Event Info</th>
                        <th scope="col" class="text-center">Event Image</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="px-3 text-center">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>


                <tbody>
                    <?php if (mysqli_num_rows($result) <= 0) { ?>
                        <tr>
                            <td colspan="6" class="text-center p-5">No records found</td>
                        </tr>
                        <?php
                    } else {
                        foreach ($events as $key => $event) {
                        ?>

                            <tr>
                                <th scope="row" class="text-center"><?= ++$key ?></th>
                                <td class="pt-3">
                                    <p><b>Title: <?= $event['title'] ?></b></p>
                                    <b>Detail: </b>
                                    <p style="max-width: 25ch;"><?= $event['detail'] ?></p>
                                </td>
                                <td class="pt-3 text-center">
                                    <img class="rounded-3 " src="<?= $path . $event['image'] ?>" alt="" style="max-width: 240px;">
                                </td>
                                <td class="pt-3 px-5 text-center fw-bold">
                                    <span>$<?= $event['price'] ?></span>
                                </td>
                                <td class="pt-3 px-5  text-center">
                                    <a href="./controller/change_event_status.php?id=<?= $event['id'] ?>">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($event['status'] != 0) echo htmlentities("Checked"); ?>>
                                        </div>

                                    </a>
                                </td>
                                <td class="pt-3 text-center">

                                    <a href="./controller/user_edit_event.php?id=<?= $event['id'] ?>">
                                        <button class="btn btn-primary text-dark"><i class=" fas fa-edit text-dark"></i>
                                            Edit</button>
                                    </a>

                                    <a href="./controller/user_delete_event.php?id=<?= $event['id'] ?>" class="delete_btn">
                                        <button class="btn btn-danger text-light"><i class="fas fa-trash text-light"></i>
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</div>
<?php
//toast for editing event
if (isset($_SESSION['success'])) { ?>
    <div class="toast show " style="position: absolute; bottom: 8vh; right: 2vw;">
        <div class="toast-header bg-success text-light">
            <strong class="mr-auto"><i class="fa-solid fa-circle-check me-3"></i>Great</strong>
            <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>


<?php
}
//toast for deleting event
if (isset($_SESSION['active'])) { ?>
    <div class="toast show " style="position: absolute; bottom: 8vh; right: 2vw;">
        <div class="toast-header bg-success text-light">
            <strong class="mr-auto"><i class="fa-solid fa-circle-check me-3"></i>Great</strong>
            <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['active'] ?>
        </div>
    </div>


<?php
}

if (isset($_SESSION['deactive'])) { ?>
    <div class="toast show " style="position: absolute; bottom: 8vh; right: 2vw;">
        <div class="toast-header bg-danger text-light">
            <strong class="mr-auto"><i class="fa-solid fa-circle-exclamation me-3"></i>Notice</strong>
            <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['deactive'] ?>
        </div>
    </div>


<?php
}
unset($_SESSION['active']);
unset($_SESSION['deactive']);
unset($_SESSION['success']);
include "./inc/footer.php";

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script defer>
    const deleteBtn = document.querySelectorAll('.delete_btn')
    console.log(deleteBtn);
    let videoURL = "https://www.youtube.com/watch?v=H91aqUHn8sE"

    fetch(videoURL).then(link => console.log(link))
    let l = deleteBtn.length
    //for each delete btn clcik event
    for (i = 0; i < l; i++) {
        const element = deleteBtn[i];
        // console.log(element)
        element.addEventListener('click', (e) => {
            e.preventDefault();
            const url = element.href
            // console.log(url);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    async function anim() {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    anim().then(window.location.assign(url))
                }
            })
        });
    }
</script>
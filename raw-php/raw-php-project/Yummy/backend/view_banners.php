<?php

include "./inc/header.php";
?>

<div class="container p-3">
    <div class="card">
        <div class="card-title">
            <div class="bg-primary text-light text-center p-3 bold h4 rounded-top ">Viewing All Banners</div>
        </div>
        <div class="card-body">
            <table class="table-striped container">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Banner Info</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Video Info</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="pt-3">
                            <p><b>Title goes here</b></p>
                            <p>Detail goes here ...</p>
                        </td>
                        <td class="pt-3">
                            <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="" style="width: 280px; height: 166px;">
                        </td>
                        <td class="pt-3">
                            <p><b>Video title goes here</b></p>
                            <p>Video Link</p>
                        </td>
                        <td class="pt-3">
                            <a href="edit_banner.php" class="d-block"><i class="fas fa-edit btn btn-success"></i>Edit</a>
                            <a href="delete_banner.php" class="mt-3 d-block"><i class="fas fa-trash btn btn-danger"></i>Delete</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</div>






<?php
include "./inc/footer.php";

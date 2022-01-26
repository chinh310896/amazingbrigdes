<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
$errors = [];

if (!isset($_GET['id'])) {
    redirect_to('index.php');
} else {
    $id = $_GET['id'];
    $bridge = find_bridge_by_id($id);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="0vBGoLVLv81Vjwhi4DExFrFtFurWXB86hnuNWNaF">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>View Bridge</title>
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="http://demo-classifieds-directory.quickadminpanel.com/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
        }
        table {
            table-layout: fixed;
            width: 100%;
        }
        th {
            width: 120px;
        }
        .flex-column {
            max-width: 25%;
        }
        #photo-grid img {
            cursor: pointer;
        }
        .box {
            margin: 5px;
            position: relative;
        }
        .box .dropdown {
            position: absolute;
            top: 0;
            right: 0;
        }
        .box:hover .btn {
            display: block !important;

        }
        .dropdown-item input:last-child {
            background-color: white;
            border: none;
            padding: 0;
        }
    </style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <?php include('header.php') ?>
    <div class="app-body">
        <?php include('sidebar.php') ?>
        <main class="main">
            <div class="container-fluid pt-3">
                <div class="card">
                    <div class="card-header">
                        Show Bridge
                        <div>
                            <a href="editBridge.php?id=<?php echo $id ?>" class="btn btn-info pulled-right">Edit</a>
                            <button class="btn btn-danger" data-id="<?php echo $bridge['bridgeID'] ?>" data-toggle="modal" data-target="#deleteBridge" data-keyboard="true">Delete</button>
                            <div class="modal" id="deleteBridge" tabindex="-1" role="dialog" aria-labelledby="deleteBridge" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Delete Bridge</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="deleteBridge.php" method="post" novalidate>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <p>Are you sure to delete this bridge?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <?php foreach ($bridge as $key => $value) :
                                        if ($key == "profilePictureID") continue;
                                        if (!empty($value)) : ?>
                                            <tr>
                                                <th><?php echo $key ?></th>
                                                <td <?php echo ($key == 'description') ? 'style="white-space: pre-line"' : '' ?>>
                                                    <?php echo $value;
                                                    if ($key == 'total length' || $key == 'height' || $key == 'clerance below' || $key == 'width' || $key == 'span') {
                                                        echo ' metres';
                                                    } ?>
                                                </td>
                                            </tr>
                                    <?php endif;
                                    endforeach ?>

                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            <?php
                                            $category_set = get_categories_by_bridgeID($bridge['bridgeID']);
                                            while ($category = mysqli_fetch_assoc($category_set)) {
                                                echo '<p>' . $category['categoryName'] . '</p>';
                                            };
                                            mysqli_free_result($category_set);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Images</th>
                                        <td>
                                            <div class="d-flex flex-row flex-wrap justify-content-center" id="photo-grid">
                                                <?php
                                                $image_set = isset($bridge['bridgeID']) ? get_images_by_bridgeID($bridge['bridgeID']) : get_images_by_bridgeID($_POST['id']);
                                                $images_each_column_count = ceil(mysqli_num_rows($image_set) / 4);
                                                for ($i = 0; $i < 4; $i++) :
                                                ?>
                                                    <div class="d-flex flex-column">
                                                        <?php
                                                        for ($j = 0; $j < $images_each_column_count; $j++) :
                                                            if ($image = mysqli_fetch_assoc($image_set)) : ?>
                                                                <div class="box">
                                                                    <img src="<?php echo $image['link'] ?>" class="img-fluid" data-toggle="modal" data-target="#imageModal" data-keyboard="true">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-light btn-sm d-none" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">
                                                                            <i class="fa fa-ellipsis-h"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                            <a class="dropdown-item" data-id="<?php echo $image['imageID'] ?>" data-toggle="modal" data-target="#deleteImage" data-keyboard="true">
                                                                                Delete
                                                                            </a>

                                                                            <a class="dropdown-item">
                                                                                <form action="setThumbnail.php" method="post">
                                                                                    <input type="hidden" name="imageID" value="<?php echo $image['imageID'] ?>">
                                                                                    <input type="hidden" name="bridgeID" value="<?php echo $bridge['bridgeID'] ?>">
                                                                                    <input type="submit" value="Set as thumbnail">
                                                                                </form>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            endif;
                                                        endfor; ?>
                                                    </div>
                                                <?php endfor;
                                                mysqli_free_result($image_set);
                                                ?>
                                            </div>

                                            <div class="modal" id="deleteImage" tabindex="-1" role="dialog" aria-labelledby="deleteImage" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="">Delete Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="deleteImage.php" method="post" novalidate>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id">
                                                                <input type="hidden" name="bridgeID" value="<?php echo $bridge['bridgeID'] ?>">
                                                                <p></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-danger" value="Delete">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <td>
                                            <?php
                                            $thumbnail = get_thumbnail($bridge['bridgeID']);
                                            ?>
                                            <img style="max-width: 25%;" src="<?php echo $thumbnail['link'] ?>" alt="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-default mt-3" href="index.php">
                                Back to list
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#deleteImage').on('show.bs.modal', function(event) {
                var a = $(event.relatedTarget);
                var id = a.data('id');
                $('#deleteImage input[name="id"]').val(id);
                $('#deleteImage p').text("Are you sure?");
            })
        });
    </script>
</body>

</html>

<?php
db_disconnect($db);
?>
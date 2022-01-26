<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="XnZlTlsfi4ltalF9Gs0ctgxAFticWcMiFpsjjASB">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Bridges</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <?php include('header.php') ?>
    <div class="app-body">
        <?php include('sidebar.php') ?>
        <main class="main">
            <div class="container-fluid pt-3">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="newBridge.php">
                            Add Bridge
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Bridge List
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered table-striped table-hover datatable datatable-Company">
                                <thead>
                                    <th>Serial</th>
                                    <th>Bridge Name</th>
                                    <th>Country</th>
                                    <th>Category</th>
                                    <th>&nbsp;</th>
                                </thead>

                                <?php
                                $bridge_set = find_all_bridges();
                                while ($bridge = mysqli_fetch_assoc($bridge_set)) :
                                    $category_set = get_categories_by_bridgeID($bridge['bridgeID']);
                                    $image_set = get_images_by_bridgeID($bridge['bridgeID']);
                                ?>
                                    <tr>
                                        <td><?php echo $bridge['bridgeID']; ?></td>
                                        <td class="bridgeName"><?php echo $bridge['name']; ?></td>
                                        <td><?php echo $bridge['country']; ?></td>
                                        <td><?php
                                            while ($category = mysqli_fetch_assoc($category_set)) {
                                                echo '<p>' . $category['categoryName'] . '</p>';
                                            };
                                            mysqli_free_result($category_set);
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo 'view.php?id=' . $bridge['bridgeID']; ?>"><button class="btn btn-info btn-sm">View</button>
                                            </a>
                                            <a href="<?php echo 'editBridge.php?id=' . $bridge['bridgeID']; ?>"><button class="btn btn-info btn-sm">Edit</button></a>
                                            <button class="btn btn-danger btn-sm" data-id="<?php echo $bridge['bridgeID'] ?>" data-toggle="modal" data-target="#deleteBridge" data-keyboard="true">Delete</button>
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
                                                                <input type="hidden" name="id">
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
                                <?php
                                endwhile;
                                mysqli_free_result($bridge_set);
                                ?>
                            </table>
                        </div>


                    </div>
                </div>

            </div>


        </main>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#example #deleteBridge').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var bridge = button.parent().siblings('.bridgeName').text();
                $('#deleteBridge input[name="id"]').val(id);
                $('#deleteBridge p').text("Delete bridge '" + bridge + "'?");
            });
            $('#example').DataTable({
                columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                }, {
                    targets: [1],
                    orderData: [1, 0]
                }, {
                    targets: [3, 4],
                    orderable: false
                }]
            });
        });
    </script>
</body>

</html>
<?php
db_disconnect($db);

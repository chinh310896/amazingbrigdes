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
    <title>Admins</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <?php include('header.php') ?>
    <div class="app-body">
        <?php include('sidebar.php') ?>
        <main class="main">
            <div class="container-fluid pt-3">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="newAdmin.php">
                            Add Admin
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Admin List
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>&nbsp;</th>
                                    </tr>

                                    <?php
                                    $admin_set = find_all_admins();
                                    $count = mysqli_num_rows($admin_set);
                                    for ($i = 0; $i < $count; $i++) :
                                        $admin = mysqli_fetch_assoc($admin_set);
                                    ?>
                                        <tr>
                                            <td class="name"><?php echo $admin['adminName']; ?></td>
                                            <td><?php echo $admin['email']; ?></td>
                                            <td>
                                                <a href="<?php echo 'editAdmin.php?id=' . $admin['adminID']; ?>"><button class="btn btn-info">Edit</button></a>
                                                <button class="btn btn-danger" data-id="<?php echo $admin['adminID'] ?>" data-toggle="modal" data-target="#deleteAdmin" data-keyboard="true">Delete</button>
                                                <div class="modal" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="deleteAdmin" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="">Delete Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="deleteAdmin.php" method="post" novalidate>
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
                                    endfor;
                                    mysqli_free_result($admin_set);
                                    ?>
                                </thead>

                            </table>
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
            $('#deleteAdmin').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var admin = button.parent().siblings('.name').text();
                $('#deleteAdmin input[name="id"]').val(id);
                $('#deleteAdmin p').text("Delete admin '" + admin + "'?");
            })
        });
    </script>
</body>

</html>
<?php
db_disconnect($db);
?>
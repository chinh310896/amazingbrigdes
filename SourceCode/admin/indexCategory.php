<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
$errors = [];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="XnZlTlsfi4ltalF9Gs0ctgxAFticWcMiFpsjjASB">

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Categories</title>
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
                        <a href="newCategory.php">
                        <button class="btn btn-success">
                            Add Category
                        </button>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Category List
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>&nbsp;</th>
                                    </tr>

                                    <?php
                                    $category_set = find_all_categories();
                                    $count = mysqli_num_rows($category_set);
                                    for ($i = 0; $i < $count; $i++) :
                                        $category = mysqli_fetch_assoc($category_set);
                                    ?>
                                        <tr>
                                            <td><?php echo $category['categoryName']; ?></td>
                                            <td>
                                                <a href="editCategory.php?id=<?php echo $category['categoryID'] ?>">
                                                    <button class="btn btn-info">Edit</button>
                                                </a>
                                                <button class="btn btn-danger" data-id="<?php echo $category['categoryID'] ?>" data-toggle="modal" data-target="#deleteCategory" data-keyboard="true">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    endfor;
                                    mysqli_free_result($category_set);
                                    ?>
                                </thead>

                            </table>
                            <div class="modal" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Delete category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="deleteCategory.php" method="post" novalidate>
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
    <script>
        $(function() {
            $('#deleteCategory').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var category = button.parent().prev().text();
                $('#deleteCategory input[name="id"]').val(id);
                $('#deleteCategory p').text("Delete category '" + category + "'?");
            })
        });
    </script>
</body>

</html>
<?php
db_disconnect($db);
?>
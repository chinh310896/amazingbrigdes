<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkFormCategory();
    if (isFormValidated()) {
        $category = [];
        $category['id'] = $_POST['id'];
        $category['name'] = $_POST['categoryName'];
        update_category($category);
        redirect_to('indexCategory.php');
    }
} else {
    if (!isset($_GET['id'])) {
        redirect_to('indexCategory.php');
    }
    $id = $_GET['id'];
    $category = find_category_by_id($id);
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
    <title>Edit Category</title>
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="http://demo-classifieds-directory.quickadminpanel.com/css/custom.css" rel="stylesheet" />
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <?php include('header.php') ?>
    <div class="app-body">
        <?php include('sidebar.php') ?>
        <main class="main">
            <div class="container-fluid pt-3">
                <div class="card">
                    <div class="card-header">
                        Edit Category
                    </div>

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo isFormValidated() ? $category['categoryID'] : $_POST['id'] ?>">
                            <div class="form-group">
                                <label for="categoryName">Name*</label>
                                <input type="text" name="categoryName" class="form-control" value="<?php echo isFormValidated() ? $category['categoryName'] : $_POST['categoryName'] ?>" required>
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['categoryName']) ? $errors['categoryName'] : '' ?>
                                </p>
                            </div>

                            <input class="btn btn-danger" type="submit" name="submit" value="Save">
                        </form>
                        <br><br>
                        <a href="indexCategory.php">Back to index</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
db_disconnect($db);
?>
<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
$errors = [];
$images_errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkFormBridge();
    validateUploadImage();
    if (isFormValidated()) {
        $bridge = [];
        $bridge['name'] = $_POST['name'];
        $bridge['ofname'] = $_POST['ofname'];
        $bridge['othname'] = $_POST['othname'];
        $bridge['status'] = $_POST['status'];
        $bridge['begin'] = $_POST['begin'];
        $bridge['end'] = $_POST['end'];
        $bridge['opened'] = $_POST['opened'];
        $bridge['country'] = $_POST['country'];
        $bridge['location'] = $_POST['location'];
        $bridge['crossed'] = $_POST['crossed'];
        $bridge['structure'] = $_POST['structure'];
        $bridge['material'] = $_POST['material'];
        $bridge['length'] = $_POST['length'];
        $bridge['height'] = $_POST['height'];
        $bridge['clb'] = $_POST['clb'];
        $bridge['width'] = $_POST['width'];
        $bridge['span'] = $_POST['span'];
        $bridge['designer'] = $_POST['designer'];
        $bridge['mtb'] = $_POST['mtb'];
        $bridge['hts'] = $_POST['hts'];
        $bridge['description'] = $_POST['description'];
        $bridge['mapurl'] = $_POST['mapurl'];
        insert_bridge($bridge);
        $newBridgeId = mysqli_insert_id($db);

        $categoryID_set = isset($_POST['categories']) ? $_POST['categories'] : [];

        if (count($categoryID_set) > 0) {
            categorize_bridge($newBridgeId, $categoryID_set);
        }

        foreach ($_FILES['file']['name'] as $imageName) {
            if (empty($imageName)) break;
            $image = [];
            $image['link'] = "../img/$imageName";
            $image['bridgeID'] = $newBridgeId;
            insert_image($image);
        }
        redirect_to('view.php?id='.$newBridgeId);
    }
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
    <title>New Bridge</title>
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="http://demo-classifieds-directory.quickadminpanel.com/css/custom.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <?php include('header.php') ?>
    <div class="app-body">
        <?php include('sidebar.php') ?>
        <main class="main">
            <div class="container-fluid pt-3">
                <div class="card">
                    <div class="card-header">
                        Create New Bridge
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control" placeholder="Bridge Name | Bridge-Name" value="<?php echo isFormValidated() ? '' : $_POST['name'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['name']) ? $errors['name'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="ofname">Official Name</label>
                                <input type="text" name="ofname" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['ofname'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['ofname']) ? $errors['ofname'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="othname">Other Names</label>
                                <input type="text" name="othname" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['othname'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['othname']) ? $errors['othname'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['status'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['status']) ? $errors['status'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="begin">Construction begin</label>
                                <input type="text" name="begin" class="form-control" placeholder="1990 | 40 BC | 60 AD" value="<?php echo isFormValidated() ? '' : $_POST['begin'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['begin']) ? $errors['begin'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="end">Construction end</label>
                                <input type="text" name="end" class="form-control" placeholder="1990 | 40 BC | 60 AD" value="<?php echo isFormValidated() ? '' : $_POST['end'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['end']) ? $errors['end'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="opened">Opened*</label>
                                <input type="text" name="opened" class="form-control" placeholder="1990 | 40 BC | 60 AD" value="<?php echo isFormValidated() ? '' : $_POST['opened'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['opened']) ? $errors['opened'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="country">Country*</label>
                                <input type="text" name="country" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['country'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['country']) ? $errors['country'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="location">Location*</label>
                                <input type="text" name="location" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['location'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['location']) ? $errors['location'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="crossed">Crossed</label>
                                <input type="text" name="crossed" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['crossed'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['crossed']) ? $errors['crossed'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="structure">Structure</label>
                                <input type="text" name="structure" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['structure'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['structure']) ? $errors['structure'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="material">Material</label>
                                <input type="text" name="material" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['material'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['material']) ? $errors['material'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="length">Total length*</label>
                                <input type="number" name="length" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['length'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['length']) ? $errors['length'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="height">Height</label>
                                <input type="number" name="height" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['height'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['height']) ? $errors['height'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="clb">Clearance below</label>
                                <input type="number" name="clb" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['clb'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['clb']) ? $errors['clb'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="width">Width</label>
                                <input type="number" name="width" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['width'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['width']) ? $errors['width'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="span">Span</label>
                                <input type="number" name="span" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['span'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['span']) ? $errors['span'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="designer">Designer</label>
                                <input type="text" name="designer" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['designer'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['designer']) ? $errors['designer'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="mtb">Maintained by</label>
                                <input type="text" name="mtb" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['mtb'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['mtb']) ? $errors['mtb'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="hts">Heritage status</label>
                                <input type="text" name="hts" class="form-control" value="<?php echo isFormValidated() ? '' : $_POST['hts'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['hts']) ? $errors['hts'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="description">Description*</label>
                                <textarea name="description" class="form-control "><?php echo isFormValidated() ? '' : $_POST['description'] ?></textarea>
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['description']) ? $errors['description'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="mapurl">Map URL*</label>
                                <input type="text" name="mapurl" class="form-control" placeholder="https://googlemap.com" value="<?php echo isFormValidated() ? '' : $_POST['mapurl'] ?>">
                                <p class="helper-block text-danger">
                                    <?php echo isset($errors['mapurl']) ? $errors['mapurl'] : '' ?>
                                </p>
                            </div>

                            <div class="form-group ">
                                <label for="category">Categories</label>
                                <select name="categories[]" class="form-control" multiple="multiple">
                                    <?php
                                    $category_set = find_all_categories();
                                    while ($category = mysqli_fetch_assoc($category_set)) :
                                    ?>
                                        <option value="<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></option>
                                    <?php endwhile;
                                    mysqli_free_result($category_set); ?>
                                </select>
                                <p class="helper-block"></p>
                            </div>

                            <div class="form-group ">
                                <label for="image">Images</label>
                                <input type="file" accept="image/*" name="file[]" multiple class="form-control">
                                <p class="helper-block text-danger">
                                    <?php
                                    if (!empty($images_errors)) {
                                        foreach ($images_errors as $value) {
                                            echo $value;
                                        }
                                    }
                                    ?>
                                </p>
                            </div>

                            <input class="btn btn-danger" type="submit" name="submit" value="Save">
                        </form>
                        <br><br>
                        <a href="index.php">Back to index</a>
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
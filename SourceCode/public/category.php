<?php
require_once('../lib/database.php');
require_once('../lib/initializePublic.php');

if (!isset($_GET['id'])) {
    redirect_to('all-bridges.php');
}
$id = $_GET['id'];
$category = find_category_by_id($id);
$thisPage = $category['categoryName'];

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    $bridge_set = find_bridges_by_category_country($id, $country);
} else {
    $bridge_set = get_bridges_by_categoryID($id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $category['categoryName'] ?></title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
    <?php include('nav.php');
    $category = find_category_by_id($id); ?>
    <div class="container content">
        <h3 class="h3-category mb-5"><?php echo $category['categoryName']; ?></h3>
        <div class="row mb-5">
            <div class="col-md-4 d-flex flex-wrap justify-content-start">
                <h5 class="font-weight-bold">Categories</h5>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-decoration-none" href="all-bridges.php"><i class="fa fa-circle-o"></i> All bridges</a>
                    </li>
                    <?php
                    $category_set = find_all_categories();
                    while ($category = mysqli_fetch_assoc($category_set)) :
                    ?>
                        <li class="list-inline-item">
                            <a class="text-decoration-none" href="category.php?id=<?php echo $category['categoryID'] ?>"><i class="fa fa-circle-o"></i> <?php echo $category['categoryName'] ?></a>
                        </li>
                    <?php endwhile;
                    mysqli_free_result($category_set); ?>
                </ul>
            </div>
            <div class="col-md-8 d-flex flex-wrap justify-content-start">
                <h5 class="font-weight-bold" style="flex: 0 1 100%;">Countries</h5>
                <ul class="list-inline">
                    <?php
                    $countries = find_country_by_category($id);
                    while ($country = mysqli_fetch_assoc($countries)) :
                    ?>
                        <li class="list-inline-item">
                            <a class="text-decoration-none" href="<?php echo "category.php?id=$id&country=" . $country['country'] ?>"><i class="fa fa-circle-o"></i> <?php echo $country['country'] ?></a>
                        </li>
                    <?php endwhile;
                    mysqli_free_result($countries); ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php
            while ($bridge = mysqli_fetch_assoc($bridge_set)) :
                $thumbnail = get_thumbnail($bridge['bridgeID']);
            ?>
                <div class="col-sm-4 mb-4">
                    <a href="bridge.php?id=<?php echo $bridge['bridgeID'] ?>" class="text-decoration-none">
                        <div class="card">
                            <div class="embed-responsive embed-responsive-4by3">
                                <div class="imageWrapper embed-responsive-item">
                                    <img src="<?php echo $thumbnail['link'] ?>" class="card-img-top lazy" alt="...">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $bridge['name'] ?></h5>
                                <h6 class="card-subtitle"><?php echo $bridge['country'] ?></h6>
                                <p class="card-text"><?php echo $bridge['opened'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            mysqli_free_result($bridge_set); ?>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
db_disconnect($db);
?>
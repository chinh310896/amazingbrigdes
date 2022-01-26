<?php
require_once('../lib/database.php');
$thisPage = 'All bridges';

if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$total_bridges_per_page = 24;
$offset = ($page - 1) * $total_bridges_per_page;
$total_bridges_count = get_total_bridges_count();
$total_no_of_pages = ceil($total_bridges_count / $total_bridges_per_page);
$second_last = $total_no_of_pages - 1;

if (isset($_GET['country'])) {
    $bridge_set = find_bridges_by_country($_GET['country']);
} else {
    $bridge_set = find_bridges_by_page($offset, $total_bridges_per_page);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>All Bridges</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
    <?php include('nav.php') ?>
    <div class="container content">
        <h3 class="h3-category mb-5">All bridges</h3>

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
                <h5 class="font-weight-bold">Countries</h5>
                <ul class="list-inline">
                    <?php
                    $countries = select_country_distinct();
                    while ($country = mysqli_fetch_assoc($countries)) :
                    ?>
                        <li class="list-inline-item">
                            <a class="text-decoration-none" href="<?php echo "all-bridges.php?country=" . $country['country'] ?>"><i class="fa fa-circle-o"></i> <?php echo $country['country'] ?></a>
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
                                <h6 class="card-subtitle"><?php echo $bridge['country'] ?></h5>
                                    <p class="card-text"><?php echo $bridge['opened'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            mysqli_free_result($bridge_set); ?>
        </div>
        <br>

        <ul class="pagination pull-right">
            <li class="page-item <?php echo $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="all-bridges.php?page=<?php echo $page-1 ?>">Previous</a></li>
            <?php for ($i = 1; $i <= $total_no_of_pages; $i++) : ?>
                <li class="page-item <?php echo $page == $i ? 'active' : '' ?>"><a class="page-link" href="all-bridges.php<?php echo $i==1? '' : "?page=$i" ?>"><?php echo $i ?></a></li>
            <?php endfor ?>
            <li class="page-item <?php echo $page == $total_no_of_pages ? 'disabled' : '' ?>"><a class="page-link" href="all-bridges.php?page=<?php echo $page+1 ?>">Next</a></li>
        </ul>
    </div>
    <?php include('footer.php') ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
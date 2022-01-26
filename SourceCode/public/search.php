<?php
require_once('../lib/database.php');
$thisPage = 'Search';

if (isset($_GET['q'])) {
    $input = $_GET['q'];
    $result_set = search($input);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
    <?php include('nav.php'); ?>
    <div class="container content">
        <?php if (mysqli_num_rows($result_set) == 0) : ?>
            <h3>There is no result for "<?php echo $input ?>".</h3>
        <?php else : ?>
            <h3 class="mb-5">Results for "<?php echo $input ?>":</h3>
            <div class="row">
                <?php
                while ($bridge = mysqli_fetch_assoc($result_set)) :
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
                mysqli_free_result($result_set); ?>
            </div>
        <?php endif ?>
    </div>
    <?php include('footer.php') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
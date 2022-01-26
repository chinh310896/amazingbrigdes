<?php
require_once('../lib/database.php');
$thisPage = 'Home page';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazing Bridges</title>
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
  <?php include_once('nav.php') ?>
  <header>
    <div id="headerCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#headerCarousel" data-slide-to="1"></li>
        <li data-target="#headerCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../img/header-1.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../img/header-2.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../img/header-3.jpg" alt="">
        </div>
        <div class="carousel-caption">
          <h1 class="font-weight-bold">Amazing bridges around the world.</h1>
          <a id="exploreBtn" href="#intro-section">EXPLORE
            <i class="fa fa-angle-down"></i>
          </a>
        </div>
      </div>
    </div>

  </header>

  <div class="container-fluid content text-center">
    <div id="intro-section">
      <h2 class="font-weight-bold">Browse our Bridges</h2>
      <a href="all-bridges.php">SEE ALL</a>

      <div style="width: 1px;height:70px;" class="ml-auto mr-auto bg-dark"></div>
      <h2 class="font-weight-bold">Explore our Categories</h2>
    </div>

    <?php
    $category_set = find_all_categories();
    while ($category = mysqli_fetch_assoc($category_set)) :
    ?>
      <div class="container category text-center my-4">
        <h3><a class="text-decoration-none" href="category.php?id=<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></a></h3>
        <div class="row mb-5">
          <div class="col">
            <div id="categoryCarousel<?php echo $category['categoryID'] ?>" class="carousel fdi-Carousel slide" data-ride="carousel" data-interval="10000">
              <div class="carousel-inner row no-gutters">
                <?php
                $bridge_set = get_bridges_by_categoryID($category['categoryID']);
                $count = 0;
                while ($bridge = mysqli_fetch_assoc($bridge_set)) :
                  $thumbnail = get_thumbnail($bridge['bridgeID']);
                ?>

                  <div class="carousel-item<?php echo $count == 0 ? ' active' : '' ?>">
                    <div class="d-block col-3 text-center">
                      <a class="text-decoration-none" href="bridge.php?id=<?php echo $bridge['bridgeID'] ?>">
                        <div class="embed-responsive embed-responsive-1by1">
                          <div class="imageWrapper embed-responsive-item">
                            <img src="<?php echo $thumbnail['link'] ?>" class="img-responsive">
                          </div>
                        </div>
                        <h5 class="mt-3"><?php echo $bridge['name'] ?></h5>
                      </a>
                    </div>
                  </div>
                <?php $count++;
                endwhile;
                mysqli_free_result($bridge_set); ?>
              </div>
              <a class="carousel-control-prev" href="#categoryCarousel<?php echo $category['categoryID'] ?>" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" style="font-size:50px;" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#categoryCarousel<?php echo $category['categoryID'] ?>" role="button" data-slide="next">
                <span class="fa fa-chevron-right" style="font-size:50px;" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

      </div>


    <?php endwhile;
    mysqli_free_result($category_set); ?>

    <div class="photosGallery">

    </div>


  </div>
  <?php include('footer.php') ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>

</html>
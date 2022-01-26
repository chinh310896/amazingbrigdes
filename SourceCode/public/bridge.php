<?php
require_once('../lib/database.php');
require_once('../lib/initializePublic.php');
$thisPage = 'Bridge';

if (!isset($_GET['id'])) {
  redirect_to('homepage.php');
}
$id = $_GET['id'];
$bridge = find_bridge_by_id($id);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <title><?php echo $bridge['name'] ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
  <?php include('nav.php'); ?>
  <div class="container content">
    <div class="row">
      <div class="col-md-6">
        <div id="bridgeImages" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
            <?php echo make_slide_indicators($bridge['bridgeID']);
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $image_set = get_images_by_bridgeID($bridge['bridgeID']);
            $count = 0;
            while ($image = mysqli_fetch_assoc($image_set)) :
            ?>
              <div class="carousel-item<?php echo $count == 0 ? ' active' : '' ?>">
                <div class="embed-responsive embed-responsive-1by1">
                  <div class="imageWrapper embed-responsive-item">
                    <img src="<?php echo $image['link'] ?>" alt="" data-toggle="modal" data-target="#imageModal" data-keyboard="true">
                  </div>
                </div>
              </div>
            <?php
              $count++;
            endwhile;
            mysqli_free_result($image_set);
            ?>
          </div>
          <a class="carousel-control-prev" href="#bridgeImages" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#bridgeImages" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-md-5 offset-md-1">
        <div class="bridge-title mb-5 d-flex justify-content-between">
          <h1><?php echo $bridge['name'] ?></h1>
          <a target="_blank" class="btn align-self-center" data-toggle="tooltip" data-placement="bottom" title="Download bridge information as PDF file" href="download.php?id=<?php echo $bridge['bridgeID'] ?>"><i class="fa fa-file-pdf-o"></i></a>
        </div>
        <div class="bridge-information">
          <div class="accordion" id="accordionBridge">
            <hr>
            <div class="bridge-details header" id="headingOne">
              <div>
                <h4 class="btn mb-0 font-weight-bold d-flex justify-content-between" data-toggle="collapse" data-target="#collapseOne">Details <i class="fa fa-long-arrow-right"></i></h4>
              </div>
            </div>
            <div id="collapseOne" class="collapse collapse-accordion show p-3" aria-labelledby="headingOne" data-parent="#accordionBridge">
              <?php foreach ($bridge as $key => $value) :
                if ($key == 'bridgeID' || $key == 'description' || $key == 'map url') continue;
                if (!empty($value)) : ?>
                  <div class="row">
                    <div class="col-md-4"><?php echo ucfirst($key) ?></div>
                    <div class="col-md-8">
                      <?php echo $value;
                      if ($key == 'total length' || $key == 'height' || $key == 'clerance below' || $key == 'width' || $key == 'span') {
                        echo ' metres';
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
              <?php endif;
              endforeach ?>
            </div>
            <hr>
            <div class="bridge-description header" id="headingTwo">
              <h4 class="btn mb-0 font-weight-bold d-flex justify-content-between" data-toggle="collapse" data-target="#collapseTwo">Description <i class="fa fa-long-arrow-right"></i></h4>
            </div>
            <div id="collapseTwo" class="collapse collapse-accordion" aria-labelledby="headingTwo" data-parent="#accordionBridge">
              <p style="white-space: pre-line"><?php echo $bridge['description'] ?></p>
            </div>
            <hr>
            <div class="bridge-location header" id="headingThree">
              <h4 class="btn mb-0 font-weight-bold d-flex justify-content-between" data-toggle="collapse" data-target="#collapseThree">See on map <i class="fa fa-long-arrow-right"></i></h4>
            </div>
            <div id="collapseThree" class="collapse collapse-accordion" aria-labelledby="headingThree" data-parent="#accordionBridge">
              <iframe src="<?php echo $bridge['map url'] ?>" width="400px" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <hr>
            <div id="collapseFour" class="collapse collapse-accordion" aria-labelledby="headingFour" data-parent="#accordionBridge">
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="modal" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModal" aria-hidden="true">
      <div class="fixed-top">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="galleryCarousel" class="carousel slide h-100" data-ride="carousel" data-interval="false">
        <div class="carousel-inner h-100">
          <?php
          $image_set = get_images_by_bridgeID($bridge['bridgeID']);
          while ($image = mysqli_fetch_assoc($image_set)) :
          ?>
            <div class="carousel-item">
              <div class="imageWrapper">
                <img src="<?php echo $image['link'] ?>" alt="">
              </div>
            </div>
          <?php endwhile;
          mysqli_free_result($image_set); ?>
        </div>
        <a class="carousel-control-prev" href="#galleryCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <br>

    <div class="ad mt-5 d-flex justify-content-center">
      <a href="https://www.tripadvisor.com.vn/Attractions-g186338-Activities-c47-t5-London_England.html" target="_blank">
        <img class="img-fluid" src="../img/ad.png"></img>
      </a>
    </div>
    <br>

    <div class="relatedBridges mt-5 text-center">
      <h3>Keep exploring</h3>
      <div class="row">
        <div class="col">
          <div id="relatedBridgeCarousel" class="carousel fdi-Carousel slide" data-ride="carousel" data-interval="50000">
            <div class="carousel-inner row no-gutters">
              <?php
              $bridge_set = get_related_bridges($bridge['bridgeID']);
              $count = 0;
              while ($bridge = mysqli_fetch_assoc($bridge_set)) :
                $thumbnail = get_thumbnail($bridge['bridgeID'])
              ?>

                <div class="carousel-item<?php echo $count == 0 ? ' active' : '' ?>" style="height: auto;">
                  <div class="d-block col-3 text-center">
                    <a class="text-decoration-none" href="bridge.php?id=<?php echo $bridge['bridgeID'] ?>">
                      <div class="embed-responsive embed-responsive-1by1">
                        <div class="imageWrapper embed-responsive-item">
                          <img src="<?php echo $thumbnail['link'] ?>" class="img-responsive lazy">
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
            <a class="carousel-control-prev" href="#relatedBridgeCarousel" role="button" data-slide="prev">
              <span class="fa fa-angle-double-left" style="font-size:48px;" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#relatedBridgeCarousel" role="button" data-slide="next">
              <span class="fa fa-angle-double-right" style="font-size:48px;" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
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
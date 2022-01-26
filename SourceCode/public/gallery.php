<?php
require_once('../lib/database.php');
$thisPage = 'Gallery';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
    <?php include_once('nav.php') ?>
    <div class="container-fluid content">
        <h1 class="text-center">Photos Gallery</h1>
        <div class="d-flex flex-row flex-wrap justify-content-center" id="photo-grid">
            <?php
            $image_set = find_all_images();
            $images_each_column_count = ceil(mysqli_num_rows($image_set) / 4);
            for ($i = 0; $i < 4; $i++) :
            ?>
                <div class="d-flex flex-column">
                    <?php
                    for ($j = 0; $j < $images_each_column_count; $j++) :
                        if ($image = mysqli_fetch_assoc($image_set)) : ?>
                            <div class="hovereffect">
                                <?php if ($j < 3) : ?>
                                    <img src="<?php echo $image['link'] ?>" class="img-fluid" data-toggle="modal" data-target="#imageModal" data-keyboard="true">
                                <?php else : ?>
                                    <img data-src="<?php echo $image['link'] ?>" class="img-fluid lazy" data-toggle="modal" data-target="#imageModal" data-keyboard="true">
                                <?php endif; ?>
                                <div class="overlay"></div>
                            </div>
                    <?php
                        endif;
                    endfor; ?>
                </div>
            <?php endfor;
            mysqli_free_result($image_set); ?>
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
                $image_set = find_all_images();
                while ($image = mysqli_fetch_assoc($image_set)) :
                ?>
                    <div class="carousel-item">
                        <div class="imageWrapper">
                            <img src="<?php echo $image['link'] ?>" alt="">
                        </div>
                        <div class="carousel-caption">
                            <h3><?php echo ucwords(str_replace('-', ' ', substr($image['link'], 7, -strlen($image['link']) + strrpos($image['link'], '-')))); ?></h3>
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

    <?php include_once('footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages;

            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        })
    </script>
</body>

</html>
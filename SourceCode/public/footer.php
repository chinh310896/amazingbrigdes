<footer class="page-footer font-small text-light mt-5">
    <div class="container-fluid text-center text-md-left">
        <br><br>
        <div class="row">
            <div class="col-md-3 offset-md-2">
                <h5 class="text-uppercase">Amazing Bridges</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all-bridges.php">All bridges</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>TOP CATEGORIES</h5>
                <ul class="list-unstyled">
                    <?php
                    $category_set = find_all_categories();
                    while ($category = mysqli_fetch_assoc($category_set)) :
                    ?>
                        <li class="list-unstyled"><a href="category.php?id=<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></a></li>
                    <?php
                    endwhile;
                    mysqli_free_result($category_set); ?>
                </ul>
            </div>
                <div class="col-md-3">
                    <a href="https://www.facebook.com/groups/BetheBridge/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="https://twitter.com/hashtag/bridges"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com/Bridges"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                    <a href="mailto:theamazingbridges@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2020
        <a href="index.php">AMAZING BRIDGES</a>
    </div>
</footer>
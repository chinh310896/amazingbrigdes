<nav class="navbar navbar-expand-md fixed-top shadow">
    <a class="navbar-brand h-100" href="index.php">
        <img class="d-inline-block h-100" src="../img/logo.png" alt="Amazing Bridge" id="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-center text-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
                <a <?php echo $thisPage == 'All bridges' ? 'id="currentPage"' : '' ?> class="nav-link" href="all-bridges.php">Browse</a>
            </li>
            <?php
            $category_set = find_all_categories();
            while ($category = mysqli_fetch_assoc($category_set)) :
            ?>
                <li class="nav-item"><a <?php echo $thisPage == $category['categoryName'] ? 'id="currentPage"' : '' ?> class="nav-link" href="category.php?id=<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></a></li>
            <?php
            endwhile;
            mysqli_free_result($category_set); ?>
            <li class="nav-item">
                <a <?php echo $thisPage == 'Gallery' ? 'id="currentPage"' : '' ?> class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a <?php echo $thisPage == 'About' ? 'id="currentPage"' : '' ?> class="nav-link" href="about.php">About Us</a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Search
            </a>
            <div class="dropdown-menu dropdown-menu-md-right" id="searchBox" aria-labelledby="navbarDropdown">
                <form class="form-inline px-3" action="search.php" method="get">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="search" placeholder="Search here..." name="q" />
                        <button class="input-group-append btn bg-transparent" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</nav>

<div id="shownav" class="fixed-top" style="height: 20px;"></div>
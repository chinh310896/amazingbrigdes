<?php
if(isset($_SESSION['user'])):
?>
<em><?php echo $_SESSION['user'] ?></em>
<a href="../admin/logout.php" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
<?php endif;?>

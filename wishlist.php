<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    /* include wishlist template */
    include ('template/_wishlist_template.php');
    /* include wishlist template */
?>

<?php
    /* include new arrivals */
        include('template/_new-arrivals.php');
    /* include new arrivals */
?>

<?php
//include footer.php file
include('footer.php');
?>
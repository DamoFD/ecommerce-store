<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    /* include cart template */
    include('template/_cart-template.php');
    /* include cart template */
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
<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    /* include declined section */
    include('template/_declined.php');
    /* include declined section */
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
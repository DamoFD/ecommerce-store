<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    /* include confirmation section */
    include('template/_confirmation.php');
    /* include confirmation section */
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
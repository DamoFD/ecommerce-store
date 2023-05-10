<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    /* include featured */
        include('template/_featured-categories.php');
    /* include featured */
?>

<?php
    /* include banner ads */
        include('template/_banner-ads.php');
    /* include banner ads */
?>

<?php
    /* include blogs */
        include('template/_blogs.php');
    /* include blogs */
?>

<?php
//include footer.php file
include('footer.php');
?>


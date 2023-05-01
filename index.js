$(document).ready(function(){

    //banner carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
    });

    //top sale carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector: ".grid-item",
        layoutMode: "fitRows",
    });

    $(".button-group").on("click", "button", function (event) {
        event.preventDefault();
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({ filter: filterValue });

        // Toggle the is-checked class for the buttons
        $(".button-group .btn").removeClass("is-checked");
        $(this).addClass("is-checked");
    });

});
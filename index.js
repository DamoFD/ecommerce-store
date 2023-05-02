$(document).ready(function(){

    //banner carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
        nav: true
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

    //new phones carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
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

    //blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    });

    //product qty section
    let $qty__up = $(".qty .qty-up");
    let $qty__down = $(".qty .qty-down");
    let $input = $(".qty .qty-input");

    //click qty up button
    $qty__up.click(function(e) {
        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val(function(i, oldval) {
                return ++oldval;
            })
        }
    });

    //click qty down button
    $qty__down.click(function(e) {
        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val(function(i, oldval) {
                return --oldval;
            })
        }
    });

});

document.addEventListener("DOMContentLoaded", function() {
	var menuToggle = document.querySelector(".menu-toggle");
  
	if (menuToggle) {
	  menuToggle.addEventListener("click", function() {
		var nav = document.querySelector(".main-nav");
		nav.classList.toggle("mobile-nav");
		this.classList.toggle("is-active");
	  });
	}
  });
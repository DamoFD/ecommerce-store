$(document).ready(function () {
  //banner carousel
  $("#banner-area .owl-carousel").owlCarousel({
    loop: true,
    dots: false,
    items: 1,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
  });

  //featured carousel
  $("#featured .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // isotope filter
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "masonry",
    masonry: {
      columnWidth: ".grid-item",
      percentPosition: true,
    },
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
  $("#new-arrivals .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  //blogs owl carousel
  $("#blogs .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
    },
  });

  //product qty section
  let $qty__up = $(".qty .qty-up");
  let $qty__down = $(".qty .qty-down");
  let $deal_price = $("#deal-price");
  //let $input = $(".qty .qty-input");

  //click qty up button
  $qty__up.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // change product price using ajax call
    $.ajax({
      url: "template/ajax.php",
      type: "post",
      data: { itemid: $(this).data("id") },
      success: function (result) {
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() >= 1 && $input.val() <= 9) {
          $input.val(function (i, oldval) {
            return ++oldval;
          });

          //increase price of the product
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // set subtotal price
          let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax request
  });

  //click qty down button
  $qty__down.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // change product price using ajax call
    $.ajax({
      url: "template/ajax.php",
      type: "post",
      data: { itemid: $(this).data("id") },
      success: function (result) {
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() > 1 && $input.val() <= 10) {
          $input.val(function (i, oldval) {
            return --oldval;
          });

          //increase price of the product
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // set subtotal price
          let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax request
  });

  //color picker
  $(".color button").on("click", function () {
    $(".color button").removeClass("active-border");
    $(this).addClass("active-border");

    const colorName = $(this).data("color-name");
    $("p.color-text").text("Color: " + colorName);
  });

  //size picker
  $(".size button").on("click", function () {
    $(".size button").removeClass("active-background");
    $(this).addClass("active-background");

    const sizeName = $(this).data("size");
    $("p.size-text").text("Size: " + sizeName);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var menuToggle = document.querySelector(".menu-toggle");

  if (menuToggle) {
    menuToggle.addEventListener("click", function () {
      var nav = document.querySelector(".nav");
      nav.classList.toggle("mobile-nav");
      this.classList.toggle("is-active");
    });
  }
});

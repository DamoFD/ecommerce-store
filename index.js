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

  // cart qty section
  let $qty__up = $(".qty .qty-up");
  let $qty__down = $(".qty .qty-down");
  let $deal_price = $("#deal-price");
  //let $input = $(".qty .qty-input");

  //click qty up button
  $qty__up.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    console.log("Data sent:", {
      updateCart: true,
      itemid: $(this).data("id"),
      userid: currentUserId,
      new_quantity: parseInt($input.val()) + 1
    });
    // change product price using ajax call
    $.ajax({
      url: "template/ajax.php",
      type: "post",
      data: {
        getitem: true,
        updateCart: true,
        itemid: $(this).data("id"),
        userid: currentUserId,
        new_quantity: parseInt($input.val()) + 1
      },
      success: function (result) {
        console.log('AJAX response: ', result);
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() >= 1 && $input.val() <= 9) {
          $input.val(function (i, oldval) {
            return ++oldval;
          });
        }
      },
    }); // closing ajax request
  });

  //click qty down button
  $qty__down.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    console.log("Data sent:", {
      updateCart: true,
      itemid: $(this).data("id"),
      userid: currentUserId,
      new_quantity: parseInt($input.val()) - 1
    });

    // change product price using ajax call
    $.ajax({
      url: "template/ajax.php",
      type: "post",
      data: {
        getitem: true,
        updateCart: true,
        itemid: $(this).data("id"),
        userid: currentUserId,
      new_quantity: parseInt($input.val()) - 1
    },
      success: function (result) {
        console.log(result);
        let obj = JSON.parse(result);
        let item_price = obj[0]["item_price"];

        if ($input.val() > 1 && $input.val() <= 10) {
          $input.val(function (i, oldval) {
            return --oldval;
          });
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
    console.log(colorName);

    // Update input field
    $("#color_input").attr('value', colorName);
  });

  //size picker
  $(".size button").on("click", function () {
    $(".size button").removeClass("active-background");
    $(this).addClass("active-background");

    const sizeName = $(this).data("size");
    $("p.size-text").text("Size: " + sizeName);
    console.log(sizeName)

    // Update input field
    $("#size_input").attr('value', sizeName);
  });

  // product quantity section
  let $p__qty__up = $(".p-qty .p-qty-up");
  let $p__qty__down = $(".p-qty .p-qty-down");

  // click qty up
  $p__qty__up.click(function (e) {
    let $input = $(`.p-qty-input[data-id='pro1']`);
    if ($input.val() >= 1 && $input.val() <= 9) {
      $input.val(function (i, oldval) {
        $('#quantity_input').val(++oldval);
        return oldval;
      });
    }
  });

  // click qty down
  $p__qty__down.click(function (e) {
    let $input = $(`.p-qty-input[data-id='pro1']`);
    if ($input.val() > 1 && $input.val() <= 10) {
      $input.val(function (i, oldval) {
        $('#quantity_input').val(--oldval);
        return oldval;
      });
    }
  });

  //registration
  $("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    if ($password.val() === $confirm.val()) {
      return true;
    } else {
      $error.text("Passwords do not match");
      event.preventDefault();
    }
  })
});

document.addEventListener("DOMContentLoaded", function () {
  var menuToggle = document.querySelector(".menu-toggle");

  // Mobile Nav Toggle
  if (menuToggle) {
    menuToggle.addEventListener("click", function () {
      var nav = document.querySelector(".nav");
      nav.classList.toggle("mobile-nav");
      this.classList.toggle("is-active");
    });
  }

  // Stripe Checkout Submission
  if (window.Stripe) {
  const stripe = Stripe("pk_test_51N4SejBJNq2qisEJuTQKGgW2aCH3k9hb9VBbjovkVoy9wLpSastgbLjUbl2OYWUgymyr7vKa7g8MXzzjYC4nDUVK001HcZwohs");
  const btn = document.querySelector('#stripe-btn');

  if (btn) {//check if btn exists
  btn.addEventListener('click', () => {
    fetch('./database/Checkout.php', {
      method: "POST",
      headers: {
        'Content-Type' : 'application/json',
      },
      body: JSON.stringify({})
    }).then(res => res.json())
    .then(payload => {
      stripe.redirectToCheckout({sessionId: payload.id})
    })
  })
}
  }

});

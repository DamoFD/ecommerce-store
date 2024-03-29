</main>
    <!--!start #main-->

    <!--start #footer-->
    <footer class="color-primary-bg" id="footer">
      <div class="footer-container">
        <div class="row">
          <div class="col">
            <h2 class="font-mont font-size-lg">Luxe Style Society</h2>
            <p class="font-size-20 font-roboto">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure
              dolore, possimus suscipit sed aliquid dolores consequuntur
              inventore totam ex saepe.
            </p>
          </div>
          <div class="col">
            <h3 class="font-mont font-size-lg">Newsletter</h3>
            <form>
              <div class="col">
                <input class="font-size-20" type="text" placeholder="Email" />
              </div>
              <button class="color-primary font-size-20" type="submit">
                Subscribe
              </button>
            </form>
          </div>
          <div class="col">
            <h3 class="font-mont font-size-lg">Information</h3>
            <nav>
              <ul>
                <li>
                  <a href="#" class="font-roboto font-size-20">About Us</a>
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20"
                    >Delivery Information</a
                  >
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20"
                    >Privacy Policy</a
                  >
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20"
                    >Terms & Conditions</a
                  >
                </li>
              </ul>
            </nav>
          </div>
          <div class="col">
            <h3 class="font-mont font-size-lg">Account</h3>
            <nav class="account-nav">
              <ul>
                <li>
                  <a href="#" class="font-roboto font-size-20">My Account</a>
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20">Order History</a>
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20">Wish List</a>
                </li>
                <li>
                  <a href="#" class="font-roboto font-size-20">Newsletters</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <p class="font-roboto font-size-14">
          &copyCopyrights 2023. Designed By <a href="#">Damion Voshall</a>
        </p>
      </div>
    </footer>
    <!--!start #footer-->

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      defer
    ></script>

    <!--Owl-carousel-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      defer
    ></script>

    <!--Isotope Plugin-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
      integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      defer
    ></script>

    <!-- Stripe -->
    <?php
    // Check if the current page is the cart page
    $currentPage = basename($_SERVER['PHP_SELF']);
    $cartPage = 'cart.php';

    if($currentPage == $cartPage) {
    echo '<script defer src="https://js.stripe.com/v3/"></script>';
    }
    ?>

    <!-- Global User JS variable -->
    <?php if(isset($currentUser['user_id'])):?>
      <script async>
        const currentUserId = <?php echo $currentUser['user_id']; ?>;
      </script>
    <?php endif; ?>

    <!--Custom Javascript-->
    <script defer src="./index.js"></script>
  </body>
</html>

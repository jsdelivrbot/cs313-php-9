<?php // TODO: ask the user for the different components of their address. NO CREDIT CARD INFO ?>
<?php // TODO: option to complete the purchase or return to the cart. ?>
<?php // TODO: After checkout, go to confirmation ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </head>
  <body>
    <style media="screen">
      body {
        background: #FAFAFA;
      }
      .active{
        font-weight: bold;
        opacity: 1;
      }
      #form {
        padding: 2em;
        margin: 2em auto;
      }
    </style>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Outdoorzy</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="browse.php">Browse</a>
            <a class="mdl-navigation__link" href="cart.php">View Cart</a>
            <a class="mdl-navigation__link active" href="#">Checkout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Outdoorzy</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="browse.php">Browse</a>
          <a class="mdl-navigation__link" href="cart.php">View Cart</a>
          <a class="mdl-navigation__link active" href="#">Checkout</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
          <div id="form" class="mdl-card mdl-shadow--2dp">
          <form action="confirm.php" method="post" onsubmit="return validate()">
            <div class="mdl-typography--display-1">Checkout</div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" name="name" pattern="[A-Z,a-z, ]*">
              <label class="mdl-textfield__label" for="name">Name</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" name="address" pattern="[0-9]+.+">
              <label class="mdl-textfield__label" for="address">Address</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" name="city" pattern="[A-Z,a-z, ]+">
              <label class="mdl-textfield__label" for="city">City</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" name="state" pattern="[A-Z,a-z, ]+">
              <label class="mdl-textfield__label" for="state">State</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="zipcode">
              <label class="mdl-textfield__label" for="zipcode">Zipcode</label>
              <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <br>
            <input type="hidden" name="products" value="<?php if(isset($_SESSION["cartProducts"])) echo json_encode($_SESSION["cartProducts"]); ?>">
            <button id="submitButton" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value=" ">
              Submit
            </button>
          </form>
        </div>
        </div>
      </main>
      <!-- SNACKBAR -->
      <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button type="button" class="mdl-snackbar__action"></button>
      </div>

      <script src="main.js" charset="utf-8"></script>
  </body>
</html>

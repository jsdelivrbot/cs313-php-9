<?php // TODO: display all the items they have just purchased as well as the address it will be shipped too. ?>
<?php // TODO: Make sure to check for malicious injection, especially from free-entry fields like the address. ?>
<?php session_start(); ?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
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
      .active{
        font-weight: bold;
        opacity: 1;
      }
      .demo-card-wide.mdl-card {
        width: 512px;
      }
      .demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 100px;
        background: #46B6AC;
      }
      .demo-card-wide > .mdl-card__menu {
        color: #fff;
      }
      #successCard {
        margin: 1em auto;
      }
      #infoList {
        margin: 1em auto;
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
            <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Outdoorzy</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="browse.php">Browse</a>
          <a class="mdl-navigation__link" href="cart.php">View Cart</a>
          <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
          <!-- SUCCESS CARD -->
          <div id="successCard" class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Order submitted!</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <div class="mdl-typography--display-1"><?php echo $_POST["name"]; ?></div>
              <div class="mdl-typography--headline"><?php echo $_POST["address"] ?></div>
              <div class="mdl-typography--headline"><?php echo $_POST["city"].", ".$_POST["state"] ?></div>
              <div class="mdl-typography--headline"><?php echo $_POST["zipcode"] ?></div>
              <!-- START -->
              <table id="infoList" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                  <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if ($_SESSION && $_SESSION["cartProducts"]) {

                      $products = $_SESSION["cartProducts"];
                      unset($_SESSION["cartProducts"]);
                      foreach ($products as $product) {
                        echo "<tr id=\"". $product->id ."\">";
                        echo "<td class=\"mdl-data-table__cell--non-numeric\">".$product->name."</td>";
                        echo "<td>1</td>";
                        echo "<td>$".$product->price."</td>";
                        echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse.php">
                Back to Browse
              </a>
            </div>
          </div>
        </div>
      </main>
      <script src="main.js" charset="utf-8"></script>
  </body>
</html>
<?php else: echo "You done messed up A-A-Ron..."; endif; ?>

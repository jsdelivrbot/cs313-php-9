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
      #summaryCard {
        margin: 2em auto;
        width: 512px;
      }
      #productTable {
        margin: 2em auto;
      }
      #checkoutButton {
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
            <a class="mdl-navigation__link active" href="#">View Cart</a>
            <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Outdoorzy</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="browse.php">Browse</a>
          <a class="mdl-navigation__link active" href="#">View Cart</a>
          <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
          <div id="summaryCard" class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Your Cart</h2>
            </div>
          <table id="productTable" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
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
          <?php
            $total = 0;
            if (isset($_SESSION["cartProducts"])) {
              foreach ($_SESSION["cartProducts"] as $product) {
                $total += (float)$product->price;
              }
            }
           ?>
          <div class="mdl-typography--headline mdl-card__title"><?php echo "Total: $"; echo ($total) ? $total : "0.00"; ?></div>
          <button id="removeItems" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Remove items
          </button>
          <a id="checkoutButton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" href="checkout.php">
            Checkout
          </a>
        </div>
        </div>
      </main>
      <script src="main.js" charset="utf-8"></script>
  </body>
</html>

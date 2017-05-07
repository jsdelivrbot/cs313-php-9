<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Browse items</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </head>
  <body>
    <!-- Square card -->
    <style>
    .demo-card-square.mdl-card {
      width: 310px;
      height: 310px;
    }
    .demo-card-square > .mdl-card__title {
      color: #fff;
      background: #46B6AC;
    }
    .active {
      font-weight: bold;
      opacity: 1;
    }
    </style>

 <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
   <header class="mdl-layout__header">
     <div class="mdl-layout__header-row">
       <!-- Title -->
       <span class="mdl-layout-title">Outdoorzy</span>
       <div class="mdl-layout-spacer"></div>
       <nav class="mdl-navigation mdl-layout--large-screen-only">
         <a class="mdl-navigation__link active" href="#">Browse</a>
         <a class="mdl-navigation__link" href="cart.php">View Cart</a>
         <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
       </nav>
       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                   mdl-textfield--floating-label mdl-textfield--align-right">
         <label class="mdl-button mdl-js-button mdl-button--icon"
                for="waterfall-exp">
           <i class="material-icons">search</i>
         </label>
         <div class="mdl-textfield__expandable-holder">
           <input class="mdl-textfield__input" type="text" name="search"
                  id="waterfall-exp" onkeypress="return onEnterPress(event)">
         </div>
       </div>
     </div>
   </header>
   <div class="mdl-layout__drawer">
     <span class="mdl-layout-title">Outdoorzy</span>
     <nav class="mdl-navigation">
       <a class="mdl-navigation__link active" href="#">Browse</a>
       <a class="mdl-navigation__link" href="cart.php">View Cart</a>
       <a class="mdl-navigation__link" href="checkout.php">Checkout</a>
     </nav>
   </div>
   <main class="mdl-layout__content">
     <div class="page-content">
        <div class="mdl-grid">
          <?php
            $productsUrl = './products.json';
            $fileContents = file_get_contents($productsUrl);
            $products = json_decode($fileContents, false);
            foreach ($products as $product):
              $product->id = uniqid();
              ?>
            <!-- Product Markup -->
                  <div class="mdl-cell mdl-cell--4-col">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__title mdl-card--expand">
                        <h2 class="mdl-card__title-text"><?php echo $product->name ?></h2>
                      </div>
                      <div class="mdl-card__supporting-text">
                        $<?php echo $product->price ?>
                      </div>
                      <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect add-to-cart"  data-name="<?php echo $product->name ?>" data-price="<?php echo $product->price ?>" data-id="<?php echo $product->id ?>">
                          Add to Cart
                        </a>
                      </div>
                    </div>
                  </div>
           <?php endforeach; ?>
          </div>

        <!-- SNACKBAR -->
        <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
          <div class="mdl-snackbar__text"></div>
          <button type="button" class="mdl-snackbar__action"></button>
        </div>

      </div>
    </main>
    </div>

    <!-- SCRIPT -->
    <script src="main.js" charset="utf-8"></script>

  </body>
</html>

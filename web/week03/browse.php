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
    <button type="button" name="button" onclick="showTestSnackBar()">Hey</button>
    <!-- TODO: list of items they can add to their cart and purchase.

    TODO: button or link to add an item to the cart. (Store it to session, keep user on browse page) -->
    <?php // TODO: contain a link to view the cart ?>

    <?php // TODO: Write a function to handle adding product to cart ?>


    <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
      <div class="mdl-snackbar__text"></div>
      <button type="button" class="mdl-snackbar__action"></button>
    </div>

    <!-- TODO: Load scripts -->
    <script src="main.js" charset="utf-8"></script>
  </body>
</html>

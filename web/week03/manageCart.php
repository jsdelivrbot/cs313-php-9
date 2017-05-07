<?php
  session_start();

  function compareObjects($obj_a, $obj_b) {
    return $obj_a->id == $obj_b->id;
  }

  if ($_SESSION["cartProducts"] == null) {
    $_SESSION["cartProducts"] = array();
  }

  switch ($_POST["type"]) {
    case 'add':
      array_push($_SESSION["cartProducts"], json_decode($_POST["products"], false));
      break;
    case 'remove':
      //Get the products through the key
      echo "CURRENT PRODUCTS: \n";
      var_dump($_SESSION["cartProducts"]);
      $removeIDs = json_decode($_POST["products"]);
      foreach ($_SESSION["cartProducts"] as $product) {
        if (in_array($product->id, $removeIDs)) {
          $index = array_search($product, $_SESSION["cartProducts"]);
          unset($_SESSION["cartProducts"][$index]);
        }
      }
      if(empty($_SESSION["cartProducts"])) {
        unset($_SESSION["cartProducts"]);
      }
      break;
    case 'clear':
      unset($_SESSION["cartProducts"]);
      break;
    default:
      # code...
      break;
  }
 ?>

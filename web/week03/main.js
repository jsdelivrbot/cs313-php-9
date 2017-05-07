const ADD = "add";
const REMOVE = "remove";
const CLEAR = "clear";
const ALERT = "alert";
const MANAGE_URL = "manageCart.php";
const BROWSE_PAGE = "browse.php";
const CART_PAGE = "cart.php";
const CHECKOUT_PAGE = "checkout.php";

window.onload = function () {
  initButtons();
};

/*******************************
 * SHOW_SNACKBAR
 *******************************/
function showSnackBar(product, _message, type) {
  // TODO: After form is submitted and the response code comes back okay, perform this function with the data
  var notification = document.querySelector('.mdl-js-snackbar');
  var data = {
    message: _message,
    actionHandler: function (type, e) {
      switch (type) {
        case ADD:
          //Remove what you just added
          var array = [];
          array.push(this);
          console.debug(array);
          var params = encodeURI("products=" + JSON.stringify(array) + "&type=" + REMOVE);
          sendRequest(params);
          break;
        case REMOVE:
          break;
        default:
      }
    }.bind(product,type),
    actionText: 'Undo',
    timeout: 2000
  };
  if (type == ALERT) {
    data = {
      message: _message,
      timeout: 2000
    }
  }
  notification.MaterialSnackbar.showSnackbar(data);
}

/*******************************
 * INIT_BUTTONS
 *******************************/
function initButtons() {
  var page = window.location.pathname.split("/").pop();
  console.debug("PAGE",page);
  switch (page) {
    case BROWSE_PAGE:
      var productButtons = document.getElementsByClassName('add-to-cart');
      for (button of productButtons) {
        button.addEventListener('click', handleAction(ADD));
      }
      break;
    case CART_PAGE:
      var clearCartButton = document.querySelector("#removeItems");
      clearCartButton.addEventListener("click", handleAction(REMOVE));
      break;
    case CHECKOUT_PAGE:
      var submitButton = document.querySelector('#submitButton');
      submitButton.addEventListener("click", validate);
      break;
    default:
      break;
  }

}

function onEnterPress(e) {
  if (e.keyCode == 13 && e.target.value != "") {
    console.debug("Enter pressed!");
  }
}

/*******************************
 * CLEAR_CART
 *******************************/
function clearCart() {
  var params = encodeURI("type=" + CLEAR);
  sendRequest(params);
}

/*******************************
 * REMOVE_PRODUCT
 *******************************/
function removeProduct(e) {
  var selected = document.querySelectorAll('.is-selected');
  var checked = document.querySelector('TH').querySelector('.is-checked');
  if (checked != null) {
    clearCart();
    location.reload();
    return;
  }
  //Scrape the id from the page.
  var products = [];
  for (product of selected) {
    products.push(product.id);
  }
  var params = encodeURI("products=" + JSON.stringify(products) + "&type=" + REMOVE);
  sendRequest(params);
  location.reload();
}

/*******************************
 * ADD_PRODUCT
 *******************************/
function addProduct(e) {
  var args = e.target.parentNode.dataset;
  var newProduct = { "name": args.name, "price": Number(args.price), "id": args.id};
  var params = encodeURI("products=" + JSON.stringify(newProduct) + "&type=" + ADD);
  var callback = function () {
    return showSnackBar(newProduct, "Added " + newProduct.name + " to cart", ADD);
  };
  sendRequest(params, callback);
}

/*******************************
 * MANAGE_CART
 *******************************/
function manageCart(e,type) {
  switch (type) {
    case ADD:
      addProduct(e);
      break;
    case REMOVE:
      removeProduct(e);
      break;
    case CLEAR:
      clearCart();
      break;
    default:

  }
}


/*******************************
 * SEND_REQUEST
 *******************************/
function sendRequest(params, callback) {
  var ajax = new XMLHttpRequest();
  ajax.open('POST', MANAGE_URL, true);
  ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      if (callback) {
        callback();
      }
    }
  };
  ajax.send(params);
}

/** VALIDATE **/
function validate() {
  var form = document.forms[0];
  for (field of form) {
    if (field.value == "") {
      if (field.type == "hidden") {
        showSnackBar(null, "There are no products!", ALERT);
      }
      field.required = true;
      return false;
    }
  }
  return true;
}

/** HELPER FUNCTION FOR CALLBACK **/
function handleAction(type) {
  return function (e) {
    manageCart(e, type);
  };
}

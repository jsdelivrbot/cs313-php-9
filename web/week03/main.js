// TODO: Load product data from json; inject into page
body.addEventListener("load", loadProducts, false);


function loadProducts() {
  console.debug("Hi!");
}
//Script for snackbar

function showTestSnackBar() {
  // TODO: After form is submitted and the response code comes back okay, perform this function with the data
  var notification = document.querySelector('.mdl-js-snackbar');
  var data = {
    message: 'Message Sent',
    actionHandler: function(event) {},
    actionText: 'Undo',
    timeout: 4000
  };
  notification.MaterialSnackbar.showSnackbar(data);
}

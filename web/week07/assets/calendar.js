$('.l-date--event').on('mouseenter', function(){
  var EventTip = $('<span class="eventTip" />');
  var EventDescribe = $(this).attr('data-event');
  EventTip.html(EventDescribe);
  $(this).append(EventTip);
});

$('.l-date--event').on('mouseleave', function(){
  $('.eventTip').remove();
});

var buttons = document.querySelectorAll('.addElement');
console.log(buttons);
var dialog = document.querySelector('dialog');
if (! dialog.showModal) {
  dialogPolyfill.registerDialog(dialog);
}
for (button of buttons) {
  button.addEventListener('click', function() {
    dialog.showModal();
  });  
}
dialog.querySelector('.close').addEventListener('click', function() {
  dialog.close();
});

// Datepicker
$(function () {
  $( "#datepicker" ).datepicker(); 
});
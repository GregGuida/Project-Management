/* Author: 

*/



$(document).ready(function() {
  $('#checkout-with-paypal').click(function(e) {
    e.preventDefault();
    var el = $(this), 
        form = el.parents('form');

    form.submit();
  }); 
});

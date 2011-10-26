/* Author: 

*/



$(document).ready(function() {


  // common
  // navigation roundabout
  $('#category-nav-list').find('li').focus(function() {
    var el = $(this), useText = el.data('text');
    el.find('.category-name').html(useText).fadeIn(200);
  }).blur(function() {
    $(this).find('.category-name').fadeOut(100);
  })
  .end().roundabout({tilt: 3, maxOpacity: 1, minOpacity: 0.5})



  // order checkout page
  $('#checkout-with-paypal').click(function(e) {
    e.preventDefault();
    var el = $(this), 
        form = el.parents('form');

    form.submit();
  }); 
});

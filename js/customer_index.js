var CUSTOMER_INDEX = (function(doc, $){

  var customers = $('#customer-list'),
      actions = $('#customer-actions');

  return {
    init : function() {
      customers.delegate('li a', 'click', function(e) {
        e.preventDefault();
        var el = $(this), par = el.parent(), id = par.data('id');
        par.addClass('hover').siblings().removeClass('hover');
        actions.show()
        .find('a').attr('href', function(i, attr) {
          return attr.replace(/\/\d+$/, '') + '/' + id;
        });
      });
    }
  };
}(document, jQuery));

$(document).ready( CUSTOMER_INDEX.init );

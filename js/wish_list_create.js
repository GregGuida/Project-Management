$(document).ready(function() {
    $('#wish-list-create').click(function(e) {
        e.preventDefault();
        
        var form_data = {
            'name': $("#wish-list-name").val(),
            'ajax':'1'
        };
        
        $.post('/wish_lists/create',
               form_data,
               function(data) {
                   console.log("Returned...");
                   var ret_val = $.parseJSON(data),
                       alert_div = $('div.alert-message').size() === 0 ? document.createElement('div') : $('div.alert-message').removeClass().html("");
           
                   if(ret_val.status === "error") {
                       alert_div = $(alert_div).addClass("alert-message error").append(ret_val.message);
                       $('#main').prepend(alert_div);
                   }
                   else {
                       // Create all the necessary elements
                       alert_div = $(alert_div).addClass("alert-message success").append(ret_val.message);
                       
                       var wish_list_item = $('<li>' +
                                                  '<b>'+ $("#wish-list-name").val() +'</b>' +
                                                  '<a href="/wish_lists/show/' + ret_val.wish_id + '" class="btn pull-right">View</a>' +
                                              '</li>');
                        
                       $(wish_list_item).hide();  
                       
                       $('#main').prepend(alert_div);
                       $('#account-wish-lists').append(wish_list_item);
                       $(wish_list_item).fadeIn();
                       
                       $('#wish-list-name').val("");
                   }
               });
    });
});
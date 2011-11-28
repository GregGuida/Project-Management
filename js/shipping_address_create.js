$(document).ready(function() {
    $('#shipping-address-create').click(function(e) {
        e.preventDefault();
        
        var form_data = {
            'address_one': $('#complete-address-one').val(),
            'city': $('#complete-city').val(),
            'state': $('#complete-state').val(),
            'zip': $('#complete-zipcode').val(),
            'ajax':'1'
        };

        $.post('/shipping_addresses/create',
               form_data,
               function(data) {
                   var ret_val = $.parseJSON(data),
                       alert_div = $('div.alert-message').size() === 0 ? document.createElement('div') : $('div.alert-message').removeClass().html("");
           
                   if(ret_val.status === "error") {
                       alert_div = $(alert_div).addClass("alert-message error").append(ret_val.message);
                       $('#main').prepend(alert_div);
                   }
                   else {
                       // Create all the necessary elements
                       alert_div = $(alert_div).addClass("alert-message success").append(ret_val.message);
                       
                       var radio_group_div = $('<div></div>').addClass("shipping-address-radio offset1"),
                           radio_input = $('<input>', { id:'shipping-address-' + ret_val.sid, type:'radio', name:'order-sid', value:ret_val.sid }),
                           radio_label_div = $('<div>' +
                                                   '<span>' + $('#complete-address-one').val() + '</span><br>' + 
                                                   '<span>' + $('#complete-city').val() + ', ' + $('#complete-state').val() + ' ' + $('#complete-zipcode').val() + '</span>' +
                                               '</div>');
                       radio_group_div = $(radio_group_div).append(radio_input).append(radio_label_div);  
                       $(radio_group_div).hide();  
                       
                       $('#main').prepend(alert_div);
                       $('fieldset').append(radio_group_div);
                       $(radio_group_div).fadeIn();
                       
                       $('#complete-address-one').val("");
                       $('#complete-city').val("");
                       $('#complete-state').val("");
                       $('#complete-zipcode').val("");
                   }
               });
    });
});
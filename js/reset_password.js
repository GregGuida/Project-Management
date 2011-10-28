$(document).ready(function() {
  function make_password() {
    var tmp, pass = '';
    for(var i = 0; i < 10; i++) {
      tmp = (parseInt(Math.random() * 1000) % 94) + 33;
      pass += String.fromCharCode(tmp);
    }
    return pass;
  }

  $('#new-user-password').click(function(e) {
    e.preventDefault();
    var new_password = make_password();
    $('#new-password-area').html(new_password);
    $('#reset-password-password, #reset-password-confirm').val(new_password);
  });
});

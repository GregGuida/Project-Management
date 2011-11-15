$(document).ready(function() {
  function make_password() {
    var i, possibilities = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890', posLen = possibilities.length, pass = '';
    for(i = 0; i < 8; i++) {
      pass += possibilities[Math.floor(Math.random() * posLen)];
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

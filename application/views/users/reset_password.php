<div class="page-header">
  <h2>Reset User password</h2>
</div>

<div class="row">
  <div class="span4">
    <label for="generate-password">Generate a new password:</label><input type="button" id="new-user-password" class="btn info" />
  </div>

  <div class="span7">
    <form action="/somewhere" method="post">
      <fieldset>
        <div class="clearfix">
          <label for="reset-password-password">New Password</label>
          <div class="input">
            <input type="password" name="password" id="reset-password-password" />
          </div>
        </div>

        <div class="clearfix">
          <label for="reset-password-confirm">Confirm</label>
          <div class="input">
            <input type="password" name="confirm" id="reset-password-confirm" />
          </div>
        </div>
      </fieldset>

      <div class="actions">
        <input type="submit" value="Update password" class="btn primary" />
      </div>
    </form>
  </div>
</div>

<script>
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
      $('#reset-password-password, #reset-password-confirm').val(new_password);
    });
  });
</script>

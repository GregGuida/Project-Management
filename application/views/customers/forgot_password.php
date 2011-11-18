<div class="page-header">
  <h2>Forgot your password? <small>No Worries!</small></h2>
</div>
<form action="/customers/send_email_reminder" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="forgot-email-field">Email Address:</label>
      <div class="input">
        <input id="forgot-email-field" type="text" name="email" />
      </div>
    </div>
    <div class="actions">
      <input type="submit" name="submit" value="Send email" class="btn primary" />
    </div>
  </fieldset>
</form>

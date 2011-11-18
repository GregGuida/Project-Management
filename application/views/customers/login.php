<div class="page-header">
  <h2>Customer Login</h2>
</div>

<form action="/sessions/customer_auth_handle" method="post">
  <fieldset>
    <legend>Login to TFM</legend>
    <div class="clearfix">
      <label for="login_email">Email</label>
      <div class="input">
        <input type="text" id="login_email" name="email" />
      </div>
    </div>
    <div class="clearfix">
      <label for="login_password">Password</label>
      <div class="input">
        <input type="password" id="login_password" name="password" />
      </div>
    </div>
  <fieldset>
  <div class="actions">
    <p>
      <input type="submit" value="Login" class="btn primary" />
      <a href="/customers/signup" class="btn">Signup Instead</a>
    </p>
    <p>
      <a href="/customers/forgot_password">I forgot my password</a>
    </p>
  </div>
</form>

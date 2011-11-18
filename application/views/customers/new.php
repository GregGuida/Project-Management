<div class="page-header">
  <h2>Create an Account <small>So you can buy things!</small></h2>
</div>

<form action="/customers/create" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="signup_firstname">First Name</label>
      <div class="input">
        <input type="text" id="signup_firstname" name="firstname" />
      </div>
    </div>
    <div class="clearfix">
      <label for="signup_lastname">Last Name</label>
      <div class="input">
        <input type="text" id="signup_lastname" name="lastname" />
      </div>
    </div>
    <div class="clearfix">
      <label for="signup_email">Email</label>
      <div class="input">
        <input type="text" id="signup_email" name="email" />
      </div>
    </div>
    <div class="clearfix">
      <label for="signup_password">Password</label>
      <div class="input">
        <input type="password" id="signup_password" name="password" />
      </div>
    </div>
    <div class="clearfix">
      <label for="signup_confirm">Confirm Password</label>
      <div class="input">
        <input type="password" id="signup_confirm" name="confirm" />
      </div>
    </div>
  <fieldset>
  <div class="actions">
    <input type="submit" value="Save" class="btn primary" />
    <a href="/customers/login" class="btn">Login Instead</a>
  </div>
</form>

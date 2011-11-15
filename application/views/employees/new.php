<div class="page-header">
  <h2>Add an Employee</h2>
</div>

<form action="/employees/create" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="new-employee-first-name">First Name</label>
      <div class="input">
        <input type="text" id="new-employee-first-name" name="firstname" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-last-name">Last Name</label>
      <div class="input">
        <input type="text" id="new-employee-last-name" name="lastname" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-email">Email</label>
      <div class="input">
        <input type="text" id="new-employee-email" name="email" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-dob">Date of Birth</label>
      <div class="input">
        <input type="text" id="new-employee-dob" name="dob" />
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" value="Create Employee" class="btn primary" />
    <a href="/employees/" class="btn">Cancel</a>
  </div>
</form>

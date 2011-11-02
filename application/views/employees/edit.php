<div class="page-header">
  <h2>Add an Employee</h2>
</div>

<form action="/employees/create" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="new-employee-first-name">First Name</label>
      <div class="input">
        <input type="text" id="new-employee-first-name" name="firstname" value="Carlos" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-last-name">Last Name</label>
      <div class="input">
        <input type="text" id="new-employee-last-name" name="lastname" value="Salamanca" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-email">Email</label>
      <div class="input">
        <input type="text" id="new-employee-email" name="email" value="csalamanca@tfm.com" />
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" value="Update Employee" class="btn primary" />
    <a href="/employees/">Cancel</a>
  </div>
</form>

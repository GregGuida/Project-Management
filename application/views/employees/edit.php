<div class="page-header">
  <h2>Updating Employee</h2>
</div>

<form action="/employees/update/<?php echo $employee['uid'] ?>" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="new-employee-first-name">First Name</label>
      <div class="input">
        <input type="text" id="new-employee-first-name" name="firstname" value="<?php echo $employee['FirstName'] ?>" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-last-name">Last Name</label>
      <div class="input">
        <input type="text" id="new-employee-last-name" name="lastname" value="<?php echo $employee['LastName'] ?>" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-email">Email</label>
      <div class="input">
        <input type="text" id="new-employee-email" name="email" value="<?php echo $employee['Email'] ?>" />
      </div>
    </div>
    <div class="clearfix">
      <label for="new-employee-email">Date of Birth</label>
      <div class="input">
        <input type="text" id="new-employee-dob" name="dob" value="<?php echo $employee['DOB'] ?>" />
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" value="Update Employee" class="btn primary" />
    <a href="/employees/" class="btn">Cancel</a>
  </div>
</form>

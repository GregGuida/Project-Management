<div class="page-header">
  <h2>User Accounts</h2>
</div>

<div class="row">
  <div class="span7">
    <input type="text" class="xlarge" name="query" placeholder="Search for a user" />
    <ul id="customer-list" class="unstyled">
    <?php foreach($users as $user) { ?>
      <li data-id="<?php echo $user['uid'] ?>"><a href="#"><?php echo $user['FirstName'] . ' ' . $user['LastName'] ?></a></li>
    <?php } ?>
    </ul>
  </div>
  <div class="span7">
    <div id="customer-actions" class="well hide">
      <h4>Actions</h4>
      <p><a href="/customers/reset_password">Reset Password</a></p>
      <p><a href="/customers/contact">Contact this User</a></p>
      <p><a href="/customers/revoke">Revoke Account</a></p>
    </div>
  </div>
</div>

<div class="page-header">
  <h2>Revoke Account for <?php echo get_current_user_stuff('FirstName') . ' ' . get_current_user_stuff('LastName'); ?></h2>
</div>

<div class="alert-message">
  <p>
    <strong>Warning:</strong> Once submitted, this user will no longer be able to log into TFM. Be advised that all revocations will be heavily audited and scrutinized, because we are a customer-service orientated company, and these are our customers we're dealing with.
  </p>
</div>

<div class="well">
  <p>
    Customer since: <strong><?php echo date('l jS \of F Y h:iA', strtotime(get_current_user_stuff('CreatedAt'))); ?></strong>
  </p>
</div>

<form action="/customers/revoke_handler/<?php echo get_current_user_stuff('uid') ?>" method="post">
  <div class="actions">
    <input type="submit" value="Revoke" class="btn error" />
    <a href="/customers/" class="btn">Cancel</a>
  </div>
</form>

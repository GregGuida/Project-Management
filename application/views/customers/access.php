<div class="page-header">
<?php if ($user['Active']) { ?>
  <h2>Revoke Account Access for <?php echo $user['FirstName'] . ' ' . $user['LastName']; ?></h2>
<?php } else { ?>
  <h2>Grant Account Access for <?php echo $user['FirstName'] . ' ' . $user['LastName']; ?></h2>
<?php } ?>
</div>
  
<div class="alert-message">
  <p>
<?php if ($user['Active']) { ?>
    <strong>Warning:</strong> Once submitted, this user will no longer be able to log into TFM. Be advised that all revocations will be heavily audited and scrutinized, because we are a customer-service orientated company, and these are our customers we're dealing with.
<?php } else { ?>
    <strong>Note:</strong> Once submitted, this user will once again be able to log into TFM. This is clearly a beneficial goal for our company, and we should seek to enable as many accounts as possible.
<?php } ?>
  </p>
</div>

<div class="well">
  <p>
    Customer since: <strong><?php echo date('l jS \of F Y h:iA', strtotime($user['CreatedAt'])); ?></strong>
  </p>
</div>

<form action="/customers/access_handler/<?php echo $user['uid'] ?>" method="post">
  <input type="hidden" name="active" value="<?php echo !$user['Active']  ?>"  />
  <div class="actions">
    <input type="submit" value="<?php echo !$user['Active'] ? 'Grant Access' : 'Revoke' ?>" class="btn <?php echo !$user['Active'] ? 'success' : 'error' ?>" />
    <a href="/customers/" class="btn">Cancel</a>
  </div>
</form>

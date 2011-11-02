<div class="page-header">
  <h2>Edit <?php echo "'Kitties'" ?> Category</h2>
</div>

<form action="/categories/update" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="new-category-name">Name</label>
      <div class="input">
        <input type="input" id="new-category-name" name="name" value="<?php echo 'kitties' ?>"/>
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" class="btn primary" value="Update" />
    <a href="/categories/admin_browse">Cancel</a>
  </div>
</form>

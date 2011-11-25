<div class="page-header">
  <h2>Edit "<?= $this_category['name']?>" Category</h2>
</div>

<form action="/categories/update/<?= $this_category['catID']?>" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="category-name">Name</label>
      <div class="input">
        <input type="input" id="category-name" name="name" value="<?= $this_category['name']?>"/>
      </div>
    </div>
    <div class="clearfix">
      <label for="new-category-parent">Parent Category</label>
      <div class="input">
        <select name="parent" id="new-category-parent" >
          <option value="NULL">-- Top Level Category --</option>
          <? foreach ($categories as $category) { ?>
          <option  value="<?= $category['catID'] ?>" 
          <? 
            if ( $this_category['parent'] ==  $category['catID'] ) { 
             echo 'selected="true"'; 
            }
          ?> > 
            <?= $category['name'] ?> 
          </option>
          <? } ?>
        </select>
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" class="btn primary" value="Update" />
    <a href="/categories/admin_browse">Cancel</a>
  </div>
</form>

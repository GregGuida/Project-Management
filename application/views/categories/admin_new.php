<div class="page-header">
  <h2>New Category</h2>
</div>

<form action="/categories/create" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="new-category-name">Name</label>
      <div class="input">
        <input type="input" id="new-category-name" name="name"/>
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" class="btn primary" value="Save" />
    <a href="/categories/admin_browse">Cancel</a>
  </div>
</form>

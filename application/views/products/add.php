<div class="row">
  <div id="product-area" class="span16">
    <div class="row">
      <h1 class="span10 offset2"> Add A New Product </h1>
      <form action="/products/create/" method="post" class="span10 offset2">
        
        <div class="clearfix">
          <label for="product-name">Product Name</label>
          <div class="input">
            <input class="xlarge" name="product-name" size="30" type="text">
          </div>
        </div>
        <div class="clearfix">
          <label for="product-description">Product Description</label>
          <div class="input">
            <textarea class="xxlarge" name="product-description" rows="3"></textarea>
          </div>
        </div>
        <div class="clearfix">
          <label for="product-price">Product Price</label>
          <div class="input">
            <input class="xlarge" name="product-price" size="30" type="text">
          </div>
        </div>
        <div class="clearfix">
          <label for="product-category">Product Category</label>
          <div class="input">
            <select class="xlarge" name="product-category" >
            <? foreach ($categories as $category) { ?>
              <option value="<?= $category['catID']?>"> <?= $category['name'] ?> </option>
            <? } ?>
            </select>
          </div>
        </div>
        <div class="clearfix span6" id="edit-actions">
          <button type="submit"class="btn primary">Done Editing</button>
          <a href="/products/admin_browse/" class="btn danger">Cancel Edits</a>
        </div>
      </form>
    </div>
  </div>
</div>
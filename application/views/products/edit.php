	<div class="row">
        <div id="product-area" class="span16">
          <div class="row">
            <div class="span6">
              <p>
                <img src="http://placehold.it/340/340" alt="product photo large thumbnail" />
              </p>
              <p class="alt-images">
                <img src="http://placehold.it/60/60" alt="product photo small thumbnail" />
                <img src="http://placehold.it/60/60" alt="product photo small thumbnail" />
                <img src="http://placehold.it/60/60" alt="product photo small thumbnail" />
                <button id="new-image" class="btn"> Add An <br/>Image </button>
              </p>
            </div>
            <div class="span10">
              <div class="row">
                <form action="/products/admin_show/" method="post" class="span3">
                  <div class="page-header">
                    <h2>Title</h2>
                    <input class="xlarge" type="text" name="product-title" value="" />
                  </div>
                  <div class="product_description">
                    <p>Product Description</p>
                    <textarea class="xxlarge" id="textarea2" name="product-description" rows="3"></textarea>
                  </div>
                  <div class="product_categories">
                    <p>Product Category</p>
                    <select name="category" id="category">
                      <option>Kitties</option>
                      <option>&nbsp;&nbsp;Cute Kitties</option>
                      <option>&nbsp;&nbsp;Fuzzy Kitties</option>
                      <option>Kittens</option>
                      <option>&nbsp;&nbsp;Adorable Kittens</option>
                      <option>&nbsp;&nbsp;Loveable Kitties</option>
                      <option>Cats</option>
                      <option>&nbsp;&nbsp;Fat Cats</option>
                    </select>
                  </div>
                  <div class="clearfix span6" id="edit-actions">
                    <button class="btn primary">Done Editing</button>
                    <button class="btn danger">Cancel Edits</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
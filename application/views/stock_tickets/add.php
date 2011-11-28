<div class="page-header">
  <h2>Add a Stock Ticket</h2>
</div>

<form action="/stock_tickets/create" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="stock-ticket-pid">Product Type</label>
      <div class="input">
          <select id="stock-ticket-pid" name="pid">
  		    <?php foreach($products as $product) { ?>
  			    <option value="<?php echo $product['pid'] ?>"><?php echo $product['Name'] ?></option>
  			<?php } ?>
  		</select>
      </div>
    </div>
    <div class="clearfix">
      <label for="stock-ticket-quantity">Quantity</label>
      <div class="input">
        <input type="text" id="stock-ticket-quantity" name="quantity" />
      </div>
    </div>
    <div class="clearfix">
      <label for="stock-ticket-unit-price">Unit Price (USD)</label>
      <div class="input">
        <input type="text" id="stock-ticket-unit-price" name="unit-price" />
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" value="Add Stock Ticket" class="btn primary" />
    <a href="/stock_tickets/admin_browse" class="btn">Cancel</a>
  </div>
</form>
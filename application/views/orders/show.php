<div class="container">
  <div class="row">
      <?php if(isset($products)) { ?>
        <section class="span8">
          <div class="page-header">
            <h3>Here's what is in this Order:</h3>
          </div>
          <?php foreach($products as $product) { ?>
              <div class="row">
                  <div class="span2">
                      <a href="/products/show/<?php echo $product['pid'] ?>"><img src="<?php echo $product['location'] ?>" height="90" width="90" /></a>
                  </div>
                  <div class="span5">
                      <p><?php echo $product['name'] ?></p>
                      <p>Price: $<?php echo $product['priceUSD'] ?></p>
                  </div>
              </div>
          <?php } ?>
        </section>

        <section class="span8">
          <div class="page-header">
            <h3>And here's what you need to know:</h3>
          </div>
          <p>Total: <strong>$<?php echo $order['TotalPriceUSD'] ?></strong></p>
          <p>Estimated Arrival: <strong>2 days from now</strong></p>
          <p><a href="http://www.fedex.com/Tracking">Tracking Information</a></p>
          <p><a href="/customers/show/<?php echo get_current_user_stuff('uid') ?>">Find all this and more on the My Account page</a></p>
        </section>
        <?php } else { ?>
            <section class="alert-message error">
                <p>Uh oh, looks like either this order doesn't exist or you don't have the ability to view it.</p>
            </section>
        <?php } ?>
  </div>
</div>
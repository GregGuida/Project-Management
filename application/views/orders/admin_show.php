<h2>Order #<?php echo $order['OrderNum'] ?></h2>
<h3><a href="/customers">Customer #<?php echo $order['uid'] ?></a></h3>
<div class="container">
  <div class="row">
        <section class="span8">
          <div class="page-header">
            <h3>Order Contents</h3>
          </div>
          <?php foreach($products as $product) { ?>
                <div class="row">
                    <div class="span2">
                        <a href="/products/show/<?php echo $product['pid'] ?>"><img class="image_90x90" src="<?php echo $product['location'] ?>" /></a>
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
              <h3>Shipping Information</h3>
            </div>
            <address>
                <strong>Gregory, Guida</strong><br>
                3399 North Road<br>
                Poughkeepsie, NY 12601<br>
                <!-- <?php echo $shipping_address['Street'] ?><br>
                <?php echo $shipping_address['City'] ?>, <?php echo $shipping_address['State'] ?> <?php echo $shipping_address['Zip'] ?><br> -->
                <abbr title="Phone">P:</abbr> (631) 219-6632
            </address>
        </section>
    </div>
</div>
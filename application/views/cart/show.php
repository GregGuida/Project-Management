<div class="row">
   <form action="/orders/checkout" method="post">
	<h2>Shopping Cart</h2>
	<?php foreach ($cart as $item) { ?>
	<div class="row clearfix cart-item">
		<div class="span4 item-photo">
			<img src=<?php echo $item['location']?> />
		</div>
		<div class="span12 item-info">
			<a class="remove-item btn">remove</a>
			<h3 class="item-title"><a href="/products/show/<?php echo $item ?>"><?php echo $item['name']?></a></h3>
			<div class="item-price"><h4>Price:</h4><p>$<?php echo $item['priceUSD']?></p></div>
			<div class="item-description"><h4>Description</h4><p><?php echo $item['description']?></p></div>
			<div class="item-quantity"><h4>Quantity</h4><input class="span1" type="text" value="<?php echo $item['quantity']?>" /></div>
		</div>	
	</div>
	<?php } ?>
	<div class="cart-totals row">
	    <div class="span16">
		<p>
                  Zip Code: <input type="text" class="span2" value="12601" />
                </p>
        	<p>Subtotal: <?php echo $sum ?></p>
		<p>Shipping: $40.00</p>
		<p><strong>Total: <?php echo $sum + 40 ?></strong></p>
            </div>
        </div>
	<input type="submit" class="btn primary clearfix checkout-button" value="CHECKOUT" />
  </form>
</div>

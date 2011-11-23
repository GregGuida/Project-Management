<div class="row">
   <form action="/orders/checkout" method="post">
	<h2>Shopping Cart</h2>
	<?php if(count($cart) > 0) { ?>
	    <?php foreach ($cart as $item) { ?>
    	<div class="row clearfix cart-item">
    		<div class="span4 item-photo">
    			<img class="image_90x90" src=<?php echo $item['location']?> />
    		</div>
    		<div class="span12 item-info">
    			<a class="remove-item btn">remove</a>
    			<h3 class="item-title"><a href="/products/show/<?php echo $item['pid'] ?>"><?php echo $item['name']?></a></h3>
    			<div class="item-price"><h4>Price:</h4><p>$<?php echo $item['priceUSD']?></p></div>
    			<div class="item-description"><h4>Description</h4><p><?php echo $item['description']?></p></div>
    			<div class="item-quantity"><h4>Quantity</h4><input class="span1" type="text" value="<?php echo $item['quantity']?>" /></div>
    		</div>	
    	</div>
    	<?php } ?>
	<?php } else { ?>
	    <section class="alert-message error">
            <p>Uh oh, looks like you don't have anything in your cart :(</p>
        </section>
	<?php } ?>
	<div class="cart-totals row">
	    <div class="span16">
        	<p>Subtotal: $<?php echo number_format($sum, 2) ?></p>
		    <p>Shipping: $<?php echo $shippingCost ?></p>
		    <p><strong>Total: $<?php echo number_format($sum + $shippingCost, 2) ?></strong></p>
        </div>
    </div>
	<input type="submit" class="btn primary clearfix checkout-button" value="CHECKOUT" />
  </form>
</div>

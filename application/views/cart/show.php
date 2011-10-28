<div class="row">
   <form action="/orders/checkout" method="post">
	<h2>Shopping Cart</h2>
	<? for ($i = 0; $i<5; $i++): ?>
	<div class="row clearfix cart-item">
		<div class="span4 item-photo">
			<img src="http://placekitten.com/160/160" />
		</div>
		<div class="span12 item-info">
			<button class="remove-item btn">remove</button>
			<h3 class="item-title"><a href="/products/show/<?php echo $i ?>">Cute Kitty</a></h3>
			<div class="item-price"><h4>Price:</h4><p>$235.00</p></div>
			<div class="item-description"><h4>Description</h4><p>A kitten is a juvenile domesticated cat. The young of big cats are called cubs rather than kittens. Either term may be used for the young of smaller wild felids such as ocelots, caracals, and lynx, but kitten is usually more common for these species.</p></div>
			<div class="item-quantity"><h4>Quantity</h4><input class="span1" type="text" value="1" /></div>
		</div>	
	</div>
	<? endfor; ?>
	<div class="cart-totals row">
	    <div class="span16">
		<p>
                  Zip Code: <input type="text" class="span2" value="12601" />
                </p>
        	<p>Subtotal: $1175.00</p>
		<p>Shipping: $40.00</p>
		<p><strong>Total: $1280.00</strong></p>
            </div>
        </div>
	<input type="submit" class="btn primary clearfix checkout-button" value="CHECKOUT" />
  </form>
</div>

<div class="row">
	<h2>Wishlist</h2>
	<h3><?=$wname ?></h3>
	<?php foreach($list as $item) { ?>
	<div class="row clearfix cart-item">
		<div class="span4 item-photo">
			<img class="image_90x90" src=<?php echo $item['location']?> />
		</div>
		<div class="span12 item-info">
			<button class="remove-item btn">remove</button>
			<h3 class="item-title"><a href="/products/show/<?php echo $item['pid'] ?>"><?php echo $item['name']?></a></h3>
			<div class="item-price"><h4>Price:</h4><p>$<?php echo $item['priceUSD']?></p></div>
			<div class="item-description"><h4>Description</h4><p><?php echo $item['description']?></p></div>
			<div class="item-quantity"><h4>Quantity</h4><input class="span1" type="text" value="<?php echo $item['quantity']?>" /></div>
		</div>	
	</div>
	<?php } ?>
        </div>
	<form class="wishlist-share clearfix" >
		<h4>Share this wishlist</h4>
		Email&nbsp;<input type="text" class="span2" value="" />
		<input class="btn" type="submit" value="SHARE"/> 
	</form>
	<div style="clear:both;"></div>
      <form action="/orders/checkout" method="post">
       	<input type="submit" class="btn primary clearfix checkout-button" value="CHECKOUT" />
      </form>
</div>

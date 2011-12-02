<div class="row">
	<h2><?php echo $list['name'] ?></h2>
	<?php foreach($items as $item) { ?>
	<div class="row clearfix cart-item">
		<div class="span4 item-photo">
			<img class="image_90x90" src=<?php echo $item['location']?> />
		</div>
		<div class="span12 item-info">
			<button class="remove-item btn">remove</button>
			<h3 class="item-title"><a href="/products/show/<?php echo $item['pid'] ?>"><?php echo $item['name']?></a></h3>
			<div class="item-price">
			    <h4 class="pull-left">Price: $<?php echo $item['priceUSD']?></h4>
			    <h4 class="pull-right">Quantity: <?php echo $item['quantity']?></h4>
			</div>
			<div class="item-quantity"></div>
		</div>	
	</div>
	<?php } ?>
        </div>
</div>

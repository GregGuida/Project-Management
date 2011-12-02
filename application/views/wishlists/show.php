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
			    <div class="pull-left"><strong>Price:</strong> $<?php echo $item['priceUSD']?></div>
			    <div class="pull-right"><strong>Quantity:</strong> <?php echo $item['quantity']?></div>
			</div>
			<div class="item-quantity"></div>
		</div>	
	</div>
	<?php } ?>
        </div>
</div>

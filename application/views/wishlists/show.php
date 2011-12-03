<div class="row">
	<h2><?php echo $list['name'] ?></h2>
	<?php foreach($items as $item) { ?>
    	<div class="row clearfix cart-item">
    		<div class="span4 item-photo">
    			<img class="image_90x90" src=<?php echo $item['location']?> />
    		</div>
    		<div class="span8 item-info">
    			<h3 class="item-title"><a href="/products/show/<?php echo $item['pid'] ?>"><?php echo $item['name']?></a></h3>
    			<h4 class="pull-left">Price: $<?php echo $item['priceUSD']?></h4>
    		</div>
    		<div class="span4">
    		        <a class="pull-right" href="/cart/add/<?php echo $item['pid'] ?>"><button class="btn">Add to cart</button></a>
    		        <form class="wish-list-item-delete" action="/wish_list_items/delete" method="post">
    		          <input type="hidden" name="pid" value="<?php echo $item['pid'] ?>">
    		          <input type="hidden" name="wishID" value="<?php echo $list['wishID'] ?>">
    		          <input class="btn danger" type="submit" value="Remove">
    		        </form>
    		</div>	
    	</div>
	<?php } ?>
	    <a href="/wish_lists/delete/<?php echo $list['wishID'] ?>" class="btn danger pull-right">Delete Wishlist</a>
    </div>
</div>

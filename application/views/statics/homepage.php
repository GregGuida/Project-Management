<section class="product-slider">
	<div id="main-slider" class="nivoSlider theme-default" style="width:940px;height:400px">
		<img src="http://flickholdr.com/940/400/shoes" title="Buy One Get One Half-Off Shoes"/>
		<img src="http://flickholdr.com/940/400/books/bw" title="%50 off all books"/>
		<img src="http://flickholdr.com/940/400/toys" title="all new selection of toys" />
		<img src="http://flickholdr.com/940/400/toys,games,animals,fun,product/bw" title="whatever this is... we've got it"/>
		<img src="http://flickholdr.com/940/400/toys,games,animals,products,fun" title="I dont always put captions on my slider images... oh wait, I do"/>
	</div>
</section>

<section class="category-list">
  <div class="row">
    <div class="span3">
	<p>
	<a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </butto</a></p><span class="help-block"><b><?= $products[0]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </butto</a></p><span class="help-block"><b><?= $products[0]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button>
	</a>
	</p>
	<span class="help-block"><b><?= $products[0]['Name'] ?></b></span>
	</div>
		
	<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </butto</a></p><span class="help-block"><b><?= $products[0]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </butto</a></p>
		<span class="help-block"><b><?= $products[0]['Name'] ?></b></span>
		</div>
		
    </div>
    <div class="row">
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
  </div>
  <div class="row">
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
    <div class="span3"><p><a href="/products/show/"><img src="http://placekitten.com/120/120" class="thumbnail" /></a></p><span class="help-block"><b>A Cute Kitty</b></span></div>
  </div>
</section>

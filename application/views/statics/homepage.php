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
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[0]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[1]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[1]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[2]['location'].'" style="width:340px;" class="product-image" />';
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
	<span class="help-block"><b><?= $products[2]['Name'] ?></b></span>
	</div>
		
	<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[3]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[3]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[4]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p>
		<span class="help-block"><b><?= $products[4]['Name'] ?></b></span>
		</div>
		
    </div>
    
	<div class="row">
    <div class="span3">
	<p>
	<a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[5]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[5]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[6]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[6]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[7]['location'].'" style="width:340px;" class="product-image" />';
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
	<span class="help-block"><b><?= $products[7]['Name'] ?></b></span>
	</div>
		
	<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[8]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[8]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[9]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p>
		<span class="help-block"><b><?= $products[9]['Name'] ?></b></span>
		</div>
		
    </div>
	
	<div class="row">
    <div class="span3">
	<p>
	<a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[10]['location'].'" style="width:340px;" class="product-image" />';
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
		</a></p><span class="help-block"><b><?= $products[10]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[11]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[11]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[12]['location'].'" style="width:340px;" class="product-image" />';
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
	<span class="help-block"><b><?= $products[12]['Name'] ?></b></span>
	</div>
		
	<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[13]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p><span class="help-block"><b><?= $products[13]['Name'] ?></b></span></div>
		
		<div class="span3"><p><a href="/products/show/">
	<?
      if(!empty($images)) {
        echo '<img src="'.$images[14]['location'].'" style="width:340px;" class="product-image" />';
        }
	?>
    </p>
    <p class="alt-images">
    <?
        foreach( $images as $preview_image) {
            echo '<img src="'.$preview_image['location'].'" style="width:60px;height:60px;class="thumbnail"/>';
        }
    ?>
        <button id="new-image" class="btn"> Add An <br/>Image </button></a></p>
		<span class="help-block"><b><?= $products[14]['Name'] ?></b></span>
		</div>
		
    </div>
</section>

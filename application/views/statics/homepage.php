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
  <?php for($i = 0; $i < count($products); $i++) { ?>
    <?php if ($i % 5 == 0) { ?>
      <div class="row">
    <?php } ?>
        <div class="span3">
          <p>
            <a href="/products/show/<?php echo $products[$i]['pid'] ?>"><img src="<?php echo $products[$i]['location']?>" class="thumbnail" /></a>
          </p>
          <span class="help-block"><b><?php echo $products[$i]['Name'] ?></b></span>
        </div>
    <?php if ($i % 5 == 4 || $i == count($products) - 1) { ?>
      </div>
    <?php } ?>
  <?php } ?>
</section>

<section class="product-slider">
  <div id="main-slider" class="nivoSlider theme-default" style="width:940px;height:400px">
    <?php for ($i = 0; $i < count($products); $i++) { ?>
      <img src="<?php echo $products[$i]['location'] ?>" title="<?php echo $products[$i]['Description'] ?>" class="homepage_slider_image" />
    <?php } ?>
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

<div class="page-header">
  <h2><?php echo $this_category['name'] ?> <small> - A list of products that fall under this category</small></h2>
</div>

<ul class="unstyled">
  <?php foreach( $products as $product) { ?>
    <li class="row">
      <div class="span1">
        <a class="category-browse-image" href="/products/show/<?php echo $product['pid'] ?>"> 
<img style="width:50px;" src="<?php echo $product['location'] ?>" /></a>
      </div>
      <div class="span14">
        <h4>
          <a href="/products/show/<?php echo $product['pid'] ?>"><?php echo $product['Name'] ?></a> <br/>
          <small> - <?php echo substr($product['Description'],0,144)."..." ?></small>
        </h4>
      </div>
      <div class="span1">
        <p>$<?php echo number_format($product['PriceUSD'],2) ?></p>
      </div>
    </li>
  <?php } ?>
</ul>

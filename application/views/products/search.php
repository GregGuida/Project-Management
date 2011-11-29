<div class="page-header">
  <h2>Search results for '<?php echo $query ?>'</h2>
</div>
<div class="container">
  <section id="search-results-list">
    <?php foreach($results as $product) { ?>
    <div class="row">
      <div class="span2">
        <b><a href="/products/show/<?php echo $product['pid']?>"><img src="<?php echo $product['location']?>" style="width:90px;height:90px;"/></a></b>
      </div>
      <div class="span5">
        <p><b><?php echo $product['Name'] ?></b></p><p><?php echo substr($product['Description'], 0, 150) ?></p>
     </div>
   </div>
   <?php } ?>
  </section>
</div>

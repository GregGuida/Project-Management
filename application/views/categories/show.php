<div class="page-header">
  <h2><?= $this_category['name'] ?> <small> - A list of products that fall under this category</small></h2>
</div>

<ul class="unstyled">
  <? foreach( $products as $product) { ?>
    <li class="row">
      <div class="span1">
        <a class="category-browse-image" href="/products/show/<?= $product['pid'] ?>"> 
          <img style="width:50px;" src="<?= $product['location'] ?>" /> 
        </a>
      </div>
      <div class="span5">
        <h4>
          <a href="/products/show/<?= $product['pid'] ?>"><?= $product['Name'] ?></a> <br/>
          <small> - <?= $product['Description'] ?></small>
        </h4>
      </div>
    </li>
  <? } ?>
</ul>

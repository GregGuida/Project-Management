<div class="page-header">
  <h2>Kitties <small> - A list of products that fall under this category</small></h2>
</div>

<ul class="unstyled">
  <?php for($i = 0; $i < 20; $i++) { ?>
    <li class="row"><div class="span1"><a href="/products/show/<?php echo $i ?>"><img src="http://placekitten.com/50/50" /></a></div><div class="span5"><h4><a href="/products/show/">Product Name</a> <small> - product description</small></h4></div></li>
  <?php } ?>
</ul>

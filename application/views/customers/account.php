<div class="page-header">
  <h2>Account <small>If you cannot find anything, do not hesitate to contact <a href="/statics/help">help</a></small></h2>
</div>

<div class="container">
  <section>
    <div class="row">
      <div class="span8">
        <div class="page-header">
          <h3>Your Active Orders</h3>
        </div>
        <?php foreach($activeOrders as $order) { ?>
        <ul id="account-active-orders" class="unstyled">
          <li><p><b><?php echo $order['Date'] ?> - <?php $order['TotalPriceUSD'] ?></b> <?php $order['count']?> Items. <a href="/orders/show/<?php echo $order['OrderNum']?>" class="btn">View</a></p><p>Status: <?php $order['Status']?></p></li>
        </ul>
        <?php } ?>
      </div>
      <div class="span8">
        <div class="page-header">
          <h3>Your Prevous Orders</h3>
        </div>
        <?php foreach($prevOrders as $order) { ?>
        <ul id="account-previous-orders" class="unstyled">
          <li><p><b><?php echo $order['Date'] ?> - <?php $order['TotalPriceUSD'] ?></b> <?php $order['count']?> Items. <a href="/orders/show/<?php echo $order['OrderNum']?>" class="btn">View</a></p><p>Status: <?php $order['Status']?></p></li>
        </ul>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="span8">
        <div class="page-header">
          <h3><a href="/cart">Your Cart</a> - <?php $numItems?> Items</h3>
        </div>
        <?php foreach($cart as $item) { ?>
        <ul id="account-cart-items" class="unstyled">
          <li class="row"><div class="span1"><a href="/products/show/<?php echo $item['pid'] ?>"><img class="image_90x90" src=<?php echo $item['location']?> /></a></div><div class="span5"><h4><?php echo $item['priceUSD']?><small> - product description</small></h4></div></li>
        </ul>
        <?php } ?>
      </div>
      <div class="span8">
        <div class="page-header">
          <h3><a href="/wishlists">Your Wish Lists</a></h3>
        </div>
        <?php foreach($wishLists as $row) { ?>
          <ul id="account-previous-orders" class="unstyled">
            <li><b><?php $row['name']?> - </b> <?=$row['count']?> Items. <a href="/wishlists/show/<?php echo $row['wishID'] ?>" class="btn">View</a></li>
          </ul>
        </ul>
        <?php } ?>
      </div>
    </div>
  </section>
</div>

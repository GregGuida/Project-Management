<div class="page-header">
  <h2>Account <small>If you cannot find anything, do not hesitate to contact <a href="/statics/help">help</a></small></h2>
</div>

<div class="container">
  <section class="my-account-section">
    <div class="row name-header">
        <div class="span2">
           <img src="http://gravatar.com/avatar/<?php echo md5(strtolower(trim($user['Email']))) ?>" />
        </div>
        <div class="span12">
            <h3><?php echo $user["FirstName"] ?> <?php echo $user["LastName"] ?> - <?php echo $user["Email"] ?></h3>
            <a href="http://gravatar.com/">Change Picture</a>
        </div>
    </div>
    <div class="row">
      <div class="span8">
        <div class="page-header">
          <h3>Your Active Orders</h3>
        </div>
        <ul id="account-active-orders" class="unstyled">
        <?php foreach($activeOrders as $order) { ?>
          <li>
              <b>Order Placed on <?php echo date('m/d/Y', strtotime($order['Date'])) ?></b> <a href="/orders/show/<?php echo $order['OrderNum']?>" class="btn pull-right">View</a><br>
              <b>Total Price:</b> $<?php echo $order['TotalPriceUSD'] ?> | <b>Status:</b> <?php echo $order['Status'] ?>
          </li>
        <?php } ?>
        </ul>
      </div>
      <div class="span8">
          <div class="page-header">
            <h3>Your Previous Orders</h3>
          </div>
          <ul id="account-previous-orders" class="unstyled">
          <?php foreach($prevOrders as $order) { ?>
              <li>
                  <b>Order Placed on <?php echo date('m/d/Y', strtotime($order['Date'])) ?></b> <a href="/orders/show/<?php echo $order['OrderNum']?>" class="btn pull-right">View</a><br>
                  <b>Total Price:</b> $<?php echo $order['TotalPriceUSD'] ?> | <b>Status:</b> <?php echo $order['Status'] ?>
              </li>
          <?php } ?>
          </ul>
        </div>
    </div>
    <div class="row">
        <div class="span8">
            <div class="page-header">
              <h3><a href="/cart">Your Cart</a></h3>
            </div>
            <ul id="account-cart-items" class="unstyled">
            <?php foreach($cart as $item) { ?>
              <li class="row">
                  <a class="span6" href="/products/show/<?php echo $item['pid'] ?>"><img class="image_90x90 pull-left" src=<?php echo $item['location']?> /><span class="span4 pull-left"><?php echo $item['name'] ?></span></a>
                  <h4 class="pull-right"><b>Price:</b> $<?php echo $item['priceUSD']?></h4>
              </li>
            <?php } ?>
            </ul>
          </div>
        <div class="span8">
            <div class="page-header">
              <h3>Your Wish Lists</h3>
            </div>
            <ul id="account-wish-lists" class="unstyled">
            <?php foreach($wishlists as $row) { ?>
              <li>
                  <b><?php echo $row['name']?></b>
                  <a href="/wish_lists/show/<?php echo $row['wishID'] ?>" class="btn pull-right">View</a>
              </li>
            <?php } ?>
            </ul>
            <span id="add-wish-list">
                <form action="/wish_lists/create" method="post">
                    <input id="wish-list-name" name="name" placeholder="Wish List Name" value="">
                    <input id="wish-list-create" class="success btn pull-right" type="submit" value="Add Wish List">
                </form>
            </span>
            
        </div>
    </div>
  </section>
</div>

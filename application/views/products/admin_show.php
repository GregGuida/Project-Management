<div class="row">
  <div id="tag-sidebar" class="span4">
    <a href="/products/show/<?= $product['pid'] ?>" class="btn primary admin-product-edit">Customer View</a><br/>
    <a href="/products/edit/<?= $product['pid'] ?>" class="btn admin-product-edit">Edit Product</a><br/>
    <a href="/products/destroy/<?= $product['pid'] ?>" class="btn danger admin-product-delete">Delete Product</a>
  </div>
  <div id="product-area" class="span12">
    <div class="row">
      <div class="span12">
      <ul class="tabs admin-show-tabs">
        <li class="active" title="product-details"><a href="#">Product Details</a></li>
        <li title="comments"><a href="#">Comments</a></li>
        <li title="votes"><a href="#">Votes</a></li>
      </ul>
      </div>
    </div>
    <div class="row tab-paine">
      <div class="row span12 product-details">
        <div class="page-header"><h2><?= $product['Name'] ?></h2></div>
        <div class="span6">
          <p>
           <? 
             if(!empty($images)) {
               echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />';
             }?>
          </p>
          <p class="alt-images">
            <?
              foreach( $images as $preview_image) {
                echo '<img src="'.$preview_image['location'].'"  style="width:60px;height:60px;class="thumbnail"/>';
              }
            ?>
            <button id="new-image" class="btn"> Add An <br/>Image </button>
          </p>
        </div>
        <div class="span5">
          <div class="row">
            <div class="span5">
              <div class="product_description">
                <?= $product['Description']  ?>
              </div>
              <h2 class="admin-product-price"><?= $product['PriceUSD'] ?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row span12 comments" style="display:none;">
        <div class="">
          <div class="page-header"><h2><?= $product['Name'] ?></h2></div>  
          <ul id="product-reviews" class="unstyled">
          <?
            foreach($comments as $comment) {
              echo '<li class="clearfix">';
              echo '<a href="/comments/destroy/'.$comment['comID'].'" class="btn danger delete-comment" style="float:right;">Delete</a>';
              echo '<img src="http://gravatar.com/avatar/'.md5( strtolower( trim($comment['Email'] ) ) ).'" style="float:left;width:40px;margin:0 10px 10px 0;" />';
              echo '<small>'.$comment['FirstName'].' '.$comment['LastName'].' on '.$comment['Date'].' said </small><br/>'; 
              echo '<p>'.$comment['Remark'].'</p>';
              echo '</li>';
            }
          ?>
          </ul>
        </div>
      </div>
      <div class="row span12 votes" style="display:none;">
        <div class="">
          <div class="page-header"><h2><?= $product['Name'] ?></h2></div>
          <ul class="unstyled">
            <?
              foreach ( $votes as $vote ) {
                echo '<li class="clearfix">';
                echo '<img src="http://gravatar.com/avatar/'.md5( strtolower( trim($comment['Email'] ) ) ).'" style="float:left;width:20px;margin:0 10px 10px 0;" />';
                echo $vote['FirstName'].' '.$vote['LastName'];
                if ( $vote['direction'] == 0 ){
                  echo ' voted this down';
                } else {
                  echo ' voted this up';
                }
                echo '</li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
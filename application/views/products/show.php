
      <div class="row">
        <div id="product-area" class="span16">
          <div class="row">
            <div class="span6 product-image-area">
              <?php
                 if(!empty($images)) {
              ?>
              <p>
                  <?php echo '<img src="'.$images[0]['location'].'" style="width:340px;" class="product-image" />'; ?>
              </p>
              <p class="alt-images">
                <?php
                  foreach( $images as $preview_image) {
                    echo '<img src="'.$preview_image['location'].'"  style="width:60px;height:60px;class="thumbnail"/>';
                  }
                ?>
                <button id="new-image" class="btn"> Add An <br/>Image </button>
              </p>
              <?php 
                } else {
                  echo '<h3>No Images</h3>';
                }
              ?>
            </div>
            <div class="span10">
              <div class="row">
                <div class="span7">
                  <div class="page-header"><h2><?php echo $product['Name'] ?></h2></div>
                  <div class="product_description">
                    <p><?php echo $product['Description'] ?></p>
                  </div>
                </div>
                <div class="span3" id="product-actions">
                  <section class="add-product-to-cart"><img src="/img/shopping-cart.png" /> <a href="/cart">Add to cart</a></section>
                  <section class="product-price"><h3>Price</h3>$<?php echo number_format($product['PriceUSD'],2) ?></section>
                  <section class="product-rating">
                    <h3>Rating</h3>
                    <p>
                      <button id="vote-up-button" class="btn">+</button> 
                      <button id="vote-down-button" class="btn">-</button>
                    </p>
                    <p>
                      <?php
                        if( $votes[0] == 0 ){
                          echo 'no votes yet';
                        } else {
                          echo $votes[0].' votes, '.floor(($votes[1]/$votes[0])*100) . '%';
                        } ?>
                    </p>
                  </section>
                </div>
              </div>
            </div>
          </div>
            <div id="product-review-section" class="row">
              <?php if ( $current_user ) { ?>
              <form method="post" action="/comments/create/<?php echo $product['pid'] ?>">
                <fieldset>
                  <legend>Write a Review</legend>
                  <div class="clearfix">
                    <label for="review_message">Comment</label>
                    <div class="input">
                      <textarea name="message" class="xlarge" id="review_message" cols="40" rows="2"></textarea>
                    </div>
                  </div>
                </fieldset>
                <div class="actions">
                  <input type="submit" value="Save" class="btn primary" />
                </div>
              </form>
              <?php } ?>
              <div class="page-header"><h3>Reviews</h3></div>
              <ul id="product-reviews" class="unstyled">
                <?php
                  if ($comments) {
                    foreach($comments as $comment) {
                      echo '<li class="clearfix">';
                      echo '<img src="http://gravatar.com/avatar/'.md5( strtolower( trim($comment['Email'] ) ) ).'?d=identicon" style="float:left;width:40px;margin:0 10px 10px 0;" />';
                      echo '<small>'.$comment['FirstName'].' '.$comment['LastName'].' on '.$comment['Date'].' said </small><br/>'; 
                      echo '<p>'.$comment['Remark'].'</p>';
                      echo '</li>';
                    }
                  } else {
                    echo '<h3>No Comments</h3>';
                  }
                ?>
              </ul>
            </div>
        </div>
      </div>


      <div class="row">
        <div id="tag-sidebar" class="span4">&nbsp;</div>
        <div id="product-area" class="span12">
          <div class="row">
            <div class="span6">
              <p>
                <img src="http://placekitten.com/340/340" alt="product photo large thumbnail" />
              </p>
              <p>
                <img src="http://placekitten.com/60/60" alt="product photo small thumbnail" />
                <img src="http://placekitten.com/60/60" alt="product photo small thumbnail" />
                <img src="http://placekitten.com/60/60" alt="product photo small thumbnail" />
              </p>
            </div>
            <div class="span6">
              <div class="row">
                <div class="span3">
                  <div class="page-header"><h2>A kitty!</h2></div>
                  <div class="product_description">
                    <p>I am a curious kitty looking for a new owner. Buy me so that we can play together all day!</p>
                  </div>
                </div>
                <div class="span3" id="product-actions">
                  <section class="add-product-to-cart"><img src="../img/shopping-cart.png" /> <a href="#">Add to cart</a></section>
                  <section class="product-price"><h3>Price</h3>$399.99</section>
                  <section class="product-rating"><h3>Rating</h3><p><button class="btn">+</button> <button class="btn">-</button></p><p>98%</p></section>
                </div>
              </div>
            </div>
          </div>
          <div id="product-review-section" class="row">
            <form method="post" action="products/1/reviews/create">
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
            <div class="page-header"><h3>Reviews</h3></div>
            <ul id="product-reviews" class="unstyled">
              <li><p>Best kitty ever! <small>- Joey Carmello on 10/10/11</small></p></li>
              <li><p>Would definitely purchase again. In fact, I might. <small>- Greg Guida on 10/9/11</small></p></li>
              <li><p>i can haz cheezburger? <small>- Sean Dunn on 10/8/11</small></p></li>
              <li><p>I bought one last week and now all my friends and family want one. <small>- Alec Dulan on 10/7/11</small></p></li>
              <li><p>meeeeeeeeowwwww!! <small>- Harish Giriraju on 10/6/11</small></p></li>
              <li><p>This is definitely going in my parents' stocking this Christmas. <small>- Krishnan Kottaiswamy on 10/5/11</small></p></li>
            </ul>
          </div>
        </div>
      </div>

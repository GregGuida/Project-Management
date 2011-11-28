<div class="page-header">
  <h2>Checkout</h2>
</div>

<div class="container">
  <div class="span16">
    <form class="pull-left" action="/orders/complete" method="post">
      <fieldset>
        <legend><h3>Shipping Address <small>Last thing, we promise</small></h3></legend>
        <h4>Choose an Existing Address</h4>
        <?php foreach($shipping_addresses as $address) { ?>
        <div class="shipping-address-radio offset1">
            <input id="shipping-address-<?php echo $address['sid'] ?>" type="radio" name="order-sid" value="<?php echo $address['sid'] ?>">
            <div>
                <span><?php echo $address['Street'] ?></span><br>
                <span><?php echo $address['City'] ?>, <?php echo $address['State'] ?> <?php echo $address['Zip'] ?></span>
            </div>
        </div>
        <?php } ?>
      </fieldset>
      <div class="actions">
          <p>Subtotal: $<?php echo $totalPrice ?></p>
          <p>Shipping: $<?php echo $shippingCost ?></p>
          <p><strong>Total: $<?php echo number_format($totalPrice + $shippingCost, 2) ?></strong></p>
          <p><img id="checkout-with-paypal" src="/img/paypal.gif" /></p>
          <p><a href="/customers/account">I'll sleep on it</a></p>
      </div>
  </form>
  <form class="pull-left" action="/shipping_addresses/create" method="post">
      <h4>Or, Add a New One</h4>
      <div class="clearfix">
        <label for="complete-address-one">Address 1</label>
        <div class="input">
          <input type="text" id="complete-address-one" name="address_one" />
        </div>
      </div>
      <div class="clearfix">
        <label for="complete-city">City</label>
        <div class="input">
          <input type="text" id="complete-city" name="city" />
        </div>
      </div>
      <div class="clearfix">
        <label for="complete-state">State</label>
        <div class="input">
          <select id="complete-state" name="state">
            <option value="">Select State</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>
      </div>
      <div class="clearfix">
        <label for="complete-zipcode">Zipcode</label>
        <div class="input">
          <input type="text" id="complete-zipcode" name="zip" />
        </div>
      </div>
      <input type="hidden" name="ajax" value="0" />
      <div class="actions plainify">
          <input id="shipping-address-create" type="submit" class="btn primary" value="Add Address" />
      </div>
    </form>
  </div>
</div>

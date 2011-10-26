<div class="page-header">
  <h2>Checkout</h2>
</div>

<div class="container">
  <div class="span8">
    <form action="/orders/complete" method="post">
      <fieldset>
        <legend><h3>Shipping Address <small>Last thing, we promise</small></h3></legend>
      </fieldset>
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
      <div class="actions">
          <p>Subtotal: $1175.00</p>
          <p>Shipping: $40.00</p>
          <p><strong>Total: $1280.00</strong></p>
        <p>
          <img id="checkout-with-paypal" src="/img/paypal.gif" />
        </p>
        <p>
          <a href="/customers/account">I'll sleep on it</a>
        </p>
      </div>
    </form>
  </div>
</div>

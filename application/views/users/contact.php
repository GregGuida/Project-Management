<div class="page-header">
  <h2>Contact Customer Name <small>Remember: All customers want to be loved</small></h2>
</div>

<form action="/users/send_email" method="post">
  <fieldset>
    <div class="clearfix">
      <label for="contact-subject">Subject</label>
      <div class="input">
        <input type="text" id="contact-subject" name="subject" />
      </div>
    </div>
    <div class="clearfix">
      <label for="contact-message">Message</label>
      <div class="input">
        <textarea id="contact-message" cols="50" rows="10" class="xxlarge" name="message"></textarea>
      </div>
    </div>
  </fieldset>
  <div class="actions">
    <input type="submit" class="btn primary" value="Send" />
    <a href="/users">Cancel</a>
  </div>
</form>

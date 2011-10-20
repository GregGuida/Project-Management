<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Navigation</title>

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <!-- end CSS-->

  <script src="/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="container">
    <header>
      <div>
        <div class="row" id="link-nav">
          <div class="container">
            <a href="/sessions/login">Login</a>
            <a href="/customers/signup">Signup</a>
            <a href="/customers/account">My Account</a>
            <a href="/statics/help">Help</a>
          </div>
        </div>
        <div class="row" id="action-nav">
          <div class="container">
            <div class="" id="nav-logo"><a href="/">Logo</a></div>
            <div class="" id="nav-search">
              <form action="/products/search"  method="post">
                <input type="text" name="q" class="span8" />
                <input type="submit" class="btn" >
              </form>
            </div>
            <div id="nav-cart" class="">
              <a href="#">Cart</a>
            </div>
          </div>
        </div>
        <div class="row" id="category-nav">
          <div class="container" id="categories-nav-tab">
            <a href="#" id="close-category-nav"><b>Close</b></a>
            <ul class="unstyled" id="category-nav-list">
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
              <li><img src="http://placekitten.com/g/90/90" class="thumbnail" /> <a href="/products/show">item</a></li>
            </ul>
            <div id="categories-nav-tab-pull">
              <em>Categories</em>
              <ul id="pull-marker" class="unstyled"><li></li><li></li></ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div id="main" class="container">
      {yield}
    </div>

    <div class="push"></div>
  </div> <!--! end of #container -->

  <footer>
        <section class="container">
                <div id="footer-logo">
                        <a href="/">Logo</a>
                </div>
                <div id="footer-category-links">
                        <h3>Categories</h3>
                        <ul class="unstyled">
                                <li><a href="#">kittens</a></li>
                                <li><a href="#">kittens</a></li>
                                <li><a href="#">kittens</a></li>
                                <li><a href="#">kittens</a></li>
                                <li><a href="#">kittens</a></li>
                                <li><a href="#">kittens</a></li>
                        </ul>
                </div>
                <div id="footer-nav-links">
                        <h3>Links</h3>
                        <ul class="unstyled">
                                <li><a href="#">home</a></li>
                                <li><a href="#">my account</a></li>
                                <li><a href="#">cart</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">privacy policy</a></li>
                                <li><a href="#">legal</a></li>
                        </ul>
                </div>
        </section>
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.6.2.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="/js/plugins.js"></script>
  <script defer src="/js/script.js"></script>
  <!-- end scripts-->

  <script>
    $(document).ready(function() {
      var category_row = $("#category-nav");
      $("#categories-nav-tab-pull, #close-category-nav").click(function(e) {
        e.preventDefault();
        category_row.toggleClass('show');
      });
    });
  </script>


  <script> // Change UA-XXXXX-X to be your site's ID
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>

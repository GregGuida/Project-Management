<?php $this->load->helper('html'); ?>
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
  <!-- start Mixpanel --><script type="text/javascript">var mpq=[];mpq.push(["init","83404691134345be69c8e274ebd34ee9"]);(function(){var b,a,e,d,c;b=document.createElement("script");b.type="text/javascript";b.async=true;b.src=(document.location.protocol==="https:"?"https:":"http:")+"//api.mixpanel.com/site_media/js/api/mixpanel.js";a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(b,a);e=function(f){return function(){mpq.push([f].concat(Array.prototype.slice.call(arguments,0)))}};d=["init","track","track_links","track_forms","register","register_once","identify","name_tag","set_config"];for(c=0;c<d.length;c++){mpq[d[c]]=e(d[c])}})();
 mpq.name_tag('User email address');
</script><!-- end Mixpanel -->
</head>

<body>

  <div id="container">
    <header>
      <div>
        <div class="row" id="link-nav">
          <div class="container">
          <?php if (is_logged()) { ?>
            <span class="nav-text"><b>Hello <?php echo get_current_user_stuff('FirstName') ?></b> - </span>  
            <a href="/customers/show">My Account</a>
            <a href="/sessions/logout">Logout</a>
          <?php } else { ?>
            <a href="/customers/login">Login</a>
            <a href="/customers/signup">Signup</a>
          <?php } ?>
            <a href="/statics/help">Help</a>
          </div>
        </div>
        <div class="row" id="action-nav">
          <div class="container">
            <div class="" id="nav-logo"><a href="/">TFM</a></div>
            <div class="" id="nav-search">
              <form action="/products/search"  method="post">
                <input type="text" name="q" class="span8" />
                <input type="submit" class="btn" >
              </form>
            </div>
            <div id="nav-cart" class="">
              <a href="/cart/">Cart</a>
            </div>
          </div>
        </div>
        <div class="row" id="category-nav">
          <div class="container" id="categories-nav-tab">
            <ul class="unstyled" id="category-nav-list">
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/g/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/g/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/g/90/90" class="thumbnail" /></a></li>
              <li data-text="Kitties"><a href="/categories/show/1"><span class="category-name"></span><img src="http://placekitten.com/90/90" class="thumbnail" /></a></li>
            </ul>
            <div id="categories-nav-tab-pull">
              Categories
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
                        <a href="/">TFM</a> <span class="help-block">Where things get sold</span>
                        <a href="http://mixpanel.com/f/partner"><img src="http://mixpanel.com/site_media/images/partner/badge_blue.png" alt="Real Time Web Analytics" /></a>
                </div>
                <div id="footer-category-links">
                        <h3>Categories</h3>
                        <ul class="unstyled">
                                <li><a href="/categories/show/">Kittens</a></li>
                                <li><a href="/categories/show/">Grey Kittens</a></li>
                                <li><a href="/categories/show/">Cute Kittens</a></li>
                                <li><a href="/categories/show/">Green Kittens</a></li>
                                <li><a href="/categories/show/">Happy Kittens</a></li>
                                <li><a href="/categories/show/">Cats</a></li>
                                <li><a href="/categories/show/">Happy Cats</a></li>
                        </ul>
                </div>
                <div id="footer-nav-links">
                        <h3>Links</h3>
                        <ul class="unstyled">
                                <li><a href="/">Home</a></li>
                                <li><a href="/customers/show">My account</a></li>
                                <li><a href="/cart">Cart</a></li>
                                <li><a href="/statics/about">About</a></li>
                                <li><a href="/statics/privacy">Privacy policy</a></li>
                                <li><a href="/statics/legal">Legal</a></li>
                                <li><a href="/statics/help">Help</a></li>
                        </ul>
                </div>
        </section>
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.6.2.min.js"><\/script>')</script>

  <script src="/js/libs/roundabout.js"></script>
  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="/js/plugins.js"></script>
  <script defer src="/js/script.js"></script>
  <script defer src="/js/libs/nivo-slider/jquery.nivo.slider.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/nivo-slider.css"/>        
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/themes/default/default.css"/>
   <script type="text/javascript"> jQuery(document).ready(function(){     jQuery("#main-slider").nivoSlider({         effect:"random",         slices:15,         boxCols:8,         boxRows:4,         animSpeed:500,         pauseTime:3000,         startSlide:0,         directionNav:true,         directionNavHide:true,         controlNav:true,         controlNavThumbs:false,         controlNavThumbsFromRel:true,         keyboardNav:true,         pauseOnHover:true,         manualAdvance:false     }); });         </script>

  <script>
    $(document).ready(function() {
      var category_row = $("#category-nav");
      $("#categories-nav-tab-pull, #close-category-nav").click(function(e) {
        e.preventDefault();
        category_row.toggleClass('show');
      });
    });
  </script>

  <?php
    echo isset($js) ? $this->htmlbuilder->makeHeadJS($js) : '';
  ?>

  <script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26460479-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
  <!-- end scripts-->

  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>

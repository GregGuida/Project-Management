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
</head>

<body>

  <div id="container">
    <header>
      <div>
        <div class="row" id="link-nav">
          <div class="container">
            <a href="/sessions/login">Logout</a>
          </div>
        </div>
        <div class="row" id="action-nav">
          <div class="container">
            <div class="" id="nav-logo"><a href="/">TFM</a></div>
            <ul class="tabs">
		<li><a href="/admin/">Dashboard</a></li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Products</a>
			<ul class="dropdown-menu">
				<li><a href="#">Browse Products</a></li>
				<li><a href="#">Add Products</a></li>
				<li><a href="#">Manage Categories</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Employee</br>Management</a>
			<ul class="dropdown-menu">
				<li><a href="#">Browse Employees</a></li>
				<li><a href="#">Add Employees</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Orders</a>
			<ul class="dropdown-menu">
				<li><a href="#">Browse Orders</a></li>
				<li><a href="#">Add Orders</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Customer<br/>Management</a>
			<ul class="dropdown-menu">
				<li><a href="#">Find Customers</a></li>
				<li><a href="#">Customer Chat</a></li>
			</ul>
		</li>
	    </ul>
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
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.6.2.min.js"><\/script>')</script>

  <script src="/js/libs/roundabout.js"></script>
  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="/js/plugins.js"></script>
  <script defer src="/js/script.js"></script>
  <script defer src="/js/libs/bootstrap/bootstrap-tabs.js"></script>
  <script type="text/javascript"></script>
  <script defer src="/js/libs/nivo-slider/jquery.nivo.slider.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/nivo-slider.css"/>        
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/themes/default/default.css"/>
   <script type="text/javascript"> jQuery(document).ready(function(){     jQuery("#main-slider").nivoSlider({         effect:"random",         slices:15,         boxCols:8,         boxRows:4,         animSpeed:500,         pauseTime:3000,         startSlide:0,         directionNav:true,         directionNavHide:true,         controlNav:true,         controlNavThumbs:false,         controlNavThumbsFromRel:true,         keyboardNav:true,         pauseOnHover:true,         manualAdvance:false     }); });         </script>
  <!-- end scripts-->


  <script>
    jQuery(document).ready(function() {
      var category_row = $("#category-nav");
      $("#categories-nav-tab-pull, #close-category-nav").click(function(e) {
        e.preventDefault();
        category_row.toggleClass('show');
      });
      $('.tabs').tabs();
    });
  </script>

  <?php echo isset($js) ? $this->htmlbuilder->makeHeadJS($js) : ''; ?>

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

  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>

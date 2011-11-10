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

<body class="admin">
  <div id="container">
    <header>
      <div>
        <div class="row" id="link-nav">
          <div class="container">
            <?php if (is_logged()) { ?>
            <span class="nav-text"><b>Hello <?php echo get_current_user_stuff('FirstName') ?></b></span>
            <a href="/employees/dashboard/">Home</a>
            <a href="/sessions/logout">Logout</a>
            <?php } else { ?>
            <a href="/employees/login">Login</a>
            <?php } ?>
            <a href="/">Shop</a>
          </div>
        </div>
        <div class="row" id="action-nav">
          <div class="container">
            <div class="" id="nav-logo"><a href="/employees/dashboard">TFM</a></div>
            <ul class="dropdowns">
		<li><a href="/employees/dashboard/">Dashboard</a></li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Products</a>
			<ul class="dropdown-menu">
				<li><a href="/products/admin_browse">Browse Products</a></li>
				<li><a href="/products/edit">Add Products</a></li>
				<li><a href="/categories/admin_browse">Manage Categories</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Employees</a>
			<ul class="dropdown-menu">
				<li><a href="/employees/">Browse Employees</a></li>
				<li><a href="/employees/add">Add Employees</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Orders</a>
			<ul class="dropdown-menu">
				<li><a href="/orders/admin_browse">Browse Orders</a></li>
			</ul>
		</li>
		<li class="dropdown" data-dropdown="dropdown">
			<a href="#" class="dropdown-toggle">Customer</a>
			<ul class="dropdown-menu">
				<li><a href="/customers/">Find Customers</a></li>
				<li><a href="/customers/contact/">Customer Chat</a></li>
			</ul>
		</li>
    <li class="dropdown" data-dropdown="dropdown">
      <a href="#" class="dropdown-toggle">Stock</a>
      <ul class="dropdown-menu">
        <li><a href="/stock_items/admin_browse">View Stock</a></li>
        <li><a href="/stock_tickets/admin_add">Add Stock</a></li>
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
  <script defer src="/js/libs/bootstrap/bootstrap-dropdown.js"></script>
  <script defer src="/js/libs/bootstrap/bootstrap-modal.js"></script>
  <script type="text/javascript"></script>
  <script defer src="/js/libs/nivo-slider/jquery.nivo.slider.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/nivo-slider.css"/>        
  <link rel="stylesheet" type="text/css" href="/js/libs/nivo-slider/themes/default/default.css"/>
   <script type="text/javascript"> jQuery(document).ready(function(){     jQuery("#main-slider").nivoSlider({         effect:"random",         slices:15,         boxCols:8,         boxRows:4,         animSpeed:500,         pauseTime:3000,         startSlide:0,         directionNav:true,         directionNavHide:true,         controlNav:true,         controlNavThumbs:false,         controlNavThumbsFromRel:true,         keyboardNav:true,         pauseOnHover:true,         manualAdvance:false     }); });         </script>
  <!-- end scripts-->


  <?php echo isset($js) ? $this->htmlbuilder->makeHeadJS($js) : ''; ?>

  <script>
    jQuery(document).ready(function() {
      var category_row = $("#category-nav");
      $("#categories-nav-tab-pull, #close-category-nav").click(function(e) {
        e.preventDefault();
        category_row.toggleClass('show');
      });

      $('.dropdowns').dropdown();

      // table sorters
      var table_sorters = $('#orderSortTable,#employeeTableSorter');
      if (table_sorters.size() > 0) {
        table_sorters.tablesorter();
      }

      $('#new-image').click(function(){
        $('<div id="modal-from-dom" class="modal hide fade" style="display: none; ">'+
          '<div class="modal-header"><a href="#" class="close">×</a><h3>Upload Image</h3></div>'+
          '<iframe style="margin:0 auto;display:block;width:560px;padding:0;border:none;" src="/products/upload_image"></iframe></div>')
          .appendTo('body').modal({
          'backdrop':true,
          'keyboard':true,
          'show':true
        })
      });
    });
  </script>


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

<script>
//document.write(unescape('%3Cscript src="' + protocol + '//mixpanel.com/site_media/api/platform/platform.1.min.js" type="text/javascript"%3E%3C/script%3E'));
</script>
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>

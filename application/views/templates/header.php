<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php if (isset($extraMeta)) print $extraMeta ?>
<title><?php print $title ?> - Prêt à Styler – Your Online Stylist and Personal Shopper</title>
<link href="/css/vendors.css?v=2.2.0.0" rel="stylesheet">
<link href="/css/default.css?v=2.2.0.2" rel="stylesheet">
<link href="/css/mozilla.css?v=2.2.0.0" rel="stylesheet">
<?php if (isset($extraCSS)) print $extraCSS; ?>
<!--- - - - - - CSS overwriter   - - - - -->
<link href="/css/style.css?v=2.2.0.2" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
<link href="/css/jTour.css" rel="stylesheet">
<!--- - - - - - CSS overwriter   - - - - -->
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/actual_product.js?v=2.2.0.0"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/modernizr.custom.86254.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.mousewheel.min.js"></script>
<script src="/js/jquery.touchSwipe.min.js"></script>
<script src="/js/jquery.ba-throttle-debounce.min.js"></script>
<script src="/js/jquery.transit.min.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="/js/selectivizr-min.js"></script>
<script src="/js/html5.js"></script>
<![endif]-->
<script src="/js/jquery.focuspoint.min.js"></script>
<script src="/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/accordion.js"></script>
<script src="/js/jquery.fittext.js"></script>
<script src="/js/jquery.liblink.js"></script>
<script src="/js/jquery.nouislider.all.min.js"></script>
<script src="/js/jquery.jscrollpane.min.js"></script>
<script src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="/js/functions.js?v=2.2.0.2"></script>
<script src="/js/script.js?v=2.2.0.1"></script>
<script src="/js/tabs.js?v=2.2.0.0"></script>
<script src="/js/menu-mall.js?v=2.2.0.5"></script>

<!-- Remarketing code  -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '1458274767744915']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1458274767744915&amp;ev=PixelInitialized" /></noscript>
<?php if (isset($extraJS)) print $extraJS ?>

<!-- Start Visual Website Optimizer Asynchronous Code -->
<script type='text/javascript'>
var _vwo_code=(function(){
var account_id=109455,
settings_tolerance=2000,
library_tolerance=2500,
use_existing_jquery=false,
// DO NOT EDIT BELOW THIS LINE
f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
</script>
<!-- End Visual Website Optimizer Asynchronous Code -->

<?php if( ENVIRONMENT == 'production') { ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-51485487-1', 'auto');
	  ga('send', 'pageview');
	</script>
	<script type="text/javascript" src="//s.skimresources.com/js/66930X1514478.skimlinks.js"></script>
<?php } ?>
</head>

<body>

	<?php if (isset($extraDiv)) print $extraDiv ?>
	<div id="wrap">
		<?php /* if (!isset($no_background_image)) { ?>
		<div class="bgHeader"><img src="/images/topbanner/<?php echo rand(1, 7) ?>.jpg" alt=""></div>
		<?php } */ ?>
		<header>
			<ul class="userMenu relative">
			    <li class=" relative"><a href="/mall.html" title="My personally curated fashion feed.">MALL</a></li>
			    <!-- <li><a href="/about-us.html">ABOUT US</a></li> -->
			    <?php if ($this->flexi_auth->is_logged_in()){ ?>
			    	
			    	<li class="userSub relative menuBorder">
			    		<span><a href="/how-it-works.html">ABOUT</a></span>
			    		<ul class="userSubMenu">
			    			<li class="emptySubMenuFixer"> &nbsp; </li>
			    			<li><a href="/how-it-works.html" title="Learn why PrêtàStyler is so special.">How It Works</a></li>
			    			<!-- <li><a href="/how-it-works.html">Take Tour</a></li> -->
			    			<li><a href="/our-story.html" title="Know our story">Our Story</a></li>
			    		</ul>
			    	</li>
			    	<li class="relative menuBorder"><a href="/faq.html" title="How things work">HELP</a></li>
			    	<li class=" relative menuBorder"><a href="http://pretastyler.com/blog" title="Features on everything style and fashion related.">STYLE CLINIC</a></li>
			    	<li class="userSub relative menuBorder">
			    		<span><a href="/user/my-dressing-room.html#wishList">DRESSING ROOM</a></span>
			    		<ul class="userSubMenu">
			    			<li class="emptySubMenuFixer"> &nbsp; </li>
			    			<li><a class="acttabsInner" href="/user/my-dressing-room.html#wishList">Wishlist</a></li>
							<li><a class="acttabsInner" href="/user/my-dressing-room.html#myfinds">My Finds</a></li>
			    			<li><a class="acttabsInner" href="/user/my-dressing-room.html#itemsPendingGarment">Items Pending Assessment</a></li>
			    		</ul>
			    	</li>
			    	<!-- <li class="userSub relative menuBorder">
			    		<span><a href="/boards.html">STYLE BOARDS</a></span>
			    		<ul class="userSubMenu">
			    			<li style="background-color: #555655;height: 6px;"> &nbsp; </li>
			    			<li><a href="/boards/create.html">Create</a></li>
			    			<li><a href="/boards/my.html">Search</a></li>
			    			<li><a href="/user/loved.html">etc</a></li>
			    		</ul>
			    	</li> -->
			    	<li class="userSub relative menuBorder">
			    		<span><a href="/user.html"><?php print strtoupper($first_name) ?>'S ACCOUNT</a></span>
			    		<ul class="userSubMenu">
			    			<li class="emptySubMenuFixer"> &nbsp; </li>
			    			<li><a href="/user.html">Edit Profile</a></li>
			    			<li><a href="/user/logout.html">Log Out</a></li>
			    		</ul>
			    	</li>
					
			    <?php } else { ?>
					<li class=" relative menuBorder"><a href="/how-it-works.html" title="Learn why PrêtàStyler is so special.">HOW IT WORKS?</a></li>
					<li class=" relative menuBorder"><a href="/faq.html" title="How things work">HELP</a></li>
					<li class=" relative menuBorder"><a href="http://pretastyler.com/blog" title="Features on everything style and fashion related.">STYLE CLINIC</a></li>
					<li class=" relative menuBorder"><a href="/index.html#profile" title="Register to Pretastyler"><i class="icon-user"></i>SIGN-UP</a></li>
					<li class=" relative menuBorder"><a href="/useraccount/login.html" title="Login to Pretastlyer"><i class="icon-lock"></i>LOGIN</a></li>
				<?php } ?>
				
				
			</ul>
			<!-- <a href="#" id="menuButton" class="sqBtn light"><i class="icon-menu"></i></a> -->
			
			<?php /* if (!isset($no_sqBtn)) { ?>
			<a href="#" class="sqBtn" id="trigger"><img src="/images/pinkbutton.png" width="46px"></a>
			<?php } */?>
			<a href="/" class="logo"><img src="/img/newlogo.png" width="193" alt="PrêtàStyler" title="PrêtàStyler"></a>
			<?php /* ?><!-- <nav>
				<ul>
					<?php if ($this->flexi_auth->is_logged_in()){ ?>
					<li><a href="/user.html"><span>Welcome <?php print $first_name ?></span></a><a href="/user/logout.html"><span>Log Out</span></a></li>
					<?php } else { ?>
					<li><a href="javascript:void(0)" onclick="register_click();"><span>Join Us</span></a><a href="javascript:void(0)" onclick="login_click();"><span>Log In</span></a></li>
					<?php } ?>
					<li><a href="/our-story.html">OUR STORY</a></li>
					<li><a href="/how-it-works.html">HOW IT WORKS ?</a></li>
					<li><a href="/">STYLE FEED</a></li>
					<li><a href="http://pretastyler.com/blog">BLOG</a></li>
				</ul>
			</nav>
			 --><?php */ ?>
		</header>
		
		<?php if (isset($content_class)) { ?>
		<div class="<?php print $content_class ?>">
		<?php } else { ?>
		<div class="content <?php if (isset($product_page)) echo $product_page; ?>">
		<?php } ?>
			<div class="container">
    			<?php if( !empty( $breadcrumb[0] ) ) { ?>
    			<div class="breadcrumb">
                    <ul>
                        <li class="bread_sub_one"><a href="/" title="Home"><img alt="Home" src="/images/homebutton.png" width="20"> HOME</a></li>
                            <li class="bread_sub_two"> > <?php echo $breadcrumb[0]; ?></li>
                            <?php if( !empty( $breadcrumb[1] ) ) { ?>
                                <li class="bread_sub_three"> > <?php echo $breadcrumb[1]; ?></li>
                            <?php echo ( !empty($breadcrumb[2]) ? "<li> > ".$breadcrumb[2]."</li>" : "" ) ?>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
               
                <div class="innerWrap"> 

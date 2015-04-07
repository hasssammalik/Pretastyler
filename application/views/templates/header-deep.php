<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php print $title ?> - Prêt à Styler – Your Online Stylist and Personal Shopper</title>
<link href="/css/vendors.css" rel="stylesheet">
<link href="/css/default.css" rel="stylesheet">
<link href="/css/mozilla.css" rel="stylesheet">
<?php if (isset($extraCSS)) print $extraCSS; ?>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<script src="/js/jquery-1.11.1.min.js"></script>
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
<script src="/js/functions.js"></script>
<script src="/js/script.js"></script>
<script src="/js/tabs.js"></script>
<?php if (isset($extraJS)) print $extraJS ?>
</head>

<body>
	<?php if (isset($extraDiv)) print $extraDiv ?>
	<div id="wrap">
		<?php if (!isset($no_background_image)) { ?>
		<div class="bgHeader"><img src="/images/topbanner/<?php echo rand(1, 7) ?>.jpg" alt=""></div>
		<?php } ?>
		<header>
			<ul class="userMenu">
				<?php if ($this->flexi_auth->is_logged_in()){ ?>
				<li><a href="/user.html"><i class="icon-user"></i>Welcome <?php print $first_name ?></a></li>
				<li><a href="/user/logout.html"><i class="icon-lock"></i>Log Out</a></li>
				<?php } else { ?>
				<li><a href="javascript:void(0)" onclick="register_click();"><i class="icon-user"></i>Join Us</a></li>
				<li><a href="javascript:void(0)" onclick="login_click();"><i class="icon-lock"></i>Log In</a></li>
				<?php } ?>
			</ul>
			<a href="#" id="menuButton" class="sqBtn light"><i class="icon-menu"></i></a>
			
			<?php if (!isset($no_sqBtn)) { ?>
			<a href="#" class="sqBtn" id="trigger">+</a>
			<?php } ?>
			<a href="/" class="logo"><img src="/images/logo2.png" alt=""></a>
			<nav>
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
		</header>
		<?php if (isset($content_class)) { ?>
		<div class="<?php print $content_class ?>">
		<?php } else { ?>
		<div class="content">
		<?php } ?>
			<div class="container">

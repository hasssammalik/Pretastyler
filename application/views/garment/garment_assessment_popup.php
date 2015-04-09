<!DOCTYPE html>
<html class="popup">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/css/vendors.css" rel="stylesheet">
<link href="/css/default.css?v=2.1" rel="stylesheet">
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
</head>

<body>
	<div class="popup">
		<div class="popupHeader">
			<h2>Your style genie assessment</h2>
		</div>		
		<div class="popupContent">			
			<div class="group">
				<div class="col span_13">
					<div class="image">
						<div class="rating"><?php 
						if ($garment['score']){
							if ($garment['score']>7.3){
								print 5;
							} else if ($garment['score']>6){
								print 4;
							} else if ($garment['score']>5){
								print 3;
							} else if ($garment['score']>3){
								print 2;
							} else {
								print 1;
							}
						}
						?><i class="icon-star"></i></div>
						<span><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name'] ?>"></span>
						<ul class="socialOptions">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-pinterest"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-googleplus"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col span_1">&nbsp;</div>
				<div class="col span_10">
					<?php if ( $garment['score'] > 7.3 ) { ?>
					<div class="assessmentResult">
						<h3><strong>EXCELLENT</strong></h3>
						<h4><strong>BOOM, YOU HAVE A WINNER</strong></h4>
						<p>You're going to turn heads and break hearts in this little number.</p>
					</div>
					<?php } else if (  $garment['score'] > 6 ) { ?>
					<div class="assessmentResult">
						<h3><strong>GOOD</strong></h3>
						<h4><strong>LOOKING GOOD, GORGEOUS</strong></h4>
						<p>Figure flattering and fabulous all at the same time.</p>
					</div>
					<?php } else if ( $garment['score'] > 5 ) { ?>
					<div class="assessmentResult">
						<h3><strong>MAYBE</strong></h3>
						<h4><strong>MMM, BIT OF A RISKY PURCHASE</strong></h4>
						<p>Why take the risk on this one when you can find something better?</p>
					</div>
					<?php } else { ?>
					<div class="assessmentResult">
						<h3><strong>AVOID</strong></h3>
						<h4><strong>DERP, YOU DESERVE BETTER THAN THIS</strong></h4>
						<p>You can look so much better. Give this one a miss.</p>
					</div>
					<?php } ?>
					
					
					<h4><span>WHAT'S NEXT?</span></h4>
					<div class="buttonsHolder">
						<a href="/mall/similar/<?php print $garment['garment_id'].'-'.url_title($garment['name']).'.html' ?>" class="button" target="_parent" >See similar items</a>
						<a href="/product/<?php print $garment['garment_id'].'-'.url_title($garment['name']).'.html' ?>" class="button" target="_parent" >See garment insights</a>
						<a href="/user/my-dressing-room.html#itemsPendingGarment" class="button" target="_parent" >open my dessing room</a>
						<a href="/mall.html" class="button" target="_parent" >go to the shopping mall</a>
						<a href="/user/my-dressing-room.html#myfinds" class="button" target="_parent" >go to my finds</a>
						<a href="<?php print $garment['url'] ?>" target="_parent"  class="button">buy item</a>
						<a href="/garment/edit/<?php print $garment['garment_id'].'-'.url_title($garment['name']).'.html' ?>" class="button" target="_parent" >edit my item</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
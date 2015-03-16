<div class="mainContent">
	
	<div class="frontWrap">
		<div class="homepage-header">
			<div class="header-bg__container">
				
				<div class="header-bg__container-content role-element leadstyle-container center" style=" background-color: rgba(0,0,0,0.5); padding: 20px;">
					<p style="font-size:28px; font-weight: bold;">SHOPPING ONLINE JUST GOT PERSONAL</p>
					<p style="font-size:20px;">
						Cut Through the Clutter of Fashion<br>
						Find everything that suits you in one perfect place<br>
						'Your Exclusive Fashion Mall'
					</p>
				</div>
			
		</div>
		
	</div>
	<!--	<section class="tutorial role-element leadstyle-container" id="free-tutorial">
		
		<p class="tutorial__headline role-element leadstyle-text">The Future of Fashion Has Arrived </p>
		
		<ul class="tutorial__list role-element leadstyle-text"><li>Ever asked yourself:&nbsp;<br>What suits me? What fits me? Where can I buy it? How should I style
		it?<br><span style="font-size: 1rem;">PrêtàStyler provides all these answers and fills your private
		fashion mall
		with garments and accessories perfect for your height, shape and age,
		using the very latest technology and intelligent algorithms
		available.<br> You'll be spoilt for choice no matter what you're after.  </span></li></ul>
		
		</section>
	-->
	
	<section class="role-element container wid60 preta-tooltip" id="the-product">
		
		<div class="wid100">
			
			<style type="text/css">
				.ui-slider-float .ui-slider-tip,
				.ui-slider-float .ui-slider-tip-label {
				border: solid 0 #ffffff;
				margin-left: -34px;
				}
				.ui-slider-pips:not(.ui-slider-disabled) .ui-slider-pip:hover .ui-slider-label {
				color: #666;
				}
				.ui-slider-pips .ui-slider-pip-selected, .ui-slider-pips .ui-slider-pip-selected-first, .ui-slider-pips .ui-slider-pip-selected-second,
				.ui-slider-pips .ui-slider-pip.ui-slider-pip-selected .ui-slider-label,
				.ui-slider-pips:not(.ui-slider-disabled) .ui-slider-pip.ui-slider-pip-selected .ui-slider-label,
				.ui-slider-pips .ui-slider-pip-selected-initial
				{
				color: #e72775;
				}
				.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
				background: none;
				background: #e72775;
				top: -11px;
				height: 20px;
				width: 20px;
				border-radius: 14px;
				}
				.ui-state-hover,.ui-widget-content .ui-state-hover,.ui-widget-header .ui-state-hover,.ui-state-focus,.ui-widget-content .ui-state-focus,.ui-widget-header .ui-state-focus {
				background: none;
				background: #e72775;
				border-color: none;
				}
				.ui-slider-horizontal {
				height: 0;
				border: 3px solid #dddddd;
				}
				.ui-slider-pip .ui-slider-label {
				font-size: 0.9em;
				margin-left: -1em;
				text-align: left;
				width: 8em;
				}
				.ui-slider-tip img{
				width: 70px;
				cursor: pointer;
				}
				.ui-slider-float .ui-slider-tip:before, .ui-slider-float .ui-slider-pip .ui-slider-tip-label:before, .ui-slider-float .ui-slider-tip:after, .ui-slider-float .ui-slider-pip .ui-slider-tip-label:after {
				display: none;
				}
				.ui-slider-pips, .ui-slider-float {
				cursor: pointer;
				}
				.ui-slider.ui-slider-horizontal {
				margin-left: 50px;
				margin-top: 21px;
				}
				.ui-slider-horizontal {
				height: 0;
				border: 3px solid #E4E4E4;
				}
				.ui-slider-pips .ui-slider-pip {
				top: 14px;
				}
				.ui-slider-float .ui-slider-handle:hover .ui-slider-tip, .ui-slider-float .ui-slider-handle:focus .ui-slider-tip, .ui-slider-float .ui-slider-pip:hover .ui-slider-tip-label {
					top:-135px;
					
				}
				 
			</style>
			<script type="text/javascript">
				
				var default_values = [3,4,2,4,2,5,2];
				
				$(function(){
					var height = [ "Short", "Med-short", "Medium", "Med-tall", "Tall" ];
					var size = [ "Allegra", "Natalie", "Halle", "Drew", "America", "Kim", "Queen", "Ophra" ];
					var age = [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "75 >" ];
					var bodyshape = [ "Hour glass", "Inverted triangle", "Rectangle", "Triangle", "Oval", "Diamond"];
					var bodyratio = [ "long legged short torso", "balanced body", "short legged long torso" ];
					var bust = [ "aa", "a", "b", "c", "d", "dd", "e", "ee >" ];
					var build = [ "Small", "Medium", "Large" ];
					
					var heightimage = [ 
					'<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa; When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your jawline.&#xa;Necklines with some length such as V and scoop look best on you.High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless."><div class="img"><div><img src="/images/profileSetup/neckThickness/very-thin.jpg"></div></div></label>','<img src=/images/profileSetup/neckThickness/average.jpg">','<img src="/images/profileSetup/neckThickness/thick-chin.jpg">','','' ];
					var sizeimage = [ '<img src="/images/profileSetup/neckThickness/very-thin.jpg">','<img src="/images/profileSetup/neckThickness/average.jpg">','<img src="/images/profileSetup/neckThickness/thick-chin.jpg">', '', '', '', '', '' ];
					var ageimage = [ '<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa;'+
					'When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your'+
					'jawline.&#xa;Necklines with some length such as V and scoop look best on you.High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless."><div class="img"><div><img src="/images/profileSetup/neckThickness/average.jpg"></div></div></label>','<img src="/images/profileSetup/neckThickness/thick-chin.jpg">', '', '' ];
					var bodyshapeimage = [ '<img src="/images/profileSetup/horizdontalBodyShape/hourGlass.jpg">','<img src="/images/profileSetup/horizontalBodyShape/invertedTriangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/triangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/rectangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/oval.jpg">','<img src="/images/profileSetup/horizontalBodyShape/diamond.jpg">' ];
					var bodyratioimage = [ '<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa; When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your jawline.&#xa;Necklines with some length such as V and scoop look best on you.&#xa;High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless."><div class="img"><div><img src="/images/bodysize1.png"></div></div></label>',
					'<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa; When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your jawline.&#xa;Necklines with some length such as V and scoop look best on you.&#xa;High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless."><div class="img"><div><img src="/images/bodysize1.png"></div></div></label>',
					'<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa; When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your jawline.&#xa;Necklines with some length such as V and scoop look best on you.&#xa;High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless."><div class="img"><div><img src="/images/bodysize1.png"></div></div></label>' ];
					var bustimage = [ '<img src="/images/profileSetup/neckThickness/very-thin.jpg">','<img src="/images/profileSetup/neckThickness/average.jpg">','<img src="/images/profileSetup/neckThickness/thick-chin.jpg">', '', '', '', '', '' ];
					var buildimage = [ '<img src="/images/profileSetup/boneStructure/small.jpg">','<img src="/images/profileSetup/boneStructure/medium.jpg">','<img src="/images/profileSetup/boneStructure/large.jpg">' ];
					
					$(".newprofile-height")
					.slider({
						min: 0, 
						max: height.length-1, 
						value: default_values[0]-1
					})
					.slider("pips", {
						labels: height
					})
					.slider("float", {
						rest: "label",
						labels: heightimage
					})
					.on("slidechange", function(e,ui) {
						//$(".val1").text( "You selected " + heightimage[ui.value] + " (" + ui.value + ")");
						default_values[0] = (+ui.value+1);
						pull_profile_garment();
					});
					
					$(".newprofile-size")
					.slider({
						min: 0, 
						max: size.length-1, 
						value: default_values[1]-1
					})
					.slider("pips", {
						labels: size
					})
					.slider("float", {
						rest: "label",
						labels: sizeimage
					})
					.on("slidechange", function(e,ui) {
						default_values[1] = (+ui.value+1);
						console.log(default_values);
						pull_profile_garment();
					});
					
					
					$(".newprofile-age")
					.slider({
						min: 0, 
						max: age.length-1, 
						value: default_values[2]-1
					})
					.slider("pips", {
						labels: age
					})
					.slider("float", {
						rest: "label",
						labels: ageimage
					})
					.on("slidechange", function(e,ui) {
						default_values[2] = (+ui.value+1);
						pull_profile_garment();
					});
					
					
					$(".newprofile-bodyshape")
					.slider({
						min: 0, 
						max: bodyshape.length-1, 
						value: default_values[3]-1
					})
					.slider("pips", {
						labels: bodyshape
					})
					.slider("float", {
						rest: "label",
						labels: bodyshapeimage
					})
					.on("slidechange", function(e,ui) {
						default_values[3] = (+ui.value+1);
						pull_profile_garment();
					});
					
					
					$(".newprofile-bodyratio")
					.slider({
						min: 0, 
						max: bodyratio.length-1, 
						value: default_values[4]-1
					})
					.slider("pips", {
						labels: bodyratio
					})
					.slider("float", {
						rest: "label",
						labels: bodyratioimage
					})
					.on("slidechange", function(e,ui) {
						default_values[4] = (+ui.value+1);
						pull_profile_garment();
					});
					
					
					$(".newprofile-bust")
					.slider({
						min: 0, 
						max: bust.length-1, 
						value: default_values[5]-1
					})
					.slider("pips", {
						labels: bust
					})
					.slider("float", {
						rest: "label",
						labels: bustimage
					})
					.on("slidechange", function(e,ui) {
						default_values[5] = (+ui.value+1);
						pull_profile_garment();
					});
					
					
					$(".newprofile-build")
					.slider({
						min: 0, 
						max: build.length-1, 
						value: default_values[6]-1
					})
					.slider("pips", {
						labels: build
					})
					.slider("float", {
						rest: "label",
						labels: buildimage
					})
					.on("slidechange", function(e,ui) {
						default_values[6] = (+ui.value+1);
						pull_profile_garment();
					});
					
					pull_profile_garment( );
					
				});
				
				function pull_profile_garment( ) {
					//console.log(default_values);
					var requestvalues = { "height_select_id" : default_values[0],
						"weight_select_id" : default_values[1],
						"age_select_id" : default_values[2],
						"horizontal_select_id" : default_values[3],
						"vertical_select_id" : default_values[4],
						"bra_select_id" : default_values[5],
						"wrist_size" : default_values[6]
					};
					$.post( "/mall/garment-by-profile.html", {offset: 0, limit: 5, uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
						$( ".garments" ).html( data );
					});
				}
				
			</script>
			
			<div class="container">
				
				<div class="homeprofile-head">
					<img src="/images/newhomedown.png" class="noneArea noneLiner ">
					
					<p class="i profile-big-title">Let's start by selecting your <strong>body features</strong></p>
					<p style="padding-left: 100px;font-size: 0.9em;">Pop your details below and your personal fashion mall will automatically 
					overflow with clothing and accessories tailor made for your style, shape and age.</p>
				</div>
				
			</div>
			
			<div class="profileWrap container">
				
				<div class="home-profile home-profile-height">
					
					<div class="slider-name left">
						<p>HEIGHT</p>
					</div>
					<div class="homepageslider left sliderwrap-height">
						<div class="newprofile-height"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-size">
					<div class="slider-name left">
						<p>SIZE</p>
					</div>
					<div class="homepageslider left sliderwrap-size">
						<div class="newprofile-size"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-age">
					<div class="slider-name left">
						<p>AGE</p>
					</div>
					<div class="homepageslider left sliderwrap-age">
						<div class="newprofile-age"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-bodyshape">
					<div class="slider-name left">
						<p>BODY SHAPE</p>
					</div>
					
					<div class="homepageslider left sliderwrap-bodyshape">
						<div class="newprofile-bodyshape"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-bodyratio">
					<div class="slider-name left">
						<p>BODY RATIO</p>
					</div>
					
					<div class="homepageslider left sliderwrap-bodyratio ">
						<div class="newprofile-bodyratio"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-bust">
					<div class="slider-name left">
						<p>BUST</p>
					</div>
					
					<div class="homepageslider left sliderwrap-bust ">
						<div class="newprofile-bust"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="home-profile home-profile-build">
					<div class="slider-name left">
						<p>BUILD</p>
					</div>
					
					<div class="homepageslider left sliderwrap-build">
						<div class="newprofile-build"></div>
					</div>
					<div class="clear"></div>
				</div>
				
				
				
			</div>
			
		</div>
		<br>
		
	</section>
	
	<section class="wid100 bkYellowGrey home-product-list-custom-profile">
		
		<div class="homeprofile-head">
			<img src="/images/newhomedown.png" class="noneArea noneLiner">
			<p class="i profile-big-title">Here's just a few <strong>garments we've found for you</strong></p>
		</div>
		
		<!--	<div class="homeprofile-garments container wid70">
			<div class="garments othergrey turnOffPlaceHolderGarment">
			</div>
			<div class="clear"></div>
		</div> -->
		
		<div class="panel2" id="similarItems">
			<!-- <div class="panelHeader">Similar Items that suit you</div> -->
			<div class="panelContent" style="background-color: #F0F0F0;">
				<div class="sliderWrap">
					<ul class="items">
						<?php if ($similar_garments) {
							foreach ($similar_garments as $row) {?>
							<li><a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank"><img src="<?php print '/images/garment/'.$row['image_path'] ?>" alt="<?php print $row['name']?>"></a>
							</li>
							<?php }
						}?>
					</ul>
					<a href="#" class="prevNew"><span><i class="icon-arrow-left"></i></span></a>
					<a href="#" class="nextNew"><span><i class="icon-arrow-right"></i></span></a>
				</div>
			</div>
		</div>
		
		<div class="homeprofile-head">
			<!-- <p class="homeprofile-bodytext">Here's just a few <strong>garments we've found for you</strong></p> -->
			<p class="homeprofile-bodytext"><strong>What next?</strong></p>
			<div class="mall-links">	
				<div class="mall-link1">
					<p class="homeprofile-bodytext">I'm on a roll show me </p>
					<a class="bkpinkycolor home-vistmallbtn container noneLiner" href="/your-mall.html">
						MORE QUESTION <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
					</a>
				</div>
				<div class="mall-link2">
					<p class="homeprofile-bodytext">I'm too excited to wait </p>
					<button class="bkpinkycolor home-vistmallbtn container noneLiner"  id="signup-popup">
						LET ME IN <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
					</button>
					
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
	</section>
	
	
	<div style="display:none;">
		
		<form method="post" name="yourmallsection">
			
			<input type="hidden" name="height_select_id" id="height_select_id">
			<input type="hidden" name="weight_select_id" id="weight_select_id">
			<input type="hidden" name="age_select_id" id="age_select_id">
			<input type="hidden" name="horizontal_select_id" id="horizontal_select_id">
			<input type="hidden" name="vertical_select_id" id="vertical_select_id">
			<input type="hidden" name="bra_select_id" id="bra_select_id">
			<input type="hidden" name="wrist_size" id="wrist_size">
			
		</form>
		
	</div>
	
	
	
</div>
<section class="brand role-element leadstyle-container" id="brands" style="background-color:white;">
	
	
	<div class="brand__container float-left-images">
		
		<h3 class="brand__container-title role-element leadstyle-text">Some of the brands that can be in your mall</h3>
		
		<img src="/images/ann_taylor.jpg">
		<img src="/images/asos.jpg">
		<img src="/images/avenue.jpg">
		<img src="/images/gorman.jpg">
		<img src="/images/missguided.jpg">
		
	</div>
	<div style="clear:both;"></div>
	
</section>
<div class="popup-box">
	<div class="cross"><div class="cross-image-homepage"><img src="/images/cross.png" alt=""></div></div>
	<h1 style="padding: 5px;">One Last Thing</h1><hr width="95%" size="2" />
	<form action="/mall-by-profile.html" method="post">
		<div><input type="text" placeholder="First Name" name="fname"/><input type="text" placeholder="Last Name" name="lname"/></div>
		<div><input type="email" placeholder="Email" name="email" required/></div>
		<div><input type="password" placeholder="Password" name="password"/><input type="password" placeholder="Confirm Password" name="cpass"/></div>
		<div style="text-align:center"><button>Start my Trial</button></div>
		
	</form>
	<div style="text-align:center">Trial Expires in 30 days.</div>
</div>
<div class="modalOverlay"></div>
<footer>
	<ul>
		<li><a href="#">BROWSER EXTENSION</a>|</li>
		<li><a href="/terms.html">TERMS</a>|</li>
		<li><a href="/our-story.html">OUR STORY</a>|</li>
		<li><a href="/contact-us.html">CONTACT</a>|</li>
		<li><a href="/retailer.html">RETAILERS</a></li>
	</ul>
	<ul class="social">
		<li><a href="https://www.facebook.com/PrestaStyle" class="fb" target="_blank"><i class="icon-facebook"></i></a></li>
		<li><a href="https://twitter.com/YourUniqueStyle" class="tw" target="_blank"><i class="icon-twitter"></i></a></li>
		<li><a href="https://www.pinterest.com/areinten/" class="pin" target="_blank"><i class="icon-pinterest"></i></a></li>
		<li><a href="https://plus.google.com/+Pretastyler" rel="publisher">Google+</a></li>
		
	</ul>
	
</footer>
</div>

</div>

</div>

</div>
</div>

</div>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?2DZTXFz3pU0P9dFbK9NzPb2IBE2aAE8b';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
		var b=document.getElementsByTagName("script")[0];
		a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
<div id="popup-scroll">
	<div class="email-subscriber">
		
		<div class="bottom-div">
			<div style="width:1018px;margin: 0 auto;height:100%;">
				<img class="brand-image-subscriber" src='/images/email-subscriber.png' alt="personal shopping blog online"/>
				<div style="margin-left:307px;">
					<div class="text-subscribe">
						<b>Timeless Style</b><br>
						50 image essentials every <br>
						woman should know button: <br>
						GET YOUR FREE COPY NOW!
					</div>
					<div class="arrow">
						<img src='/images/arrow.png'/>
					</div>
					<div class="subscriber-form">
						<?php echo form_open('/thankyou'); ?> 
						<input name="inf_form_xid" type="hidden" value="01ae3785a5fde11d3e8a29fd1f6e9400" />
						<input name="inf_form_name" type="hidden" value="Indicate interest" />
						<input name="test-form" type="hidden" value="01ae3785a5fde11d3e8a29fd1f6e9400">
						<input name="infusionsoft_version" type="hidden" value="1.37.0.46" />
						<div class="input-fields">
							<div style="width:100%">
								<div class="infusion-field" style="float:left; "> 
									<!-- <label for="inf_field_FirstName">First Name: </label> -->
									<input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" placeholder="First Name" style="width:105px;" required/>
								</div>
								
								<div class="infusion-field" style="float:left;margin-left:5px;">
									<!-- <label for="inf_field_LastName">Last Name *</label> -->
									<input class="infusion-field-input-container" id="inf_field_LastName" name="inf_field_LastName" placeholder="Last Name" type="text" style="width:105px;" required/>
								</div>
							</div>
							<div class="infusion-field">
								<!-- <label for="inf_field_Email">Email: </label> -->
								<input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email"  placeholder="Email Address" type="email" required style="width:215px;background: #E5e5e5;"/>
							</div>
						</div>
						<div class="infusion-submit">
							<button style="" onClick="ga('send', 'event', 'Form-bot', 'Click', 'form bottom completed');"><b style="color:white; font-family: 'Open Sans', sans-serif;font-size:16px;">GET YOUR'S</b> <br><span style="color:white;font-size:16px;"> TODAY!</span></button>
						</div> 
					</form>
					<script type="text/javascript" src="https://om185.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=7cdbebcae7b8c4b1866b9ff08971aec0"></script>
				</div>
				<div class="cross-sign">
					<img class="close mousehand" src="/images/cross.png">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal"></div>
<div class="popup_modal"></div>
<?php 
	if( ENVIRONMENT == 'production') {
	?>
	<script type='text/javascript'>
		
		window.__wtw_lucky_site_id = 33872;
		(function() {
			var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
			wa.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://cdn') + '.luckyorange.com/w.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
		})();
	</script>
<?php } ?>
<script>
	$('#similarItems').initSimilarCarousel();
</script>
</body>
</html>
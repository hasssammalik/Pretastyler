<div class="mainContent">
	
	<div class="frontWrap">
		<div class="homepage-header homeBannerHeight">
			<div class="headerBackground">
				
				<div class="headerBackground-content role-element leadstyle-container center" style="padding-top: 6%;">
					<p style="font-size:36px; font-weight: bold;word-spacing:5px;letter-spacing:2px;">SHOPPING ONLINE<br>JUST GOT PERSONAL</p>
					<p> <img width="70" src="/images/play.png" style="cursor:pointer;"> </p>
					<p style="font-size:24px;line-height:2;font-weight:600;">
						Cut Through the Clutter of Fashion<br>
						Find everything that suits you in one perfect place<br>
						'Your Exclusive Fashion Mall'
					</p>
				</div>
				
			</div>
			
		</div>
		
		<section class="role-element container wid60 preta-tooltip" id="the-product">
			
			<div class="wid100">
			
				<script type="text/javascript">
					
					var default_values = [3,5,2,4,1,4,2];
					
					$(function(){
						var height = [ "Short", "Med-short", "Medium", "Med-tall", "Tall" ];
						var size = [ "Allegra", "Natalie", "Halle","Kim", "Queen", "Amber","Rebel"];
						var age = [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "66 - 75","76 >" ];
						var bodyshape = [ "Hour glass", "Inverted Triangle", "Rectangle", "Triangle", "Oval", "Diamond"];
						var bodyratio = [ "Balanced Body","Long Legged Short Torso", "Short Legged Long Torso" ];
						var bust = [ "< A", "B", "C", "D", "DD", "E >" ];
						var build = [ "Small", "Medium", "Large" ];
						
						var heightimage = 
						[ 
						'<div id="talkbubble" class="talkbubbleLowerLabel"><ul><li>CM: 162.4 and under</li><li>IN: 5\'3" 3/4 and under</li></ul></div>' ,
						'<div id="talkbubble" class="talkbubbleLowerLabel"><ul><li>CM: 162.5 - 167 </li><li>IN: 5\'4" - 5\'5" 3/4</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><ul><li>CM: 167.1 - 174.5 </li><li>IN: 5\'5" - 5\'8" 3/4</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><ul><li>CM: 174.6 - 179.95 </li><li>IN: 5\'8" - 5\'10 3/4</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><ul><li>CM: 180 and taller </li><li>IN: 5\'11" and taller</li></ul></div>'
						];
						var sizeimage = 
						[ 
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-38.png" /></div></div>',
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-39.png" /></div></div>',
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-40.png" /></div></div>',
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-41.png" /></div></div>',
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-42.png" /></div></div>', 
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-43.png" /></div></div>',
						'<div id="talkbubble" class="hideTooltip"><div class="slider-image"><img src="/images/profileSetup/size/features_-45.png" /></div></div>'
						];
						var ageimage = 
						[
						'<div class="hideTooltip"></div>',
						'<div class="hideTooltip"></div>',
						'<div class="hideTooltip"></div>',
						'<div class="hideTooltip"></div>',
						'<div class="hideTooltip"></div>'
						];
						var bodyshapeimage = 
						[
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features-33.png" /></div><ul><li>You appear to be the same width across your bustline as you are across the widest part of your hipline</li><li>Your waist is well defined and your narrowest area</li><li>NOTE: You can be any weight and be an hourglass figure.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><div class="slider-image"><img src="/images/profileSetup/body shape/features-34.png" /></div><ul><li>You are larger above the waist than below</li><li>You are widest across your bustline</li><li>Your armpits are wider than the widest part of your hipline (when viewed from the front).</li><li>You are smaller below waist than below</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features-35.png" /></div><ul><li>Your bust, waist and hipline are close to or the same in width.</li><li>Your waist is undefined</li><li>Your have a wide rib cage.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features-36.png" /></div><ul><li> You are larger below the waist than above</li><li>You have a well-defined waist</li><li>You have a narrow lower rib cage</li><li>Your armpits are narrower than the widest part of your hipline (when viewed from the front).</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features-37.png" /></div><ul><li>You consider yourself to be in the substantially overweight range</li><li>Your widest area is between your bust and hipline</li><li>You have a full stomach that sits low around the hips</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features-38.png" /></div><ul><li>You consider yourself to be in the substantially overweight range</li><li>Your widest area is between your bust and hipline</li><li>You have a full, high stomach that starts just under your bustline.</li><li>Sometimes others may mistake you for being pregnant.</li></ul></div>' 
						];
						var bodyratioimage = [ 
            '<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-10.png" /></div><ul><li>Your torso is equal in length to your legs.</li><li>The fullest part of your bottom protrudes at approximately half your height.</li><li>Weight gain is first experienced between your bust and hipline.</li><li>Bend your elbow 90% to the floor: you are a Balanced Body if you bent elbow in at the same position as your waist.</li><li>Use the vertical calculator if you are unsure.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-09.png" /></div><ul><li>Your legs are longer than your body.</li><li>Your torso is short and your waistline feels/is high.</li><li>Weight gain is first experienced at your midriff, stomach and high on the back of your hips.</li><li>Bend your elbow 90% to the floor: you are a Long Legged and Short Bodied if your waist is above your bent elbow.</li><li>Use the vertical calculator if you are unsure.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-11.png" /></div><ul><li>You have a long body and short legs.</li><li>Weight gain is first experienced at your bottom, hips and thighs.</li><li>You have a low waistline.</li><li>Bend your elbow 90% to the floor: you are a Short Legged and Long Bodied if your waist sits below your bent elbow.</li><li>Use the vertical calculator if you are unsure.</li></ul></div>',
												];
						var bustimage = 
						[ 
						'<div id="talkbubble"><ul><li>Select this size if you have had a bilateral mastectomy and do not wear a prosthesis</li></ul></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>', 
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						var buildimage = 
						[ 
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/features-38.png" /></div><ul><li>You have a petite frame.</li><li> You are likely to be short and small boned.</li></ul></div>',
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/features-39.png" /></div><ul><li>Your frame is between small and large</li></ul></div>',
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/features-40.png" /></div><ul><li>Your frame is large.</li><li>You are likely to be tall and large boned. </li></ul></div>' 
						];
						
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
							if( ui.value > 3 ){
								$(".bustCheck").show();
							} else {
								$(".bustCheck").hide();
							}
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

						$(document).on("change", ".minBust-check", function(){
							pull_profile_garment();
						});
						
					});
					
					function pull_profile_garment( ) {
						//console.log(default_values);

						var input_minBust = ($('.minBust-check').attr('checked') == "checked")?1:0;

						if( default_values[5] < 4 ){
							input_minBust = 0;
						}

						var requestvalues = { "height_select_id" : default_values[0],
							"weight_select_id" : default_values[1],
							"age_select_id" : default_values[2],
							"body_shape_select_id" : default_values[3],
							"body_ratio_select_id" : default_values[4],
							"bra_select_id" : default_values[5],
							"build_select_id" : default_values[6],
							"minBust" : input_minBust
						};
						$.post( "/mall/garment-by-profile.html", {offset: 0, limit: 5, uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
							$( ".garments" ).html( data );
						});
					}
					
					

				</script>
				
				<div class="container">
					
					<div class="homeprofile-head" id="profile">
						<img src="/images/newhomedown.png" class="noneArea noneLiner ">
						
						<p class="i profile-big-title" style="font-size:1.8vw;">Let's start by selecting your <strong>body features</strong></p>
						
					</div>
					
				</div>
				
				<div class="profileWrap container">
					
					<div class="home-profile home-profile-height">
						
						<div class="slider-name left">
							<p>HEIGHT</p>
						</div>
						<div class="homepageslider left sliderwrap-height">
							<div class="newprofile-height" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-size">
						<div class="slider-name left">
							<p>WEIGHT</p>
						</div>
						<div class="homepageslider left sliderwrap-size">
							<div class="newprofile-size" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-age">
						<div class="slider-name left">
							<p>AGE</p>
						</div>
						<div class="homepageslider left sliderwrap-age">
							<div class="newprofile-age" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-bodyshape">
						<div class="slider-name left">
							<p>BODY SHAPE</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bodyshape">
							<div class="newprofile-bodyshape" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-bodyratio">
						<div class="slider-name left">
							<p>BODY RATIO</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bodyratio ">
							<div class="newprofile-bodyratio" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-bust">
						<div class="slider-name left">
							<p>BUST</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bust ">
							<div class="newprofile-bust" id="circles-slider"></div>
						</div>
						<div class="bustCheck" style="display:none; float: right; font-size: 12px;">
							<p>
								<input type="checkbox" name="agree" class="minBust-check">
								 Check if you DO NOT want styles selected that will minimise your bust size. (You've got it and you want to flaunt it!)
							</p>
						</div>
						<div class="clear"></div>
					</div>
					<br>
					<div class="home-profile home-profile-build">
						<div class="slider-name left">
							<p>BUILD</p>
						</div>
						
						<div class="homepageslider left sliderwrap-build">
							<div class="newprofile-build" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
				</div>
				
			</div>
			<br>
		</section>
		
		<section class="wid100 bkYellowGrey home-product-list-custom-profile" id="home-product-custom-list">
			
			<div class="homeprofile-head">
				<img src="/images/newhomedown.png" class="noneArea noneLiner">
				<p class="i profile-big-title">Here's just a few <strong>garments we've found for you</strong></p>
			</div>
			<style type="text/css">
				.garments:after { display: none;}
			</style>
			<div id="homepage-slider">
				<div class="garments turnOffPlaceHolderGarment"></div>
				<div class="clear"></div>
			</div>


			<!-- <div class="homepage-slider" id="similarItems" style="width:1024px;margin:0px auto;">
					<div class="sliderWrap">
						<div class="garments turnOffPlaceHolderGarment"></div>
							<a href="#" class="prevNew"><img src="/images/next.png"></a>
							<a href="#" class="nextNew"><img src="/images/next.png"></a>
						</div>
				</div> -->


			<div class="clear"></div>
			<div class="homeprofile-head">
				
				<p class="homeprofile-bodytext" style=" font-style: italic; font-size: 22px;"><br/>What's<strong > Next?</strong></p>
				<div class="mall-links">	
					<div class="mall-link1">
						<p class="homeprofile-bodytext" style="font-style: italic;font-weight:bold;  font-size: 16px;">I'm on a roll show me </p>
						<a class="bkpinkycolor home-vistmallbtn container noneLiner" href="/your-mall.html">
							MORE QUESTIONS <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
						</a>
					</div>
					<div class="mall-link2">
						<p class="homeprofile-bodytext" style="font-style: italic;font-weight:bold;  font-size: 16px;">I'm too excited to wait </p>
						<button class="bkpinkycolor home-vistmallbtn container noneLiner"  id="signup-popup">
							LET ME IN <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
						</button>
						
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
		</section>
		
		
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


<div class="modal"></div>
<div class="popup_modal"></div>
<div class="popup-box">
    <div class="cross"><div class="cross-image-homepage"><img src="/images/pink_button-05.png" alt=""></div></div>
    <h1 style="padding: 5px;text-transform:uppercase;text-align:center;">One Last Thing</h1>
	<hr width="95%" size="2" />
    
	<div id="error-register">
		
	</div>
	
	<form action="/mall-by-profile.html" method="post">
      <div>
			<input type="text" placeholder="First Name*" name="fname" id="menu_mall_register_fname" required/>
			<input type="text" placeholder="Last Name*" name="lname" id="menu_mall_register_lname" required/>
	  </div>
      <div>
			<input type="email" placeholder="Email*" name="email" id="menu_mall_register_email" required/>
	  </div>
      <div>
			<input type="password" placeholder="Password*" name="password" id="menu_mall_register_password" required />
			<input type="password" placeholder="Confirm Password*" name="cpass" id="menu_mall_register_rpassword" oninput="check(this)" required />
	  </div>
      <script language='javascript' type='text/javascript'>
        function check(input) {
          if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('The two passwords must match.');
            } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
          }
        }
      </script>
      <div style="text-align:center"><input type="submit" name="starttrial" value="Start my Trial" id="menu_mall_login"></div>
      
    </form>
    <div style="text-align:center">Trial Expires in 30 days.</div>
  </div>

<?php 
	if( ENVIRONMENT == 'production') {
	?>
	
	<script type="text/javascript">
		setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
		a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
	</script>
	
	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
			d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
			_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
			$.src='//v2.zopim.com/?2DZTXFz3pU0P9dFbK9NzPb2IBE2aAE8b';z.t=+new Date;$.
		type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	<!--End of Zopim Live Chat Script-->
	
	<script type='text/javascript'>
		
		window.__wtw_lucky_site_id = 33872;
		(function() {
			var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
			wa.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://cdn') + '.luckyorange.com/w.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
		})();
	</script>
	
<?php } ?>

</body>
</html>
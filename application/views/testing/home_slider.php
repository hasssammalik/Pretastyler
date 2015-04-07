<div class="mainContent">
	
	<div class="frontWrap">
		
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
				height: 25px;
				width: 25px;
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
			
			.profileWrap {
				width: 80%;
				margin: 0 auto;
				margin-top: 160px;
			}
			.home-profile {
				height: 90px;
				width: 100%;
				position: relative;
			}
			.ui-slider-pip .ui-slider-label {
				font-size: 0.8em;
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
			.slider-name {
				width: 10%;
			}
			.homepageslider {
				width: 90%;
			}
			.slider-name {
				text-align: right;
				font-weight: bold;
			}
			.ui-slider.ui-slider-horizontal {
				margin-left: 50px;
				margin-top: 21px;
			}
		</style>
		<script type="text/javascript">
			
			$(function(){
				
				var default_values = [2,5,1,1,0,0,1];
				console.log( default_values[1] );

				var bodyShape = [ "HOUR GLASS", "INVERTED TRIANGLE", "TRIANGLE", "RECTANGLE", "OVAL", "DIAMOND"];
				var faceShape = [ "OBLONG", "RECTANGLE", "ROUND", "SQUARE", "INVERTED TRIANGLE", "HEART", 'DIAMOND', 'PEAR', 'TRIANGLE', 'OVAL' ];
				var neckLength = [ "SHORT", "MED SHORT", "MEDIUM", 'MED LONG', 'LONG' ];
				var neckThinkness = [ "VERY THIN", "AVERAGE", 'THINK CHIN' ];
				var boneStructure = [ "SMALL", "MEDIUM", 'LARGE' ];
				var shoulders = [ "TAPERED", "SQUARE" ];
				var bodyRatio = [ "BALANCED", "LONG LEGGED SHORT TORSO", 'SHORT LEGGED LONG TORSO' ];
				
				var bodyShapeImage = [ '<img src="/images/profileSetup/horizontalBodyShape/hourGlass.jpg">','<img src="/images/profileSetup/horizontalBodyShape/invertedTriangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/triangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/rectangle.jpg">','<img src="/images/profileSetup/horizontalBodyShape/oval.jpg">','<img src="/images/profileSetup/horizontalBodyShape/diamond.jpg">' ];
				
				var faceShapeImage = [ '<img src="/images/profileSetup/faceShape/oblong.jpg">','<img src="/images/profileSetup/faceShape/rectangle.jpg">','<img src="/images/profileSetup/faceShape/round.jpg">','<img src="/images/profileSetup/faceShape/round.jpg">','<img src="/images/profileSetup/faceShape/invertedTriangle.jpg">','<img src="/images/profileSetup/faceShape/heart.jpg">','<img src="/images/profileSetup/faceShape/diamond.jpg">','<img src="/images/profileSetup/faceShape/pear.jpg">','<img src="/images/profileSetup/faceShape/triangle.jpg">','<img src="/images/profileSetup/faceShape/oval.jpg">' ];
				
				var neckLengthImage = [ '<img src="/images/profileSetup/neckLength/short.jpg">','<img src="/images/profileSetup/neckLength/med-short.jpg">','<img src="/images/profileSetup/neckLength/medium.jpg">','<img src="/images/profileSetup/neckLength/med-long.jpg">','<img src="/images/profileSetup/neckLength/long.jpg">' ];
				
				var neckThinknessImage = [ '<img src="/images/profileSetup/neckThickness/very-thin.jpg">','<img src="/images/profileSetup/neckThickness/average.jpg">','<img src="/images/profileSetup/neckThickness/think-chin.jpg">' ];
				
				var boneStructureImage = [ '<img src="/images/profileSetup/boneStructure/small.jpg">','<img src="/images/profileSetup/boneStructure/medium.jpg">','<img src="/images/profileSetup/boneStructure/large.jpg">' ];
				
				var shouldersImage = [ '<img src="/images/profileSetup/shoulders/tapered.jpg">','<img src="/images/profileSetup/shoulders/square.jpg">' ];
				
				var bodyRatioImage = [ '<img src="/images/profileSetup/verticalBodyShape/balancedBody.jpg">','<img src="/images/profileSetup/verticalBodyShape/longLeggedShortTorso.jpg">','<img src="/images/profileSetup/verticalBodyShape/shortLeggedLongTorso.jpg">' ];
				
				
				
				$(".sliderbodyshape")
							.slider({
								min: 0, 
								max: bodyShape.length-1, 
								value: default_values[0]
							})
							.slider("pips", {
								labels: bodyShape
							})
							.slider("float", {
								rest: "label",
								labels: bodyShapeImage
							})
							.on("slidechange", function(e,ui) {
								alert(ui.value);
								$(".val1").text( "You selected " + bodyShape[ui.value] + " (" + ui.value + ")");
							});
				
				$(".sliderfaceshape")
							.slider({
								min: 0, 
								max: faceShape.length-1, 
								value: default_values[1]
							})
							.slider("pips", {
								labels: faceShape
							})
							.slider("float", {
								rest: "label",
								labels: faceShapeImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + faceShape[ui.value] + " (" + ui.value + ")");
							});
				
				
				$(".slidernecklength")
							.slider({
								min: 0, 
								max: neckLength.length-1, 
								value: default_values[2]
							})
							.slider("pips", {
								labels: neckLength
							})
							.slider("float", {
								rest: "label",
								labels: neckLengthImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + neckLength[ui.value] + " (" + ui.value + ")");
							});
				
				
				$(".sliderneckthickness")
							.slider({
								min: 0, 
								max: neckThinkness.length-1, 
								value: default_values[3]
							})
							.slider("pips", {
								labels: neckThinkness
							})
							.slider("float", {
								rest: "label",
								labels: neckThinknessImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + neckThinkness[ui.value] + " (" + ui.value + ")");
							});
				
				
				$(".sliderbonestructure")
							.slider({
								min: 0, 
								max: boneStructure.length-1, 
								value: default_values[4]
							})
							.slider("pips", {
								labels: boneStructure
							})
							.slider("float", {
								rest: "label",
								labels: boneStructureImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + boneStructure[ui.value] + " (" + ui.value + ")");
							});
				
				
				$(".slidershoulders")
							.slider({
								min: 0, 
								max: shoulders.length-1, 
								value: default_values[5]
							})
							.slider("pips", {
								labels: shoulders
							})
							.slider("float", {
								rest: "label",
								labels: shouldersImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + shoulders[ui.value] + " (" + ui.value + ")");
							});
				
				
				$(".sliderbodyratio")
							.slider({
								min: 0, 
								max: bodyRatio.length-1, 
								value: default_values[6]
							})
							.slider("pips", {
								labels: bodyRatio
							})
							.slider("float", {
								rest: "label",
								labels: bodyRatioImage
							})
							.on("slidechange", function(e,ui) {
								//$(".val1").text( "You selected " + bodyRatio[ui.value] + " (" + ui.value + ")");
							});
				
				
			});
			
		</script>
		<div class="profileWrap">
			
			<div class="home-profile home-profile-body-shape">
				
				<div class="slider-name left">
					<p>BODY SHAPE</p>
				</div>
				<div class="homepageslider left sliderwrap-body-shape ">
					<div class="sliderbodyshape"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-face-shape">
				<div class="slider-name left">
					<p>FACE SHAPE</p>
				</div>
				<div class="homepageslider left sliderwrap-face-shape ">
					<div class="sliderfaceshape"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-neck-length">
				<div class="slider-name left">
					<p>NECK LENGTH</p>
				</div>
				<div class="homepageslider left sliderwrap-neck-length ">
					<div class="slidernecklength"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-neck-thickness">
				<div class="slider-name left">
					<p>NECK THICKNESS</p>
				</div>
				
				<div class="homepageslider left sliderwrap-neck-thickness ">
					<div class="sliderneckthickness"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-bone-structure">
				<div class="slider-name left">
					<p>BONE STRUCTURE</p>
				</div>
				
				<div class="homepageslider left sliderwrap-bone-structure ">
					<div class="sliderbonestructure"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-shoulders">
				<div class="slider-name left">
					<p>SHOULDERS</p>
				</div>
				
				<div class="homepageslider left sliderwrap-shoulders ">
					<div class="slidershoulders"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="home-profile home-profile-body-ratio">
				<div class="slider-name left">
					<p>BODY RATIO</p>
				</div>
				
				<div class="homepageslider left sliderwrap-body-ratio ">
					<div class="sliderbodyratio"></div>
				</div>
				<div class="clear"></div>
			</div>
			
			
			
		</div>
			
	</div>
			
</div>
		
</div>
	
</div>
</div>

</div>


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
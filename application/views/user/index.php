<input type="hidden" value="<?php print $user_selection?>" id="answers"> <!--Here are the answers so far-->
<?php echo form_open(); echo form_close();?>
<form class="userProfile">
	<fieldset id="fieldset1">
		<div class="sectionHeader">
			<div><h2>Account <strong>Details </strong></h2><div class="accountDetails editSection right i u b mousehand" data-action="edit">EDIT</div></div>
		</div>
		<div class="llist">
			<div class="row">
				<div class="col span_11">
					<label>First name:</label>
					<input type="text" name="fname" value="<?php print $user_info['first_name']?>" class="first-name accountDetailsDisabled" disabled="disabled">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Last name:</label>
					<input type="text" name="lname" value="<?php print $user_info['last_name']?>" class="last-name accountDetailsDisabled" disabled="disabled">
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Email:</label>
					<input type="email" name="email" value="<?php print $user_email?>" class="" disabled="disabled">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11 group">
					<div class="col span_12">
						<label>Country:</label>
						<select name="country" class="country-select accountDetailsDisabled" disabled="disabled">
							<option value="0">Please Select</option>
							<?php foreach ($countries as $country) {?>
							<option value="<?php print $country['country_id']?>" <?php print ($country['default'] == 1)?'selected="selected"':'' ?>><?php print $country['country']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col span_6 leftMargin4">
						<label>ZipCode:</label>
						<input type="text" name="zip" value="<?php print $user_info['zipcode']?>" class="zipcode accountDetailsDisabled" disabled="disabled">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11 hidden  accountDetailsDisabledagree">
					<label class=""><input type="checkbox" name="agree" required="required" class="iagreecheckbox" id="iagreecheckbox" checked="checked"><span> &nbsp; I agree to the <a href="/terms.html">Terms of Use</a>. </span></label>
				</div>
			</div>
		</div>
	</fieldset>
	
	<fieldset id="fieldset2">
		<div class="sectionHeader">
			<div><h2>General <strong>features</strong></h2><div class="generalFeatures editSection right i u b mousehand" data-action="edit">EDIT</div></div>
		</div>
		<div class="llist">
			
			<h3>Select your <strong>'standard'/'usual'/'normal'</strong> size for:</h3>
			<div class="row">
				<div class="col span_11">
					<label>Dresses/Swimwear:</label>
					<div class="group">
						<div class="col span_6">
							<select class="ovr-select generalFeaturesDisabled" size_type="OVR" disabled="disabled">
								<?php foreach($size_info['OVR']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="ovr-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['OVR']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Shorts/Jeans/Skirts:</label>
					<div class="group">
						<div class="col span_6">
							<select class="bot-select generalFeaturesDisabled" size_type="BOT" disabled="disabled">
								<?php foreach($size_info['BOT']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="bot-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['BOT']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Tops/Jackets:</label>
					<div class="group">
						<div class="col span_6">
							<select class="top-select generalFeaturesDisabled" size_type="TOP" disabled="disabled">
								<?php foreach($size_info['TOP']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="top-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['TOP']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Shoes/Footwear:</label>
					<div class="group">
						<div class="col span_6">
							<select class="sho-select generalFeaturesDisabled" size_type="SHO" disabled="disabled">
								<?php foreach($size_info['SHO']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="sho-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['SHO']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Hats:</label>
					<!-- <div class="group"> 
						<div class="col span_11"> -->
							<select class="hat-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['HAT']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						<!-- </div>
					</div> -->
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Bangles/Bracelets:</label>
					<!-- <div class="group"> 
						<div class="col span_11"> -->
							<select  class="wri-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['WRI']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						<!-- </div>
					 </div> -->
				</div>
			</div>
		</div> 
	</fieldset>
	<br>
	<fieldset id="profilePanel" class="fixedOptions" style="z-index:4;background:white;padding-top:45px">
		<div class="sectionHeader">
			<div><h2>My Body <strong>Features</strong></h2><div class="body editSection right i u b mousehand" id="bodyFeatures" data-action="edit">EDIT</div></div>
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
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-07.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-08.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-10.png" /></div></div>' 
						];
						var sizeimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-38.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-39.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-40.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-41.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-42.png" /></div></div>', 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-43.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/size/features_-45.png" /></div></div>'
						];
						var ageimage = 
						[
						/*'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-07.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-08.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-10.png" /></div></div>' */
						];
						var bodyshapeimage = 
						[
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-10.png" /></div><span>You appear to be the same width across your bustline as you are across the widest part of your hipline<br>Your waist is well defined and your narrowest area<br>NOTE: You can be any weight and be an hourglass figure.</span></div>',
						'<div id="talkbubble" class="doubleline"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-11.png" /></div><spanYou are larger above the waist than below<br>You are widest across your bustline<br>Your armpits are wider than the widest part of your hipline (when viewed from the front).<br>You are smaller below waist than below</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-12.png" /></div><span>You are larger below the waist than above<br>You have a well-defined waist<br>You have a narrow lower rib cage<br>Your armpits are narrower than the widest part of your hipline (when viewed from the front).</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-13.png" /></div><span>Your bust, waist and hipline are close to or the same in width<br>Your waist is undefined<br>Your have a wide rib cage</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-14.png" /></div><span>You consider yourself to be in the substantially overweight range<br>Your widest area is between your bust and hipline<br>You have a full stomach that sits low around the hips</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body shape/features_-15.png" /></div><span>You consider yourself to be in the substantially overweight range<br>Your widest area is between your bust and hipline<br>You have a full, high stomach that starts just under your bustline.<br>Sometimes others may mistake you for being pregnant.</span></div>' 
						];
						var bodyratioimage = [ 
            '<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/features_-09.png" /></div><span>You have a long body and short legs.<br>Weight gain is first experienced at your bottom, hips and thighs.<br>You have a low waistline.<br>Bend your elbow 90% to the floor: you are a Short Legged and Long Bodied if your waist sits below your bent elbow.<br>Use the vertical calculator if you are unsure.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/features_-07.png" /></div><span>Your torso is equal in length to your legs.<br>The fullest part of your bottom protrudes at approximately half your height.<br>Weight gain is first experienced between your bust and hipline.<br>Bend your elbow 90% to the floor: you are a Balanced Body if you bent elbow in at the same position as your waist.<br>Use the vertical calculator if you are unsure.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/features_-08.png" /></div><span>Your legs are longer than your body.<br>Your torso is short and your waistline feels/is high.<br>Weight gain is first experienced at your midriff, stomach and high on the back of your hips.<br>Bend your elbow 90% to the floor: you are a Long Legged and Short Bodied if your waist is above your bent elbow.<br>Use the vertical calculator if you are unsure.</span></div>',
												];
						var bustimage = 
						[ 
						'<div id="talkbubble"><span>Select this size if you have had a bilateral mastectomy and do not wear a prosthesis</span></div>',
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
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/build/features_-16.png" /></div><span>Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite hand as if they were a bracelet.<br/>Select large if there is a gap between your thumb and middle finger (they don\'t touch).</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/build/features_-17.png" /></div><span>Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite hand as if they were a bracelet.<br>;Select medium if you thumb and middle finger just touch each other.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/build/features_-18.png" /></div><span>Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite hand as if they were a bracelet.<br>;Select large if there is a gap between your thumb and middle finger (they don\'t touch).</span></div>' 
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

						var requestvalues = { "height_select_id" : default_values[0],
							"weight_select_id" : default_values[1],
							"age_select_id" : default_values[2],
							"horizontal_select_id" : default_values[3],
							"vertical_select_id" : default_values[4],
							"bra_select_id" : default_values[5],
							"wrist_size" : default_values[6],
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
						
						<p class="i profile-big-title">Let's start by selecting your <strong>body features</strong></p>
						<!-- <p style="padding-left: 100px;font-size: 0.9em;">Pop your details below and your personal fashion mall will automatically 
						overflow with clothing and accessories tailor made for your style, shape and age.</p> -->
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













	</fieldset>
	
	
	<br>
	
</form>


<?php 
if( ENVIRONMENT == 'production') {
?>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

<?php } ?>


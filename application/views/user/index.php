<input type="hidden" value="<?php print $user_selection?>" id="answers"> <!--Here are the answers so far-->
<?php echo form_open(); echo form_close();?>
<form class="userProfile">
	<fieldset id="fieldset1">
		<div class="sectionHeader">
			<div><h2>Account <strong>Details </strong></h2><div class="accountDetails editSection right i u b mousehand" data-action="save"><span class="bkpinkycolor">SAVE</span></div></div>
		</div>
		<div class="llist">
			<div class="row">
				<div class="col span_11">
					<label>First name:</label>
					<input type="text" name="fname" value="<?php print $user_info['first_name']?>" class="first-name accountDetailsDisabled">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Last name:</label>
					<input type="text" name="lname" value="<?php print $user_info['last_name']?>" class="last-name accountDetailsDisabled">
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Email:</label>
					<input type="email" name="email" value="<?php print $user_email?>" class="">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11 group">
					<div class="col span_12">
						<label>Country:</label>
						<select name="country" class="country-select accountDetailsDisabled">
							<option value="0">Please Select</option>
							<?php foreach ($countries as $country) {?>
							<option value="<?php print $country['country_id']?>" <?php print ($country['default'] == 1)?'selected="selected"':'' ?>><?php print $country['country']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col span_6 leftMargin4">
						<label>ZipCode:</label>
						<input type="text" name="zip" value="<?php print $user_info['zipcode']?>" class="zipcode accountDetailsDisabled">
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
			<div><h2>Your <strong>Sizes</strong></h2><div class="generalFeatures editSection right i u b mousehand" data-action="save"><span class="bkpinkycolor">SAVE</span></div></div>
		</div>
		<div class="llist">
			
			<h3>Select your <strong>'standard'/'usual'/'normal'</strong> size for:</h3>
			<div class="row">
				<div class="col span_11">
					<label>Dresses/Swimwear:</label>
					<div class="group">
						<div class="col span_6">
							<select class="ovr-select generalFeaturesDisabled" size_type="OVR">
								<?php foreach($size_info['OVR']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="ovr-size-select generalFeaturesDisabled">
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
							<select class="bot-select generalFeaturesDisabled" size_type="BOT">
								<?php foreach($size_info['BOT']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="bot-size-select generalFeaturesDisabled">
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
							<select class="top-select generalFeaturesDisabled" size_type="TOP">
								<?php foreach($size_info['TOP']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="top-size-select generalFeaturesDisabled">
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
							<select class="sho-select generalFeaturesDisabled" size_type="SHO">
								<?php foreach($size_info['SHO']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="sho-size-select generalFeaturesDisabled">
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
							<select class="hat-size-select generalFeaturesDisabled">
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
							<select  class="wri-size-select generalFeaturesDisabled">
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
			<div><h2>My Body <strong>Features</strong></h2><div class="bodyEditSection editSection right i u b mousehand" data-action="save"><span class="bkpinkycolor">SAVE</span></div></div>
		</div>
		

		<style type="text/css">
		 .profileWrap p {
	    		font-size: 14px;
	    		font-size: 0.875rem;
	    	}
		</style>



		<section class="role-element container wid60 preta-tooltip" id="the-product">
			
			<div class="wid100">
			
				<script type="text/javascript">
					
					//var default_values = [3,5,2,4,1,4,2  , 4,2,2,8,3,2,2,2,2,2,2,2,2 ];
					
					var default_values = [<?php echo $user_selection; ?>];
					

					$(function(){
						
						var height 			= [ "Short", "Med-short", "Medium", "Med-tall", "Tall" ];
						var size 			= [ "Allegra", "Natalie", "Halle","Kim", "Queen", "Amber","Rebel"];
						var age 			= [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "66 - 75","76 >" ];
						var bodyshape 		= [ "Hour glass", "Inverted Triangle", "Rectangle", "Triangle", "Oval", "Diamond"];
						var bodyratio 		= [ "Balanced Body","Long Legged Short Torso", "Short Legged Long Torso" ];
						var bust 			= [ "< A", "B", "C", "D", "DD", "E >" ];
						var build 			= [ "Small", "Medium", "Large" ];
						

						var necklength 		= [ "Short", "Med-short", "Medium", "Med-long", "Long" ];
						var shoulders 		= [ "Sloping", "Tapered", "Square" ];
						var faceshape 		= [ "Oval", "Heart", "Inverted triangle", "Diamond", "Triangle", "Pear", "Rectangle", "Oblong", "Round", "Square" ];
						
						var neck 			= [ "Thin", "Average", "Wide", "Double Chin", "No Definition" ];
						var back 			= [ "Dowagers Hump","Sway Back"];
						var upperarms 		= [ "Too thin", "Too heavy", "Aged/Untoned" ];
						
						var midriff 		= [ "Moderate Roll", "Large roll" ];
						
						var stomach 		= [ "Post Baby", "Moderate Tummy", "Too Soft", "Large Tummy" ];
						var bottom 			= [ "Too Large", "Too Flat" ];
						var innerthighs 	= [ "Rub Together", "Bowed Legs" ];
						var outerthighs 	= [ "Too  Protruding", "Saddlebags" ]
						var lowerlegs 		= [ "Shapeless Calves","Shapeless Ankles", "Muscular/Heavy calves", "Thin Ankles" ];
						


						var heightimage = 
						[ 
						'<div id="talkbubble" class="talkbubbleLowerLabel"><span>CM: 180 and taller <br>IN: 5\'11" and taller</span></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><span>CM: 174.6 - 179.95 <br>IN: 5\'8" - 5\'10 3/4</span></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><span>CM: 167.1 - 174.5 <br>IN: 5\'5" - 5\'8" 3/4</span></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><span>CM: 162.5 - 167 <br>IN: 5\'4" - 5\'5" 3/4</span></div>',
						'<div id="talkbubble" class="talkbubbleLowerLabel"><span>CM: 162.4 and under <br>IN: 5\'3" 3/4 and under</span></div>' 
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
						





						var necklengthimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-19.png" /></div><span>Your neck is short.<br>When carrying extra weight you may have double chins.<br>You look best with hair that is at or above your jawline.<br>Necklines with some length such as V and scoop look best on you.<br>High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-20.png" /></div><span>Your neck is on the short side of average.<br>High necklines such as turtlenecks and long drop earrings can be difficult to wear.<br>Necklines with some length such as V\'s and scoop look best on you.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-21.png" /></div><span>Your neck is just like that of most people you meet.<br>You have had no reason to question if it is shorter or longer than average.</span></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-22.png" /></div><span>Your neck is on the long side of average.<br>Wearing long drop earrings and high neck shirts and sweaters is no problem for you.<br>Plunging and very deep necklines do not look as good on you as those which are medium depth.</div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-23.png" /></div><span>You are aware that you have a long neck.<br>If you are underweight your neck may appear very thin.<br>You look best with long hair i.e. shoulder length or longer.<br>Your neck length allows you to wear extra-long earrings without them dangling on your shoulders.<br>Plunging necklines look good only when your hair is worn down (shoulder length and longer).<br>Necklines that sit at the base of your neck can also be unflattering.</span></div>' 
						];
						
						var shouldersimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-24.png" /></div><span style="padding:5px;">Your shoulders have a definite slope from the base of your neck to<br> the tip of your shoulder. Shoulder straps will tend to slip off your shoulders..</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-25.png" /></div><span>Your shoulders have a slight slope.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-26.png" /></div>Your shoulders are broad and square with almost no slope<span></span></div>' 
						];
						
						var faceshapeimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-28.png" /></div><span>Your face is definitely longer than it is wide.<br>Your cheekbones and jaw line are as wide as each other<br>Your jawline and chin is slightly rounded</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-29.png" /></div><span>Your face is definitely longer than it is wide<br>Your cheekbones and jaw line are as wide as each other<br>The sides of your face from eyeline to jaw bone are straight<br>Your jawline is square<br>Your chin is shallow and flat</div>',
						'<div id="talkbubble" class="doubleline"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-30.png"/></div><span></span>Your face is almost as wide as it is long<br>Your chin and cheeks are round and full<br>Your cheekbones are widest part of your face<br>Your forehead is close to, or as wide as your jawline<br>If you lose weight your face shape may look more Square than Round</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-31.png" /></div><span>Your face is almost as wide as it is long<br>The sides of your face from eyeline to jawline are straight<br>Your forehead is close to, or as wide as your jawline<br>If you gain weight your face shape may become Round</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-32.png" /></div><span>Above your cheekbones is the widest part of your face<br>Your have jawline is narrower than your forehead<br>You have a pointed to gently rounded chin</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-33.png" /></div><span>Your forehead is the widest part of your face<br>Your have jawline is narrower than your forehead<br>You have a pointed to gently rounded chin<br>You have a widow\'s peak (pointed hairline at centre of forehead).</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-34.png" /></div><span>Your chin is narrow and pointed.<br>Your cheekbones are high and prominent.<br>Your face is widest at the cheekbones.<br>Your hairline and/or forehead angles inward.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-35.png" /></div><span>Your jawline is the widest part of your face<br>You have full, round cheeks<br>Your forehead is the narrowest part of your face</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-36.png" /></div><span>Your face is a little longer than it is wide<br>Your forehead is the narrowest part of your face<br>Your have jawline is the widest region of your face<br>You have a broad square jawline<br>Your chin is shallow and flat</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-37.png" /></div><span>Your face is an inverted egg or oval shape<br>You have a gently rounded chin.<br>Your face is slightly longer than it is wide<br>Your face is equal in length from hairline to browline, browline to nose tip, nose tip to chin tip<br>Your eye, nose and mouth are all well scaled to the size of your face i.e. no feature is extra large or small<br>Your eye, nose and mouth are all well-spaced within your face i.e. your eyes are not close or wide set</span></div>' 
						];
						
						var neckimage = [
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>' 
						];
						
						var backimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>' 
						];
						
						var upperarmsimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						
						
						var midriffimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						
						var stomachimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						
						var bottomimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						
						var innerthighsimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];

						var outerthighsimage=[
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						
						var lowerlegsimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>'
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




						
						
						$(".newprofile-necklength")
							.slider({
								min: 0, 
								max: necklength.length-1, 
								value: default_values[0]-1
							})
							.slider("pips", {
								labels: necklength
							})
							.slider("float", {
								rest: "label",
								labels: necklengthimage
							})
							.on("slidechange", function(e,ui) {
								default_values[0] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-shoulders")
							.slider({
								min: 0, 
								max: shoulders.length-1, 
								value: default_values[2]-1
							})
							.slider("pips", {
								labels: shoulders
							})
							.slider("float", {
								rest: "label",
								labels: shouldersimage
							})
							.on("slidechange", function(e,ui) {
								default_values[2] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-faceshape")
							.slider({
								min: 0, 
								max: faceshape.length-1, 
								value: default_values[3]-1
							})
							.slider("pips", {
								labels: faceshape
							})
							.slider("float", {
								rest: "label",
								labels: faceshapeimage
							})
							.on("slidechange", function(e,ui) {
								default_values[3] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-neck")
							.slider({
								min: 0, 
								max: neck.length-1, 
								value: default_values[4]-1
							})
							.slider("pips", {
								labels: neck
							})
							.slider("float", {
								rest: "label",
								labels: neckimage
							})
							.on("slidechange", function(e,ui) {
								default_values[4] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-back")
							.slider({
								min: 0, 
								max: back.length-1, 
								value: default_values[5]-1
							})
							.slider("pips", {
								labels: back
							})
							.slider("float", {
								rest: "label",
								labels: backimage
							})
							.on("slidechange", function(e,ui) {
								default_values[5] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-upperarms")
							.slider({
								min: 0, 
								max: upperarms.length-1, 
								value: default_values[6]-1
							})
							.slider("pips", {
								labels: upperarms
							})
							.slider("float", {
								rest: "label",
								labels: upperarmsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[6] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-midriff")
							.slider({
								min: 0, 
								max: midriff.length-1, 
								value: default_values[8]-1
							})
							.slider("pips", {
								labels: midriff
							})
							.slider("float", {
								rest: "label",
								labels: midriffimage
							})
							.on("slidechange", function(e,ui) {
								default_values[8] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-stomach")
							.slider({
								min: 0, 
								max: stomach.length-1, 
								value: default_values[9]-1
							})
							.slider("pips", {
								labels: stomach
							})
							.slider("float", {
								rest: "label",
								labels: stomachimage
							})
							.on("slidechange", function(e,ui) {
								default_values[9] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-bottom")
							.slider({
								min: 0, 
								max: bottom.length-1, 
								value: default_values[10]-1
							})
							.slider("pips", {
								labels: bottom
							})
							.slider("float", {
								rest: "label",
								labels: bottomimage
							})
							.on("slidechange", function(e,ui) {
								default_values[10] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-innerthighs")
							.slider({
								min: 0, 
								max: innerthighs.length-1, 
								value: default_values[11]-1
							})
							.slider("pips", {
								labels: innerthighs
							})
							.slider("float", {
								rest: "label",
								labels: innerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[11] = (+ui.value+1);
								pull_profile_garment();
							});
						
						$(".newprofile-outerthighs")
							.slider({
								min: 0, 
								max: outerthighs.length-1, 
								value: default_values[13]-1
							})
							.slider("pips", {
								labels: outerthighs
							})
							.slider("float", {
								rest: "label",
								labels: outerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[13] = (+ui.value+1);
								pull_profile_garment();
							});
						
						$(".newprofile-lowerlegs")
							.slider({
								min: 0, 
								max: lowerlegs.length-1, 
								value: default_values[13]-1
							})
							.slider("pips", {
								labels: lowerlegs
							})
							.slider("float", {
								rest: "label",
								labels: lowerlegsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[13] = (+ui.value+1);
								pull_profile_garment();
							});
						

						for (var i = 11; i < 19; i++) {
							if( default_values[i] > 0 ){
								$('.your-mall-checkbox > label').eq(i-11).find('input').prop('checked', true);
								toggle_div_class(i-11);
							}
						};
						

						$(document).on("change", ".minBust-check", function(){
							pull_profile_garment();
						});
						
						$(document).on("click", '.bodyEditSection', function(){
							$('.bodyEditSection').removeClass("u").html('<span style="color: #e72775; font-size: 14px;">saving...</span>');
							pull_profile_garment_update_button();
						});
						
						
					});
					
					function pull_profile_garment() {
						console.log(default_values);
					}
					function pull_profile_garment_update_button() {
					
						var input_minBust = ($('.minBust-check').attr('checked') == "checked")?1:0;

						if( default_values[5] < 4 ){
							input_minBust = 0;
						}
						
						var requestvalues = { 

							"height_select_id" : default_values[0],
							"weight_select_id" : default_values[1],
							"age_select_id" : default_values[2],
							"body_shape_select_id" : default_values[3],
							"body_ratio_select_id" : default_values[4],
							"bra_select_id" : default_values[5],
							"build_select_id" : default_values[6],
							"minBust" : input_minBust,

							"neck_length_select_id" : default_values[7],
							"shoulders_select_id" : default_values[8],
							"face_shape_select_id" : default_values[9],
							
							"neck_select_id" : default_values[10],
							"back_select_id" : default_values[11],
							"upper_arms_select_id" : default_values[12],
							"midriff_select_id" : default_values[13],
							
							"stomach_select_id" : default_values[14],
							"bottom_select_id" : default_values[15],
							"inner_thighs_select_id" : default_values[16],
							"outer_thighs_select_id" : default_values[17],
							"lower_legs_select_id" : default_values[18]
							
						};

						
						$.post( "/user/update-user-info.html", { 
								user_data: requestvalues, 
								pref_type : 'feature', 
								pas_secret_name:$("input[name=pas_secret_name]").val()
								}, 
						function( data ) {
							$( ".bodyEditSection" ).text( "Profile saved." );
						});
					}
					
					function toggle_div_class(class_num){
						if (false == $(".profile-your-mall-hidden-"+class_num).is(':visible')) {
							$(".profile-your-mall-hidden-"+class_num).show();
						}
						else {
							$(".profile-your-mall-hidden-"+class_num).hide();
						}
					}

				</script>
				
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
					
					
					


					<div class="clear"></div>
					<br>






					<div class="home-profile home-profile-necklength">
						
						<div class="slider-name left">
							<p>NECK LENGTH</p>
						</div>
						<div class="homepageslider left sliderwrap-necklength">
							<div class="newprofile-necklength"  id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="clear"></div>
					<br>


					<div class="clear"></div>


					<div class="home-profile home-profile-shoulders">
						<div class="slider-name left">
							<p>SHOULDERS</p>
						</div>
						<div class="homepageslider left sliderwrap-shoulders">
							<div class="newprofile-shoulders"  id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-faceshape">
						<div class="slider-name left">
							<p>FACE SHAPE</p>
						</div>
						
						<div class="homepageslider left sliderwrap-faceshape">
							<div class="newprofile-faceshape"  id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
					<div class="your-mall-profile home-profile-area-of-concern">
						<div class="slider-name left">
							<p>Areas of Concern</p>
						</div>
						
						<div class="homepageslider left area-of-concern">
							<div class="your-mall-checkbox big-checkbox">
								
								<label><input type="checkbox" class="additional-profile" id="mall-neck" onclick='toggle_div_class("0")'> Neck</label>
								<label><input type="checkbox" class="additional-profile" id="mall-back" onclick='toggle_div_class("1")'> Back</label>
								<label><input type="checkbox" class="additional-profile" id="mall-upperarms" onclick='toggle_div_class("2")'> Upper Arms</label>
								<label><input type="checkbox" class="additional-profile" id="mall-midriff" onclick='toggle_div_class("3")'> Midriff</label>
								<label><input type="checkbox" class="additional-profile" id="mall-stomach" onclick='toggle_div_class("4")'> Stomach</label>
								<label><input type="checkbox" class="additional-profile" id="mall-bottom" onclick='toggle_div_class("5")'> Bottom</label>
								<label><input type="checkbox" class="additional-profile" id="mall-innerthighs" onclick='toggle_div_class("6")'> Inner Thighs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-outerthighs" onclick='toggle_div_class("7")'> Outer Thighs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-lowerlegs" onclick='toggle_div_class("8")'> Lower Legs</label>
								

							</div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					<div class="home-profile profile-your-mall-hidden-0 home-profile-neck" id="you_mall_neck" style="display:none;">
						<div class="slider-name left">
							<p>NECK</p>
						</div>
						
						<div class="homepageslider left sliderwrap-neck">
							<div class="newprofile-neck" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-1 home-profile-back" id="you_mall_back" style="display:none;">
						<div class="slider-name left">
							<p>BACK</p>
						</div>
						
						<div class="homepageslider left sliderwrap-back">
							<div class="newprofile-back" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-2 home-profile-upperarms" id="you_mall_upperarms" style="display:none;">
						<div class="slider-name left">
							<p>UPPER ARMS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-upperarms">
							<div class="newprofile-upperarms" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
					<div class="home-profile profile-your-mall-hidden-3 home-profile-midriff" id="you_mall_midriff" style="display:none;">
						<div class="slider-name left" >
							<p>MIDRIFF</p>
						</div>
						
						<div class="homepageslider left sliderwrap-midriff">
							<div class="newprofile-midriff" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-4 home-profile-stomach" id="you_mall_stomach" style="display:none;">
						<div class="slider-name left">
							<p>STOMACH</p>
						</div>
						
						<div class="homepageslider left sliderwrap-stomach">
							<div class="newprofile-stomach" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-5 home-profile-bottom" id="you_mall_bottom" style="display:none;">
						<div class="slider-name left">
							<p>BOTTOM</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bottom">
							<div class="newprofile-bottom" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-6 home-profile-innerthighs" id="you_mall_innerthighs" style="display:none;">
						<div class="slider-name left" >
							<p>INNER THIGHS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-innerthighs">
							<div class="newprofile-innerthighs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="home-profile profile-your-mall-hidden-7 home-profile-outerthighs" id="you_mall_outerthighs" style="display:none;">
						<div class="slider-name left" >
							<p>OUTER THIGHS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-outerthighs">
							<div class="newprofile-outerthighs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					<div class="home-profile profile-your-mall-hidden-8 home-profile-lowerlegs" id="you_mall_lowerlegs" style="display:none;">
						<div class="slider-name left">
							<p>LOWER LEGS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-lowerlegs">
							<div class="newprofile-lowerlegs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="profile-save mousehand  i bkpinkycolor" data-action="save">Save</div>
					



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


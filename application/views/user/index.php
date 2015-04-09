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
					console.log(default_values);
					

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
						var outerthighs 	= [ "Too &nbsp;&nbsp;&nbsp;Protruding", "Saddlebags" ]
						var lowerlegs 		= [ "Thin Legs","Shapeless Ankles", "Muscular/Large Calves", "Thin Ankles" ];
						


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
            '<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-10.png" /></div><ul><li>Your torso is equal in length to your legs.</li><li>The fullest part of your bottom protrudes at approximately half your height.</li><li>Weight gain is first experienced between your bust and hipline.</li><li>Bend your elbow 90% to the floor: you are a Balanced Body if you bent elbow in at the same position as your waist.</li><li>The most common body ratio of Caucasian women</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-09.png" /></div><ul><li>Your legs are longer than your body.</li><li>Your torso is short and your waistline feels/is high.</li><li>Weight gain is first experienced at your midriff, stomach and high on the back of your hips.</li><li>Bend your elbow 90% to the floor: you are a Long Legged and Short Bodied if your waist is above your bent elbow.</li><li>The most common body ratio of African American women</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/body ratio/featues-11.png" /></div><ul><li>You have a long body and short legs.</li><li>Weight gain is first experienced at your bottom, hips and thighs.</li><li>You have a low waistline.</li><li>Bend your elbow 90% to the floor: you are a Short Legged and Long Bodied if your waist sits below your bent elbow.</li><li>The most common body ratio of Asian women"</li></ul></div>',
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
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/build_1.png" /></div><ul><li>You have a petite frame.</li><li> You are likely to be short and small boned.</li></ul></div>',
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/build_2.png" /></div><ul><li>Your frame is between small and large</li><li>The most common build - select this one if you are unsure. </li></ul></div>',
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/build_3.png" /></div><ul><li>Your frame is large.</li><li>You are likely to be tall and large boned. </li></ul></div>' 
						];
						





						var necklengthimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/featues-25.png" /></div><ul><li>Your neck is short.</li><li>When carrying extra weight you may have double chins.</li><li>You look best with hair that is at or above your jawline.</li><li>Necklines with some length such as V and scoop look best on you.</li><li>High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/featues-26.png" /></div><ul><li>Your neck is on the short side of average.</li><li>High necklines such as turtlenecks and long drop earrings can be difficult to wear.</li><li>Necklines with some length such as V\'s and scoop look best on you.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/featues-23.png" /></div><ul><li>Your neck is just like that of most people you meet.</li><li>You have had no reason to question if it is shorter or longer than average.</li></ul></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/featues-22.png" /></div><ul><li>Your neck is on the long side of average.</li><li>Wearing long drop earrings and high neck shirts and sweaters is no problem for you.</li><li>Plunging and very deep necklines do not look as good on you as those which are medium depth.</div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/featues-24.png" /></div><ul><li>You are aware that you have a long neck.</li><li>If you are underweight your neck may appear very thin.</li><li>You look best with long hair i.e. shoulder length or longer.</li><li>Your neck length allows you to wear extra-long earrings without them dangling on your shoulders.</li><li>Plunging necklines look good only when your hair is worn down (shoulder length and longer).</li><li>Necklines that sit at the base of your neck can also be unflattering.</li></ul></div>' 
						];
						
						var shouldersimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-29.png" /></div><ul><li>Your shoulders have a definite slope from the base of your neck to the tip of your shoulder.</li> <li>Shoulder straps will tend to slip off your shoulders.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-28.png" /></div><ul><li>Your shoulders have a slight slope.</li><li>The most common shoulder - select this one if you are unsure.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-27.png" /></div><ul><li>Your shoulders are broad and square with almost no slope.</li></ul></div>' 
						];
						
						var faceshapeimage = [ 
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/oval.png" /></div><ul><li>Your face is an inverted egg or oval shape</li><li>You have a gently rounded chin.</li><li>Your face is slightly longer than it is wide</li><li>Your face is equal in length from hairline to browline, browline to nose tip, nose tip to chin tip</li><li>Your eye, nose and mouth are all well scaled to the size of your face i.e. no feature is extra large or small</li><li>Your eye, nose and mouth are all well-spaced within your face i.e. your eyes are not close or wide set</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-15.png" /></div><ul><li>Your forehead is the widest part of your face</li><li>Your have jawline is narrower than your forehead</li><li>You have a pointed to gently rounded chin</li><li>You have a widow\'s peak (pointed hairline at centre of forehead).</li></ul></div>',
						'<div id="talkbubble" class="doubleline talkbubbleMedLabel" ><div class="slider-image" style="top:-325px;"><img src="/images/profileSetup/faceshape/featues-19.png"/></div><ul><li></li></ul>Above your cheekbones is the widest part of your face</li><li>Your have jawline is narrower than your forehead</li><li>You have a pointed to gently rounded chin.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-20.png" /></div><ul><li>Your chin is narrow and pointed.</li><li>Your cheekbones are high and prominent.</li><li>Your face is widest at the cheekbones.</li><li>Your hairline and/or forehead angles inward..</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/triangle.png" /></div><ul><li>Your face is a little longer than it is wide</li><li>Your forehead is the narrowest part of your face</li><li>Your have jawline is the widest region of your face</li><li>You have a broad square jawline</li><li>Your chin is shallow and flat.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-17.png" /></div><ul><li>Your jawline is the widest part of your face</li><li>You have full, round cheeks</li><li>Your forehead is the narrowest part of your face.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/rectangle.png" /></div><ul><li>Your face is definitely longer than it is wide</li><li>Your cheekbones and jaw line are as wide as each other</li><li>The sides of your face from eyeline to jaw bone are straight</li><li>Your jawline is square</li><li>Your chin is shallow and flat.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-14.png" /></div><ul><li>Your face is definitely longer than it is wide.</li><li>Your cheekbones and jaw line are as wide as each other</li><li>Your jawline and chin is slightly rounded.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-18.png" /></div><ul><li>Your face is almost as wide as it is long</li><li>Your chin and cheeks are round and full</li><li>Your cheekbones are widest part of your face</li><li>Your forehead is close to, or as wide as your jawline</li><li>If you lose weight your face shape may look more Square than Round</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-12.png" /></div><ul><li>Your face is almost as wide as it is long</li><li>The sides of your face from eyeline to jawline are straight</li><li>Your forehead is close to, or as wide as your jawline</li><li>If you gain weight your face shape may become Round.</li></ul></div>' 
						];
						
						var neckimage = [
						'<div id="talkbubble"><ul><li>Commonly a thin neck is also long.</li><li>Low necklines and medium-short to short hair styles look best on you.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Select if your neck is just like that of most people you meet. It is neither thick nor very thin.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your neck circumference is similar to the with of your head.</li><li>Commonly a thick neck is also short in length.</li></ul></div>',
						'<div id="talkbubble" class="med-width"><ul><li>Select if you have rolls under chin.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Select if you have an undefined chin in a side profile. </li></ul></div>' 
						];
						
					    var backimage = [ 
						'<div id="talkbubble" class="doubleline"><ul><li>You have a very rounded shoulder line.</li><li>The roundness starts at the base of your neck and extends to your shoulder blades.</li><li>Your head protrudes forward causing round neck tops to bind in front and sit away from the neck at the back.</li></ul></div>',
						'<div id="talkbubble"><ul><li>You have a definite curve in the lower spine causing straight skirts to have a roll of excess fabric below the waistband in the back.</li></ul></div>' 
						];
						
						var upperarmsimage = [ 
						'<div id="talkbubble"><ul><li>Usually associated with a very thin body.</li><li> Your arms appear bony.</li><li>You prefer to keep covered.</li></ul></div>',
						'<div id="talkbubble"><ul><li>You have full, fleshy upper arms. </li><li>You prefer to keep your upper arms except for very hot days.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your upper arms have lost their tone.</li><li> You prefer to keep your upper arms covered most of the time.</li></ul></div>'
						];
						
						
						var midriffimage = [ 
						'<div id="talkbubble"><ul><li>You have a roll on sitting but none/minimal on standing.</li></ul></div>',
						'<div id="talkbubble"><ul><li>You have a noticeable roll when standing.</li></ul></div>'
						];
						
						var stomachimage = [ 
						'<div id="talkbubble"><ul><li>You have a tummy left over from pregnancy.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><ul><li>You have a tummy but not one large enough to hold your hems up in the front.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your tummy is flaccid/untoned and best kept underwraps.</li></ul></div>',
						'<div id="talkbubble"><ul><li>You have a full stomach that protrudes in front and causes the hemline of dresses, skirts and shirts to rise up in the front.</li></ul></div>'
						];
						
						var bottomimage = [ 
						'<div id="talkbubble"><ul><li> Your bottom is large and out of proportion with the rest of your body. </li><li>Straight skirts can be difficult to fit.</li><li>Your hemlines often rise up in the back.</li><li>Tops get caught up on your bottom.</li><li>DO NOT SELECT this feature if: Your bottom is high and firm - think Serena Williams and Jenifer Lopez (bootylicious).</li></ul></div>',
						'<div id="talkbubble"><ul><li>You have the appearance of being almost bottomless.</li><li>Your pants and skirts are often baggy in the back around the bottom and down the back of the leg.</li><li>The hem of your skirts and dresses may hang lower in the back.</li></ul></div>'
						];
						
						var innerthighsimage = [ 
						'<div id="talkbubble"><ul><li>Your inner thighs touch when your feet are placed directly under your hips.</li><li>When wearing shorts your thighs cause the shorts to ride up.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your legs bow outwards anywhere from the ankles to thighs</li><li>You have a gap between your legs where they bow</li></ul></div>'
						];

						var outerthighsimage=[
						'<div id="talkbubble" class="doubleline"><ul><li>Your thighs protrude substantially and are wider than the widest part of the hip line.</li><li>They curve in a smooth line from your hip.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your thighs protrude substantially and</li><li>They have a dimple at the top outer edge where the thigh and torso meet which cause your thigh to have the appearance of jodhpurs (riding pants).</li></ul></div>'
						];
						
						var lowerlegsimage = [ 
						'<div id="talkbubble" class="doubleline"><ul><li>  Your legs are very thin from the ankles up to the thighs.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><ul><li>Your ankles are undefined; sometimes referred to as ‘cankles’.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><ul><li>Your calves protrude more than average.</li><li>Calf or knee boots that fit can be difficult to find.</li></ul></div>',
						'<div id="talkbubble"><ul><li>Your ankles are particularly thin</li></ul></div>'
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
								<?php if ( $minBust > 0 ){ ?>
									$('.minBust-check').prop('checked', true);
								<?php } ?>
									
							} else {
								$(".bustCheck").hide();
							}
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
						});




						
						
						$(".newprofile-necklength")
							.slider({
								min: 0, 
								max: necklength.length-1, 
								value: default_values[7]-1
							})
							.slider("pips", {
								labels: necklength
							})
							.slider("float", {
								rest: "label",
								labels: necklengthimage
							})
							.on("slidechange", function(e,ui) {
								default_values[7] = (+ui.value+1);
							});
						
						
						$(".newprofile-shoulders")
							.slider({
								min: 0, 
								max: shoulders.length-1, 
								value: default_values[8]-1
							})
							.slider("pips", {
								labels: shoulders
							})
							.slider("float", {
								rest: "label",
								labels: shouldersimage
							})
							.on("slidechange", function(e,ui) {
								default_values[8] = (+ui.value+1);
							});
						
						
						$(".newprofile-faceshape")
							.slider({
								min: 0, 
								max: faceshape.length-1, 
								value: default_values[9]-1
							})
							.slider("pips", {
								labels: faceshape
							})
							.slider("float", {
								rest: "label",
								labels: faceshapeimage
							})
							.on("slidechange", function(e,ui) {
								default_values[9] = (+ui.value+1);
							});
						
						
						$(".newprofile-neck")
							.slider({
								min: 0, 
								max: neck.length-1, 
								value: default_values[10]-1
							})
							.slider("pips", {
								labels: neck
							})
							.slider("float", {
								rest: "label",
								labels: neckimage
							})
							.on("slidechange", function(e,ui) {
								default_values[10] = (+ui.value+1);
							});
						
						
						$(".newprofile-back")
							.slider({
								min: 0, 
								max: back.length-1, 
								value: default_values[11]-1
							})
							.slider("pips", {
								labels: back
							})
							.slider("float", {
								rest: "label",
								labels: backimage
							})
							.on("slidechange", function(e,ui) {
								default_values[11] = (+ui.value+1);
							});
						
						
						$(".newprofile-upperarms")
							.slider({
								min: 0, 
								max: upperarms.length-1, 
								value: default_values[12]-1
							})
							.slider("pips", {
								labels: upperarms
							})
							.slider("float", {
								rest: "label",
								labels: upperarmsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[12] = (+ui.value+1);
							});
						
						
						$(".newprofile-midriff")
							.slider({
								min: 0, 
								max: midriff.length-1, 
								value: default_values[13]-1
							})
							.slider("pips", {
								labels: midriff
							})
							.slider("float", {
								rest: "label",
								labels: midriffimage
							})
							.on("slidechange", function(e,ui) {
								default_values[13] = (+ui.value+1);
							});
						
						
						$(".newprofile-stomach")
							.slider({
								min: 0, 
								max: stomach.length-1, 
								value: default_values[14]-1
							})
							.slider("pips", {
								labels: stomach
							})
							.slider("float", {
								rest: "label",
								labels: stomachimage
							})
							.on("slidechange", function(e,ui) {
								default_values[14] = (+ui.value+1);
							});
						
						
						$(".newprofile-bottom")
							.slider({
								min: 0, 
								max: bottom.length-1, 
								value: default_values[15]-1
							})
							.slider("pips", {
								labels: bottom
							})
							.slider("float", {
								rest: "label",
								labels: bottomimage
							})
							.on("slidechange", function(e,ui) {
								default_values[15] = (+ui.value+1);
							});
						
						
						$(".newprofile-innerthighs")
							.slider({
								min: 0, 
								max: innerthighs.length-1, 
								value: default_values[16]-1
							})
							.slider("pips", {
								labels: innerthighs
							})
							.slider("float", {
								rest: "label",
								labels: innerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[16] = (+ui.value+1);
							});
						
						$(".newprofile-outerthighs")
							.slider({
								min: 0, 
								max: outerthighs.length-1, 
								value: default_values[17]-1
							})
							.slider("pips", {
								labels: outerthighs
							})
							.slider("float", {
								rest: "label",
								labels: outerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[17] = (+ui.value+1);
							});
						
						$(".newprofile-lowerlegs")
							.slider({
								min: 0, 
								max: lowerlegs.length-1, 
								value: default_values[18]-1
							})
							.slider("pips", {
								labels: lowerlegs
							})
							.slider("float", {
								rest: "label",
								labels: lowerlegsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[18] = (+ui.value+1);
							});
						

						for (var i = 11; i < 19; i++) {
							if( default_values[i] > 0 ){
								$('.your-mall-checkbox > label').eq(i-11).find('input').prop('checked', true);
								toggle_div_class(i-11);
							}
						};
						
						$(document).on("click", '.bodyEditSection', function(){
							$('.bodyEditSection').removeClass("u").html('<span style="color: #e72775; font-size: 14px;">saving...</span>');
							pull_profile_garment_update_button();
						});
						
						
					});
					
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
							
						   "neck_select_id" : ($('#mall-neck').attr('checked') == "checked")? default_values[10] :0,
							"back_select_id" : ($('#mall-back').attr('checked') == "checked")? default_values[11] :0,
							"upper_arms_select_id" : ($('#mall-upperarms').attr('checked') == "checked")? default_values[12] :0,
							"midriff_select_id" : ($('#mall-midriff').attr('checked') == "checked")? default_values[13] :0,
							
							"stomach_select_id" : ($('#mall-stomach').attr('checked') == "checked")? default_values[14] :0,
							"bottom_select_id" : ($('#mall-bottom').attr('checked') == "checked")? default_values[15] :0,
							"inner_thighs_select_id" : ($('#mall-innerthighs').attr('checked') == "checked")? default_values[16] :0,
							"outer_thighs_select_id" : ($('#mall-outerthighs').attr('checked') == "checked")? default_values[17] :0,
							"lower_legs_select_id" : ($('#mall-lowerlegs').attr('checked') == "checked")? default_values[18] :0
						};

						
						$.post( "/user/update-user-info.html", { 
								user_data: requestvalues, 
								pref_type : 'feature', 
								pas_secret_name:$("input[name=pas_secret_name]").val()
								}, 
						function( data ) {
							$( ".bodyEditSection" ).text( "Profile saved" );
							window.location.reload();
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
					</div><br><br>
					<div class="bodyEditSection editSection profile-save bkpinkycolor i u b mousehand" data-action="save"><span class="">SAVE</span></div></div>
					



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


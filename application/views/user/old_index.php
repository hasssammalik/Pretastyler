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
			<div class="row">
				<div class="col span_11">
					<label>HEIGHT:</label>
					<select name="height" class="height-select generalFeaturesDisabled" disabled="disabled">
						<option value="0">Please Select</option>
						<?php foreach ($value_data['height'] as $height){ ?>
						<option value="<?php print $height['select_id']?>" title="<?php print $height['tooltip']?>" <?php print ($height['selected'])?'selected="selected"':'' ?>><?php print $height['display']?></option>
						<?php }?>
					</select>
					<small>Height helps determine your best lengths for tops, pants, skirt, dresses and coats as well as your best focal point locations.</small>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>WEIGHT:</label>
					<select name="weight" class="weight-select generalFeaturesDisabled" disabled="disabled">
						<?php foreach ($value_data['weight'] as $weight){ ?>
						<option value="<?php print $weight['select_id']?>" title="<?php print $weight['tooltip']?>" <?php print ($weight['selected'])?'selected="selected"':'' ?>><?php print $weight['display']?></option>
						<?php }?>
					</select>
					<small>Weight helps determine the best silhouette, internal design lines, color placement and contrast and focal point placement.</small>
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>AGE:</label>
					<select name="age" class="age-select generalFeaturesDisabled" disabled="disabled">
						<?php foreach ($value_data['age'] as $age){ ?>
						<option value="<?php print $age['select_id']?>" title="<?php print $age['tooltip']?>" <?php print ($age['selected'])?'selected="selected"':'' ?>><?php print $age['display']?></option>
						<?php }?>
					</select>
					<small>Helps in determining the selection of styles, lengths and necklines.</small>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Bra cup size:</label>
					<select name="bra" class="bra-select generalFeaturesDisabled" disabled="disabled">
						<?php foreach ($value_data['bra'] as $bra){ ?>
						<option value="<?php print $bra['select_id']?>" title="<?php print $bra['tooltip']?>" <?php print ($bra['selected'])?'selected="selected"':'' ?>><?php print $bra['display']?></option>
						<?php }?>
					</select>
					<small>Your bust cup size helps determine your best necklines and garment styles.</small>
					<label style="white-space: normal;"><input type="checkbox" name="agree" class="minBust-check" <?php print ($user_info['minBust'] == 1)?'checked="checked"':''?>>
						<span>Check if you DO NOT want styles selected that will minimise your bust size. (You've got it and you want to flaunt it!)</span>
					</label>
					
				</div>
			</div>
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
		<div class="getEmptyContent" style="display:none;">
			<p class="i">
				Click <span class="editInitialByIntro u mousehand pinkycolor">EDIT</span> and start completing your Body Profile
			</p>
			
			<p class="i">
				There’s a mall of fun just waiting for you…<br>
				So we can create a fashion mall specifically for you we need to know a little about you.  Complete our body profile here and once it’s done your mall will be filled with items that will make you look fabulous. Make sure you answer as truthfully as possible without being too critical.<br>
			</p>
		</div>
		<div class="userOptionAdder" style="display: none;">
			<label class="mousehand uncheckedOptions data-tooltip-hover" data-tooltip="Check only those prominent features that truly apply to you.&#xa; For every feature you add you will lose clothing options.&#xa; *If in doubt do not check the feature.&#xa; *Please read descriptions carefully.">
				<div class="img">
					<span class="overlay">
						<span>
							<span>
								<i></i>
							</span>
						</span>
					</span>
				</div>
				<div class="caption">
					<strong>Add</strong> more <br>Prominent Features
				</div>
			</label>
		</div>
	</fieldset>
	
	<fieldset id="question1" qno="1" class="questionSetsBody " data-caption="Neck Length">
		<div class="sectionHeader">
			<div><h2><strong>Neck Length</strong></h2></div>
		</div>
		<small class="center"><span>Why Neck Length :</span> Determines the best depth and style for your necklines, necklaces and earrings as well as the best height for your collars.</small>
		<ul class="steps">
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your neck is short.&#xa;When carrying extra weight you may have double chins.&#xa;You look best with hair that is at or above your jawline.&#xa;Necklines with some length such as V and scoop look best on you.&#xa;High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless.">
					<input type="radio" name="neckLength">
					<div class="img"><div><img src="/images/profileSetup/neckLength/short.jpg" alt=""></div></div>
					<div class="caption"><div>Short</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your neck is on the short side of average.&#xa;High necklines such as turtlenecks and long drop earrings can be difficult to wear.&#xa;Necklines with some length such as V's and scoop look best on you.">
					<input type="radio" name="neckLength">
					<div class="img"><div><img src="/images/profileSetup/neckLength/med-short.jpg" alt=""></div></div>
					<div class="caption"><div>Med Short</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your neck is just like that of most people you meet.&#xa;You have had no reason to question if it is shorter or longer than average.">
					<input type="radio" name="neckLength">
					<div class="img"><div><img src="/images/profileSetup/neckLength/medium.jpg" alt=""></div></div>
					<div class="caption"><div>Medium</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your neck is on the long side of average.&#xa;Wearing long drop earrings and high neck shirts and sweaters is no problem for you.&#xa;Plunging and very deep necklines do not look as good on you as those which are medium depth.">
					<input type="radio" name="neckLength">
					<div class="img"><div><img src="/images/profileSetup/neckLength/med-long.jpg" alt=""></div></div>
					<div class="caption"><div>Med Long</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You are aware that you have a long neck.&#xa;If you are underweight your neck may appear very thin.&#xa;You look best with long hair i.e. shoulder length or longer.&#xa;Your neck length allows you to wear extra-long earrings without them dangling on your shoulders.&#xa;Plunging necklines look good only when your hair is worn down (shoulder length and longer).&#xa;Necklines that sit at the base of your neck can also be unflattering.">
					<input type="radio" name="neckLength">
					<div class="img"><div><img src="/images/profileSetup/neckLength/long.jpg" alt=""></div></div>
					<div class="caption"><div>Long</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question2" qno="2" class="questionSetsBody " data-caption="Neck Thickness">
		<div class="sectionHeader">
			<div><h2><strong>Neck Thickness</strong></h2></div>
		</div>
		<small class="center"><span>Why Neck Thickness :</span> Determines the best depth and style for your necklines and earrings.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Commonly a thin neck is also long.&#xa;Low necklines and medium-short to short hair styles look best on you.">
					<input type="radio" name="neckThickness">
					<div class="img"><div><img src="/images/profileSetup/neckThickness/very-thin.jpg" alt=""></div></div>
					<div class="caption"><div>Very Thin</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Select if your neck is just like that of most people you meet. It is neither thick nor very thin.&#xa;If in doubt this is the thickness to select.">
					<input type="radio" name="neckThickness">
					<div class="img"><div><img src="/images/profileSetup/neckThickness/average.jpg" alt=""></div></div>
					<div class="caption"><div>Average</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Select if you have a double chin, your neck circumference is similar to the width of your head or if you
have an undefined chin in a side profile.&#xa;Commonly a thick neck is also short in length.">
					<input type="radio" name="neckThickness">
					<div class="img"><div><img src="/images/profileSetup/neckThickness/thick-chin.jpg" alt=""></div></div>
					<div class="caption"><div>Thick Chin</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question3" qno="3" class="questionSetsBody " data-caption="Bone Structure">
		<div class="sectionHeader">
			<div><h2><strong>Bone Structure</strong></h2></div>
		</div>
		<small class="center"><span>Why Bone Structure :</span> Helps determines your best size for patterns and features e.g., lapels.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite
hand as if they were a bracelet.&#xa;Select small if you thumb and middle finger easily pass each other.">
					<input type="radio" name="boneStructure">
					<div class="img"><div><img src="/images/profileSetup/boneStructure/small.jpg" alt=""></div></div>
					<div class="caption"><div class="wrap">Small</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite
hand as if they were a bracelet.&#xa;Select medium if you thumb and middle finger just touch each other.">
					<input type="radio" name="boneStructure">
					<div class="img"><div><img src="/images/profileSetup/boneStructure/medium.jpg" alt=""></div></div>
					<div class="caption"><div class="wrap">Medium</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Gently encircle your dominant wrist (your writing hand) with thumb and middle finger of the opposite
hand as if they were a bracelet.&#xa;Select large if there is a gap between your thumb and middle finger (they don't touch).">
					<input type="radio" name="boneStructure">
					<div class="img"><div><img src="/images/profileSetup/boneStructure/large.jpg" alt=""></div></div>
					<div class="caption"><div class="wrap">Large</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question4" qno="4" class="questionSetsBody " data-caption="Horizontal Body Shape">
		<div class="sectionHeader">
			<div><h2><strong>Horizontal Body Shape</strong></h2></div>
		</div>
		<a href="#" class="button calcButton">Why No Calculator</a>
		<small class="center"><span>Why Horizontal Body Shape :</span> Helps determine your best necklines, skirt, dress and pant styles and silhouettes, waistband and pant rise styles.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="You appear to be the same width across your bustline as you are across the widest part of your hipline&#xa;Your waist is well defined and your narrowest area&#xa;NOTE: You can be any weight and be an hourglass figure.">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/hourGlass.jpg" alt=""></div></div>
					<div class="caption"><div>Hour Glass</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You are larger above the waist than below&#xa;You are widest across your bustline&#xa;Your armpits are wider than the widest part of your hipline (when viewed from the front).
You are smaller below waist than below">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/invertedTriangle.jpg" alt=""></div></div>
					<div class="caption"><div>Inverted Triangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You are larger below the waist than above&#xa;You have a well-defined waist&#xa;You have a narrow lower rib cage&#xa;Your armpits are narrower than the widest part of your hipline (when viewed from the front).">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/triangle.jpg" alt=""></div></div>
					<div class="caption"><div>Triangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your bust, waist and hipline are close to or the same in width&#xa;Your waist is undefined
Your have a wide rib cage">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/rectangle.jpg" alt=""></div></div>
					<div class="caption"><div>Rectangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You consider yourself to be in the substantially overweight range&#xa;Your widest area is between your bust and hipline&#xa;You have a full stomach that sits low around the hips">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/oval.jpg" alt=""></div></div>
					<div class="caption"><div>Oval</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You consider yourself to be in the substantially overweight range&#xa;Your widest area is between your bust and hipline&#xa;You have a full, high stomach that starts just under your bustline.&#xa;Sometimes others may mistake you for being pregnant.">
					<input type="radio" name="horizontalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/horizontalBodyShape/diamond.jpg" alt=""></div></div>
					<div class="caption"><div>Diamond</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question5" qno="5" class="questionSetsBody " data-caption="Vertical Body shape">
		<div class="sectionHeader">
			<div><h2><strong>Vertical Body Shape</strong></h2></div>
		</div>
		<a href="#" class="button calcButton">Use measurement calculator</a>
		<small class="center"><span>Why Vertical Body Shape :</span> Helps determine your best waistline placement, skirt, dress and pant lengths as well as color placement and contrast.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<div class="calcWrap">
			<div class="calcHeader"><h3>Measurement Calculator</h3><a href="#"></a></div>
			<div class="calcBody">
				<div class="img"><img src="/images/profileSetup/calc.jpg" alt=""></div>
				<article>
					<p><strong>Important:</strong> Accurate results require precision measurements. Please follow our instructions carefully and only use decimal points in you figures (ie 37.5)<br><strong>Requirements</strong> A friend, a good fitting bra and a tape measure.<br><strong>NOTE:</strong> click on fields to see measurement examples<br>Check the units you will be measuring in <label><input type="radio" name="unit"><span>CM</span></label> <label><input type="radio" name="unit"><span>inches</span></label></p>
					<p><a href="#" class="button">Enter Measurement</a><strong>Top of Head:</strong><br>Have your helper mark the wall where you are tallest. Measure the distance from the floor.</p>
					<p><a href="#" class="button">Enter Measurement</a><strong>Full Bust Height</strong><br>Have your helper mark the wall at your full bust point. Measure the distance from your full point to the floor</p>
					<p><a href="#" class="button">Enter Measurement</a><strong>Full Hip Height</strong><br>Standing sideways to a wall have your helper mark the wall where your bottom protrudes the most. Measure the distance between this point (dressmaker's hip) and the floor.</p>
					<p><a href="#" class="button">Enter Measurement</a><strong>Kneecap Height</strong><br>Standing sideways to a wall have your helper mark the wall at your kneecap. Measure the distance from your kneecap to the floor.</p>
				</article>
			</div>
		</div>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your torso is equal in length to your legs.&#xa;The fullest part of your bottom protrudes at approximately half your height.&#xa;Weight gain is first experienced between your bust and hipline.&#xa;Bend your elbow 90% to the floor: you are a Balanced Body if you bent elbow in at the same position as your waist.&#xa;Use the vertical calculator if you are unsure.">
					<input type="radio" name="verticalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/verticalBodyShape/balancedBody.jpg" alt=""></div></div>
					<div class="caption"><div>Balanced Body</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your legs are longer than your body.&#xa;Your torso is short and your waistline feels/is high.&#xa;Weight gain is first experienced at your midriff, stomach and high on the back of your hips.&#xa;Bend your elbow 90% to the floor: you are a Long Legged and Short Bodied if your waist is above your bent elbow.&#xa;Use the vertical calculator if you are unsure.">
					<input type="radio" name="verticalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/verticalBodyShape/longLeggedShortTorso.jpg" alt=""></div></div>
					<div class="caption"><div>Long Legged Short Torso</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have a long body and short legs.&#xa;Weight gain is first experienced at your bottom, hips and thighs.&#xa;You have a low waistline.&#xa;Bend your elbow 90% to the floor: you are a Short Legged and Long Bodied if your waist sits below your bent elbow.&#xa;Use the vertical calculator if you are unsure.">
					<input type="radio" name="verticalBodyShape">
					<div class="img"><div><img src="/images/profileSetup/verticalBodyShape/shortLeggedLongTorso.jpg" alt=""></div></div>
					<div class="caption"><div>Short Legged Long Torso</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question6" qno="6" class="questionSetsBody " data-caption="Shoulders">
		<div class="sectionHeader">
			<div><h2><strong>Shoulders</strong></h2></div>
		</div>
		<small class="center"><span>Why Shoulders :</span> Impacts on the style of your necklines and collars and if shoulder pads may be of assistance to your appearance.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your shoulders have a slight slope.">
					<input type="radio" name="shoulders">
					<div class="img"><div><img src="/images/profileSetup/shoulders/tapered.jpg" alt=""></div></div>
					<div class="caption"><div>Average Tapered</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your shoulders have a definite slope from the base of your neck to the tip of your shoulder.&#xa;Shoulder straps will tend to slip off your shoulders.">
					<input type="radio" name="shoulders">
					<div class="img"><div><img src="/images/profileSetup/shoulders/square.jpg" alt=""></div></div>
					<div class="caption"><div>Average Sloping</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your shoulders have a slight slope.">
					<input type="radio" name="shoulders">
					<div class="img"><div><img src="/images/profileSetup/shoulders/tapered.jpg" alt=""></div></div>
					<div class="caption"><div>Broad Tapered</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your shoulders are broad and square with almost no slope">
					<input type="radio" name="shoulders">
					<div class="img"><div><img src="/images/profileSetup/shoulders/square.jpg" alt=""></div></div>
					<div class="caption"><div>Broad Square</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question7" qno="7" class="questionSetsBody " data-caption="Face Shape">
		<div class="sectionHeader">
			<div><h2><strong>Face Shape</strong></h2></div>
		</div>
		<small class="center"><span>Why Face Shape :</span> Helps in determining your best neckline and collar styles and depths, earrings, hat and necklace styles.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
			<li></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is definitely longer than it is wide.&#xa;Your cheekbones and jaw line are as wide as each other&#xa;Your jawline and chin is slightly rounded">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/oblong.jpg" alt=""></div></div>
					<div class="caption"><div>Oblong</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is definitely longer than it is wide&#xa;Your cheekbones and jaw line are as wide as each other&#xa;The sides of your face from eyeline to jaw bone are straight&#xa;Your jawline is square&#xa;Your chin is shallow and flat">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/rectangle.jpg" alt=""></div></div>
					<div class="caption"><div>Rectangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is almost as wide as it is long&#xa;Your chin and cheeks are round and full&#xa;Your cheekbones are widest part of your face&#xa;Your forehead is close to, or as wide as your jawline&#xa;If you lose weight your face shape may look more Square than Round">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/round.jpg" alt=""></div></div>
					<div class="caption"><div>Round</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is almost as wide as it is long&#xa;The sides of your face from eyeline to jawline are straight&#xa;Your forehead is close to, or as wide as your jawline&#xa;If you gain weight your face shape may become Round">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/square.jpg" alt=""></div></div>
					<div class="caption"><div>Square</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Above your cheekbones is the widest part of your face&#xa;Your have jawline is narrower than your forehead&#xa;You have a pointed to gently rounded chin">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/invertedTriangle.jpg" alt=""></div></div>
					<div class="caption"><div>Inverted Triangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your forehead is the widest part of your face&#xa;Your have jawline is narrower than your forehead&#xa;You have a pointed to gently rounded chin&#xa;You have a widow's peak (pointed hairline at centre of forehead).">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/heart.jpg" alt=""></div></div>
					<div class="caption"><div>Heart</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your chin is narrow and pointed.&#xa;Your cheekbones are high and prominent.&#xa;Your face is widest at the cheekbones.&#xa;Your hairline and/or forehead angles inward.">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/diamond.jpg" alt=""></div></div>
					<div class="caption"><div>Diamond</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your jawline is the widest part of your face&#xa;You have full, round cheeks&#xa;Your forehead is the narrowest part of your face">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/pear.jpg" alt=""></div></div>
					<div class="caption"><div>Pear</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is a little longer than it is wide&#xa;Your forehead is the narrowest part of your face&#xa;Your have jawline is the widest region of your face&#xa;You have a broad square jawline&#xa;Your chin is shallow and flat">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/triangle.jpg" alt=""></div></div>
					<div class="caption"><div>Triangle</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your face is an inverted egg or oval shape&#xa;You have a gently rounded chin.&#xa;Your face is slightly longer than it is wide&#xa;Your face is equal in length from hairline to browline, browline to nose tip, nose tip to chin tip&#xa;Your eye, nose and mouth are all well scaled to the size of your face i.e. no feature is extra large or small&#xa;Your eye, nose and mouth are all well-spaced within your face i.e. your eyes are not close or wide set">
					<input type="radio" name="faceShape">
					<div class="img"><div><img src="/images/profileSetup/faceShape/oval.jpg" alt=""></div></div>
					<div class="caption"><div>Oval</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<fieldset id="question8" qno="8" class="questionSetsBody " data-caption="Figure Challenges: ARMS">
		<div class="sectionHeader">
			<div><h2><strong>Figure Challenges: ARMS</strong></h2></div>
		</div>
		<small class="center"><span>IMPORTANT:</span><br>* Check only those prominent features that truly apply to you.<br>* For every feature you add you will lose clothing options.<br>* If in doubt do not check the feature.<br>* Please Read descriptions carefully.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Usually associated with a very thin body.&#xa;Your arms appear bony.&#xa;You prefer to keep covered.">
					<input type="radio" name="prominentArms">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/veryThinArms.jpg" alt=""></div></div>
					<div class="caption"><div>Very thin arms</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have full, fleshy upper arms.&#xa;You prefer to keep your upper arms covered most of the time.">
					<input type="radio" name="prominentArms">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/heavyArms.jpg" alt=""></div></div>
					<div class="caption"><div>Heavy arms</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your upper arms have lost their tone.&#xa;You prefer to keep your upper arms covered most of the time.">
					<input type="radio" name="prominentArms">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/agedArms.jpg" alt=""></div></div>
					<div class="caption"><div>Aged arms</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	<fieldset id="question9" qno="9" class="questionSetsBody " data-caption="Figure Challenges: BACK & BOTTOM">
		<div class="sectionHeader">
			<div><h2><strong>Figure Challenges: BACK & BOTTOM</strong></h2></div>
		</div>
		<small class="center"><span>IMPORTANT:</span><br>* Check only those prominent features that truly apply to you.<br>* For every feature you add you will lose clothing options.<br>* If in doubt do not check the feature.<br>* Please Read descriptions carefully.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have a definite curve in the lower spine causing straight skirts to have a roll of excess fabric below the waistband in the back.">
					<input type="radio" name="prominentBack">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/swayBack.jpg" alt=""></div></div>
					<div class="caption"><div>Sway back</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your bottom is large and out of proportion with the rest of your body.&#xa;Straight skirts can be be difficult to fit.&#xa;Your hemlines often rise up in the back.&#xa;Tops get caught up on your bottom.&#xa;DO NOT SELECT this feature if: Your bottom is high and firm - think Serena Williams and Jenifer Lopez(bootylicious).">
					<input type="radio" name="prominentBack">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/largeBottom.jpg" alt=""></div></div>
					<div class="caption"><div>Large bottom</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have the appearance of being almost bottomless.&#xa;Your pants and skirts are often baggy in the back around the bottom and down the back of the leg.&#xa;The hem of your skirts and dresses may hang lower in the back.">
					<input type="radio" name="prominentBack">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/flatBottom.jpg" alt=""></div></div>
					<div class="caption"><div>Flat bottom</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	<fieldset id="question10" qno="10" class="questionSetsBody " data-caption="Figure Challenges: LEGS">
		<div class="sectionHeader">
			<div><h2><strong>Figure Challenges: LEGS</strong></h2></div>
		</div>
		<small class="center"><span>IMPORTANT:</span><br>* Check only those prominent features that truly apply to you.<br>* For every feature you add you will lose clothing options.<br>* If in doubt do not check the feature.<br>* Please Read descriptions carefully.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your legs bow outwards anywhere from the ankles to thighs&#xa;You have a rounded gap between your legs where they bow.">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/bowedLegs.jpg" alt=""></div></div>
					<div class="caption"><div>Bowed legs</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Your legs that are very thin, especially at the ankles.">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/thinLegs.jpg" alt=""></div></div>
					<div class="caption"><div>Thin legs</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have legs that are very heavy/thick in the region of the calves and/or ankles.&#xa;Select this feature also if your legs are severely marked, e.g., varicose veins.">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/heavyLowerLegs.jpg" alt=""></div></div>
					<div class="caption"><div>Heavy lower legs</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Thighs that are very full and wide, dimpled at the top and have the appearance of jodhpurs.">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/saddleBags.jpg" alt=""></div></div>
					<div class="caption"><div>Saddle bags</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Select if:&#xa;~ Thighs that are very full, and at the &#xa; &nbsp; outside edges are substantially&#xa; &nbsp; wider than the widest part of the hip line">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/thickOuterThighs.jpg" alt=""></div></div>
					<div class="caption"><div>Full outer thighs</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="Thighs that are very full, and at the outside edges are substantially wider than the widest part of the hip line.">
					<input type="radio" name="prominentLegs">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/thickInnerThighs.jpg" alt=""></div></div>
					<div class="caption"><div>Full inner thighs</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	<fieldset id="question11" qno="11" class="questionSetsBody " data-caption="Figure Challenges: TORSO & SHOULDERS">
		<div class="sectionHeader">
			<div><h2><strong>Figure Challenges: TORSO & SHOULDERS</strong></h2></div>
		</div>
		<small class="center"><span>IMPORTANT:</span><br>* Check only those prominent features that truly apply to you.<br>* For every feature you add you will lose clothing options.<br>* If in doubt do not check the feature.<br>* Please Read descriptions carefully.</small>
		<ul class="steps">
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
			<li><span class="data-tooltip-hover" data-tooltip="Congratulations you have completed 50%&#xa;of the Style Genie Body Match Profile"></span></li>
		</ul>
		<ul class="userOptions doubleWidth">
			<li>
				<label class="data-tooltip-hover" data-tooltip="A large roll at the midriff that makes tucked-in tops and tight garments unflattering.">
					<input type="radio" name="prominentStomach">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/largeMidrifft.jpg" alt=""></div></div>
					<div class="caption"><div>Large midrifft</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="A full stomach that protrudes in front and causes the hemline of dresses and shirts to rise up in the front.">
					<input type="radio" name="prominentStomach">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/largeStomach.jpg" alt=""></div></div>
					<div class="caption"><div>Large stomach</div></div>
				</label>
			</li>
			<li>
				<label class="data-tooltip-hover" data-tooltip="You have a very rounded shoulder line.&#xa;The roundness starts at the base of your neck and extends to your shoulder blades.&#xa;Your head protrudes forward causing round neck tops to bind in front and sit away from the neck at the back.">
					<input type="radio" name="prominentStomach">
					<div class="img"><div><img src="/images/profileSetup/prominentFeatures/dowagersHump.jpg" alt=""></div></div>
					<div class="caption"><div>Dowagers Hump</div></div>
				</label>
			</li>
		</ul>
	</fieldset>
	
	<?php /* ?>
	<div class="buttonsHolder center">
		<a href="#" class="button" id="saveButton">Save My Details</a>
	</div>
	<?php */ ?>
	
	<br>
	
</form>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
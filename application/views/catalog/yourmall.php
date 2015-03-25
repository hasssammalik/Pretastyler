<div class="mainContent">
	
	<div class="frontWrap">
		
		<!--
			<section class="role-element container wid80" id="yourmall-uppercontent">
			<div class="wid100 center homeprofile-head">
			<p class="profile-big-title">Here are some of the fields to get you an acurate result:</p>
			</div>
			</section>
		-->
		
		
		<section class="role-element container wid60" id="the-product">
			
			<div class="wid100">
				<?php echo form_open();  echo form_close();  ?>
				<style type="text/css">
					#circles-slider .ui-slider-pip
					{
					top: 3px;
					}
					
					#circles-slider .ui-slider-pip .ui-slider-line 
					{
					width: 20px;
					top: -13px;
					height: 20px;
					border-radius: 14px;
					margin-left: -10px;
					background: #eaeaea;
					}
					#circles-slider .ui-slider-pip.ui-slider-pip-last .ui-slider-label,
					#circles-slider .ui-slider-pip.ui-slider-pip-first .ui-slider-label 
					{
					margin: 0; 
					}
					
					
					#circles-slider .ui-slider-pip.ui-slider-pip-last .ui-slider-label 
					{
					left: 2em;
					text-align: left; 
					}
					
					#circles-slider .ui-slider-pip.ui-slider-pip-selected-initial {
					font-weight: normal;
					}
					
					#circles-slider .ui-slider-pip.ui-slider-pip-selected {
					font-weight: bold;
					}
					
					#circles-slider .ui-slider-pip.ui-slider-pip-selected,
					#circles-slider .ui-slider-pip.ui-slider-pip-selected-initial {
					color: #434d5a; 
					}
  
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
					color: #434443 !important;
					width: 7em;
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
					#talkbubble .slider-image{
					top:-295px;
					right:5%;
					position: absolute;
					width: 150px;
					}
					#talkbubble .slider-image img{
					width:80%;
					}
					
					#talkbubble {
					top:85px;
					right:96%;
					width: 150px;
					height: 50px;
					background: #949494;
					margin: 0px auto;
					position: relative;
					z-index:3;
					
					}
					#talkbubble:before {
					content:"";
					position: absolute;
					right: 50%;
					top: -11px;
					width: 0;
					height: 0;
					border-left: 8px solid transparent;
					border-right: 8px solid transparent;
					border-bottom: 12px solid #949494;
					
					}
					 #talkbubble.doubleline{
					top:100px;
					}
					#talkbubble.doubleline .slider-image{
					top:-305px;
					}
					.home-profile .ui-state-default, .home-profile .ui-widget-content .ui-state-default, .home-profile .ui-widget-header .ui-state-default{z-index: 2;}
					.ui-state-hover{z-index:3;}
					#circles-slider .ui-slider-pip.ui-slider-pip-first .ui-slider-label {
					  text-align: left;
					  margin-left: -1em;
					}
					#circles-slider .ui-slider-pip.ui-slider-pip-last .ui-slider-label {
				  left: -2.5em;
				  text-align: center;
					}
				</style>
				<script type="text/javascript">
					
					var default_values = [ 4,2,2,8,    2,2,2,2,2,  2,2,2,2,2 ];
					
					$(function(){
						
						/*
							var height = [ "short", "med-short", "medium", "med-tall", "tall" ];
							var size = [ "allegra", "natalie", "halle", "drew", "america", "kim", "queen", "ophra" ];
							var age = [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "", "75 >" ];
							var bodyshape = [ "hour glass", "inverted triangle", "rectangle", "triangle", "oval", "diamond"];
							var bodyratio = [ "long legged short torso", "balanced body", "short legged long torso" ];
							var bust = [ "aa", "a", "b", "c", "d", "dd", "e", "ee>" ];
							var build = [ "small", "medium", "large" ];
						*/
						
						var necklength = [ "Short", "Med-short", "Medium", "Med-long", "Long" ];
						var necktype = [ "Thin", "Average", "Wide", "Double chin", "No definition" ];
						var shoulders = [ "Sloping", "Tapered", "Square" ];
						var faceshape = [ "Oval", "Heart", "Inverted triangle", "Diamond", "Triangle", "Pear", "Rectangle", "Oblong", "Round", "Square" ];
						
						var neck = [ "Too thin", "Too board", "Double chin", "No definition" ];
						var upperback = [ "Dowagers hump" ];
						var upperarms = [ "Too thin", "Too heavy", "Too muscular" ];
						var bustother = [ "Too small", "Too large", "Mastectomy" ];
						var midriff = [ "Small roll", "Moderate roll", "Large roll" ];
						
						var stomach = [ "Post baby", "Moderate tummy", "Too soft", "Large tummy" ];
						var bottom = [ "Too large", "Too small", "Flat" ];
						var thighs = [ "Rub together", "Too protruding", "Saddlebags" ];
						var lowerlegs = [ "Muscular/heavy calves", "Shapeless calves", "Shapeless ankles", "Thin ankles" ];
						var feet = [ "Too large", "Too small", "Too narrow", "Too board" ];
						
						
						var necklengthimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-19.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-20.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-21.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-22.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-23.png" /></div></div>' 
						];
						
						var necktypeimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-07.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-08.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-10.png" /></div></div>' 
						];
						
						var shouldersimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-24.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-25.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-26.png" /></div></div>' 
						];
						
						var faceshapeimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-28.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-29.png" /></div></div>',
						'<div id="talkbubble" class="doubleline"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-30.png"/></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-31.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-32.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-33.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-34.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-35.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-36.png" /></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-37.png" /></div></div>' 
						];
						
						
						
						var neckimage = [ 
						'',
						'',
						'',
						'' 
						];
						
						var upperbackimage = [ 
						'',
						'' 
						];
						
						var upperarmsimage = [ 
						'','',''
						];
						
						var bustotherimage = [ 
						'','',''
						];
						
						var midriffimage = [ 
						'','',''
						];
						
						var stomachimage = [ 
						'',
						'','',''
						];
						
						var bottomimage = [ 
						'','',''
						];
						
						var thighsimage = [ 
						'','',''
						];
						
						var lowerlegsimage = [ 
						'','','',''
						];
						
						var feetimage = [ '',
						'','',''
						];
						
						
						
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
						
						$(".newprofile-necktype")
							.slider({
								min: 0, 
								max: necktype.length-1, 
								value: default_values[1]-1
							})
							.slider("pips", {
								labels: necktype
							})
							.slider("float", {
								rest: "label",
								labels: necktypeimage
							})
							.on("slidechange", function(e,ui) {
								default_values[1] = (+ui.value+1);
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
						
						
						$(".newprofile-upperback")
							.slider({
								min: 0, 
								max: upperback.length-1, 
								value: default_values[5]-1
							})
							.slider("pips", {
								labels: upperback
							})
							.slider("float", {
								rest: "label",
								labels: upperbackimage
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
						
						
						$(".newprofile-bustother")
							.slider({
								min: 0, 
								max: bustother.length-1, 
								value: default_values[7]-1
							})
							.slider("pips", {
								labels: bustother
							})
							.slider("float", {
								rest: "label",
								labels: bustotherimage
							})
							.on("slidechange", function(e,ui) {
								default_values[7] = (+ui.value+1);
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
						
						
						$(".newprofile-thighs")
							.slider({
								min: 0, 
								max: thighs.length-1, 
								value: default_values[11]-1
							})
							.slider("pips", {
								labels: thighs
							})
							.slider("float", {
								rest: "label",
								labels: thighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[11] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-lowerlegs")
							.slider({
								min: 0, 
								max: lowerlegs.length-1, 
								value: default_values[12]-1
							})
							.slider("pips", {
								labels: lowerlegs
							})
							.slider("float", {
								rest: "label",
								labels: lowerlegsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[12] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-feet")
							.slider({
								min: 0, 
								max: feet.length-1, 
								value: default_values[13]-1
							})
							.slider("pips", {
								labels: feet
							})
							.slider("float", {
								rest: "label",
								labels: feetimage
							})
							.on("slidechange", function(e,ui) {
								default_values[13] = (+ui.value+1);
								pull_profile_garment();
							});
						
						pull_profile_garment();
						
					});
					
					function pull_profile_garment( ) {
						//console.log(default_values);
						var neckthickness = default_values[1];
						
						//"neck_type_select_id" : default_values[1], ====> NECK TYPE is not in database.
						//"BUST" : default_values[7],   ===> BUST is not in database.
						//"Midriff" : default_values[8],  ====> Midriff is not in database.
						//"bottom" : default_values[10],  ====> BOTTOM is not in database.
						//"thighs" : default_values[11],  ====> THIGHS is not in database.
						//"legs" : default_values[13], =====> Feets in not in database.
						
						//neck_thickness_select_id ==== neck_select_id
						
						if( default_values[1] > 3 ){
							var neckthickness = 3;
						}
						var requestvalues = {   
							
							"height_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['height_select_id']; ?>,
							"weight_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['weight_select_id']; ?>,
							"age_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['age_select_id']; ?>,
							"horizontal_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['horizontal_select_id']; ?>,
							"vertical_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['vertical_select_id']; ?>,
							"bra_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['bra_select_id']; ?>,
							
							"neck_length_select_id" : default_values[0],
							
							"shoulders_select_id" : default_values[2],
							"face_select_id" : default_values[3],
							
							"neck_thickness_select_id" : default_values[4],
							"prominent_back_select_id" : default_values[5],
							"prominent_arms_select_id" : default_values[6],
							
							"prominent_stomach_select_id" : default_values[9],
							
							"prominent_legs_select_id" : default_values[12],
							
							
						};
						
						$.post( "/mall/garment-by-profile.html", {offset: 0, limit: 5, uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
							//$( ".garments" ).html( data );
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
				
				<div class="container">
					
					<div class="homeprofile-head">
						<!-- <br>
							
							<br>
							
							<p class="i profile-big-title">Mark your unique body style in your <strong>Personal Profile</strong></p>
							
							<div class="your-mall-basic-profile center">
							<fieldset class="parentInputBkGrey wid100">
							<div class="row left wid80">
							<label id="error-register"></label>
							</div>
							<div class="clear"></div>
							<div class="row left">
							<label>Your first name:</label>
							<div class="icon-user"><input type="text" id="menu_mall_register_fname" name="first-name" required="required"></div>
							</div>
							<div class="row left">
							<label>Your last name:</label>
							<div class="icon-user"><input type="text" id="menu_mall_register_lname" name="last-name" required="required"></div>
							</div>
							<div class="row left">
							<label>Email Address:</label>
							<div class="icon-user"><input type="email" id="menu_mall_register_email" name="email" required="required"></div>
							</div>
							<!--
							<div class="row left">
							<label>Password:</label>
							<div class="icon-lock"><input type="password" id="menu_mall_register_password" name="password" required="required"></div>
							</div>
							<div class="row left">
							<label>Confirm password:</label>
							<div class="icon-lock"><input type="password" id="menu_mall_register_rpassword" name="confirm-password" required="required"></div>
							</div>
							
							<div class="clear"></div>
							
							</fieldset>
						</div> -->
						<div class="clear"></div>
						<br><br><br><br><br><br><br><br>
						<p class="i profile-big-title" style="text-align:left;"><!--Here are some of the feature to get you an <strong>accurate result:</strong> -->You're almost done</p>
					</div>
				</div>
				
				<div class="profileWrap container">
					
					<div class="home-profile home-profile-necklength">
						
						<div class="slider-name left">
							<p>NECK LENGTH</p>
						</div>
						<div class="homepageslider left sliderwrap-necklength">
							<div class="newprofile-necklength"  id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile home-profile-necktype">
						<div class="slider-name left">
							<p>NECK TYPE</p>
						</div>
						<div class="homepageslider left sliderwrap-necktype">
							<div class="newprofile-necktype"  id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
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
								<?php /* ?>
									<label><input type="checkbox" name="addedneck" class="additional-profile mall-neck"> Neck</label>
									<label><input type="checkbox" name="addedupperback" class="additional-profile mall-upperback"> Upper Back</label>
									<label><input type="checkbox" name="addedupperarms" class="additional-profile mall-upperarms"> Upper Arms</label>
									<label><input type="checkbox" name="addedbust" class="additional-profile mall-bust"> Bust</label>
									<label><input type="checkbox" name="addedmidriff" class="additional-profile mall-midriff"> Midriff</label>
									<label><input type="checkbox" name="addedstomach" class="additional-profile mall-stomach"> Stomach</label>
									<label><input type="checkbox" name="addedbottom" class="additional-profile mall-bottom"> Bottom</label>
									<label><input type="checkbox" name="addedthighs" class="additional-profile mall-thighs"> Thighs</label>
									<label><input type="checkbox" name="addedlowerlegs" class="additional-profile mall-lowerlegs"> Lower Legs</label>
									<label><input type="checkbox" name="addedfeet" class="additional-profile mall-feet"> Feet</label>
								<?php */ ?>
								
								<label><input type="checkbox" class="additional-profile" id="mall-neck" onclick='toggle_div_class("0")'> Neck</label>
								<label><input type="checkbox" class="additional-profile" id="mall-upperback" onclick='toggle_div_class("1")'> Upper Back</label>
								<label><input type="checkbox" class="additional-profile" id="mall-upperarms" onclick='toggle_div_class("2")'> Upper Arms</label>
								<label><input type="checkbox" class="additional-profile" id="mall-bust" onclick='toggle_div_class("3")'> Bust</label>
								<label><input type="checkbox" class="additional-profile" id="mall-midriff" onclick='toggle_div_class("4")'> Midriff</label><br>
								<label><input type="checkbox" class="additional-profile" id="mall-stomach" onclick='toggle_div_class("5")'> Stomach</label>
								<label><input type="checkbox" class="additional-profile" id="mall-bottom" onclick='toggle_div_class("6")'> Bottom</label>
								<label><input type="checkbox" class="additional-profile" id="mall-thighs" onclick='toggle_div_class("7")'> Thighs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-lowerlegs" onclick='toggle_div_class("8")'> Lower Legs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-feet" onclick='toggle_div_class("9")'> Feet</label>
								<!--<label><input type="checkbox" class="additional-profile" id="mall-none"> None</label>-->
								
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
					
					<div class="home-profile profile-your-mall-hidden-1 home-profile-upperback" id="you_mall_upperback" style="display:none;">
						<div class="slider-name left">
							<p>UPPER BACK</p>
						</div>
						
						<div class="homepageslider left sliderwrap-upperback">
							<div class="newprofile-upperback" id="circles-slider"></div>
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
					
					<div class="home-profile profile-your-mall-hidden-3 home-profile-bustother" id="you_mall_bustother" style="display:none;">
						<div class="slider-name left">
							<p>BUST</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bustother">
							<div class="newprofile-bustother" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-4 home-profile-midriff" id="you_mall_midriff" style="display:none;">
						<div class="slider-name left" >
							<p>MIDRIFF</p>
						</div>
						
						<div class="homepageslider left sliderwrap-midriff">
							<div class="newprofile-midriff" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-5 home-profile-stomach" id="you_mall_stomach" style="display:none;">
						<div class="slider-name left">
							<p>STOMACH</p>
						</div>
						
						<div class="homepageslider left sliderwrap-stomach">
							<div class="newprofile-stomach" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-6 home-profile-bottom" id="you_mall_bottom" style="display:none;">
						<div class="slider-name left">
							<p>BOTTOM</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bottom">
							<div class="newprofile-bottom" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-7 home-profile-thighs" id="you_mall_thighs" style="display:none;">
						<div class="slider-name left" >
							<p>THIGHS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-thighs">
							<div class="newprofile-thighs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					<div class="home-profile profile-your-mall-hidden-8 home-profile-lowerlegs" id="you_mall_lowerlegs" style="display:none;">
						<div class="slider-name left" >
							<p>LOWER LEGS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-lowerlegs">
							<div class="newprofile-lowerlegs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="home-profile profile-your-mall-hidden-9 home-profile-feet" id="you_mall_feet" style="display:none;">
						<div class="slider-name left" >
							<p>FEET</p>
						</div>
						
						<div class="homepageslider left sliderwrap-feet">
							<div class="newprofile-feet" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>
					
				</div>
				
			</div>
			
			
			<div class="homeprofile-head">
				<br><br><br>
				<p class="">Want to see garments perfect for you? Your personalized mall is ready!</p>
				<div class="mall-link3">
				<button class="bkpinkycolor home-vistmallbtn container noneLiner"  id="signup-popup">
					SAVE AND GO SHOPPING <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
				</button></div>
				<div class="clear"></div>
			</div>
			
			
		</section>
		<div class="clear"></div>
		<br><br>
		<br>
		<div class="garments container wid70"></div>
	</div>
</div>
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
				<script type="text/javascript">
					
					var default_values = [ 4,2,2,8,3,2,2,2,2,2,2,2,2];
					
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
						
						var neck = [ "Thin", "Average", "Wide", "Double Chin", "No Definition" ];
						var upperback = [ "Dowagers Hump","Sway Back"];
						var upperarms = [ "Too thin", "Too heavy", "Aged/Untoned" ];
						
						var midriff = ["Moderate Roll", "Large roll" ];
						
						var stomach = [ "Post Baby", "Moderate Tummy", "Too Soft", "Large Tummy" ];
						var bottom = [ "Too Large", "Too Flat" ];
						var thighs = [ "Rub Together", "Bowed Legs"];
						var feet=["Too Protruding","Saddlebags"]
						var lowerlegs = [ "Shapeless Calves","Shapeless Ankles", "Muscular/Heavy calves", "Thin Ankles" ];
						
						
						
						var necklengthimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-19.png" /></div><span>Your neck is short.<br>When carrying extra weight you may have double chins.<br>You look best with hair that is at or above your jawline.<br>Necklines with some length such as V and scoop look best on you.<br>High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-20.png" /></div><span>Your neck is on the short side of average.<br>High necklines such as turtlenecks and long drop earrings can be difficult to wear.<br>Necklines with some length such as V\'s and scoop look best on you.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-21.png" /></div><span>Your neck is just like that of most people you meet.<br>You have had no reason to question if it is shorter or longer than average.</span></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-22.png" /></div><span>Your neck is on the long side of average.<br>Wearing long drop earrings and high neck shirts and sweaters is no problem for you.<br>Plunging and very deep necklines do not look as good on you as those which are medium depth.</div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/neck length/features_-23.png" /></div><span>You are aware that you have a long neck.<br>If you are underweight your neck may appear very thin.<br>You look best with long hair i.e. shoulder length or longer.<br>Your neck length allows you to wear extra-long earrings without them dangling on your shoulders.<br>Plunging necklines look good only when your hair is worn down (shoulder length and longer).<br>Necklines that sit at the base of your neck can also be unflattering.</span></div>' 
						];
						
						var necktypeimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-07.png" /></div><span></span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-08.png" /></div><span></span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div><span></span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-09.png" /></div><span></span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/features_-10.png" /></div><span></span></div>' 
						];
						
						var shouldersimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-24.png" /></div><span style="padding:5px;">Your shoulders have a slight slope.</span></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/features_-25.png" /></div><span>Your shoulders are broad and square with almost no slope</span></div>',
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
						
						var upperbackimage = [ 
						'<div class="hide">test</div>',
						'<div class="hide">test</div>' 
						];
						
						var upperarmsimage = [ 
						'<div class="hide">test</div>',
						'<div class="hide">test</div>',
						'<div class="hide">test</div>'
						];
						
						
						
						var midriffimage = [ 
						'<div class="hide">test</div>',
						'<div class="hide">test</div>'
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
						
						var thighsimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>'
						];
						var feetimage=['<div class="hide"></div>',
						'<div class="hide"></div>'];
						
						var lowerlegsimage = [ 
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>',
						'<div class="hide"></div>'
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
								<!-- <label><input type="checkbox" class="additional-profile" id="mall-bust" onclick='toggle_div_class("3")'> Bust</label> -->
								<label><input type="checkbox" class="additional-profile" id="mall-midriff" onclick='toggle_div_class("3")'> Midriff</label><br>
								<label><input type="checkbox" class="additional-profile" id="mall-stomach" onclick='toggle_div_class("4")'> Stomach</label>
								<label><input type="checkbox" class="additional-profile" id="mall-bottom" onclick='toggle_div_class("5")'> Bottom</label>
								<label><input type="checkbox" class="additional-profile" id="mall-thighs" onclick='toggle_div_class("6")'> Inner Thighs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-feet" onclick='toggle_div_class("7")'> Outer Thighs</label>
								<label><input type="checkbox" class="additional-profile" id="mall-lowerlegs" onclick='toggle_div_class("8")'> Lower Legs</label>
								
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
							<p>BACK</p>
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
					
					<!-- <div class="home-profile profile-your-mall-hidden-3 home-profile-bustother" id="you_mall_bustother" style="display:none;">
						<div class="slider-name left">
							<p>BUST</p>
						</div>
						
						<div class="homepageslider left sliderwrap-bustother">
							<div class="newprofile-bustother" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div> -->
					
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
							<p>INNER THIGHS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-thighs">
							<div class="newprofile-thighs" id="circles-slider"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="home-profile profile-your-mall-hidden-9 home-profile-feet" id="you_mall_feet" style="display:none;">
						<div class="slider-name left" >
							<p>OUTER THIGHS</p>
						</div>
						
						<div class="homepageslider left sliderwrap-feet">
							<div class="newprofile-feet" id="circles-slider"></div>
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
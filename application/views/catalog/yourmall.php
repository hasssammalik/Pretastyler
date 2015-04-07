<div class="mainContent">
	
	<div class="frontWrap">
		
		
		<section class="role-element container wid60 preta-tooltip" id="the-product">
			
			<div class="wid100">
				
				<script type="text/javascript">
					
					var default_values = [ 2,2,2,2,2,2,2,2,2,1,1,1];
					
					$(function(){
						
						
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
						var lowerlegs 		= [ "Thin Legs","Shapeless Ankles", "Muscular/Large Calves", "Thin Ankles" ];
						
						
						
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
						'<div id="talkbubble" class="doubleline talkbubbleMedLabel" ><div class="slider-image" style="top:-325px;"><img src="/images/profileSetup/faceshape/featues-19.png"/></div><ul><li>Above your cheekbones is the widest part of your face</li><li>Your have jawline is narrower than your forehead</li><li>You have a pointed to gently rounded chin.</li></ul></div>',
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
						'<div id="talkbubble"><ul><li>You have a very rounded shoulder line.</li><li>The roundness starts at the base of your neck and extends to your shoulder blades.</li><li>Your head protrudes forward causing round neck tops to bind in front and sit away from the neck at the back.</li></ul></div>',
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
						'<div id="talkbubble"><ul><li>You have a tummy but not one large enough to hold your hems up in the front.</li></ul></div>',
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
						'<div id="talkbubble" class="doubleline"><ul><li> Your legs are very thin from the ankles up to the thighs.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><ul><li>Your ankles are undefined; sometimes referred to as ‘cankles’.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><ul><li>Your calves protrude more than average.</li><li>Calf or knee boots that fit can be difficult to find.</li></ul></div>',
						'<div id="talkbubble" ><ul><li>Your ankles are particularly thin</li></ul></div>'
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
						
						
						$(".newprofile-shoulders")
							.slider({
								min: 0, 
								max: shoulders.length-1, 
								value: default_values[1]-1
							})
							.slider("pips", {
								labels: shoulders
							})
							.slider("float", {
								rest: "label",
								labels: shouldersimage
							})
							.on("slidechange", function(e,ui) {
								default_values[1] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-faceshape")
							.slider({
								min: 0, 
								max: faceshape.length-1, 
								value: default_values[2]-1
							})
							.slider("pips", {
								labels: faceshape
							})
							.slider("float", {
								rest: "label",
								labels: faceshapeimage
							})
							.on("slidechange", function(e,ui) {
								default_values[2] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-neck")
							.slider({
								min: 0, 
								max: neck.length-1, 
								value: default_values[3]-1
							})
							.slider("pips", {
								labels: neck
							})
							.slider("float", {
								rest: "label",
								labels: neckimage
							})
							.on("slidechange", function(e,ui) {
								default_values[3] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-back")
							.slider({
								min: 0, 
								max: back.length-1, 
								value: default_values[4]-1
							})
							.slider("pips", {
								labels: back
							})
							.slider("float", {
								rest: "label",
								labels: backimage
							})
							.on("slidechange", function(e,ui) {
								default_values[4] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-upperarms")
							.slider({
								min: 0, 
								max: upperarms.length-1, 
								value: default_values[5]-1
							})
							.slider("pips", {
								labels: upperarms
							})
							.slider("float", {
								rest: "label",
								labels: upperarmsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[5] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-midriff")
							.slider({
								min: 0, 
								max: midriff.length-1, 
								value: default_values[6]-1
							})
							.slider("pips", {
								labels: midriff
							})
							.slider("float", {
								rest: "label",
								labels: midriffimage
							})
							.on("slidechange", function(e,ui) {
								default_values[6] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-stomach")
							.slider({
								min: 0, 
								max: stomach.length-1, 
								value: default_values[7]-1
							})
							.slider("pips", {
								labels: stomach
							})
							.slider("float", {
								rest: "label",
								labels: stomachimage
							})
							.on("slidechange", function(e,ui) {
								default_values[7] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-bottom")
							.slider({
								min: 0, 
								max: bottom.length-1, 
								value: default_values[8]-1
							})
							.slider("pips", {
								labels: bottom
							})
							.slider("float", {
								rest: "label",
								labels: bottomimage
							})
							.on("slidechange", function(e,ui) {
								default_values[8] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						$(".newprofile-innerthighs")
							.slider({
								min: 0, 
								max: innerthighs.length-1, 
								value: default_values[9]-1
							})
							.slider("pips", {
								labels: innerthighs
							})
							.slider("float", {
								rest: "label",
								labels: innerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[9] = (+ui.value+1);
								pull_profile_garment();
							});
						
						$(".newprofile-outerthighs")
							.slider({
								min: 0, 
								max: outerthighs.length-1, 
								value: default_values[10]-1
							})
							.slider("pips", {
								labels: outerthighs
							})
							.slider("float", {
								rest: "label",
								labels: outerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[10] = (+ui.value+1);
								pull_profile_garment();
							});
						

						$(".newprofile-lowerlegs")
							.slider({
								min: 0, 
								max: lowerlegs.length-1, 
								value: default_values[11]-1
							})
							.slider("pips", {
								labels: lowerlegs
							})
							.slider("float", {
								rest: "label",
								labels: lowerlegsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[11] = (+ui.value+1);
								pull_profile_garment();
							});
						
						
						
						pull_profile_garment();
						
					});
					
					function pull_profile_garment( ) {
						//console.log(default_values);
						
						//"Midriff" : default_values[8],  ====> Midriff is not in database.
						//"bottom" : default_values[10],  ====> BOTTOM is not in database.
						//"thighs" : default_values[11],  ====> THIGHS is not in database.
						//"legs" : default_values[13], =====> Feets in not in database.
						
						//neck_thickness_select_id ==== neck_select_id
					

						var requestvalues = { 
							
							"height_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['height_select_id']; ?>,
							"weight_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['weight_select_id']; ?>,
							"age_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['age_select_id']; ?>,
							"body_shape_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['body_shape_select_id']; ?>,
							"body_ratio_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['body_ratio_select_id']; ?>,
							"bra_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['bra_select_id']; ?>,
							"build_select_id" : <?php echo  $this->session->userdata['initial_user_profile']['build_select_id']; ?>,
							"minBust" : <?php echo  $this->session->userdata['initial_user_profile']['minBust']; ?>,

							"neck_length_select_id" : default_values[0],
							"shoulders_select_id" : default_values[1],
							"face_shape_select_id" : default_values[2],
							
							"neck_select_id" : ($('#mall-neck').attr('checked') == "checked")? default_values[3] :0,
							"back_select_id" : ($('#mall-back').attr('checked') == "checked")? default_values[4] :0,
							"upper_arms_select_id" : ($('#mall-upperarms').attr('checked') == "checked")? default_values[5] :0,
							"midriff_select_id" : ($('#mall-midriff').attr('checked') == "checked")? default_values[6] :0,
							
							"stomach_select_id" : ($('#mall-stomach').attr('checked') == "checked")? default_values[7] :0,
							"bottom_select_id" : ($('#mall-bottom').attr('checked') == "checked")? default_values[8] :0,
							"inner_thighs_select_id" : ($('#mall-innerthighs').attr('checked') == "checked")? default_values[9] :0,
							"outer_thighs_select_id" : ($('#mall-outerthighs').attr('checked') == "checked")? default_values[10] :0,
							"lower_legs_select_id" : ($('#mall-lowerlegs').attr('checked') == "checked")? default_values[11] :0
						};
						
						$.post( "/mall/garment-by-profile.html", {offset: 0, limit: 5, uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
							//$( ".garments" ).html( data );
						});
					}
					
					function toggle_div_class(class_num){
						if (false == $(".profile-your-mall-hidden-"+class_num).is(':visible')) {
							$(".profile-your-mall-hidden-"+class_num).show();
							pull_profile_garment();

						}
						else {
							$(".profile-your-mall-hidden-"+class_num).hide();
						}
					}
					
				</script>
				
				<div class="container">
					
					<div class="homeprofile-head">
						
						<div class="clear"></div>
						<br><br><br><br><br><br><br><br>
						<p class="i profile-big-title" style="text-align:left;">You're almost done</p>
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
							<p>AREAS OF CONCERN</p>
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
					
					
					
				</div>
				
			</div>
			
			
			<div class="homeprofile-head">
				<br><br><br>
				<p class=""> <strong>Your personalized mall is ready!</strong></p>
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
		
	</div>
</div>

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

<div class="modalOverlay"></div>
<div class="modal"></div>
<div class="popup_modal"></div>
<div class="popup-box">
    <div class="cross"><div class="cross-image-homepage"><img src="/images/pink_button-05.png" alt=""></div></div>
    <h1 style="padding: 5px;text-transform:uppercase;text-align:center;">One Last Thing</h1>
	<hr width="95%" size="2" />
    
	<div id="error-register">
		
	</div>
	
	<form name="registerNewUser" action="" method="post" id="menu_mall_register">
      <div>
			<input type="text" placeholder="First Name*" name="fname" id="menu_mall_register_fname" required/>
			<input type="text" placeholder="Last Name*" name="lname" id="menu_mall_register_lname" required/>
	  </div>
      <div>
			<input type="email" placeholder="Email*" name="email" id="menu_mall_register_email" required/>
	  </div>
      <div>
			<input type="password" placeholder="Password*" name="password" id="menu_mall_register_password" required />
			<input type="password" placeholder="Confirm Password*" name="cpass" id="menu_mall_register_rpassword" required />
	  </div>
      
      <div style="text-align:center"><input type="submit" name="starttrial" value="Start my Trial" id="register-submit"></div>
      
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

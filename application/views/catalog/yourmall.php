<div class="mainContent">
	
	<div class="frontWrap">
		
		<!--
			<section class="role-element container wid80" id="yourmall-uppercontent">
			<div class="wid100 center homeprofile-head">
			<p class="profile-big-title">Here are some of the fields to get you an acurate result:</p>
			</div>
			</section>
		-->
		
		
		<section class="role-element container wid60 preta-tooltip" id="the-product">
			
			<div class="wid100">
				
				<script type="text/javascript">
					
					var default_values = [ 4,2,8,3,2,2,2,2,2,2,2,2 ];
					
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
						var lowerlegs 		= [ "Shapeless Calves","Shapeless Ankles", "Muscular/Heavy calves", "Thin Ankles" ];
						
						
						
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
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-28.png" /></div><span>Your face is definitely longer than it is wide.<br>Your cheekbones and jaw line are as wide as each other<br>Your jawline and chin is slightly rounded</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-29.png" /></div><span>Your face is definitely longer than it is wide<br>Your cheekbones and jaw line are as wide as each other<br>The sides of your face from eyeline to jaw bone are straight<br>Your jawline is square<br>Your chin is shallow and flat</div>',
						'<div id="talkbubble" class="doubleline talkbubbleMedLabel" ><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-30.png"/></div><span></span>Your face is almost as wide as it is long<br>Your chin and cheeks are round and full<br>Your cheekbones are widest part of your face<br>Your forehead is close to, or as wide as your jawline<br>If you lose weight your face shape may look more Square than Round</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-31.png" /></div><span>Your face is almost as wide as it is long<br>The sides of your face from eyeline to jawline are straight<br>Your forehead is close to, or as wide as your jawline<br>If you gain weight your face shape may become Round</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-32.png" /></div><span>Above your cheekbones is the widest part of your face<br>Your have jawline is narrower than your forehead<br>You have a pointed to gently rounded chin</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-33.png" /></div><span>Your forehead is the widest part of your face<br>Your have jawline is narrower than your forehead<br>You have a pointed to gently rounded chin<br>You have a widow\'s peak (pointed hairline at centre of forehead).</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-34.png" /></div><span>Your chin is narrow and pointed.<br>Your cheekbones are high and prominent.<br>Your face is widest at the cheekbones.<br>Your hairline and/or forehead angles inward.</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-35.png" /></div><span>Your jawline is the widest part of your face<br>You have full, round cheeks<br>Your forehead is the narrowest part of your face</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-36.png" /></div><span>Your face is a little longer than it is wide<br>Your forehead is the narrowest part of your face<br>Your have jawline is the widest region of your face<br>You have a broad square jawline<br>Your chin is shallow and flat</span></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/features_-37.png" /></div><span>Your face is an inverted egg or oval shape<br>You have a gently rounded chin.<br>Your face is slightly longer than it is wide<br>Your face is equal in length from hairline to browline, browline to nose tip, nose tip to chin tip<br>Your eye, nose and mouth are all well scaled to the size of your face i.e. no feature is extra large or small<br>Your eye, nose and mouth are all well-spaced within your face i.e. your eyes are not close or wide set</span></div>' 
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
								value: default_values[12]-1
							})
							.slider("pips", {
								labels: outerthighs
							})
							.slider("float", {
								rest: "label",
								labels: outerthighsimage
							})
							.on("slidechange", function(e,ui) {
								default_values[12] = (+ui.value+1);
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
							
							"stomach_select_id" : ($('#mall-stomach').attr('checked') == "checked")? default_values[9] :0,
							"bottom_select_id" : ($('#mall-bottom').attr('checked') == "checked")? default_values[10] :0,
							"inner_thighs_select_id" : ($('#mall-innerthighs').attr('checked') == "checked")? default_values[11] :0,
							"outer_thighs_select_id" : ($('#mall-outerthighs').attr('checked') == "checked")? default_values[12] :0,
							"lower_legs_select_id" : ($('#mall-lowerlegs').attr('checked') == "checked")? default_values[13] :0
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
							<p>Areas of Concern</p>
						</div>
						
						<div class="homepageslider left area-of-concern">
							<div class="your-mall-checkbox big-checkbox">
								
								<label><input type="checkbox" class="additional-profile" id="mall-neck" onclick='toggle_div_class("0")'> Neck</label>
								<label><input type="checkbox" class="additional-profile" id="mall-back" onclick='toggle_div_class("1")'> Back</label>
								<label><input type="checkbox" class="additional-profile" id="mall-upperarms" onclick='toggle_div_class("2")'> Upper Arms</label>
								
								<label><input type="checkbox" class="additional-profile" id="mall-midriff" onclick='toggle_div_class("3")'> Midriff</label>
								<label><input type="checkbox" class="additional-profile" id="mall-stomach" onclick='toggle_div_class("4")'> Stomach</label>
								<br>
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
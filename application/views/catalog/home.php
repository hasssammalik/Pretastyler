<div class="mainContent">
	
	<div class="frontWrap">
		<div class="homepage-header homeBannerHeight">
			<div class="headerBackground">
				
				<div class="headerBackground-content role-element leadstyle-container center" style="padding-top: 6%;">
					<p style="font-size: 3.8em; font-weight: bold; letter-spacing:2px;margin-top: -5px;line-height: 1.5;">Shopping Online<br>Just Got Personal</p>
					<p> <!-- <img width="70" src="/images/play.png" style="cursor:pointer;"> --> </p>
					<p style="font-size: 2.9em;line-height: 1.5;padding-top: 75px;">
						Cut Through the Clutter of Fashion<br>
						Discover what suits you, why it works and<br>
						how to style it to look your best.
					</p>
				</div>
				
			</div>
			
		</div>
		
		<section class="role-element container wid60 preta-tooltip" id="the-product">
			
			<div class="wid100">
			
				<script type="text/javascript">
					
					var default_values = [1,1,1,1,1,1,1, 1,1,1,1,1,1,1,1,1,1,1,1];
					
					$(function(){
						var height = [ "Short", "Med-short", "Medium", "Med-tall", "Tall" ];
						var size = [ "Allegra", "Natalie", "Halle","Kim", "Queen", "Amber","Rebel"];
						var age = [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "66 - 75","76 >" ];
						var bodyshape = [ "Hourglass", "Inverted Triangle", "Triangle", "Rectangle", "Oval", "Diamond"];
						var bodyratio = [ "Balanced Body","Long Legged Short Torso", "Short Legged Long Torso" ];
						var bust = [ "< A", "B", "C", "D", "DD", "E >" ];
						var build = [ "Small", "Medium", "Large" ];

						//Additional jun 11
						var necklength 		= [ "Short", "Med-short", "Medium", "Med-long", "Long" ];
						var shoulders 		= [ "Sloping", "Tapered", "Square" ];
						var faceshape 		= [ "Oblong", "Rectangle", "Round", "Square", "Inverted triangle", "Heart", "Diamond", "Pear", "Triangle", "Oval" ];
						
						var neck 			= [ "Thin", "Average", "Wide", "Double Chin", "No Definition" ];
						var back 			= [ "Dowagers Hump","Sway Back"];
						var upperarms 		= [ "Too thin", "Too heavy", "Aged/Untoned" ];
						
						var midriff 		= [ "Moderate Roll", "Large roll" ];
						
						var stomach 		= [ "Post Baby", "Moderate Tummy", "Too Soft", "Large Tummy" ];
						var bottom 			= [ "Too Large", "Too Flat" ];
						var innerthighs 	= [ "Rub Together", "Bowed Legs" ];
						var outerthighs 	= [ "Too  Protruding", "Saddlebags" ]
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
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-33.png" /></div><ul><li>You appear to be the same width across your bustline as you are across the widest part of your hipline</li><li>Your waist is well defined and your narrowest area</li><li>NOTE: You can be any weight and be an hourglass figure.</li></ul></div>',
						'<div id="talkbubble" class="doubleline"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-34.png" /></div><ul><li>You are larger above the waist than below</li><li>You are widest across your bustline</li><li>Your armpits are wider than the widest part of your hipline (when viewed from the front).</li><li>You are smaller below waist than below</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-36.png" /></div><ul><li> You are larger below the waist than above</li><li>You have a well-defined waist</li><li>You have a narrow lower rib cage</li><li>Your armpits are narrower than the widest part of your hipline (when viewed from the front).</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-35.png" /></div><ul><li>Your bust, waist and hipline are close to or the same in width.</li><li>Your waist is undefined</li><li>Your have a wide rib cage.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-37.png" /></div><ul><li>You consider yourself to be in the substantially overweight range</li><li>Your widest area is between your bust and hipline</li><li>You have a full stomach that sits low around the hips</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyshape/features-38.png" /></div><ul><li>You consider yourself to be in the substantially overweight range</li><li>Your widest area is between your bust and hipline</li><li>You have a full, high stomach that starts just under your bustline.</li><li>Sometimes others may mistake you for being pregnant.</li></ul></div>' 
						];
						var bodyratioimage = [ 
            '<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyratio/featues-10.png" /></div><ul><li>Your torso is equal in length to your legs.</li><li>The fullest part of your bottom protrudes at approximately half your height.</li><li>Weight gain is first experienced between your bust and hipline.</li><li>Bend your elbow 90% to the floor: you are a Balanced Body if you bent elbow in at the same position as your waist.</li><li>The most common body ratio of Caucasian women.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyratio/featues-09.png" /></div><ul><li>Your legs are longer than your body.</li><li>Your torso is short and your waistline feels/is high.</li><li>Weight gain is first experienced at your midriff, stomach and high on the back of your hips.</li><li>Bend your elbow 90% to the floor: you are a Long Legged and Short Bodied if your waist is above your bent elbow.</li><li>The most common body ratio of African American women.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/bodyratio/featues-11.png" /></div><ul><li>You have a long body and short legs.</li><li>Weight gain is first experienced at your bottom, hips and thighs.</li><li>You have a low waistline.</li><li>Bend your elbow 90% to the floor: you are a Short Legged and Long Bodied if your waist sits below your bent elbow.</li><li>The most common body ratio of Asian women.</li></ul></div>',
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
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/build_2.png" /></div><ul><li>Your frame is between small and large</li><li>The most common build - select this one if you are unsure.</li></ul></div>',
						'<div id="talkbubble" class="med-width"><div class="slider-image"><img src="/images/profileSetup/build/build_3.png" /></div><ul><li>Your frame is large.</li><li>You are likely to be tall and large boned. </li></ul></div>' 
						];
						


						//Additional jun 11

						var necklengthimage = 
						[ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/necklength/featues-25.png" /></div><ul><li>Your neck is short.</li><li>When carrying extra weight you may have double chins.</li><li>You look best with hair that is at or above your jawline.</li><li>Necklines with some length such as V and scoop look best on you.</li><li>High necklines such as turtleneck sweaters and shirts with a collar stand can make you appear neckless.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/necklength/featues-26.png" /></div><ul><li>Your neck is on the short side of average.</li><li>High necklines such as turtlenecks and long drop earrings can be difficult to wear.</li><li>Necklines with some length such as V\'s and scoop look best on you.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/necklength/featues-23.png" /></div><ul><li>Your neck is just like that of most people you meet.</li><li>You have had no reason to question if it is shorter or longer than average.</li></ul></div></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/necklength/featues-22.png" /></div><ul><li>Your neck is on the long side of average.</li><li>Wearing long drop earrings and high neck shirts and sweaters is no problem for you.</li><li>Plunging and very deep necklines do not look as good on you as those which are medium depth.</div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/necklength/featues-24.png" /></div><ul><li>You are aware that you have a long neck.</li><li>If you are underweight your neck may appear very thin.</li><li>You look best with long hair i.e. shoulder length or longer.</li><li>Your neck length allows you to wear extra-long earrings without them dangling on your shoulders.</li><li>Plunging necklines look good only when your hair is worn down (shoulder length and longer).</li><li>Necklines that sit at the base of your neck can also be unflattering.</li></ul></div>' 
						];
						
						var shouldersimage = [ 
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-29.png" /></div><ul><li>Your shoulders have a definite slope from the base of your neck to the tip of your shoulder.</li> <li>Shoulder straps will tend to slip off your shoulders.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-28.png" /></div><ul><li>Your shoulders have a slight slope.</li><li>The most common shoulder - select this one if you are unsure.</li></ul></div>',
						'<div id="talkbubble"><div class="slider-image"><img src="/images/profileSetup/shoulder/featues-27.png" /></div><ul><li>Your shoulders are broad and square with almost no slope.</li></ul></div>' 
						];
						
						var faceshapeimage = [ 
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-14.png" /></div><ul><li>Your face is definitely longer than it is wide.</li><li>Your cheekbones and jaw line are as wide as each other</li><li>Your jawline and chin is slightly rounded.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/rectangle.png" /></div><ul><li>Your face is definitely longer than it is wide</li><li>Your cheekbones and jaw line are as wide as each other</li><li>The sides of your face from eyeline to jaw bone are straight</li><li>Your jawline is square</li><li>Your chin is shallow and flat.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-18.png" /></div><ul><li>Your face is almost as wide as it is long</li><li>Your chin and cheeks are round and full</li><li>Your cheekbones are widest part of your face</li><li>Your forehead is close to, or as wide as your jawline</li><li>If you lose weight your face shape may look more Square than Round</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-12.png" /></div><ul><li>Your face is almost as wide as it is long</li><li>The sides of your face from eyeline to jawline are straight</li><li>Your forehead is close to, or as wide as your jawline</li><li>If you gain weight your face shape may become Round.</li></ul></div>',
						'<div id="talkbubble" class="doubleline talkbubbleMedLabel" ><div class="slider-image" style="top:-325px;"><img src="/images/profileSetup/faceshape/featues-19.png"/></div><ul><li>Above your cheekbones is the widest part of your face</li><li>Your have jawline is narrower than your forehead</li><li>You have a pointed to gently rounded chin.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-15.png" /></div><ul><li>Your forehead is the widest part of your face</li><li>Your have jawline is narrower than your forehead</li><li>You have a pointed to gently rounded chin</li><li>You have a widow\'s peak (pointed hairline at centre of forehead).</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-20.png" /></div><ul><li>Your chin is narrow and pointed.</li><li>Your cheekbones are high and prominent.</li><li>Your face is widest at the cheekbones.</li><li>Your hairline and/or forehead angles inward..</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/featues-17.png" /></div><ul><li>Your jawline is the widest part of your face</li><li>You have full, round cheeks</li><li>Your forehead is the narrowest part of your face.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/triangle.png" /></div><ul><li>Your face is a little longer than it is wide</li><li>Your forehead is the narrowest part of your face</li><li>Your have jawline is the widest region of your face</li><li>You have a broad square jawline</li><li>Your chin is shallow and flat.</li></ul></div>',
						'<div id="talkbubble" class="talkbubbleMedLabel"><div class="slider-image"><img src="/images/profileSetup/faceshape/oval.png" /></div><ul><li>Your face is an inverted egg or oval shape</li><li>You have a gently rounded chin.</li><li>Your face is slightly longer than it is wide</li><li>Your face is equal in length from hairline to browline, browline to nose tip, nose tip to chin tip</li><li>Your eye, nose and mouth are all well scaled to the size of your face i.e. no feature is extra large or small</li><li>Your eye, nose and mouth are all well-spaced within your face i.e. your eyes are not close or wide set</li></ul></div>'
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
							//console.log(default_values);
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




						//Additional jun 11

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
							"minBust" : input_minBust,

							//Additional jun 11
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

						//save profile to global
						$.post( "/user/homepage-user-profile.html", { uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
							//
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
					
					<div class="homeprofile-head" id="profile">
					<a href="#profile">	<img src="/images/newhomedown.png" class="noneArea noneLiner "></a>
						
						<p class="i profile-big-title" style="font-size:1.8vw;">Start by selecting your <strong>body features</strong></p>
						
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
					
					
					
					<!-- Additional jun 11 -->

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
			<br>
		</section>
		
		 <section class="wid100 bkYellowGrey home-product-list-custom-profile" id="home-product-custom-list">
			<!--
			<div class="homeprofile-head">
				<img src="/images/newhomedown.png" class="noneArea noneLiner">
				<p class="i profile-big-title homepage-titles">Here's just a few <strong>garments we've found for you</strong></p>
			</div>
			<style type="text/css">
				.garments:after { display: none;}
			</style>
			<div id="homepage-slider">
				<div class="garments turnOffPlaceHolderGarment"></div>
				<div class="clear"></div>
			</div>
			
			-->
			


			<div class="clear"></div>
			<div class="homeprofile-head newSignupJune">
				<div class="innerSignupForm container wid100" style="max-width: 700px;">
				    <h1 style="padding: 5px; text-align:center;"><i>Save your details and <strong>Create Your Mall</strong></i></h1>
					
					<div id="error-register"></div>
					
					<form name="registerNewUser" action="" method="post" id="menu_mall_register">
				        <div>
							<input type="text" placeholder="First Name*" name="fname" id="menu_mall_register_fname" required/>
							<input type="text" placeholder="Last Name*" name="lname" id="menu_mall_register_lname" required/>
					    </div>
				        <div>
							<input type="email" placeholder="Email*" name="email" id="menu_mall_register_email" required/>
							<label style="width: 45%; display: inline-block;">
				      			<select name="category" class="menu_mall_register_category bordernormal" id="menu_mall_register_category">
				      			<?php foreach ($countries as $country) { ?>
				      				<option value="<?php echo $country['country_id'] ?>"<?php if( $country['country_id'] == 13 ){ ?> selected="selected"<?php } ?>><?php echo $country['country'] ?></option>
				      			<?php } ?>
				      			
				      			</select>
				      		</label>
					    </div>
				        <div>
							<input type="password" placeholder="Password*" name="password" id="menu_mall_register_password" required />
							<input type="password" placeholder="Confirm Password*" name="cpass" id="menu_mall_register_rpassword" required />
					    </div>
				      	
				      	<div class="">
				      	    <div style="width: 47%; display: inline-block;">
				      	    	<div class="fbloginbutton mousehand" id="fbloginbuttonIcon" onclick="fb_login();" style="width: 160px;display: inline-block;">Signup with Facebook</div>
				      	    </div>
							
				      		<label style="  width: 50%; display: inline-block;">Take me to my best: 
				      			<select name="category" class="menu_mall_register_category bordernormal" id="menu_mall_register_category" style=" width: 48%;">
				      			<?php foreach ($categories as $value) { ?>
				      				<option value="<?php echo $value['category_id'] ?>" <?php if( $value['category_id'] == 48 ){ ?> selected="selected"<?php } ?>><?php echo $value['name'] ?></option>
				      			<?php } ?>
				      			
				      			</select>
				      		</label>
				    	</div>

				    	<div class="">
				    		<div style="width: 55%;display: inline-block;"></div>
							<input type="submit" name="starttrial" value="Save and Open Mall" class="" id="register-submit">
				    	</div>

				      	<div class="clear"></div>

				    </form>
				    <!-- <div style="text-align:center">Trial Expires in 30 days.</div> -->
			    </div>
				
				<?php /* ?>
				<p class="homeprofile-bodytext" style=" font-style: italic; font-size: 1.8vw;"><br/>What's<strong > Next?</strong></p>
				<div class="mall-links">	
					<div class="mall-link1" >
						<p class="homeprofile-bodytext" style="font-style: italic;font-weight:bold;  font-size: 26px;">I'm on a roll show me </p>
						<a class="bkpinkycolor home-vistmallbtn container noneLiner" 
						onClick="ga('send', 'event', { eventCategory: 'button-morequestions', eventAction: 'click', eventLabel: 'button more questions', eventValue: 1});"
						id="more-questions" href="/your-mall.html" 
						onmouseover="document.getElementById('tooltip1').style.display = 'block';" 
						onmouseout="document.getElementById('tooltip1').style.display = 'none';">
							MORE QUESTIONS <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
						</a>
						<div class="mall-link-tooltip" id="tooltip1">Just a few more questions will change the accuracy of your mall from good to great.</div>
					</div>
					<div class="mall-link2">
						<p class="homeprofile-bodytext" style="font-style: italic;font-weight:bold;  font-size: 26px;">I'm too excited to wait </p>
						<button class="bkpinkycolor home-vistmallbtn container noneLiner"  id="signup-popup">
							LET ME IN <span class="quickbelowicon unicode-icon right">&#9658; &nbsp;</span>
						</button>
						
					</div>
				</div>

				<?php */ ?>

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
			<li><a target="_blank" href="https://chrome.google.com/webstore/detail/select-image-for-genie-se/ggciakfahmdidbpcccinmldogcjkcmhd">STYLE GENIE EXTENSION</a>|</li>
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


<div class="modal"></div>
<div class="popup_modal"></div>
<div class="brandnewmodal"></div>
<div class="popup-box"></div>

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

 <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

<div id="fb-root"></div>
<script type='text/javascript'>

window.fbAsyncInit = function() {
    FB.init({
      appId      : '416574138523788',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.3'
    });
	
};

function fb_login(){
	$( "#error-login" ).html(" ");
    FB.login(function(response) {

        if (response.status === 'connected') {
            FB.api('/me', function(response) {
               register_with_facebook( response.id, response.email, response.first_name, response.last_name, response.verified );
            });

        } else {
            $( "#error-login" ).html("Facebook login Cancelled.");
        }
    }, {
        scope: 'publish_stream,email'
    });
}

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

</script>

 
</body>
</html>
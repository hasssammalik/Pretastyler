<?php
$star_result  = array('Avoid', 'Avoid', 'Risky', 'Maybe', 'Good', 'Great' );

if ( !empty($garment['score']) ){
	$score_percent = 1;
	if ($garment['score'] >= 8.91 ){
		$score_percent = 99;
	} else if ($garment['score'] > 0.9 ){
		$score_percent = round(( ( 98 * $garment['score'] ) - 80.19 ) / 8.01 );
	} else {
		$score_percent = 1;
	}
	$score_percent .= '%';

	if ($garment['score']>7.3){
		$score = 5;
		} else if ($garment['score']>6){
		$score = 4;
		} else if ($garment['score']>5){
		$score = 3;
		} else if ($garment['score']>3){
		$score = 2;
		} else {
		$score = 1;
	}
}
?>

<div class="mainContent ">
	<div class="productDisplay">
		<?php 
		if ($this->flexi_auth->is_logged_in()) {
			$imageclass="cross-to-mall"; 
		} else {
			$imageclass="cross-to-home";
		} ?>
		<div class="cross">
			<div class="<?php echo $imageclass;?> cross-image"><img src="/images/pink_button-05.png" alt /></div>
		</div>
		<?php if (!$this->flexi_auth->is_logged_in()) { ?>
			<div class="notLoggedInHeader bkpinkycolor">
				<p>
				<?php if( $garment['outdated'] == 1 ){ ?>
					OH, BOO! LOOKS LIKE IT'S SOLD OUT. DONT'T WORRY, WE CAN FIND YOU SOMETHING EVEN BETTER
				<?php } else { ?>
					Leave the hard work to us; We’ll find the style that suit your shape
				<?php } ?>
				</p>
			</div>
		<?php } ?>

		<div id="product" class="productWrap <?php if ($this->flexi_auth->is_logged_in() ) { ?> loggedInSmallDetails <?php } ?>">
			
			<?php if ($this->flexi_auth->is_logged_in()) { ?>
				
				<div class="panel2 newpanelDesign" id="ourAdviceLog">
					
					<div class="panelheaderheightfixer">
						<div class="panelNewHeader bkgrey" style="margin-bottom:0px;line-height: 47px;"><?php if(isset($score)&& $score>2) {?>WHY IT WORKS FOR YOU<?php }else{echo 'WHY IT DOES NOT WORK FOR YOU?'; }?></div>
						<div style="background:url('/images/bodyback.png');background-position: 4% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
					</div>
					<div class="panelContent panelcontentFirst">
						<div class="section">
							<div class="title title-nopadding">
								<table>
									<?php if( !empty($advise) && is_array($advise) ) { ?>
									<tr>
										<th class="th1">Area</th>
										<th class="th2" style="padding-right: 40px;">Style</th>
										<th class="th3">Result</th>
									</tr>
									<?php } ?>
								</table>
							</div>
							<div class="scrollable">
								<table>
									<?php if( !empty($advise) && is_array($advise) ) { foreach ($advise as $row){ ?>
										<tr>
											<td class="th1"><strong><?php print $row['area']?></strong></td>
											<td class="th2"><?php print $row['style_item']?></td>
											<td class="th3">
											    <span class="starsWrap rating star<?php print $row['result']?>Rate mousehand" style="background:initial;">
													<?php print $star_result[$row['result']] ?>
													
													<?php
													if ($this->flexi_auth->in_group('Administrators')){
														print '('.$row['score'].')';
													} ?>
												</span>
											</td>
										</tr>
										<?php if (isset($row['reason'])) {?>
											<tr class="description">
												<td colspan="3">
													<div><strong>Why: </strong><?php print $row['reason'] ?></div>
												</td>
											</tr>
										<?php }} 
										if ($this->flexi_auth->in_group('Administrators')){
											$scores = array();
											foreach ($advise as $row){
												$scores[] = $row['score'];
											}
										?>
										<tr>
											<td colspan="3">
												<div><?php print '(Average['.(array_sum($scores) / count($scores)).'] + Min['.min($scores).'])/2 = '.$garment['score']; ?></div>
												<div>excelent > 7.3</div>
												<div>good > 6</div>
												<div>ok > 5</div>
												<div>maybe > 3</div>
												<div>avoid <= 3</div>
												</td>
										</tr>
									<?php } } else { ?>
											<tr>
											<td colspan="3">
												<div>Please complete your profile to see the result.</div>
											</td>
											</tr>
									<?php  } ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
					
									
					<div class="galleryAreaWrap notLoggedIn newpanelDesign">
						
						<div class="panelheaderheightfixer">
							<div class="panelNewHeader bkpinkycolor" style="margin-bottom:0px;">
								<?php if( !empty($score)){?>
									<?php if( $score == 5 ){?>
										<span class="pinkyheading">BOOM, YOU HAVE A WINNER</span>
										<span class="panelSmalldesc">YOU'RE GOING TO TURN HEADS AND BREAK HEARTS IN THIS LITTLE NUMBER</span>
										<?php } else if( $score == 4 ) { ?>
										<span class="pinkyheading">LOOKING GOOD, GORGEOUS</span>
										<span class="panelSmalldesc">FIGURE FLATTERING AND FABULOUS ALL AT THE SAME TIME</span>
										<?php } else if( $score == 3 ) { ?>
										<span class="pinkyheading">THIS ONE COULD GO EITHER WAY</span>
										<span class="panelSmalldesc">ITS'S UP TO YOU, DO YOU LOVE IT ENOUGH TO TAKE THE CHANCE?</span>
										<?php } else if( $score == 2 ) { ?>
										<span class="pinkyheading">MMM, BIT OF A RISKY PURCHASE</span>
										<span class="panelSmalldesc">WHY TAKE THE RISK ON THIS ONE WHEN YOU CAN FIND SOMETHING BETTER</span>
										<?php } else if( $score == 1 ) { ?>
										<span class="pinkyheading">DERP, YOU DESERVE BETTER THAN THIS</span>
										<span class="panelSmalldesc">YOU CAN LOOK SO MUCH BETTER. GIVE THIS ONE A MISS</span>
									<?php } } else { ?>
									
										<span class="pinkyheading notLoggedInHeaderSecond">
											<?php if( $garment['outdated'] == 1 ) { ?>
												YOU WANT IT &bull; WE'LL FIND IT &bull; FAST
											<?php } else { ?>
												SURE, IT'S NICE, BUT WILL IT SUIT YOU?
											<?php } ?>
										</span>
									
								<?php } ?>
							</div>
							
						</div>
						
						<div class="galleryArea relative itemidentification panelcontentSecond garments_in_product" garment_id="<?php print ( !empty( $garment['garment_id'] ) ? $garment['garment_id'] : '' ) ?>">
							
							<div class="productFirstColumn product-inside-columns">
								
								<div class="">
									
									<?php if ($this->flexi_auth->is_logged_in()) { ?>
										<div class="productRate">
											<?php echo $score_percent; ?>
										</div>
										<?php } else { ?>
										
										<div class="circleBase waitingforYou relative"> 
											<div class="inside">WAITING<br>FOR YOU</div>
										</div>
										
									<?php } ?>
									
									
								</div>
								<?php if (!empty($garment['extra_image1_path']) || !empty($garment['extra_image2_path']) ) {?>
									<div class="thumbsWrap">
										<ul class="items">
											<li style="display: none;" class="firstThumbproduct"><a href="#" data-index="1"><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
											<?php if (!empty($garment['extra_image1_path']) ) {?>
												<li><a href="#" data-index="2"><img src="<?php print '/images/garment/'.$garment['extra_image1_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
											<?php } ?>
											<?php if (!empty($garment['extra_image2_path'])) {?>
												<li><a href="#" data-index="3"><img src="<?php print '/images/garment/'.$garment['extra_image2_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</div>

							<div class="productSecondColumn product-inside-columns">
								
								<div class="sliderWrap">
									<ul class="items">
										<li>
											<div class="img">
												<span><img src="<?php print '/images/garment/'.$garment['image_path'] ?>"  data-zoom-image="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name']?>"></span>
											</div>
										</li>
										<?php if (!empty($garment['extra_image1_path'])) {?>
											<li>
												<div class="img">
													<span><img src="<?php print '/images/garment/'.$garment['extra_image1_path'] ?>"  data-zoom-image="<?php print '/images/garment/'.$garment['extra_image1_path'] ?>" alt="<?php print $garment['name']?>"></span>
												</div>
											</li>
										<?php } ?>
										<?php if (!empty($garment['extra_image2_path'])) {?>
											<li>
												<div class="img">
													<span><img src="<?php print '/images/garment/'.$garment['extra_image2_path'] ?>"  data-zoom-image="<?php print '/images/garment/'.$garment['extra_image2_path'] ?>" alt="<?php print $garment['name']?>"></span>
												</div>
											</li>
										<?php } ?>
									</ul>
									
								</div>
							</div>
							
							<div class="productThirdColumn product-inside-columns">
								
								<div class="productnamesnap b">GARMENT SNAPSHOT</div>
								
								<div class="productnewdetails">
									
									<dl>
										<dt>Brand:</dt>
										<dd>
											<a href="/mall/brand/<?php print strtolower(url_title($garment['brand'])) ?>.html" target="_blank">
												<?php if( file_exists( FCPATH . 'images/brands/'.strtolower(url_title($garment["brand"])).'.jpg' )) { ?>
													<img src="/images/brands/<?php print strtolower(url_title($garment['brand'])) ?>.jpg" height="25" alt="<?php print $garment['brand']?>" title="<?php print $garment['brand']?>">
												<?php } else { print $garment['brand']; } ?>
											</a>
										</dd>
										<dt>Store:</dt>
										<dd><a href="<?php 
								if (strpos($garment['url'],'theiconic.com.au') !== false) {
									print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
								}
								print $garment['url']; 
							?>" target="_blank"><?php print $garment['store']?></a></dd>
										
										<dt>Description:</dt>
										
										<?php if (!empty($garment['description'])) { ?>
											<p class="bkwhite descriptionProduct"><?php print nl2br($garment['description'])?></p>
											<?php } else {?>
											<p class="bkwhite descriptionProduct"><?php print $garment['name']?></p>
										<?php }  ?>
										
										<dt>Price:</dt>
										<dd><?php 
											switch ($garment['price_range']) {
												case 1: print "$0-100";break;
												case 2: print "$100-199";break;
												case 3: print "$200-499";break;
												case 4: print "$500-999";break;
												default: print "$1000+";
											}
										?></dd>
										
										<dt>Sizes <?php if ($size) {print '('.$size[0]['region'].')';} ?>:</dt><br><br>
										<dd class="small">
											<ul>
												<?php if ($size) {
													foreach ($size as $row) { ?>
													<li><span><?php print $row['size']; ?></span></li>
												<?php }} else { print '<li><span>N/A</span></li>';} ?>
											</ul>
										</dd>
										<br><br>
										<dt>Colors:</dt>
										<dd>
											<ul>
												<?php foreach ($colour as $row){ ?>
													<li title="<?php print $row['name'] ?>"><img src="/images/colours/<?php print $row['image_path'] ?>" width="25" height="25" alt="<?php print $row['name'] ?>"></li>
												<?php }?>
											</ul>
										</dd>							
									</dl>
									
								</div>
								
								<div class="actionButtons">
									<ul>
										<li class=""><a href="<?php 
								if (strpos($garment['url'],'theiconic.com.au') !== false) {
									print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
								}
								print $garment['url']; 
							?>" class="button buy" target="_blank">BUY / LEARN MORE</a></li>
										<li class=""><a href="/mall/similar/<?php print $garment['garment_id'].'-'.url_title($garment['name']).'.html' ?>" class="button other" target="_blank">SIMILAR GARMENTS</a></li>
										<li class="">
											<a class="mousehand button other <?php
											if ($this->flexi_auth->is_logged_in()){
												?>favorite-click-product-page <?php
													if( !empty($garment['favorite'])) { if( $garment['favorite'] == 1){ print 'bkpinkycolor'; $faved = 1; } } } else{ ?> login_alert_user<?php } ?>">
											<?php if( !empty($faved)){
													echo 'ADDED TO WISHLIST';
												} else {
													echo 'ADD TO WISHLIST';
												}
											?>
											</a>
										</li>
										</ul>
									</div>
									<ul class="bottomOptions">
									
										<li>
											<a href="" class="fb" id="fb_share"><i class="icon-facebook"></i></a>
										</li>
										
										<li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank" class="pi"><i class="icon-pinterest"></i></a></li>
										
										<li><a href="" class="tweet" id="t_share" target=""><i class="icon-twitter"></i></a></li>
										
										<li><a href="<?php print current_url() ?>" class="gplus" target="_blank" ><i class="icon-googleplus"></i></a></li>
										
									</ul>
										
									</div>
									<div class="clear"></div>

									<?php if( $garment['outdated'] == 1 ){ ?>
										<div class="modal_for_outdated_garment">
											<div class="modal_outdated_unavailable">UNAVAILABLE</div>
										</div>
									<?php } ?>

								</div>
							</div>
							
							
							<?php if ($this->flexi_auth->is_logged_in()) { ?>
								
								<div class="panel2 newpanelDesign" id="styingRecon">
									
									<div class="panelheaderheightfixer">
										<div class="panelNewHeader bkgrey" style="margin-bottom:0px;  line-height: 47px;">HOW TO LOOK YOUR BEST</div>
										<div style="background:url('/images/bodyback.png');background-position: 94% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
									</div>
									<div class="panelContent panelcontentThird">
										
										<?php if( !empty($advise) && is_array($advise) ) {  foreach ($advise as $row){ if ($row['comment']){ ?>
												<p class="left recommendCommenDes">
												<strong><?php print $row['area'] ?>:</strong>
												<span class="commentSpliter"></span>
												<!-- <span class="commentSpliter"></span> -->
												<!-- <span class="bold-dash">-&nbsp;</span>  -->
												<!-- <?php // print implode('<span class="commentSpliter"></span><span class="bold-dash" style="float:left;">-&nbsp;</span> ', $row['comment']) ?> -->
												<?php foreach($row['comment'] as $com){ ?>
												
												<span>
													<span class="bold-dash" style="float:left;width:9%;font-size:37px;line-height:10px;padding-top:2px;">&bull; &nbsp; &nbsp; &nbsp;</span>
													<span style="float:left;width:91%;padding-bottom: 5px;"><?php echo $com; ?> </span>
												</span>
												<span class="commentSpliter"></span>
												
												 <?php } ?>
												
										</p>
										<?php }} } else { ?>
												
												<div>Please complete your profile to see the result.</div>
												
										<?php } ?>
								</div>
							</div>
							<?php } else { ?>
							<div class="panel2 newpanelDesign forceDivTwoColumn" id="ourAdvice">
								<div class="panelheaderheightfixer">
									<div class="panelNewHeader notLoggedIn_panelHeader">
										Select your features and we will start finding items just like the one you want plus lots of others and place them in your private fashion mall.
									</div>
									
								</div>
								
								<div class="panelContent panelproductpage">
									
										<section class="productpage container preta-tooltip" id="the-product" style="margin-right: 50px;">
			
											<div class="wid100">
											
												<script type="text/javascript">
													
													var default_values = [1,1,1,1,1,1,1];
													
													$(function(){
														var height = [ "Short", "Med-short", "Medium", "Med-tall", "Tall" ];
														var size = [ "Allegra", "Natalie", "Halle","Kim", "Queen", "Amber","Rebel"];
														var age = [ "< 30", "31 -45 ", "46 - 55", "56 - 65", "66 - 75","76 >" ];
														var bodyshape = [ "Hourglass", "Inverted Triangle", "Triangle", "Rectangle", "Oval", "Diamond"];
														var bodyratio = [ "Balanced Body","Long Legged Short Torso", "Short Legged Long Torso" ];
														var bust = [ "< A", "B", "C", "D", "DD", "E >" ];
														var build = [ "Small", "Medium", "Large" ];
														
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
															"minBust" : input_minBust
														};

														//save profile to global
														$.post( "/user/homepage-user-profile.html", { uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
															//
														});


													}

													function select_garments_spec() {
														
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
															"minBust" : input_minBust
														};

														$("body").addClass("loading");

														$.post( "/mall/garment-by-profile.html", {offset: 0, limit: 6, uservalue: requestvalues, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
															
															$( ".garments_in_product" ).html( data );

															$(".galleryAreaWrap .galleryArea").css("background-color", "#E5E5E5");

															$("body").removeClass("loading");
														});
													}


													$(function(){
														
														$(".button_callgarment").on("click", function() {
															select_garments_spec();
														});

													});
													
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
													
												</div> <!-- profileWrap -->
												<div class="clear"></div>
											</div> <!-- wid100 -->
											<div class="clear"></div>
											
										</section> 
									</div>
									<div class="clear"></div>
									<br>
									<div class="product_page_slider_below_btn">
										<div class="button_callgarment product_page_slider_below_btn_one bkpinkycolor">SEE ALL YOUR STYLES</div> 
										<div class="product_page_slider_below_btn_two"><a href="/our-story.html">WHY?</a></div>
										<div class="product_page_slider_below_btn_three"><a href="/our-story.html">WHO IS PRETASTYLER?</a></div>
									</div>
								</div>
							<?php } ?>
							
							<br>
							
							<div class="panel2 newpanelDesign" id="similarItems">
								<div class="panelHeader tab-look-header">Similar Items that suit you</div>
								<div class="panelContent tab-look-body">
									<div class="sliderWrap">
										<div class="garments">
										</div>
										<script>
												$.post( "/mall/garments.html", {offset: 0, limit: 21, similar: <?php print $garment['garment_id']?>, pas_secret_name:$("input[name=pas_secret_name]").val()}, function( data ) {
													$( ".garments" ).html( data );
													if($('#similarItems').length && $('#similarItems .sliderWrap').is(':visible')){
														$('#similarItems .sliderWrap').initSimilarCarousel();
													}
												});
										</script>
										<a href="#" class="prevNew"><span><i class="icon-arrow-left"></i></span></a>
										<a href="#" class="nextNew"><span><i class="icon-arrow-right"></i></span></a>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
					<script type="text/javascript">
						icon_functions();
					</script>
			
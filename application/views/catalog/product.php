<div class="mainContent ">
	<div class="productDisplay">
		<div class="cross"><div class="cross-image"><img src="/images/pink_button-05.png" alt /></div></div>
		<div id="product" class="productWrap <?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers'))) { ?> loggedInSmallDetails <?php } ?>">
			
			<?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers'))) { ?>
				
				<?php 
					if ($garment['score']){
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
				
				<div class="panel2 newpanelDesign" id="ourAdviceLog">
					
					<div class="panelheaderheightfixer">
						<div class="panelNewHeader bkgrey" style="margin-bottom:0px;line-height: 47px;">WHY IT WORKS FOR YOU</div>
						<div style="background:url('/images/bodyback.png');background-position: 4% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
					</div>
					<div class="panelContent panelcontentFirst">
						<div class="section">
							<div class="title title-nopadding">
								<table>
									<tr>
										<th class="th1">Area</th>
										<th class="th2" style="
										padding-right: 40px;
										">Style</th>
										<th class="th3">Result</th>
									</tr>
								</table>
							</div>
							<div class="scrollable">
								<table>
									<?php foreach ($advise as $row){ ?>
										<tr>
											<td class="th1"><strong><?php print $row['area']?></strong></td>
											<td class="th2"><?php print $row['style_item']?></td>
											<td class="th3"><span class="starsWrap rating star<?php print $row['result']?>Rate" style="background:initial;"><?php print $row['result'] ?><i class="icon-star"></i><?php
												if ($this->flexi_auth->in_group('Administrators')){
													print '('.$row['score'].')';
												}
												
												if (isset($row['reason'])) {
												?><a href="#"><i class="icon-triangle"></i></a><?php }?></span></td>
										</tr>
										<?php if (isset($row['reason'])) {?>
											<tr class="description">
												<td colspan="3">
													<div><strong>Why it's an avoid: </strong><?php print $row['reason'] ?></div>
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
											<?php }?>
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
										<span class="panelSmalldesc">YOU'RE GOING TO HEADS AND BREAK HEARTS IN THIS LITTLE NUMBER</span>
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
									<span class="pinkyheading">SURE, IT'S NICE, BUT WILL IT SUIT YOU?</span>
									<span class="panelSmalldesc">WHAT IF WE COULD SHOW YOU A WAY TO MAKE SURE IT DOES?</span>
								<?php } ?>
							</div>
							<div style="background:url('/images/pinkback.png');background-position: 4% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
						</div>
						
						<div class="galleryArea itemidentification panelcontentSecond" garment_id="<?php print ( !empty( $garment['garment_id'] ) ? $garment['garment_id'] : '' ) ?>">
							
							<div class="productFirstColumn product-inside-columns">
								
								<div class="">
									
									<?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers'))) { ?>
										<div class="productRate">
											<?php echo $score; ?>
											<i class="icon-star"></i>
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
											<?php /* <li><a href="#" data-index="1"><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name']?>"></a></li>*/?>
											<?php if (!empty($garment['extra_image1_path']) ) {?>
												<li><a href="#" data-index="2"><img src="<?php print '/images/garment/'.$garment['extra_image1_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
											<?php } ?>
											<?php if (!empty($garment['extra_image2_path'])) {?>
												<li><a href="#" data-index="3"><img src="<?php print '/images/garment/'.$garment['extra_image2_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
								
								<ul class="bottomOptions">
									
									<li>
										<a href="https://www.facebook.com/sharer.php?u=<?php print current_url() ?>" onClick="return fbs_click(500,400)" target="_blank" class="fb"><i class="icon-facebook"></i></a>
									</li>
									
									<li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank" class="pi"><i class="icon-pinterest"></i></a></li>
									
									<li><a href="<?php print current_url() ?>" class="tweet" target="_blank" ><i class="icon-twitter"></i></a></li>
									
									<li><a href="<?php print current_url() ?>" class="gplus" target="_blank" ><i class="icon-googleplus"></i></a></li>
									
								</ul>
								
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
										<li class=""><a href="/mall/similar/<?php print $garment['garment_id'] . '-'. $garment['name'] ?>" class="button other" target="_blank">SIMILAR GARMENTS</a></li>
										<li class=""><a class="mousehand button other <?php if ($this->flexi_auth->is_logged_in()){?>favorite-click <?php } else{ ?> login_alert_user<?php } ?>" target="_blank">ADD TO WISHLIST</a></li>
										<li class=""><a class="mousehand button other <?php if ($this->flexi_auth->is_logged_in()){?>wardrobe-click<?php } else{ ?> login_alert_user<?php } ?>" target="_blank">ADD TO WARDROBE</a></li>
										<ul>
										</div>
										
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							
							<?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers'))) { ?>
								
								<div class="panel2 newpanelDesign" id="styingRecon">
									
									<div class="panelheaderheightfixer">
										<div class="panelNewHeader bkgrey" style="margin-bottom:0px;  line-height: 47px;">HOW TO LOOK YOUR BEST</div>
										<div style="background:url('/images/bodyback.png');background-position: 94% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
									</div>
									<div class="panelContent panelcontentThird">
										
										<?php foreach ($advise as $row){ if ($row['comment']){ ?>
												<p class="left recommendCommenDes">
												<strong><?php print $row['area'] ?>:</strong>
												<span class="commentSpliter"></span>
												<!-- <span class="commentSpliter"></span> -->
												<!-- <span class="bold-dash">-&nbsp;</span>  -->
												<!-- <?php // print implode('<span class="commentSpliter"></span><span class="bold-dash" style="float:left;">-&nbsp;</span> ', $row['comment']) ?> -->
												<?php foreach($row['comment'] as $com){ ?>
												
												<span>
													<span class="bold-dash" style="float:left;width:9%;font-size:37px; line-height:16px;">&bull; &nbsp; &nbsp; &nbsp;</span>
													<span style="float:left;width:91%;padding-bottom: 5px;"><?php echo $com; ?> </span>
												</span>
												
												 <?php } ?>
												
										</p>
										<?php }}?>
										
								</div>
							</div>
							<?php } else { ?>
							<div class="panel2 newpanelDesign forceDivTwoColumn" id="ourAdvice">
								<div class="panelheaderheightfixer">
									<div class="panelNewHeader bkgrey signup-title" style="margin-bottom:0px;line-height:47px; font-weight:500; font-size:28px;">Never Buy a <strong>'DUD'</strong> again </div>
									<div style="background:url('/images/bodyback.png');background-position: 96% 0px;background-repeat:no-repeat;background-size:20px;height:20px;"></div>
								</div>
								
								<div class="panelContent">
									<div class="loginBox">
										
										<div class="product-signup">
											<div class="signup-body">
												<img src="/images/signup.png" width="58%" style="padding-top:5px;">
												<div class="right" style="width:42%;margin-top:15px;">
													<strong><i style="text-align:right;">We are PretaStyler and we are leading a shopping revolution.</i></strong>
													<p>
												Like fingerprints you have your very own unique set of body characteristics and personal style perferences that impact what garments suit you. </p>
												<p>With Pretastyler's advanced technology you can have a fashion mall created exclusively for you, filled with clothes and accessories that are perfectly matched to flatter your shape. </p>
												<p>To complete your look and ensure you look and feel amazing every time you walk out the door each garment also comes with expert style advice on how to wear the garment to perfection.</p>
												</div>
												<div class="clear"></div>
												
											</div>
											<div class="signup-form">
												<form action="/" method="post" class="inputFieldPlaceholder">
													<div style="float:left; width:70%;padding-left:10%;padding-top:15px" class="form-style">
														<div style="width:100%;height:45px;">
															<div class="form-input"><input type="text" placeholder="First Name" style="width:100%;" required></div>
															<div class="form-input" style="margin-left:5px;"><input type="text" placeholder="Last Name" style="width:100%;" required></div>
														</div>
														<div style="width:100%;height:45px;">
															<div class="form-input"><input type="text" placeholder="Email" style="width:100%;" required></div>
															<div class="form-input" style="margin-left:5px;"><input type="text" placeholder="Password" style="width:100%;" required></div>
														</div>
													</div>
													<div style="float:left;width:20%;"><button><strong>SIGN UP</strong><BR>NOW</button></div>
													</form>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							
							
							<div class="panel2 newpanelDesign" id="similarItems">
								<div class="panelHeader">Similar Items that suit you</div>
								<div class="panelContent">
									<div class="sliderWrap">
										<ul class="items">
											<?php if ($similar_garments) {
												foreach ($similar_garments as $row) {?>
												<li><a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank"><img src="<?php print '/images/garment/'.$row['image_path'] ?>" alt="<?php print $row['name']?>"></a>
													<?php if ($this->flexi_auth->is_logged_in()) {?>
														<div class="rating"><?php 
															if ($row['score']){
																print $score;
																?><i class="icon-star"></i><?php } else {
																print 'Not Assessed';
															}?></div><?php } ?>
												</li>
												<?php }
											}?>
										</ul>
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
								
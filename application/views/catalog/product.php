<div class="mainContent">
<div id="product" class="productWrap">
	<div class="galleryAreaWrap notLoggedIn">
		<div class="galleryArea itemidentification" garment_id="<?php print ( !empty( $garment['garment_id'] ) ? $garment['garment_id'] : '' ) ?>">
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
				<a href="#" class="prevNew"><span><i class="icon-arrow-left"></i></span></a>
				<a href="#" class="nextNew"><span><i class="icon-arrow-right"></i></span></a>
			</div>
			<?php if (!empty($garment['extra_image1_path']) || !empty($garment['extra_image2_path']) ) {?>
			<div class="thumbsWrap">
					<ul class="items">
						<?php /* <li><a href="#" data-index="1"><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name']?>"></a></li>*/?>
						<?php if (!empty($garment['extra_image1_path']) ) {?>
						<li><a href="#" data-index="1"><img src="<?php print '/images/garment/'.$garment['extra_image1_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
						<?php } ?>
						<?php if (!empty($garment['extra_image2_path'])) {?>
						<li><a href="#" data-index="1"><img src="<?php print '/images/garment/'.$garment['extra_image2_path'] ?>" alt="<?php print $garment['name']?>"></a></li>
						<?php } ?>
					</ul>
			</div>
			<?php } ?>
			<div class="productnewoptions left">
				<ul class="optionsNew">
					<?php /* ?>
					<li><a href="<?php print $row['url'] ?>" target="_blank"><i class="icon-cart"></i></a></li>
					<?php if ($this->flexi_auth->is_logged_in()){
					if ($this->flexi_auth->in_group('Administrators') || $row['import_user_id'] == $this->flexi_auth->get_user_id()) {?><li><a href="/garment/edit/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>"><i class="icon-pencil"></i></a></li> <?php }}?>
					<li><a href="#"><i class="icon-dress"></i></a></li>
					<li><a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank"><i class="icon-scales"></i></a></li>
					<?php if ($this->flexi_auth->is_logged_in()) { ?>
					<?php */ ?>
					<?php if(isset($garment['favorite']) ) { ?>
					<li><a class="favorite-click<?php print ($garment['favorite'] == 1)?' actived':''?>" href="#"><i class="icon-heart"></i></a></li>
					<?php } else { ?>
					<li><a class="favorite-click<?php // print ($garment['favorite'] == 1)?' actived':''?>" href="#"><i class="icon-heart"></i></a></li>
					<?php } ?>
					
					<?php /* if(isset($garment['favorite']) ) { ?>
					<li><a class="wardrobe-click<?php print ($garment['wardrobe'] == 1)?' actived':''?>" href="#"><i class="icon-hanger"></i></a></li>
					<?php } else { ?>
					<li><a class="wardrobe-click<?php // print ($garment['wardrobe'] == 1)?' actived':''?>" href="#"><i class="icon-hanger"></i></a></li>
					<?php } */?>
					
					<?php /*<li><a href="#"><i class="icon-share"></i></a></li> */ ?>
					<li><a href="/styling-board.html" target="_blank"><i class="icon-plus"></i></a></li>
					<li><a href="/styling-board.html" target="_blank"><i class="icon-board"></i></a></li>
					<?php /* ?>
					<?php if ($this->flexi_auth->in_group('Administrators')) {?><li><a href="#" target="_blank" class="disable-click"><i class="icon-cross" title="Disable this garment"></i></a></li> <?php } ?>
					<?php } ?>
					<?php */ ?>
				</ul>
			</div>
			
			<div class="left productnewdetails">
						<?php /* if (!empty($garment['description'])) { ?>
						<p><?php print nl2br($garment['description'])?></p>
						<?php } else {?>
						<p><?php print $garment['name']?> Description</p>
						<?php } */ ?>
						<dl>
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
							<dt>Sizes <?php if ($size) {print '('.$size[0]['region'].')';} ?>:</dt>
							<dd>
								<ul>
									<?php if ($size) {
									foreach ($size as $row) { ?>
									<li><span><?php print $row['size']; ?></span></li>
									<?php }} else { print '<li><span>N/A</span></li>';} ?>
								</ul>
							</dd>
							<dt>Colors:</dt>
							<dd>
								<ul>
									<?php foreach ($colour as $row){ ?>
									<li title="<?php print $row['name'] ?>"><img src="/images/colours/<?php print $row['image_path'] ?>" width="25" height="25" alt="<?php print $row['name'] ?>"></li>
									<?php }?>
								</ul>
							</dd>
							<dt>Brand:</dt>
							<dd>
								<a href="/mall/brand/<?php print strtolower(url_title($garment['brand'])) ?>.html" target="_blank">
									<?php if( file_exists( FCPATH . 'images/brands/'.strtolower(url_title($garment["brand"])).'.jpg' )) { ?>
									<img src="/images/brands/<?php print strtolower(url_title($garment['brand'])) ?>.jpg" height="35" alt="<?php print $garment['brand']?>" title="<?php print $garment['brand']?>">
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
						</dl>
						
					</div>
			
			<ul class="bottomOptions">
				<li><a href="#"><i class="icon-magnifier"></i></a></li>
				<li>
				<a href="https://www.facebook.com/sharer.php?u=<?php print current_url() ?>" onClick="return fbs_click(500,400)" target="_blank"><i class="icon-facebook"></i></a>
				</li>
				<li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="icon-pinterest"></i></a></li>
				<!-- <li><a href="https://twitter.com/share?url=<?php print current_url() ?>" onClick="return fbs_click(500,400,2)" target="_blank"><i class="icon-twitter"></i></a></li> -->
				<li><a href="<?php print current_url() ?>" class="tweet" target="_blank"><i class="icon-twitter"></i></a></li>
				<li><a href="<?php print current_url() ?>" class="gplus" target="_blank"><i class="icon-googleplus"></i></a></li>
				<li class="right"><a href="<?php 
								if (strpos($garment['url'],'theiconic.com.au') !== false) {
									print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
								}
								print $garment['url']; 
							?>" class="button buy" target="_blank">Buy Now</a></li>
				<?php ?>
			</ul>
		</div>
	</div>
	
	<div class="panelsWrap">
	    
	    <?php /* ?>
		<div class="panel2" id="productDetails">
			<div class="panelHeader">Product Details</div>
			<div class="panelContent">
				<div class="section">
					<div class="title center"><?php print $garment['name']?></div>
					
				</div>
			</div>
			<a href="<?php print $garment['url']?>" class="button buy" target="_blank">Buy Now</a>
		</div>
		<?php */ ?>
		
		<?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers'))) { ?>
		  <div class="panel2" id="ourAdviceLog">
			<div class="panelHeader">GARMENT INSIGHTS</div>
			<div class="panelContent">
				<div class="section">
					<div class="title">
						<table>
							<tr>
								<th>Area</th>
								<th>Style Item</th>
								<th>Result</th>
							</tr>
						</table>
					</div>
					<div class="scrollable">
						<table>
							<?php foreach ($advise as $row){ ?>
							<tr>
								<td><strong><?php print $row['area']?></strong></td>
								<td><?php print $row['style_item']?></td>
								<td><span class="starsWrap rating star<?php print $row['result']?>Rate" style="background:initial;"><?php print $row['result'] ?><i class="icon-star"></i><?php
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
		 <div class="panel2" id="styingRecon">
			<div class="panelHeader">STYLING RECOMMENDATIONS</div>
			<div class="panelContent">
				<p>
				<?php foreach ($advise as $row){ 
						if ($row['comment']){
				?>
				<strong><?php print $row['area'] ?>:</strong><br><span class="bold-dash">-</span> <?php print implode('<br><span class="bold-dash">-</span> ', $row['comment']) ?><br>
				<?php }}?>
				</p>
			</div>
		 </div>
		<?php } else { ?>
		  <div class="panel2" id="ourAdvice">
			<div class="panelHeader">GARMENT INSIGHTS</div>
			<div class="panelContent">
				<div class="loginBox">
					<figure class="focuspoint" data-focus-x="0.67" data-focus-y="0.00" data-focus-w="549" data-focus-h="367">
						<img src="/images/login.jpg" width="549" height="367" alt="">
						<div>
							<a href="javascript:void(0)" onclick="login_click();" class="button">Login</a>
							<a href="/packages.html" class="button pink">Join us today</a>
							<div class="box">
								<h3>Spoiled for choice?</h3>
								<p>Our Style Genie will find the styles perfect for you<br>She’s <strong>FREE</strong></p>
							</div>
						</div>
					</figure>
				</div>
			</div>
		  </div>
		<?php } ?>
		
		
		<div class="panel2" id="similarItems">
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
								if ($row['score']>7.3){
									print 5;
								} else if ($row['score']>6){
									print 4;
								} else if ($row['score']>5){
									print 3;
								} else if ($row['score']>3){
									print 2;
								} else {
									print 1;
								}
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

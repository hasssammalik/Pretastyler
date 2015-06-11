<?php 

$star_result  = array('Avoid', 'Avoid', 'Risky', 'Maybe', 'Good', 'Great' );

if ($garments) {
foreach ($garments as $row) { ?>
<div class="item may_product_with_popups" style="font-size: 14px;">
	<div class="imgWrap">
		<div class="itemName itemidentification" style="margin-bottom: 0px;" garment_id="<?php print $row['garment_id'] ?>"><h5 style="text-align: left;text-overflow: ellipsis;width: 200px;display: block;padding-top: 10px;height: 16px;font-weight:initial"><?php print $row['name'] ?></h5></div>
		<div class="hoverForMallListOptions" style="margin-top: 0px;">
			<span style = "height: 324px;">
				<a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank"></a>
				<a class="imgcontainer" href="<?php 
						if (strpos($row['url'],'theiconic.com.au') !== false) {
							print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
						}
						print $row['url']; 
					?>" target="_blank">
					<img src="<?php print '/images/garment/'.$row['image_path'] ?>" alt="<?php print $row['name'] ?>">
				</a>
			</span>
			<?php if ( $row['is_standard'] == 0 ) { ?>
				<a class="topCorner" title="Item uploaded and assessed by another member"><i class="icon-user2"></i></a>
			<?php } ?>
			<ul class="options hoverStepsOptions">
				<li><a class="garment_mall_buy_button" href="<?php 
					if (strpos($row['url'],'theiconic.com.au') !== false) {
						print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
					}
					print $row['url']; 
				?>" target="_blank" title="Buy item"><i class="icon-cart"></i></a></li>
				<?php if ($this->flexi_auth->is_logged_in()){
				if ($this->flexi_auth->in_group('Administrators') || $row['import_user_id'] == $this->flexi_auth->get_user_id()) {?><li><a target="_blank" href="<?php if ($row['dressing_room']) {print '/garment/assess/'.$row['garment_id'].'-'.url_title($row['name']).'.html';} else {print '/garment/edit/'.$row['garment_id'].'-'.url_title($row['name']).'.html';} ?>" title="<?php if ($row['dressing_room']) {print 'Assess item';} else {print 'Edit item';} ?>"><i class="icon-pencil"></i></a></li> <?php }}?>
				<li><a class="garment_mall_similar_button" href="/mall/similar/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank" title="See similiar items"><i class="icon-dress"></i></a></li>
				<!-- <li><a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank" class="<?php if($user_profile_done == false){ echo "no_user_profile_complete"; } ?>" title="Garments insights"><i class="icon-scales"></i></a></li> -->
				<?php if ($this->flexi_auth->is_logged_in()) { ?>
				<li><a class="garment_mall_favorite_button favorite-click<?php if( isset($row['favorite'])) { print ($row['favorite'] == 1)?' actived':''; }?>" href="#" title="Add to My Wishlist/Favorites"><i class="icon-heart"></i></a></li>
				<!--<li><a href="#" title="Share item on social media" class="socialShare"><i class="icon-share"></i></a></li>-->
				<!-- <li><a href="/styling-board.html" target="_blank" title="Create an Inspiration board using this item"><i class="icon-plus"></i></a></li> -->
				<!-- <li><a href="/styling-board.html" target="_blank" title="See inspiration boards with this item"><i class="icon-board"></i></a></li> -->

				<li>
					<a class="garment_insights_popup mousehand" title="<?php if($row['score']>5) {?>Why this item works for you<?php }else{echo 'Why this item does not work for you'; }?>">
						<img src="/img/icon-insights-32.png" class="garment_newpopup_img">
					</a>
				</li>
				<li>
					<a class="garment_recommendataion_popup mousehand" title="Styling Suggestions">
						<img src="/img/icon-recommend-32.png" class="garment_newpopup_img">
					</a>
				</li>

				<?php if ($this->flexi_auth->in_group('Administrators')) {?>
					<li><a href="#" target="_blank" class="disable-click"><i class="icon-cross" title="Disable this garment"></i></a></li>
				<?php } ?>
				<?php } ?>
			</ul>
			<a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" class="zoom bottomleftimage-showPink jTourStepsCustom7" target="_blank" title="Large View/Product details">
				<img src="/img/icons-25-info-pink.png" class="imageiconinfo-pink bottomleftimage-mall">
				<img src="/img/icons-25-info-grey.png" class="imageiconinfo-grey bottomleftimage-mall">
			</a>
			<div class="mall-store-name"><?php print $row['store'] ?></div>
			<?php if ($this->flexi_auth->is_logged_in() && isset( $row['score'] ) ) {?>
			<div class="rating jTourStepsCustom8" title="Suitability rating for you"><?php 
				/*if ($row['score']){
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
					}*/
				if ($row['score']){
					if ($row['score']>7.3){
						$score = 5;
						} else if ($row['score']>6){
						$score = 4;
						} else if ($row['score']>5){
						$score = 3;
						} else if ($row['score']>3){
						$score = 2;
						} else {
						$score = 1;
					}
					if ($row['score'] >= 8.91 ){
						print 99;
					} else if ($row['score'] > 0.9 ){
						print round(( ( 98 * $row['score'] ) - 80.19 ) / 8.01 );
					} else {
						print 1;
					}
					?>%
				<?php } else if ($row['score'] == 0){
						//print '1<i class="icon-star"></i>';
						print '1%';
				} else {
						print 'Not Assessed';
				}?><br><span class="ratingmatchword" data-ratenum="<?php echo $row['score'] ?>">MATCH</span>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="extraOptions_garment"></div>
</div>
<?php }
} ?>


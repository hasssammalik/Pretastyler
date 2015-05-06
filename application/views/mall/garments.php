<?php if ($garments) {
foreach ($garments as $row) { ?>
<div class="item" style="font-size: 14px;">
	<div class="imgWrap">
		<div class="itemName itemidentification" style="margin-bottom: 0px;" garment_id="<?php print $row['garment_id'] ?>"><span style="text-align: left;text-overflow: ellipsis;white-space: nowrap;width: 200px;display: block;padding-top: 10px;height: 16px;"><?php print $row['name'] ?></span></div>
		<div class="hoverForMallListOptions" style="margin-top: 0px;">
			<span style = "height: 324px;">
				<a class="imgcontainer" href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank">
					<img src="<?php print '/images/garment/'.$row['image_path'] ?>" alt="<?php print $row['name'] ?>">
				</a>
			</span>
			<?php if ( $row['is_standard'] == 0 ) { ?>
				<a class="topCorner" title="Item uploaded and assessed by another member"><i class="icon-user2"></i></a>
			<?php } ?>
			<ul class="options">
				<li><a href="<?php 
					if (strpos($row['url'],'theiconic.com.au') !== false) {
						print 'https://www.tagserve.com.au/clickServlet?AID=264&MID=36&PID=47&SID=297&CID=52&SUBID=&TARGETURL=';
					}
					print $row['url']; 
				?>" target="_blank" title="Buy item"><i class="icon-cart"></i></a></li>
				<?php if ($this->flexi_auth->is_logged_in()){
				if ($this->flexi_auth->in_group('Administrators') || $row['import_user_id'] == $this->flexi_auth->get_user_id()) {?><li><a target="_blank" href="<?php if ($row['dressing_room']) {print '/garment/assess/'.$row['garment_id'].'-'.url_title($row['name']).'.html';} else {print '/garment/edit/'.$row['garment_id'].'-'.url_title($row['name']).'.html';} ?>" title="<?php if ($row['dressing_room']) {print 'Assess item';} else {print 'Edit item';} ?>"><i class="icon-pencil"></i></a></li> <?php }}?>
				<li><a href="/mall/similar/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank" title="See similiar items"><i class="icon-dress"></i></a></li>
				<!-- <li><a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" target="_blank" class="<?php if($user_profile_done == false){ echo "no_user_profile_complete"; } ?>" title="Garments insights"><i class="icon-scales"></i></a></li> -->
				<?php if ($this->flexi_auth->is_logged_in()) { ?>
				<li><a class="favorite-click<?php if( isset($row['favorite'])) { print ($row['favorite'] == 1)?' actived':''; }?>" href="#" title="Add to My Wishlist/Favorites"><i class="icon-heart"></i></a></li>
				<!--<li><a href="#" title="Share item on social media" class="socialShare"><i class="icon-share"></i></a></li>-->
				<!-- <li><a href="/styling-board.html" target="_blank" title="Create an Inspiration board using this item"><i class="icon-plus"></i></a></li> -->
				<!-- <li><a href="/styling-board.html" target="_blank" title="See inspiration boards with this item"><i class="icon-board"></i></a></li> -->
				<?php if ($this->flexi_auth->in_group('Administrators')) {?>
					<li><a href="#" target="_blank" class="disable-click"><i class="icon-cross" title="Disable this garment"></i></a></li>
				<?php } ?>
				<?php } ?>
			</ul>
			<a href="/product/<?php print $row['garment_id'].'-'.url_title($row['name']).'.html' ?>" class="zoom bottomleftimage-showPink" target="_blank" title="Large View/Product details">
				<img src="/img/icons-25-info-pink.png" class="imageiconinfo-pink bottomleftimage-mall">
				<img src="/img/icons-25-info-grey.png" class="imageiconinfo-grey bottomleftimage-mall">
			</a>
			<?php if ($this->flexi_auth->is_logged_in() && isset( $row['score'] ) ) {?>
			<div class="rating" title="Suitability rating for you"><?php 
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
				?>
				<i class="icon-star"></i>
				<?php } else if ($row['score'] == 0){
					print '1<i class="icon-star"></i>';
				} else {
					print 'Not Assessed';
				}?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php }
} ?>


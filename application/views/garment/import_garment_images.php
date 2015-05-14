<?php foreach ($images as $image_key => $image) { 

	if (strpos( $image->src,'static.theiconic.com.au%2Fp%2F') !== false) {
		$imageNew = explode( 'static.theiconic.com.au%2Fp%2F', $image->src );
		$images[$image_key]->src = 'http://static.theiconic.com.au/p/'.$imageNew[1];
	    $imageProp = getimagesize( $images[$image_key]->src );
	    $images[$image_key]->width = $imageProp[0];
	    $images[$image_key]->height   = $imageProp[1];
	}
	
	?>

	<div class="item">
		<div class="itemName"><span><strong>SIZE:</strong> <?php print $image->height.' x '. $image->width ?></span></div>
		<div class="imgWrap">
			<div>
				<a href="#"><img src="<?php print $image->src ?>" alt="" class="image-choice"></a>
			</div>
			<?php if ($this->flexi_auth->in_group(array('Administrators', 'Uploaders'))) { ?><div class="choiceText"></div><?php }?>
		</div>
	</div>

<?php } ?>
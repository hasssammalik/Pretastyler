<?php if ($garments) {
foreach ($garments as $row) { ?>
<div class="item" style="font-size: 14px;">
	<div class="imgWrap">
		<div class="itemName itemidentification" style="margin-bottom: 0px;" garment_id="<?php print $row['garment_id'] ?>"><span style="text-align: left;text-overflow: ellipsis;white-space: nowrap;width: 200px;display: block;padding-top: 10px;height: 16px;"><?php print $row['name'] ?></span></div>
		<div style="margin-top: 0px;">
			<span style = "height: 324px;">
				<a class="imgcontainer">
					<img src="<?php print '/images/garment/'.$row['image_path'] ?>" alt="<?php print $row['name'] ?>" target="_blank">
				</a>
			</span>
		</div>
	</div>
</div>
<?php }
} 
//echo "<pre>".print_r($this->session->all_userdata(), true)."</pre>";
?>


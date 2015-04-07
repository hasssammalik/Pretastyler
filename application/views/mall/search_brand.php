<div class="quicktopbrand">
	<div class="topbrandtext b">Result</div>
	<fieldset class="checkboxes otherSection quickbrands-type-select">
	<?php if(!empty( $brand_result )) {  ?>
		<?php foreach ($brand_result as $row) { ?>
		<label><input type="checkbox"
			value="<?php print $row['brand'] ?>"><span
			title="<?php print $row['brand'] ?>"><?php print $row['brand'] ?></span></label>
		<?php } ?>
	<?php } else { ?>
	<div class="i">No Brand found</div>
	<?php } ?>
	</fieldset>
</div>

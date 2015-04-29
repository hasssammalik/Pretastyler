<div class="quicktopstore">
	<div class="topstoretext b">Result</div>
	<fieldset class="checkboxes otherSection quickstores-type-select">
	<?php if(!empty( $store_result )) {  ?>
		<?php foreach ($store_result as $row) { ?>
		<label><input type="checkbox"
			value="<?php print $row['store'] ?>"><span
			title="<?php print $row['store'] ?>"><?php print $row['store'] ?></span></label>
		<?php } ?>
	<?php } else { ?>
	<div class="i">No Store found</div>
	<?php } ?>
	</fieldset>
</div>

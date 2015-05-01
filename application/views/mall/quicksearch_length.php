<?php 
if( !empty( $category_with_lengths ) ) {
	foreach ( $category_with_lengths as $categories ) {
?>

<hr class="widfulled">	
<div class="col widfulled">
	<label><?php echo $categories['name'] ?>:</label>
	<fieldset class="checkboxes otherSection quick-<?php echo $categories['name'] ?>-length" id="checkbox-search-<?php echo $categories['name'] ?>-length">
		<?php foreach ($categories['length'] as $row) { ?>
		<label><input type="checkbox"
			value="<?php print $row['criteria_id'] ?>"><span
			title="<?php print $row['name'] ?>"><?php print $row['name'] ?></span></label>
		<?php } ?>
	</fieldset>
</div>

<?php
	}
}
?>
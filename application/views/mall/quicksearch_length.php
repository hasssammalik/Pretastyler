<?php 
if( !empty( $category_with_lengths ) ) {
	foreach ( $category_with_lengths as $categories ) {
?>
		<div id="quick-search-category-length-section-<?php echo $categories['id'] ?>">
			<hr class="widfulled">	
			<div class="col widfulled">
				<label><?php echo $categories['name'] ?>:</label>
				<fieldset class="checkboxes otherSection quick-<?php echo $categories['name'] ?>-length" 
							data-cat-length-name="<?php echo $categories['name'] ?>" 
							data-cat-length-id="<?php echo $categories['id'] ?>" 
							id="checkbox-search-<?php echo $categories['name'] ?>-<?php echo $categories['id'] ?>-length">
					<?php foreach ($categories['criterias'] as $row) { ?>
						<label>
							<input type="checkbox" value="<?php print $row['id'] ?>">
							<span title="<?php print $row['name'] ?>"><?php print $row['name'] ?></span>
						</label>
					<?php } ?>
				</fieldset>
			</div>
		</div>
<?php
	}
}
?>
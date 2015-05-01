<?php 
if( !empty( $category_lengths ) ) {
	foreach ( $category_lengths as $category ) {
?>
		<div id="quick-search-category-length-section-<?php echo $categories['id'] ?>">
			<hr class="widfulled">	
			<div class="col widfulled">
				<label><?php echo $category['name'] ?>:</label>
				<fieldset class="checkboxes otherSection quick-<?php echo $category['name'] ?>-length" 
							data-cat-length-name="<?php echo $category['name'] ?>" 
							data-cat-length-id="<?php echo $category['id'] ?>" 
							id="checkbox-search-<?php echo $category['name'] ?>-<?php echo $category['id'] ?>-length">
					<?php foreach ($category['criterias'] as $row) { ?>
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
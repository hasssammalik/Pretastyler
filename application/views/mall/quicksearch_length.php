<?php 
if( !empty( $category_lengths ) ) {
?>
	<div id="quick-search-category-length-section-<?php echo $category_lengths['id'] ?>">
		<hr class="widfulled">	
		<div class="col widfulled">
			<label><?php echo $category_lengths['name'] ?> Length:</label>
			<fieldset class="checkboxes otherSection quick-<?php echo $category_lengths['name'] ?>-length" 
						data-cat-length-name="<?php echo $category_lengths['name'] ?>" 
						data-cat-length-id="<?php echo $category_lengths['id'] ?>" 
						id="checkbox-search-<?php echo $category_lengths['name'] ?>-<?php echo $category_lengths['id'] ?>-length">
				<?php foreach ($category_lengths['criterias'] as $row) { ?>
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
?>
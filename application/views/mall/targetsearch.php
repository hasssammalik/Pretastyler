<div class="mainContent">
	<?php // echo form_open(); echo form_close();?>
	<style type="text/css">
		.target-search-page .itemsWrap ul.items li { width: 292px; }
	</style>
	<div class="target-search-page accordion topAccordionMenu " style="position:relative;" >
		<div class="panel targetcustomslides" style="display:block;">
		<div id="category-panel">
			<div class="sliderWrap" style="max-width:1010px;">
				<ul class="items">
					<?php foreach ( $deep_category as $category ) { ?>
					<li>
						<label class="category_labels" category_id="<?php print $category['category_id'] ?>">
							<input type="checkbox">
							<div><span><?php print $category['name']?></span></div>
							<div class="img">
								<span><img src="/images/system/<?php print $category['image_path']?>" alt="<?php print $category['name']?>" height="192"></span>
								<span class="overlay"><span><span><i class="icon-check"></i></span></span></span>
							</div>
						</label>
					</li>
					<?php } ?>	
					
				</ul>
				<div class="pager"></div>
			</div>
		</div>

		<div class="advanced" style="display:none">
			<div class="options accordion">
			</div>
			<div class="itemsWrap">
				<div class="sliderWrap">
					<ul class="items">
					</ul>
					<div class="pager"></div>
				</div>
			</div>
			<div class="next-button">Skip
			</div>
		</div>
	</div>
	</div>
	
	<br>
	<br>
	<div class="garments">
	</div>
	
	<div class="clear"></div>
	
	<div class="mousehand btnbottommore clicktoseemoretarget">
		Click to see more <i class="icon-triangle"></i>
	</div>
	
	<div class="clear"></div>
	
	<div class="user_inter_pop_profile" style="display:none;"></div>
	
	<div class="user_inter_pop_welcome_profile" style="display:none;"></div>
	
	<div style="display:none;">
		<fieldset class="checkboxes group color-oneliner quick-color sectionTogglediv" id="checkbox-search-colour">
			<div class="col">
				<?php foreach ($colours as $row) { ?>
				<label>
					<input type="checkbox" value="<?php print $row['colour_id'] ?>">
					<span>
						<img src="/images/colours/<?php print $row['image_path'] ?>" width="20" height="20" alt="<?php print $row['name'] ?>" title="<?php print $row['name'] ?>" <?php
						if( $row['image_path'] == 'sample-whites.png' ) { ?> class="borderGrey" <?php }?> >
						<?php // print $row['name'] ?>
					</span>
				</label>
				<?php } ?>
			</div>
		</fieldset>
		
		<fieldset class="checkboxes otherSection quick-occasion sectionTogglediv" id="checkbox-search-occasion">
		<?php foreach ($occasions as $row) { ?>
			<label><input type="checkbox"
				value="<?php print $row['occasion_id'] ?>"><span
				title="<?php print $row['description'] ?>"><?php print $row['name'] ?></span></label>
			<?php } ?>
		</fieldset>
				
	<div>
	
	
	
</div>
<?php 
	
	$content = "some text here";
$fp = fopen("myText.txt","wb");
fwrite($fp,$content);
fclose($fp);
	
	
	?>

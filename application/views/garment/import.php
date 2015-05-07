<div class="mainContent">
	<div class="garments">
		<div class="leftSide" style="display:none;">
			<div class="image">
				<span><img src="" alt="" class="image_selected"></span>
			</div>
		</div>
		<div class="rightSide">
			<h4><span>Select Main Image</span></h4>
			<?php foreach ($images as $image_key => $image) { ?>
			<div class="item">
				<div class="itemName"><span><strong>SIZE:</strong> <?php print $image['height'].' x '. $image['width'] ?></span></div>
				<div class="imgWrap">
					<div>
						<a href="#"><img src="<?php print $image['image_path'] ?>" alt="" class="image-choice"></a>
					</div>
					<?php if ($this->flexi_auth->in_group(array('Administrators', 'Uploaders'))) { ?><div class="choiceText"></div><?php }?>
				</div>
			</div>
			<?php } ?>
			<a href="#" class="button" id="nextButton" style="display:none;">Next</a>
		</div>
	</div>
	<div class="assessment" style="display:none">
		<h4><span>Assess Your Garment</span></h4>
		<div class="clearfix">
			<div class="leftSide">
				<div class="image">
					<span><img src="" alt="" class="image_selected"></span>
				</div>
			</div>
			<div class="rightSide">
				<?php  $attreg = array('name' => 'garment_assessment', 'id' => 'garment_assessment');echo form_open('garment_assessment', $attreg); ?>
					<div class="row">
						<label id="error-assessment"></label>
					</div>
					<div class="row">
						<label>Item Name: <span class="required">*</span></label>
						<input type="text" name="itemName" value="<?php print $garment_name ?>" class="assessment-name">
					</div>
					<div class="row">
						<div class="col span_11">
							<label>Brand:</label>
							<input type="text" name="brand" value="" class="assessment-brand">
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11">
							<label>Store:</label>
							<input type="text" name="store" value="" class="assessment-store">
						</div>
					</div>
					<div class="row">
						<div class="col span_11">
							<label>Price Range: <span class="required">*</span></label>
							<select class="assessment-price-range">
								<option value="0">Please Select</option>
								<option value="1">$0-100</option>
								<option value="2">$100-199</option>
								<option value="3">$200-499</option>
								<option value="4">$500-999</option>
								<option value="5">$1000+</option>
							</select>
						</div>
						<div class="col span_2">&nbsp;</div>
						
						<?php if ($this->flexi_auth->in_group(array('Administrators', 'Uploaders'))) { ?>
						<div class="col span_11">
							<label>Sizes: </label>
							<select class="assessment-sizes-region" style="display:none;">
							</select>
							<div class="assessment-sizes" style="display:none;">
							</div>
						</div>
						<?php } /*?>
						<div class="col span_11">
							<!--<label>Season:</label>
							<select class="assessment-season">
								<option>Please Select</option>
							</select> -->
						</div>
						<?php */ ?>

					</div>
					<div class="row">
						<div class="col span_11">
							<label>Item Type: <span class="required">*</span></label>
							<select class="assessment-category">
								<option value="0">Please Select</option>
								<?php foreach ($categories as $row) { ?>
								<option value="<?php print $row['category_id'] ?>"><?php print $row['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11">
							<div class="garmentOccasionFixer">
								<label>Occassions (Multi Select): <span class="required">*</span></label>
								<fieldset class="checkboxes assessment-occasions otherSection" id="checkbox-search-occasion">
									<?php foreach ($occasions as $row) { ?>
									<label><input type="checkbox"
										value="<?php print $row['occasion_id'] ?>"><span
										title="<?php print $row['description'] ?>"><?php print $row['name'] ?></span></label>
									<?php } ?>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col span_24">
							<fieldset class="checkboxes otherSection" id="dress-pattern-import">
								<label class="checkbox">
									<input type="checkbox" class="assessment-pattern"><span>This Is A Dress Pattern</span>
								</label>
							</fieldset>
						</div>
					</div>
					<div class="row relative">
						<div class="col span_11">
							<label>Colours (Multi Select): <span class="required">*</span></label>
							<div class="group colours assessment-colours">
								<fieldset class="checkboxes group">
									<div class="col span_12">
									<?php foreach ($colours1 as $row) { ?>
									<label>
										<input type="checkbox" value="<?php print $row['colour_id'] ?>">
										<span>
											<img src="/images/colours/<?php print $row['image_path'] ?>" width="20" height="20" alt="<?php print $row['name'] ?>" <?php
											if( $row['image_path'] == 'sample-whites.png' ) { ?> class="borderGrey" <?php }?> >
											<?php print $row['name'] ?>
										</span>
									</label>
									<?php } ?>
								</div>
								<div class="col span_12">
									<?php foreach ($colours2 as $row) { ?>
									<label><input type="checkbox"
										value="<?php print $row['colour_id'] ?>"><span><img
											src="/images/colours/<?php print $row['image_path'] ?>"
											width="20" height="20" alt="<?php print $row['name'] ?>"><?php print $row['name'] ?></span></label>
									<?php } ?>
								</div>
								</fieldset>
							</div>
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11 poseBottomRight">

							<a href="#" class="button medium assess-click bkpinkycolor">Assess item</a>
							<a href="#" class="button medium dressing-room-click">Add to Dressing room</a>
							
							<p><span class="required">*</span> Mandatory/ Required Fields</p>
						
						</div>
					</div>
					<?php /* if ($this->flexi_auth->in_group(array('Administrators', 'Uploaders'))) { ?>
					<div class="row">
						<div class="col span_12">
							<label>Sizes: </label>
							<select class="assessment-sizes-region" style="display:none;">
							</select>
							<div class="assessment-sizes" style="display:none;">
							</div>
						</div>
					</div>
					<?php }  ?>
					<div class="row">
						<label>Descriptions: </label>
						<textarea name="description" class="assessment-description" style="height: 300px;"></textarea>
					</div>
					<?php */ ?>
					
				</form>
			</div>
		</div>
	</div>
</div>
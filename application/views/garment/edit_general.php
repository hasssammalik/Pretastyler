<div class="mainContent">
	<div class="assessment">
		<h4><span>Edit Garment - <?php print $garment['name'] ?></span></h4>
		<div class="clearfix">
			<div class="leftSide">
				<div class="image">
					<span><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" alt="<?php print $garment['name']?>"></span>
				</div>
			</div>
			<div class="rightSide">
				<?php  $attreg = array('name' => 'garment_assessment', 'id' => 'garment_assessment');echo form_open('garment_assessment', $attreg); ?>
					<div class="row">
						<label id="error-assessment"></label>
					</div>
					<div class="row">
						<label>Item Name: <span class="required">*</span></label>
						<input type="text" name="itemName" value="<?php print $garment['name'] ?>" class="assessment-name">
					</div>
					<div class="row">
						<div class="col span_11">
							<label>Brand:</label>
							<input type="text" name="brand" value="<?php print $garment['brand'] ?>" class="assessment-brand">
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11">
							<label>Store:</label>
							<input type="text" name="store" value="<?php print $garment['store'] ?>" class="assessment-store">
						</div>
					</div>
					<div class="row">
						<div class="col span_11">
							<label>Price Range: <span class="required">*</span></label>
							<select class="assessment-price-range">
								<option value="0">Please Select</option>
								<option value="1" <?php if ($garment['price_range'] == '1') print 'selected="selected"' ?>>$0-100</option>
								<option value="2" <?php if ($garment['price_range'] == '2') print 'selected="selected"' ?>>$100-199</option>
								<option value="3" <?php if ($garment['price_range'] == '3') print 'selected="selected"' ?>>$200-499</option>
								<option value="4" <?php if ($garment['price_range'] == '4') print 'selected="selected"' ?>>$500-999</option>
								<option value="5" <?php if ($garment['price_range'] == '5') print 'selected="selected"' ?>>$1000+</option>
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
							<label>Item Type(Not Changeable): <span class="required">*</span></label>
							<select class="assessment-category" disabled>
								<option value="<?php print $category['category_id'] ?>" selected="selected"><?php print $category['name'] ?></option>
							</select>
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11">
							<div class="garmentOccasionFixer">
								<label>Occassions (Multi Select): <span class="required">*</span></label>
								<fieldset class="checkboxes assessment-occasions otherSection" id="checkbox-search-occasion">
									<?php foreach ($occasions as $row) { ?>
									<label><input type="checkbox"
										value="<?php print $row['occasion_id'] ?>" <?php if ($row['checked']) print 'checked="checked"' ?>><span
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
									<input type="checkbox" class="assessment-pattern" <?php if ($garment['is_pattern'] == '1') print 'checked="checked"' ?>><span>This Is A Dress Pattern</span>
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
										<input type="checkbox" value="<?php print $row['colour_id'] ?>" <?php if ($row['checked']) print 'checked="checked"' ?>>
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
										<label><input type="checkbox"  value="<?php print $row['colour_id'] ?>" <?php if ($row['checked']) print 'checked="checked"' ?>>
											<span>
												<img src="/images/colours/<?php print $row['image_path'] ?>" width="20" height="20" alt="<?php print $row['name'] ?>">
												<?php print $row['name'] ?>
											</span>
										</label>
									<?php } ?>
								</div>
								</fieldset>
							</div>
						</div>
						<div class="col span_2">&nbsp;</div>
						<div class="col span_11 poseBottomRight">

							<a href="#" class="button medium assess-click bkpinkycolor">Save and edit details</a>
							<a href="#" class="button medium dressing-room-click">Save and view Dressing room</a>
							
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
					<?php } ?>
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
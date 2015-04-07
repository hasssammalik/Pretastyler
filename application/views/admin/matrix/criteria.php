<?php echo form_open_multipart();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<?php if (empty($criteria['page_type'])) { ?>
		<div class="col-md-12">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<div class="btn-group pull-right">
				<a href="/admin/matrix/field/edit/<?php print $criteria['field_id']; ?>.html" class="btn btn-danger">Back</a>
				<?php if (empty($criteria['page_type'])) { ?>
				<a href="/admin/matrix/criteria/edit/<?php print $criteria['criteria_id']; ?>.html" class="btn btn-warning">Discard</a>
				<?php } ?>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<?php if (empty($criteria['page_type'])) { ?>
				<a href="/admin/matrix/criteria/delete/<?php print $criteria['criteria_id'];?>.html" class="btn btn-danger">Delete</a>
				<?php } ?>
			</div>
			<br/>
		</div>
	</div>
	<div class="row">
		<!-- left column -->
		<?php if (empty($criteria['page_type'])) { ?>
		<div class="col-md-4">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" value="<?php print $criteria['criteria_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="criteria_id" value="<?php print $criteria['criteria_id'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" placeholder="Enter Criteria Name" name="name" value="<?php print $criteria['name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Position</span>
						<input type="text" class="form-control" placeholder="Enter the position" name="position" value="<?php print $criteria['position'];?>">
					</div>
					<br/>
					<div class="form-group">
						<label>Tool Tip</label>
						<textarea class="form-control" rows="3" placeholder="Enter Tool Tip" name="tooltip"><?php print $criteria['tooltip'];?></textarea>
					</div>
					<br/>
					<div class="form-group">
						<label>Importance</label>
						<select class="form-control" name="weight">
							<option value="I" <?php if ($criteria['weight'] == 'I') print 'selected="selected"'; ?>>I</option>
							<option value="E" <?php if ($criteria['weight'] == 'E') print 'selected="selected"'; ?>>E</option>
							<option value="O" <?php if ($criteria['weight'] == 'O') print 'selected="selected"'; ?>>O</option>
							<option value="NA" <?php if ($criteria['weight'] == 'NA') print 'selected="selected"'; ?>>NA</option>
							<option value="OV" <?php if ($criteria['weight'] == 'OV') print 'selected="selected"'; ?>>OV</option>
							<option value="CT" <?php if ($criteria['weight'] == 'CT') print 'selected="selected"'; ?>>CT</option>
						</select>
					</div>
					<br/>
					<?php if (empty($criteria['page_type'])) { ?>
					<div class="input-group">
						<label for="criteria-image-path">Image</label>
						<img src="/images/system/<?php print $criteria['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $criteria['image_path'] ?>">
					</div>
					<br/>
					<?php } ?>
					<div class="input-group">
						<label>New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload a new image for this criteria.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
		<!-- right column -->
		<?php if (empty($criteria['page_type'])) { ?>
		<div class="col-md-4">
			<!-- general form elements disabled -->
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Criteria</h3>
				</div><!-- /.box-header -->
				<div class="box-body no-padding">
					<table class="table table-striped ">
						<thead>
							<th>Type</th>
							<th>Value</th>
						</thead>
						<tr class="form-inline">
							<td>Vertical Type</td>
							<td>
								<?php 
								$option = 'V';
								$option_array = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Body Shape (Horizontal)</td>
							<td>
								<?php 
								$option = 'H';
								$option_array = array('11', '12', '13', '14', '15', '16');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Neck Length</td>
							<td>
								<?php 
								$option = 'N';
								$option_array = array('17', '18', '19', '20', '21');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Neck Type</td>
							<td>
								<?php 
								$option = 'N';
								$option_array = array('22', '23', '24');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Shoulder Type</td>
							<td>
								<?php 
								$option = 'S';
								$option_array = array('25', '26', '27');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Bust Size</td>
							<td>
								<?php 
								$option = 'B';
								$option_array = array('29', '30', '31', '32', '33', '74');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Back</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('41', '45');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Midriff</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('75', '42');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Stomach</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('76', '77', '78', '43');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Upper Arms</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('35', '34', '36');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Bottom</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('44', '46');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Inner Thighs</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('73', '47');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Outer Thighs</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('37', '38');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Lower Legs</td>
							<td>
								<?php 
								$option = 'P';
								$option_array = array('40', '39', '79', '80');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Weight</td>
							<td>
								<?php 
								$option = 'W';
								$option_array = array('69', '48', '49', '50', '51', '52');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Build (Bone Structure)</td>
							<td>
								<?php 
								$option = 'B';
								$option_array = array('53', '54', '55');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Age</td>
							<td>
								<?php 
								$option = 'A';
								$option_array = array('56', '57', '58', '59', '71', '72');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
						<tr class="form-inline">
							<td>Face Shape</td>
							<td>
								<?php 
								$option = 'F';
								$option_array = array('60', '61', '62', '63', '64', '65', '66', '67', '68', '70');
								foreach ($option_array as $value) {
								?>
								<div class="form-group">
									<label><?php print $option.$value ?></label>
									<select class="form-control" name="values[<?php print $option.$value ?>]">
										<option value="S" <?php if ($criteria[$option.$value] == 'S') print 'selected="selected"'; ?>>S</option>
										<option value="S<?php print $value ?>" <?php if ($criteria[$option.$value] == 'S'.$value) print 'selected="selected"'; ?>>S<?php print $value ?></option>
										<option value="A" <?php if ($criteria[$option.$value] == 'A') print 'selected="selected"'; ?>>A</option>
										<option value="A<?php print $value ?>" <?php if ($criteria[$option.$value] == 'A'.$value) print 'selected="selected"'; ?>>A<?php print $value ?></option>
										<option value="M" <?php if ($criteria[$option.$value] == 'M') print 'selected="selected"'; ?>>M</option>
										<option value="M<?php print $value ?>" <?php if ($criteria[$option.$value] == 'M'.$value) print 'selected="selected"'; ?>>M<?php print $value ?></option>
										<option value="X" <?php if ($criteria[$option.$value] == 'X') print 'selected="selected"'; ?>>X</option>
										<option value="X<?php print $value ?>" <?php if ($criteria[$option.$value] == 'X'.$value) print 'selected="selected"'; ?>>X<?php print $value ?></option>
									</select>
								</div>
								<?php } ?>
							</td>
						</tr>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (right) -->
		<?php } ?>
		<?php if (empty($criteria['page_type'])) { ?>
		<div class="col-md-4">
			<!-- general form elements disabled -->
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Comments</h3>
				</div><!-- /.box-header -->
				<div class="box-body no-padding">
					<table class="table table-striped ">
						<thead>
							<th>ID</th>
							<th>Comment</th>
							<th>Labels</th>
							<th>Plus 1</th>
							<th>Plus 2</th>
							<th>Plus 3</th>
							<th>Plus 4</th>
							<th>Delete</th>
						</thead>
						<?php foreach ($comment as $line) { ?>
						<tr class="form-inline">
							<td><a href="/admin/matrix/comment/edit/<?php print $line['criteria_comment_id'];?>.html"><?php print $line['criteria_comment_id'] ?></a></td>
							<td><?php print $line['Comment'] ?></td>
							<td><?php print $line['LABELS'] ?></td>
							<td><?php print $line['PLUS1'] ?></td>
							<td><?php print $line['PLUS2'] ?></td>
							<td><?php print $line['PLUS3'] ?></td>
							<td><?php print $line['PLUS4'] ?></td>
							<td><a href="/admin/matrix/comment/delete/<?php print $line['criteria_comment_id'];?>.html"><i class="glyphicon glyphicon-remove"></i></a></td>
						</tr>
						<?php } ?>
					</table>
					<a href="/admin/matrix/comment/add/<?php print $criteria['criteria_id'];?>.html" class="btn btn-primary button-save">Add a new comment</a>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (right) -->
		<?php } ?>
	</div>   <!-- /.row -->
	<?php if (empty($criteria['page_type'])) { ?>
	<div class="row">
		<!-- general form elements disabled -->
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Show Only if</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<?php foreach ($showifs as $row) { ?>
					<div class="form-group row">
						<label class="col-md-12"><a href="/admin/matrix/field/edit/<?php print $row['field_id']?>.html"><?php print $row['field_name']?></a></label>
						<div class="checkbox">
							<?php foreach ($row['criterias'] as $if_criteria) { ?>
							<div class="col-md-4">
								<label>
									<input type="checkbox" name="showif[]" value="<?php print $if_criteria['criteria_id']; ?>" <?php if ($if_criteria['checked']) print 'checked="checked"'; ?>> <?php print $if_criteria['name']; ?>
								</label>
							</div>
							<?php } 
							$rest_nums = (3 - (count($row['criterias']) % 3)) % 3;
							for ($i = 0; $i<$rest_nums; $i++){ ?>
							<div class="col-md-4">
								&nbsp;
							</div>
							<?php } ?>
						</div>
					</div>
					<br />
					<?php } ?>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
		<!-- general form elements disabled -->
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Hide Only if</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<?php foreach ($hideifs as $row) { ?>
					<div class="form-group row">
						<label class="col-md-12"><a href="/admin/matrix/field/edit/<?php print $row['field_id']?>.html"><?php print $row['field_name']?></a></label>
						<div class="checkbox">
							<?php foreach ($row['criterias'] as $if_criteria) { ?>
							<div class="col-md-4">
								<label>
									<input type="checkbox" name="hideif[]" value="<?php print $if_criteria['criteria_id']; ?>" <?php if ($if_criteria['checked']) print 'checked="checked"'; ?>> <?php print $if_criteria['name']; ?>
								</label>
							</div>
							<?php } 
							$rest_nums = (3 - (count($row['criterias']) % 3)) % 3;
							for ($i = 0; $i<$rest_nums; $i++){ ?>
							<div class="col-md-4">
								&nbsp;
							</div>
							<?php } ?>
						</div>
					</div>
					<br />
					<?php } ?>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<a href="/admin/matrix/field/edit/<?php print $criteria['field_id']; ?>.html" class="btn btn-danger">Back</a>
				<a href="/admin/matrix/criteria/edit/<?php print $criteria['criteria_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/admin/matrix/criteria/delete/<?php print $criteria['criteria_id'];?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>
	</div>
	<?php } ?>
</section><!-- /.content -->
<?php echo form_close(); ?>
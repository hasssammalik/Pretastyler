<?php echo form_open();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<?php if (empty($field['page_type'])) { ?>
		<div class="col-md-12">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<div class="btn-group pull-right">
				<a href="/admin/matrix/category/edit/<?php print $field['category_id']; ?>.html" class="btn btn-danger">Back</a>
				<?php if (empty($field['page_type'])) { ?>
				<a href="/admin/matrix/field/edit/<?php print $field['field_id']; ?>.html" class="btn btn-warning">Discard</a>
				<?php } ?>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<?php if (empty($field['page_type'])) { ?>
				<a href="/admin/matrix/field/delete/<?php print $field['field_id'];?>.html" class="btn btn-danger">Delete</a>
				<?php } ?>
			</div>
			<br/>
		</div>
	</div>
	<div class="row">
		<!-- left column -->
		<?php if (empty($field['page_type'])) { ?>
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
						<input type="text" class="form-control" value="<?php print $field['field_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="field_id" value="<?php print $field['field_id'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" placeholder="Enter Field Name" name="name" value="<?php print $field['name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Short Name</span>
						<input type="text" class="form-control" placeholder="Enter Field Short Name" name="short_name" value="<?php print $field['short_name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Position</span>
						<input type="text" class="form-control" placeholder="Enter the position" name="position" value="<?php print $field['position'];?>">
					</div>
					<br/>
					<div class="form-group"> 
						<div class="checkbox">
							<label>
								<input type="checkbox" name="NormW12" value="1" <?php if ($field['NormW12']) print 'checked="checked"'; ?>/>
								Norm H12 (W48 & W49 = W50)
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="NormW13" value="1" <?php if ($field['NormW13']) print 'checked="checked"'; ?>/>
								Norm H13 (W48 & W49 = W50)
							</label>
						</div>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<?php if (empty($field['page_type'])) { ?>
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Deep Search Information</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">Deep Search Name</span>
						<input type="text" class="form-control" placeholder="Enter Field Deep Search Name" name="deep_search_name" value="<?php print $field['deep_search_name'];?>">
					</div>
					<br/>
					<div class="form-group">
						<label>Deep Search Level</label>
						<div class="radio">
							<label class="radio-inline">
								<input type="radio" name="deep_search_level" class="deep_search_level" value="0" <?php if ($field['deep_search_level'] == 0) print 'checked="checked"'; ?>> Not Show in Deep Search
							</label>
							<label class="radio-inline">
								<input type="radio" name="deep_search_level" class="deep_search_level" value="1" <?php if ($field['deep_search_level'] == 1) print 'checked="checked"'; ?>> Top Level
							</label>
							<label class="radio-inline">
								<input type="radio" name="deep_search_level" class="deep_search_level" value="2" <?php if ($field['deep_search_level'] == 2) print 'checked="checked"'; ?>> Secondary Level
							</label>
						</div>
					</div>
					<br/>
					<div class="form-group">
						<label>Deep Search Parent Field</label>
						<select class="form-control" name="deep_search_parent_field_id" <?php if ($field['deep_search_level'] != 2) print 'disabled'; ?>>
							<option value="0" <?php if ($field['deep_search_parent_field_id'] == '0') print 'selected="selected"'; ?> >Please Select</option>
							<?php foreach($deep_search_parent_list as $row){ ?>
							<option value="<?php print $row['field_id'];?>" <?php if ($row['selected']) print 'selected="selected"'; ?> ><?php print $row['position'].'. - '.$row['field_id'].' - '.$row['short_name'];?></option>
							<?php } ?>
						</select>
						<p class="help-block">You <b>MUST</b> choose a parent field for <b>Secondary Level</b> fields.</p>
					</div>
					<div class="form-group">
						<label>Deep Search Required Field</label>
						<select class="form-control" name="deep_search_required_field_id" <?php if ($field['deep_search_level'] != 2) print 'disabled'; ?>>
							<option value="0" <?php if ($field['deep_search_required_field_id'] == '0') print 'selected="selected"'; ?> >Please Select</option>
							<?php foreach($deep_search_required_list as $row){ ?>
							<option value="<?php print $row['field_id'];?>" <?php if ($row['selected']) print 'selected="selected"'; ?> ><?php print $row['position'].'. - '.$row['field_id'].' - '.$row['short_name'];?></option>
							<?php } ?>
						</select>
						<p class="help-block">If you need this <b>Secondary Field</b> to be shown only when <b>another Secondary Field</b> applied, you need to set that Secondary Field here. <br /><b>Example:</b> <br /><b>Sleeve Style</b> need to be shown when a user selects <b>Sleeve Length</b>, both of them are <b>Secondary Fields</b>, so put <b>Sleeve Length</b> to the <b>Deep Search Required Field</b> of <b>Sleeve Style</b>.<br />See: <a href="/admin/matrix/field/edit/121.html">TOP - Sleeve Style</a></p>
					</div>
					<br/>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<?php } ?>
		</div><!--/.col (left) -->
		<!-- right column -->
		<?php if (empty($field['page_type'])) { ?>
		<div class="col-md-8">
			<!-- general form elements disabled -->
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Criteria</h3>
				</div><!-- /.box-header -->
				<div class="box-body no-padding">
					<table class="table table-striped">
						<thead>
							<th style="width: 10px">#</th>
							<th>Criteria Name</th>
							<th style="width: 20px">Image</th>
							<th style="width: 10px">Importance</th>
							<th style="width: 10px">Delete</th>
						</thead>
						<?php foreach ($criterias as $criteria) { ?>
						<tr>
							<td><?php print $criteria['position']; ?>.</td>
							<td><a href="/admin/matrix/criteria/edit/<?php print $criteria['criteria_id']; ?>.html"><?php print $criteria['name']; ?></a></td>
							<td><img class="hoverBigImage" src="/images/system/<?php print $criteria['image_path']; ?>" height=20></td>
							<td>
								<input type="hidden" name="criteria_ids[]" value="<?php print $criteria['criteria_id'] ?>">
								<select class="form-control" name="weight[]">
									<option value="I" <?php if ($criteria['weight'] == 'I') print 'selected="selected"'; ?>>I</option>
									<option value="E" <?php if ($criteria['weight'] == 'E') print 'selected="selected"'; ?>>E</option>
									<option value="O" <?php if ($criteria['weight'] == 'O') print 'selected="selected"'; ?>>O</option>
									<option value="NA" <?php if ($criteria['weight'] == 'NA') print 'selected="selected"'; ?>>NA</option>
									<option value="OV" <?php if ($criteria['weight'] == 'OV') print 'selected="selected"'; ?>>OV</option>
									<option value="CT" <?php if ($criteria['weight'] == 'CT') print 'selected="selected"'; ?>>CT</option>
								</select>
							</td>
							<td><a href="/admin/matrix/criteria/delete/<?php print $criteria['criteria_id'];?>.html"><i class="glyphicon glyphicon-remove"></i></a></td>
						</tr>
						<?php }?>
					</table>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<a href="/admin/matrix/criteria/add/<?php print $field['field_id']; ?>.html" class="btn btn-primary">Add a new criteria</a>
				</div>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
		<?php } ?>
	</div>   <!-- /.row -->
	<?php if (empty($field['page_type'])) { ?>
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
							<?php foreach ($row['criterias'] as $criteria) { ?>
							<div class="col-md-4">
								<label>
									<input type="checkbox" name="showif[]" value="<?php print $criteria['criteria_id']; ?>" <?php if ($criteria['checked']) print 'checked="checked"'; ?>> <?php print $criteria['name']; ?>
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
					<h3 class="box-title">Hide if</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<?php foreach ($hideifs as $row) { ?>
					<div class="form-group row">
						<label class="col-md-12"><a href="/admin/matrix/field/edit/<?php print $row['field_id']?>.html"><?php print $row['field_name']?></a></label>
						<div class="checkbox">
							<?php foreach ($row['criterias'] as $criteria) { ?>
							<div class="col-md-4">
								<label>
									<input type="checkbox" name="hideif[]" value="<?php print $criteria['criteria_id']; ?>" <?php if ($criteria['checked']) print 'checked="checked"'; ?>> <?php print $criteria['name']; ?>
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
				<a href="/admin/matrix/category/edit/<?php print $field['category_id']; ?>.html" class="btn btn-danger">Back</a>
				<a href="/admin/matrix/field/edit/<?php print $field['field_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/admin/matrix/field/delete/<?php print $field['field_id'];?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>
	</div>
	<?php } ?>
</section><!-- /.content -->
<?php echo form_close(); ?>
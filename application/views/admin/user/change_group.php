<?php echo form_open();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<!-- general form elements -->
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Change User Group for <?php print $user['first_name'] ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<label>Please Select New Group</label>
					<select name="new_group" class="form-control">
						<?php foreach ($groups as $row) { ?>
						<option value="<?php print $row['ugrp_id']?>" <?php if ($row['ugrp_id'] == $user['uacc_group_fk']) print 'selected="selected"'; ?>><?php print $row['ugrp_desc'] ?></option>
						<?php } ?>
					</select>
					<input type="hidden" name="user_id" value="<?php print $user['user_id'] ?>">
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
	</div>   <!-- /.row -->
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<div class="btn-group pull-right">
				<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
			</div>
			<br/>
		</div>
	</div>
</section><!-- /.content -->
<?php echo form_close(); ?>
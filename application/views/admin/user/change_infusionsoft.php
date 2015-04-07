<?php echo form_open();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<!-- general form elements -->
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Change Infusionsoft ID for <?php print $user['first_name'] ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<label>Please Enter New Infusionsoft</label>
					<input type="text" name="new_infusionsoft_id" class="form-control" value="<?php print $user['infusionsoft_id'] ?>">
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
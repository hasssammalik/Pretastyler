<?php echo form_open();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<!-- general form elements -->
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Delete Confirmation</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="callout callout-danger">
						<h4>Danger!</h4>
						<p>Are you sure you want to DELETE <?php print $delete_type.' '.$delete_id ?>?</p>
						<?php if ($delete_type == 'category') { ?>
						<p>You need to DELETE ALL GARMENTS belong to this category before you can delete this category.</p>
						<p>This action will also DELETE ALL FIELDS and CRITERIAS associated with this <?php print $delete_type.' '.$delete_id ?> and NOT RECOVERABLE.</p>
						<?php } else if ($delete_type == 'field') { ?>
						<p>This action will also DELETE ALL CRITERIAS associated with this <?php print $delete_type.' '.$delete_id ?> and NOT RECOVERABLE.</p>
						<?php } else if ($delete_type == 'criteria') { ?>
						<p>This action will DELETE this <?php print $delete_type.' '.$delete_id ?> FROM EVERYWHERE and NOT RECOVERABLE.</p>
						<?php } else if ($delete_type == 'garment') { ?>
						<p>This action will DELETE this <?php print $delete_type.' '.$delete_id ?> FROM EVERYWHERE and NOT RECOVERABLE.</p>
						<p>If you need this garment still be shown in Member's Wardrobe, simply disable it at front-end.</p>
						<p>This action could take up to 10 seconds.</p>
						<?php } else if ($delete_type == 'user') { ?>
						<p>This action will DELETE this <?php print $delete_type.' '.$delete_id ?> FROM EVERYWHERE and NOT RECOVERABLE.</p>
						<p>If you need this user still be in the system, simply deactivate her at Admin Panel.</p>
						<p>This action could take up to 10 seconds.</p>
						<?php } else if ($delete_type == 'comment') { ?>
						<p>This action will DELETE this <?php print $delete_type.' '.$delete_id ?> FROM EVERYWHERE and NOT RECOVERABLE.</p>
						<?php } else if ($delete_type == 'image') { ?>
						<p>This action will DELETE this <?php print $delete_type.' '.$delete_id ?> FROM EVERYWHERE and NOT RECOVERABLE.</p>
						<?php } ?>
						<input type="hidden" name="delete_id" value="<?php print $delete_id ?>">
						<input type="hidden" name="garment_id" value="<?php print $garment_id ?>">
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
	</div>   <!-- /.row -->
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<div class="btn-group pull-right">
				<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
				<input type="submit" class="btn btn-primary button-save" value="I'm Sure">
			</div>
			<br/>
		</div>
	</div>
</section><!-- /.content -->
<?php echo form_close(); ?>
<?php echo form_open();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<a href="/admin/matrix/question-comments.html" class="btn btn-danger">Back</a>
				<a href="/admin/matrix/question-comment/<?php print $garment['garment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
			</div>
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Overall Comments</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<pre><?php print_r($admin_comment); ?></pre>
						<textarea class="form-control" rows="3" placeholder="Enter Overall Comments" name="overall-comments"><?php print $admin_comment['overall'] ?></textarea>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Individual Field Comments</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<?php foreach ($admin_comment['individuals'] as $key=>$value) {?>
						<label class="col-md-12">Comments - <?php print $value['field_name'] ?> - Click <a href="/admin/matrix/field/edit/<?php print $value['field_id']?>.html" target="_blank">here</a> to this field.</label>
						<div class="col-md-4">
							<label>You Selected:</label>
							<div class="form-control">
								<?php if (isset($value['old_criteria_name'])) { ?>
								<label><?php print $value['old_criteria_name']?></label>
								<img src="/images/system/<?php print $value['old_criteria_image_path'] ?>">
								<?php } else {?>
								<label>Not Selected</label>
								<?php } ?>
							</div>
						</div>
							<div class="col-md-4">
							<label>Changed To:</label>
							<div class="form-control">
								<label><?php print $value['new_criteria_name']?></label>
								<img src="/images/system/<?php print $value['new_criteria_image_path'] ?>">
							</div>
						</div>
						<div class="col-md-4">
							<label>Comments:</label>
							<textarea class="form-control" rows="8" placeholder="Enter Comments for <?php print $value['field_name'] ?>" name="overall-comments"><?php print $value['content'] ?></textarea>
						</div>
						<?php } ?>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
	</div>   <!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<a href="/admin/matrix/question-comments.html" class="btn btn-danger">Back</a>
				<a href="/admin/matrix/question-comment/<?php print $garment['garment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
			</div>
			<br/>
		</div>
	</div>
</section><!-- /.content -->
<?php echo form_close(); ?>
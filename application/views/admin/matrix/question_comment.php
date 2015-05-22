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
		<div class="col-md-5">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Overall Comments</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="input-group">
						<label for="garment-image-path">Garment Image</label>
						<img src="/images/garment/<?php print $garment['image_path'] ?>">
					</div>
					<br/>
					<div class="form-group">
						<textarea class="form-control" rows="3" placeholder="Enter Overall Comments" name="overall-comments"><?php print $admin_comment['overall'] ?></textarea>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Email Preview</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<iframe src="/admin/matrix/comment-email/<?php print $garment['garment_id'] ?>.html" style="width: 100%;height: 1500px;"></iframe>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
		<div class="col-md-7">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Individual Field Comments</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<?php foreach ($admin_comment['individuals'] as $key=>$value) {?>
						<hr>
						<div class="row">
							<label class="col-md-12">Comments - <?php print $value['field_name'] ?> - Click <a href="/admin/matrix/field/edit/<?php print $value['field_id']?>.html" target="_blank">here</a> to this field.</label>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label class="col-md-12">You Selected:</label>
								<div class="col-md-12" style="border: 1px solid rgb(169, 169, 169);">
									<?php if (isset($value['old_criteria_name'])) { ?>
									<label class="col-md-12 text-center"><a href="/admin/matrix/criteria/edit/<?php print $value['old_criteria_id'] ?>.html" target="_blank"><?php print $value['old_criteria_name']?></a></label>
									<img class="col-md-6 col-md-offset-3" src="/images/system/<?php print $value['old_criteria_image_path'] ?>">
									<?php } else {?>
									<label class="col-md-12 text-center">Not Selected</label>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-4">
								<label class="col-md-12">Changed To:</label>
								<div class="col-md-12" style="border: 1px solid rgb(169, 169, 169);">
									<label class="col-md-12 text-center"><a href="/admin/matrix/criteria/edit/<?php print $value['new_criteria_id'] ?>.html" target="_blank"><?php print $value['new_criteria_name']?></a></label>
									<img class="col-md-6 col-md-offset-3" src="/images/system/<?php print $value['new_criteria_image_path'] ?>">
								</div>
							</div>
							<div class="col-md-4">
								<label class="col-md-12">Comments:</label>
								<textarea class="col-md-12" rows="8" placeholder="Enter Comments for <?php print $value['field_name'] ?>" name="overall-comments"><?php print $value['content'] ?></textarea>
							</div>
						</div>
						<hr>
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
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
						<label>Overall Comments</label>
						<textarea class="form-control" rows="3" placeholder="Enter Tool Tip" name="tooltip"><?php print $admin_comment[0]->content;?></textarea>
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
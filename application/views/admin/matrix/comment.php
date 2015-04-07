<?php echo form_open_multipart();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<div class="btn-group pull-right">
				<a href="/admin/matrix/criteria/edit/<?php print $comment['criteria_id']; ?>.html" class="btn btn-danger">Back</a>
				<?php if (empty($comment['page_type'])) { ?>
				<a href="/admin/matrix/comment/edit/<?php print $comment['criteria_comment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<?php } ?>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<?php if (empty($comment['page_type'])) { ?>
				<a href="/admin/matrix/comment/delete/<?php print $comment['criteria_comment_id'];?>.html" class="btn btn-danger">Delete</a>
				<?php } ?>
			</div>
			<br/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" value="<?php print $comment['criteria_comment_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="comment_id" value="<?php print $comment['criteria_comment_id'] ?>">
						<input type="hidden" name="criteria_id" value="<?php print $comment['criteria_id'] ?>">
					</div>
					<br/>
					<div class="form-group">
						<label>Comment</label>
						<textarea class="form-control" rows="3" placeholder="Enter Comment" name="comment"><?php print $comment['Comment'];?></textarea>
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Labels</span>
						<input type="text" class="form-control" placeholder="Enter Labels" name="labels" value="<?php print $comment['LABELS'];?>">
					</div>
					<div class="input-group">
						<span class="input-group-addon">Plus 1</span>
						<input type="text" class="form-control" placeholder="Enter Plus 1" name="plus1" value="<?php print $comment['PLUS1'];?>">
					</div>
					<div class="input-group">
						<span class="input-group-addon">Plus 2</span>
						<input type="text" class="form-control" placeholder="Enter Plus 2" name="plus2" value="<?php print $comment['PLUS2'];?>">
					</div>
					<div class="input-group">
						<span class="input-group-addon">Plus 3</span>
						<input type="text" class="form-control" placeholder="Enter Plus 3" name="plus3" value="<?php print $comment['PLUS3'];?>">
					</div>
					<div class="input-group">
						<span class="input-group-addon">Plus 4</span>
						<input type="text" class="form-control" placeholder="Enter Plus 4" name="plus4" value="<?php print $comment['PLUS4'];?>">
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
	</div>
</section><!-- /.content -->
<?php echo form_close(); ?>
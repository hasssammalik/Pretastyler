<?php echo form_open_multipart();?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-12">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<?php if (empty($category['page_type'])) { ?>
				<a href="/garment/ImageEdit/<?php print $category['category_id']; ?>.html" class="btn btn-warning">Discard</a>
				<?php } ?>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<?php if (empty($category['page_type'])) { ?>
				<a href="/garment/ImageEdit/<?php print $category['category_id'];?>.html" class="btn btn-danger">Delete</a>
				<?php } ?>
			</div>
			<br/>
		</div>
	</div>
	<div class="row">
	
		<!-- left column -->
		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-4">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="category-id" value="<?php print $category['category_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="category_id" value="<?php print $category['category_id'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="category-name" placeholder="Enter Category Name" name="name" value="<?php print $category['name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Position</span>
						<input type="text" class="form-control" id="category-position" placeholder="Enter the position" name="order" value="<?php print $category['order'];?>">
					</div>
					<br/>
					<?php if (!empty($category['image_path'])){ ?>
					<div class="input-group">
						<label for="category-image-path">Image</label>
						<img src="/images/system/<?php print $category['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $category['image_path'] ?>">
					</div>
					<br/>
					<?php } ?>
					<div class="input-group">
						<label for="category-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload a new image for this category.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
	


		<!-- centre column -->

		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-4">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="category-id" value="<?php print $category['category_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="category_id" value="<?php print $category['category_id'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="category-name" placeholder="Enter Category Name" name="name" value="<?php print $category['name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Position</span>
						<input type="text" class="form-control" id="category-position" placeholder="Enter the position" name="order" value="<?php print $category['order'];?>">
					</div>
					<br/>
					<?php if (!empty($category['image_path'])){ ?>
					<div class="input-group">
						<label for="category-image-path">Image</label>
						<img src="/images/system/<?php print $category['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $category['image_path'] ?>">
					</div>
					<br/>
					<?php } ?>
					<div class="input-group">
						<label for="category-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload a new image for this category.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (centre) -->



		<!-- right column -->


		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-4">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="category-id" value="<?php print $category['category_id'];?>" disabled>
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="category_id" value="<?php print $category['category_id'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="category-name" placeholder="Enter Category Name" name="name" value="<?php print $category['name'];?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Position</span>
						<input type="text" class="form-control" id="category-position" placeholder="Enter the position" name="order" value="<?php print $category['order'];?>">
					</div>
					<br/>
					<?php if (!empty($category['image_path'])){ ?>
					<div class="input-group">
						<label for="category-image-path">Image</label>
						<img src="/images/system/<?php print $category['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $category['image_path'] ?>">
					</div>
					<br/>
					<?php } ?>
					<div class="input-group">
						<label for="category-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload a new image for this category.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (centre) -->







	</div>   <!-- /.row -->
	<?php if (empty($category['page_type'])) { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<a href="/admin/matrix/categories.html" class="btn btn-danger">Back</a>
				<a href="/admin/matrix/category/edit/<?php print $category['category_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/admin/matrix/category/delete/<?php print $category['category_id'];?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>
	</div>
	<?php } ?>
</section><!-- /.content -->
<?php echo form_close(); ?>
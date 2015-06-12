<?php echo form_open_multipart();?>
<table>
<?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>



<!-- Main content -->
<section class="content">
	<div class="row">
		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-12">
		<?php } else {?>
		<div class="col-md-offset-4 col-md-4">
		<?php } ?>
			<div class="btn-group pull-right">
				<a href="/admin/matrix/categories.html" class="btn btn-danger">Back</a>
				<?php if (empty($category['page_type'])) { ?>
				<a href="/admin/matrix/category/edit/<?php print $category['category_id']; ?>.html" class="btn btn-warning">Discard</a>
				<?php } ?>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<?php if (empty($category['page_type'])) { ?>
				<a href="/admin/matrix/category/delete/<?php print $category['category_id'];?>.html" class="btn btn-danger">Delete</a>
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
		<!-- right column -->
		<?php if (empty($category['page_type'])) { ?>
		<div class="col-md-8">
			<!-- general form elements disabled -->
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Fields</h3>
				</div><!-- /.box-header -->
				<div class="box-body no-padding">
					<table class="table table-striped">
						<thead>
							<th style="width: 10px">#</th>
							<th>Field Name</th>
							<th style="width: 10px">Delete</th>
						</thead>
						<?php foreach ($fields as $field) { ?>
						<tr>
							<td><?php print $field['position']; ?>.</td>
							<td><a href="/admin/matrix/field/edit/<?php print $field['field_id']; ?>.html"><?php print $field['name']; ?></a></td>
							<td><a href="/admin/matrix/field/delete/<?php print $field['field_id'];?>.html"><i class="glyphicon glyphicon-remove"></i></a></td>
						</tr>
						<?php } ?>
					</table>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<a href="/admin/matrix/field/add/<?php print $category['category_id']; ?>.html" class="btn btn-primary">Add a new field</a>
				</div>
			</div><!-- /.box -->
		</div><!--/.col (right) -->
		<?php } ?>
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
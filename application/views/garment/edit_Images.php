<?php echo form_open_multipart();?>
<!-- Main content -->
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

<div class="row">
		<!-- left column -->
		
		<div class="col-md-4">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="garment-id" value="<?php print $garment['garment_id'];?>" disabled>
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="garment-name" placeholder="Enter garment Name" name="name" value="<?php print $garment['name'];?>" disabled>
					</div>
					<br/>
										
					<div class="input-group">
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="1">
						<input type="hidden" name="ori_image" value="<?php print $garment['image_path'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload first image.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<div class="col-md-12">		
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>

		</div><!--/.col (left) -->


		<!-- centre column -->
		
		<div class="col-md-4">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="garment-id" value="<?php print $garment['garment_id'];?>" disabled>
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="garment-name" placeholder="Enter garment Name" name="name" value="<?php print $garment['name'];?>" disabled>
					</div>
					<br/>
										
					<div class="input-group">
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $garment['image_path'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload sedcond image.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<div class="col-md-12">		
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>

		</div><!--/.col (left) -->



		<!-- right column -->
		
		<div class="col-md-4">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">General Information</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="input-group">
						<span class="input-group-addon">ID</span>
						<input type="text" class="form-control" id="garment-id" value="<?php print $garment['garment_id'];?>" disabled>
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="garment-name" placeholder="Enter garment Name" name="name" value="<?php print $garment['name'];?>" disabled>
					</div>
					<br/>
										
					<div class="input-group">
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $garment['image_path'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload last image.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
			<div class="col-md-12">		
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-warning">Discard</a>
				<input type="submit" class="btn btn-primary button-save" value="Save">
				<a href="/garment/ImageEdit/<?php print $garment['garment_id']; ?>.html" class="btn btn-danger">Delete</a>
			</div>
			<br/>
		</div>

		</div><!--/.col (left) -->


</div>   <!-- /.row -->





</section><!-- /.content -->
<?php echo form_close(); ?>
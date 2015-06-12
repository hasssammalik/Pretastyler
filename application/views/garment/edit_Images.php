<?php echo form_open_multipart();?>
<!-- Main content -->


	
<div class="row">
		<!-- left column -->
		
		<div class="col-md-offset-4 col-md-4">
		
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
						<span class="input-group-addon">ID is not changeable</span>
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">Name</span>
						<input type="text" class="form-control" id="garment-name" placeholder="Enter garment Name" name="name" value="<?php print $garment['name'];?>">
					</div>
					<br/>
										
					<div class="input-group">
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['image_url'] ?>">
						<input type="hidden" name="has_new_image" value="0">
						<input type="hidden" name="ori_image" value="<?php print $garment['image_url'] ?>">
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload a new image for this garnebt.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->


</div>   <!-- /.row -->





</section><!-- /.content -->
<?php echo form_close(); ?>
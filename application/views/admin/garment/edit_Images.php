<?php echo form_open_multipart();?>

<!--<?php print_r($_POST); ?> </br> -->


<!-- Main content -->

<div class="row" style="margin-right:0px;margin-left: 0px;">
<div class="col-md-12">		
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<a href="javascript:history.go(0)" class="btn btn-warning">Refresh</a>				
				<input type="submit" class="btn btn-primary button-save" value="Save">	
				<a href="/admin/garment/delete/<?php print  $garment['garment_id'];?>.html" class="btn btn-danger">Delete</a>			
			</div>
</div>
</div>

<div class="row" style="margin-right:0px;margin-left: 0px;">
		<!-- left column -->		
		<div class="col-md-4">		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Primary Image</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">															
					<div class="input-group">
						<label>Swap this image with: </label>
							<select name="firstImageDD" class="assessment-price-range">
								<option value="0">Please Select</option>
								<option value="1" >Back Image</option>
								<option value="2" >Board Image</option>
							</select>
						<br/>	
						<a href="/garment/DeleteImage/image_path/<?php print  $garment['garment_id'];?>.html" class="btn btn-warning">Delete This Image</a>
						<br/>
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['image_path'] ?>">
						<input type="hidden" name="has_new_image" value="1">
						<input type="hidden" name="ori_image" value="<?php print $garment['image_path'] ?>">
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">						
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image">
						<p class="help-block">Upload image.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
		

		<!-- Centre column -->
			
		<div class="col-md-4">		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Back Image</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">															
					<div class="input-group">
					<label>Swap this image with: </label>
							<select name="ThirdImageDD" class="assessment-price-range">
								<option value="0">Please Select</option>
								<option value="1" >Primary Image</option>
								<option value="2" >Board Image</option>
							</select>
						<br/>	
						<a href="/garment/DeleteImage/extra_image2_path.html/<?php print  $garment['garment_id'];?>.html" class="btn btn-warning">Delete This Image</a>
						<br/>
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['extra_image2_path'] ?>">
						<input type="hidden" name="has_new_image" value="1">
						<input type="hidden" name="ori_image3" value="<?php print $garment['extra_image2_path'] ?>">
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">						
					</div>
					<br/>
					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image3">
						<p class="help-block">Upload image.</p>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->	

		<!-- centre column -->
				
		<div class="col-md-4">		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Board Image</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">															
					<div class="input-group">
					<label>Swap this image with: </label>
							<select name="SecondImageDD" class="assessment-price-range">
								<option value="0">Please Select</option>
								<option value="1" >Back Image</option>
								<option value="2" >Primary Image</option>
							</select>
						<br/>	
						<a href="/garment/DeleteImage/extra_image1_path/<?php print  $garment['garment_id'];?>.html" class="btn btn-warning">Delete This Image</a>
						<br/>
						<label for="garment-image-path">Image</label>
						<img src="/images/garment/<?php print $garment['extra_image1_path'] ?>">
						<input type="hidden" name="has_new_image" value="1">
						<input type="hidden" name="ori_image2" value="<?php print $garment['extra_image1_path'] ?>">
						<input type="hidden" name="garment_id" value="<?php print $garment['garment_id']; ?>">						
					</div>
					<br/>

					<div class="input-group">
						<label for="garment-new-image">New Image</label>
						<input type="file" name="new_image2">
						<p class="help-block">Upload image.</p>						
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!--/.col (left) -->
			


		
			

</div>   <!-- /.row -->

<div class="row" style="margin-right:0px;margin-left: 0px;">
<div class="col-md-12">		
			<div class="btn-group pull-right">
				<a href="/admin/garment/general.html" class="btn btn-danger">Back</a>
				<a href="javascript:history.go(0)" class="btn btn-warning">Refresh</a>				
				<input type="submit" class="btn btn-primary button-save" value="Save">	
				<a href="/admin/garment/delete/<?php print  $garment['garment_id'];?>.html" class="btn btn-danger">Delete</a>			
			</div>
</div>
</div>

</section><!-- /.content -->
<?php echo form_close(); ?>
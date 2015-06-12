<?php echo form_open_multipart();?>
<!-- Main content -->
<!----test-->
<div class="row">
		<!-- left column -->
		
		<div class="col-md-4">
<?php
if ($this->input->post()){
					//if this is a edit request.
					$data['error_messages'] = array();
					$garment_id = $this->input->post('garment_id', TRUE);
									
					$has_new_image = $this->input->post('has_new_image', TRUE);
					$ori_image = $this->input->post('ori_image', TRUE);


					echo "hassam testing";

						print_r($garment_id);
						echo $garment_id;
						print $garment_id; 
					
					if (!empty($has_new_image)) {
						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/garment/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						
						


						print $config['file_name'];

						print_r('new_image');

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('new_image')) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
						} else {
							$image = $this->upload->data();
							$image_path = $image['file_name'];
							$is_image = $image['is_image'];
							if (!$is_image) {
								array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
							}
						}
					} else {
						$image_path = $ori_image;
					}
					if (empty($data['error_messages'])){
					}
				}	


?>
</div>
</div>


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
						<input type="hidden" name="has_new_image" value="0">
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
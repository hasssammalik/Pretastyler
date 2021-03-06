<div class="mainContent">
<?php echo form_open(); echo form_close(); ?>
	<div class="assessment">
		<div class="clearfix">
			<div class="leftSide">
				<h4><span>MAP YOUR GARMENT</span></h4>
				<div class="image">
					<span><img src="<?php print '/images/garment/'.$garment['image_path'] ?>" data-zoom-image="<?php print '/images/garment/'.$garment['image_path'] ?>" class="zoom" alt="<?php print $garment['name']?>"></span>
				</div>
				<p>Mouse over to magnify</p>
			</div>
			<div class="rightSide<?php print ($initial_data['last_one']?' last-one':'') ?>" garment_id="<?php print $garment['garment_id'] ?>">
				<ul class="filters">
					<?php foreach ($initial_data['current_field_criteria'] as $data_value) { 
							if (!empty($data_value['criteria_id'])) {?>
					<li field_id="<?php print $data_value['field_id']; ?>" criteria_id="<?php print $data_value['criteria_id']; ?>"><?php print $data_value['field_name'].': '.$data_value['criteria_name']; ?><a href="#">×</a></li>
							<?php } else { ?>
					<li field_id="<?php print $data_value['field_id']; ?>" style="background-color:#e72775;"><?php print $data_value['field_name'].': Update Now';?><a href="#">×</a></li>
					<?php }} ?>
				</ul>
				<a href="/garment/edit-general/<?php print $garment['garment_id'].'-'.url_title($garment['name']).'.html' ?>" class="button">Edit General Information</a>
				<a href="#" class="button" id="saveButton">Save Garment</a>
				<?php if ($this->flexi_auth->in_group(array('Administrators'))){ ?>
				<a href="#" class="button btn-check"<?php if (!empty($garment['date_admin_modified'])) { ?> style="background: #e72775;" <?php } ?>><?php if (empty($garment['date_admin_modified'])) {print 'CHECK';} else {print 'CHECKED';} ?></a>
				<?php }?>
				<?php //for admin comments
					if ($this->flexi_auth->in_group(array('Administrators'))){ ?>
						<div>Uploaded by <?php print $user_name ?> (<a href="/admin/garment/user/<?php print $garment['import_user_id'] ?>.html" target="_blank">See Her Garments</a>, <a href="/admin/user/view/<?php print $garment['import_user_id'] ?>.html" target="_blank">See Her Info</a>)</div>
						
						<div class="comment-section">
						<?php if (-1 == $initial_data['field']['field_id']) { ?>
						<h4><span class="comment-header" field_id="<?php print $initial_data['field']['field_id'] ?>">Overall Admin Comment:</span></h4>
						<?php } else { ?>
						<h4><span class="comment-header" field_id="<?php print $initial_data['field']['field_id'] ?>">Admin Comment for <?php print $initial_data['field']['short_name'] ?></span></h4>
						<?php } 
						if ($admin_comment) {
							foreach ($admin_comment as $comment){ ?>
						<textarea class="admin-comment<?php print (($comment->field_id == $initial_data['field']['field_id'])?' current-comment':'')?>" field_id="<?php print $comment->field_id ?>"><?php print $comment->content ?></textarea>
						<?php }
						} else {
							foreach ($initial_data['current_field_criteria'] as $comment){ ?>
						<textarea class="admin-comment<?php print (($comment['field_id'] == $initial_data['field']['field_id'])?' current-comment':'')?>" field_id="<?php print $comment['field_id'] ?>"></textarea>
						<?php } ?>
						<textarea class="admin-comment<?php print ((-1 == $initial_data['field']['field_id'])?' current-comment':'')?>" field_id="-1"></textarea>
						<?php } ?>
						</div>
					<?php } ?>
				<?php if (-1 == $initial_data['field']['field_id']) { ?>
				<h4><span class="current-field" field_id="<?php print $initial_data['field']['field_id'] ?>"><?php print $initial_data['field']['name'] ?></span></h4>
				<ul class="items">
					<?php foreach ($initial_data['criterias'] as $criteria) {?>
					<li>
						<label>
							<input type="radio" field_id="<?php print $criteria['field_id'] ?>" field_name="<?php print $criteria['field_name'] ?>" criteria_id="<?php print $criteria['criteria_id'] ?>" criteria_name="<?php print $criteria['criteria_name'] ?>">
							<div><span><?php print $criteria['field_name'].': '.$criteria['criteria_name'] ?></span></div>
							<div class="img">
								<span><img src="/images/system/<?php print $criteria['image_path'] ?>" alt="<?php print $criteria['criteria_name'] ?>"></span>
								<span class="overlay"><span><span><i class="icon-check"></i></span></span></span>
							</div>
							<div><span><?php print str_replace('\\', '', $criteria['tooltip']) ?></span></div>
						</label>
					</li>
					<?php } ?>
				</ul>
				<?php } else { ?>
				<h4><span class="current-field" field_id="<?php print $initial_data['field']['field_id'] ?>" short_name="<?php print $initial_data['field']['short_name'] ?>"><?php print $initial_data['field']['name'] ?></span></h4>
				<ul class="items">
					<?php foreach ($initial_data['criterias'] as $criteria) {?>
					<li>
						<label>
							<input type="radio" criteria_id="<?php print $criteria['criteria_id'] ?>" criteria_name="<?php print $criteria['name'] ?>">
							<div><span><?php print $criteria['name'] ?></span></div>
							<div class="img">
								<span><img src="/images/system/<?php print $criteria['image_path'] ?>" alt="<?php print $criteria['name'] ?>"></span>
								<span class="overlay"><span><span><i class="icon-check"></i></span></span></span>
							</div>
							<div><span><?php print str_replace('\\', '', $criteria['tooltip']) ?></span></div>
						</label>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
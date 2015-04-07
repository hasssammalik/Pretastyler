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
					<?php foreach ($initial_data['current_field_criteria'] as $data_value) { ?>
					<li field_id="<?php print $data_value['field_id'] ?>" criteria_id="<?php print $data_value['criteria_id'] ?>"><?php print $data_value['field_name'].': '.$data_value['criteria_name'] ?><a href="#">×</a></li>
					<?php } ?>
				</ul>
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
			</div>
		</div>
	</div>
</div>
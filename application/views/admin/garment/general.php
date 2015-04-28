<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Garment Data</h3>
				</div><!-- /.box-header -->
				<?php echo form_open();echo form_close(); ?>
				<div class="box-body table-responsive">
					<table id="garment-table" class="table garmentHoverImage table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Enabled?</th>
								<th>Image</th>
								<th>Category</th>
								<th>Name</th>
								<th>Retailer</th>
								<th>Owner</th>
								<th>Created</th>
								<th>Last Edit</th>
								<th>Last Admin Edit</th>
								<th>Clicks</th>
								<th>Edit Basic Info</th>
								<th>Edit Criteria</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Enabled?</th>
								<th>Image</th>
								<th>Category</th>
								<th>Name</th>
								<th>Retailer</th>
								<th>Owner</th>
								<th>Created</th>
								<th>Last Edit</th>
								<th>Last Admin Edit</th>
								<th>Clicks</th>
								<th>Edit Basic</th>
								<th>Edit Criteria</th>
								<th>Delete</th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

</section><!-- /.content -->
<script type="text/javascript">
$(function(){
	$("#garment-table").DataTable( {
		"lengthMenu": [[20, 50, 100], [20, 50, 100]],
		"serverSide": true,
		"stateSave": true,
		"ajax": {url: "/admin/general-garments.html", type: 'POST', data:{<?php print $filters ?>pas_secret_name:$("input[name=pas_secret_name]").val()}},
		"columns": [
			{ "data": "garment_id" },
			{ "data": "enabled", "searchable": false},
			{ "data": "image", "searchable": false , "sortable": false },
			{ "data": "category" },
			{ "data": "name" },
			{ "data": "retailer" },
			{ "data": "owner"},
			{ "data": "date_created" },
			{ "data": "date_modified" },
			{ "data": "date_admin_modified"},
			{ "data": "click_num"},
			{ "data": "edit_basic", "searchable": false , "sortable": false },
			{ "data": "edit", "searchable": false , "sortable": false },
			{ "data": "delete", "searchable": false , "sortable": false }
		],
		"order": [ 0, 'desc' ]
	} );
	
	
	
	$(document).on({
		mouseenter: function(){
			var real_img = $(this).attr("src");
			$(this).parent("td").css("position", 'relative');
			$(this).parent("td").append('<div class="hoverBigImageImage" style="position: absolute; top: 1px; left: 48px; max-width: 500px; min-width: 400px; padding: 6px; z-index: 2;"><img src="'+real_img+'" style="width: 100% !important;"></div>').fadeIn("fast");
		},
		mouseleave: function(){
			$( ".hoverBigImageImage" ).fadeOut("fast").remove();
		}
	}, '.hoverBigImage');
	
});
</script>
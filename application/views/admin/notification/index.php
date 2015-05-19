<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Notification</h3>
				</div><!-- /.box-header -->
				<?php echo form_open();echo form_close(); ?>
				<div class="box-body table-responsive">
					<table id="notifications-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Date Created</th>
								<!-- <th>Group</th> -->
								<th>Level</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Date Created</th>
								<!-- <th>Group</th> -->
								<th>Level</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Actions</th>
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
	$("#notifications-table").dataTable( {
		"lengthMenu": [[20, 50, 100], [20, 50, 100]],
		"serverSide": true,
		"stateSave": true,
		"ajax": {url: "/admin/getnotifications.html", type: 'POST', data:{ pas_secret_name:$("input[name=pas_secret_name]").val() }},
		"pagingType": "input",
		"columns": [
			{ "data": "notify_id", "width": "3%"},
			{ "data": "notify_date", "width": "14%" },
			{ "data": "notify_level", "width": "3%" },
			{ "data": "notify_title", "width": "18%" },
			{ "data": "notify_description" },
			{ "data": "notify_status", "width": "3%" },
			{ "data": "change_status", "searchable": false , "sortable": false }
		],
		"order": [ 0, 'desc' ]
	});
	
});
</script>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All User Data</h3>
				</div><!-- /.box-header -->
				<?php echo form_open();echo form_close(); ?>
				<div class="box-body table-responsive">
					<table id="user-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email Address</th>
								<th>Creation Date</th>
								<th>Last Login</th>
								<th>Garments</th>
								<th>Group</th>
								<th>Infusionsoft</th>
								<th>Active</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email Address</th>
								<th>Creation Date</th>
								<th>Last Login</th>
								<th>Garments</th>
								<th>Group</th>
								<th>Infusionsoft</th>
								<th>Active</th>
								<th>Edit</th>
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
	$("#user-table").dataTable( {
		"lengthMenu": [[20, 50, 100], [20, 50, 100]],
		"serverSide": true,
		"stateSave": true,
		"ajax": {url: "/admin/general-users.html", type: 'POST', data:{<?php print $filters ?>pas_secret_name:$("input[name=pas_secret_name]").val()}},
		"columns": [
			{ "data": "user_id", "width": "5%"},
			{ "data": "first_name", "width": "10%" },
			{ "data": "last_name", "width": "10%" },
			{ "data": "email" },
			{ "data": "creation_date" },
			{ "data": "last_login" },
			{ "data": "garments" },
			{ "data": "group_name" },
			{ "data": "infusionsoft_id" },
			{ "data": "active", "searchable": false , "sortable": false },
			{ "data": "edit", "searchable": false , "sortable": false },
			{ "data": "delete", "searchable": false , "sortable": false }
		],
		"order": [ 0, 'desc' ]
	} );
	$('#user-table tbody').on('click', '.fa-check-circle', function () {
		var input_user_id = $(this).parents('tr').find('td').eq(0).text();
		var icon = $(this);
		$.post("/admin/user/deactivate.html", {user_id: input_user_id ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data >= 1){
				icon.removeClass('fa');
				icon.removeClass('fa-check-circle');
				icon.addClass('glyphicon');
				icon.addClass('glyphicon-ban-circle');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
	$('#user-table tbody').on('click', '.glyphicon-ban-circle', function () {
		var input_user_id = $(this).parents('tr').find('td').eq(0).text();
		var icon = $(this);
		$.post("/admin/user/activate.html", {user_id: input_user_id ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data >= 1){
				icon.removeClass('glyphicon');
				icon.removeClass('glyphicon-ban-circle');
				icon.addClass('fa');
				icon.addClass('fa-check-circle');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
});
</script>
<!-- Main content -->
<section class="content adminNotificationPage">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Notification</h3>
					<?php if(!empty($notifications)){?>
						<span class="notification_readall mousehand readall">Read All Notification</span>
					<?php } else { ?>
						<span class="notification_readall mousehand unreadall">Unread All Notification</span>
					<?php } ?>
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
			{ "data": "notify_date", "width": "12%" },
			{ "data": "notify_level", "width": "4%" },
			{ "data": "notify_title", "width": "18%" },
			{ "data": "notify_description" },
			{ "data": "active", "width": "3%", "searchable": false , "sortable": false }
		],
		"order": [ 0, 'desc' ]
	});
	$('#notifications-table tbody').on('click', '.fa-envelope', function () {
		var input_notify_id = $(this).parents('tr').find('td').eq(0).text();
		var icon = $(this);
		$.post("/admin/set-notification-status.html", { id: input_notify_id , notify_status: 'read' ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data > 0){
				icon.removeClass('fa-envelope');
				icon.addClass('fa-envelope-o');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
	$('#notifications-table tbody').on('click', '.fa-envelope-o', function () {
		var input_notify_id = $(this).parents('tr').find('td').eq(0).text();
		var icon = $(this);
		$.post("/admin/set-notification-status.html", { id: input_notify_id , notify_status: 'unread' ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data > 0){
				icon.removeClass('fa-envelope-o');
				icon.addClass('fa-envelope');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
	$('.adminNotificationPage').on('click', '.readall', function () {
		var icon = $(this);
		$.post("/admin/set-notification-status.html", { notify_status_all: 'all', notify_status: 'read' ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data > 0){
				icon.removeClass('readall');
				icon.addClass('unreadall');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
	$('.adminNotificationPage').on('click', '.unreadall', function () {
		var icon = $(this);
		$.post("/admin/set-notification-status.html", { notify_status_all: 'all', notify_status: 'unread' ,pas_secret_name:$("input[name=pas_secret_name]").val()}, function(data){
			if (data > 0){
				icon.removeClass('unreadall');
				icon.addClass('readall');
			} else {
				alert("Something Error! Contact Programmer!");
			}
		});
	} );
});
</script>
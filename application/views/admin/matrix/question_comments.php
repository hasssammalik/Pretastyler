<!-- Main content -->
<?php echo form_open();echo form_close(); ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive">
					<table id="question-comments-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Edit</th>
								<th>Garment ID</th>
								<th>Uploader Nmae</th>
								<th>Name</th>
								<th>Date Created</th>
								<th>Email Sent?</th>
								<th>Email Sent Date</th>
								<th>Edit Basic</th>
								<th>Edit Criteria</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr>
								<th>Edit</th>
								<th>Garment ID</th>
								<th>Uploader Nmae</th>
								<th>Name</th>
								<th>Date Created</th>
								<th>Email Sent?</th>
								<th>Email Sent Date</th>
								<th>Edit Basic</th>
								<th>Edit Criteria</th>
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
	$("#question-comments-table").DataTable( {
		"lengthMenu": [[20, 50, 100], [20, 50, 100]],
		"serverSide": true,
		"stateSave": true,
		"pagingType": "input",
		"ajax": {url: "/admin/question-comments.html", type: 'POST', data:{pas_secret_name:$("input[name=pas_secret_name]").val()}},
		"columns": [
			{ "data": "edit", "searchable": false , "sortable": false },
			{ "data": "owner" },
			{ "data": "garment_id" },
			{ "data": "name" },
			{ "data": "date_created"},
			{ "data": "email_sent"},
			{ "data": "email_date" },
			{ "data": "edit_basic", "searchable": false , "sortable": false },
			{ "data": "edit_criteria", "searchable": false , "sortable": false },
		],
		"order": [ 1, 'desc' ]
	} );
});
</script>
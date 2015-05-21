<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive">
					<table id="category-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Garment ID</th>
								<th>Image</th>
								<th>Name</th>
								<th>Position</th>
								<th>Garments</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($categories as $category){ ?>
							<tr>
								<td><?php print $category['category_id'];?></td>
								<td><img class="hoverBigImage" src="/images/system/<?php print $category['image_path'];?>" height=20 /></td>
								<td><?php print $category['name'];?></td>
								<td><?php print $category['order'];?></td>
								<td><a href="/admin/garment/category/<?php print $category['category_id'];?>.html"><i class="fa fa-female"></i></a></td>
								<td><a href="/admin/matrix/category/edit/<?php print $category['category_id'];?>.html"><i class="fa fa-edit"></i></a></td>
								<td><a href="/admin/matrix/category/delete/<?php print $category['category_id'];?>.html"><i class="glyphicon glyphicon-remove"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Image</th>
								<th>Name</th>
								<th>Position</th>
								<th>Garments</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<a href="/admin/matrix/category/add.html" class="btn btn-primary">Add a new category</a>
				</div>
			</div><!-- /.box -->
		</div>
	</div>

</section><!-- /.content -->
<div class="table-responsive">
	<table class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th><center>Image</center></th>
				<th width="12%"><center>Action</center></th>
			</tr>
		</thead>
		<tbody>
			<?if(COUNT($project_image_data)>0)
				{
					foreach($project_image_data as $row)
					{?>
						<tr>
							<td align="center">
								<img src="<? echo site_url('userfiles/photogallery/small/'.$row['image']);?>" border='0' width='71px'/>
							</td>
							<td align="center">
								<a href='javascript:void(0);' onclick="confirm_delete('<?=$row['id']?>');"  rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a>
							</td>
						</tr>
				 <? }
				} ?>
			</tbody>


		</table>
	</div>

	<div class="pull-right">
		<div class="pagination_list">
			<div class="pagination"></div>
		</div>
	</div>

	<script>
		$(document).ready(function()
		{
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
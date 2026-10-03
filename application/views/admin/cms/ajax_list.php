<div class="table-responsive">
	<table class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				
				<th>Title</th>
				<th width="12%"><center>Action</center></th>
			</tr>
		</thead>
		<tbody>
			<?if(COUNT($cms_data))
			{
				foreach($cms_data as $row)
				{ $encryptid = encrypt_url($row['id']);
					?>
								
						<td><?=ucwords($row['title'])?></td>
						<td align="center">
							<a href='<? echo site_url('admins/'.$webpagename.'/update/'.$encryptid);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Edit"><i class='fa fa-pencil'></i></a>	| <a href='<? echo site_url('admins/'.$webpagename.'/details/'.$encryptid);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Detail"><i class='fa fa-eye'></i></a><!--  | <a href='javascript:void(0);' onclick="confirm_delete('<?=$encryptid?>');"  rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a> -->
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
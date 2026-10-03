<div class="table-responsive">
	<table class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				
				<th>Email</th>
				 <th width="20%"><center>Date</center></th>
				<!--<th><center>Phone No</center></th>
				<th>Email</th>
				<th width="12%"><center>Action</center></th> -->
			</tr>
		</thead>
		<tbody>
			<?if(COUNT($ltr_data))
			{
				foreach($ltr_data as $row)
				{ ?>
						
						<td><?=$row['newslwtter_email']?></td>
						<td  align="center"><?php echo date('d-m-Y',strtotime($row['createddate']));?></td>
						<!-- <td><?php echo ucwords($row['first_name']).' '.ucwords($row['last_name']);?></td>
						<td align="center"><?=ucwords($row['mobileno'])?></td>
						<td><?=ucwords($row['email'])?></td>
						
						<td align="center">
							 <a href='<? echo site_url('admins/'.$webpagename.'/update/'.$row['id']);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Edit"><i class='fa fa-pencil'></i></a> 
 <a href='javascript:void(0);' onclick="confirm_delete('<?=$row['id']?>');"  rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a> |  
								<a href='<? echo site_url('admins/'.$webpagename.'/details/'.$row['id']);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Detail"><i class='fa fa-eye'></i></a> 
						</td> -->
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
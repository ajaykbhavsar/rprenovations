<div class="table-responsive">
	<table class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th width="10%"><center>Is Active</center></th>
				<th width="12%;">Category</th>
				<th width="32%;">Project Name</th>
				<th width="9%;"><center>Image</center></th>
				<th width="15%"><center>Sort Order</center></th>
				<th width="12%"><center>Action</center></th>
			</tr>
		</thead>
		<tbody>
			<?if(COUNT($project_data)>0)
				{
					foreach($project_data as $row)
					{?>
						<tr>
							<td align="center">
								<?if($row['isactive']==1)
								{ ?>
									<a href='javascript:void(0);' onclick='inactive("<?=$row['uniqueid']?>");' data-toggle="tooltip" title='In Activate?'><i class="fa fa-check-square-o"></i></a>
								<? }
								else
									{ ?>
										<a href='javascript:void(0);' onclick='active("<?=$row['uniqueid']?>");' data-toggle="tooltip" title='Activate?'><i class="fa fa-square-o"></i></a>
									<? }?>
							</td>
							<td><?=ucwords($row['category'])?></td>
							<td><?=ucwords($row['projectname'])?></td>
							<td align="center">
								<a href='<? echo site_url('admins/'.$webpagename.'/manageimage/'.$row['uniqueid']);?>'>Manage</a>
							</td>
							<td align="center">
								<input type="text" name="sortorder[]" onkeypress="return numbersonly(event)" autocomplete="off" class="form-control <?=$row['id']?>" value="<?=$row['sort_order']?>" maxlength="3" style="text-align:center;" />
								<input type="hidden" name="id[]" autocomplete="off" value="<?=$row['id']?>"/>
							</td>
							<td align="center">
								<a href='<? echo site_url('admins/'.$webpagename.'/update/'.$row['uniqueid']);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Edit"><i class='fa fa-pencil'></i></a> 
								| <a href='javascript:void(0);' onclick="confirm_delete('<?=$row['uniqueid']?>');"  rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a>
								| <a href='<? echo site_url('admins/'.$webpagename.'/details/'.$row['uniqueid']);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Detail"><i class='fa fa-eye'></i></a> 
								
							</td>
						</tr>
				 <? }
				} ?>
			</tbody>


		</table>
	</div>

	<div class="pull-right">
		<input type="button" name="submit" Value="Update Sort Order" class="btn btn-primary" onclick="updatesortorder()" data-toggle="tooltip" style="margin-top: 10px;" title="Update Sort Order">
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
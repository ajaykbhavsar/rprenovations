<div class="table-responsive">
	<table class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th width="10%"><center>Is Active</center></th>
				<th width="10%">Banner</th>
				<th width="">Title</th>
				<th width="">Sub Title</th>
				<th width="12%"><center>Action</center></th>
			</tr>
		</thead>
		<tbody>
			<?if(COUNT($data))
			{
				foreach($data as $row)
				{ ?>
					<tr id="remove<?php echo encrypt_url($row['id']) ?>">
						<td align="center">
							<?if($row['status']==1)
							{ ?>
								<a href='javascript:void(0);' onclick='inactive("<?=encrypt_url($row['id'])?>");' data-toggle="tooltip" title='In Activate?'><i class="fa fa-check-square-o"></i></a>
							<? }
							else
							{ ?>
								<a href='javascript:void(0);' onclick='active("<?=encrypt_url($row['id'])?>");' data-toggle="tooltip" title='Activate?'><i class="fa fa-square-o"></i></a>
							<? }?>
						</td>
						<td><a href="<?=base_url('userfiles/homebanner/main/').$row['banner_image']?>" target="_blank"><img src='<?=base_url('userfiles/homebanner/main/').$row['banner_image']?>' border='0' width='71px'/></a></td>
						<td><?=$row['title']?></td>
						<td><?=$row['bannnersubtitle']?></td>
						<td align="center" class="spcas_icon text-center">   
							<a href='<? echo site_url('admins/homebanner/update/'.$row['id']);?>' rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Edit"><i class='fa fa-pencil'></i></a> 
								| <a href='javascript:void(0);' onclick='confirm_delete("<?=encrypt_url($row['id'])?>");'  rel='tooltipup' class='ctrl-button ctrl-small ctrl-default' data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a>	
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

	

	function confirm_delete(id)
	{

		var csrftokan1 = $("#csrftokan").val(); 
		if(csrftokan1 =='')
		{
			var csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}

		swal(
		{
			text: "Are you sure you want to Delete?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				$('.loadermain').show();
				$.ajax(
				{				
					type: "POST",
					url: "<? echo site_url('admins/'.$webpagename.'/delete');?>",
					data: "id="+id+"&<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
					async:false,
					dataType: 'json',
					success: function(data)
					{
						$("#csrftokan").val(data.csrfTokenHash);
						$('input:hidden[name="csrf_test_name"]').val('');
						$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
						GetAjaxList(pageurl);
						if(data.flag == 1)
						{
							// $('#remove'+id).remove();
							new PNotify(
							{
								title: 'Delete',
								text: 'Banner deleted successfully.',
								type: 'success',
								delay: 3000
							});
							 setTimeout(function() 
						  {
						    location.reload();  //Refresh page
						  }, 3000);
						}
					
						else
						{
							new PNotify(
							{
								title: 'Error',
								text: 'Something went wrong !',
								type: 'error',
								delay: 3000
							});
						}
					},
					complete: function()
					{
						 setTimeout(function() 
						  {
						    location.reload();  //Refresh page
						  }, 3000);
						$('#remove'+id).remove();
						setTimeout("$('.loadermain').hide();",3000);
					}
				});
			}
		});
	}
	function active(id)
	{
		swal(
		{
			text: "Are you sure you want to Activate?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				window.location = "<? echo site_url('admins/homebanner/active');?>/"+id;
			}
		});
	}

	function inactive(id)
	{
		swal(
		{
			text: "Are you sure you want to In activate?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				window.location = "<? echo site_url('admins/homebanner/inactive');?>/"+id;
			}
		});
	}
</script>
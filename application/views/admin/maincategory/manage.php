	<section role="main" class="content-body">
	<header class="page-header">
		<h2><?=$title?></h2>
	</header>
	<!-- start: page -->
		<section class="panel">
			<? if ($this->session->flashdata('error'))
			{
				echo "<div class='alert alert-danger'><i class='fa fa-times-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('error')."</div>";
			} ?>
			<? if ($this->session->flashdata('message'))
			{
				echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('message')."</div>";
			} ?>
			<header class="panel-heading">
				<h2 class="panel-title">
					<?=$subtitle?> 
					<div class="pull-right">
						<a href="<?php echo site_url('admins/'.$webpagename.'/add'); ?>" class="btn btn-primary btn_icon"><i class="fa fa-plus" aria-hidden="true"></i>Create</a>
					</div>
					<div class="clear"></div>
				</h2>
			</header>
			<div class="panel-body">
				<div class="row main_serch_area">
					<div class="searcharea">
                        <div class="col-md-12">
							<div class="mb-md searchboxmain">
								<ul>
									
									<li><input type="text" id="search_name" name="search_name" placeholder="Main Category" class="form-control" value="<?if($this->session->userdata('search_name')!=""){ echo $this->session->userdata('search_name');}else{ echo ""; }?>"/></li>
									
									<li class="btn_li">
										<input type="hidden" id="csrftokan" value="">
										<button class="btn btn-primary" onClick="ajax_btn_search();">Search</button>
										<button class="btn btn-default" onClick="ajax_btn_reset();">Reset</button>
									</li>
								</ul>
							</div>
						</div>
                        <div class="col-md-12 marginbtm10 text_m480_center">
							<span><label Class="control-label">Show</label></span>
							<select id="per_page" name="per_page" class="form-control myval" onChange="ajax_btn_search();">
								<option value="10" <?if($this->session->userdata('per_page')==10){echo "selected";}?>>10</option>
								
								<option value="25" <?if($this->session->userdata('per_page')==25){echo "selected";}?>>25</option>
								
								<option value="50" <?if($this->session->userdata('per_page')==50){echo "selected";}?>>50</option>
								
								<option value="100" <?if($this->session->userdata('per_page')==100){echo "selected";}?>>100</option>
							</select>
							<span><label class="control-label">Records</label></span>
						</div>                        
					</div>
				</div>
				<div id="ajaxBind"></div>
			</div>
		</section>
	<!-- end: page -->
</section>
<script type="text/javascript">
	
	var pageurl="<?php echo site_url('admins/'.$webpagename.'/manage_data/'.$this->session->userdata('page_num'))?>";

	$(document).ready(function ()
	{
		GetAjaxList(pageurl);
	});

	function ajax_btn_search()
	{
		GetAjaxList(pageurl);
	}

	function ajax_btn_reset()
	{
		$('#search_name').val('');
		$('#per_page').select2('val',10);
		GetAjaxList(pageurl);
	}

	function active(id)
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
			text: "Are you sure you want to Activate?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				$('.loadermain').show();
				$.ajax(
				{				
					type: "POST",
					url: "<? echo site_url('admins/'.$webpagename.'/active');?>",
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
							new PNotify(
							{
								title: 'Activate',
								text: 'Main Category  activated successfully.',
								type: 'success',
								delay: 3000
							});
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
						setTimeout("$('.loadermain').hide();",200);
					}
				});
			} 
		});
	}

	function inactive(id)
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
			text: "Are you sure you want to In Activate?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				$('.loadermain').show();
				$.ajax(
				{				
					type: "POST",
					url: "<? echo site_url('admins/'.$webpagename.'/inactive');?>",
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
							new PNotify(
							{
								title: 'In Activate',
								text: 'Main Category  in activated successfully.',
								type: 'success',
								delay: 3000
							});
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
						setTimeout("$('.loadermain').hide();",200);
					}
				});
			} 
		});
	}

	function confirm_delete(id)
	{
		var id= id;
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
							new PNotify(
							{
								title: 'Delete',
								text: 'Main Category  deleted successfully.',
								type: 'success',
								delay: 3000
							});
						}
						
						else
						{
							new PNotify(
							{
								title: 'Error',
								text: 'This Main Category is used in sub category !',
								type: 'error',
								delay: 3000
							});
						}
					},
					complete: function()
					{
						setTimeout("$('.loadermain').hide();",200);
					}
				});
			}
		});
	}

	function updatesortorder()
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
			text: "Are you sure you want to Update Sort Order?",
			buttons: true,
		}).then(function(confirm) 
		{
			if(confirm)
			{
				var id = $('input[name="id[]"]').map(function(){return $(this).val();}).get();
				var sortorder = $('input[name="sortorder[]"]').map(function(){return $(this).val();}).get();
				
				$('.loadermain').show();
				$.ajax(
				{
					type:"POST",
					url: "<?php echo site_url('admins/'.$webpagename.'/updatesortorder');?>",
					data:'sortorder='+sortorder+'&id='+id+"&<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
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
							new PNotify(
							{
								title: 'Sort Order Update',
								text: 'Sort Order updated successfully.',
								type: 'success',
								delay: 3000
							});
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
						setTimeout( "$('.loadermain').hide();",200);
					}
				});
			}
		});
	}

	function numbersonly(e)
	{
		var unicode=e.charCode? e.charCode : e.keyCode
		if(unicode!=8)
		{
			if(unicode<48||unicode>57) 
			{
				if(unicode==9)
				{
					return true;
				}
				else
				{
					return false 
				}
			}
		}
	}

	function GetAjaxList(pageurl)
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

		var name = $('#search_name').val();
		var per_page = $('#per_page').val();
		$('.loadermain').show();
		$.ajax(
		{				
			type: "POST",
			url: pageurl,
			data: "name="+name+"&per_page="+per_page+"&<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
			async:false,
			dataType: 'json',
			success: function(data)
			{
				$("#csrftokan").val(data.csrfTokenHash);
				$('input:hidden[name="csrf_test_name"]').val('');
				$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
				$("#ajaxBind").html(data.body);
				$(".pagination").html(data.pagination_link);
				$("html, body").animate({ scrollTop: 0 }, "slow");
			},
			complete: function()
			{
				setTimeout("$('.loadermain').hide();",200);

				$('#datatable-default').dataTable(
				{
					"searching": false,
					"bLengthChange": false,
					"bPaginate": false,
					"bInfo" : false,
					"order":[],
					"orderMulti": false,
					"columnDefs":[
					{
						"targets"  : [0,2,3],
						"orderable": false
					}]
				});

				$('.row.datatables-header').hide();
				$('.row.datatables-footer').hide();
			}
		});
	}
</script>
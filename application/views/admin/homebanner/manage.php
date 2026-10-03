<SCRIPT LANGUAGE="JavaScript">
	
	$(document).ready(function ()
	{
		var category_title = $('#category_title').val();
		var per_page = $('#per_page').val();
		$('.loadermain').show();

		$.ajax(
		{				
			type: "POST",
			url: "<?php echo site_url('admins/homebanner/manage_data/'.$this->session->userdata('page_num'))?>",
			data: "category_title="+category_title+"&per_page="+per_page+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
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
				setTimeout( "$('.loadermain').hide();",200);

				$('#datatable-default').dataTable(
				{
					"searching": false,
					"bLengthChange": false,
					"bPaginate": false,
					"bInfo" : false,
					"order":[],
					"orderMulti": false,
					"columnDefs": [
					{
					  "targets"  : [0,1,4],
					  "orderable": false
					}]
				});

				$('.row.datatables-header').hide();
				$('.row.datatables-footer').hide();
			}
		});
	});

	function GetAjaxList(pageurl)
	{
		var csrftokan1 = $("#csrftokan").val(); 
		var category_title = $('#category_title').val();
		var per_page = $('#per_page').val();
		if(csrftokan1 =='')
		{
			csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}
		$('.loadermain').show();

		$.ajax(
		{				
			type: "POST",
			url: pageurl,
			data: "category_title="+category_title+"&per_page="+per_page+"&<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
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
				setTimeout( "$('.loadermain').hide();",200);

				$('#datatable-default').dataTable(
				{
					"searching": false,
					"bLengthChange": false,
					"bPaginate": false,
					"bInfo" : false,
					"order":[],
					"orderMulti": false,
					"columnDefs": [
					{
					  "targets"  : [0,1,4],
					  "orderable": false
					}]
				});

				$('.row.datatables-header').hide();
				$('.row.datatables-footer').hide();
			}
		});
	}

	function ajax_btn_reset()
	{
		var csrftokan1 = $("#csrftokan").val(); 
		$('#category_title').val('');
		$('#per_page').select2('val',10);
		if(csrftokan1 =='')
		{
			csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}
		$('.loadermain').show();

		$.ajax(
		{				
			type: "POST",
			url: "<?php echo site_url('admins/homebanner/manage_data/')?>",
			data: "<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
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
				setTimeout( "$('.loadermain').hide();",200);

				$('#datatable-default').dataTable(
				{
					"searching": false,
					"bLengthChange": false,
					"bPaginate": false,
					"bInfo" : false,
					"order":[],
					"orderMulti": false,
					"columnDefs": [
					{
					  "targets"  : [0,1,4],
					  "orderable": false
					}]
				});

				$('.row.datatables-header').hide();
				$('.row.datatables-footer').hide();
			}
		});
	}

	function ajax_btn_search()
	{
		var csrftokan1 = $("#csrftokan").val(); 
		var category_title = $('#category_title').val();
		var per_page = $('#per_page').val();
		if(csrftokan1 =='')
		{
			csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}
		$('.loadermain').show();

		$.ajax(
		{				
			type: "POST",
			url : "<?php echo site_url('admins/homebanner/manage_data');?>",
			data: "category_title="+category_title+"&per_page="+per_page+"&<?php echo $this->security->get_csrf_token_name(); ?>="+csrftokan,
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
				setTimeout( "$('.loadermain').hide();",200);

				$('#datatable-default').dataTable(
				{
					"searching": false,
					"bLengthChange": false,
					"bPaginate": false,
					"bInfo" : false,
					"order":[],
					"orderMulti": false,
					"columnDefs": [ 
					{
					  "targets"  : [0,1,4],
					  "orderable": false
					}]
				});

				$('.row.datatables-header').hide();
				$('.row.datatables-footer').hide();
			}
		});
	}
</SCRIPT>

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
					<a href="<?php echo site_url('admins/homebanner/add'); ?>" class="btn btn-primary btn_icon"><i class="fa fa-plus" aria-hidden="true"></i>Create</a>
				</div>
				<div class="clear"></div>
			</h2>
		</header>
		
		<div class="panel-body">
			<div class="row">
				<div class="searcharea">
					<div class="col-md-3 marginbtm10">
						<span><label Class="control-label">Show</label></span>
						<select id="per_page" name="per_page" class="form-control myval" onChange="ajax_btn_search();">
							<option value="10" <?if($this->session->userdata('per_page')==10){echo "selected";}?>>10</option>
							
							<option value="25" <?if($this->session->userdata('per_page')==25){echo "selected";}?>>25</option>
							
							<option value="50" <?if($this->session->userdata('per_page')==50){echo "selected";}?>>50</option>
							
							<option value="100" <?if($this->session->userdata('per_page')==100){echo "selected";}?>>100</option>
						</select>
						<span><label class="control-label">Records</label></span>
					</div>
					<div class="col-md-9">
						<div class="mb-md searchboxmain">
						<input type="hidden" id="csrftokan" value="">
							
						</div>
					</div>
				</div>
			</div>
			<br>
			<div id="ajaxBind"></div>
		</div>
	</section>
	<!-- end: page -->
</section>
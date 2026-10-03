<section role="main" class="content-body">
	<header class="page-header">
		<h2><?=$title?></h2>
	</header>
	<style type="text/css">
		.mainHeader{background:#fff!important;}
	</style>
	<!-- start: page -->
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">

					<div class="pull-right">
						<a href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num'));?>" class="btn btn-primary btn_icon"><i class="fa fa-arrow-left"></i>Back</a>

					</div>

					<h2 class="panel-title"><?=ucwords($subtitle)?></h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none">

							<tr>
								<td width="200" height=30><b> Main Category Name </b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['name'] != ""){echo ucwords($details['name']);}else{echo "--";}?>
							</td>
						</tr>
						
			<!--<tr>
				<td width="200" height=30><b>Image</b></td>
				<td width="30" align="center">:</td>
				<td><img src="<?php echo site_url('userfiles/maincategory/'.$details['image'])?>" width="100" height="100"></td>
			</tr>
			<tr>
				<td width="200" height=30><b>Description</b></td>
				<td width="30" align="center">:</td>
				<td><?if($details['description'] != ""){echo $details['description'];}else{echo "--";}?></td>
			</tr>-->
			
			<tr>
				<td width="200" height=30><b>Short Order</b></td>
				<td width="30" align="center">:</td>
				<td><?if($details['sort_order'] != ""){echo $details['sort_order'];}else{echo "--";}?>
			</td>
		</tr>
		<tr>
			<td width="200" height=30><b>Is Active</b></td>
			<td width="30" align="center">:</td>
			<td>
				<?php 
				if($details['isactive']==1){
					echo $isactive='True';

				}else{
					echo $isactive='False';
				}
				?>
			</td>
		</tr>


	</table>	
</div>
</div>
</section>
</div>
</div>
<!-- end: page -->
</section>
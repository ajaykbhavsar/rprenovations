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
						<h2 class="panel-title"><?=$subtitle?></h2>
					</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table border="0" cellpadding="3" cellspacing="0" width="100%">
							
							<tr>
								<td width="200" height=30><b>Title</b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['title'] != ""){ echo ucwords($details['title']);}else{echo "--";}?></td>
							</tr>
							<tr>
								<td width="200" height=30><b> Description</b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['description'] != ""){ echo ucwords($details['description']);}else{echo "--";}?></td>
							</tr>
							
							
						</table>	
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- end: page -->
</section>
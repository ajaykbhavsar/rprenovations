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
								<td width="200" height=30><b> Category Name </b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['categoryname'] != ""){echo ucwords($details['categoryname']);}else{echo "--";}?>
								</td>
							</tr>

							<tr>
								<td width="200" height=30><b>Project name </b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['projectname'] != ""){echo ucwords($details['projectname']);}else{echo "--";}?>
								</td>
							</tr>

							<tr>
								<td width="200" height=30><b>Short Description</b></td>
								<td width="30" align="center">:</td>
								<td><? if($details['shortdesc']!="")
								{ 
									echo $details['shortdesc'];
								} 
								else
								{ 
								echo"--";
								} 
								?></td>
							</tr>
							<tr>
								<td width="200" height=30><b>Detail Description</b></td>
								<td width="30" align="center">:</td>
								<td><? if($details['detaildesc']!="")
								{ 
									echo $details['detaildesc'];
								} 
								else
								{ 
								echo"--";
								} 
								?></td>
							</tr>
							
							<tr>
								<td width="200" height=30><b>Is Active</b></td>
								<td width="30" align="center">:</td>
								<td><? 
								if($details['isactive']==1)
								{?>
								  <input type='checkbox' disabled="disabled" checked>
								<?} 
								else
								{ ?>
								 <input type='checkbox' disabled="disabled" >
								<?} 
								?></td>
							</tr>
							
							<tr>
								<td width="200" height=30><b>Project Images</b></td>
								<td width="30" align="center">:</td>
								<td><?
									$projectimage = $this->project_m->GetProjectAllimagebyid($details['id']);
									if (count($projectimage)>0)
									{
									  foreach ($projectimage as $key => $list2)
									   {
										 $pimage = $list2['image'];
										 echo "<img src='".site_url('userfiles/photogallery/small')."/".$pimage."' border='0'/> ";
									   }
									}
									else
									{ 
									  echo "-";
									} 
								?></td>
							</tr>
							<tr>
								<td width="200" height=30><b>Short Order</b></td>
								<td width="30" align="center">:</td>
								<td><?if($details['sort_order'] != ""){echo $details['sort_order'];}else{echo "--";}?></td>
							</tr>
						</table>	
					</div>
				</div>
			</section>
		</div>
	</div>
		<!-- end: page -->
</section>
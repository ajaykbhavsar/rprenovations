<section class="banner-section project mt-110 rmt-70">
    <div class="container">
        <div class="banner-inner z">
            <div class="page-title">
                <h2>Projects</h2>
                <!-- <span>company details</span> -->
            </div>
           <!--  <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<? echo site_url('');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                </ol>
            </nav> -->
        </div>
    </div>
</section>

<section class="projects_section">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
			<?$i=0;
			foreach($categories as $list)
			{
				if($list['projectcount'] > 0)
				{?>
				  <li class="nav-item">
					<a class="nav-link <?if($i==0){?>active<?}?>" id="<?=$list['slug']?>-tab" data-toggle="tab" href="#<?=$list['slug']?>" role="tab" aria-controls="<?=$list['slug']?>" aria-selected="false"><?=$list['name']?></a>
				  </li>
			  <?$i++;}
			}?>
        </ul>
		<div class="tab-content" id="myTabContent">
			<?$i=0;
				foreach($categories as $list)
			    {
					if($list['projectcount'] > 0)
					{
						$projectslist=$this->project_fm->get_projects_bycategory($list['uniqueid']);
						?>
							<div class="tab-pane fade <?if($i==0){?>show active<?}?>" id="<?=$list['slug']?>" role="tabpanel" aria-labelledby="<?=$list['slug']?>-tab">
								<ul class="projects_list">
									<?if(count($projectslist)>0)
										{
											foreach($projectslist as $list1)
											{?>
												<li class="wow zoomIn">
													<a href="<? echo site_url('projects/project_detail').'/'.$list1['uniqueid'];?>">
														<img src="<? echo site_url('userfiles/photogallery/main').'/'.$list1['image'];?>" class="img-fluid" alt="<?=$list1['projectname']?>" style="height: 285px">
														<p><?=$list1['projectname']?></p>
													</a>
												</li>
										  <?}
										}?>
								</ul>
							</div>
						<?
						$i++;
					}
				}?>
		</div>
    </div>
</section>
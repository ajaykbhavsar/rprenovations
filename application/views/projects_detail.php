<section class="banner-section projectbanner mt-110 rmt-70">
    <div class="container">
        <div class="banner-inner">
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

        <div class="section-title wow fadeInUp">
            <h2 class="text-center"><?=ucwords($projectdetails['projectname'])?></h2><br><br>
        </div>

        <ul class="projectsImages">
			<?$imagedata=$this->project_fm->getallprojectimage($projectdetails['id']);
				if(count($imagedata)>0)
				{					
					foreach($imagedata as $imagelist1)
					{?>
						<li class="wow zoomIn">
							<a class="image-popup-vertical-fit" href="<? echo site_url('userfiles/photogallery/main').'/'.$imagelist1['image'];?>" title="<?=ucwords($projectdetails['projectname'])?>">
								<img src="<? echo site_url('userfiles/photogallery/main').'/'.$imagelist1['image'];?>" alt="<?=ucwords($projectdetails['projectname'])?>" />
								<i class="fa fa-search-plus" aria-hidden="true"></i>
							</a>
						</li>
				  <?}
				}?>
        </ul>
    </div>
</section>
<aside id="sidebar-left" class="sidebar-left">
	<div class="sidebar-header">
		<div class="sidebar-title">
			Navigation
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>
	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="<?if($webpagename == "dashboard"){?>nav-active<?}?>">
						<a href="<?=site_url('admins/dashboard');?>" class="iconsmall">
							<img src="<?=site_url('assets/admin/images/icon/home.png')?>"/>
							<span>Dashboard</span>
						</a>
					</li>
					 <?php if($this->session->userdata('role_id')==1){?>
						<li class="<?if($webpagename == "maincategory" || $webpagename == "category" || $webpagename == "author" || $webpagename == "publisher" || $webpagename == "homebanner"|| $webpagename == "attributes"){?>nav-parent nav-expanded nav-active<?}else{?>nav-parent<?}?>">
								<a class="iconsmall">
									<img src="<?=site_url('assets/admin/images/icon/new/team.svg')?>"/>
									<span>Master</span>
								</a>
								<ul class="nav nav-children">
									<li class="<?if($webpagename == "homebanner"){?>nav-active<?}?>">
										<a href="<? echo site_url('admins/homebanner');?>">Homebanner</a>
									</li>
									<li class="<?if($webpagename == "maincategory"){?>nav-active<?}?>">
										<a href="<? echo site_url('admins/maincategory');?>">Main Category</a>
									</li>
								</ul>
						</li>
						
						<li class="<?if($webpagename == "project"){?>nav-active<?}?>">
							<a href="<?=site_url('admins/project');?>" class="iconsmall">
								<img src="<?=site_url('assets/admin/images/icon/new/service.svg')?>"/>
								<span> Project</span>
							</a>
						</li>

						<li class="<?if($webpagename == "gallery"){?>nav-active<?}?>">
							<a href="<?=site_url('admins/gallery');?>" class="iconsmall">
								<img src="<?=site_url('assets/admin/images/icon/new/service.svg')?>"/>
								<span>Gallery</span>
							</a>
						</li>
						
						<li class="<?if($webpagename == "cms"){?>nav-active<?}?>">
							<a href="<?=site_url('admins/cms');?>" class="iconsmall">
								<img src="<?=site_url('assets/admin/images/icon/new/cms.svg')?>"/>
								<span>CMS</span>
							</a>
						</li>
						
						<li class="<?if($webpagename == "newsletter"){?>nav-active<?}?>">
							<a href="<?=site_url('admins/newsletter');?>" class="iconsmall">
								<img src="<?=site_url('assets/admin/images/icon/subscriber.png')?>"/>
								<span>Newsletter</span>
							</a>
						</li>
					<?}?>
				</ul>
			</nav>
		</div>
	</div>
</aside>
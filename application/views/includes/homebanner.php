<div class="homeslide">
<?
  	if(count($homebanner)>0)
  	{
  		foreach ($homebanner as $list) 
  		{?>
			<section class="hero-section text-center mt-110 rmt-70">
				<img src="<?= site_url('userfiles/homebanner/main').'/'.$list['banner_image']?>" class="img-fluid" alt="image">
				<div class="container">
					<div class="hero-content">
						<h1 class="text-bold text-white"><?=$list['title']?></h1>
						<h1 class="text-lighter"><?=$list['bannnersubtitle']?></h1>
						<a class="scroll-down scroll" href="#aboutus">
							<div class="scroll-box"></div>
						</a>
					</div>
				</div>
			</section>	
  	  <?}
  	}
  	else
  	{ ?>
  		<section class="hero-section text-center mt-110 rmt-70">
			<img src="<? echo site_url('assets/images/hero.png');?>" class="img-fluid" alt="image">
			<div class="container">
				<div class="hero-content">
					<h1 class="text-bold text-white">Let Your Home Be</h1>
					<h1 class="text-lighter">Unique and Stylish</h1>
					<a class="scroll-down scroll" href="#aboutus">
						<div class="scroll-box"></div>
					</a>
				</div>
			</div>
		</section>
  	<? } ?>
</div>
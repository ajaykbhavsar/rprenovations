<?php $this->load->view('includes/homebanner.php');?>
<section id="aboutus" class="wp-section pt-150 rmb-100 wow fadeInUp" style="background-image: url('assets/images/introbg.jpg');">
	<?php $get_homeabout=$this->cms_fm->get_homeabout(); ?>
    <?=$get_homeabout['description']?>
</section>


<section class="apartment-section text-center pt-185">
    <div class="container">
        <div class="section-title mb-75">
            <h2 class="wow fadeInUp">Our <span class="thin">Projects</span></h2>
            <!--<p class="wow fadeInUp">Lorem Lipsum Text</p>-->
        </div>
        <br>
        <div class="projects_section">
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
						$projectslist=$this->dashboard_fm->get_projects_bycategory($list['uniqueid']);
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
    </div>
</section>


<section class="video-section pt-70">
	<?php $get_homevideo=$this->cms_fm->get_homevideo(); ?>
    <?=$get_homevideo['description']?>
</section>


<section class="success-section pt-140 pb-100">
	<?php $get_homecounter=$this->cms_fm->get_homecounter(); ?>
    <?=$get_homecounter['description']?>
</section>

<section class="testimonials-section">
  <div class="container">
    <div class="section-header">
      <h2> Our Clients </h2> 
    </div>

    <div class="testimonials-slider">
      <div class="testimonial-card">       
        <img src="<? echo site_url('assets/images/logoone.jpg')?>"/>
      </div>
      <div class="testimonial-card">       
        <img src="<? echo site_url('assets/images/logotwo.jpg')?>"/>
      </div>
      <div class="testimonial-card">       
        <img src="<? echo site_url('assets/images/logothree.jpg')?>"/>
      </div>
      <div class="testimonial-card">       
        <img src="<? echo site_url('assets/images/logofour.jpg')?>"/>
      </div>


       
    </div>
      </div>
  </section> 

<section class="call-action wow fadeInUp">
	<div class="container">
		<div class="call-action-inner">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="section-title text-white rmb-35">
					  <!--<h6>get quote</h6>-->
					   <h2>Subscribe Now</h2>
				   </div>
				</div>
				<div class="col-lg-6">
					<form name="newsletter_form" id="newsletter_form" class="subscribe" method="post" onsubmit="checkemail();">
						<div id="successmsg_footer" class='success' style="display: none;">Successfully
							Subscribe.</div>
						<div id="errormessage_exist1" class='failure' style="display: none;">This email is
							already exists. You can not duplicate this email.</div>
						<div id="valid" class='failure' style="display: none;">Please enter your email.</div>
						<div class="error_text" id="errormsg_footer" style="display:none;">Something Went Wrong.
							Please try again!</div>
						<div class="input-group">
							<input type="text" value="" name="subscribe" class="required email form-control"
								id="subscribe_emial" placeholder="Enter Your Email Id" onblur="checkemail();">
							<input type="hidden" id="csrftokan1" value="" />
							<input type="hidden" name="heading_V" value="Subscriber Details">
							<input type="hidden" name="footer_V"
								value="Iteriorbulls. All Rights Reserved">
							<button type="button" class="theme-btn style-two" onclick="sendSubscriberform()" id="btnsubmit_footer">subscribe</button>
							<span id="errormessage_exist" style="display:none; color:#ff0000">This email is
								already exists. You can not duplicate this email.</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
     $(document).ready(function() {
        $("#newsletter_form").validate();
    });

    function sendSubscriberform() {
      var subscribe = $('#subscribe_emial').val();

      if($("#newsletter_form").valid())
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

          $.ajax({    
          type:'POST',
           url:"<?php echo site_url('dashboard/addnewsletter');?>",
             data: {'subscribe': subscribe, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
            async:false,
             dataType: 'json',
       
              success : function (data)
              {
              
                $("#csrftokan").val(data.csrfTokenHash);
                $('input:hidden[name="csrf_test_name"]').val('');
                $('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
                if(data.flag == 4)
                {
                    $("#errormessage_exist1").show();
                    $('#errormessage_exist1').delay(3000).fadeOut();
                    $('#newsletter_form')[0].reset();
                 
                }
                else if(data.flag == 5)
                {
                    $('#valid').show();
                    $('#valid').delay(3000).fadeOut();
                    $('#newsletter_form')[0].reset();
                }else if(data.flag == 1){
                    $('#successmsg_footer').show();
                    $('#successmsg_footer').delay(3000).fadeOut();
                    $('#newsletter_form')[0].reset();
                }else{
                    $('#errormsg_footer').show();
                    $('#errormsg_footer').delay(3000).fadeOut();
                    $('#newsletter_form')[0].reset();
                }
                    $("#errormessage_exist").hide();
                    $('#btnsubmit_footer').prop('disabled', false);
                    $('#newsletter_form')[0].reset();
                    //setInterval('window.location.reload()', 4000);
              }
            });
        }
        
    }

</script>
 <script>
    $(document).ready(function(){
      $('.testimonials-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        pauseOnHover: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows: true,
              dots: true
            }
          }
        ]
      });
    });
  </script>

<script>
  function checkemail()
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

    var subscribe_emial = $("#subscribe_emial").val();
    var flag=true;
    $.ajax(
    {
      type : "POST",
      url:"<?php echo site_url('dashboard/checkemail');?>",
      data: {'subscribe': subscribe_emial, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
      async:false,
      dataType: 'json',
      success : function (data)
      {
        $("#csrftokan").val(data.csrfTokenHash);
        $('input:hidden[name="csrf_test_name"]').val('');
        $('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
        if(data.flag == 1)
        {
          $("#errormessage_exist").show();
          flag=false;
        }
        else
        {
          $("#errormessage_exist").hide();
          flag=true;
        }
      },
    });
    return flag;
  }
</script>
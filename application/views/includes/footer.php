<footer class="footer-section pt-70 wow fadeInUp">
            <div class="container">
              
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="instagram-posts">
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram1.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram2.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram3.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram4.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram5.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <img src="<? echo site_url('assets/images/instagram6.png');?>" alt="Instagram">
                                <div class="instagram-overlay">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Place <div> tag where you want the feed to appear -->
<!-- <div id="curator-feed-default-feed-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>--> <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<!-- <script type="text/javascript">
    /* curator-feed-default-feed-layout */
    (function(){
    var i,e,d=document,s="script";i=d.createElement("script");i.async=1;i.charset="UTF-8";
    i.src="https://cdn.curator.io/published/4ff67379-eaa7-415c-a478-061e4277374d.js";
    e=d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
    })();
</script> -->
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="contact-widget">
							<?php $get_footercontact=$this->cms_fm->get_footercontact(); ?>
							<?=$get_footercontact['description']?>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Footer Bottom Area-->
            <div class="footer-bottom mt-70">
               <?php $get_footercontent=$this->cms_fm->get_footercontent(); ?>
			   <?=$get_footercontent['description']?>
            </div>

        </footer>




<button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>
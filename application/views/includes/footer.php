<div class="footerarea">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="footermenu">

                    <ul>

                        <li><a href="<? echo site_url();?>" <? if( $websitepagename=='' || $websitepagename=='index'
                                ){?> class=" active"
                                <?} else {?>
                                <? }?>>Home
                            </a></li>

                        <li><a href="<? echo site_url('AboutUs');?>" <? if( $websitepagename=='aboutus' ){?> class="
                                active"
                                <?} else {?>
                                <? }?>>About Us
                            </a></li>

                        <li><a href="<? echo site_url('services');?>" <? if( $websitepagename=='services' ){?>
                                class=" active"
                                <?} else {?>
                                <? }?>>Services
                            </a></li>

                        <li><a href="<? echo site_url('projects');?>" <? if( $websitepagename=='projects' ){?> class="
                                active"
                                <?} else {?>
                                <? }?>>Projects
                            </a></li>

                        <li><a href="<? echo site_url('gallery');?>" <? if( $websitepagename=='gallery' ){?> class="
                                active"
                                <?} else {?>
                                <? }?>> Gallery
                            </a></li>

                        <li><a href="<? echo site_url('Contactus');?>" <? if( $websitepagename=='contactus' ){?> class="
                                active"
                                <?} else {?>
                                <? }?>>Contact Us
                            </a></li>
                    </ul>

                    <div class="socialbox">

                        <a href="#"><img src="<? echo site_url('assets/images/icon_fb.png')?>" /></a>

                        <a href="#"><img src="<? echo site_url('assets/images/icon_twitter.png')?>" /></a>

                        <a href="#"><img src="<? echo site_url('assets/images/icon_insta.png')?>" /></a>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <div class="copyrightbox">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <p>&copy;Copyright 2025. All rights Reserved.</p>

                </div>

                <div class="col-md-6">

                    <div class="webdesignby">Design & Developed by : <a href="https://jquesttechnologies.ca/"
                            target="_blank"> <img src="<? echo site_url('assets/images/jquest.svg')?>" /></a></div>

                </div>

            </div>

        </div>

    </div>

</div>
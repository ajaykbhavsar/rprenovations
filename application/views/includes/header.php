<header class="main-header">



            <!-- header top -->

            <div class="header-top">

                <div class="container">

                    <div class="top-inner">

                        <div class="logo-outer">

                            <div class="logo"><a href="<? echo site_url('');?>"><img src="<? echo site_url('assets/images/logo.png');?>" alt="Logo"></a></div>

                        </div>

						<?php $get_headercontact=$this->cms_fm->get_headercontact(); ?>

					    <?=$get_headercontact['description']?>

                    </div>

                </div>

            </div>



            <!--Header-Upper-->

            <div class="header-upper">

                <div class="container clearfix">



                    <div class="header-inner">



                        <div class="nav-outer clearfix">

                            <!-- Main Menu -->

                            <nav class="main-menu navbar-expand-lg">

                                <div class="navbar-header clearfix">

                                    <!-- Toggle Button -->

                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                    </button>

                                </div>



                                <div class="navbar-collapse collapse clearfix">

                                    <ul class="navigation clearfix">

                                        <li <? if ($websitepagename=='index') {?> class="current" <?}?>><a href="<? echo site_url('');?>">Home</a></li>

                                        <li <? if($websitepagename=='projects') {?> class="current" <? } ?>><a href="<? echo site_url('projects');?>">Projects</a></li>

                                        <li <? if($websitepagename=='aboutus') {?> class="current" <? } ?>><a href="<? echo site_url('aboutus');?>">About Us</a></li>
                                        <!--<li><a href="<? echo site_url('blogs');?>">Blogs</a></li>-->
                                       
                                        <li <? if($websitepagename=='whychooseus') {?> class="current" <? } ?>><a href="<? echo site_url('whychooseus');?>">Why Choose us</a></li>
                                        <li <? if($websitepagename=='gallery') {?> class="current" <? } ?>><a href="<? echo site_url('gallery');?>">Gallery</a></li>
                                        <li <? if($websitepagename=='faqs') {?> class="current" <? } ?>><a href="<? echo site_url('faqs');?>">FAQs</a></li>
 <li <? if($websitepagename=='contactus') {?> class="current" <? } ?>><a href="<? echo site_url('contactus');?>">Contact us</a></li>
                                    </ul>

                                </div>



                            </nav>

                            <!-- Main Menu End-->

                        </div>



                        <div class="menu-icons">

                            <!-- Menu Serch Box-->

                            <!--<div class="nav-search ml-15">

                                <button class="fa fa-search"></button>

                                <form action="#" class="hide">

                                    <input type="text" placeholder="Search" class="searchbox" required="">

                                    <button type="submit" class="searchbutton fa fa-search"></button>

                                </form>

                            </div>-->



                            <!-- menu sidbar -->

                            <!--<div class="menu-sidebar">

                                <button>

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                </button>

                            </div>-->

                        </div>



                    </div>



                </div>

            </div>

            <!--End Header Upper-->



</header>



<div class="form-back-drop"></div>



        <!-- Hidden Sidebar -->

<section class="hidden-bar">

    <div class="inner-box text-center">

        <div class="cross-icon"><span class="fa fa-times"></span></div>

        <div class="title">

            <h3>Get Appointment</h3>

        </div>



        <!--Appointment Form-->

        <div class="appointment-form">

            <form method="post">

                <div class="form-group">

                    <input type="text" name="text" value="" placeholder="Name" required>

                </div>

                <div class="form-group">

                    <input type="email" name="email" value="" placeholder="Email Address" required>

                </div>

                <div class="form-group">

                    <input type="text" name="phone" value="" placeholder="Phone no." required>

                </div>

                <div class="form-group">

                    <textarea placeholder="Message" rows="5"></textarea>

                </div>

                <div class="form-group">

                    <button type="submit" class="theme-btn">Submit now</button>

                </div>

            </form>

        </div>



        <!--Social Icons-->

        

    </div>

</section>
<header>
    <div class="headermain">

        <div class="container">

            <div class="row">

                <div class="col-xl-4 col-lg-12 col-md-12">

                    <div class="logo">

                        <a href="<? echo site_url();?>"><img
                                src="<?php echo site_url('assets/images/logo_rp.svg')?>" /></a>

                    </div>

                </div>

                <div class="col-xl-8 col-lg-12 col-md-12">

                    <div class="navigationmain">

                        <div class="navileft">

                            <nav class="navbar navbar-expand-md">

                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
                                    aria-expanded="false" aria-label="Toggle navigation">

                                    <span class="navbar-toggler-icon"><img
                                            src="<?php echo site_url('assets/images/menu.png')?>" /></span>

                                </button>

                                <div class="collapse navbar-collapse" id="navbarCollapse">

                                    <ul class="navbar-nav me-auto mb-2 mb-md-0">

                                        <li class="nav-item">

                                            <a <? if($websitepagename=='' || $websitepagename=='index' ){?>
                                                class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('');?>">Home
                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a <? if( $websitepagename=='aboutus' ){?> class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('AboutUs');?>">About Us
                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a <? if( $websitepagename=='services' ){?> class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('services');?>">Services
                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a <? if( $websitepagename=='projects' ){?> class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('projects');?>">Projects
                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a <? if( $websitepagename=='gallery' ){?> class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('gallery');?>">Gallery
                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a <? if( $websitepagename=='contactus' ){?> class="nav-link active"
                                                <?} else {?> class="nav-link"
                                                <? }?> aria-current="page" href="
                                                <?echo site_url('Contactus');?>">Contact Us
                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </nav>

                        </div>

                        <!-- <div class="naviright">

                                    <a href="#" class="btnlogin">Login/Sign Up</a>

                                </div> -->

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Construction Renovation" />
    <meta name="keywords" content="Construction Renovation" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=1024, initial-scale=1, minimum-scale: 1, maximum-scale: 1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

    <title>RP Renovations & Custom Builds Inc. : Construction Renovation | Architects | Project Consultants - Canada.</title>
    <link rel="shortcut icon" href="<? echo site_url('assets/images/favicon.ico');?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="<? echo site_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<? echo site_url('assets/css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<? echo site_url('assets/css/menu.css');?>">

    <link rel="stylesheet" href="<? echo site_url('assets/css/animate.css');?>">

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css'>
    
    <link rel="stylesheet" href="<? echo site_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<? echo site_url('assets/css/responsive.css');?>">


	<script src="<? echo site_url('assets/js/jquery.min.js');?>"></script>
	<script src="<? echo site_url('assets/js/jquery.validate.js');?>"></script>
       
</head>

<body>
    <div class="preloader"></div>
   
    <?php $this->load->view('includes/header');?>
    <?php $this->load->view($main);?>
    <?php $this->load->view('includes/footer');?>
    


    <script src="<? echo site_url('assets/js/bootstrap.min.js');?>"></script>
    
    <script src="<? echo site_url('assets/js/jquery.magnific-popup.min.js');?>"></script>
    <script src="<? echo site_url('assets/js/appear.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js'></script>
    <!-- Custom script -->
    <script src="<? echo site_url('assets/js/script.js');?>"></script>
  
    <script>
        new WOW().init();   
          
    </script>   
    <script>
            $(document).ready(function () {
                $(".homeslide").show();
                $(".homeslide").slick({
                    slidesToShow: 1,
                    dots: false,
                    arrows: false,
                    swipe: true,
                    autoplay:true,
                    fade:true,
                    swipeToSlide: true,
                    autoplaySpeed:5000,
                    speed:3000
                });

            });

            
        </script>
</body>

</html>



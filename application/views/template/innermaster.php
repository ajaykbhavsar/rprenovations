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
    <link rel="stylesheet" href="<? echo site_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<? echo site_url('assets/css/animate.css');?>">
    <link rel="stylesheet" href="<? echo site_url('assets/css/select2.css');?>">
    <link rel="stylesheet" href="<? echo site_url('assets/css/responsive.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

	<script src="<? echo site_url('assets/js/jquery.min.js');?>"></script>
	<script src="<? echo site_url('assets/js/jquery.validate.js');?>"></script>
       
</head>

<body>
    <div class="preloader"></div>
   
    <?php $this->load->view('includes/header');?>
    <?php $this->load->view($main);?>
    <?php $this->load->view('includes/footer');?>
    


    <script src="<? echo site_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<? echo site_url('assets/js/select2.js');?>"></script>
    <script src="<? echo site_url('assets/js/jquery.magnific-popup.min.js');?>"></script>
    <script src="<? echo site_url('assets/js/appear.js');?>"></script>

    <!-- Custom script -->
    <script src="<? echo site_url('assets/js/script.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script>
        $(document).ready(function(){
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                  mainClass: 'mfp-with-zoom', 
                  gallery:{
                            enabled:true
                        },
                  zoom: {
                    enabled: true, 

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                      return openerElement.is('img') ? openerElement : openerElement.find('img');
                  }
                }
            });
            });
    </script>

    <script>
        new WOW().init();  
        $('.select2dropdown').select2({
            width: "100%",
            dropdownAutoWidth: true,
          });  
    </script>  
    
</body>

</html>

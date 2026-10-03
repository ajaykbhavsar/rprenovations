<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content=" ">

    <meta name="generator" content="">

    <title>RP Renovation</title>



    <!-- Bootstrap core CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 core CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.1/css/all.min.css" rel="stylesheet" />



    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />



    <!--slick slider CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <script src="<? echo site_url('assets/js/jquery-3.5.1.min.js');?>"></script>

    <script src="<? echo site_url('assets/js/jquery.validate.js');?>"></script>

    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />

    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>





    <!--custom CSS -->

    <link href="<? echo site_url('assets/css/custom.css')?>" rel="stylesheet">



    <!-- Favicons -->

    <link rel="icon" href="favicon.ico">

</head>

<body>



    <div class="page-wrapper">

        <div class="bodytoppart">

            <?php $this->load->view('includes/header.php');?>

            <?php $this->load->view('includes/innerbanner.php');?>

        </div>

        <?php $this->load->view($main);?>

        <?php $this->load->view('includes/footer.php');?>

    </div>













    <!--  js section-->

    <!-- Jquery Library-->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> -->

    <!-- Jquery Bootstrap-->

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Jquery Slick-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>

    <!-- Jquery select2-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



    <script src=https://code.jquery.com/ui/1.11.3/jquery-ui.min.js></script>

    <script src="https://cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>


    <!-- Custom scripts -->

    <script src="<? echo site_url('assets/js/custom.js')?>"></script>



</body>

</html>
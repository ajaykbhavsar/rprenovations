<div class="innercontainer sectionpadding servicedetails contactpage">

    <div class="container">

        <div class="row">

            <div class="col-md-6">



                <h3>Contact Our Office</h3>

                <p>If you have any query do not hesitate, Our customer support team is available 24/7, please contact
                    them.</p>

                <div class="locationboxs"><img src="<? echo site_url('assets/images/icon_location.svg');?>" />

                    <div>

                        <p><strong>RP Renovation (Ritz Patel)</strong> <br />

                            Brampton, ON, Canada

                        </p>

                    </div>

                </div>

                <p class="phoneicon">

                    <img src="<?echo site_url('assets/images/phone-outline-icon.svg')?>" /> +1 (647)-702-0880

                </p>

                <p class="phoneicon"><img src="<?echo site_url('assets/images/email-icon.svg')?>" /> <a
                        href="mailto:Info@rprenovactions.ca">Info@rprenovactions.ca</a></p>


                <!-- 
                <div class="timing">

                    <h3>Timing</h3>

                    <p><strong>Monday to Friday :</strong> 10 a.m. to 7 p.m. <br />

                        <strong>Saturday :</strong> 10 a.m. to 6 p.m. <br />

                        <strong>Sunday :</strong> 12 noon to 5 p.m.
                    </p>

                </div> -->
            </div>



            <div class="col-md-6">

                <h3>Any Question ? Reach Us</h3>



                <div class="formbox">

                    <? echo form_open('Contactus/sendmail','name="contact_form" id="contact_form" enctype="multipart/form-data"');?>

                    <?if ($this->session->flashdata('error'))

							{

								echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";

							}

							if ($this->session->flashdata('message'))

							{

								echo "<div class='alert alert-success'>".$this->session->flashdata('message')."</div>";

							} ?>

                    <ul>

                        <li>

                            <div class="form-group">

                                <input type="text" placeholder="Name*" name="txtname" maxlength="200" minlength="2"
                                    class="form-control required">

                                <input type="hidden" name="txtname_V" value="Name">

                            </div>

                        </li>



                        <li>

                            <div class="form-group">

                                <input type="text" placeholder="Email*" name="txtemail" maxlength="200" minlength="2"
                                    class="form-control required email">

                                <input type="hidden" name="txtemail_V" value="Email">

                            </div>

                        </li>

                        <li class="wd100">

                            <div class="form-group">

                                <input type="text" placeholder="Phone No.*" name="txtphone" maxlength="10"
                                    minlength="10" class="form-control required number">

                                <input type="hidden" name="txtphone_V" value="Phone">

                            </div>

                        </li>

                        <li class="wd100">

                            <div class="form-group">

                                <textarea class="form-control" placeholder="Message" name="txtmessage"
                                    maxlength="500"></textarea>

                                <input type="hidden" name="txtmessage_V" value="Message">

                            </div>

                        </li>

                        <li>

                            <div class="btnarea">

                                <input type="hidden" name="heading_V" value="Contact Details">

                                <input type="hidden" name="footer_V" value="Anjana Patel All Rights Reserved.">

                                <button type="submit"
                                    class="btn btndefault btnsubmit  hvr-shutter-out-horizontal">Submit</button>

                            </div>

                        </li>

                    </ul>

                    <?php echo form_close(); ?>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="googlemap">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184532.05866750158!2d-79.9243524055475!3d43.724815601317054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b15eaa5d05abf%3A0x352d31667cc38677!2sBrampton%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sin!4v1745251101446!5m2!1sen!2sin"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

            </div>

        </div>

    </div>

</div>



<script>
jQuery.validator.addMethod("lettersonly", function(value, element)

    {

        return this.optional(element) || /^[a-z ]+$/i.test(value);

    }, "Letters only please");



$().ready(function()

    {

        $("#contact_form").validate(

            {

                rules:

                {

                    txtname: {
                        lettersonly: true
                    },

                    //txtfname:{lettersonly: true},

                    //txtlname_V:{lettersonly: true}

                }

            });

    });
</script>



<script type="text/javascript">
$("#document").change(function()

    {

        var val = $(this).val();

        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase())

        {

            case 'doc':
            case 'pdf':
            case 'docx':

                $("#filemsg").hide();

                break;

            default:

                $(this).val('');



                $("#filemsg").show();

                document.getElementById("filemsg").style.color = "red";

                $("#filemsg").html('.doc,.pdf,.docx Only');

                break;

        }

    });
</script>
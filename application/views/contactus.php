<script src="https://www.google.com/recaptcha/api.js?render=6Ldrc5QtAAAAALEHXtkuDwNlI34QPatcCYN_yJKU"></script>

<section class="banner-section contact contactbanner-section mt-110 rmt-70">
    <div class="container">
        <div class="banner-inner">
            <div class="page-title">
                <h2>Contact Us</h2>
            </div>
        </div>   
    </div>
</section>

<div class="contact-info text-center mb-110">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                $get_contactus = $this->cms_fm->get_contactus(); 
                echo $get_contactus['description'];
                ?> 
            </div>
            
            <div class="col-md-12">
                <?php 
                echo form_open('contactus/sendmail', array(
                    'name' => 'contact_form',
                    'id' => 'contact_form',
                    'class' => 'contact-form rmt-0 wow fadeInUp',
                    'enctype' => 'multipart/form-data'
                ));
                ?>
                
                <div class="section-title text-center mb-40 wow fadeInUp">
                    <h2>Request a Visit</h2>
                    <br>
                </div>
                
                <?php if ($this->session->flashdata('error')): ?>
                    <div class='alert alert-danger failure'>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('message')): ?>
                    <div class='alert alert-success success'>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="row clearfix">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="txtfname" id="txtfname" 
                                   placeholder="First Name" 
                                   class="form-control required" 
                                   value="<?php echo set_value('txtfname'); ?>"
                                   maxlength="150"/>
                            <input type="hidden" name="txtfname_V" value="First Name">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="txtlname" id="txtlname" 
                                   placeholder="Last Name" 
                                   class="required form-control" 
                                   value="<?php echo set_value('txtlname'); ?>"
                                   maxlength="150"/>
                            <input type="hidden" name="txtlname_V" value="Last Name">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="email" name="txtemail" id="txtemail" 
                                   placeholder="Email Address" 
                                   class="required form-control email" 
                                   value="<?php echo set_value('txtemail'); ?>"
                                   maxlength="200"/>
                            <input type="hidden" name="txtemail_V" value="Email">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="txtphone" id="txtphone" 
                                   placeholder="Telephone/Mobile" 
                                   class="required digits form-control" 
                                   value="<?php echo set_value('txtphone'); ?>"
                                   maxlength="10" 
                                   minlength="10"/>
                            <input type="hidden" name="txtphone_V" value="Phone">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="txtlocation" id="txtlocation" 
                                   placeholder="Location" 
                                   class="form-control required"
                                   value="<?php echo set_value('txtlocation'); ?>"
                                   maxlength="200"/>
                            <input type="hidden" name="txtlocation_V" value="Location">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control" 
                                      placeholder="Message" 
                                      rows="4" 
                                      name="txtmessage" 
                                      maxlength="500"><?php echo set_value('txtmessage'); ?></textarea>
                            <input type="hidden" name="txtmessage_V" value="Message">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="recaptchaResponse" value="" id="recaptchaResponse">
                            <button type="submit" class="theme-btn mt-40">Send</button>
                        </div>
                    </div>
                </div>
                
                <div class="title-rotated">contact</div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize reCAPTCHA on page load
grecaptcha.ready(function() {
    grecaptcha.execute('6LfIEj8sAAAAAEVGEnsjvBmRjLRBU39RPzcgF9Kv', {action: 'contact'}).then(function(token) {
        document.getElementById('recaptchaResponse').value = token;
    });
});

// jQuery Validation
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
}, "Letters only please");

$(document).ready(function() {
    $("#contact_form").validate({
        rules: {
            txtfname: {
                required: true,
                lettersonly: true,
                maxlength: 150
            },
            txtlname: {
                required: true,
                lettersonly: true,
                maxlength: 150
            },
            txtemail: {
                required: true,
                email: true,
                maxlength: 200
            },
            txtphone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            txtlocation: {
                required: true,
                maxlength: 200
            },
            txtmessage: {
                maxlength: 500
            }
        },
        messages: {
            txtfname: {
                required: "Please enter your first name",
                lettersonly: "Please enter only letters"
            },
            txtlname: {
                required: "Please enter your last name",
                lettersonly: "Please enter only letters"
            },
            txtemail: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            txtphone: {
                required: "Please enter your phone number",
                digits: "Please enter only numbers",
                minlength: "Phone number must be 10 digits",
                maxlength: "Phone number must be 10 digits"
            },
            txtlocation: {
                required: "Please enter your location"
            }
        },
        submitHandler: function(form) {
            // Refresh reCAPTCHA token before submitting
            grecaptcha.execute('6LfIEj8sAAAAAEVGEnsjvBmRjLRBU39RPzcgF9Kv', {action: 'contact'}).then(function(token) {
                document.getElementById('recaptchaResponse').value = token;
                form.submit();
            });
        }
    });
});
</script>
<section class="banner-section faq mt-110 rmt-70">
    <div class="container">
        <div class="banner-inner">
            <div class="page-title">
                <h2>Faqs</h2>
            </div>

        </div>
    </div>
</section>


<?php  $get_aboutus=$this->cms_fm->get_aboutus();  ?>
  

   

  <section class="faq-section"> 
    <div class="container">
    <div class="faq-container">
      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">How long does a renovation take?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>The timeline varies depending on the scope of your project. A typical bathroom renovation takes 2-3 weeks, while a full kitchen remodel usually requires 4-6 weeks. Basement finishing can take 3-5 weeks, and larger commercial projects may take 2-3 months. During your initial consultation, we'll provide a detailed timeline specific to your project. We pride ourselves on meeting deadlines and will keep you informed throughout every stage of the renovation.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">Do you offer financing options?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>Yes, we understand that renovations are a significant investment. We work with several trusted financing partners to offer flexible payment plans that suit your budget. Options include low-interest loans, deferred payment plans, and home equity lines of credit. During your consultation, we can discuss the financing options available and help you find a solution that makes your dream renovation affordable.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">Do you provide design services?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>Absolutely! We offer comprehensive design services as part of our renovation packages. Our experienced design team will work closely with you to understand your vision, style preferences, and functional needs. We'll create detailed plans, 3D renderings, and material selections to help you visualize your space before construction begins. Whether you have a clear vision or need creative guidance, we're here to bring your ideas to life.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">What warranties do you offer?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>We stand behind our work with comprehensive warranties. All of our workmanship comes with a minimum 2-year warranty, and many materials carry manufacturer warranties ranging from 5 to 25 years depending on the product. We also offer extended warranty options for added peace of mind. If any issues arise related to our workmanship, we'll address them promptly at no additional cost. Your satisfaction and the longevity of your renovation are our top priorities.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">Do you help with permits and inspections?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>Yes, we handle all permit applications and inspections as part of our service. Navigating building codes and permit requirements can be complex, so we take care of everything for you. Our team is well-versed in local building regulations and will ensure all necessary permits are obtained before work begins. We'll also coordinate all required inspections throughout the project to ensure everything meets code requirements. This is included in our service at no additional cost.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">Will my home be livable during the renovation?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>In most cases, yes. We take great care to minimize disruption to your daily life. For bathroom and kitchen renovations, we work efficiently to restore basic functionality at the end of each day whenever possible. We'll discuss your specific concerns during the consultation and create a work plan that accommodates your needs. For larger whole-home renovations, we can recommend temporary living arrangements if needed and work with you to find the best solution.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">Do you provide free estimates?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>Yes, we offer free, no-obligation estimates for all projects. After an initial consultation and site visit, we'll provide you with a detailed, transparent quote that breaks down all costs including materials, labor, and timelines. There are no hidden fees, and our fixed pricing means you'll know exactly what to expect. We believe in complete transparency from the very beginning of your project.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="question-text">What areas do you service?</span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <p>We proudly serve the Greater Toronto Area and surrounding regions, including Mississauga, Brampton, Vaughan, Markham, and Richmond Hill. If you're located outside these areas, please contact us as we may still be able to accommodate your project. We're always happy to discuss your renovation needs regardless of location.</p>
        </div>
      </div>
    </div>

    
</div>
  </section>

  <script>
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      
      question.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        
        // Close all other items
        faqItems.forEach(otherItem => {
          otherItem.classList.remove('active');
        });
        
        // Toggle current item
        if (!isActive) {
          item.classList.add('active');
        }
      });
    });
  </script>





<?/*=$get_aboutus['description']*/?>



<!-- <section class="paddtop0 wow fadeInUp">
	<div class="container">
		<div class="apartment-content careerBox text-center">
	        <img src="<?=site_url('assets/images/career.png')?>" alt="Icon">
	        <h3><a href="property-single.html">Careers</a></h3>
	        <p class="font18">We are always looking for fresh talent in the field of Interiors</p>
	    </div>
	</div>
</section> -->
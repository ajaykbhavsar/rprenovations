<section class="banner-section gallery mt-110 rmt-70">
    <div class="container">
        <div class="banner-inner">
            <div class="page-title">
                <h2>Gallery</h2>
            </div>

        </div>
    </div>
</section>


<section class="gallery-section">
    <div class="container">

    <div class="filter-buttons">
      <button class="filter-btn active" data-filter="all">All Photos</button>
      <?php foreach ($gallery_categories as $category): ?>
        <button class="filter-btn" data-filter="<?php echo (int) $category['id']; ?>">
          <?php echo html_escape($category['name']); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="gallery-grid">
      <?php foreach ($gallery_images as $image): ?>
        <?php
          $image_name = basename($image['image']);
          $full_image = site_url('userfiles/gallery/original/'.$image_name);
          $thumbnail = site_url('userfiles/gallery/thumbnail/'.$image_name);
          $caption = $image['category_name'].' - '.$image['title'];
        ?>
        <a href="<?php echo html_escape($full_image); ?>"
           title="<?php echo html_escape($caption); ?>"
           class="gallery-item image-popup-vertical-fit"
           data-category="<?php echo (int) $image['category_id']; ?>">
          <img src="<?php echo html_escape($thumbnail); ?>"
               alt="<?php echo html_escape($caption); ?>"
               loading="lazy">
          <div class="zoom-icon" aria-hidden="true">&#128269;</div>
          <div class="image-overlay">
            <span class="image-tag"><?php echo html_escape($image['category_name']); ?></span>
            <div class="image-title"><?php echo html_escape($image['title']); ?></div>
          </div>
        </a>
      <?php endforeach; ?>
      <?php if (empty($gallery_images)): ?>
        <p class="gallery-empty">Gallery images will be added soon.</p>
      <?php endif; ?>
    </div>
</div>
</section>

<script>
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;
        
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        galleryItems.forEach(item => {
          if (filter === 'all' || item.dataset.category === filter) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
</script>
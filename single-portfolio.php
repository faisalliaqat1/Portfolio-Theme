<?php get_header();?>

  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">
			<?php 
			$url = get_template_directory_uri();?>
			 
          <div class="col-lg-8">
           <div class="top-title">
           <h2 class="portfolio-title"><?php the_title();?></h2>
           <a class="back" href="http://localhost/port-folio/#portfolio">Back to Portfolio</a>
           </div>

            <div class="portfolio-details-slider swiper">
              <?php 
              $gallery = get_field('gallery_portfolio'); ?>
              <div class="swiper-wrapper align-items-center">
               <?php if($gallery):?>
                <?php foreach($gallery as $row){
                  $img_url = $row['url'];
                  ?>
                <div class="swiper-slide">
                   <img src="<?php echo $img_url;?>" alt=""> 
                </div>
                <?php } ?>
             <?php endif;?>
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
			<?php 
			$terms = get_the_terms(get_the_ID(), 'portfolio-categories');

			if ($terms && !is_wp_error($terms)) {
				$taxonomy_name = esc_html($terms[0]->name);
				echo '<li><strong>Category</strong>:' . $taxonomy_name  . '</li>';
			}
			?>
      <?php 
      $prt_info = get_field('information');
      // echo "<pre>";
      // print_r($prt_info);
      // echo "</pre>";
      $client = $prt_info['client'];
      $st_date = $prt_info['start_date'];
      $end_date = $prt_info['end_date'];
      $lv_url = $prt_info['live_url'];
      ?>
              <li><strong>Client</strong>: <?php echo $client; ?></li>
              <li><strong>Start date</strong>: <?php echo $st_date; ?></li>
              <li><strong>End date</strong>: <?php echo $end_date; ?></li>
              <li><strong>Project URL</strong>: <a href="<?php echo $lv_url; ?>" target = "_blank"><?php echo $lv_url; ?></a></li>
            </ul>

            <p>
            <?php the_excerpt();?>
            </p>
          </div>

        </div>

      </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <?php get_footer();?>
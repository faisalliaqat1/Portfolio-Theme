<?php get_header();?>
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <?php 
    $ab_cnt = get_field('about_content','option');
    $title_c = $ab_cnt['top_content'];
    $txt_c = $ab_cnt['about_text'];
    $ab_b_c = $ab_cnt['about_bottom_text'];
    $l_img_c = $ab_cnt['left_image'];
    $ab_title_c = $ab_cnt['about_title'];
    $prf_rep_c = $ab_cnt['profile_rep'];
    ?>
    <div class="about-me container">

      <div class="section-title">
        <h2>ABOUT</h2>
        <p><?php echo $title_c; ?></p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="<?php echo $l_img_c['url'];?>" class="img-fluid" alt="<?php echo $l_img_c['url'];?>">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3><?php echo $ab_title_c; ?></h3>
          <p class="fst-italic">
          <?php echo $ab_b_c; ?>
          </p>
          <div class="row">
            <div class="col-lg-12">
            <?php if($prf_rep_c):?>
              
              <ul>
              <?php  foreach ($prf_rep_c as $profile) {
                  $title = $profile['title__'];
                  $cntnt = $profile['content_'];
                ?>
                
                <li><i class="bi bi-chevron-right"></i> <strong><?php echo $title; ?></strong> <span><?php echo $cntnt; ?></span></li>
                <?php  }?>
              </ul>
              <?php endif; ?>
            </div>
          </div>
          <p> <?php echo $txt_c; ?></p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

      <div class="row">
        <?php 
        $pr_counter = get_field('facts','option');
        ?>
         <?php if($pr_counter):?>
          <?php  foreach ($pr_counter as $row) {
                  $title = $row['title'];
                  $cntr = $row['counter'];
                  $icon = $row['icon'];
                ?>
        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <!-- <i class="bi bi-award"></i> -->
            <i class="<?php echo $icon; ?>"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $cntr; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php echo $title; ?></p>
          </div>
        </div>
        <?php  }?>
        <?php endif; ?>

      </div>

    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

      <div class="section-title">
        <h2><?php the_field('skills_text','option');?></h2>
      </div>

      <div class="row skills-content">
      <?php
      $skill = get_field('skills_repeater','option');
      if($skill):?>
       <div class="col-lg-12 col-2-grid">
          <?php  foreach ($skill as $row) {
                  $s_title = $row['skill_name'];
                  $s_prcnt = $row['skill_percent'];
                ?>
          <div class="progress">
            <span class="skill"><?php echo $s_title; ?> <i class="val"><?php echo $s_prcnt; ?></i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $s_prcnt; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <?php  }?>
        </div>
       
        <?php endif; ?>
      </div>

    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">

      <div class="section-title">
        <h2><?php the_field('intrest_text','option');?></h2>
      </div>
       <?php 
        $intrest = get_field('intrest_repeater','option');
        if($intrest):
        
        ?>
      <div class="row">
      <?php  foreach ($intrest as $row) {
      //   echo "<pre>";
      //   print_r($row);
      //  echo "</pre>";
                  $i_nme = $row['skill_name'];
                  $i_icon = $row['skill_percent'];
                ?>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="<?php echo $i_icon; ?>" style="color: #29cc61;"></i>
            <h3><?php echo $i_nme; ?></h3>
          </div>
        </div>
        <?php  }?>
      </div>
<?php endif;?>
    </div><!-- End Interests -->

    <!-- ======= Testimonials ======= -->
    <div class="testimonials container">

      <div class="section-title">
        <h2><?php the_field('testimonial_text','option');?></h2>
      </div>
      <?php 
        $reviews = get_field('reviews','option');
        if($reviews):
        
        ?>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
        <?php  foreach ($reviews as $row) {
                  $r_nme = $row['name'];
                  $r_desg = $row['designation'];
                  $r_img = $row['profile_image'];
                  $r_cntnt = $row['review_text'];
                ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $r_cntnt; ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?php echo $r_img['url'];?>" class="testimonial-img" alt="">
              <h3><?php echo $r_nme; ?></h3>
              <h4><?php echo $r_desg; ?></h4>
            </div>
          </div><!-- End testimonial item -->
          <?php  }?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <?php endif;?>

      <div class="owl-carousel testimonials-carousel">

      </div>

    </div><!-- End Testimonials  -->

  </section><!-- End About Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
       <?php the_field('resume_content_','option');?>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <?php 
          $edu = get_field('education','option');?>
          <?php if($edu):?>
          <h3 class="resume-title">Education</h3>
          <?php foreach($edu as $row):
            $ed_nme = $row['university_name'];
            $ed_Sdate = $row['date'];
            $ed_Edate = $row['date_end'];
            $ed_typ = $row['type'];
            $ed_desc = $row['description'];
            $ed_link = $row['certificate_link'];
            ?>
          <div class="resume-item">
            <h4><?php echo $ed_typ; ?></h4>
            <h5><?php echo $ed_Sdate . " - ". $ed_Edate; ?></h5>
            <p><em><?php echo $ed_nme; ?></em></p>
            <p><?php echo $ed_desc; ?></p>
          </div>
          <?php endforeach;?>
          <?php endif;?>
        </div>
        <div class="col-lg-6">
        <?php 
        $exp = get_field('work_experiance','option');?>
          <?php if($exp):?>
          <h3 class="resume-title">Professional Experience</h3>
          <?php foreach($exp as $row):
            $ed_nme = $row['university_name'];
            $ed_Sdate = $row['date'];
            $ed_Edate = $row['date_end'];
            $ed_typ = $row['type_'];
            $ed_desc = $row['description'];
            $ed_dsg = $row['designation'];
            ?>
          <div class="resume-item">
            <h4><?php echo $ed_typ; ?></h4>
            <h5><?php echo $ed_Sdate . " - ". $ed_Edate; ?></h5>
            <p><em><?php echo $ed_nme; ?></em> <?php if($ed_dsg):?> || <em><?php echo $ed_dsg; ?></em><?php endif;?></p>
            <p><?php echo $ed_desc; ?></p>
          </div>
          <?php endforeach;?>
          <?php endif;?>
        </div>
      </div>

    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
       <?php 
       the_field('services_content','option');
       ?>
      </div>
      <?php 
        $services = get_field('our_services','option');
        if($services):
        
        ?>
      <div class="row">
      <?php  foreach ($services as $row) {
                  $sr_nme = $row['service_title'];
                  $sr_img = $row['service_icon'];
                  $sr_cntnt = $row['service_text'];

                ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
          <div class="icon-box"> 
            <div class="icon"><i class="<?php echo $sr_img; ?>"></i></div>
            <h4><a ><?php echo  $sr_nme; ?></a></h4>
            <p><?php echo  $sr_cntnt; ?></p>
         </div>
        </div>
        <?php } ?>
      </div>
   <?php endif; ?>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>
      <?php echo do_shortcode('[searchandfilter id="200"]');?>
      <?php echo do_shortcode('[searchandfilter id="200" show="results"]');?>
    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
    <?php 
    $cntct_detail = get_field('contact_detail_','option');
    //print_r($cntct_detail);
    $add_title = $cntct_detail['title__'];
    $add_sbtitle = $cntct_detail['subtitle_title'];
    $add = $cntct_detail['address'];
    $add_emil = $cntct_detail['email_'];
    $add_num = $cntct_detail['phone_number'];
    $add_shrtcde = $cntct_detail['form_shortcode'];
    ?>
      <div class="section-title">
        <h2><?php echo $add_title; ?></h2>
        <p><?php echo $add_sbtitle; ?></p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p><?php echo $add; ?></p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <?php 
         $social_ = get_field('social_media_','option');?>
         <?php if($social_):?>
      <div class="social-links">
        <?php  foreach ($social_ as $social) {?>
        <?php 
         $s_name = $social['name'];
         $s_url = $social['url'];
          ?>
        <a href="<?php echo $s_url; ?>" class="linkedin"><i class="bi bi-<?php echo $s_name; ?>"></i></a>
        <?php  }?>
      </div>
      <?php endif; ?>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p><?php echo $add_emil; ?></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p><?php echo $add_num; ?></p>
          </div>
        </div>
      </div>
     <div class="from-data php-email-form mt-4">
      <?php //echo do_shortcode('[contact-form-7 id="0331f9f" title="Contact form"]');?>
      <form action="<?php echo home_url('/wp-content/themes/faisal-portfolio/process-form.php');?>" method="post" role="form" class="php-email-form mt-4">
     <div class="row">
       <div class="col-md-6 form-group">
         <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
       </div>
       <div class="col-md-6 form-group mt-3 mt-md-0">
         <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
       </div>
     </div>
     <div class="form-group mt-3">
       <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
     </div>
     <div class="form-group mt-3">
       <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
     </div>
     <div class="my-3">
       <div class="loading">Loading</div>
       <div class="error-message" style="display: none;"><?php echo isset($_SESSION['form_error_message']) ? $_SESSION['form_error_message'] : ''; ?></div>
       <div class="sent-message" style="display: none;"><?php echo isset($_SESSION['form_success_message']) ? $_SESSION['form_success_message'] : ''; ?></div>
     </div>
     <div class="text-center"><button type="submit" id="submit-btn">Send Message</button></div>
   </form>



     </div>
    </div>
  </section><!-- End Contact Section -->
<?php get_footer();?>
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Faisal_POrtfolio
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php $favicon_url = get_site_icon_url();?>
  <link href="<?php echo $favicon_url; ?>" rel="icon">
  <link href="<?php echo $favicon_url; ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <?php wp_head();?>
</head>

<body>
<?php if (is_front_page()) {?>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
<?php 
$home_page = get_field('banner_content_','option');
$title = $home_page['title_'];
$cntnt = $home_page['content'];
$animate1 = $home_page['animate_text_1'];
$animate2 = $home_page['animate_text_2'];
$animate3 = $home_page['animate_text_3'];
$animate4 = $home_page['animate_text_4'];
?> 
		
		<h3 class="sub_heading">Hello I'm</h3>
      <h1><a href="<?php echo home_url(); ?>"><?php echo $title; ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2><?php //echo $cntnt; ?></h2>
		<div class="rotating-text">
  <p><?php echo $cntnt; ?></p>
  <p>
    <?php if($animate1):?><span class="word alizarin"><?php echo $animate1; ?></span><?php endif; ?>
   <?php if($animate2):?> <span class="word wisteria"><?php echo $animate2; ?></span><?php endif; ?>
    <?php if($animate3):?><span class="word peter-river"><?php echo $animate3; ?></span><?php endif; ?>
    <?php if($animate4):?><span class="word emerald"><?php echo $animate4; ?></span><?php endif; ?>
  </p>
</div>


      <nav id="navbar" class="navbar">
      <?php
// Specify the menu ID or name
$menu_name_or_id = 'Menu 1';

// Get the menu items
$menu_items = wp_get_nav_menu_items($menu_name_or_id);

// Check if menu items exist
if ($menu_items) {
    // Loop through each menu item
    echo '<ul>';
    foreach ($menu_items as $menu_item) {
        // Output menu item details
        $id_m = $menu_item->ID;
        $name_m = $menu_item->title;
        $url_m = $menu_item->url;
        $classes_m = $menu_item->classes['0'];
echo ' <li><a id="item-id-'.$id_m.'" class="nav-link '. $classes_m .'" href="' . $url_m . '">' . $name_m . '</a></li>';
    }
    echo '</ul>';
} else {
    // No menu items found
    echo 'No menu items found for the specified menu ID or name.';
}
?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
         <?php 
         $social_ = get_field('social_media_','option');
         ?>
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
  </header><!-- End Header -->
  <?php } ?>
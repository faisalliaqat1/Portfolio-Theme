<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter Theme Template
 * @author    Faisal Liaqat
 * @link      https://searchandfilter.com
 * @copyright 2024 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() )
{
	?>
    <div class="row portfolio-container">
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
          <?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('full', array('class' => 'img-fluid'));
				}
			?>
            <div class="portfolio-info">
              <h4><?php the_title(); ?></h4>
			  <?php 
			$terms = get_the_terms(get_the_ID(), 'portfolio-categories');

			if ($terms && !is_wp_error($terms)) {
				$taxonomy_name = esc_html($terms[0]->name);
				//echo '<p>Portfolio Category: ' . $taxonomy_name . '</p>';
				echo '<p>' . $taxonomy_name  . '</p>';
			}
			?>
              <div class="portfolio-links">
			  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                <a href="<?php echo $url; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php the_title(); ?>"><i class="bx bx-plus"></i></a>
                <a href="<?php the_permalink();?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>	
		<?php
	}
	?>
    </div>
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>
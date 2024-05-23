<?php
/**
 * Faisal POrtfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Faisal_POrtfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function faisal_portfolio_setup() {
	
	load_theme_textdomain( 'faisal-portfolio', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'faisal-portfolio' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'faisal_portfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'faisal_portfolio_setup' );
function faisal_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'faisal_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'faisal_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faisal_portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'faisal-portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'faisal-portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'faisal_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function faisal_portfolio_scripts() {
	wp_enqueue_style( 'faisal-portfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'faisal-portfolio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'faisal-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'faisal_portfolio_scripts' );
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function custom_scripts_addition() {
 	wp_enqueue_style( 'bootstrap-css-min', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css' );
 	wp_enqueue_style( 'bootstrap-icons', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css' );
    wp_enqueue_style( 'box-icon-css', get_stylesheet_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css' );
    wp_enqueue_style( 'glight-box-css', get_stylesheet_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css' );
    wp_enqueue_style( 'remix-icon-css', get_stylesheet_directory_uri() . '/assets/vendor/remixicon/remixicon.css' );
	  wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css' );
 	wp_enqueue_script( 'vannila-js', get_stylesheet_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), '1.0.0', true );
 	wp_enqueue_script( 'boorstrap-bundle-js', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
     wp_enqueue_script( 'glightbox-js', get_stylesheet_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), '1.0.0', true );
     wp_enqueue_script( 'swiper-bundle-js', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'no-framework-js', get_stylesheet_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), '1.0.0', true );
     //wp_enqueue_script( 'validate-js', get_stylesheet_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), '1.0.0', true );
	 wp_enqueue_script( 'main-custom-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts_addition' );

require_once('acf-pages/header_acf.php');

// form submission post type

function create_custom_post_type() {
    register_post_type('form_submissions',
        array(
            'labels' => array(
                'name' => __('Form Submissions'),
                'singular_name' => __('Form Submission')
            ),
            'public' => false,
            'has_archive' => false,
            'supports' => array('title')
        )
    );
}
add_action('init', 'create_custom_post_type');

// Add meta box to form submissions post type
function add_submission_meta_box() {
    add_meta_box(
        'submission_meta_box',
        'Form Submission Data',
        'display_submission_meta_box',
        'form_submissions',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_submission_meta_box');

function custom_submission_admin_page() {
    add_menu_page(
        'Form Submissions',
        'Form Submissions',
        'manage_options',
        'form-submissions',
        'render_submission_admin_page'
    );
}
add_action('admin_menu', 'custom_submission_admin_page');

if (isset($_POST['delete_submission'])) {
    $submission_id = $_POST['submission_id'];
    wp_delete_post($submission_id, true); // Delete post from database
}

function render_submission_admin_page() {
    ?>
    <div class="wrap">
        <h2>Form Submissions</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Subject</strong></th>
                    <th><strong>Message</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to get all form submissions
                $args = array(
                    'post_type' => 'form_submissions',
                    'posts_per_page' => -1, // -1 to get all posts
                );
                $submissions = new WP_Query($args);

                // Loop through submissions and display in table rows
                if ($submissions->have_posts()) :
                    while ($submissions->have_posts()) : $submissions->the_post();
                        ?>
                        <tr>
                            <td><?php the_title(); ?></td>
                            <td><a href="<?php echo 'mailto:' . get_post_meta(get_the_ID(), 'email', true); ?>"><?php echo get_post_meta(get_the_ID(), 'email', true); ?></a></td>
                            <td><?php echo get_post_meta(get_the_ID(), 'subject', true); ?></td>
                            <td><?php the_content(); ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="submission_id" value="<?php echo get_the_ID(); ?>">
                                    <button type="submit" name="delete_submission" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <tr>
                        <td colspan="5">No submissions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title">Form Submissions</h1>
        </header>

        <div class="entry-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
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
                                <td><?php echo get_post_meta(get_the_ID(), 'email', true); ?></td>
                                <td><?php echo get_post_meta(get_the_ID(), 'subject', true); ?></td>
                                <td><?php the_content(); ?></td>
                            </tr>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <tr>
                            <td colspan="4">No submissions found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </main>
</div>

<?php get_footer(); ?>

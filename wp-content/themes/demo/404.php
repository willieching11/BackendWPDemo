<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EpicPress
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container mt-50 mb-100">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>404 PAGE NOT FOUND</h1>
                <div>
                    <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <p>Please try the following:</p>
                    <ul>
                        <li>
                            <?php _e( 'Check your spelling' ); ?>
                        </li>
                        <li>
                            <?php printf(__( 'Return to the <a href="%s">home page</a>' ),home_url()); ?>
                        </li>
                        <li>
                            <?php _e( 'Click the <a href="javascript:history.back()">Back</a> button' ); ?>
                        </li>
                    </ul>
                </div>
			</div>
			<div class="col-12 col-md-6">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>


</main><!-- #main -->

<?php
get_footer();

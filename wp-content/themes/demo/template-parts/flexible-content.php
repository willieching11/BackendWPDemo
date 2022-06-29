<?php /**
 * Flexible Content
 * The template part for displaying flexible content
 * <?php get_template_part( 'template-parts/flexible-content' ); ?>
 */
$page = get_queried_object();
$ID = get_page_by_title($page->label)->ID ?? get_the_ID();
?>
<?php if( have_rows('flexible_content', $ID) ): ?>
    <div class="flexible-content-wrap">
        <?php while ( have_rows('flexible_content', $ID) ) : the_row(); ?>
            <?php 
                $flex_count = get_row_index();
                get_template_part( 'template-parts/customization-block' );
                
                
                //Example of how to print off Custom Button
                if( get_row_layout() == 'example_button' ):                     
                    $test_button = get_sub_field('custom_button');
                    print_button($test_button); 
                endif;
            ?>
            
        <?php endwhile; ?>
    </div>
<?php endif; ?>
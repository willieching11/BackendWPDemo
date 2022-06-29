<?php
/* Flexible Content - Customization Block
* <?php get_template_part( 'template-parts/customization-block' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
 ?>


 <?php if( get_row_layout() == 'customization_block' ): ?>
     <?php $flex_count = get_row_index();
     $total_blocks = count( get_sub_field('blocks') );
     $background_color = get_sub_field('background_color');
     $text_color = get_sub_field('text_color');
     $is_background_image = $background_color != 'image' ? true : false;
     $background_image = get_sub_field('background_image');
     $background_image_style = $background_color == 'image' && !empty($background_image['url']) ? "background-image: url('" . $background_image['url'] . "')" : ''; 

     $mobile_spacing = get_sub_field('mobile_spacing');
     $desktop_spacing = get_sub_field('desktop_spacing');
     $margin_bottom_mobile = $mobile_spacing['margin_bottom'] ?: 0;;
     $margin_bottom_desktop = $desktop_spacing['margin_bottom'] ?: 0;
     $column_offset_value_mobile = $mobile_spacing['column_offset'] ?: 0;
     $column_offset_value_desktop = $desktop_spacing['column_offset'] ?: 0;
     $padding_mobile = $mobile_spacing['padding_top_bottom'] ?: 0;
     $padding_desktop = $desktop_spacing['padding_top_bottom'] ?: 0;
     $block_id = get_sub_field('optional_block_id') ?: 'block-' . $flex_count;
     
      ?>
     <div class="customization-block no-focus <?php echo ' mb-' . 
             $margin_bottom_mobile . ' mb-lg-' . $margin_bottom_desktop . ' py-' . $padding_mobile . ' py-md-' . $padding_desktop . ' background-' . $background_color . ' text-' . $text_color ?>"
             id="<?php echo $block_id ?>" style="<?php echo $background_image_style ?>">
         <div class="container">
             <div class="row">
                 <?php   $block_count = 1; ?>
                 <?php if( have_rows('blocks') ): while ( have_rows('blocks') ) : the_row(); ?>
                     <?php $type = get_sub_field('type_of_block');
                     $column_size_desktop = 'col-md-12';
                     $column_size_mobile = 'col-12';

                     if($total_blocks > 1){
                         if($type == 'text' || $type == 'contact-form'){ //split screen text
                             if($block_count == 1){ //text on left
                                 $column_size_desktop = 'col-md-6';                                                                    
                             } else{
                                 $column_size_desktop = 'col-md-6 offset-md-1';                                                                    
                             }
                         } 
                         else{
                             if($block_count == 1){    //image on left
                                 $column_size_desktop = 'col-md-5';   
                             } else{
                                 $column_size_desktop = 'col-md-5 offset-md-1';                                                                  
                             }
                         }
                     }
                     else{ //full screen block
                         if($column_offset_value_desktop != 0){
                             $column_size_desktop = 'col-lg-' . (12 - ($column_offset_value_desktop*2)) . ' offset-lg-' . $column_offset_value_desktop;
                         }
                         if($column_offset_value_mobile != 0){
                             $column_size_mobile = 'col-' . (12 - ($column_offset_value_mobile*2)) . ' offset-' . $column_offset_value_mobile;
                         }                   
                     }
                     
                     ?>
                     
                     <?php //Text
                     if($type == 'text'): 
                         $heading_group = get_sub_field('heading');
                         $paragraph = get_sub_field('paragraph');
                         $heading_size = $heading_group['heading_size'];
                         $button = get_sub_field('buttons');
                         $text_align = get_sub_field('text_align') ? 'text-' . get_sub_field('text_align') : '';
                         $sm_order = $total_blocks > 0 ? 'order-sm-only-2' : '';
                         ?>
                         <div class="<?php echo $column_size_mobile . ' ' . $column_size_desktop . ' ' . $sm_order . ' ' . $text_align ?> align-self-center">
                              <div class="block <?php echo $type ?>-block">
                                    <?php if(!empty($heading_group['heading_text'])): ?>
                                        <?php if($heading_size == 'h1'): ?>
                                            <h1 class="heading mb-10 mb-md-20 <?php echo $heading_size ?>"><?php echo $heading_group['heading_text']; ?></h1>
                                        <?php else: ?>
                                            <?php $heading_size = $heading_size == 'h1-fake' ? 'h1' : $heading_size; ?>
                                            <div class="heading mb-10 mb-md-20  <?php echo $heading_size ?>"><?php echo $heading_group['heading_text']?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($paragraph != null): ?>
                                        <div class="paragraph mb-90 mb-md-10"><?php echo $paragraph ?></div>
                                    <?php endif; ?>
                                    
                                    <?php //Buttons 
                                    $buttons = get_sub_field('buttons');
                                    $inline_buttons = !empty($buttons) && count($buttons) > 1 ? 'd-md-flex justify-content-md-center align-items-md-center' : ''?>
                                    <div class="btn-group <?php echo ($total_blocks == 1 ? 'text-center' : 'text-left') . ' ' . $inline_buttons?>">
                                        <?php 
                                         if($buttons): foreach($buttons as $button): ?>
                                            <?php $button_group = $button['button'];
                                            print_button($button_group);  ?>
                                        <?php endforeach; endif; ?>      
                                    </div>                                   
                             </div>
                         </div>
                     <?php endif ?>
                     
                     <?php //Image gif
                     if($type == 'image-gif'):                         
                         $sm_order = $total_blocks > 0 ? 'order-sm-only-1' : ''?>
                         <div class="<?php echo $column_size_mobile . ' ' . $column_size_desktop . ' ' . $sm_order ?> d-flex justify-content-center align-self-center mb-10 mb-lg-0">
                             <div class="block <?php echo $type ?>-block">
                                  <?php $image = get_sub_field('image_gif'); ?> 
                                  <?php if(!empty($image)): ?>
                                       <picture>
                                            <source media="(max-width:<?php echo BP_MEDIUM ?>px)" srcset="<?php echo $image['sizes']['medium_large'] ?>">
                                            <source media="(max-width:<?php echo BP_LARGE ?>px)" srcset="<?php echo $image['sizes']['large'] ?>">
                                            <img src="<?php echo $image['url'] ?>" alt="selah">
                                       </picture>    
                                  <?php endif; ?>
                             </div>
                         </div>
                     <?php endif ?>
                     
                     <?php //Video
                     if($type == 'video'): 
                         $sm_order = $total_blocks > 0 ? 'order-sm-only-1' : ''?>
                         <div class="<?php echo $column_size_mobile . ' ' . $column_size_desktop . ' ' . $sm_order ?> align-self-center">
                             <div class="block <?php echo $type ?>-block relative h-100">
                                 
                                 <?php $video_block = get_sub_field('video');
                                 $video_preview = $video_block['video_placeholder_image'];  
                                 
                                   if(!empty($video_block['video']['url'])): ?>
                                        <div class="video-wrapper text-center h-100">
                                             <video playsinline controls class="video d-none" data-video_src='<?php echo $video_block['video']['url']?>' id="video-<?php echo $flex_count . '-' . $block_count?>" data-id="<?php echo $flex_count . '-' . $block_count?>">
                                               <source src="<?php //echo $video_block['video']['url']?>" type="video/mp4" >
                                               Your browser does not support the video tag. Please try another browser.
                                             </video> 
                                             <div class='video-placeholder py-md-20 h-100'>
                                                 <img src="<?php echo $video_preview['url'] ?? '' ?>" alt="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="246" height="247" viewBox="0 0 246 247" id="svg-replaced-61" class="style-svg video-play-btn replaced-svg svg-replaced-61">
                                                    <g id="Group_592" data-name="Group 592" transform="translate(-0.474 0.053)">
                                                        <g id="Area" transform="translate(0.474 -0.053)" fill="none" stroke="#ffffff" stroke-width="4">
                                                        <rect width="246" height="247" rx="123" stroke="none"></rect>
                                                        <rect x="2" y="2" width="242" height="243" rx="121" fill="none"></rect>
                                                        </g>
                                                        <path id="Polygon_1" data-name="Polygon 1" d="M65.068,12.035a8,8,0,0,1,13.865,0l58.16,100.972A8,8,0,0,1,130.16,125H13.84a8,8,0,0,1-6.932-11.993Z" transform="translate(202.474 51.947) rotate(90)" fill="#ffffff"></path>
                                                    </g>
                                                </svg>
                                             </div>
                                        </div>
                                   <?php endif; ?>
                                 
                             </div>
                         </div>
                     <?php endif ?>
                         
                     <?php //Contact Form
                     if($type == 'contact-form'): ?>                    
                         <div class="<?php echo $column_size_mobile . ' ' . $column_size_desktop ?> align-self-center">
                             <div class="block <?php echo $type . '-block '?>">
                                 <div class='block-contact-form contact-form'>
                                     <?php if(!empty(get_sub_field('contact_form_7_shortcode'))): ?>
                                         <?php echo do_shortcode(get_sub_field('contact_form_7_shortcode'))?>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     <?php  endif;?>

               
                 <?php $block_count++ ?>
             <?php endwhile; endif; ?>
             </div>
         </div>
     </div>
 <?php endif; ?>
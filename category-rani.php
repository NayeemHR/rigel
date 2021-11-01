<?php 
single_cat_title();
$rigel_current_term = get_queried_object(  );
// var_dump($rigel_current_term);
$rigel_term_thumbnail_id = get_field("thumbnail", $rigel_current_term);
if($rigel_term_thumbnail_id){
    $file_thumb_details = wp_get_attachment_image_src($rigel_term_thumbnail_id);
    echo "<img src='".esc_url( $file_thumb_details[0] )."'/>";
}
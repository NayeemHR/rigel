<div class="comments">
<span class="dashicons dashicons-arrow-right"></span>
    <h2 class="comments-title">
        <?php 
        $rigel_cn = get_comments_number();
        if( $rigel_cn == 0 ){
            _e("No Comments","rigel");
        }elseif( $rigel_cn == 1 ){
            _e("1 Comment", "rigel"); 
        } else {
            echo $rigel_cn." ".__("Comments", "rigel"); 
        }
        ?>
    </h2>
    <div class="comments-list">
        <?php wp_list_comments(); ?>
        <div class="comments-paginations">
        <?php 
        the_comments_pagination( array(
            //'screen_reader_text' => __('Pagination', 'rigel'),
            'prev_text'          => '<span class="dashicons dashicons-arrow-left"></span>' . __('Previous Comments', 'rigel'),
            'next_text'          => __('Next Comments', 'rigel') . '<span class="dashicons dashicons-arrow-right"></span>',    
        ) );
        ?>
        </div>
        <?php
        if(!comments_open(  )){
            _e('Comments are closed.', 'rigel');
        }
        ?>
    </div>
    <div class="comments-form">
    <?php 
        comment_form();
    ?>
    </div>
    
</div>


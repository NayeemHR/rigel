<?php get_header(); ?>
<section class="search-page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <h1><?php echo get_search_form(  ); ?></h1>
          <h3><?php echo esc_html('You are search for: '); the_search_query(); ?></h3>
        
      </div>
    </div>
  </div>
</section>


<div class="page-wrapper">
	<div class="container">
		<div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php 
                if(!have_posts(  )){
                  ?>
                  <h4><?php echo _e('No Result Found', 'rigel'); ?></h4>
                  <?php
                }
                    while (have_posts()) {
                        the_post();
                        get_template_part("post-formats/content", get_post_format());
                    }
                ?>
				<div class="text-center">
                    <?php 
                    the_posts_pagination(array(
                        'mid_size' => 5,
                        'prev_text' => __( 'Next', 'rigel' ),
                        'next_text' => __( 'Prev', 'rigel' ),

                    ));
                    ?>
				</div>
      		</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
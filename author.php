<?php get_header(); ?>
<section class="page-title custom-title-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1><?php echo get_bloginfo('name') ?></h1>
          <p><?php echo get_bloginfo('description') ?></p>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			
                    <div class="row">
                        <div class="col-md-3">
                            <?php
                            echo get_avatar(get_the_author_meta('ID'));
                            ?>
                        </div>
                        <div class="col-md-9">
                            <h2><?php echo get_the_author_meta('display_name') ?></h2>
                            <p><?php echo get_the_author_meta('description') ?></p>
                        </div>
                    </div>
                
<?php 
	while (have_posts()) {
		the_post();
?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php
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
					<!-- <ul class="pagination post-pagination">
						<li><a href="#">Prev</a>
						</li>
						<li class="active"><a href="#">1</a>
						</li>
						<li><a href="#">2</a>
						</li>
						<li><a href="#">3</a>
						</li>
						<li><a href="#">4</a>
						</li>
						<li><a href="#">5</a>
						</li>
						<li><a href="#">Next</a>
						</li>
					</ul> -->
				</div>
      		</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
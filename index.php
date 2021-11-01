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
<?php 
	if(!have_posts(  )){
		?>
		<h4><?php echo _e('No Result Found', 'rigel'); ?></h4>
		<?php
	}
	while (have_posts()) {
		the_post();

		get_template_part("post-formats/content", get_post_format());
?>

<?php
	}
?>
				<div class="text-center">
				<?php 
				the_posts_pagination(array(
					'mid_size' => 5,
					'prev_text' => __( 'Prev', 'rigel' ),
    				'next_text' => __( 'Next', 'rigel' ),

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
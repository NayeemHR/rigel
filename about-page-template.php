<?php
/*
Template Name: About Page Template
*/
get_header();

while(have_posts()){
    the_post();
?>
<section class="page-title page-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="about section">
	<div class="container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<?php the_content();
		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>

		</div>
		</div>
        </div>
</section>

<section class="testimonial section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="testimonial-carousel text-center">
					<div class="testimonial-slider owl-carousel">
                        
                        <?php
                        $attachments = new Attachments( 'testimonials' );
                            if ( $attachments->exist() ){
                                while( $attachment = $attachments->get()){
                        ?>
						<div>
							<i class="ion-quote"></i>
							<p>"<?php echo esc_html( $attachments->field('testimonial') ) ; ?>"</p>
							<div class="user">
                                <?php echo $attachments->image('thumbnail'); ?>
								<p><span><?php echo esc_html( $attachments->field('name') ) ; ?></span> <?php echo esc_html( $attachments->field('position') ) ; ?></p>
							</div>
						</div>
                        <?php
                            }
                        }
                        ?>  
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>


<?php
}
    get_footer(); ?>
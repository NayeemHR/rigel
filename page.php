<?php get_header();

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
		<div class="col-md-10 offset-md-2">
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


<?php
}
    get_footer(); ?>
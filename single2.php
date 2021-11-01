<?php get_header(); ?>
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Blog</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="post post-single" <?php post_class(); ?>>
					<h2 class="post-title"><?php the_title(); ?></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="ion-calendar"></i> <?php echo get_the_date(); ?>
							</li>
							<li>
								<i class="ion-android-people"></i> POSTED BY <?php the_author(); ?>
							</li>
							<li>
								<?php 
								if(has_tag()){
								?>
								<i class="ion-pricetags"></i>
								<?php
								$tag = get_the_tag_list('',' | ', '');
								echo strtoupper($tag);
								}
								?>
								
							</li>

						</ul>
					</div>
					<div class="post-thumb">
						
						<?php 
						$thumbnail_url = get_the_post_thumbnail_url(null,"large");

						// echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
						printf( '<a href="%s" data-featherlight="image">', $thumbnail_url );
							if(has_post_thumbnail()){
								the_post_thumbnail( 'large', array(
									'class' => "img-responsive",
									'alt'   => ""
								));
							} 
						echo '</a>';
							?>
					</div>
					<div class="post-content post-excerpt">
						<?php the_content();
						wp_link_pages();
//						previous_post_link( );
//						echo '<br>';
//						next_post_link( );
						?>
					</div>
					<?php //if(comments_open()) : ?>
					<div class="post-comments">
						<?php //comments_template(); ?>
					</div>
					<?php //endif; ?>
				</div>
			</div>
			<div class="col-md-4">
				<aside class="sidebar">
			<?php 
				if(is_active_sidebar( 'sidebar-1' )){
					dynamic_sidebar( 'sidebar-1' );
				}
			?>
				</aside>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
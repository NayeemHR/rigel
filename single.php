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
</section>
<?php
$html_col = '<div class="col-md-10 col-md-offset-1">';
if(is_active_sidebar('single_post_sidebar')){
	$html_col = '<div class="col-md-9">';
}
?>

<section class="page-wrapper">
	<div class="container">
		<div class="row">

                <?php
                echo $html_col;
                while (have_posts()){
                    the_post();

                ?>
				<div  <?php post_class('post-single'); ?>>
					<h2 class="post-title"><?php the_title(); ?></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="ion-calendar"></i> <?php echo get_the_date(); ?>
							</li>
							<li>
								<i class="ion-android-people"></i> POSTED BY <?php the_author_posts_link(); ?>
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
							if(has_post_thumbnail()){
								the_post_thumbnail( 'large', array(
									'class' => "img-responsive",
									'alt'   => ''
								));
							}
							?>
					</div>
					<div class="post-content post-excerpt">
                        <span class="dashicons dashicons-email"></span>
						<?php the_content();
						if( get_post_format() == 'image' && function_exists('the_field') ):
							?>
							<div class="metainfo">
							<strong>Camera Model: </strong> <?php the_field( 'camera_model' ); ?> </br>
							<strong>Location: </strong> 
							<?php 
							$image_location = get_field( 'location' );
							echo esc_html( $image_location );
							?>
							</br>
							<strong>Date: </strong> <?php the_field( 'date' ); ?></br>
								<?php if( get_field('licensed')): ?>
									<strong>License Information: </strong>
									<?php echo apply_filters("the_content", get_field('licenses_information')); ?>
								<?php endif; ?>
							<?php 
							$rigel_image = get_field('random_image');
							$rigel_image_details = wp_get_attachment_image_src($rigel_image,"rigel-square");
							echo "<img src='".esc_url($rigel_image_details[0])."'>";
							?>
							<p>
							<?php 
							$file = get_field("attachment_file");
							
							if($file) {
								$file_url = wp_get_attachment_url( $file );
								
								$file_thumb = get_field("thumbnail", $file);
								
								if($file_thumb){
									$file_thumb_details = wp_get_attachment_image_src( $file_thumb );
									var_dump($file_thumb_details);
									echo "<a target='_blank' href='{$file_url}'><img src='".esc_url( $file_thumb_details[0] )."'></a>";
								}else{
									echo "<a target='_blank' href='{$file_url}'>Click Here for Download</a>";
								}
							}
							
							?>
							</p>
							</div>
							<?php
						endif;
						?>
					</div>

					<?php 
					if( get_post_format() == 'image' && class_exists('CMB2') ):
						$photographer_name = get_post_meta( get_the_ID(), '_rigel_photographer_name', true );
						$have_assistant = get_post_meta( get_the_ID(), '_rigel_have_an_assistant', true );
						$assistant_name = get_post_meta( get_the_ID(), '_rigel_assistant_s_name', true );
						?>
						<div class="metainfo">
						<strong>Photographer Name: </strong> <?php echo esc_html($photographer_name); ?> </br>
						<?php if($have_assistant){ ?>
							<strong>Assistant's Name: </strong> <?php echo esc_html($assistant_name); ?> </br>
						<?php }?>
						
						</div>
						<?php
					endif;
					?>
				</div>
                    <?php
                }
                wp_link_pages();
                    ?>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <?php
                            echo get_avatar(get_the_author_meta('ID'));
                            ?>
                        </div>
                        <div class="col-md-9">
                            <h2><?php echo get_the_author_meta('display_name') ?></h2>
                            <p><?php echo get_the_author_meta('description') ?></p>
							<?php if(function_exists('the_field')): ?>
								<p>
									<?php 
										$user_facebook = get_field("facebook", "user_".get_the_author_meta( "ID" ));
										if($user_facebook):?>
										<a target="_blank" href="<?php echo $user_facebook ?>">Facebook</a>
										<?php
										endif;
									?>
									<br>
									<?php 
										$user_instagram = get_field("instagram", "user_".get_the_author_meta( "ID" ));
										if($user_instagram):?>
										<a target="_blank" href="<?php echo $user_instagram ?>">Instagram</a>
										<?php
										endif;
									?>
									
								</p>
							<?php endif; ?>
                        </div>
                    </div>
					<div class="row">
						<?php if( !post_password_required() ): ?>
						<?php comments_template(); ?>
						<?php endif; ?>
					</div>
					
					<?php 
					$related_posts = get_field('related_posts');
					if($related_posts && function_exists('the_field')) : ?>
						<div class="related-posts">
						<h1><?php _e( "Related Posts", "rigel" ); ?></h1>
						<?php 
							
							$rigel_rp = new WP_Query(array(
								'post__in' => $related_posts,
								'orderby' => 'post__in'
							));

							while($rigel_rp->have_posts(  )){
								$rigel_rp->the_post(  );
								?>
								<h4><?php the_title(); ?></h4>
								<?php
							}
							wp_reset_query(  );
						?>
						</div>
					<?php endif; ?>
					
                </div>
			</div>

            <?php
            if(is_active_sidebar('single_post_sidebar')){
                echo '<div class="col-md-3">';
	            dynamic_sidebar('single_post_sidebar');
	            echo '</div>';
            }
            ?>

		</div>
	</div>
</section>
<?php get_footer(); ?>
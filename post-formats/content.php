<div <?php post_class(); ?>>
	<div class="post-media post-thumb">
		<a href="blog-single.html">
			<?php
			if(has_post_thumbnail()){
				the_post_thumbnail( 'large' );
			}
			?>
		</a>
	</div>

	<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>
		</a></h3>
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
				if(has_tag( )){
					?>
					<i class="ion-pricetags"></i>
					<?php
					echo get_the_tag_list(' ',' | ',' ');

				}

				?>
			</li>
            <li>

				<?php
				if(has_category( )){
					?>
					<i class="ion-pricetags"></i>
					<?php
					echo get_the_category_list(' | ');

				}

				?>
			</li>

		</ul>
	</div>

	<div class="post-content">
		<?php
		// if(!post_password_required()){
		// 	if(is_single()){
		// 		the_content();
		// 	}else {
		// 		the_excerpt();
		// 	}
		// }else{
		// 	echo get_the_password_form();
		// }
		the_excerpt();
		?>
		<!-- <a href="blog-single.html" class="btn btn-main">Continue Reading</a> -->
	</div>

</div>

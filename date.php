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
                <h3>List of
                    <?php
                        if (is_month()){
                            $month = get_query_var("monthnum");
                            $dataobj = DateTime::createFromFormat("!m", $month);
                            echo $dataobj->format("F");
                        } elseif (is_year()){
	                        echo esc_html(get_query_var('year'));
                        }else{
							$day = get_query_var("day");
							$month = get_query_var("monthnum");
							$year = get_query_var("year");
                            printf("%s/%s/%s", $day, $month, $year);
                        }
                    ?></h3>
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
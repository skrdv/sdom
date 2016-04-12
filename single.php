<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="container cf">

					<main id="main" class="col-md-9 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
							<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
						</div>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php echo get_post_format(); ?>

							<?php get_template_part( 'post-formats/format', get_post_format() ); ?>

							<aside class="block-related-posts">
	  						  <?php
	  						  $post_id = get_the_ID();
	  						  $cat_ids = array();
	  						  $current_post_type = get_post_type( $post_id );
	  						  $args = array(
	  							  'category__in' => $cat_ids,
	  							  'post_type' => $current_post_type,
	  							  'posts_per_page' => '5',
	  							  'post__not_in' => array( $post_id )
	  						  );
	  						  $query = new WP_Query( $args );

	  						  if ( $query->have_posts() ) {
	  							?>

	  						          <h4 class="block-title">Возможно вас заинтересует:</h4>
	  						          <div class="projects-grid col-md-12">
	  						             <?php while ( $query->have_posts() ) { ?>
	  										<?php $query->the_post(); ?>
	  											<?php if (has_post_thumbnail()) { ?>
	  											  <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-md-4 col-sm-6' ); ?> role="article">
	  												<section class="project-content">
	  													 <?php the_post_thumbnail(); ?>
	  													<a class="cover" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	  														<h3 class="title"><?php the_title(); ?></h3>
	  													</a>
	  												</section>
	  	  	  									</article>
	  											<?php } ?>
	  						            <?php } ?>
	  						          </div>



	  						      <?php } ?>
	  						  <?php wp_reset_postdata(); ?>
	  					  </aside>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<section class="entry-content">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</section>
							</article>

						<?php endif; ?>

					</main>

					<?php get_sidebar('categories'); ?>

					<div class="feedback col-md-12">
						<div class="feedback-man"></div>
						<div class="feedback-title">У вас появился <span>вопрос?</span></div>
						<div class="feedback-desc">немедленно задайте его нам!</div>
						<?php echo do_shortcode( '[contact-form-7 id="20" title="Обратная связь"]' ); ?>
					</div>

				</div>

			</div>

<?php get_footer(); ?>

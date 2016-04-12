<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="container cf">

					<main id="main" class="col-md-9 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
							<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
						</div>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

			  				  <header class="article-header">
			  					  <h1 class="single-title"><?php the_title(); ?></h1>
			  				  </header>

			  				  <section class="entry-content cf">
			  						  <?php the_content(); ?>

			  				  </section>

			                </article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<section class="entry-content">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</section>
							</article>

						<?php endif; ?>

					</main>

					<?php get_sidebar('articles'); ?>

					<div class="feedback col-md-12">
						<div class="feedback-man"></div>
						<div class="feedback-title">У вас появился <span>вопрос?</span></div>
						<div class="feedback-desc">немедленно задайте его нам!</div>
						<?php echo do_shortcode( '[contact-form-7 id="20" title="Обратная связь"]' ); ?>
					</div>

				</div>

			</div>

<?php get_footer(); ?>

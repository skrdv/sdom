<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all col-md-9 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
								<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
							</div>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">
									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
								</header>

								<section class="entry-content cf">

									<div id="project-content" class="project-content col-md-8">
										<?php the_content(); ?>
									</div>

									<div id="project-params" class="project-data col-md-4">
										<div class="param cf">
											<div class="label">Общий размер дома</div>
											<div class="value">
												<?php the_field('overall_size'); ?>
											</div>
										</div>
										<div class="param cf">
											<div class="label">Общая площадь</div>
											<div class="value">
												<?php the_field('total_area'); ?>
											</div>
										</div>
										<div class="param cf">
											<div class="label">Площадь крыльца</div>
											<div class="value">
												<?php the_field('porch_area'); ?>
											</div>
										</div>
										<div class="param cf">
											<div class="label">Площадь веранды</div>
											<div class="value">
												<?php the_field('veranda_area'); ?>
											</div>
										</div>
										<div class="param cf">
											<div class="label">Площадь балкона</div>
											<div class="value">
												<?php the_field('balcony_area'); ?>
											</div>
										</div>
									</div>



								</section> <!-- end article section -->

								<footer class="article-footer">


								</footer>



							</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php get_sidebar('sidebar-projects'); ?>

						<div id="feedback" class="feedback col-md-12">
							<div class="feedback-title">У вас появился <span>вопрос?</span></div>
							<div class="feedback-desc">немедленно задайте его нам!</div>
							<?php echo do_shortcode( '[contact-form-7 id="20" title="Контактная форма"]' ); ?>
						</div>

				</div>

			</div>

<?php get_footer(); ?>

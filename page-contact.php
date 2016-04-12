<?php
/*
 Template Name: Контакты
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="container cf">

					<?php get_sidebar('home'); ?>

					<main id="main" class="col-md-9 cf homepage" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>

							<section class="entry-content cf" itemprop="articleBody">
								<?php the_content(); ?>
							</section>

							<div class="block block-home-works">
								<header class="block-header">
									<h3 class="block-title">Наши работы</h3>
									<a class="btn btn-sm btn-brown btn-more" href="/articles">смотрт все</a>
								</header>

							</div>

						</article>

						<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry cf">
								<section class="entry-content">
									<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
								</section>
							</article>

						<?php endif; ?>

					</main>

					<div class="feedback col-md-12">
						<div class="feedback-man"></div>
						<div class="feedback-title">У вас появился <span>вопрос?</span></div>
						<div class="feedback-desc">немедленно задайте его нам!</div>
						<?php echo do_shortcode( '[contact-form-7 id="20" title="Обратная связь"]' ); ?>
					</div>

				</div>

			</div>


<?php get_footer(); ?>

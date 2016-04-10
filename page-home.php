<?php
/*
 Template Name: Home page
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

					<div id="block-project-categories" class="col-md-12">

						<?php foreach (get_terms('project_cat') as $cat) : ?>
							<div class="col-md-4">
								<a href="<?php echo get_term_link($cat->slug, 'project_cat'); ?>">
									<img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
									<h3><?php echo $cat->name; ?></h3>
								</a>
								<div class="description"><?php echo $cat->description; ?></div>
							</div>
						<?php endforeach; ?>

					</div>

					<?php get_sidebar('sidebar-home'); ?>

					<main id="main" class="m-all col-md-9 cf homepage" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div id="block-works" class="block">
							<header class="block-header">
								<h3 class="block-title">Наши работы</h3>
								<a class="block-btn-all btn btn-sm" href="/articles">смотрт все</a>
							</header>
							<?php
							$args = array ( 'cat' => '17', 'posts_per_page' => '2' );
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									the_title();
									echo '<div class="entry-content">';
									the_content();
									echo '</div>';
								}
							} else {
								echo'<p>В категории нет записей.</p>';
							}
							wp_reset_postdata();
							?>
						</div>

						<div id="block-articles" class="block">
							<header class="block-header">
								<h3 class="block-title">Интересные статьи</h3>
								<a class="block-btn-all btn btn-sm" href="/articles">смотрт все</a>
							</header>
							<?php
							$args = array( 'cat' => '18', 'posts_per_page' => '2' );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							the_title();
							echo '<div class="entry-content">';
							the_content();
							echo '</div>';
							endwhile;
							?>
						</div>



						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">

								<h1 class="page-title"><?php the_title(); ?></h1>

								<p class="byline vcard">
									<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
								</p>


							</header>

							<section class="entry-content cf" itemprop="articleBody">
								<?php
									// the content (pretty self explanatory huh)
									the_content();

									/*
									 * Link Pages is used in case you have posts that are set to break into
									 * multiple pages. You can remove this if you don't plan on doing that.
									 *
									 * Also, breaking content up into multiple pages is a horrible experience,
									 * so don't do it. While there are SOME edge cases where this is useful, it's
									 * mostly used for people to get more ad views. It's up to you but if you want
									 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
									 *
									 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
									 *
									*/
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
							</section>


							<footer class="article-footer">

							<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

							</footer>


						</article>

						<?php endwhile; else : ?>

								<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>

					</main>

					<div id="feedback" class="feedback col-md-12">
						<div class="feedback-title">У вас появился <span>вопрос?</span></div>
						<div class="feedback-desc">немедленно задайте его нам!</div>
						<?php echo do_shortcode( '[contact-form-7 id="20" title="Контактная форма"]' ); ?>
					</div>

				</div>

			</div>


<?php get_footer(); ?>

<?php
/*
 Template Name: Главная
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

					<div class="block-home-categories col-md-12">
						<?php
						$args = array(
				    	    'orderby'	   	=> 'none',
							'include'		=> '37,41,43,39,42,44',
				    	    'hide_empty'    => 1,
							'parent'		=> 0,
							'hierarchical' 	=> 1,
				    	    'taxonomy' 		=>'category',
				    	);
				    	$categories = get_categories($args);
				    	foreach( $categories as $category ):
						?>
						<div class="col-md-4">
							<div class="item">
								<a href="<?php echo get_term_link($category->slug, 'category'); ?>">
									<div class="image">
										<img src="<?php echo z_taxonomy_image_url($category->term_id); ?>" />
									</div>
									<h3 class="title"><?php echo $category->name; ?></h3>
								</a>
								<div class="desc"><?php echo $category->description; ?></div>
								<ul>
								<?php $termchildren = get_term_children( $category->term_id, 'category' ); ?>
								<?php foreach ( $termchildren as $key=>$child ): ?>
									<?php if($key < 5): ?>
									<?php $term = get_term_by( 'id', $child, 'category' ); ?>
									<li>
										<a href="<?php echo get_term_link( $child, 'category' ) ?>">
											<?php echo $term->name ?>
										</a>
									</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

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
								<?php /*
								$args = array ( 'post_type' => array( 'project' ), 'posts_per_page' => '6' );
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
								*/ ?>
							</div>

							<div class="block block-home-articles">
								<header class="block-header">
									<h3 class="block-title">Интересные статьи</h3>
									<a class="btn btn-sm btn-brown btn-more" href="/all-articles/">смотрт все</a>
								</header>

								<?php $articles_ids = array('120', '128'); ?>
								<?php foreach ( $articles_ids as $page_id ): ?>
									<?php $page = get_post($page_id); ?>
									<?php $content = apply_filters('the_content', $page->post_content); ?>
								<div class="article-item cf">
									<a class="article-image" href="<?php echo get_permalink( $page_id ); ?>">
										<?php echo get_the_post_thumbnail( $page_id, 'bones-thumb-article' ); ?>
									</a>
									<div class="article-data">
										<h3 class="article-title">
											<a href="<?php echo get_permalink( $page_id ); ?>">
											<?php echo $post->post_title; ?>
											</a>
										</h3>
										<div class="article-date">
											<?php echo $post->post_date; ?>
										</div>
										<div class="article-content">
											<?php echo(strip_tags($content)); ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>



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

<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); ?>

			<div id="content" class="category">
				<div id="inner-content" class="container cf">

						<main id="main" class="projects-category m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
								<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
							</div>

							<h1 class="archive-title col-md-12"><?php single_cat_title(); ?></h1>

							<div class="block-sub-categories col-md-12">
								<?php
								$term_id = $wp_query->get_queried_object_id();
								$parent  = get_term_by( 'id', $term_id, 'category');
							    if ($parent->parent != '0'){
							        $term_id = $parent->parent;
							    }
								$termchildren = get_term_children( $term_id, 'category' );
								foreach ( $termchildren as $key=>$child ):
									$term = get_term_by( 'id', $child, 'category' ); ?>
									<div class="item">
										<a href="<?php echo get_term_link( $child, 'category' ) ?>">
											<h3 class="title"><?php echo $term->name ?></h3>
										</a>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="projects-grid col-md-12">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-md-3' ); ?> role="article">
										<header class="article-header">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<h3 class="title"><?php the_title(); ?></h3>
											</a>
										</header>
										<section class="entry-content">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
										</section>
									</article>
								<?php endwhile; ?>
							</div>

							<div class="page-navi col-md-12">
								
								<?php bones_page_navi(); ?>
							</div>

							<?php else : ?>

								<article id="post-not-found" class="hentry cf">
									<section class="entry-content">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										<p><?php //_e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										<p><?php //_e( 'This is the error message in the taxonomy-custom_cat.php template.', 'bonestheme' ); ?></p>
									</section>
								</article>

							<?php endif; ?>

						</main>

						<div id="feedback" class="feedback col-md-12">
							<div class="feedback-man"></div>
							<div class="feedback-title">У вас появился <span>вопрос?</span></div>
							<div class="feedback-desc">немедленно задайте его нам!</div>
							<?php echo do_shortcode( '[contact-form-7 id="20" title="Контактная форма"]' ); ?>
						</div>

				</div>
			</div>

<?php get_footer(); ?>

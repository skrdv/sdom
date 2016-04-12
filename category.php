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
				<?php if (function_exists('bcn_display')) { bcn_display(); } ?>
			</div>

			<h1 class="category-title col-md-12"><?php single_cat_title(); ?></h1>

			<?php
			$term_id = $wp_query->get_queried_object_id();
			$parent = get_term_by('id', $term_id, 'category');
			if ($parent->parent != '0') {
				$term_id = $parent->parent;
			}
			$children = get_term_children($term_id, 'category');
			if (!empty($children)):
			?>
			<div class="block-sub-categories col-md-12">
				<?php foreach ($children as $key => $child):?>
				<?php $term = get_term_by('id', $child, 'category'); ?>
				<div class="item">
					<a href="<?php echo get_term_link($child, 'category') ?>">
						<h3 class="title"><?php echo $term->name ?></h3>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<div class="projects-grid col-md-12">
				<div class="container">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-md-3 col-sm-6'); ?> role="article">
						<section class="project-content">
							<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
							<a class="cover" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<h3 class="title"><?php the_title(); ?></h3>
							</a>
						</section>
					</article>
				<?php endwhile; ?>
				</div>
			</div>
			<div class="page-navi col-md-3">
				<?php bones_page_navi(); ?>
			</div>
			<div class="category-description col-md-9">
				<?php $category = get_the_category(); ?>
				<?php print_r($category); ?>
				<?php echo $category[0]->category_description; ?>
			</div>

			<?php else : ?>

				<article id="post-not-found" class="hentry cf">
					<section class="entry-content">
						<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
					</section>
				</article>

			<?php endif; ?>

		</main>

		<div class="block feedback col-md-12">
			<div class="feedback-man"></div>
			<div class="feedback-title">У вас появился <span>вопрос?</span></div>
			<div class="feedback-desc">немедленно задайте его нам!</div>
			<?php echo do_shortcode('[contact-form-7 id="20" title="Обратная связь"]'); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>

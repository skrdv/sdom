<div id="sidebar-projects" class="sidebar m-all col-md-3 cf" role="complementary">
	<div class="inner">
		<?php if ( is_active_sidebar( 'sidebar-projects' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-projects' ); ?>
		<?php else : ?>
			<?php foreach (get_terms('project_cat') as $cat) : ?>
				<a class="box" href="<?php echo get_term_link($cat->slug, 'project_cat'); ?>">
					<img class="image" src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
					<h3 class="title"><?php echo $cat->name; ?></h3>
				</a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

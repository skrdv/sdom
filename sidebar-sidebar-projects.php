<div id="sidebar-projects" class="block-sidebar-projects m-all col-md-3 cf" role="complementary">
	<div class="inner">
		<?php
		if ( is_active_sidebar( 'sidebar-projects' ) ) :
			dynamic_sidebar( 'sidebar-projects' );
		else :
			$args = array(
				'orderby'	   	=> 'none',
				'exclude'		=> 1,
				'hide_empty'    => 1,
				'parent'		=> 0,
				'hierarchical' 	=> 1,
				'taxonomy' 		=>'category',
			);
			$categories = get_categories($args);
			foreach ($categories as $category) : ?>
				<a class="box" href="<?php echo get_term_link($category->slug, 'category'); ?>">
					<img class="image" src="<?php echo z_taxonomy_image_url($category->term_id); ?>" />
					<h3 class="title"><?php echo $category->name; ?></h3>
				</a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

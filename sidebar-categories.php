<div class="sidebar col-md-3 cf" role="complementary">
	<div class="sidebar-categories">
		<?php
		if ( is_active_sidebar( 'categories' ) ) :
			dynamic_sidebar( 'categories' );
		else :
			$args = array(
				'orderby'	   	=> 'none',
				'include'		=> '37,41,43,39,40,42,44',
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

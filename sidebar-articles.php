				<div class="col-md-4 sidebar cf" role="complementary">
					<div class="sidebar-articles" >
					<?php if ( is_active_sidebar( 'articles' ) ) : ?>
						<?php dynamic_sidebar( 'articles' ); ?>
					<?php else : ?>
						<nav role="navigation">
							<?php wp_nav_menu(array(
							'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
							'container_class' => 'articles-links cf',         // class of container (should you choose to use it)
							'menu' => __('Articles Links', 'bonestheme'),   // nav name
							'menu_class' => 'nav sidebar-nav cf',            // adding custom nav class
							'theme_location' => 'articles-links',             // where it's located in the theme
							'before' => '',                                 // before the menu
							'after' => '',                                  // after the menu
							'link_before' => '',                            // before each link
							'link_after' => '',                             // after each link
							'depth' => 2,                                   // limit the depth of the nav
							'fallback_cb' => 'bones_footer_links_fallback',  // fallback function
							)); ?>
						</nav>
					<?php endif; ?>
					</div>
				</div>

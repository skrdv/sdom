				<div class="sidebar sidebar-home col-md-3 cf" role="complementary">

					<?php if ( is_active_sidebar( 'home' ) ) : ?>

						<?php dynamic_sidebar( 'home' ); ?>

					<?php else : ?>

						<a class="banner" href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/banner-home-credit.png" />
						</a>

						<a class="banner" href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/banner-home-sales.png" />
						</a>

					<?php endif; ?>

				</div>

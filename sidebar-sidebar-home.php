				<div id="sidebar-home" class="sidebar m-all col-md-3 cf" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-home' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'There are no widgets in Home Sidebar.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>

			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="footer-top"></div>
				<div id="inner-footer" class="container cf">
					<div class="col-sm-12 col-md-5 footer-logo">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" />
						</a>
					</div>
					<div class="col-sm-4 col-md-2 footer-nav">
						<div class="menu-services">
							<div class="footer-title">Наши услуги</div>
							<nav role="navigation">
								<?php wp_nav_menu(array(
                                'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                                'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
                                'menu' => __('Footer Links 1', 'bonestheme'),   // nav name
                                'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                                'theme_location' => 'footer-links-1',             // where it's located in the theme
                                'before' => '',                                 // before the menu
                                'after' => '',                                  // after the menu
                                'link_before' => '',                            // before each link
                                'link_after' => '',                             // after each link
                                'depth' => 0,                                   // limit the depth of the nav
                                'fallback_cb' => 'bones_footer_links_fallback',  // fallback function
                                )); ?>
							</nav>
						</div>
					</div>
					<div class="col-sm-4 col-md-2 footer-nav">
						<div class="menu-site">
							<div class="footer-title">Меню сайта</div>
							<nav role="navigation">
								<?php wp_nav_menu(array(
                                'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                                'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
                                'menu' => __('Footer Links 2', 'bonestheme'),   // nav name
                                'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                                'theme_location' => 'footer-links-2',             // where it's located in the theme
                                'before' => '',                                 // before the menu
                                'after' => '',                                  // after the menu
                                'link_before' => '',                            // before each link
                                'link_after' => '',                             // after each link
                                'depth' => 0,                                   // limit the depth of the nav
                                'fallback_cb' => 'bones_footer_links_fallback',  // fallback function
                                )); ?>
							</nav>
						</div>
					</div>
					<div class="col-sm-4 col-md-3 footer-info">
						<div class="footer-title">Прочая информация</div>
						<div class="footer-text">
							<div class="phone">8 (812) <span>966-87-59</span></div>
							<div class="adress">С-Пб, Волковский пр., 12</div>
							<div class="email">Email: support@admin.ru</div>
							<a class="map" href="#">Схема проезда</a>
							<a class="strogov"href="http://www.strogov.ru/" target="_blank" alt="Strogov Media">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/strogov.png" />
							</a>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

</body>
</html> <!-- end of site. what a ride! -->

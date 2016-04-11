
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

				  <header class="article-header">
					  <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
				  </header>

				  <section class="entry-content cf">

					  <div class="project-content col-md-8">
						  <?php the_content(); ?>
					  </div>

					  <div class="project-data col-md-4">

						  <div class="params">
							  <div class="param cf">
								  <div class="label">Общий размер дома</div>
								  <div class="value">
									  <?php the_field('overall_size'); ?> м
								  </div>
							  </div>
							  <div class="param cf">
								  <div class="label">Общая площадь</div>
								  <div class="value">
									  <?php the_field('total_area'); ?> м&sup2;
								  </div>
							  </div>
							  <div class="param cf">
								  <div class="label">Площадь крыльца</div>
								  <div class="value">
									  <?php the_field('porch_area'); ?> м&sup2;
								  </div>
							  </div>
							  <div class="param cf">
								  <div class="label">Площадь веранды</div>
								  <div class="value">
									  <?php the_field('veranda_area'); ?> м&sup2;
								  </div>
							  </div>
							  <div class="param cf">
								  <div class="label">Площадь балкона</div>
								  <div class="value">
									  <?php the_field('balcony_area'); ?> м&sup2;
								  </div>
							  </div>
						  </div>

						  <div class="checks">
							  <?php if (the_field('foundation') === 1): ?>
								  <?php echo '<div class="check green">Фундамент</div>'; ?>
							  <?php endif; ?>
							  <?php if (the_field('check_1') === 1): ?>
								  <div class="check gray">Обработка сруба рубанком</div>
							  <?php endif; ?>
							  <?php if (the_field('check_2') === 1): ?>
								  <div class="check gray">Обработка сруба антисептиком</div>
							  <?php endif; ?>
							  <?php if (the_field('check_3') === 1): ?>
								  <div class="check gray">Подвивка мха (первичная конопатка)</div>
							  <?php endif; ?>
						  </div>

						  <div class="price">
							  <div class="label">Цена дома под крышу:</div>
							  <div class="value">
								  ~ <?php the_field('price'); ?> &#8381;
							  </div>
						  </div>

						  <button class="btn btn-lg btn-green btn-order">Перейти к оформлению заказа</button>
						  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

					  </div>
				  </section>

				  <footer class="article-footer">
					  <aside class="block-related-posts col-md-12">
						  <?php
						  $post_id = get_the_ID();
						  $cat_ids = array();
						  $current_post_type = get_post_type( $post_id );
						  $args = array(
							  'category__in' => $cat_ids,
							  'post_type' => $current_post_type,
							  'posts_per_page' => '5',
							  'post__not_in' => array( $post_id )
						  );
						  $query = new WP_Query( $args );

						  if ( $query->have_posts() ) {
							?>

						          <h4 class="block-title">Возможно вас заинтересует:</h4>
						          <div class="projects-grid col-md-12">
						             <?php while ( $query->have_posts() ) { ?>
										<?php $query->the_post(); ?>
											  <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-md-4 col-sm-6' ); ?> role="article">
												<section class="project-content">
													<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
													<a class="cover" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
														<h3 class="title"><?php the_title(); ?></h3>
													</a>
												</section>
	  	  									</article>
						            <?php } ?>
						          </div>



						      <?php } ?>
						  <?php wp_reset_postdata(); ?>
					  </aside>
				  </footer>

              </article> <?php // end article ?>

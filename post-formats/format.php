
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

				  <header class="project-header">
					  <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
				  </header>

				  <section class="entry-content cf">

					<div class="project-gallery col-md-8">

						<div id="project-slider">
						<?php
						$image = get_field('image-1');
						if( !empty($image) ):
							$size = 'medium';
							$thumb = $image['sizes'][ $size ];
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];
						?>
							<div class="slider-image">
								<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
							</div>
						<?php endif; ?>
							<div class="slider-pager">
						 <?php
						 for( $i= 0 ; $i <= 8 ; $i++ ):
							 $image[$i] = get_field('image-'.$i);
							 if( !empty($image[$i]) ):
	 						  	$size = 'thumbnail';
	 						  	$thumb = $image[$i]['sizes'][ $size ];
	 						  	$width = $image[$i]['sizes'][ $size . '-width' ];
	 						  	$height = $image[$i]['sizes'][ $size . '-height' ];
							?>
								<a data-full="<?php echo $image[$i]['url']; ?>">
								  <img src="<?php echo $thumb; ?>" alt="<?php echo $image[$i]['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
							  </a>
							<?php endif; ?>
						<?php endfor;?>
							</div>
						</div>
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
							<div class="checkbox checkbox-0">
								<input type="radio" name="radio0" value="option0" checked="" disabled="">
								<label for="radio0">Фундамент</label>
							</div>
							<div class="checkbox checkbox-2">
								<input type="radio" name="radio2" value="option2" checked="" disabled="">
								<label for="radio2">Обработка сруба</label>
							</div>
							<div class="checkbox checkbox-1">
								<input type="radio" name="radio1" value="option1" checked="" disabled="">
								<label for="radio1">Обработка сруба рубанком</label>
							</div>
							<div class="checkbox checkbox-3">
								<input type="radio" name="radio3" value="option3" checked="" disabled="">
								<label for="radio3">Подвивка мха</label>
							</div>
						</div>

						<div class="price">
							<div class="label">Цена дома под крышу:</div>
							<div class="value">
								~ <?php the_field('price'); ?> &#8381;
							</div>
						</div>

						<button class="btn btn-lg btn-green btn-order" data-toggle="modal" data-target="#orderModal">Перейти к оформлению заказа</button>

						<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Заказ проекта</h4>
							  </div>
							  <div class="modal-body">
								  <h3 class="title"><?php the_title(); ?></h3>
								<?php echo do_shortcode('[contact-form-7 id="113" title="Заказ проекта"]'); ?>
							  </div>
							</div>
						  </div>
						</div>

					</div>

					<div class="project-content col-md-12">
						<?php the_content(); ?>
					</div>


				  </section>

              </article> <?php // end article ?>

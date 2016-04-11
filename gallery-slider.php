
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/bxslider/jquery.bxslider.min.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/library/js/libs/bxslider/jquery.bxslider.css" rel="stylesheet" />

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.slider').bxSlider({
			pagerCustom: '.pager'
		});
	});
</script>

<?php /*
<?php  echo '<script type="text/javascript">'; ?>
<?php echo 'jQuery(document).ready(function($){'; ?>
	<?php echo '$(".slider").bxSlider({'; ?>
  		<?php echo 'buildPager: function(slideIndex){'; ?>
    		<?php echo 'switch(slideIndex){'; ?>
					<?php foreach ($images as $key=>$image) { ?>
					<?php $thumb = wp_get_attachment_image_src( $image->ID, "thumbnail")[0]; ?>
      				<?php echo 'case '.$key.':'; ?>
        				<?php echo 'return \'<img src="'.$thumb.'">\';'; ?>
					<?php } ?>
    			<?php echo '}'; ?>
  			<?php echo '}'; ?>
		<?php echo '});'; ?>
	<?php echo '});'; ?>
<?php echo '</script>'; ?>
*/ ?>

<ul class="slider">
<?php
foreach ($images as $image) {
  $src = wp_get_attachment_url($image->ID); // ссылка на изображение
  $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true); // атрибут alt
?>
  <li><img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" /></li>
<?php } ?>
</ul>

<div class="pager">
	<?php foreach ($images as $key=>$image) { ?>
	  <a data-slide-index="<?php echo $key; ?>" href="">
		  <img src="<?php echo wp_get_attachment_image_src( $image->ID, 'thumbnail')[0]; ?>"/>
	  </a>
	<?php } ?>
</div>

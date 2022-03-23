<?php
/**
 * Nisarul Slider Development
 */


add_action( 'wp_head', function () {
if ( is_front_page(  ) ) : ?>
<style>

	.mySlides {display: none}
	img {vertical-align: middle;}

	.slideshow-container {
	  width: 100%;
	  min-height: 250px;
	  position: relative;
	  margin: auto;
	}

	/* Next & previous buttons */
	.prev, .next {
	  cursor: pointer;
	  position: absolute;
	  top: 50%;
	  width: auto;
	  padding: 16px;
	  margin-top: -22px;
	  color: white;
	  font-weight: bold;
	  font-size: 18px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	  user-select: none;
	  text-decoration: none;
	}

	/* Position the "next button" to the right */
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover, .next:hover {
	  background-color: rgba(0,0,0,0.8);
	  color: white;
	}

	/* The dots/bullets/indicators */
	.dot {
	  cursor: pointer;
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #bbb;
	  border-radius: 50%;
	  display: inline-block;
	  transition: background-color 0.6s ease;
	}

	.dot:hover {
	  background-color: #717171;
	}

	/* Fading animation */
	.nisarul-fade {
	  -webkit-animation-name: nisarul-fade;
	  -webkit-animation-duration: 1.5s;
	  animation-name: nisarul-fade;
	  animation-duration: 1.5s;
	}

	@-webkit-keyframes nisarul-fade {
	  from {opacity: .4}
	  to {opacity: 1}
	}

	@keyframes nisarul-fade {
	  from {opacity: .4}
	  to {opacity: 1}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
	  #nisarul-slider.prev, #nisarul-slider.next,#nisarul-slider.text {font-size: 11px}
	}

</style>
<?php endif; } );

add_action( 'wp_footer', function () {
if ( is_front_page(  ) ) :?>
<script>

	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";
	  }
	  slides[slideIndex-1].style.display = "block";
	}

	setInterval( function() {
	  showSlides(slideIndex += 1);
	}, 7000);

</script>
<?php endif; } );


/**
 * Making Slider shortcode
 */
add_shortcode( 'nisarul_slider', function($attrs, $content) {

    $attrs = shortcode_atts( [
        'images' => '',
        'id' => 'nisarul_slider'
    ], $attrs);

    extract( $attrs );
    ob_start(); ?>
    <!-- Simple Slider -->

	<div class="slideshow-container" id="<?php echo $id; ?>">

	<?php
	$imgs = explode( ',', $images);
	foreach( $imgs as $img ) : ?>

	<div class="mySlides nisarul-fade">
	  <img src="<?php echo wp_get_original_image_url( $img ); ?>" style="width:100%">
	</div>

	<?php endforeach; ?>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>

    <?php  return ob_get_clean();
} );


/**
 * WPBakery element development
 */
if( function_exists('vc_map') ) {
    vc_map( [
        'name'        => 'NisaruL Slider',
        'base'        => 'nisarul_slider',
		'icon'        => 'https://cdn0.iconfinder.com/data/icons/view-1/20/slider-512.png',
        'category'    => 'NisaruL\'s Elements',
        'params' => [
            [
                'param_name' => 'images',
                'heading'    => 'Add or Remove slider images',
                'type'       => 'attach_images',
            ],
            [
                'param_name' => 'id',
                'heading'    => 'ID',
                'type'       => 'textfield',
                'value'      => 'nisarul-slider',
            ],
        ],
    ] );
}

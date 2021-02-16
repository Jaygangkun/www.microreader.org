<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wpdev
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); 
	$bookid = get_the_ID();
		$book=get_post_meta($bookid,'book',true);
		// print_r($book);
		// exit();
		if($book)
		{
		$bgcolors=$book['page']['bg_color'];
		$text_fontcolor=$book['page']['font_color'];
		$font_size=$book['page']['font_size'];
		$font_family=$book['page']['font'];
		$border_style=$book['border']['style'];
		$border_weight=$book['border']['weight'];
		$border_radius=$book['border']['radius'];
		$page_navigation_color=$book['page']['navigation_color'];
		?>
		<style type="text/css">
		.single-book .page{
			background:<?php echo $bgcolors; ?>;
			color:<?php echo $text_fontcolor;?>;
			font-size:<?php echo $font_size;?>;
			font-family:<?php echo $font_family;?>;
			border:<?php echo $border_style;?>;
			border-width:<?php echo $border_weight;?>;
			border-radius:<?php echo $border_radius;?>;
			border-color:<?php echo $text_fontcolor;?>;
		}

		</style>

			<?php }
			else
			{}
		
		?>
	<style type="text/css">


.single-book .pages_cont {
    width: 13in;
    height: 9in;
    margin: 0 auto;
    overflow: hidden;
    transform: scale(0.90);
    transform-origin: top;
}

.navigation {
	margin-top: -85px !important;
}

	</style>
</head>
<body <?php body_class(); ?>> <center>
	<a href="<?php echo site_url(); ?>">Back To site</a>
	</center>

	<br>
	<?php if(wp_is_mobile())
	{?>
		<div class="single-book pagiloc-<?php echo get_post_meta(get_the_ID(), 'pagination_location', true); ?>" style="height: 90vh;">
		<?php
	}
	?>
	<div class="single-book pagiloc-<?php echo get_post_meta(get_the_ID(), 'pagination_location', true); ?>" style="height: 90vh;">
	<div class="pages_cont">
		<div class="pages" style="left: 0">
		</div>
	</div>
	<div class="navigation" style="text-align: center; margin-top: 5px; background:<?php echo $page_navigation_color;?>">


		<?php if(get_post_meta(get_the_ID(), 'pagination', true)){ ?>

			<?php if(get_post_meta(get_the_ID(), 'ajax_pages_type', true)==='buttons'){ ?>
				<button class="prev"><?php echo get_post_meta(get_the_ID(), 'ajax_prev_text', true); ?></button>
				<button class="next"><?php echo get_post_meta(get_the_ID(), 'ajax_next_text', true); ?></button>
			<?php } ?>

			<?php if(get_post_meta(get_the_ID(), 'ajax_pages_type', true)==='numbers'){ ?>
					
				<div class="pager-both" style="text-align: center;">
					<span class="pagertype pager-front">
					</span>
					<span class="pagertype pager-body">
					</span>
				</div>
<div style="height: 0px; overflow: hidden;">
					<button class="prev"><?php echo get_post_meta(get_the_ID(), 'ajax_prev_text', true); ?></button>
				<button class="next"><?php echo get_post_meta(get_the_ID(), 'ajax_next_text', true); ?></button>
</div>


			<?php } ?>

		<?php } ?>
		<input style="width: 30px;height: 30px; display: inline-block; padding: 0;" type="hidden" class="clickcount" name="clickcount" value="0">
	</div>

	</div>


	<?php
	$plugin = new Book_Press();
	$book = $plugin->get_book_new(get_the_ID());
	?>
	<script type="text/javascript">		
		var sections = <?php echo json_encode($book); ?>;
		var single_page = false;
	</script>

	<?php wp_footer(); ?>



</body>
</html>
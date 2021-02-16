<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/book-press
 * @since      1.0.0
 *
 * @package    Book_Press
 * @subpackage Book_Press/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Book_Press
 * @subpackage Book_Press/public
 * @author     Md Kabir Uddin <bd.kabiruddin@gmail.com>
 */
class Book_Press_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Book_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/book-press-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Book_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/book-press-public.js', array( 'jquery' ), $this->version, false );

    wp_localize_script( $this->plugin_name, 'bp_Vars', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'wedocs-ajax' ),
    ) );

	}


	public function book_custom_template($single) {
	    global $post;
	    if ( $post->post_type == 'book' ) {
	        if ( file_exists( plugin_dir_path( __FILE__ ) . '/book-single.php' ) ) {
	            return plugin_dir_path( __FILE__ ) . '/book-single.php';
	        }
	    }
	    return $single;
	}



	public function book_shortcode_func( $atts ) {

		$data = shortcode_atts( array(
			'id' => null,
			'single_page' => true,
		), $atts );

		if(!$data['id']) {
			return __('Book not found', 'book-press');
		}

		if(!get_post($data['id'])){
			return __('Book not found', 'book-press');
		}

		if(get_post($data['id'])->post_type==='book'){

			if($data['single_page']===true){
				$single = 'single_page_true';
			} else {
				$single = '';
			}
			$bookid = $data['id'];

			$html ='';
			$html .='
			<div class="single-book  '.$single.' pagiloc-'.get_post_meta($bookid, 'pagination_location', true).'">
				<div class="pages_cont">
					<div class="pages" style="left: 0">
					</div>
				</div>
				<div class="navigation" style="text-align: center; margin-top: 5px;">';
				if(get_post_meta($bookid, 'pagination', true)){ 
					if(get_post_meta($bookid, 'ajax_pages_type', true)==='buttons'){ 
						$html .='
					<button class="prev">'.get_post_meta($bookid, 'ajax_prev_text', true).'</button>';
						$html .='
					<button class="next">'.get_post_meta($bookid, 'ajax_next_text', true).'</button>';
					}
					if(get_post_meta($bookid, 'ajax_pages_type', true)==='numbers'){ 
						$html .='
					<div class="pager-both" style="text-align: center;">
						<span class="pagertype pager-front">
						</span>
						<span class="pagertype pager-body">
						</span>
					</div>
					<div style="height: 0px; overflow: hidden;">
						<button class="prev">'.get_post_meta(get_the_ID(), 'ajax_prev_text', true).'</button>
						<button class="next">'.get_post_meta(get_the_ID(), 'ajax_next_text', true).'</button>
					</div>
					';
					}
				}
				$html .='
				<input style="width: 30px;height: 30px; display: inline-block; padding: 0;" type="hidden" class="clickcount" name="clickcount" value="0">
				</div>
			</div>';
			$plugin = new Book_Press();
			$book = $plugin->get_book_new($bookid);
			$html .='
			<script type="text/javascript">
				var sections = '.json_encode($book).';
				var single_page = '.$data['single_page'].';
			</script>
			';
			return $html;
			}
	}

	public function get_all_books( ) {

		$args = array(
			'post_type'  => 'book',
			'meta_query' => array(
				array(
					'key'     => 'type',
					'value'   => array( 'book' ),
				),
			),
		);

		$query = new WP_Query( $args );

	

		if($query->posts){
			return $query->posts;
		} else {
			return array();
		}

	}






	public function footnote_shortcode_func($atts, $content = null ) {
		$arg = shortcode_atts( array(
				'note' => null,
		), $atts );
		return '<i class="footnote_i"><span class="footnote">'.$arg['note'].'</span></i>';

	}

	public function index_shortcode_func($atts, $content = null ) {

		$arg = shortcode_atts( array(
				'hide' => null,
		), $atts );

		return '<span class="index '.$arg['hide'].'">'.$content.'</span>';
	}







	public function library_shortcode_func($atts, $content = null ) {

		$arg = shortcode_atts( array(
			'genre' => null,
			'id' => null,
			'exclude' => null,
			'orderby' => 'title',
			'order'   => 'DESC',
			'section_title' => null,
			'max_post' => -1,
		), $atts );

		$tax_query = array();

		if($arg['genre']){
			array_push($tax_query, array(
				'taxonomy' => 'genre',
				'field' => 'slug',
				'terms' => explode(',', $arg['genre'])
			));
		}

		$post__in = array();

		if($arg['id']){
			$post__in = explode(',', $arg['id']);
		}

		$post__not_in = array();

		if($arg['exclude']){
			$post__not_in = explode(',', $arg['exclude']);
		}

		$args = array(
			'post_type'  => 'book',
			'post__not_in' => $post__not_in,
			'post__in' => $post__in,
			'tax_query' => $tax_query,
			'orderby' => $arg['orderby'],
			'order'   => $arg['order'],
			'posts_per_page'   => $arg['max_post'],
			'meta_query' => array(
				array(
					'key'     => 'type',
					'value'   => array( 'book' ),
				),
			),
			'fields' => 'ids'
		);

		$query = new WP_Query( $args );

		?>
		<div class="library-books-gener">
			<div class="library-books">

				<?php if($arg['section_title']){ ?>
					<h3><?php echo $arg['section_title']; ?></h3>
				<?php } ?>

				<?php

				if($query->posts){
				foreach ($query->posts as $key => $book_id) {
					if($book_id){

						$book = get_post($book_id);
						if($book) {

							$thumbnail = null;

							$argsb = array(
								'post_parent' => $book_id,
								'post_type'   => 'book', 
								'numberposts' => -1,
								'post_status' => 'any',
								'orderby' => 'menu_order',
								'order' => 'ASC',
							);
							$sections = get_children( $argsb );
							foreach ($sections as $key => $section) {
								if($section->post_title==='Cover Matter') {
									$argsb = array(
										'post_parent' => $section->ID,
										'post_type'   => 'book', 
										'numberposts' => -1,
										'post_status' => 'any',
										'orderby' => 'menu_order',
										'order' => 'ASC',
									);
									$elements = get_children( $argsb );
									foreach ($elements as $key => $element) {
										if($element->post_title==='Cover Image'){
											$thumbnail = get_the_post_thumbnail_url($element->ID, 'full');
										}
									}
								}
							}

						?>
						<div class="single-library-book">
							
							<table>
								<tr>
									<td valign="top">
										<?php if($thumbnail) { ?>
											<a href="<?php echo get_the_permalink($book->ID); ?>">
												<img style="max-width: 60px" src="<?php echo $thumbnail; ?>">
											</a>
										<?php } ?>
									</td>
									<td valign="top">
										<div style="font-size: 20px; line-height: initial;">
										 <strong> <?php echo $book->post_title; ?> </strong> 
										</div>
										<p style="margin-top: -1px; margin-bottom: 5px;">Author : <?php echo get_the_author_meta( 'display_name', $book->post_author ) ;  ?></p> 
										<a href="<?php echo get_the_permalink($book->ID); ?>">Read the Book</a>
									</td>
								</tr>
							</table>
							</div>
							<?php
							}
						}
					}
				}
				?>
			</div>
		</div>
		<?php
	}














}

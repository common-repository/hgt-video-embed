<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!class_exists('wve_shortcode'))
{
	class wve_shortcode
	{
		function __construct()
		{
			require 'includes/help.php';
			add_action( 'init',array($this, 'wve_register_post_type'));
			add_action('admin_menu',array($this, 'wve_add_shortcode_menu'));
			add_action('admin_enqueue_scripts', array($this, 'wve_admin_scripts_styles'));						
		}
		
		function wve_add_shortcode_menu()
		{			
			add_submenu_page(
		        'edit.php?post_type=video_embed',
		        'New Video Shortcode',
		        'New Video Shortcode',
		        'manage_options',
		        'video_embed_add_new',
		        'wve_menu_help'
		    );		    
		}
		
		function wve_admin_scripts_styles()
		{			
			$screen = get_current_screen(); 
			global $post_type;
 			if( $screen->base == "video_embed_page_video_embed_add_new" OR $screen->base == 'video_embed_page_video_embed_whitelabel' OR $post_type == 'video_embed') {
 				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );

				wp_enqueue_media();
		        wp_enqueue_script('wve-admin-js', plugins_url('assets/js/my-admin.js', __FILE__) );

		        wp_enqueue_style( 'wve-admin-font-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans' ); 	
				wp_enqueue_style( 'wve-admin-font-awesome', plugins_url('assets/font-awesome-4.6.3/css/font-awesome.min.css', __FILE__) );  
				wp_enqueue_style( 'wve-admin-bootstrap', plugins_url('assets/bootstrap/dist/css/bootstrap.min.css', __FILE__) ); 	
				//Scripts for "Add New Shortcode page"
		        wp_enqueue_style( 'wve-admin-master', plugins_url('admin/css/master.css', __FILE__) ); 
				wp_enqueue_script('wve-my-admin-first-js', plugins_url('admin/js/script.js', __FILE__) );
				
			}
		}

		function wve_register_post_type() {
		    register_post_type( 'video_embed',
		        array(
		            'labels' => array(
		                'name' => 'Video Shortcodes',
		                'singular_name' => 'Video Shortcode',
		                'add_new' => 'Add New',
		                'add_new_item' => 'Add New Video Shortcode',
		                'edit' => 'Edit',
		                'edit_item' => 'Edit Video Shortcode',
		                'new_item' => 'New Video Shortcode',
		                'view' => 'View',
		                'view_item' => 'View Video Shortcode',
		                'search_items' => 'Search Video Shortcodes',
		                'not_found' => 'No Video Shortcodes found',
		                'not_found_in_trash' => 'No Video Shortcodes found in Trash',
		                'parent' => 'Parent Video Shortcode'
		            ),
		            'capabilities' => array(
					    'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
					  ),
					'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts		 
		            'public' => true,
		            'menu_position' => 15,
		            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
		            'taxonomies' => array( '' ),
		            'menu_icon' => plugins_url( 'admin/assets/icon.png', __FILE__ ),
		            'has_archive' => true
		        )
		    );
		}		

	}
}

if(class_exists('wve_shortcode'))
{
	$wve_shortcode = new wve_shortcode;
}

function wve_get_post_id_by_meta_key_and_value($key, $value) {
	global $wpdb;
	$meta = $wpdb->get_results("SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='".$wpdb->escape($key)."' AND meta_value='".$wpdb->escape($value)."'");
	if (is_array($meta) && !empty($meta) && isset($meta[0])) {
		$meta = $meta[0];
	}		
	if (is_object($meta)) {
		return $meta->post_id;
	}
	else {
		return false;
	}
}
add_shortcode( 'video_embed', 'wve_video_embed_shortcode' );	//Create shortcode for "video_embed"
function wve_video_embed_shortcode($atts){//Get all shortcode attributes
	wp_enqueue_style( 'wve-user-end-css', plugins_url('assets/css/wve.css', __FILE__) ); 	
	$a = shortcode_atts( array(
        'name' => ''
    ), $atts );
	$shortcode_name = $a['name'];
	$id = wve_get_post_id_by_meta_key_and_value('shortcode_name',$shortcode_name);
	//echo "id: ".$id;
	$data = get_post_meta($id);
	
	$type 				= $data['type'][0];
    $youtube_url 		= $data['youtube_url'][0];
    $vimeo_url 			= $data['vimeo_url'][0];
    $wistia_url 		= $data['wistia_url'][0];
    $mp4_upload 		= $data['mp4_upload'][0];
    $mp4_url 			= $data['mp4_url'][0];
    $cta_text_status    = $data['cta_text_status'][0];
    $cta_headline 		= $data['cta_headline'][0];
    $cta_text 			= $data['cta_text'][0];
    $cta_image			= $data['cta_image'][0];
    $cta_image_url		= $data['cta_image_url'][0];
    $cta_image_time		= $data['cta_image_time'][0];
    $cta_url_text		= $data['cta_url_text'][0];
    $cta_url 			= $data['cta_url'][0];    
    $cta_button_status	= $data['cta_button_status'][0];
    $cta_font_color 	= $data['cta_font_color'][0];
    $cta_heading_color 	= $data['cta_heading_color'][0];
    $cta_para_color		= $data['cta_para_color'][0];    
    $cta_button_color 	= $data['cta_button_color'][0];
    $cta_heading_size   = $data['cta_heading_size'][0];
    $cta_para_size      = $data['cta_para_size'][0];
    $cta_button_size    = $data['cta_button_size'][0];            
	$follow_user    	= $data['follow_user'][0];
	$float_side    		= $data['float_side'][0];
	$mobile_scroll    	= $data['mobile_scroll'][0];
	$browser_padding    = $data['browser_padding'][0];
	$wve_auto_play		= $data['wve_auto_play'][0];
    $wve_fullscreen		= $data['wve_fullscreen'][0];
    $wve_pin_screen		= $data['wve_pin_screen'][0];
    $wve_pin_side		= $data['wve_pin_side'][0];
    $wve_start_stop		= $data['wve_start_stop'][0];
    $wve_timed_cta		= $data['wve_timed_cta'][0];
    $wve_timed_time		= $data['wve_timed_time'][0];
	$shortcode_name     = $data['shortcode_name'][0];

	if($follow_user=="ON" AND $mobile_scroll=='ON')
		wp_enqueue_script('wve_js', plugins_url('assets/js/wve.js', __FILE__) );
	if($follow_user=="ON" AND $mobile_scroll=='OFF')
		wp_enqueue_script('wve_mobile_js', plugins_url('assets/js/wve_mobile.js', __FILE__) );
  	ob_start();
?>	
	<div class="wve-wrapper">
		<section class="wvemaximize" style="display:none;background:#DCDCDC;border:1px solid black;padding:4px;">
			HGT Floating Video Widget
			<button style="border: 1px solid black;background-color: #308f30;color: #fff;" type="button" class="wve-float-maximize btn btn-secondary" data-dismiss="modal">Maximize
			</button>
		</section>
		<section class="wvevideo">
			<div class="wve-widget-controls">
				<div class="wve-float-close-div" style="background-color: #308f30; position: absolute;top:1px;right:1px;z-index: 2;display:none;">					
					<button style="font-weight: 800;background-color: #308f30;color: #fff;" type="button" class="wve-float-minimize btn btn-secondary" data-dismiss="modal"><span class="wve-stretch">-</span>
					</button>
					<button style="font-weight: 800;background-color: #308f30;color: #fff;" type="button" class="wve-float-close btn btn-secondary" data-dismiss="modal">X
					</button>
				</div>
				<script type="text/javascript">						
					jQuery(document).ready(function(){							
						jQuery(".wve-float-close").click(function(){
							jQuery(".wvevideo").removeClass("wveaside");
							wve_float_check=false;
							var wve_box_height = jQuery('.wve-box').height();
							jQuery('.wve-wrapper').css({'margin-bottom':wve_box_height});
							jQuery('.wve-float-close-div').removeClass('wve-float-close-show');
							jQuery('.wvemaximize').css({'display':'none'});
						});
						jQuery(".wve-float-minimize").click(function(){
							jQuery(".wvevideo").removeClass("wveaside");
							wve_float_check=false;
							var wve_box_height = jQuery('.wve-box').height();
							jQuery('.wve-wrapper').css({'margin-bottom':wve_box_height});
							jQuery('.wve-float-close-div').removeClass('wve-float-close-show');
							// jQuery(".wvemaximize").addClass("wveaside");
							// jQuery(".wveaside").css({"top":"none"});
							// jQuery(".wveaside").css({"bottom":"50px"});
							jQuery(".wvemaximize").css({"position":"fixed","bottom":"40px","z-index":"9999"});
							jQuery(".wvemaximize").css({"display":"block"});
						});
						jQuery(".wve-float-maximize").click(function(){
							wve_float_check=true;
							jQuery(window).scrollTop(jQuery(window).scrollTop()-1);
							jQuery(".wvemaximize").css({"display":"none"});
						});
					});
				</script>
			</div>
			<div class="vid-wrap">								
				<?php if (!empty($cta_image)){ ?>
					<div class="wve-overlay-img" style="position: absolute; top:20px; left: 20px; z-index: 1; max-width: 80%;">				
						<a href="<?php echo $cta_image_url; ?>">										
							<img src="<?php echo $cta_image; ?>" />					
						</a>
						<div style="position: absolute;top:5px;left:5px;z-index: 2;">
							<button style="border: 1px solid black;" type="button" class="wve-overlay-close btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>					
					<script type="text/javascript">						
						jQuery(document).ready(function(){
							jQuery(".wve-overlay-img").hide().delay(<?php $cta_image_time*=1000; echo $cta_image_time; ?>).fadeIn();
							jQuery(".wve-overlay-close").click(function(){
								jQuery(".wve-overlay-img").fadeOut();	
							});
						});
					</script>
				<?php } ?> 				
			
				<?php if ($wve_timed_cta=="ON"){ ?>					
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery(".wve-box").hide().delay(<?php $wve_timed_time*=1000; echo $wve_timed_time; ?>).fadeIn();							
						});
					</script>
				<?php } ?> 				

				<?php 
				if($wve_auto_play=="ON"){
					$autoplay = "?autoplay=1";
					$autoplay_mp4 = "autoplay";
				}
				else{
					$autoplay = "";
					$autoplay_mp4 = "";
				}
				?>
				<?php 
					if($wve_fullscreen=="ON"){
						$fullscreen = "allowfullscreen";
					}
					else{
						$fullscreen = "";
					}
				?>
				<?php if($type=='youtube'){ ?>
					<?php 
						parse_str( parse_url( $youtube_url, PHP_URL_QUERY ), $my_array_of_vars );
						$youtube_id = $my_array_of_vars['v'];   						
					?>
					<iframe src="https://www.youtube.com/embed/<?php echo $youtube_id.$autoplay.'?rel=0&autohide=0&showinfo=0&controls=0'; ?>" frameborder="0" <?php echo $fullscreen; ?> ></iframe>
				<?php } ?>
				<?php if($type=='vimeo'){ ?>
					<?php 
						if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo_url, $output_array)) {
						$vimeo_id = $output_array[5];
						}
					?>
					<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id.$autoplay; ?>" frameborder="0" <?php echo $fullscreen; ?> ></iframe>
				<?php } ?>
				<?php if($type=='wistia'){ ?>
					<?php 
						$parse_result = explode('/', $wistia_url);
						$wistia_id = $parse_result[4];						
					?>
					<iframe src="//fast.wistia.net/embed/iframe/<?php echo $wistia_id.$autoplay; ?>" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" <?php echo $fullscreen; ?> ></iframe>
				<?php } ?>
				<?php if($type=='mp4_upload'){ ?>
					<video width="100%" height="100%" controls <?php echo $autoplay_mp4; ?> >
					<source src="<?php echo $mp4_upload; ?>" type="video/mp4">
					Your browser does not support the video tag or the file format of this video. <a href="http://www.webestools.com/">http://www.webestools.com/</a>
				</video>
				<?php } ?>
				<?php if($type=='mp4_url'){ ?>
					<video width="100%" height="100%" controls <?php echo $autoplay_mp4; ?> >
					<source src="<?php echo $mp4_url; ?>" type="video/mp4">
					Your browser does not support the video tag or the file format of this video. <a href="http://www.webestools.com/">http://www.webestools.com/</a>
				</video>
				<?php } ?>
			</div>
			<?php if($cta_text_status=="ON" OR ($cta_button_status=="ON" AND !empty($cta_url_text)) ){ ?>
			<div class="box wve-box" style="width: 100%;background:#E9E9E9;position: absolute;">
				<div class="row" style="margin:20px;margin-bottom:30px;">
					<?php if($cta_text_status=="ON"){ ?>
					<div class="col-md-7">
						<h3 style="color: <?php echo $cta_heading_color; ?>;font-size: <?php echo $cta_heading_size; ?>px;"><?php echo $cta_headline; ?></h3>
						<h6 style="color: <?php echo $cta_para_color; ?>;font-size: <?php echo $cta_para_size; ?>px;"><?php echo $cta_text; ?></h6>
					</div>
					<?php } ?>
					<?php if($cta_button_status=="ON" AND !empty($cta_url_text)){ ?>
					<div class="col-md-5" style="margin-top:20px;padding:0px;">
						<a href="<?php echo $cta_url; ?>" class="wve-button wve-shape-1 wve-blue wve-effect-4" style="color:#fff;background:<?php echo $cta_button_color;?>;font-size: <?php echo $cta_button_size; ?>px;"><?php echo $cta_url_text; ?></a>			
					</div>					
					<?php } ?>				
				</div>
			</div>
			<?php } ?>				
		</section>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var wve_box_height = jQuery('.wve-box').height();
			jQuery('.wvevideo').css({'margin-bottom':wve_box_height});
		});
	</script>
	<?php if($wve_pin_screen == "ON"){ ?>
		<?php if($wve_pin_side=="LEFT"){ ?>		
			<style type="text/css">	.wveaside{ left: 10px; } .wvemaximize{ left: 10px; }</style>
		<?php } ?>
		<?php if($wve_pin_side=="RIGHT"){ ?>		
			<style type="text/css">	.wveaside{ right: 10px;} .wvemaximize{ right: 10px; }</style>
		<?php } ?>		
	<?php }  else { ?>
		<?php if($float_side=="LEFT"){ ?>		
			<style type="text/css">	.wveaside{ left: <?php echo $browser_padding; ?>%;	} .wvemaximize{ left: <?php echo $browser_padding; ?>%;	}</style>
		<?php } ?>
		<?php if($float_side=="RIGHT"){ ?>		
			<style type="text/css">	.wveaside{ right: <?php echo $browser_padding; ?>%;	} .wvemaximize{ right: <?php echo $browser_padding; ?>%;	}</style>
		<?php } ?>
	<?php } ?>
<?php
	return ob_get_clean();   
}
/*------------------------------------------------------------------------------------
	Create Custom Columns for all shortcodes page
------------------------------------------------------------------------------------*/
add_filter( 'manage_edit-video_embed_columns', 'wve_my_edit_video_columns');			
function wve_my_edit_video_columns( $columns ) {
	$columns = array(			
		'cb' => '<input type="checkbox" />',	
		'title' => __( 'Title' ),		
		'shortcode_name' => __( 'Shortcode' ),
		'type' => __( 'Video Type' ),
		'video_url' => __( 'Video URL' )
	);

	return $columns;
}
/*------------------------------------------------------------------------------------
	Display content for custom columns
------------------------------------------------------------------------------------*/
add_action( 'manage_posts_custom_column' , 'wve_custom_columns', 10, 2 );
function wve_custom_columns( $column, $post_id ) {
	echo "<style>
		.wve-youtube-logo{color:#b31217;font-size:20px;}
		.wve-vimeo-logo{color:#1AACE5;font-size:20px;}
		.wve-mp4_upload-logo{color:#333;font-size:20px;}
		.wve-mp4_url-logo{color:#333;font-size:20px;}
	</style>";
	switch ( $column ) {
		case 'shortcode_name':
			echo '[video_embed name="'; 
			echo get_post_meta( $post_id, 'shortcode_name', true ); 
			echo '"]';
			break;
		case 'type':
			$type = get_post_meta( $post_id, 'type', true ); 
			if($type=='youtube'){
				echo '<i class="wve-youtube-logo fa fa-youtube-play" aria-hidden="true"></i>&nbsp;<span>YouTube</span>';
			}if($type=='vimeo'){
				echo '<i class="wve-vimeo-logo fa fa-vimeo-square" aria-hidden="true"></i>&nbsp;<span>Vimeo</span>';
			}if($type=='wistia'){ 
				echo '<img src="'.plugins_url("admin/assets/wistia_logo.png", __FILE__) .'" alt="wistia logo">&nbsp;<span>Wistia</span>';
			}if($type=='mp4_upload'){
				echo '<i class="wve-mp4_upload-logo fa fa-upload" aria-hidden="true"></i>&nbsp;<span>MP4 Upload</span>';
			}if($type=='mp4_url'){
				echo '<i class="wve-mp4_url-logo fa fa-external-link-square" aria-hidden="true"></i>&nbsp;<span>MP4 URL</span>';
			}				
			break;
		case 'video_url':
			$type = get_post_meta( $post_id, 'type', true ); 
			if($type=='youtube'){
				echo get_post_meta( $post_id, 'youtube_url', true ); 
			}if($type=='vimeo'){
				echo get_post_meta( $post_id, 'vimeo_url', true ); 
			}if($type=='wistia'){ 
				echo get_post_meta( $post_id, 'wistia_url', true ); 
			}if($type=='mp4_upload'){
				echo get_post_meta( $post_id, 'mp4_upload', true ); 
			}if($type=='mp4_url'){
				echo get_post_meta( $post_id, 'mp4_url', true ); 
			}				
			break;
	}
}
/*------------------------------------------------------------------------------------
	remove view button from all shortcode page
------------------------------------------------------------------------------------*/
add_filter( 'post_row_actions', 'wve_remove_row_actions', 10, 2 );
function wve_remove_row_actions( $actions, $post )
{
  global $current_screen;
	if( $current_screen->post_type != 'video_embed' ) return $actions;
	//unset( $actions['edit'] );
	unset( $actions['view'] );
	//unset( $actions['trash'] );
	//unset( $actions['inline hide-if-no-js'] );
	//$actions['inline hide-if-no-js'] .= __( 'Quick&nbsp;Edit' );

	return $actions;
}
/*------------------------------------------------------------------------------------
	Add custom link for Edit button
	Don't need default edit behaviour of wordpress
------------------------------------------------------------------------------------*/
add_filter('post_row_actions', 'wve_my_duplicate_post_link', 10, 2);
function wve_my_duplicate_post_link($actions, $post)
{
    if ($post->post_type=='video_embed')
    {
        $actions['edit'] = '<a href="#" onclick="wve_upgrade_pro()" class="wve_edit_post_button">Edit</a>';//wve_upgrade_pro() is defined in admin/js/script.js
    }
    return $actions;
}

/*------------------------------------------------------------------------------------
	Handle Ajax request to generate video shortcode
------------------------------------------------------------------------------------*/
add_action( 'wp_ajax_wve_generate_shortcode', 'wve_generate_shortcode_func' );
function wve_generate_shortcode_func() {
	$type               = sanitize_text_field( $_POST['type']);
    $youtube_url        = esc_url( $_POST['youtube_url']);
    $vimeo_url          = esc_url( $_POST['vimeo_url']);
    $wistia_url         = esc_url( $_POST['wistia_url']);
    $mp4_upload         = esc_url( $_POST['mp4_upload']);
    $mp4_url            = esc_url( $_POST['mp4_url']);
    $cta_text_status    = sanitize_text_field( $_POST['cta_text_status']);
    $cta_headline       = sanitize_text_field( $_POST['cta_headline']);
    $cta_text           = sanitize_text_field( $_POST['cta_text']);
    $cta_image          = sanitize_text_field( $_POST['cta_image']);
    $cta_image_url      = esc_url( $_POST['cta_image_url']);
    $cta_image_time     = sanitize_text_field( $_POST['cta_image_time']);
    $cta_url_text       = sanitize_text_field( $_POST['cta_url_text']);
    $cta_url            = esc_url( $_POST['cta_url']);
    $cta_button_status  = sanitize_text_field( $_POST['cta_button_status']);
    $cta_font_color     = sanitize_text_field( $_POST['cta_font_color']);
    $cta_heading_color  = sanitize_text_field( $_POST['cta_heading_color']);
    $cta_para_color     = sanitize_text_field( $_POST['cta_para_color']);
    $cta_button_color   = sanitize_text_field( $_POST['cta_button_color']);
    $cta_heading_size   = sanitize_text_field( $_POST['cta_heading_size']);
    $cta_para_size      = sanitize_text_field( $_POST['cta_para_size']);
    $cta_button_size    = sanitize_text_field( $_POST['cta_button_size']);        
    $follow_user        = sanitize_text_field( $_POST['follow_user']);
    $float_side         = sanitize_text_field( $_POST['float_side']);
    $mobile_scroll      = sanitize_text_field( $_POST['mobile_scroll']);
    $browser_padding    = sanitize_text_field( $_POST['browser_padding']);
    $wve_auto_play      = sanitize_text_field( $_POST['wve_auto_play']);
    $wve_fullscreen     = sanitize_text_field( $_POST['wve_fullscreen']);
    $wve_pin_screen     = sanitize_text_field( $_POST['wve_pin_screen']);
    $wve_pin_side       = sanitize_text_field( $_POST['wve_pin_side']);
    $wve_start_stop     = sanitize_text_field( $_POST['wve_start_stop']);
    $wve_timed_cta      = sanitize_text_field( $_POST['wve_timed_cta']);
    $wve_timed_time     = sanitize_text_field( $_POST['wve_timed_time']);
    $shortcode_name     = sanitize_text_field( $_POST['shortcode_name']);


    // Create Custom post type's post in database and get the id
    $post_id = wp_insert_post(array('post_title'=>$shortcode_name, 'post_type'=>'video_embed', 'post_content'=>'Video Embed Shortcode', 'post_status'=>'publish'));

    // use created post's id to save parameters as Post Meta in database
    add_post_meta( $post_id, 'type'             , $type             , true ); 
    add_post_meta( $post_id, 'youtube_url'      , $youtube_url      , true ); 
    add_post_meta( $post_id, 'vimeo_url'        , $vimeo_url        , true ); 
    add_post_meta( $post_id, 'wistia_url'       , $wistia_url       , true ); 
    add_post_meta( $post_id, 'mp4_upload'       , $mp4_upload       , true ); 
    add_post_meta( $post_id, 'mp4_url'          , $mp4_url          , true ); 
    add_post_meta( $post_id, 'cta_text_status'  , $cta_text_status  , true ); 
    add_post_meta( $post_id, 'cta_headline'     , $cta_headline     , true ); 
    add_post_meta( $post_id, 'cta_text'         , $cta_text         , true ); 
    add_post_meta( $post_id, 'cta_image'        , $cta_image        , true ); 
    add_post_meta( $post_id, 'cta_image_url'    , $cta_image_url    , true ); 
    add_post_meta( $post_id, 'cta_image_time'   , $cta_image_time   , true ); 
    add_post_meta( $post_id, 'cta_url_text'     , $cta_url_text     , true ); 
    add_post_meta( $post_id, 'cta_url'          , $cta_url          , true ); 
    add_post_meta( $post_id, 'cta_button_status', $cta_button_status, true ); 
    add_post_meta( $post_id, 'cta_font_color'   , $cta_font_color   , true ); 
    add_post_meta( $post_id, 'cta_heading_color', $cta_heading_color, true ); 
    add_post_meta( $post_id, 'cta_para_color'   , $cta_para_color   , true ); 
    add_post_meta( $post_id, 'cta_button_color' , $cta_button_color , true ); 
    add_post_meta( $post_id, 'cta_heading_size' , $cta_heading_size , true ); 
    add_post_meta( $post_id, 'cta_para_size'    , $cta_para_size    , true ); 
    add_post_meta( $post_id, 'cta_button_size'  , $cta_button_size  , true );         
    add_post_meta( $post_id, 'follow_user'      , $follow_user      , true ); 
    add_post_meta( $post_id, 'float_side'       , $float_side       , true ); 
    add_post_meta( $post_id, 'mobile_scroll'    , $mobile_scroll    , true ); 
    add_post_meta( $post_id, 'browser_padding'  , $browser_padding  , true ); 
    add_post_meta( $post_id, 'wve_auto_play'    , $wve_auto_play    , true );
    add_post_meta( $post_id, 'wve_fullscreen'   , $wve_fullscreen   , true );
    add_post_meta( $post_id, 'wve_pin_screen'   , $wve_pin_screen   , true );
    add_post_meta( $post_id, 'wve_pin_side'     , $wve_pin_side     , true );
    add_post_meta( $post_id, 'wve_start_stop'   , $wve_start_stop   , true );
    add_post_meta( $post_id, 'wve_timed_cta'    , $wve_timed_cta    , true );
    add_post_meta( $post_id, 'wve_timed_time'   , $wve_timed_time   , true );
    add_post_meta( $post_id, 'shortcode_name'   , $shortcode_name   , true );
	
	echo $shortcode_name;
	wp_die(); // this is required to terminate immediately and return a proper response
}

//Remove default Link from "Titles" on All posts page, which takes to default post editor.
add_action( 'admin_footer-edit.php', 'wve_remove_a' );

function wve_remove_a() {
	global $post_type;
	if($post_type == "video_embed"){
	    ?>
	    <script type="text/javascript">
	        jQuery('table.wp-list-table a.row-title').contents().unwrap();
	    </script>
	    <?php
	}
}

?>
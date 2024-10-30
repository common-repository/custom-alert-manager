<?php
/*
Plugin Name: Custom Alert Manager
Author: Rupam Hazra
Description: This plugin is used to Manage Custom Alert through category on your site.
Version:1.0
*/
defined('ABSPATH') or die("restricted access");
if(is_admin())
{
	include_once(dirname(__FILE__).'/admin/alert-menu.php');
	include_once(dirname(__FILE__).'/admin/alert-list.php');
	include_once(dirname(__FILE__).'/admin/alert-insert.php');
	include_once(dirname(__FILE__).'/admin/alert-process.php');
	include_once(dirname(__FILE__).'/admin/alert-edit.php');
	include_once(dirname(__FILE__).'/admin/alert-category-list.php');
	include_once(dirname(__FILE__).'/admin/alert-category-insert.php');
	include_once(dirname(__FILE__).'/admin/alert-category-process.php');
	include_once(dirname(__FILE__).'/admin/alert-category-edit.php');
	add_action( 'admin_enqueue_scripts', 'cam_alert_scripts_css' );	
}
else
{
	add_action( 'wp_enqueue_scripts', 'cam_alert_scripts_css');			
}
function cam_alert_scripts_css()
{	
	if( is_admin() )
	{
		wp_enqueue_style('alert-admin-styles', plugins_url( 'admin/css/alert-admin-styles.css', __FILE__ ) );
		wp_enqueue_script('alert-script', plugins_url( 'admin/js/alert-script.js', __FILE__ ) );
		wp_enqueue_script('alert-category-script', plugins_url( 'admin/js/alert-category-script.js', __FILE__ ) );
	}
	else
	{
		wp_enqueue_style('alert-front-styles', plugins_url( 'public/css/alert-front-styles.css', __FILE__ ) );
	}
} 	
function cam_alert ($atts) 
{
	$a = shortcode_atts(array(
							'id' => null,
							'catid'   => null, 
							),$atts );
	cam_query_select_alert($a['id'],$a['catid']);	
}
function cam_query_select_alert($id='',$catid='')
{
	global $wpdb;
	if($id!='')
	{				
			$result=$wpdb->get_results("SELECT * FROM wp_cam_alert AS cal LEFT JOIN wp_cam_alert_category AS cacl ON cal.cat_id=cacl.id WHERE cal.id=$id");	
			foreach ($result as $key=> $object) 
			{   
				$cat_name=!empty($object->cat_name) ? $object->cat_name :'';
				$back_color=!empty($object->back_color) ? $object->back_color :'';

				$border_width=!empty($object->border_width) ? $object->border_width :'';
				$border_width_in=!empty($object->border_width_in) ? $object->border_width_in :'';
				if($border_width == 0)
				{
					$border_width="1px";
					$border_width_in="";
				}
				$border_style=!empty($object->border_style) ? $object->border_style :'';
				$border_color=!empty($object->border_color) ? $object->border_color :'';

				$border_radius=!empty($object->border_radius) ? $object->border_radius :'';
				$border_radius_in=!empty($object->border_radius_in) ? $object->border_radius_in :'';
				if($border_radius == 0)
				{
					$border_radius="4px";
					$border_radius_in="";
				}
				$padding_top=!empty($object->padding_top) ? $object->padding_top :'';
				$padding_top_in=!empty($object->padding_top_in) ? $object->padding_top_in :'';

				$padding_bottom=!empty($object->padding_bottom) ? $object->padding_bottom :'';
				$padding_bottom_in=!empty($object->padding_bottom_in) ? $object->padding_bottom_in :'';

				$padding_right=!empty($object->padding_right) ? $object->padding_right :'' ;
				$padding_right_in=!empty($object->padding_right_in) ? $object->padding_right_in :'' ;

				$padding_left=!empty($object->padding_left) ? $object->padding_left : '';
				$padding_left_in=!empty($object->padding_left_in) ? $object->padding_left_in : '';
				if($padding_top==0 && $padding_bottom==0 && $padding_right==0 && $padding_left==0)
				{
					$padding_top="15px";
					$padding_top_in="";
					$padding_bottom="15px";
					$padding_bottom_in="";
					$padding_right="15px";
					$padding_right_in="";
					$padding_left="15px";
					$padding_left_in="";
				}

				$margin_top=!empty($object->margin_top)? $object->margin_top:'';
				$margin_top_in=!empty($object->margin_top_in)? $object->margin_top_in:'';

				$margin_bottom=!empty($object->margin_bottom) ? $object->margin_bottom :'';
				$margin_bottom_in=!empty($object->margin_bottom_in) ? $object->margin_bottom_in :'';
				if($margin_bottom == 0)
				{
					$margin_bottom="20px";
					$margin_bottom_in="";
				}
				$margin_right=!empty($object->margin_right) ? $object->margin_right :'';
				$margin_right_in=!empty($object->margin_right_in) ? $object->margin_right_in :'';

				$margin_left=!empty($object->margin_left) ? $object->margin_left :'' ;
				$margin_left_in=!empty($object->margin_left_in) ? $object->margin_left_in :'';

				$txt_color=!empty($object->txt_color) ? $object->txt_color :'';
				$font_family=!empty($object->font_family) ? $object->font_family :'';

				$font_size=!empty($object->font_size) ? $object->font_size :'';
				$font_size_in=!empty($object->font_size_in) ? $object->font_size_in :'';
				if($font_size == 0)
				{
					$font_size="13px";
					$font_size_in="";
				}
				$font_weight=!empty($object->font_weight) ? $object->font_weight :'';
				$txt_align=!empty($object->txt_align) ? $object->txt_align :'';
				
				$alert_width=!empty($object->alert_width) ? $object->alert_width : '100%';
				$alert_width_in=!empty($object->alert_width_in) ? $object->alert_width_in :'';
				if($alert_width == "100%")
				{
					$alert_width_in="";
				}

				$alert_height=!empty($object->alert_height) ? $object->alert_height : 'auto';
				$alert_height_in=!empty($object->alert_height_in) ? $object->alert_height_in : '';
				if($alert_height == "auto")
				{
					$alert_height_in="";
				}
				$title=!empty($object->title) ? $object->title :'';
				$content=!empty($object->content) ? $object->content : '';

				$html.="<div id='alert_div' style='background-color:".$back_color.";border:".$border_width.$border_width_in." ".$border_style." ".$border_color.";padding-top:".$padding_top.$padding_top_in.";padding-bottom:".$padding_bottom.$padding_bottom_in.";padding-right:".$padding_right.$padding_right_in.";padding-left:".$padding_left.$padding_left_in.";margin-top:".$margin_top.$margin_top_in.";margin-bottom:".$margin_bottom.$margin_bottom_in.";margin-right:".$margin_right.$margin_right_in.";margin-left:".$margin_left.$margin_left_in.";color:".$txt_color.";width:".$alert_width.$alert_width_in.";height:".$alert_height.$alert_height_in.";font-family:".$font_family.";font-size:".$font_size.$font_size_in.";font-weight:".$font_weight.";text-align:".$txt_align.";border-radius:".$border_radius.$border_radius_in.";'>";

				/** close property data **/
				$close_check=!empty($object->close_check) ? $object->close_check : '';
				if($close_check=="on")
				{
					$close_float=!empty($object->close_float) ? $object->close_float : '';
					$close_font_size=!empty($object->close_font_size) ? $object->close_font_size : '';
					$close_font_size_in=!empty($object->close_font_size_in) ? $object->close_font_size_in : '';
					if($close_font_size=="")
					{
						$close_font_size="21px";
						$close_font_size_in="";
					}
					$close_font_weight=!empty($object->close_font_weight) ? $object->close_font_weight : '';
					if($close_font_weight=="")
					{
						$close_font_weight="700";
					}
					$close_color=!empty($object->close_color) ? $object->close_color : '';
					$close_opacity=!empty($object->close_opacity) ? $object->close_opacity : '';
					if($close_opacity=="")
					{
						$close_opacity="0.5";
					}
					$html.="<a href='javascript:void(0)' id='close_id' class='close_class' onclick='close_fn();' style='line-height: 1;float:".$close_float.";font-size:".$close_font_size.$close_font_size_in.";font-weight:".$close_font_weight.";color:".$close_color.";opacity:".$close_opacity.";'>×</a>";
					?>
						<script>
						 function close_fn()
						 {
						 	document.getElementById('alert_div').style.display="none";
						 }
						</script>
					<?php
				}
				$html.="<strong>".$cat_name."&nbsp;</strong>";
				$html.= $content;
				$html.="</div>";	
			}
			echo $html;
	}
	if($catid!='')
	{
		$result=$wpdb->get_results("SELECT cal.id AS alert_id,cacl.cat_name,cacl.back_color,cacl.border_width,cacl.border_radius,cacl.border_width_in,cacl.border_radius_in,cacl.border_style,cacl.border_color,cacl.padding_top,cacl.padding_top_in,cacl.padding_bottom,cacl.padding_bottom_in,cacl.padding_left,cacl.padding_left_in,cacl.padding_right,cacl.padding_right_in,cacl.margin_top,cacl.margin_top_in,cacl.margin_bottom,cacl.margin_bottom_in,cacl.margin_left,cacl.margin_left_in,cacl.margin_right,cacl.margin_right_in,cacl.txt_color,cacl.font_family,cacl.font_size,cacl.font_size_in,cacl.font_weight,cacl.txt_align,cacl.alert_width,cacl.alert_width_in,cacl.alert_height,cacl.alert_height_in,cacl.close_check,cacl.close_float,cacl.close_font_size,cacl.close_font_size_in,cacl.close_font_weight,cacl.close_color,cacl.close_opacity,cal.title,cal.content FROM wp_cam_alert AS cal LEFT JOIN wp_cam_alert_category AS cacl ON cal.cat_id=cacl.id WHERE cacl.id=$catid");		
		foreach ($result as $key => $object) 
		{   
				$alert_id=!empty($object->alert_id) ? $object->alert_id :'';
				$cat_name=!empty($object->cat_name) ? $object->cat_name :'';
				$back_color=!empty($object->back_color) ? $object->back_color :'';

				$border_width=!empty($object->border_width) ? $object->border_width :'';
				$border_width_in=!empty($object->border_width_in) ? $object->border_width_in :'';
				if($border_width == 0)
				{
					$border_width="1px";
					$border_width_in="";
				}
				$border_style=!empty($object->border_style) ? $object->border_style :'';
				$border_color=!empty($object->border_color) ? $object->border_color :'';

				$border_radius=!empty($object->border_radius) ? $object->border_radius :'';
				$border_radius_in=!empty($object->border_radius_in) ? $object->border_radius_in :'';
				if($border_radius == 0)
				{
					$border_radius="4px";
					$border_radius_in="";
				}
				$padding_top=!empty($object->padding_top) ? $object->padding_top :'';
				$padding_top_in=!empty($object->padding_top_in) ? $object->padding_top_in :'';

				$padding_bottom=!empty($object->padding_bottom) ? $object->padding_bottom :'';
				$padding_bottom_in=!empty($object->padding_bottom_in) ? $object->padding_bottom_in :'';

				$padding_right=!empty($object->padding_right) ? $object->padding_right :'' ;
				$padding_right_in=!empty($object->padding_right_in) ? $object->padding_right_in :'' ;

				$padding_left=!empty($object->padding_left) ? $object->padding_left : '';
				$padding_left_in=!empty($object->padding_left_in) ? $object->padding_left_in : '';
				if($padding_top==0 && $padding_bottom==0 && $padding_right==0 && $padding_left==0)
				{
					$padding_top="15px";
					$padding_top_in="";
					$padding_bottom="15px";
					$padding_bottom_in="";
					$padding_right="15px";
					$padding_right_in="";
					$padding_left="15px";
					$padding_left_in="";
				}

				$margin_top=!empty($object->margin_top)? $object->margin_top:'';
				$margin_top_in=!empty($object->margin_top_in)? $object->margin_top_in:'';

				$margin_bottom=!empty($object->margin_bottom) ? $object->margin_bottom :'';
				$margin_bottom_in=!empty($object->margin_bottom_in) ? $object->margin_bottom_in :'';
				if($margin_bottom == 0)
				{
					$margin_bottom="20px";
					$margin_bottom_in="";
				}

				$margin_right=!empty($object->margin_right) ? $object->margin_right :'';
				$margin_right_in=!empty($object->margin_right_in) ? $object->margin_right_in :'';

				$margin_left=!empty($object->margin_left) ? $object->margin_left :'' ;
				$margin_left_in=!empty($object->margin_left_in) ? $object->margin_left_in :'';

				$txt_color=!empty($object->txt_color) ? $object->txt_color :'';
				$font_family=!empty($object->font_family) ? $object->font_family :'';

				$font_size=!empty($object->font_size) ? $object->font_size :'';
				$font_size_in=!empty($object->font_size_in) ? $object->font_size_in :'';
				if($font_size == 0)
				{
					$font_size="13px";
					$font_size_in="";
				}
				$font_weight=!empty($object->font_weight) ? $object->font_weight :'';
				$txt_align=!empty($object->txt_align) ? $object->txt_align :'';
				
				$alert_width=!empty($object->alert_width) ? $object->alert_width : '100%';
				$alert_width_in=!empty($object->alert_width_in) ? $object->alert_width_in :'';
				if($alert_width == "100%")
				{
					$alert_width_in="";
				}

				$alert_height=!empty($object->alert_height) ? $object->alert_height : 'auto';
				$alert_height_in=!empty($object->alert_height_in) ? $object->alert_height_in : '';
				if($alert_height == "auto")
				{
					$alert_height_in="";
				}
				
				$title=!empty($object->title) ? $object->title :'';
				$content=!empty($object->content) ? $object->content : '';

				$html.="<div id='alert_div_cat_".$alert_id."' style='background-color:".$back_color.";border:".$border_width.$border_width_in." ".$border_style." ".$border_color.";padding-top:".$padding_top.$padding_top_in.";padding-bottom:".$padding_bottom.$padding_bottom_in.";padding-right:".$padding_right.$padding_right_in.";padding-left:".$padding_left.$padding_left_in.";margin-top:".$margin_top.$margin_top_in.";margin-bottom:".$margin_bottom.$margin_bottom_in.";margin-right:".$margin_right.$margin_right_in.";margin-left:".$margin_left.$margin_left_in.";color:".$txt_color.";width:".$alert_width.$alert_width_in.";height:".$alert_height.$alert_height_in.";font-family:".$font_family.";font-size:".$font_size.$font_size_in.";font-weight:".$font_weight.";text-align:".$txt_align.";border-radius:".$border_radius.$border_radius_in.";'>";

				$close_check=!empty($object->close_check) ? $object->close_check : '';
				if($close_check=="on")
				{
					$close_float=!empty($object->close_float) ? $object->close_float : '';
					$close_font_size=!empty($object->close_font_size) ? $object->close_font_size : '';
					$close_font_size_in=!empty($object->close_font_size_in) ? $object->close_font_size_in : '';
					if($close_font_size==0)
					{
						$close_font_size="21px";
						$close_font_size_in="";
					}
					$close_font_weight=!empty($object->close_font_weight) ? $object->close_font_weight : '';
					if($close_font_weight=="")
					{
						$close_font_weight="700";
					}
					$close_color=!empty($object->close_color) ? $object->close_color : '';
					$close_opacity=!empty($object->close_opacity) ? $object->close_opacity : '';
					if($close_opacity=="")
					{
						$close_opacity="0.5";
					}
					$html.="<a href='javascript:void(0)' id='close_id' class='close_class' onclick='close_fn_cat($alert_id);' style='line-height: 1;float:".$close_float.";font-size:".$close_font_size.$close_font_size_in.";font-weight:".$close_font_weight.";color:".$close_color.";opacity:".$close_opacity.";'>×</a>";
				?>
					<script>
						 function close_fn_cat(which_id)
						 {
						 	document.getElementById('alert_div_cat_'+which_id).style.display="none";
						 }
						</script>
				<?php }	
				$html.="<strong>".$cat_name."&nbsp;</strong>";
				$html.= $content;
				$html.="</div>";
			
		}
		echo $html;
	}	
}
function cam_check_current_user_level()
{
	global $current_user;
	if ( current_user_can('administrator') )
	{
			return true;
	}
}
function cam_alert_main()
{
	global $current_user;
	$cam_alert_curr_view='list';
	if(isset($_GET['view']) && $_GET['view'])
	{
		$cam_alert_curr_view = sanitize_text_field($_GET['view']);
	}
	if(isset($_POST['view']) && $_POST['view'])
	{
		$cam_alert_curr_view = sanitize_text_field($_POST['view']);
	}
	if (!empty($cam_alert_curr_view) && $cam_alert_curr_view == 'list')
	{
		cam_alert_list(); // listing the alerts
	}
	else if(!empty($cam_alert_curr_view)  && $cam_alert_curr_view == 'addnew')
	{
		if(!cam_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}	
		cam_insert_data();	// calling insert form	
	}
	else if(!empty($cam_alert_curr_view) &&  $cam_alert_curr_view == 'edit')
	{
		if(!cam_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}	
		cam_edit_data();	// calling edit form	
	}
}
function cam_alert_category()
{
	$cam_alert_curr_view='list';
	if(isset($_GET['view']) && $_GET['view'])
	{
		$cam_alert_curr_view = sanitize_text_field($_GET['view']);
	}
	if(isset($_POST['view']) && $_POST['view'])
	{
		$cam_alert_curr_view = sanitize_text_field($_POST['view']);
	}
	if (!empty($cam_alert_curr_view) && $cam_alert_curr_view == 'list')
	{
		cam_category_list(); // listing the category
	}
	else if(!empty($cam_alert_curr_view)  && $cam_alert_curr_view == 'addnew')
	{
		if(!cam_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}
		cam_category_insert_data();	// calling category insert form	
	}
	else if(!empty($cam_alert_curr_view) &&  $cam_alert_curr_view == 'edit')
	{
		if(!cam_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}
		cam_category_edit_data();	// calling category edit form	
	}
}
function cam_alert_activate()
{
		//create or update table
		cam_alert_create_table();		
		// Clear the permalinks
		flush_rewrite_rules();
}
function cam_alert_deactivate()
{
		// Clear the permalinks
		flush_rewrite_rules();
}
function cam_alert_uninstall()
{
		cam_alert_remove_table();
}
function cam_alert_create_table()
{
	global $wpdb;	
	require_once(ABSPATH . '/wp-admin/includes/upgrade.php');	
	if (!isset ($wpdb->charset))
	{
		$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
	}
	if (!isset ($wpdb->collate))
	{
		$charset_collate .= " COLLATE {$wpdb->collate}";
	}	
	$table_name = "wp_cam_alert";
	$sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `cat_id` int(11) NOT NULL,
				  `title` varchar(100) NOT NULL,
				  `content` text NOT NULL,
				  PRIMARY KEY (`id`)
			) $charset_collate;";
	dbDelta($sql);
	$table_name = "wp_cam_alert_category";
	$sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `cat_name` varchar(100) NOT NULL,
				  `back_color` varchar(100) NULL,
				  `border_width` varchar(100)  NULL,
				  `border_width_in` varchar(100) NULL,
				  `border_style` varchar(100) NULL,
				  `border_color` varchar(100) NULL,
				  `border_radius` int(50) NULL,
				  `border_radius_in` varchar(10) NULL,
				  `padding_top` varchar(100) NULL,
				  `padding_top_in` varchar(10) NULL,
				  `padding_bottom` varchar(100) NULL,
				  `padding_bottom_in` varchar(10) NULL,
				  `padding_right` varchar(100) NULL,
				  `padding_right_in` varchar(10) NULL,
				  `padding_left` varchar(100) NULL,
				  `padding_left_in` varchar(10) NULL,
				  `margin_top` varchar(100) NULL,
				  `margin_top_in` varchar(10) NULL,
				  `margin_bottom` varchar(100) NULL,
				  `margin_bottom_in` varchar(10) NULL,
				  `margin_right` varchar(100) NULL,
				  `margin_right_in` varchar(10) NULL,
				  `margin_left` varchar(100) NULL,
				  `margin_left_in` varchar(10) NULL,
				  `txt_color` varchar(100) NULL,
				  `font_family` varchar(100) NULL,
				  `font_size` int(100) NULL,
				  `font_size_in` varchar(10) NULL,
				  `font_weight` varchar(30) NULL,
				  `txt_align` varchar(30) NULL,
				  `alert_width` varchar(100) NULL,
				  `alert_width_in` varchar(10) NULL,
				  `alert_height` varchar(100) NULL,
				  `alert_height_in` varchar(10) NULL,
				  `close_check` varchar(4) NULL,
				  `close_float` varchar(15) NULL,
				  `close_font_size` int(100) NULL,
				  `close_font_size_in` varchar(4) NULL,
				  `close_font_weight` varchar(100) NULL,
				  `close_color` varchar(100) NULL,
				  `close_opacity` float NULL,
				  PRIMARY KEY (`id`)
			) $charset_collate;";		
	dbDelta($sql);
}
function cam_alert_remove_table()
{
	global $wpdb;
	$table = $wpdb->prefix."cam_alert";
	$table_c = $wpdb->prefix."cam_alert_category";
	$wpdb->query("DROP TABLE IF EXISTS $table");
	$wpdb->query("DROP TABLE IF EXISTS $table_c");	
}
	register_activation_hook(__FILE__,'cam_alert_activate' ); // resgister hook
	register_deactivation_hook( __FILE__,'cam_alert_deactivate');
	register_uninstall_hook( __FILE__, 'cam_alert_uninstall' ); // uninstall plugin
	add_shortcode( 'cam_alert', 'cam_alert' ); // add shortcode hook
	add_action('admin_menu', 'add_alert_options'); // add menu hook
	add_action( 'admin_post_cam-submit-insert-form-data', 'cam_insert_data_process' ); // insert action decleared
	add_action( 'admin_post_cam-submit-edit-form-data', 'cam_edit_data_process' ); // edit action decleared
	add_action( 'admin_post_cam-submit-delete-form-data', 'cam_delete_data_process' ); // delete action decleared
	add_action( 'admin_post_cam-submit-cat-insert-form-data', 'cam_cat_insert_data_process' ); // insert category action decleared
	add_action( 'admin_post_cam-submit-cat-edit-form-data', 'cam_cat_edit_data_process' ); // edit action decleared
	add_action( 'admin_post_cam-submit-cat-delete-form-data', 'cam_cat_delete_data_process' ); // delete action decleared
<?php
defined('ABSPATH') or die("restricted access");
function cam_cat_insert_data_process()
{
	global $wpdb;
	if (  ! isset( $_POST['cam_cat_in_verify'] ) || ! wp_verify_nonce( $_POST['cam_cat_in_verify'], get_admin_url().'admin-post.php' ) 
	)
	{
		 print 'Sorry, your nonce did not verify.';
   		exit;
	}
	else
	{
		if(isset($_POST['cat_name'])&& $_POST['cat_name']!="")
		{		
			$cat_name=sanitize_text_field($_POST['cat_name']);
			$back_color=sanitize_text_field($_POST['back_color']);

			$border_width=intval($_POST['border_width']);
			$border_width_in=sanitize_text_field($_POST['border_width_in']);

			$border_style=sanitize_text_field($_POST['border_style']);
			$border_color=sanitize_text_field($_POST['border_color']);

			$border_radius=intval($_POST['border_radius']);
			$border_radius_in=sanitize_text_field($_POST['border_radius_in']);

			$padding_top=intval($_POST['padding_top']);
			$padding_top_in=sanitize_text_field($_POST['padding_top_in']);

			$padding_bottom=intval($_POST['padding_bottom']);
			$padding_bottom_in=sanitize_text_field($_POST['padding_bottom_in']);

			$padding_right=intval($_POST['padding_right']);
			$padding_right_in=sanitize_text_field($_POST['padding_right_in']);

			$padding_left=intval($_POST['padding_left']);
			$padding_left_in=sanitize_text_field($_POST['padding_left_in']);

			$margin_top=intval($_POST['margin_top']);
			$margin_top_in=sanitize_text_field($_POST['margin_top_in']);

			$margin_bottom=intval($_POST['margin_bottom']);
			$margin_bottom_in=sanitize_text_field($_POST['margin_bottom_in']);

			$margin_right=intval($_POST['margin_right']);
			$margin_right_in=sanitize_text_field($_POST['margin_right_in']);

			$margin_left=intval($_POST['margin_left']);
			$margin_left_in=sanitize_text_field($_POST['margin_left_in']);

			$txt_color=sanitize_text_field($_POST['txt_color']);
			$font_family=sanitize_text_field($_POST['font_family']);

			$font_size=intval($_POST['font_size']);
			$font_size_in=sanitize_text_field($_POST['font_size_in']);

			$font_weight=sanitize_text_field($_POST['font_weight']);
			$txt_align=sanitize_text_field($_POST['txt_align']);

			$alert_width=intval($_POST['alert_width']);
			$alert_width_in=sanitize_text_field($_POST['alert_width_in']);

			$alert_height=intval($_POST['alert_height']);
			$alert_height_in=sanitize_text_field($_POST['alert_height_in']);

			$close_check=sanitize_text_field($_POST['close_check']);
			$close_float=sanitize_text_field($_POST['close_float']);
			$close_font_size=intval($_POST['close_font_size']);
			$close_font_size_in=sanitize_text_field($_POST['close_font_size_in']);
			$close_font_weight=sanitize_text_field($_POST['close_font_weight']);
			$close_color=sanitize_text_field($_POST['close_color']);
			$close_opacity=sanitize_text_field($_POST['close_opacity']);
		
			$data=array(
						'cat_name'          => $cat_name,
						'back_color' 		=> $back_color,
						'border_width' 		=> $border_width,
						'border_width_in' 	=> $border_width_in,
						'border_style' 		=> $border_style,
						'border_color' 		=> $border_color,
						'border_radius' 	=> $border_radius,
						'border_radius_in' 	=> $border_radius_in,
						'padding_top' 		=> $padding_top,
						'padding_top_in' 	=> $padding_top_in,
						'padding_bottom' 	=> $padding_bottom,
						'padding_bottom_in' => $padding_bottom_in,
						'padding_right' 	=> $padding_right,
						'padding_right_in' 	=> $padding_right_in,
						'padding_left' 		=> $padding_left,
						'padding_left_in' 	=> $padding_left_in,
						'margin_top' 		=> $margin_top,
						'margin_top_in' 	=> $margin_top_in,
						'margin_bottom' 	=> $margin_bottom,
						'margin_bottom_in' 	=> $margin_bottom_in,
						'margin_right' 		=> $margin_right,
						'margin_right_in' 	=> $margin_right_in,
						'margin_left' 		=> $margin_left,
						'margin_left_in' 	=> $margin_left_in,
						'txt_color' 		=> $txt_color,
						'font_family' 		=> $font_family,
						'font_size' 		=> $font_size,
						'font_size_in' 		=> $font_size_in,
						'font_weight' 		=> $font_weight,
						'txt_align' 		=> $txt_align,
						'alert_width' 		=> $alert_width,
						'alert_width_in' 	=> $alert_width_in,
						'alert_height' 		=> $alert_height,
						'alert_height_in' 	=> $alert_height_in,
						'close_check' 		=> $close_check,
						'close_float' 		=> $close_float,
						'close_font_size' 	=> $close_font_size,
						'close_font_size_in'=> $close_font_size_in,
						'close_font_weight' => $close_font_weight,
						'close_color' 		=> $close_color,
						'close_opacity' 	=> $close_opacity
						
						);
			// print_r($data);
			// exit();
			$wpdb->insert( 'wp_cam_alert_category', $data);	
			wp_redirect( admin_url('admin.php?page=cam-category-list&cam_in_msg=suc') );		
			exit();	
		}
	}
}
 function cam_cat_edit_data_process()
{
	global $wpdb;

	if(isset($_POST['cat_name'])&& $_POST['cat_name']!="")
	{		
		$id=intval($_POST['edit_category_id']);
		if ( ! isset( $_POST['cam_cat_ed_verify_'.$id] ) || ! wp_verify_nonce( $_POST['cam_cat_ed_verify_'.$id], get_admin_url().'admin-post.php' ) )
		{
			print 'Sorry, your nonce did not verify.';
   			exit;
		}
		else
		{
			$cat_name=sanitize_text_field($_POST['cat_name']);
			$back_color=sanitize_text_field($_POST['back_color']);

			$border_width=intval($_POST['border_width']);
			$border_width_in=sanitize_text_field($_POST['border_width_in']);

			$border_style=sanitize_text_field($_POST['border_style']);
			$border_color=sanitize_text_field($_POST['border_color']);

			$border_radius=intval($_POST['border_radius']);
			$border_radius_in=sanitize_text_field($_POST['border_radius_in']);

			$padding_top=intval($_POST['padding_top']);
			$padding_top_in=sanitize_text_field($_POST['padding_top_in']);

			$padding_bottom=intval($_POST['padding_bottom']);
			$padding_bottom_in=sanitize_text_field($_POST['padding_bottom_in']);

			$padding_right=intval($_POST['padding_right']);
			$padding_right_in=sanitize_text_field($_POST['padding_right_in']);

			$padding_left=intval($_POST['padding_left']);
			$padding_left_in=sanitize_text_field($_POST['padding_left_in']);

			$margin_top=intval($_POST['margin_top']);
			$margin_top_in=sanitize_text_field($_POST['margin_top_in']);

			$margin_bottom=intval($_POST['margin_bottom']);
			$margin_bottom_in=sanitize_text_field($_POST['margin_bottom_in']);

			$margin_right=intval($_POST['margin_right']);
			$margin_right_in=sanitize_text_field($_POST['margin_right_in']);

			$margin_left=intval($_POST['margin_left']);
			$margin_left_in=sanitize_text_field($_POST['margin_left_in']);

			$txt_color=sanitize_text_field($_POST['txt_color']);
			$font_family=sanitize_text_field($_POST['font_family']);

			$font_size=intval($_POST['font_size']);
			$font_size_in=sanitize_text_field($_POST['font_size_in']);

			$font_weight=sanitize_text_field($_POST['font_weight']);
			$txt_align=sanitize_text_field($_POST['txt_align']);

			$alert_width=intval($_POST['alert_width']);
			$alert_width_in=sanitize_text_field($_POST['alert_width_in']);

			$alert_height=intval($_POST['alert_height']);
			$alert_height_in=sanitize_text_field($_POST['alert_height_in']);

			$close_check=sanitize_text_field($_POST['close_check']);
			$close_float=sanitize_text_field($_POST['close_float']);
			$close_font_size=intval($_POST['close_font_size']);
			$close_font_size_in=sanitize_text_field($_POST['close_font_size_in']);
			$close_font_weight=sanitize_text_field($_POST['close_font_weight']);
			$close_color=sanitize_text_field($_POST['close_color']);
			$close_opacity=sanitize_text_field($_POST['close_opacity']);

			$data=array(
						'cat_name'          => $cat_name,
						'back_color' 		=> $back_color,
						'border_width' 		=> $border_width,
						'border_width_in' 	=> $border_width_in,
						'border_style' 		=> $border_style,
						'border_color' 		=> $border_color,
						'border_radius' 	=> $border_radius,
						'border_radius_in' 	=> $border_radius_in,
						'padding_top' 		=> $padding_top,
						'padding_top_in' 	=> $padding_top_in,
						'padding_bottom' 	=> $padding_bottom,
						'padding_bottom_in' => $padding_bottom_in,
						'padding_right' 	=> $padding_right,
						'padding_right_in' 	=> $padding_right_in,
						'padding_left' 		=> $padding_left,
						'padding_left_in' 	=> $padding_left_in,
						'margin_top' 		=> $margin_top,
						'margin_top_in' 	=> $margin_top_in,
						'margin_bottom' 	=> $margin_bottom,
						'margin_bottom_in' 	=> $margin_bottom_in,
						'margin_right' 		=> $margin_right,
						'margin_right_in' 	=> $margin_right_in,
						'margin_left' 		=> $margin_left,
						'margin_left_in' 	=> $margin_left_in,
						'txt_color' 		=> $txt_color,
						'font_family' 		=> $font_family,
						'font_size' 		=> $font_size,
						'font_size_in' 		=> $font_size_in,
						'font_weight' 		=> $font_weight,
						'txt_align' 		=> $txt_align,
						'alert_width' 		=> $alert_width,
						'alert_width_in' 	=> $alert_width_in,
						'alert_height' 		=> $alert_height,
						'alert_height_in' 	=> $alert_height_in,
						'close_check' 		=> $close_check,
						'close_float' 		=> $close_float,
						'close_font_size' 	=> $close_font_size,
						'close_font_size_in'=> $close_font_size_in,
						'close_font_weight' => $close_font_weight,
						'close_color' 		=> $close_color,
						'close_opacity' 	=> $close_opacity
						
						);
			//print_r($data);
			//exit();
			$where = array('id' => $id);
			$wpdb->update( 'wp_cam_alert_category', $data, $where);	
			wp_redirect( admin_url('admin.php?page=cam-category-list&cam_ed_msg=suc') );		
			exit();
		}	
	}
}
function cam_cat_delete_data_process()
{
	global $wpdb;
	if (  ! isset( $_POST['cam_cat_dl_verify'] ) || ! wp_verify_nonce( $_POST['cam_cat_dl_verify'], get_admin_url().'admin-post.php' ) 
	)
	{
		 print 'Sorry, your nonce did not verify.';
   		exit;
	}
	else
	{
		if(isset($_POST['category_id']) && $_POST['category_id']!="")
		{
			if((isset($_POST['select_action_top']) && $_POST['select_action_top']=="delete") || (isset($_POST['select_action_bottom']) && $_POST['select_action_bottom']=="delete"))
			{
				$id_array=explode(",",sanitize_text_field($_POST['category_id']));
				foreach($id_array as $id)
				{
					$where = array('id' => $id);
					$where_n = array('cat_id' => $id);
					$wpdb->delete('wp_cam_alert',$where_n);
					$wpdb->delete('wp_cam_alert_category',$where);
					
				}
				wp_redirect(admin_url('admin.php?page=cam-category-list&cam_dl_msg=suc'));					
			}
			else
			{
				wp_redirect(admin_url('admin.php?page=cam-category-list'));		
			}
		}
		else
		{
			wp_redirect(admin_url('admin.php?page=cam-category-list'));		
		}	
		exit();
	}
} 
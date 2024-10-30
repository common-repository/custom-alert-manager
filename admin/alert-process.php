<?php
defined('ABSPATH') or die("restricted access");
function cam_insert_data_process()
{
	global $wpdb;
	if (  ! isset( $_POST['cam_in_verify'] ) || ! wp_verify_nonce( $_POST['cam_in_verify'], get_admin_url().'admin-post.php' ) 
	)
	{
		 print 'Sorry, your nonce did not verify.';
   		exit;
	}
	else
	{
		if(isset($_POST['title'])&& $_POST['title']!="")
		{		
			$title=sanitize_text_field($_POST['title']);
			$content=esc_textarea($_POST['content']);
			$cat_id=intval($_POST['cat_id']);
			$data=array(
						'title'			=> $title,
						'content'		=> $content,
						'cat_id' 		=> $cat_id
						);
			$wpdb->insert( 'wp_cam_alert', $data);	
			wp_redirect( admin_url('admin.php?page=alert-list&cam_in_msg=suc') );		
			exit();	
		}
	}
}
function cam_edit_data_process()
{
	global $wpdb;
	if(isset($_POST['title']) && $_POST['title']!="")
	{		
		$id=intval($_POST['edit_alert_id']);
		if ( ! isset( $_POST['cam_ed_verify_'.$id] ) || ! wp_verify_nonce( $_POST['cam_ed_verify_'.$id], get_admin_url().'admin-post.php' ) )
		{
			print 'Sorry, your nonce did not verify.';
   			exit;
		}
		else
		{
			$title=sanitize_text_field($_POST['title']);
			$content=esc_textarea($_POST['content']);
			$cat_id=intval($_POST['cat_id']);
			$data=array(
						'title'			=> $title,
						'content'		=> $content,
						'cat_id' 		=> $cat_id
						);
			$where = array('id' => $id);
			$wpdb->update( 'wp_cam_alert', $data, $where);	
			wp_redirect( admin_url('admin.php?page=alert-list&ed_msg=suc') );		
			exit();	
		}
	}
}
function cam_delete_data_process()
{
	global $wpdb;
	if (  ! isset( $_POST['cam_dl_verify'] ) || ! wp_verify_nonce( $_POST['cam_dl_verify'], get_admin_url().'admin-post.php' ) 
	)
	{
		 print 'Sorry, your nonce did not verify.';
   		exit;
	}
	else
	{
		if(isset($_POST['alert_id']) && $_POST['alert_id']!="" && (isset($_POST['select_action_top']) && $_POST['select_action_top']=="delete" || isset($_POST['select_action_bottom']) && $_POST['select_action_bottom']=="delete"))
		{	
			$id_array=explode(",",sanitize_text_field($_POST['alert_id']));
			foreach($id_array as $id)
			{
				$where = array('id' => $id);
				$wpdb->delete('wp_cam_alert',$where);
			}
			wp_redirect(admin_url('admin.php?page=alert-list&cam-dl_msg=suc'));
		}
		else
		{
			wp_redirect(admin_url('admin.php?page=alert-list'));		
		}
		exit();
	}
}
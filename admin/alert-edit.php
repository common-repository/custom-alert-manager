<?php
defined('ABSPATH') or die("restricted access");
function cam_edit_data()
{
global $current_user;
if(!cam_check_current_user_level())
{
	wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
}
?>
	<div class="wrap">
        <h1>Edit alert <a href="<?php echo admin_url('admin.php?page=alert-list'); ?>" class="page-title-action" role="button">Alerts</a></h1>
        <form name="edit_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return cam_insert_form_valid_check()" novalidate>    
			
			<?php 
			if(!empty(intval($_GET['alert_id'])))
			{
				$alert_id=$_GET['alert_id'];
				global $wpdb;
				$results_array = $wpdb->get_results( "SELECT * FROM wp_cam_alert WHERE id=$alert_id");
				$edit_cat_id="";
				foreach ($results_array as $key => $object_edit) 
				{					
					$edit_cat_id=$object_edit->cat_id;
					
				}
			?>
			<?php wp_nonce_field( get_admin_url().'admin-post.php', 'cam_ed_verify_'.$alert_id); ?>
			<input type="hidden" name="action" value="cam-submit-edit-form-data" />  
			<input type="hidden" name="edit_alert_id" value="<?php echo !empty($alert_id) ? $alert_id : ''; ?>" />
			<div class="container">
				<div class="row">
					<label class="" id="" for="title">Select Category : </label>
				</div>
				<div class="row">
					<select name="cat_id" id="cat_id" class="form-control">
						<?php 
						global $wpdb;
						$results = $wpdb->get_results( "SELECT * FROM wp_cam_alert_category");
						foreach ($results as $key => $object_select) 
						{  
							if($object_select->id==$edit_cat_id)
							{
								$select="selected";
							}
							else
							{
								$select="";
							}
						?>
						<option value="<?php echo $object_select->id; ?>" <?php echo $select; ?>><?php echo $object_select->cat_name; ?></option>
						<?php } ?>		
					</select>
				</div>   				
				<div class="row">	
						<label>Title</label>
				</div>
				<div class="row">	
					<input type="text"  name="title" id="title" class="form-control"  value="<?php echo !empty($object_edit->title) ? $object_edit->title : '' ; ?>"/>
				</div>        				
				<div class="row">	    				
						<label>Display Content</label>
				</div>
				<div class="row">
					<textarea name="content" rows="4" id="content" cols="31" style="margin-bottom:10px;"><?php echo !empty($object_edit->content) ? $object_edit->content : ''; ?></textarea>
				</div>
				<input type="submit"class="button button-primary button-large" name="Submit" value="Update Notification" />					
			<?php  }?>	
			</div>
        </form>
    </div>
<?php } ?>
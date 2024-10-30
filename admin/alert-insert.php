<?php
defined('ABSPATH') or die("restricted access");
function cam_insert_data()
{
	global $current_user;
if(!cam_check_current_user_level())
	{
		wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
	}
?>
	<div class="wrap">
        <h1>Add New Alert <a href="<?php echo admin_url('admin.php?page=alert-list'); ?>" class="page-title-action" role="button">Alert</a></h1>
        <form name="insert_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return insert_form_valid_check()" novalidate>    
			<?php wp_nonce_field( get_admin_url().'admin-post.php', 'cam_in_verify'); ?>
            <input type="hidden" name="action" value="cam-submit-insert-form-data" />  
            <div class="container">
            	<div class="row">
					<label class="" id="" for="title">Select Category : </label>
				</div>
				<div class="row">
					<select name="cat_id" id="cat_id" class="form-control">
						<?php 
						global $wpdb;
						$results = $wpdb->get_results( "SELECT * FROM wp_cam_alert_category");
						foreach ($results as $key => $object) 
						{  
						?>
						<option value="<?php echo $object->id; ?>"><?php echo $object->cat_name; ?></option>
						<?php } ?>		
					</select>
				</div>
				<div class="row">	
					<label>Title</label>
				</div>
				<div class="row">			
					<input type="text"  name="title" id="title" class="form-control"/>
				</div> 
				<div class="row">	    				
					<label>Display Content</label>
				</div>
				<div class="row">		
					<textarea name="content" id="content" rows="4" cols="31" style="margin-bottom:10px;"></textarea>
				</div>
				<div class="row">
					<input type="submit"class="button button-primary button-large" name="Submit" value="Save Alert" />	
				</div><br>
				<div class="row">
				<b>If this plugin is usefull for you then please rate it.</b>
				</div>
			</div>			
        </form>
    </div>
<?php } ?>
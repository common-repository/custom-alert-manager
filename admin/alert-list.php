<?php
defined('ABSPATH') or die("restricted access");
function cam_alert_list()
{
	global $wpdb;
	$results = $wpdb->get_results( "SELECT cal.id as al_id,cat_id,title,content,cat_name FROM wp_cam_alert AS cal LEFT JOIN wp_cam_alert_category AS cacl ON cal.cat_id=cacl.id");
?>
	<div class="wrap">
		<h1>Custom alerts <a href="<?php echo admin_url('admin.php?page=alert-list&view=addnew'); ?>" class="page-title-action" role="button">Add New</a></h1>
		<?php include_once('alert-message.php');?>
		<form method="post" name="delete_form" id="deleteForm" action="<?php echo get_admin_url().'admin-post.php'; ?>">
		<?php wp_nonce_field( get_admin_url().'admin-post.php', 'cam_dl_verify'); ?>
			<input type="hidden" name="action" value="cam-submit-delete-form-data" />  
			<input type="hidden" id="alert_id" name="alert_id" value=""/> 
			<div class="tablenav top" id="tablenavtop_id">
				<div class="alignleft actions bulkactions">
					<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
					<select name="select_action_top" id="bulk-action-selector-top">
						<option value="-1">Bulk Actions</option>
						<option value="delete" class="hide-if-no-js">Delete</option>
					</select>
					<input type="button" id="doaction" class="button action"  onclick="cam_how_many();" value="Apply">
				</div>
				<div class="tablenav-pages one-page"><span class="displaying-num" id="total_item_top_id"></span></div>
			</div>
			<table class="wp-list-table widefat fixed striped posts">
				<thead>
				  <tr>
					<th>
						<input id="root_checkbox_id_top" type="checkbox"  style="margin-left:0px;margin-right:5px;" value="1" onclick="cam_all_check_top()">
						<span>Title</span>
					</th>
					<th>Category</th>
					<th colspan="2">Content</th>
					<th>Shortcode</th>
				  </tr>
				</thead>
				
				<tbody id="the-list">					  
						<?php	
						$count_item=0;
						foreach ($results as $key => $object) {  
							$alert_id     = !empty($object->al_id) ? $object->al_id : '';
							$alert_title  = !empty($object->title)? $object->title : '';
							$cat_name  = !empty($object->title)? $object->cat_name : '';
							$alert_content= !empty($object->content)? $object->content : '';
							$count_item++;
						?>								
						<tr>
							<td>
								<input id="delete_check_id_<?php echo $alert_id; ?>" class="delete_check_class" type="checkbox" name="delete_check[]" onclick="cam_each_check(<?php echo $alert_id; ?>)" value="<?php echo $alert_id; ?>">								
							<a href="<?php echo admin_url('admin.php?page=alert-list&view=edit&alert_id='.$alert_id); ?>"><?php echo $alert_title	; ?></a></td>
							<td><a href="<?php echo admin_url('admin.php?page=alert-list&view=edit&alert_id='.$alert_id); ?>"><?php echo $cat_name; ?></a></td>
							<td colspan="2"><a href="<?php echo admin_url('admin.php?page=alert-list&view=edit&alert_id='.$alert_id); ?>"><?php echo $alert_content; ?></a></td>
							<td><strong>[cam_alert id="<?php echo $alert_id; ?>"]</strong>
								<br>
								<span>Shortcode for .php file <br> <?php $str='<?php do_shortcode("[cam_alert id="'.$alert_id.'")" ?>'; echo highlight_string($str,TRUE) ?></span>
							</td>
						</tr>
						<?php	} if($count_item==0){?>
						<tr><td colspan="5">No alert found</td></tr>	
						<?php } ?>
				</tbody>
				</div>
				<tfoot>
				  <tr>
					<th>
						<input id="root_checkbox_id_bottom" type="checkbox" style="margin-left:0px;margin-right:5px;" value="1" onclick="cam_all_check_bottom()">
						<span>Title</span>
					</th>
					<th>Category</th>
					<th colspan="2">Content</th>
					<th>Shortcode</th>	
				  </tr>
				</tfoot>
			</table>
			<div class="tablenav bottom" id="tablenavbottom_id">
				<div class="alignleft actions bulkactions">
					<label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="select_action_bottom" id="bulk-action-selector-bottom">
							<option value="-1">Bulk Actions</option>
							<option value="delete" class="hide-if-no-js">Delete</option>
						</select>
					<input type="submit" id="doaction2" class="button action" onclick="cam_how_many();" value="Apply">
				</div>
				<div class="tablenav-pages one-page"><span class="displaying-num" id="total_item_bottom_id"></span></div>
				<br class="clear">
			</div>
			<script> 
				var count_item = <?php echo $count_item; ?>;
				if(count_item == 0)
				{
					document.getElementById('tablenavbottom_id').style.display="none";
					document.getElementById('tablenavtop_id').style.display="none";
				}
				document.getElementById('total_item_top_id').innerHTML=count_item +" item";
				document.getElementById('total_item_bottom_id').innerHTML=count_item +" item";
			</script>
		</form>	
	</div>	
<?php } ?>
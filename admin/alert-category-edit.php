<?php
defined('ABSPATH') or die("restricted access");
function cam_category_edit_data()
{
global $current_user;
if(!cam_check_current_user_level())
{
	wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
}
?>
	<div class="wrap">
        <h1>Edit Category <a href="<?php echo admin_url('admin.php?page=cam-category-list'); ?>" class="page-title-action" role="button">Alert Category</a></h1>
        <form name="cat_edit_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return cam_cat_insert_form_valid_check()" novalidate> 
        	<div class="container">   
				
				<?php 
				if(!empty(intval($_GET['category_id'])))
				{
					$category_id=intval($_GET['category_id']);
					global $wpdb;
					$results = $wpdb->get_results( "SELECT * FROM wp_cam_alert_category WHERE id=$category_id");
					foreach ($results as $key => $object) 
					{	
				?>
				
				 <?php wp_nonce_field( get_admin_url().'admin-post.php', 'cam_cat_ed_verify_'.$category_id); ?>
				<input type="hidden" name="action" value="cam-submit-cat-edit-form-data" />  
				<input type="hidden" name="edit_category_id" value="<?php echo !empty($category_id) ? $category_id : ''; ?>" /> 
				<div class="row">
					<div class="col-sm-12">
						If you have any type of query releted to Alert customization then please contact with query to <a href="mail to:rupamhazra@gmail.com">rupamhazra@gmail.com</a>	
					</div>
				</div>			
				<div class="row">
					<div class="col-sm-12">
						<p><b>Here are some important instructions for alert settings</b></p>
						<ul>
							<li>Default <b>Border width : 1px </b></li>
							<li>Default <b>Font size  : 13px </b></li>
							<li>Default <b>Padding : 15px </b></li>
							<li>Default <b>Margin bottom : 20px </b></li>
							<li>Default <b>Border style : solid </b></li>
							<li>Default <b>Border width : 1px </b></li>
							<li>Default <b>Border Radius : 4px </b></li>
							<li>Default <b>Width : 100% </b></li>
							<li>Default <b>Height : auto </b></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Category Name : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="cat_name" id="cat_name" class="input_box" placeholder="Ex. Success or Warning or Info"  value="<?php echo !empty($object->cat_name) ? $object->cat_name : ''; ?>"/>
					</div>
					<div class="col-sm-2">
						<label>Background Color : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="back_color" id="back_color" class="input_box" placeholder="Ex. rgb or hsl or color name" value="<?php echo !empty($object->back_color) ? $object->back_color : ''; ?>" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-2">
						<label>Border Width : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="border_width" id="border_width" class="input_box" value="<?php echo !empty($object->border_width) ? $object->border_width : ''; ?>"/>
						<select name="border_width_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Border Style : </label>
					</div>
					<div class="col-sm-4">
						<select name="border_style" class="form-control-select">
							<option value="solid" <?php echo $object->border_style == "solid" ? "selected" : ''; ?>>solid</option>
							<option value="dashed" <?php echo $object->border_style == "dashed" ? "selected" : ''; ?>>dashed</option>
							<option value="dotted" <?php echo $object->border_style == "dotted" ? "selected" : ''; ?>>dotted</option>
							<option value="double" <?php echo $object->border_style == "double" ? "selected" : ''; ?>>double</option>
							<option value="none" <?php echo $object->border_style == "none" ? "selected" : ''; ?>>none</option>
							<option value="groove" <?php echo $object->border_style == "groove" ? "selected" : ''; ?>>groove</option>
							<option value="ridge" <?php echo $object->border_style == "ridge" ? "selected" : ''; ?>>ridge</option>
							<option value="inset" <?php echo $object->border_style == "inset" ? "selected" : ''; ?>>inset</option>
							<option value="outset" <?php echo $object->border_style == "outset" ? "selected" : ''; ?>>outset</option>
							<option value="initial" <?php echo $object->border_style == "initial" ? "selected" : ''; ?>>initial</option>
							<option value="inherit" <?php echo $object->border_style == "inherit" ? "selected" : ''; ?>>inherit</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Border Color : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="border_color" id="border_color" class="input_box" placeholder="Ex. rgb or hsl or color name" value="<?php echo !empty($object->border_color) ? $object->border_color : ''; ?>"/>
					</div>
			
					<div class="col-sm-2">
						<label>Border Radius : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="border_radius" id="border_radius" class="input_box"  value="<?php echo !empty($object->border_radius) ? $object->border_radius : ''; ?>"/>
						<select name="border_radius_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Padding Top : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_top" id="padding_top" class="input_box" value="<?php echo !empty($object->padding_top) ? $object->padding_top : ''; ?>"/>
						<select name="padding_top_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Padding Bottom : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_bottom" id="padding_bottom" class="input_box" value="<?php echo !empty($object->padding_bottom) ? $object->padding_bottom : ''; ?>"/>
						<select name="padding_bottom_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Padding Right : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_right" id="padding_right" class="input_box" value="<?php echo !empty($object->padding_right) ? $object->padding_right : ''; ?>"/>
						<select name="padding_right_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Padding Left : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_left" id="padding_left" class="input_box" value="<?php echo !empty($object->padding_left) ? $object->padding_left : ''; ?>"/>
						<select name="padding_left_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Margin Top : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_top" id="margin_top" class="input_box" value="<?php echo !empty($object->margin_top) ? $object->margin_top : ''; ?>"/>
						<select name="margin_top_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Margin Bottom : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_bottom" id="margin_bottom" class="input_box" value="<?php echo !empty($object->margin_bottom) ? $object->margin_bottom : ''; ?>"/>
						<select name="margin_bottom_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Margin Right : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_right" id="margin_right" class="input_box" value="<?php echo !empty($object->margin_right) ? $object->margin_right : ''; ?>"/>
						<select name="margin_right_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Margin Left : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_left" id="margin_left" class="input_box" value="<?php echo !empty($object->margin_left) ? $object->margin_left : ''; ?>"/>
						<select name="margin_left_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Text Color : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="txt_color" id="txt_color" class="input_box" placeholder="Ex. rgb or hsl or color name" value="<?php echo !empty($object->txt_color) ? $object->txt_color : ''; ?>"/>
					</div>
				
					<div class="col-sm-2">
						<label>Font Family : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="font_family" id="font_family" class="input_box" placeholder="sans-serif or arial" value="<?php echo !empty($object->font_family) ? $object->font_family : ''; ?>"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Font Size : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="font_size" id="font_size" class="input_box" value="<?php echo !empty($object->font_size) ? $object->font_size : ''; ?>"/>
						<select name="font_size_in" class="input_box">
							<option value="px" <?php echo $object->font_size_in == "px" ? "selected" : ''; ?>>px</option>
							<option value="em" <?php echo $object->font_size_in == "em" ? "selected" : ''; ?>>em</option>
							<option value="%" <?php echo $object->font_size_in == "%" ? "selected" : ''; ?>>%</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Font Weight : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="font_weight" id="font_weight" class="input_box" placeholder="Ex. bold,400,700,lighter" value="<?php echo !empty($object->font_weight) ? $object->font_weight : ''; ?>"/> 
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-2">
						<label>Text Align : </label>
					</div>
					<div class="col-sm-4">
						<select name="txt_align" class="form-control-select">
							<option value="left" <?php echo $object->txt_align == "left" ? "selected" : ''; ?>>left</option>
							<option value="right" <?php echo $object->txt_align == "right" ? "selected" : ''; ?>>right</option>
							<option value="center" <?php echo $object->txt_align == "center" ? "selected" : ''; ?>>center</option>
							<option value="justify" <?php echo $object->txt_align == "justify" ? "selected" : ''; ?>>justify</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Width : </label>
					</div>
					<div class="col-sm-4">
					<input type="number"  name="alert_width" id="alert_width" class="input_box" placeholder="Ex. 100px,20%" value="<?php echo !empty($object->alert_width) ? $object->alert_width : ''; ?>"/> <select name="alert_width_in" class="input_box">
							<option value="px" <?php echo $object->alert_width_in == "px" ? "selected" : ''; ?>>px</option>
							<option value="%" <?php echo $object->alert_width_in == "%" ? "selected" : ''; ?>>%</option>
						</select>
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-2">
						<label>Height : </label>
					</div>
					<div class="col-sm-10">
						<input type="number"  name="alert_height" id="alert_height" class="input_box" placeholder="Ex. 100px,20%" value="<?php echo $object->alert_height ? $object->alert_height : ''; ?>" />
						<select name="alert_height_in" class="input_box">
							<option value="px" <?php echo $object->alert_height_in == "px" ? "selected" : ''; ?>>px</option>
							<option value="%" <?php echo $object->alert_height_in == "%" ? "selected" : ''; ?>>%</option>
						</select>
					</div>	
				</div>
				
				
				<div class="row">
					<div class="col-sm-12">
						<input type="checkbox" name="close_check" id="close_check" onclick="cam_close_check();" <?php echo $object->close_check ? "checked" : ''; ?>/>Check to enable <b>alert dismiss or close property </b> with some usefull settings.
					</div>
				</div>
				<div id="close_settings_div" style="display:<?php echo $object->close_check=="on" ? "block;" : "none;"; ?>">	
					<div class="row">
						<div class="col-sm-12">
							<p><b>Here are some important instructions for alert dismiss property</b></p>
							<ul>
								<li>Default <b>Float : right </b></li>
								<li>Default <b>Font size  : 21px </b></li>
								<li>Default <b>Font weight : 700 </b></li>
								<li>Default <b>Opacity : 0.5 </b></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1"><lable>Float : </lable></div>
						<div class="col-sm-2">
							<select name="close_float" id="close_float" class="form-control-select">
								<option value="right" <?php echo $object->close_float == "right" ? "selected" : ''; ?>>right</option>
								<option value="left" <?php echo $object->close_float == "left" ? "selected" : ''; ?>>left</option>
								<option value="none" <?php echo $object->close_float == "none" ? "selected" : ''; ?>>none</option>
								<option value="initial" <?php echo $object->close_float == "initial" ? "selected" : ''; ?>>initial</option>
								<option value="inherit" <?php echo $object->close_float == "inherit" ? "selected" : ''; ?>>inherit</option>
							</select>
						</div>
						<div class="col-sm-1"><lable>Font Size : </lable></div>
						<div class="col-sm-4">
							<input type="number"  name="close_font_size" id="close_font_size" class="input_box" value="<?php echo !empty($object->close_font_size) ? $object->close_font_size : ''; ?>"/>
							<select name="close_font_size_in" id="close_font_size_in" class="input_box">
								<option value="px" <?php echo $object->close_font_size_in == "px" ? "selected" : ''; ?>>px</option>
								<option value="em" <?php echo $object->close_font_size_in == "em" ? "selected" : ''; ?>>em</option>
								<option value="%" <?php echo $object->close_font_size_in == "%" ? "selected" : ''; ?>>%</option>
							</select>
						</div>
						<div class="col-sm-1">
						<label>Font Weight : </label>
						</div>
						<div class="col-sm-3">
							<input type="text"  name="close_font_weight" id="close_font_weight" class="input_box" placeholder="Ex. bold,400,700,lighter" value="<?php echo !empty($object->close_font_weight) ? $object->close_font_weight : ''; ?>"/> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1"> Color :</div>
						<div class="col-sm-2">
							<input type="text"  name="close_color" style="width:90%;" id="close_color" class="input_box" placeholder="Ex. rgb or hsl or name" value="<?php echo !empty($object->close_color) ? $object->close_color : ''; ?>"/>
						</div>
						<div class="col-sm-1"> Opacity :</div>
						<div class="col-sm-3">
							<input type="text"  name="close_opacity" id="close_opacity" class="input_box" placeholder="Ex. 0.1 or 0.2 or 0.3" value="<?php echo !empty($object->close_opacity) ? $object->close_opacity : ''; ?>"/>
						</div>
					</div>
				</div>	
				<div class="row">
				  <div class="col-sm-12" style="text-align:center;">
					<input type="submit" class="button button-primary button-large" name="Submit" value="Save Category Settings">
				  </div>
				</div>		
			<?php } }?>	
		</div>	
        </form>
    </div>
<?php } ?>
<?php
defined('ABSPATH') or die("restricted access");
function cam_category_insert_data()
{
global $current_user;
if(!cam_check_current_user_level())
{
	wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
}
?>
	<div class="wrap">
        <h1>Add New Alert Category <a href="<?php echo admin_url('admin.php?page=cam-category-list'); ?>" class="page-title-action" role="button">Alert Category</a></h1>
        <form name="cat_insert_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return cam_cat_insert_form_valid_check()" novalidate>    
			<?php wp_nonce_field( get_admin_url().'admin-post.php', 'cam_cat_in_verify'); ?>
            <input type="hidden" name="action" value="cam-submit-cat-insert-form-data" />  			
			<div class="container">
			<div class="row">
					<div class="col-sm-12">
						If you have any type of query releted to Alert customization then please contact with query to <a href="mail to:rupamhazra@gmail.com">rupamhazra@gmail.com</a>	
					</div>
					<div class="col-sm-12">
						<b>If this plugin is usefull for you then please rate it.</b>
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
						<input type="text"  name="cat_name" id="cat_name" class="input_box" placeholder="Ex. Success or Warning or Info" />
					</div>
					<div class="col-sm-2">
						<label>Background Color : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="back_color" id="back_color" class="input_box" placeholder="Ex. rgb or hsl or color name" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-2">
						<label>Border Width : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="border_width" id="border_width" class="input_box"/>
						<select name="border_width_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Border Style : </label>
					</div>
					<div class="col-sm-4">
						<select name="border_style" class="form-control-select">
							<option value="solid">solid</option>
							<option value="dashed">dashed</option>
							<option value="dotted">dotted</option>
							<option value="double">double</option>
							<option value="none">none</option>
							<option value="groove">groove</option>
							<option value="ridge">ridge</option>
							<option value="inset">inset</option>
							<option value="outset">outset</option>
							<option value="initial">initial</option>
							<option value="inherit">inherit</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Border Color : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="border_color" id="border_color" class="input_box" placeholder="Ex. rgb or hsl or color name"/>
					</div>
			
					<div class="col-sm-2">
						<label>Border Radius : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="border_radius" id="border_radius" class="input_box"/>
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
						<input type="number"  name="padding_top" id="padding_top" class="input_box"/>
						<select name="padding_top_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Padding Bottom : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_bottom" id="padding_bottom" class="input_box"/>
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
						<input type="number"  name="padding_right" id="padding_right" class="input_box"/>
						<select name="padding_right_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Padding Left : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="padding_left" id="padding_left" class="input_box"/>
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
						<input type="number"  name="margin_top" id="margin_top" class="input_box"/>
						<select name="margin_top_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Margin Bottom : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_bottom" id="margin_bottom" class="input_box"/>
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
						<input type="number"  name="margin_right" id="margin_right" class="input_box"/>
						<select name="margin_right_in" class="input_box">
							<option value="px">px</option>
						</select>
					</div>
				
					<div class="col-sm-2">
						<label>Margin Left : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="margin_left" id="margin_left" class="input_box"/>
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
						<input type="text"  name="txt_color" id="txt_color" class="input_box" placeholder="Ex. rgb or hsl or color name"/>
					</div>
				
					<div class="col-sm-2">
						<label>Font Family : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="font_family" id="font_family" class="input_box" placeholder="sans-serif or arial"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label>Font Size : </label>
					</div>
					<div class="col-sm-4">
						<input type="number"  name="font_size" id="font_size" class="input_box"/>
						<select name="font_size_in" class="input_box">
							<option value="px">px</option>
							<option value="em">em</option>
							<option value="%">%</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Font Weight : </label>
					</div>
					<div class="col-sm-4">
						<input type="text"  name="font_weight" id="font_weight" class="input_box" placeholder="Ex. bold,700,400"/> 
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-2">
						<label>Text Align : </label>
					</div>
					<div class="col-sm-4">
						<select name="txt_align" class="form-control-select">
							<option value="left">left</option>
							<option value="right">right</option>
							<option value="center">center</option>
							<option value="justify">justify</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label>Width : </label>
					</div>
					<div class="col-sm-4">
					<input type="number"  name="alert_width" id="alert_width" class="input_box" placeholder="Ex. 100px,20%"/> <select name="alert_width_in" class="input_box">
							<option value="px">px</option>
							<option value="%">%</option>
						</select>
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-2">
						<label>Height : </label>
					</div>
					<div class="col-sm-10">
						<input type="number"  name="alert_height" id="alert_height" class="input_box" placeholder="Ex. 100px,20%"/>
						<select name="alert_height_in" class="input_box">
							<option value="px">px</option>
							<option value="%">%</option>
						</select>
					</div>	
				</div>
				<div class="row">
					<div class="col-sm-12">
						<input type="checkbox" name="close_check" id="close_check" onclick="cam_close_check();"/>Check to enable <b>alert dismiss or close property </b> with some usefull settings.
					</div>
				</div>
				<div id="close_settings_div" style="display:none;">	
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
								<option value="right">right</option>
								<option value="left">left</option>
								<option value="none">none</option>
								<option value="initial">initial</option>
								<option value="inherit">inherit</option>
							</select>
						</div>
						<div class="col-sm-1"><lable>Font Size : </lable></div>
						<div class="col-sm-4">
							<input type="number"  name="close_font_size" id="close_font_size" class="input_box"/>
							<select name="close_font_size_in" id="close_font_size_in" class="input_box">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="%">%</option>
							</select>
						</div>
						<div class="col-sm-1">
						<label>Font Weight : </label>
						</div>
						<div class="col-sm-3">
							<input type="text"  name="close_font_weight" id="close_font_weight" class="input_box" placeholder="Ex. bold,400,700,lighter"/> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1"> Color :</div>
						<div class="col-sm-2">
							<input type="text"  name="close_color" style="width:90%;" id="close_color" class="input_box" placeholder="Ex. rgb or hsl or name"/>
						</div>
						<div class="col-sm-1"> Opacity :</div>
						<div class="col-sm-3">
							<input type="text"  name="close_opacity" id="close_opacity" class="input_box" placeholder="Ex. 0.1 or 0.2 or 0.3"/>
						</div>
					</div>
				</div>	
				<div class="row">
				  <div class="col-sm-12" style="text-align:center;">
					<input type="submit" class="button button-primary button-large" name="Submit" value="Save Category Settings">
				  </div>
				</div>			
			</div>			
			
        </form>
    </div>
<?php } ?>

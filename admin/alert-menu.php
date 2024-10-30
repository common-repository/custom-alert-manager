<?php
defined('ABSPATH') or die("restricted access");
function add_Alert_options()  
{  
	$authorized_level = 'administrator';
    add_menu_page('Custom Alert Manager', 'Custom Alert Manager', $authorized_level, 'cam-category-list','','dashicons-flag');  
    add_submenu_page('cam-category-list', 'Categories','Categories',$authorized_level, 'cam-category-list','cam_alert_category'); 
	add_submenu_page('cam-category-list', 'All Alerts','All Alerts',$authorized_level, 'alert-list','cam_alert_main'); 
	add_submenu_page('cam-category-list', 'Add New','Add New',$authorized_level, 'alert-insert','cam_insert_data');
	
}
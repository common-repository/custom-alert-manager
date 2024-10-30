<?php
defined('ABSPATH') or die("restricted access");
  if ( isset( $_GET['cam_in_msg'] ) && $_GET['cam_in_msg'] == 'suc' )
  {
	  echo "<div id='message' class='updated notice notice-success'><p>New Alert has been created</p></div>";
  }
  if ( isset( $_GET['cam_ed_msg'] ) && $_GET['cam_ed_msg'] == 'suc' )
  {
	  echo "<div id='message' class='updated notice notice-success'><p>Alert has been updated</p></div>";
  }
  if ( isset( $_GET['cam_dl_msg'] ) && $_GET['cam_dl_msg'] == 'suc' )
  {
	  echo "<div id='message' class='updated notice notice-success'><p>Alert has been deleted</p></div>";
  }
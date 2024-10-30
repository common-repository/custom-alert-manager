function cam_cat_insert_form_valid_check()
{
	if(document.getElementById('cat_name').value.trim()=="")
	{
		document.getElementById('cat_name').style.border="1px solid #dc8a8a";
		return false;
	}
}
function cam_close_check()
{
	if(document.getElementById('close_check').checked==true)
	{
		document.getElementById('close_settings_div').style.display="block";
		
	}
	else
	{
		document.getElementById('close_settings_div').style.display="none";
		document.getElementById('close_float').value="";
		document.getElementById('close_font_size').value="";
		document.getElementById('close_font_size_in').value="";
		document.getElementById('close_font_weight').value="";
		document.getElementById('close_color').value="";
		document.getElementById('close_opacity').value="";
		// document.getElementById('marquee_check').value=0;
		// document.getElementById("direction").selectedIndex = 0;
		
	}
}


function cam_how_many_cat()
{
	var checkedValue = ""; 
	var inputElements = document.getElementsByClassName('delete_check_class');
	for(var i=0; inputElements[i]; ++i)
	{
      	if(inputElements[i].checked)
      	{
           checkedValue += inputElements[i].value +",";
      	}
	}
	document.getElementById('category_id').value=checkedValue;
	document.getElementById("delete_cat_form").submit();
}
function cam_all_check_top_cat()
{
	if(document.getElementById('root_checkbox_id_top').checked==true)
	{
		document.getElementById('root_checkbox_id_bottom').checked=true;
		var inputElements = document.getElementsByClassName('delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
		}
	}
	else
	{
		document.getElementById('root_checkbox_id_bottom').checked=false;
		var inputElements = document.getElementsByClassName('delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=false;
		}
	}
}
function cam_all_check_bottom_cat()
{
	if(document.getElementById('root_checkbox_id_bottom').checked==true)
	{
		document.getElementById('root_checkbox_id_top').checked=true;
		var inputElements = document.getElementsByClassName('delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
		}
	}
	else
	{
		document.getElementById('root_checkbox_id_top').checked=false;
		var inputElements = document.getElementsByClassName('delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=false;
		}
	}
}
function cam_each_check_cat(which_id)
{
	var inputElements = document.getElementsByClassName('delete_check_class');
	if(document.getElementById('root_checkbox_id_top').checked==true || document.getElementById('root_checkbox_id_bottom').checked==true)
	{
		document.getElementById('root_checkbox_id_top').checked=false;
		document.getElementById('root_checkbox_id_bottom').checked=false;
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
			if(inputElements[i].value==which_id)
			{
				inputElements[i].checked=false;
			}		
		}
	}
}
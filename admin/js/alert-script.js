function cam_insert_form_valid_check()
{
	if(document.getElementById('title').value.trim()=="")
	{
		document.getElementById('title').style.border="1px solid #dc8a8a";
		return false;
	}
	if(document.getElementById('content').value.trim()=="")
	{
		document.getElementById('content').style.border="1px solid #dc8a8a";
		return false;
	}
}

function cam_how_many()
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
	document.getElementById('alert_id').value=checkedValue;
	document.getElementById("deleteForm").submit();
}
function cam_all_check_top()
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
function cam_all_check_bottom()
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
function cam_each_check(which_id)
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

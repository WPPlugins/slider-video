<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script>
	function Rich_Web_VSlider_Add_Option()
	{
		alert("This is free version. For more adventures click to buy Pro version.");
	}
  	function Rich_Web_VSlider_Can_Option()
  	{
		location.reload();
	}
	function Rich_Web_VSlider_Edit_Option(rich_web_Slider_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'rich_web_VS_Edit_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: rich_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {

			var arr=Array();
			var arr_name=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++)
			{ arr[arr.length]=spl[i].split('[')[0].trim(); }
			for(var i=3;i<spl.length;i++)
			{ arr_name[arr_name.length]=spl[i].split('[')[1]; }

			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
			jQuery('#Rich_Web_VSlider_Upd_ID').val(arr[0]);
			jQuery('#Rich_Web_VSlider_Option_Name').val(arr[1]);
			jQuery('#Rich_Web_VSlider_Option_Type').val(arr[2]);
			jQuery('#Rich_Web_VSlider_Option_Type').hide();
			jQuery('.Rich_Web_VSlider_Save_Table_2').hide();
			function RW_Options() {
				for( i=2;i<=arr_name.length-2;i++ ) {
					var res_array=arr_name[i].split(']');
					var c=res_array[0];
					if( arr[i+1] == 'on' ) {
						jQuery('#'+c+'').attr('checked',true);
					} else if( arr[i+1] == '' ) {
						jQuery('#'+c+'').attr('checked',false);
					} else {
						if(i == arr_name.length-2 && jQuery('#'+c+'').hasClass('alpha-color-picker') && arr[i+1].length!=7){
							jQuery('#'+c+'').val(arr[i+1]+')');
						} else {
							jQuery('#'+c+'').val(arr[i+1]);
						}
					}
				}
				if(arr[2]=='Content Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_1').show(); 
				} else if(arr[2]=='Slick Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_2').show(); 
				} else if(arr[2]=='Thumbnails Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_3').show(); 
				} else if(arr[2]=='Video Carousel/Content Popup'){
					jQuery('#Rich_Web_VSlider_Save_Table_2_4').show(); 
				} else if(arr[2]=='Simple Video Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_5').show(); 
				} else if(arr[2]=='Video Slider/Vertical Thumbnails'){
					jQuery('#Rich_Web_VSlider_Save_Table_2_6').show(); 
				} else if(arr[2]=='Horizontal Posts Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_7').show(); 
				} else if(arr[2]=='Rich Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_8').show(); 
				} else if(arr[2]=='TimeLine Slider'){ 
					jQuery('#Rich_Web_VSlider_Save_Table_2_9').show(); 
				}
			}
			RW_Options();
			rangeSlider();
			jQuery('.alpha-color-picker').alphaColorPicker();
			jQuery('.wp-color-result').attr('title','Select');
			jQuery('.wp-color-result').attr('data-current','Selected');
		})
		setTimeout(function(){
			jQuery('.Rich_Web_VSlider_Opt_Table_Data').css('display','none');
			jQuery('.Rich_Web_VSlider_Add_Opt').addClass('Rich_Web_VSlider_Add_OptAnim');
			jQuery('.Rich_Web_VSlider_Opt_Table_Data_2').css('display','block');
			jQuery('.Rich_Web_VSlider_Upd_Opt').addClass('Rich_Web_VSlider_Sav_OptAnim');
			jQuery('.Rich_Web_VSlider_Can_Opt').addClass('Rich_Web_VSlider_Can_OptAnim');
			
		},500)		
	}
	function Rich_Web_VSlider_Del_Option(rich_web_Slider_ID)
	{
		alert("This is free version. For more adventures click to buy Pro version.");
	}
	function Rich_Web_VSlider_Copy_Option(rich_web_Slider_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
			action: 'rich_web_VS_Copy_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: rich_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		})
	}
	var rangeSlider = function()
	{  
		var slider = jQuery('.range-slider'), range = jQuery('.range-slider__range'), value = jQuery('.range-slider__value');     
		slider.each(function()
		{   
			value.each(function()
			{   
				var value = jQuery(this).prev().attr('value');
			    jQuery(this).html(value);
			});    
			range.on('input', function()
			{      
				jQuery(this).next(value).html(this.value);
			});  
		});
	};
	rangeSlider();
	function Rich_Web_VSlider_Option_Changed()
	{
		var Rich_Web_VSlider_Type=jQuery('#Rich_Web_VSlider_Option_Type').val();
		jQuery('.Rich_Web_VSlider_Save_Table_2').hide();
		if(Rich_Web_VSlider_Type=='Content Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_1').show();
		}
		else if(Rich_Web_VSlider_Type=='Slick Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_2').show();
		}
		else if(Rich_Web_VSlider_Type=='Thumbnails Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_3').show();
		}
		else if(Rich_Web_VSlider_Type=='Video Carousel/Content Popup')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_4').show();
		}
		else if(Rich_Web_VSlider_Type=='Simple Video Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_5').show();
		}
		else if(Rich_Web_VSlider_Type=='Video Slider/Vertical Thumbnails')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_6').show();
		}
		else if(Rich_Web_VSlider_Type=='Horizontal Posts Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_7').show();
		}
		else if(Rich_Web_VSlider_Type=='Rich Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_8').show();
		}
		else if(Rich_Web_VSlider_Type=='TimeLine Slider')
		{
			jQuery('#Rich_Web_VSlider_Save_Table_2_9').show();
		}
	}
	
</script>
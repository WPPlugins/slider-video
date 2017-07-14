<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	
	global $wpdb;
	$table_name   = $wpdb->prefix . "rich_web_video_slider_font_family";
	$table_name1  = $wpdb->prefix . "rich_web_video_slider_id";
	$table_name2  = $wpdb->prefix . "rich_web_video_slider_manager";
	$table_name3  = $wpdb->prefix . "rich_web_video_slider_videos";
	$table_name4  = $wpdb->prefix . "rich_web_video_slider_effects_data";
	$table_name5  = $wpdb->prefix . "rich_web_vs_effect_1";
	$table_name6  = $wpdb->prefix . "rich_web_vs_effect_2";
	$table_name7  = $wpdb->prefix . "rich_web_vs_effect_3";
	$table_name8  = $wpdb->prefix . "rich_web_vs_effect_4";
	$table_name9  = $wpdb->prefix . "rich_web_vs_effect_5";
	$table_name10 = $wpdb->prefix . "rich_web_vs_effect_6";
	$table_name11 = $wpdb->prefix . "rich_web_vs_effect_7";
	$table_name12 = $wpdb->prefix . "rich_web_vs_effect_8";
	$table_name13 = $wpdb->prefix . "rich_web_vs_effect_9";
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'Rich_Web_VSlider_Nonce' ))
		{
			$Rich_Web_VSlider_Option_Name=sanitize_text_field($_POST['Rich_Web_VSlider_Option_Name']); $Rich_Web_VSlider_Option_Type=sanitize_text_field($_POST['Rich_Web_VSlider_Option_Type']);
			//Content Slider
			$Rich_Web_VS_SL_Width=sanitize_text_field($_POST['Rich_Web_VS_SL_Width']); $Rich_Web_VS_SL_Height=sanitize_text_field($_POST['Rich_Web_VS_SL_Height']); $Rich_Web_VS_CS_HP=sanitize_text_field($_POST['Rich_Web_VS_CS_HP']); $Rich_Web_VS_CS_RS=sanitize_text_field($_POST['Rich_Web_VS_CS_RS']); $Rich_Web_VS_CP_BR=sanitize_text_field($_POST['Rich_Web_VS_CP_BR']); 		
			//Slick Slider
			$Rich_Web_VS_SS_W=sanitize_text_field($_POST['Rich_Web_VS_SS_W']); $Rich_Web_VS_SS_H=sanitize_text_field($_POST['Rich_Web_VS_SS_H']); $Rich_Web_VS_SS_BW=sanitize_text_field($_POST['Rich_Web_VS_SS_BW']); $Rich_Web_VS_SS_BS=sanitize_text_field($_POST['Rich_Web_VS_SS_BS']); $Rich_Web_VS_SS_BC=sanitize_text_field($_POST['Rich_Web_VS_SS_BC']); 
			//Thumbnails Slider
			$Rich_Web_VS_TS_W=sanitize_text_field($_POST['Rich_Web_VS_TS_W']); $Rich_Web_VS_TS_H=sanitize_text_field($_POST['Rich_Web_VS_TS_H']); $Rich_Web_VS_TS_BW=sanitize_text_field($_POST['Rich_Web_VS_TS_BW']); $Rich_Web_VS_TS_BS=sanitize_text_field($_POST['Rich_Web_VS_TS_BS']); $Rich_Web_VS_TS_BC=sanitize_text_field($_POST['Rich_Web_VS_TS_BC']); $Rich_Web_VS_TS_BoxShShow=sanitize_text_field($_POST['Rich_Web_VS_TS_BoxShShow']); 
			//Video Carousel/Content Popup
			$Rich_Web_VC_Car_Border_Width=sanitize_text_field($_POST['Rich_Web_VC_Car_Border_Width']); $Rich_Web_VC_Car_Border_Style=sanitize_text_field($_POST['Rich_Web_VC_Car_Border_Style']); $Rich_Web_VC_Car_Border_Color=sanitize_text_field($_POST['Rich_Web_VC_Car_Border_Color']); $Rich_Web_VC_Car_PBImgs=sanitize_text_field($_POST['Rich_Web_VC_Car_PBImgs']); $Rich_Web_VC_Car_Bg_Color=sanitize_text_field($_POST['Rich_Web_VC_Car_Bg_Color']); $Rich_Web_VC_Car_Box_Shadow=sanitize_text_field($_POST['Rich_Web_VC_Car_Box_Shadow']); $Rich_Web_VC_Car_Shadow_Color=sanitize_text_field($_POST['Rich_Web_VC_Car_Shadow_Color']); 	
			//Simple Video Slider
			$Rich_Web_SVS_W=sanitize_text_field($_POST['Rich_Web_SVS_W']); $Rich_Web_SVS_BW=sanitize_text_field($_POST['Rich_Web_SVS_BW']); $Rich_Web_SVS_BS=sanitize_text_field($_POST['Rich_Web_SVS_BS']); $Rich_Web_SVS_BC=sanitize_text_field($_POST['Rich_Web_SVS_BC']); $Rich_Web_SVS_BoxShShow=sanitize_text_field($_POST['Rich_Web_SVS_BoxShShow']); $Rich_Web_SVS_Nav_Show=sanitize_text_field($_POST['Rich_Web_SVS_Nav_Show']); 
			//Video Slider/Vertical Thumbnails
			$Rich_Web_VTVS_H=sanitize_text_field($_POST['Rich_Web_VTVS_H']); $Rich_Web_VTVS_BW=sanitize_text_field($_POST['Rich_Web_VTVS_BW']); $Rich_Web_VTVS_BS=sanitize_text_field($_POST['Rich_Web_VTVS_BS']); $Rich_Web_VTVS_BC=sanitize_text_field($_POST['Rich_Web_VTVS_BC']); $Rich_Web_VTVS_BoxShShow=sanitize_text_field($_POST['Rich_Web_VTVS_BoxShShow']); $Rich_Web_VTVS_BoxShType=sanitize_text_field($_POST['Rich_Web_VTVS_BoxShType']); $Rich_Web_VTVS_BoxSh=sanitize_text_field($_POST['Rich_Web_VTVS_BoxSh']); $Rich_Web_VTVS_BoxShC=sanitize_text_field($_POST['Rich_Web_VTVS_BoxShC']); 
			//Horizontal Posts Slider
			$Rich_Web_VS_HPS_Speed=sanitize_text_field($_POST['Rich_Web_VS_HPS_Speed']); $Rich_Web_VS_HPS_PB=sanitize_text_field($_POST['Rich_Web_VS_HPS_PB']); $Rich_Web_VS_HPS_NP_Show=sanitize_text_field($_POST['Rich_Web_VS_HPS_NP_Show']); $Rich_Web_VS_HPS_NP_NText=sanitize_text_field($_POST['Rich_Web_VS_HPS_NP_NText']); $Rich_Web_VS_HPS_NP_PText=sanitize_text_field($_POST['Rich_Web_VS_HPS_NP_PText']); $Rich_Web_VS_HPS_NP_BR=sanitize_text_field($_POST['Rich_Web_VS_HPS_NP_BR']); 
			//Rich Slider
			$Rich_Web_RVVS_Sh=sanitize_text_field($_POST['Rich_Web_RVVS_Sh']); $Rich_Web_RVVS_ShT=sanitize_text_field($_POST['Rich_Web_RVVS_ShT']); $Rich_Web_RVVS_ShC=sanitize_text_field($_POST['Rich_Web_RVVS_ShC']); $Rich_Web_RVVS_NI_BW=sanitize_text_field($_POST['Rich_Web_RVVS_NI_BW']); $Rich_Web_RVVS_NI_BC=sanitize_text_field($_POST['Rich_Web_RVVS_NI_BC']); $Rich_Web_RVVS_NI_HBC=sanitize_text_field($_POST['Rich_Web_RVVS_NI_HBC']); $Rich_Web_RVVS_NI_CBC=sanitize_text_field($_POST['Rich_Web_RVVS_NI_CBC']);
			//Timeline
			$Rich_Web_MS_W=sanitize_text_field($_POST['Rich_Web_MS_W']); $Rich_Web_MS_SSh=sanitize_text_field($_POST['Rich_Web_MS_SSh']); $Rich_Web_MS_SShChT=sanitize_text_field($_POST['Rich_Web_MS_SShChT']); $Rich_Web_MS_Type=sanitize_text_field($_POST['Rich_Web_MS_Type']); 
			if(isset($_POST['Rich_Web_VSlider_Upd_Opt']))
			{
				$Rich_Web_VSlider_Upd_ID=sanitize_text_field($_POST['Rich_Web_VSlider_Upd_ID']);		
				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set slider_vid_name=%s, slider_Vid_type=%s WHERE id=%d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VSlider_Upd_ID));
				
				if($Rich_Web_VSlider_Option_Type=='Content Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name5 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VS_SL_Width = %s, Rich_Web_VS_SL_Height = %s, Rich_Web_VS_CS_HP = %s, Rich_Web_VS_CS_RS = %s, Rich_Web_VS_CP_BR = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VS_SL_Width, $Rich_Web_VS_SL_Height, $Rich_Web_VS_CS_HP, $Rich_Web_VS_CS_RS, $Rich_Web_VS_CP_BR, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Slick Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VS_SS_W = %s, Rich_Web_VS_SS_H = %s, Rich_Web_VS_SS_BW = %s, Rich_Web_VS_SS_BS = %s, Rich_Web_VS_SS_BC = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VS_SS_W, $Rich_Web_VS_SS_H, $Rich_Web_VS_SS_BW, $Rich_Web_VS_SS_BS, $Rich_Web_VS_SS_BC, $Rich_Web_VSlider_Upd_ID));
				}	
				else if($Rich_Web_VSlider_Option_Type=='Thumbnails Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name7 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VS_TS_W = %s, Rich_Web_VS_TS_H = %s, Rich_Web_VS_TS_BW = %s, Rich_Web_VS_TS_BS = %s, Rich_Web_VS_TS_BC = %s, Rich_Web_VS_TS_BoxShShow = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VS_TS_W, $Rich_Web_VS_TS_H, $Rich_Web_VS_TS_BW, $Rich_Web_VS_TS_BS, $Rich_Web_VS_TS_BC, $Rich_Web_VS_TS_BoxShShow, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Video Carousel/Content Popup')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VC_Car_Bg_Color = %s, Rich_Web_VC_Car_Border_Width = %s, Rich_Web_VC_Car_Border_Style = %s, Rich_Web_VC_Car_Border_Color = %s, Rich_Web_VC_Car_Box_Shadow = %s, Rich_Web_VC_Car_Shadow_Color = %s, Rich_Web_VC_Car_PBImgs = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VC_Car_Bg_Color, $Rich_Web_VC_Car_Border_Width, $Rich_Web_VC_Car_Border_Style, $Rich_Web_VC_Car_Border_Color, $Rich_Web_VC_Car_Box_Shadow, $Rich_Web_VC_Car_Shadow_Color, $Rich_Web_VC_Car_PBImgs, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Simple Video Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name9 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_SVS_W = %s, Rich_Web_SVS_BoxShShow = %s, Rich_Web_SVS_Nav_Show = %s, Rich_Web_SVS_BW = %s, Rich_Web_SVS_BS = %s, Rich_Web_SVS_BC = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_SVS_W, $Rich_Web_SVS_BoxShShow, $Rich_Web_SVS_Nav_Show, $Rich_Web_SVS_BW, $Rich_Web_SVS_BS, $Rich_Web_SVS_BC, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Video Slider/Vertical Thumbnails')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name10 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VTVS_BW = %s, Rich_Web_VTVS_BS = %s, Rich_Web_VTVS_BC = %s, Rich_Web_VTVS_BoxShShow = %s, Rich_Web_VTVS_BoxShType = %s, Rich_Web_VTVS_BoxSh = %s, Rich_Web_VTVS_BoxShC = %s, Rich_Web_VTVS_H = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VTVS_BW, $Rich_Web_VTVS_BS, $Rich_Web_VTVS_BC, $Rich_Web_VTVS_BoxShShow, $Rich_Web_VTVS_BoxShType, $Rich_Web_VTVS_BoxSh, $Rich_Web_VTVS_BoxShC, $Rich_Web_VTVS_H, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Horizontal Posts Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name11 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_VS_HPS_Speed = %s, Rich_Web_VS_HPS_PB = %s, Rich_Web_VS_HPS_NP_Show = %s, Rich_Web_VS_HPS_NP_NText = %s, Rich_Web_VS_HPS_NP_PText = %s, Rich_Web_VS_HPS_NP_BR = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_VS_HPS_Speed, $Rich_Web_VS_HPS_PB, $Rich_Web_VS_HPS_NP_Show, $Rich_Web_VS_HPS_NP_NText, $Rich_Web_VS_HPS_NP_PText, $Rich_Web_VS_HPS_NP_BR, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='Rich Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name12 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_RVVS_Sh = %s, Rich_Web_RVVS_ShT = %s, Rich_Web_RVVS_ShC = %s, Rich_Web_RVVS_NI_BW = %s, Rich_Web_RVVS_NI_BC = %s, Rich_Web_RVVS_NI_HBC = %s, Rich_Web_RVVS_NI_CBC = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_RVVS_Sh, $Rich_Web_RVVS_ShT, $Rich_Web_RVVS_ShC, $Rich_Web_RVVS_NI_BW, $Rich_Web_RVVS_NI_BC, $Rich_Web_RVVS_NI_HBC, $Rich_Web_RVVS_NI_CBC, $Rich_Web_VSlider_Upd_ID));
				}
				else if($Rich_Web_VSlider_Option_Type=='TimeLine Slider')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name13 set Rich_Web_VSlider_Option_Name = %s, Rich_Web_VSlider_Option_Type = %s, Rich_Web_MS_W = %s, Rich_Web_MS_SSh = %s, Rich_Web_MS_SShChT = %s, Rich_Web_MS_Type = %s WHERE RW_VS_ID = %d", $Rich_Web_VSlider_Option_Name, $Rich_Web_VSlider_Option_Type, $Rich_Web_MS_W, $Rich_Web_MS_SSh, $Rich_Web_MS_SShChT, $Rich_Web_MS_Type, $Rich_Web_VSlider_Upd_ID));
				}
			}
		}
		else
	    {
	        wp_die('Security check fail'); 
	    }	
	}
	$Rich_WebSliderCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));					
	$Rich_Web_VSlider_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
?>
<form method="POST">
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'Rich_Web_VSlider_Nonce' );?>
	<?php require_once( 'Rich-Web-Video-Slider-Header.php' ); ?>
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type='button' class='Rich_Web_VSlider_Add_Opt' value='Add Option (Pro)' onclick='Rich_Web_VSlider_Add_Option()' />
		<input type='submit' class='Rich_Web_VSlider_Upd_Opt' value='Update'     name='Rich_Web_VSlider_Upd_Opt' />
		<input type='button' class='Rich_Web_VSlider_Can_Opt' value='Cancel'     onclick='Rich_Web_VSlider_Can_Option()' />
		<input type='text'   id="Rich_Web_VSlider_Upd_ID"  style='display:none'  name='Rich_Web_VSlider_Upd_ID'>		
	</div>
	<div class="Rich_Web_SliderVd_Fixed_Div"></div>
	<div class="Rich_Web_SliderVd_Absolute_Div">
		<div class="Rich_Web_SliderVd_Relative_Div">
			<p> Are you sure you want to remove ? </p>				 
			<span class="Rich_Web_SliderVd_Relative_No">No</span>
			<span class="Rich_Web_SliderVd_Relative_Yes">Yes</span>
		</div>			
	</div>
	<div class='Rich_Web_VSlider_Opt_Content_Div_2' >
		<div class='Rich_Web_VSlider_Opt_Table_Data'>
			<table class='Rich_Web_VSlider_Opt_Table'>
				<tr class='Rich_Web_VSlider_Opt_Table_Tr'>
					<td>No</td>
					<td>Option Name</td>
					<td>Slider Type</td>
					<td>Actions</td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Opt_Table_2'>
				<?php for($i=0;$i<count($Rich_WebSliderCount);$i++){ ?>
					<tr class='Rich_Web_VSlider_Opt_Table_Tr2'>
						<td><?php echo $i+1;?></td>
						<td><?php echo $Rich_WebSliderCount[$i]->slider_vid_name;?></td>
						<td><?php echo $Rich_WebSliderCount[$i]->slider_Vid_type;?></td>
						<td onclick="Rich_Web_VSlider_Copy_Option(<?php echo $Rich_WebSliderCount[$i]->id;?>)"><i class='Rich_Web_VS_Files rich_web rich_web-files-o'></i></td>
						<td onclick="Rich_Web_VSlider_Edit_Option(<?php echo $Rich_WebSliderCount[$i]->id;?>)"><i class='Rich_Web_VS_Pencil rich_web rich_web-pencil'></i></td>
						<td onclick="Rich_Web_VSlider_Add_Option()"><i class='Rich_Web_VS_Delete rich_web rich_web-trash'></i></td>
					</tr>
				<?php }?>
			</table>
		</div>
		<div class='Rich_Web_VSlider_Opt_Table_Data_2'>
			<table class='Rich_Web_VSlider_Save_Table'>
				<tr>
					<td>Slider Name</td>
					<td>Slider Type</td>
				</tr>
				<tr>
					<td><input type="text" class="Rich_Web_VSlider_Text_Field" name="Rich_Web_VSlider_Option_Name" id="Rich_Web_VSlider_Option_Name" required placeholder="* Required"></td>
					<td>
						<select class="Rich_Web_VSlider_Text_Field" id="Rich_Web_VSlider_Option_Type" name="Rich_Web_VSlider_Option_Type" onchange="Rich_Web_VSlider_Option_Changed()">
							<option value="Content Slider">                   Content Slider                   </option>
							<option value="Slick Slider">                     Slick Slider                     </option>
							<option value="Thumbnails Slider">                Thumbnails Slider                </option>
							<option value="Video Carousel/Content Popup">     Video Carousel/Content Popup     </option>
							<option value="Simple Video Slider">              Simple Video Slider              </option>
							<option value="Video Slider/Vertical Thumbnails"> Video Slider/Vertical Thumbnails </option>
							<option value="Horizontal Posts Slider">          Horizontal Posts Slider          </option>
							<option value="Rich Slider">                      Rich Slider                      </option>
							<option value="TimeLine Slider">                  TimeLine Slider                  </option>
						</select>
					</td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_1">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Changing Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Easing Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Strips <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Block Cols <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_CE" name="">
							<option value="random">                Random                </option>
							<option value="left-curtain">          Left Curtain          </option>
							<option value="right-curtain">         Right Curtain         </option>
							<option value="top-curtain">           Top Curtain           </option>
							<option value="bottom-curtain">        Bottom Curtain        </option>
							<option value="strip-down-right">      Strip Down Right      </option>
							<option value="strip-down-left">       Strip Down Left       </option>
							<option value="strip-up-right">        Strip Up Right        </option>
							<option value="strip-up-left">         Strip Up Left         </option>
							<option value="strip-up-down">         Strip Up Down         </option>
							<option value="strip-up-down-left">    Strip Up Down Left    </option>
							<option value="strip-left-right">      Strip Left Right      </option>
							<option value="strip-left-right-down"> Strip Left Right Down </option>
							<option value="slide-in-right">        Slide in Right        </option>
							<option value="slide-in-left">         Slide in Left         </option>
							<option value="slide-in-up">           Slide in Up           </option>
							<option value="slide-in-down">         Slide in Down         </option>
							<option value="fade">                  Fade                  </option>
							<option value="block-random">          Block Random          </option>
							<option value="block-fade">            Block Fade            </option>
							<option value="block-fade-reverse">    Block Fade Reverse    </option>
							<option value="block-expand">          Block Expand          </option>
							<option value="block-expand-reverse">  Block Expand Reverse  </option>
							<option value="block-expand-random">   Block Expand Random   </option>
							<option value="zigzag-top">            Zigzag Top            </option>
							<option value="zigzag-bottom">         Zigzag Bottom         </option>
							<option value="zigzag-grow-top">       Zigzag Grow Top       </option>
							<option value="zigzag-grow-bottom">    Zigzag Grow Bottom    </option>
							<option value="zigzag-drop-top">       Zigzag Drop Top       </option>
							<option value="zigzag-drop-bottom">    Zigzag Drop Bottom    </option>
							<option value="strip-left-fade">       Strip Left Fade       </option>
							<option value="strip-right-fade">      Strip Right Fade      </option>
							<option value="strip-top-fade">        Strip Top Fade        </option>
							<option value="strip-bottom-fade">     Strip Bottom Fade     </option>
							<option value="block-drop-random">     Block Drop Random     </option>
						</select>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_EE" name="">
							<option value="swing">            Swing               </option>
							<option value="easeInQuad">       Ease In Quad        </option>
							<option value="easeOutQuad">      Ease Out Quad       </option>
							<option value="easeInOutQuad">    Ease In Out Quad    </option>
							<option value="easeInCubic">      Ease In Cubic       </option>
							<option value="easeOutCubic">     Ease Out Cubic      </option>
							<option value="easeInOutCubic">   Ease In Out Cubic   </option>
							<option value="easeInQuart">      Ease In Quart       </option>
							<option value="easeOutQuart">     Ease Out Quart      </option>
							<option value="easeInOutQuart">   Ease In Out Quart   </option>
							<option value="easeInQuint">      Ease In Quint       </option>
							<option value="easeOutQuint">     Ease Out Quint      </option>
							<option value="easeInOutQuint">   Ease In Out Quint   </option>
							<option value="easeInSine">       Ease In Sine        </option>
							<option value="easeOutSine">      Ease Out Sine       </option>
							<option value="easeInOutSine">    Ease In Out Sine    </option>
							<option value="easeInExpo">       Ease In Expo        </option>
							<option value="easeOutExpo">      Ease Out Expo       </option>
							<option value="easeInOutExpo">    Ease In Out Expo    </option>
							<option value="easeInCirc">       Ease In Circ        </option>
							<option value="easeOutCirc">      Ease Out Circ       </option>
							<option value="easeInOutCirc">    Ease In Out Circ    </option>
							<option value="easeInElastic">    Ease In Elastic     </option>
							<option value="easeOutElastic">   Ease Out Elastic    </option>
							<option value="easeInOutElastic"> Ease In Out Elastic </option>
							<option value="easeInBack">       Ease In Back        </option>
							<option value="easeOutBack">      Ease Out Back       </option>
							<option value="easeInOutBack">    Ease In Out Back    </option>
							<option value="easeInBounce">     Ease In Bounce      </option>
							<option value="easeOutBounce">    Ease Out Bounce     </option>
							<option value="easeInOutBounce">  Ease In Out Bounce  </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_S" name="" min="1" max="30">
							<span class="range-slider__value" id="Rich_Web_VS_CP_S_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_BlC" name="" min="1" max="30">
							<span class="range-slider__value" id="Rich_Web_VS_CP_BlC_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Block Rows <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Animation Speed (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Pause Time (s) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Start Slide <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_BlR" name="" min="1" max="30">
							<span class="range-slider__value" id="Rich_Web_VS_CP_BlR_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_AS" name="" min="100" max="1500" step='100'>
							<span class="range-slider__value" id="Rich_Web_VS_CP_AS_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_PT" name="" min="1" max="15" >
							<span class="range-slider__value" id="Rich_Web_VS_CP_PT_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_SS" name="" min="1" max="20" >
							<span class="range-slider__value" id="Rich_Web_VS_CP_SS_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>AutoPlay <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Pause On Hover</td>
					<td>Random Start</td>
					<td>Box Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_CS_AP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VS_CS_HP" id="Rich_Web_VS_CS_HP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VS_CS_RS" id="Rich_Web_VS_CS_RS" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_BSC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px)</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_BW" name="" min="0" max="15" >
							<span class="range-slider__value" id="Rich_Web_VS_CP_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_BR" name="Rich_Web_VS_CP_BR" min="0" max="20" >
							<span class="range-slider__value" id="Rich_Web_VS_CP_BR_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Title-Description Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SL_Width" name="Rich_Web_VS_SL_Width" min="200" max="1200" >
							<span class="range-slider__value" id="Rich_Web_VS_SL_Width_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SL_Height" name="Rich_Web_VS_SL_Height" min="200" max="1200" >
							<span class="range-slider__value" id="Rich_Web_VS_SL_Height_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TitDesc_Type" name="">
							<option value="type1" > Type 1 </option>
							<option value="type2" > Type 2 </option>
							<option value="type3" > Type 3 </option>
							<option value="type4" > Type 4 </option>
							<option value="type5" > Type 5 </option>
							<option value="type6" > Type 6 </option>
							<option value="type7" > Type 7 </option>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Navigation</td>
				</tr>
				<tr>
					<td>Control Navigation <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Next Prev Button <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Opacity (%) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Navigation Thumbs <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_CS_CN" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_CS_NPB" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_NO" name="" min="0" max="100" >
							<span class="range-slider__value" id="Rich_Web_VS_CP_NO_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_CS_NT" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Navigation Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Arrows Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_NT" name="">
							<option value="1" > Type 1 </option>
							<option value="2" > Type 2 </option>
						</select>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_AT" name="">
							<option value="1" > Type 1 </option>
							<option value="2" > Type 2 </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Caption Options</td>
				</tr>
				<tr>
					<td>Caption Speed (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Caption Easing <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Opacity (%) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_CapS" name="" min="100" max="1000" step="100">
							<span class="range-slider__value" id="Rich_Web_VS_CP_CapS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_CapEs" name="">
							<option value="swing">            Swing               </option>
							<option value="easeInQuad">       Ease In Quad        </option>
							<option value="easeOutQuad">      Ease Out Quad       </option>
							<option value="easeInOutQuad">    Ease In Out Quad    </option>
							<option value="easeInCubic">      Ease In Cubic       </option>
							<option value="easeOutCubic">     Ease Out Cubic      </option>
							<option value="easeInOutCubic">   Ease In Out Cubic   </option>
							<option value="easeInQuart">      Ease In Quart       </option>
							<option value="easeOutQuart">     Ease Out Quart      </option>
							<option value="easeInOutQuart">   Ease In Out Quart   </option>
							<option value="easeInQuint">      Ease In Quint       </option>
							<option value="easeOutQuint">     Ease Out Quint      </option>
							<option value="easeInOutQuint">   Ease In Out Quint   </option>
							<option value="easeInSine">       Ease In Sine        </option>
							<option value="easeOutSine">      Ease Out Sine       </option>
							<option value="easeInOutSine">    Ease In Out Sine    </option>
							<option value="easeInExpo">       Ease In Expo        </option>
							<option value="easeOutExpo">      Ease Out Expo       </option>
							<option value="easeInOutExpo">    Ease In Out Expo    </option>
							<option value="easeInCirc">       Ease In Circ        </option>
							<option value="easeOutCirc">      Ease Out Circ       </option>
							<option value="easeInOutCirc">    Ease In Out Circ    </option>
							<option value="easeInElastic">    Ease In Elastic     </option>
							<option value="easeOutElastic">   Ease Out Elastic    </option>
							<option value="easeInOutElastic"> Ease In Out Elastic </option>
							<option value="easeInBack">       Ease In Back        </option>
							<option value="easeOutBack">      Ease Out Back       </option>
							<option value="easeInOutBack">    Ease In Out Back    </option>
							<option value="easeInBounce">     Ease In Bounce      </option>
							<option value="easeOutBounce">    Ease Out Bounce     </option>
							<option value="easeInOutBounce">  Ease In Out Bounce  </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_CapO" name="" min="0" max="100">
							<span class="range-slider__value" id="Rich_Web_VS_CP_CapO_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_CapE" name="">
							<option value="wipedown">    Wipe Down    </option>
							<option value="wipeup">      Wipe Up      </option>
							<option value="wiperight">   Wipe Right   </option>
							<option value="wipeleft">    Wipe Left    </option>
							<option value="fade">        Fade         </option>
							<option value="expanddown">  Expand Down  </option>
							<option value="expandup">    Expand Up    </option>
							<option value="expandright"> Expand Right </option>
							<option value="expandleft">  Expand Left  </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_TFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_TBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_TC" value=""/>
					</td>
				</tr>
				<tr>
					<td colspan="4">Description Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_DFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_CP_DFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_DFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_DBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_DC" value=""/>
					</td>
				</tr>
				<tr>
					<td colspan="4">Timer Options</td>
				</tr>
				<tr>
					<td>Timer Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Opacity (%) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_TiT" name="">
							<option value="pie">    Pie     </option>
							<option value="bar">    Bar     </option>
							<option value="360bar"> 360 Bar </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_TiBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CS_TiC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TiO" name="" min="0" max="100">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TiO_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Diameter (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Padding (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Stroke (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Bar Stroke (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TiD" name="" min="10" max="40">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TiD_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TiP" name="" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TiP_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TiS" name="" min="1" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TiS_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_CP_TiBS" name="" min="1" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_CP_TiBS_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Bar Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Bar Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_CP_TiBC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_TiBSt" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_CP_TiPos" name="">
							<option value="top-left">      Top Left      </option>
							<option value="top-center">    Top Center    </option>
							<option value="top-right">     Top Right     </option>
							<option value="middle-left">   Middle Left   </option>
							<option value="middle-center"> Middle Center </option>
							<option value="middle-right">  Middle Right  </option>
							<option value="bottom-left">   Bottom Left   </option>
							<option value="bottom-center"> Bottom Center </option>
							<option value="bottom-right">  Bottom Right  </option>
						</select>
					</td>
					<td></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_2">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Effect Duration (s) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Pause Time (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Autoplay <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_ED" name="" min="1" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_SS_ED_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PT" name="" min="100" max="1000" step="100">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PT_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_SS_AP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_Eff" name="">
							<option value="zoomOut">  Zoom Out  </option>
							<option value="zoomIn">   Zoom In   </option>
							<option value="panUp">    Pan Up    </option>
							<option value="panDown">  Pan Down  </option>
							<option value="panLeft">  Pan Left  </option>
							<option value="panRight"> Pan Right </option>
							<option value="diagTopLeftToBottomRight"> Diag Top Left To Bottom Right </option>
							<option value="diagTopRightToBottomLeft"> Diag Top Right To Bottom Left </option>
							<option value="diagBottomRightToTopLeft"> Diag Bottom Right To Top Left </option>
							<option value="diagBottomLeftToTopRight"> Diag Bottom Left To Top Right </option>
							<option value="zoomOut,zoomIn,panUp,panDown,panLeft,panRight,diagTopLeftToBottomRight,diagTopRightToBottomLeft,diagBottomRightToTopLeft,diagBottomLeftToTopRight">  All  </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Border Width (px)</td>
					<td>Border Style</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_W" name="Rich_Web_VS_SS_W" min="150" max="1200">
							<span class="range-slider__value" id="Rich_Web_VS_SS_W_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_H" name="Rich_Web_VS_SS_H" min="150" max="1200">
							<span class="range-slider__value" id="Rich_Web_VS_SS_H_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_BW" name="Rich_Web_VS_SS_BW" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_SS_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_BS" name="Rich_Web_VS_SS_BS">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VS_SS_BC" id="Rich_Web_VS_SS_BC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_SS_TShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_TFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_SS_TFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_TFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_TC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_TBgC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_TPos" name="">
							<option value="top">    Top    </option>
							<option value="bottom"> Bottom </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_SS_NShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_NC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_NBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_NS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_SS_NS_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_NPos" name="">
							<option value="top">    Top    </option>
							<option value="bottom"> Bottom </option>
						</select>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Pagination Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Height (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Place Between (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_SS_PagShow"/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PagW" name="" min="1" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PagW_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PagH" name="" min="1" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PagH_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PagPB" name="" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PagPB_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PagBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PagBW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PagBW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_PagBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PagBC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Current Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_SS_PagBR" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_VS_SS_PagBR_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PagHC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PagCC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_SS_PagPos" name="">
							<option value="left">   Left   </option>
							<option value="right">  Right  </option>
							<option value="center"> Center </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PIBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PIC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PIHBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_PIHC" value=""/>
					</td>
				</tr>
				<tr>
					<td colspan="4">Close Icon Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_CIBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_CIC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_CIHBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_SS_CIHC" value=""/>
					</td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_3">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Border Width (px)</td>
					<td>Border Style</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_W" name="Rich_Web_VS_TS_W" min="150" max="1200">
							<span class="range-slider__value" id="Rich_Web_VS_TS_W_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_H" name="Rich_Web_VS_TS_H" min="150" max="1200">
							<span class="range-slider__value" id="Rich_Web_VS_TS_H_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_BW" name="Rich_Web_VS_TS_BW" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_TS_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_BS" name="Rich_Web_VS_TS_BS">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color</td>
					<td>Box Shadow</td>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VS_TS_BC" id="Rich_Web_VS_TS_BC" value=""/>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VS_TS_BoxShShow" id="Rich_Web_VS_TS_BoxShShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_TS_BoxShType" />
							<span class="switch-label" data-on="1" data-off="2"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_BoxSh" name="" min="0" max="30">
							<span class="range-slider__value" id="Rich_Web_VS_TS_BoxSh_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Change Speed (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Pause Time (s) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Auto Play <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_BoxShC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_CS" name="" min="100" max="1000" step="100">
							<span class="range-slider__value" id="Rich_Web_VS_TS_CS_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_PT" name="" min="1" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_TS_PT_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_TS_AP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td colspan="4">Icon Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_IBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_IBW" name="" min="0" max="3">
							<span class="range-slider__value" id="Rich_Web_VS_TS_IBW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_IBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_IBC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_IBR" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_VS_TS_IBR_1">0</span>
						</div>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Thumbnails Options</td>
				</tr>
				<tr>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_TPos" name="">
							<option value="top">    Top    </option>
							<option value="bottom"> Bottom </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TBW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TBW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_TBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TBC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Thumbnails Images Options</td>
				</tr>
				<tr>
					<td>Height (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Place Between Images (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TIH" name="" min="50" max="150">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TIH_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TIPB" name="" min="0" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TIPB_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TIBW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TIBW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_TIBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Box Shadow <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TIBC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TIBR" name="" min="0" max="150">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TIBR_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_TS_TIBoxShShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_TS_TIBoxShType" />
							<span class="switch-label" data-on="1" data-off="2"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_TS_TIBoxSh" name="" min="0" max="30">
							<span class="range-slider__value" id="Rich_Web_VS_TS_TIBoxSh_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TIBoxShC" value=""/>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Current Image</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TICBC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_TICBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TICBoxShC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Hover Image</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TIHBC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_TS_TIHBS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_TIHBoxShC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_PIBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_PIC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_PIHBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_TS_PIHC" value=""/>
					</td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_4">
				<tr>
					<td colspan="4">Carousel Options</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Border Width (px)</td>
					<td>Border Style</td>
					<td>Border Color</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VC_Car_Bg_Color" id="Rich_Web_VC_Car_Bg_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Car_Border_Width" name="Rich_Web_VC_Car_Border_Width" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VC_Car_Border_Width_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Car_Border_Style" name="Rich_Web_VC_Car_Border_Style">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VC_Car_Border_Color" id="Rich_Web_VC_Car_Border_Color" value=""/>
					</td>
				</tr>
				<tr>
					<td>Box Shadow (px)</td>
					<td>Shadow Color</td>
					<td>Count Images <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Images Hover Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Car_Box_Shadow" name="Rich_Web_VC_Car_Box_Shadow" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_VC_Car_Box_Shadow_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VC_Car_Shadow_Color" id="Rich_Web_VC_Car_Shadow_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Car_Count_Imgs" name="" min="2" max="8">
							<span class="range-slider__value" id="Rich_Web_VC_Car_Count_Imgs_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Car_Imgs_Hover_Type" name="">
							<option value="fImgH1"> Effect 1 </option>
							<option value="fImgH2"> Effect 2 </option>
							<option value="fImgH3"> Effect 3 </option>
							<option value="fImgH4"> Effect 4 </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Place Between Images (px)</td>
					<td>Icons Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Icons Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Car_PBImgs" name="Rich_Web_VC_Car_PBImgs" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VC_Car_PBImgs_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Car_Icons_Type" name="">
							<option value="1">  Type 1  </option>
							<option value="2">  Type 2  </option>
							<option value="3">  Type 3  </option>
							<option value="4">  Type 4  </option>
							<option value="5">  Type 5  </option>
							<option value="6">  Type 6  </option>
							<option value="7">  Type 7  </option>
							<option value="8">  Type 8  </option>
							<option value="9">  Type 9  </option>
							<option value="10"> Type 10 </option>
							<option value="11"> Type 11 </option>
							<option value="12"> Type 12 </option>
							<option value="13"> Type 13 </option>
							<option value="14"> Type 14 </option>
							<option value="15"> Type 15 </option>
							<option value="16"> Type 16 </option>
							<option value="17"> Type 17 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Car_Icons_Size" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_VC_Car_Icons_Size_1">0</span>
						</div>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td colspan='4'>Popup Options</td>
				</tr>
				<tr>
					<td>Overlay Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Overlay_Bg_Color" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Popup_Bg_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Popup_Border_Width" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_VC_Popup_Border_Width_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Popup_Border_Style" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Box Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Popup_Border_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Popup_Box_Shadow" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_VC_Popup_Box_Shadow_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Popup_Shadow_Color" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan='4'>Title Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Text Align <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Title_Font_Size" name="" min="10" max="36">
							<span class="range-slider__value" id="Rich_Web_VC_Title_Font_Size_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Title_Font_Family" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Title_Color" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Title_Text_Align" name="">
							<option value="left">    Left    </option>
							<option value="right">   Right   </option>
							<option value="center">  Center  </option>
							<option value="justify"> Justify </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan='4'>Description Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Desc_Bg_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Desc_Font_Size" name="" min="10" max="36">
							<span class="range-slider__value" id="Rich_Web_VC_Title_Font_Size_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Desc_Font_Family" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Desc_Color" value=""/>
					</td>
				</tr>
				<tr>
					<td>Text Align <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Desc_Text_Align" name="">
							<option value="left">    Left    </option>
							<option value="right">   Right   </option>
							<option value="center">  Center  </option>
							<option value="justify"> Justify </option>
						</select>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan='4'>Link Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Link_Font_Size" name="" min="10" max="36">
							<span class="range-slider__value" id="Rich_Web_VC_Link_Font_Size_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Link_Font_Family" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Color" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Bg_Color" value=""/>
					</td>
				</tr>
				<tr>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Border_Color" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Link_Border_Width" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VC_Link_Border_Width_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Link_Border_Style" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Hov_Bg_Color" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Text <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Hov_Color" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Link_Hov_Border_Color" value=""/>
					</td>
					<td>
						<input type="text" name="" id="Rich_Web_VC_Link_Text" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Link_Border_Radius" name="" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VC_Link_Border_Radius_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan='4'>Popup Close Icon Options</td>
				</tr>
				<tr>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VC_Popup_Icons_Size" name="" min="15" max="50">
							<span class="range-slider__value" id="Rich_Web_VC_Popup_Icons_Size_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VC_Popup_Icons_Color" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VC_Popup_Icons_Type" name="">
							<option value="rich_web-times"> Type 1 </option>
							<option value="rich_web-times-circle"> Type 2 </option>
							<option value="rich_web-times-circle-o"> Type 3 </option>
						</select>
					</td>
					<td></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_5">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Pause Time (s) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Change Speed (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px)</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_W" name="Rich_Web_SVS_W" min="300" max="1200">
							<span class="range-slider__value" id="Rich_Web_SVS_W_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_PT" name="" min="1" max="15">
							<span class="range-slider__value" id="Rich_Web_SVS_PT_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_CS" name="" min="100" max="1500" step="100">
							<span class="range-slider__value" id="Rich_Web_SVS_CS_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_BW" name="Rich_Web_SVS_BW" min="0" max="15">
							<span class="range-slider__value" id="Rich_Web_SVS_BW_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Style</td>
					<td>Border Color</td>
					<td>Box Shadow</td>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_BS" name="Rich_Web_SVS_BS">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_SVS_BC" id="Rich_Web_SVS_BC" value=""/>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_SVS_BoxShShow" id="Rich_Web_SVS_BoxShShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_SVS_BoxShType" />
							<span class="switch-label" data-on="1" data-off="2"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_BoxSh" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_SVS_BoxSh_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_BoxShC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_Eff" name="">
							<option value="slide"> Slide </option>
							<option value="fade">  Fade  </option>
						</select>						
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Show</td>
					<td>Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Height (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_SVS_Nav_Show" id="Rich_Web_SVS_Nav_Show" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Nav_W" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_SVS_Nav_W_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Nav_H" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_SVS_Nav_H_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Nav_BW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_SVS_Nav_BW_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Place Between (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_Nav_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Nav_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Nav_BR" name="" min="0" max="30">
							<span class="range-slider__value" id="Rich_Web_SVS_Nav_BR_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Nav_PB" name="" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_SVS_Nav_PB_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Current Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Nav_C" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Nav_CC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Nav_HC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_Nav_Pos" name="">
							<option value="top">    Top    </option>
							<option value="bottom"> Bottom </option>
						</select>
					</td>
				</tr>	
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_SVS_T_Show" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_TBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_TC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_TFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_SVS_TFS_1">0</span>
						</div>
					</td>
				</tr>	
				<tr>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_TFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Description Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_SVS_D_Show" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_DC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_DFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_SVS_DFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_DFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
				</tr>	
				<tr>
					<td colspan="4">Link Options</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_LC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_LFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_SVS_LFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_LFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_LHC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Text <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="" id="Rich_Web_SVS_LText" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Arrow Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>					
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_SVS_Arr_Show" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_Arr_Type" name="">
							<option value='angle-double'>   Type 1  </option>
							<option value='angle'>          Type 2  </option>
							<option value='arrow-circle'>   Type 3  </option>
							<option value='arrow-circle-o'> Type 4  </option>
							<option value='arrow'>          Type 5  </option>
							<option value='caret'>          Type 6  </option>
							<option value='caret-square-o'> Type 7  </option>
							<option value='chevron-circle'> Type 8  </option>
							<option value='chevron'>        Type 9  </option>
							<option value='hand-o'>         Type 10 </option>
							<option value='long-arrow'>     Type 11 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Arr_S" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_SVS_Arr_S_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Arr_C" value=""/>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>					
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Arr_BgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Arr_BW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_SVS_Arr_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_SVS_Arr_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_Arr_BC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_Arr_BR" name="" min="0" max="100">
							<span class="range-slider__value" id="Rich_Web_SVS_Arr_BR_1">0</span>
						</div>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>	
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_PIC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_PIBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_SVS_PIBR" name="" min="0" max="30">
							<span class="range-slider__value" id="Rich_Web_SVS_PIBR_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_PIHC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_SVS_PIHBgC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_6">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Auto Play <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Auto Play Steps <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Auto Play Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Change Speed (ms) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>					
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VTVS_AP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_APS" name="" min="1" max="5">
							<span class="range-slider__value" id="Rich_Web_VTVS_APS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_APEff" name="">
							<option value="random slideshow">      Random Slideshow      </option>
							<option value="fade slideshow">        Fade Slideshow        </option>
							<option value="swing slideshow">       Swing Slideshow       </option>
							<option value="flutter slideshow">     Flutter Slideshow     </option>
							<option value="collapse slideshow">    Collapse Slideshow    </option>
							<option value="expand slideshow">      Expand Slideshow      </option>
							<option value="stripe slideshow">      Stripe Slideshow      </option>
							<option value="twins slideshow">       Twins Slideshow       </option>
							<option value="parabola slideshow">    Parabola Slideshow    </option>
							<option value="rotate slideshow">      Rotate Slideshow      </option>
							<option value="zoom slideshow">        Zoom Slideshow        </option>
							<option value="float slideshow">       Float Slideshow       </option>
							<option value="fly slideshow">         Fly Slideshow         </option>
							<option value="dodge dance slideshow"> Dodge Dance Slideshow </option>
							<option value="dodge pet slideshow">   Dodge Pet Slideshow   </option>
							<option value="dodge slideshow">       Dodge Slideshow       </option>
							<option value="compound slideshow">    Compound Slideshow    </option>
							<option value="jump slideshow">        Jump Slideshow        </option>
							<option value="wave slideshow">        Wave Slideshow        </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_CS" name="" min="100" max="2000" step="100">
							<span class="range-slider__value" id="Rich_Web_VTVS_CS_1">0</span>
						</div>
					</td>
				</tr>
				<tr>					
					<td>Pause Time (s) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Arrows Steps <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>	
					<td>Height (px)</td>				
				</tr>
				<tr>					
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_PT" name="" min="1" max="20">
							<span class="range-slider__value" id="Rich_Web_VTVS_PT_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_ArrSt" name="" min="1" max="5">
							<span class="range-slider__value" id="Rich_Web_VTVS_ArrSt_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_BgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_H" name="Rich_Web_VTVS_H" min="200" max="800">
							<span class="range-slider__value" id="Rich_Web_VTVS_H_1">0</span>
						</div>
					</td>
				</tr>
				<tr>					
					<td>Border Width (px)</td>
					<td>Border Style</td>
					<td>Border Color</td>	
					<td>Box Shadow</td>				
				</tr>
				<tr>					
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_BW" name="Rich_Web_VTVS_BW" min="0" max="10">
							<span class="range-slider__value" id="Rich_Web_VTVS_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_BS" name="Rich_Web_VTVS_BS">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VTVS_BC" id="Rich_Web_VTVS_BC" value=""/>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VTVS_BoxShShow" id="Rich_Web_VTVS_BoxShShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>					
					<td>Shadow Type</td>
					<td>Shadow (px)</td>
					<td>Shadow Color</td>
					<td></td>
				</tr>
				<tr>					
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VTVS_BoxShType" id="Rich_Web_VTVS_BoxShType" />
							<span class="switch-label" data-on="1" data-off="2"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_BoxSh" name="Rich_Web_VTVS_BoxSh" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_VTVS_BoxSh_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_VTVS_BoxShC" id="Rich_Web_VTVS_BoxShC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VTVS_TShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_TFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VTVS_TFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_TFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_TC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_TBgC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_TPos" name="">
							<option value="top">    Top    </option>
							<option value="center"> Center </option>
							<option value="bottom"> Bottom </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Thumbnails Options</td>
				</tr>
				<tr>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_Th_BW" name="" min="0" max="3">
							<span class="range-slider__value" id="Rich_Web_VTVS_Th_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_Th_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_Th_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_Th_BR" name="" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_VTVS_Th_BR_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Hover/Current Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_Th_HBC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Link Icon Options</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_LC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_LBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_LFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VTVS_LFS_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_LHC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_LHBgC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_LPos" name="">
							<option value='top-left'>     Top-Left     </option>
							<option value='top-right'>    Top-Right    </option>
							<option value='bottom-left'>  Bottom-Left  </option>
							<option value='bottom-right'> Bottom-Right </option>
						</select>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_LType" name="">
							<option value='link'>          Type 1 </option>
							<option value='paperclip'>     Type 2 </option>
							<option value='external-link'> Type 3 </option>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_PC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_PBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_PFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VTVS_PFS_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_PHC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_PHBgC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_PPos" name="">
							<option value='top-left'>     Top-Left     </option>
							<option value='top-right'>    Top-Right    </option>
							<option value='bottom-left'>  Bottom-Left  </option>
							<option value='bottom-right'> Bottom-Right </option>
						</select>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_PType" name="">
							<option value='play'>          Type 1 </option>
							<option value='play-circle'>   Type 2 </option>
							<option value='play-circle-o'> Type 3 </option>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Arrows Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Position <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VTVS_ArrShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_ArrType" name="">
							<option value='angle-double'>   Type 1  </option>
							<option value='angle'>          Type 2  </option>
							<option value='arrow-circle'>   Type 3  </option>
							<option value='arrow-circle-o'> Type 4  </option>
							<option value='arrow'>          Type 5  </option>
							<option value='caret'>          Type 6  </option>
							<option value='caret-square-o'> Type 7  </option>
							<option value='chevron-circle'> Type 8  </option>
							<option value='chevron'>        Type 9  </option>
							<option value='hand-o'>         Type 10 </option>
							<option value='long-arrow'>     Type 11 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VTVS_ArrFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VTVS_ArrFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VTVS_ArrPos" name="">
							<option value='top'>    Top    </option>
							<option value='center'> Center </option>
							<option value='bottom'> Bottom </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VTVS_ArrC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_7">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Loop <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Cols <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Speed (s)</td>
					<td>AutoPlay <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_Loop" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_Cols" name="" min="1" max="10">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_Cols_1">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_Speed" name="Rich_Web_VS_HPS_Speed" min="1" max="20">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_Speed_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_AP" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Equal Height <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Place Between (px)</td>
					<td>Carousel <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_EH" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_PB" name="Rich_Web_VS_HPS_PB" min="0" max="20">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_PB_1">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_Car" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Next & Prev Buttons</td>
				</tr>
				<tr>
					<td>Show</td>
					<td>Next</td>
					<td>Prev</td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_VS_HPS_NP_Show" id="Rich_Web_VS_HPS_NP_Show" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="Rich_Web_VSlider_Select_Menu" name="Rich_Web_VS_HPS_NP_NText" id="Rich_Web_VS_HPS_NP_NText" value=""/>
					</td>
					<td>
						<input type="text" class="Rich_Web_VSlider_Select_Menu" name="Rich_Web_VS_HPS_NP_PText" id="Rich_Web_VS_HPS_NP_PText" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_NP_C" value=""/>
					</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_NP_BgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_NP_FS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_NP_FS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_NP_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_NP_BW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_NP_BW_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Radius (px)</td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_NP_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_NP_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_NP_BR" name="Rich_Web_VS_HPS_NP_BR" min="0" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_NP_BR_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_NP_HC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_NP_HBgC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Cols Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Box Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Videos Start Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Start Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Cols_BgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Cols_BoxShC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_Cols_VSEff" name="">
							<option value="none">        None        </option>
							<option value="blur">        Blur        </option>
							<option value="brightness">  Brightness  </option>
							<option value="contrast">    Contrast    </option>
							<option value="drop-shadow"> Drop-Shadow </option>
							<option value="grayscale">   Grayscale   </option>
							<option value="hue-rotate">  Hue-Rotate  </option>
							<option value="invert">      Invert      </option>
							<option value="opacity">     Opacity     </option>
							<option value="saturate">    Saturate    </option>
							<option value="sepia">       Sepia       </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Cols_StShC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Videos Hover Effect <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_Cols_VHEff" name="">
							<option value="none">        None        </option>
							<option value="blur">        Blur        </option>
							<option value="brightness">  Brightness  </option>
							<option value="contrast">    Contrast    </option>
							<option value="drop-shadow"> Drop-Shadow </option>
							<option value="grayscale">   Grayscale   </option>
							<option value="hue-rotate">  Hue-Rotate  </option>
							<option value="invert">      Invert      </option>
							<option value="opacity">     Opacity     </option>
							<option value="saturate">    Saturate    </option>
							<option value="sepia">       Sepia       </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Cols_HShC" value=""/>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Video Title Options</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_TC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_TFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_TFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_TFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Video Description Options</td>
				</tr>
				<tr>
					<td>Show <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_DShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_DC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_DFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_DFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_DFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">Link Options</td>
				</tr>
				<tr>
					<td>Text <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="Rich_Web_VSlider_Select_Menu" name="" id="Rich_Web_VS_HPS_LText" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_LC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_LFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_LFS_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_LFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_LHC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Video Play Options</td>
				</tr>
				<tr>
					<td>Text <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="Rich_Web_VSlider_Select_Menu" name="" id="Rich_Web_VS_HPS_PText" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_PBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_PC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_PFS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_PFS_1">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_PFF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_PHC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_PHBgC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Popup Options</td>
				</tr>
				<tr>
					<td>Overlay Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Pop_OvC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_Pop_BW" name="" min="0" max="15">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_Pop_BW_1">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_Pop_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Pop_BC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Box Shadow <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_Pop_BoxShShow" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_VS_HPS_Pop_BoxShType" />
							<span class="switch-label" data-on="1" data-off="2"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_Pop_BoxSh" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_Pop_BoxSh_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Pop_BoxShC" value=""/>
					</td>
				</tr>
				<tr>
					<td colspan="4">Popup Close Icon</td>
				</tr>
				<tr>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_VS_HPS_Pop_CIType" name="">
							<option value="rich_web-times">          Type 1 </option>
							<option value="rich_web-times-circle">   Type 2 </option>
							<option value="rich_web-times-circle-o"> Type 3 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_VS_HPS_Pop_CIS" name="" min="8" max="48">
							<span class="range-slider__value" id="Rich_Web_VS_HPS_Pop_CIS_1">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_VS_HPS_Pop_CIC" value=""/>
					</td>
					<td></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_8">
				<tr>
					<td colspan="4">Slider Options</td>
				</tr>
				<tr>
					<td>Shadow (px)</td>
					<td>Shadow Type</td>
					<td>Shadow Color</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_Sh" name="Rich_Web_RVVS_Sh" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_RVVS_Sh_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_ShT" name="Rich_Web_RVVS_ShT">
							<option value="Type 1"> Type 1 </option>
							<option value="Type 2"> Type 2 </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_RVVS_ShC" id="Rich_Web_RVVS_ShC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Item Options</td>
				</tr>
				<tr>
					<td>Border Width (px)</td>
					<td>Border Color</td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_NI_BW" name="Rich_Web_RVVS_NI_BW" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_RVVS_NI_BW_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_RVVS_NI_BC" id="Rich_Web_RVVS_NI_BC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NI_BgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NI_HBgC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Border Color</td>
					<td>Current Backgrount Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Current Border Color</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_RVVS_NI_HBC" id="Rich_Web_RVVS_NI_HBC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NI_CBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="Rich_Web_RVVS_NI_CBC" id="Rich_Web_RVVS_NI_CBC" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Item Title Options</td>
				</tr>
				<tr>
					<td>Font Size <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_NT_FS" name="" min="8" max="36">
							<span class="range-slider__value" id="Rich_Web_RVVS_NT_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_NT_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NT_C" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NT_HC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Current Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NT_CC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Item Description Options</td>
				</tr>
				<tr>
					<td>Font Size <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_ND_FS" name="" min="8" max="36">
							<span class="range-slider__value" id="Rich_Web_RVVS_ND_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_ND_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_ND_C" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_ND_HC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Current Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_ND_CC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Image Options</td>
				</tr>
				<tr>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_NImg_BW" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_RVVS_NImg_BW_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NScroll_HBgC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_NImg_BSh" name="" min="0" max="30">
							<span class="range-slider__value" id="Rich_Web_RVVS_NImg_BSh_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NImg_ShC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Radius (%) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_NImg_ShT" name="">
							<option value="Type 1"> Type 1 </option>
							<option value="Type 2"> Type 2 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_NImg_BR" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_RVVS_NImg_BR_Span">0</span>
						</div>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Navigation Scroll Options</td>
				</tr>
				<tr>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NScroll_BgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_NScroll_C" value=""/>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Image Title Options</td>
				</tr>
				<tr>
					<td>Font Size <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_IT_FS" name="" min="8" max="36">
							<span class="range-slider__value" id="Rich_Web_RVVS_IT_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_IT_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_IT_C" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Image Description Options</td>
				</tr>
				<tr>
					<td>Font Size <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_ID_FS" name="" min="8" max="36">
							<span class="range-slider__value" id="Rich_Web_RVVS_ID_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_ID_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_ID_C" value=""/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>
				<tr>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_PlIc_FS" name="" min="8" max="50">
							<span class="range-slider__value" id="Rich_Web_RVVS_PlIc_FS_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_PlIc_C" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_PlIc_BgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_PlIc_HBgC" value=""/>
					</td>
				</tr>
				<tr>
					<td colspan="4">Delete Icon Options</td>
				</tr>
				<tr>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Size <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_DelIc_C" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_RVVS_DelIc_T" name="">
							<option value="rich_web-times"> Type 1 </option>
							<option value="rich_web-times-circle"> Type 2 </option>
							<option value="rich_web-times-circle-o"> Type 3 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" id="Rich_Web_RVVS_DelIc_FS" name="" min="8" max="50">
							<span class="range-slider__value" id="Rich_Web_RVVS_DelIc_FS_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_DelIc_BgC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_RVVS_DelIc_HBgC" value=""/>
					</td>
					<td colspan="3"></td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Save_Table_2 RWeb_VSlider_Save_Table_2' id="Rich_Web_VSlider_Save_Table_2_9">
				<tr>
					<td colspan="4">Slider Options</td>
				</tr>
				<tr>
					<td>Slideshow</td>
					<td>Slideshow Change Time (ms)</td>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_MS_SSh" id="Rich_Web_MS_SSh"/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="" name="Rich_Web_MS_SShChT" id="Rich_Web_MS_SShChT" min="1000" max="15000">
							<span class="range-slider__value" id="Rich_Web_MS_SShChT_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_BSh" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_MS_BSh_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_ShC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Slider Type</td>
					<td>Slider 1 Video Autoplay <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_ShT" name="">
							<option value="Type 1"> Type 1 </option>
							<option value="Type 2"> Type 2 </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_BgC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_Type" name="Rich_Web_MS_Type">
							<option value="horizontal"> Horizontal </option>
							<option value="vertical"> Vertical </option>
						</select>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="" id="Rich_Web_MS_Autoplay" />
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<!-- <td>Start At</td> -->
					<td>Slider 1 Video Effect Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_W" name="Rich_Web_MS_W" min="320" max="1500">
							<span class="range-slider__value" id="Rich_Web_MS_W_Span">0</span>
						</div>
					</td>
					<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_startAt" style="display:none;" name="">
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
						<option value="5"> 5 </option>
						<option value="6"> 6 </option>
						<option value="7"> 7 </option>
						<option value="8"> 8 </option>
						<option value="9"> 9 </option>
						<option value="10"> 10 </option>
					</select>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_Sl1EfT" name="">
							<option value="1"> Type 1 </option>
							<option value="2"> Type 2 </option>
							<option value="3"> Type 3 </option>
							<option value="4"> Type 4 </option>
							<option value="5"> Default </option>
						</select>
					</td>
					<td colspan="2">
						
					</td>
				</tr>
				<tr>
					<td colspan='4'>Navigation Options</td>
				</tr>
				<tr>
					<td>Border Width (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Item Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_N_BW" name="" min="0" max="4">
							<span class="range-slider__value" id="Rich_Web_MS_N_BW_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_N_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_N_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_NI_FS" name="" min="8" max="24">
							<span class="range-slider__value" id="Rich_Web_MS_NI_FS_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Item Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Item Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Item Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Item Current Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_NI_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_NI_C" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_NI_HC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_NI_CC" value=""/>
					</td>
				</tr>
				<tr>
					<td>Circle Color</td>
					
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_NIC_C" value=""/>
					</td>
					<input type="text" style="display:none;"  name="" id="Rich_Web_MS_NI_CCC" value=""/>
					<td colspan="3">
						
					</td>
				</tr>
				<tr>
					<td colspan='4'>Image Options</td>
				</tr>
				<tr>
					<td>Border Wiidth (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Style <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Border Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_Img_BW" name="" min="0" max="15">
							<span class="range-slider__value" id="Rich_Web_MS_Img_BW_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_Img_BS" name="">
							<option value="none">   None   </option>
							<option value="solid">  Solid  </option>
							<option value="dotted"> Dotted </option>
							<option value="dashed"> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_Img_BC" value=""/>
					</td>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_Img_BSh" name="" min="0" max="50">
							<span class="range-slider__value" id="Rich_Web_MS_Img_BSh_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_Img_ShC" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_Img_ShT" name="">
							<option value="Type 1"> Type 1 </option>
							<option value="Type 2"> Type 2 </option>
						</select>
					</td>
					<td colspan="2">
						
					</td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Text Align <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_T_FS" name="" min="8" max="38">
							<span class="range-slider__value" id="Rich_Web_MS_T_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_T_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_T_C" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_T_TA" name="">
							<option value="left">    Left    </option>
							<option value="right">   Right   </option>
							<option value="center">  Center  </option>
							<option value="justify"> Justify </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Text Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_T_TSh" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_MS_T_TSh_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_T_TShC" value=""/>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Description Options</td>
				</tr>
				<tr>
					<td>Font Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Font Family <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Text Align <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_D_FS" name="" min="8" max="38">
							<span class="range-slider__value" id="Rich_Web_MS_D_FS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_D_FF" name="">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Fonts);$i++){ ?> 
								<option value="<?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?>"><?php echo $Rich_Web_VSlider_Fonts[$i]->Font_family;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_D_C" value=""/>
					</td>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_D_TA" name="">
							<option value="left">    Left    </option>
							<option value="right">   Right   </option>
							<option value="center">  Center  </option>
							<option value="justify"> Justify </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Text Shadow (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Shadow Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_D_TSh" name="" min="0" max="5">
							<span class="range-slider__value" id="Rich_Web_MS_D_TSh_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_D_TShC" value=""/>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Icon Options</td>
				</tr>
				<tr>
					<td>Icon Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Icon Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Icon Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_Ic_T" name="">
							<option value='rich_web rich_web-angle-double'>   Icon 1  </option>
							<option value='rich_web rich_web-angle'>          Icon 2  </option>
							<option value='rich_web rich_web-arrow-circle'>   Icon 3  </option>
							<option value='rich_web rich_web-arrow-circle-o'> Icon 4  </option>
							<option value='rich_web rich_web-arrow'>          Icon 5  </option>
							<option value='rich_web rich_web-caret'>          Icon 6  </option>
							<option value='rich_web rich_web-caret-square-o'> Icon 7  </option>
							<option value='rich_web rich_web-chevron-circle'> Icon 8  </option>
							<option value='rich_web rich_web-chevron'>        Icon 9  </option>
							<option value='rich_web rich_web-hand-o'>         Icon 10 </option>
							<option value='rich_web rich_web-long-arrow'>     Icon 11 </option>
							<option value='Timeline'>                         Image   </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_Ic_S" name="" min="10" max="50">
							<span class="range-slider__value" id="Rich_Web_MS_Ic_S_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_Ic_C" value=""/>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td colspan="4">Play Icon Options</td>
				</tr>
				<tr>
					<td>Type <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Size (px) <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
				</tr>
				<tr>
					<td>
						<select class="Rich_Web_VSlider_Select_Menu" id="Rich_Web_MS_PlIc_T" name="">
							<option value="rich_web rich_web-play">          Type 1 </option>
							<option value="rich_web rich_web-play-circle">   Type 2 </option>
							<option value="rich_web rich_web-play-circle-o"> Type 3 </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
						<input class="range-slider__range" type="range" value="" id="Rich_Web_MS_PlIc_S" name="" min="10" max="50">
							<span class="range-slider__value" id="Rich_Web_MS_PlIc_S_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_PlIc_BgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_PlIc_C" value=""/>
					</td>
				</tr>
				<tr>
					<td>Hover Background Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td>Hover Color <span class="Rich_Web_VSlider_Pro"> (Pro) </span></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_PlIc_HBgC" value=""/>
					</td>
					<td>
						<input type="text" class="alpha-color-picker" name="" id="Rich_Web_MS_PlIc_HC" value=""/>
					</td>
					<td colspan="2">
						
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>
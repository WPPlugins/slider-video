<?php
	class Rich_Web_Video_Slider extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Rich-Web Video Slider','description'=>'This is the widget of Rich-Web Video Slider plugin');
			parent::__construct('Rich_Web_Video_Slider','',$params);
 	  	}
		function form($instance)
 		{
 			$defaults = array('Rich_Web_Video'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Rich_Web_Video = $instance['Rich_Web_Video'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Title:
			   		<select name="<?php echo $this->get_field_name('Rich_Web_Video'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name2 = $wpdb->prefix . "rich_web_video_slider_manager";
							$Rich_Web_Video=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d", 0));
				   			
				   			foreach ($Rich_Web_Video as $Rich_Web_Slider1)
				   			{
				   				?> <option value="<?php echo $Rich_Web_Slider1->id; ?>"> <?php echo $Rich_Web_Slider1->Slider_Title; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Rich_Web_Video = empty($instance['Rich_Web_Video']) ? '' : $instance['Rich_Web_Video'];

 		 	global $wpdb;

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

			$Rich_Web_VSlider_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Rich_Web_Video));
			$Rich_Web_VSlider_ID=$Rich_Web_VSlider_Manager[0]->id;
			$Rich_Web_VSlider_Videos  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Slider_ID = %d order by id", $Rich_Web_Video));
			$Rich_Web_VSlider_Eff_Dat = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE slider_vid_name = %s", $Rich_Web_VSlider_Manager[0]->Slider_Type));
			
			if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Content Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Slick Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Thumbnails Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Carousel/Content Popup')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Simple Video Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Slider/Vertical Thumbnails')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Horizontal Posts Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Rich Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name12 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='TimeLine Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name13 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
 		 	echo $before_widget;
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_AP=='on'){ $Rich_Web_VS_CS_AP = true; }else{ $Rich_Web_VS_CS_AP = false; }
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_HP=='on'){ $Rich_Web_VS_CS_HP = true; }else{ $Rich_Web_VS_CS_HP = false; }
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_RS=='on'){ $Rich_Web_VS_CS_RS = true; }else{ $Rich_Web_VS_CS_RS = false; }
 		 	?>
			<?php if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Content Slider'){ ?>
 		 		<link rel="stylesheet" href="<?php echo plugins_url('/Style/styles.css',__FILE__);?>" />
				
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/raphael-min.js',__FILE__);?>"></script>
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.easing.js',__FILE__);?>"></script>
				
				<style>
					.iviewSlider { overflow: hidden; }
					#iview-timer<?php echo $Rich_Web_VSlider_ID; ?> { position: absolute; z-index: 100; border-radius: 5px; cursor: pointer; }
					#iview-timer<?php echo $Rich_Web_VSlider_ID; ?> div { border-radius: 3px; }
					#iview-preloader<?php echo $Rich_Web_VSlider_ID; ?> { position: absolute; z-index: 1200; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: #000 1px solid; padding: 1px; width: 100px; height: 3px; }
					#iview-preloader<?php echo $Rich_Web_VSlider_ID; ?> div { float: left; -webkit-border-radius: 2px;	-moz-border-radius: 2px; border-radius: 2px; height: 3px; background: #000; width: 0px; }
					.iview-strip<?php echo $Rich_Web_VSlider_ID; ?> { display:block; position:absolute; z-index:5; }
					.iview-block<?php echo $Rich_Web_VSlider_ID; ?> { display:block; position:absolute; z-index:5; }
					.iview-directionNav<?php echo $Rich_Web_VSlider_ID; ?> a { position:absolute; top:45%; z-index:9; cursor:pointer; }
					.iview-prevNav<?php echo $Rich_Web_VSlider_ID; ?> { left:0px; }
					.iview-nextNav { right:0px; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> {	position:absolute; z-index:9; width:100% !important; text-align:center !important; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a { z-index:9; cursor:pointer; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.active { font-weight:bold; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> .iview-items ul { list-style: none; margin:0px !important; height:100% !important; padding:0px !important; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> .iview-items ul li { display: inline; position: relative; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> .iview-items ul li:before { content: ''; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> .iview-tooltip { position: absolute; }
					.iview-caption { position:absolute; z-index:4; overflow: hidden; cursor: default; display:none !important; }
					.iview-caption_Anim {display: block !important;}
					.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show { background: #000; position: absolute; width: 100% !important; height: 100% !important; z-index: 101; }
					.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show .iview-video<?php echo $Rich_Web_VSlider_ID; ?>-container { position: relative; width: 100%; height: 100%; }
					.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show .iview-video<?php echo $Rich_Web_VSlider_ID; ?>-container a.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-close { position: absolute; right: 3px; top: 3px; background: #222; color: #FFF; height: 20px; width: 20px; text-align: center; line-height: 29px; font-size: 22px; font-weight: bold; overflow: hidden; -webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; }
					.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show .iview-video<?php echo $Rich_Web_VSlider_ID; ?>-container a.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-close:hover { background: #444; }

					.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain h3{
						line-height:1.2 !important;
					}
					.container { display: block; margin: 0px auto; }
					
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a { border:none !important; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> div.iview-items {display:inline-block; padding: 0px 10px 0px 10px; height: 44px; background: url('<?php echo plugins_url('/Images/nav-bg.png',__FILE__);?>'); }
					.iview-items_Anim{
						display:none !important;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control { padding: 0px; float: left; width: 11px; height: 12px; background: url('<?php echo plugins_url('/Images/bullets.png',__FILE__);?>') no-repeat; line-height: 0px; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control.active { background-position: 0px -12px; }
					.iview-caption { color: #FFF; border-radius: 3px; font-family: Verdana; font-size: 12px; text-shadow: #000 1px 1px 0px; }
					.iview-caption.caption1 { font-size: 36px; font-weight: bold; height:auto !important; max-width:50% !important; max-height:80px !important; overflow-x:hidden !important; left:20% !important; top:20% !important; }
					.iview-caption.caption2 { font-size: 36px; font-weight: bold; text-shadow: none;height:auto !important; max-width:50% !important; max-height:90px !important; overflow-x:hidden !important; left:25% !important; top:calc(20% + 50px) !important; }
					.caption-contain{ height:auto !important; max-height:80px !important; overflow-x:hidden !important; line-height:1.2 !important; text-transform:none !important; }
					.iview-caption.caption3 { color: #000; font-size: 26px; text-shadow: none; }
					.iview-caption.caption4 { font-size: 22px; font-weight: bold; width:auto !important; height:auto !important; max-height:80px !important; max-width:30% !important; top:15% !important; left:15% !important;}
					.iview-caption.caption4 .caption-contain {
						width:auto !important;
						height:auto !important;
					}
					.iview-caption.caption5 { background: #c4302b; box-shadow: rgba(0, 0, 0, 0.7) 10px 10px 15px 0px; font-size: 20px; font-weight: bold; text-shadow: none; width:auto !important;height:auto !important;max-width:50% !important; left:15% !important; top:45% !important; }
					.iview-caption.caption5 .caption-contain {
						width:auto !important;
						height:auto !important;
					}
					.iview-caption.caption6 { font-size: 18px; width:auto !important; height:auto !important; max-width:70% !important; left:18% !important; top:calc(45% + 60px) !important;}
					.iview-caption.caption6 .caption-contain {
						width:auto !important;
						height:auto !important;
					}
					.iview-caption.caption7 { text-align: left;	font-size: 11px; color: #888; border-radius: 0px; padding: 6px !important;box-sizing: border-box; position:relative !important; width:30% !important; height:100% !important;}
					.iview-caption.caption7 .caption-contain {
						height:100% !important;
						width:100% !important;
						max-height:none !important;
						box-sizing:border-box !important;
					}
					.iview-caption.caption7 div { line-height: 200%; overflow-x:hidden; }
					.iview-caption.caption7 h3 { margin-bottom: 20px; color: #FFF; line-height:1.2 !important;}
					.iview-caption.blackcaption { text-shadow: none; position:relative !important; height:auto !important; left:16% !important; top:calc(15% + 60px) !important; max-width:70% !important;}
					.iview-caption.blackcaption .caption-contain {
						box-sizing:border-box !important;
						height:100% !important;
						width:100% !important;
					}
					.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain { overflow-x:hidden; }
					#iview-preloader<?php echo $Rich_Web_VSlider_ID; ?> { position:absolute; border: #666 1px solid; width: 150px; top:50% !important; left:50% !important; transform:translateY(-50%) translateX(-50%) !important; -webkit-transform:translateY(-50%) translateX(-50%) !important; -ms-transform:translateY(-50%) translateX(-50%) !important; }
					#iview-preloader<?php echo $Rich_Web_VSlider_ID; ?> div { background: #666; }
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> div.iview-items ul li { padding: 0px; float: left; width: 11px; height: 12px; margin: 3px; margin-top: 15px; line-height: 0px; }
					#iview<?php echo $Rich_Web_VSlider_ID; ?> #iview-tooltip { display: none; position: absolute; background: url('<?php echo plugins_url('/Images/tooltip.png',__FILE__);?>') no-repeat; width: 124px; height: 90px; bottom: 30px; left: -67px; padding: 10px; z-index: 100; }
					#iview<?php echo $Rich_Web_VSlider_ID; ?> #iview-tooltip div.holder { display: block; width: 100%; height: 100%; overflow: hidden; border-radius: 2px; }
					#iview<?php echo $Rich_Web_VSlider_ID; ?> #iview-tooltip div.holder div.container { display: block; width: 4000px; }
					#iview<?php echo $Rich_Web_VSlider_ID; ?> #iview-tooltip div.holder div.container div { float: left; display: block; overflow: hidden; width: 124px; height: 84px; left: -50%; text-align: center; }
					#iview<?php echo $Rich_Web_VSlider_ID; ?> #iview-tooltip div.holder div.container div img { margin: 0 auto; }

					#iview<?php echo $Rich_Web_VSlider_ID; ?> {
						display: block;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BR;?>px;
						position: relative;
						-webkit-box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						-moz-box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						margin: 40px auto;
						overflow:hidden;
					}
					#iview<?php echo $Rich_Web_VSlider_ID; ?> .iviewSlider {
						display: block;
						width: 700px;
						height: 300px;
						overflow: hidden;
						border-radius: 0px;
						background-size:100% 100% !important;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control {
						padding: 0px;
						float: left;
						width: 11px;
						height: 12px;
						background: url(<?php echo plugins_url('/Images/bullets_'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_NT .'.png',__FILE__);?>) no-repeat;
						line-height: 0px;
						text-indent:0px;
						font-size:0px;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control img{
						width:100%;
						height:100%;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?> {
						display:inline-block !important;
						width:44px;
						height:44px;
						background: url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'.png',__FILE__);?>) no-repeat;
						background-size:100% 100%;
						box-shadow:none !important;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlNextNav {
						display:inline-block !important;
						width: 44px;
						height: 44px;
						background: url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'.png',__FILE__);?>) no-repeat;
						background-size:100% 100%;
						box-shadow:none !important;
					}
					#cont<?php echo $Rich_Web_VSlider_ID; ?> { width: 100%; height: 100%; overflow: hidden; top: 0; left: 0; z-index: 70; overflow: auto; }
					.titcol<?php echo $Rich_Web_VSlider_ID; ?>{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;
					}
					.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> 
					{						
						position: absolute;
						bottom: 3px;
						left: 50%;
						transform:translateX(-50%);
						-webkit-transform:translateX(-50%);
						-ms-transform:translateX(-50%);
						height: 44px;
					}
					.rw_iv_im<?php echo $Rich_Web_VSlider_ID; ?>{
						width:100% !important;
						height:100% !important;
					}
					.caption-contain{
						padding:0px 6px !important;
					}
					.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7{
						left:100% !important;
						transform:translateX(-100%) !important;
						-webkit-transform:translateX(-100%) !important;
						-ms-transform:translateX(-100%) !important;
						-moz-transform:translateX(-100%) !important;
						-o-transform:translateX(-100%) !important;
					}
					.descCol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 .caption-contain::-webkit-scrollbar, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 .caption-contain::-webkit-scrollbar   
					{
						width: 0.5em;
					}
					.descCol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 .caption-contain::-webkit-scrollbar-track, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 .caption-contain::-webkit-scrollbar-track      
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC; ?> !important;
					}
					.descCol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 .caption-contain::-webkit-scrollbar-thumb, .descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 .caption-contain::-webkit-scrollbar-thumb 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC; ?> !important;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC; ?> !important;
					}
					.titcol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.titcol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC; ?> !important;
					}
					.titcol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain::-webkit-scrollbar-thumb 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC; ?> !important;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC; ?> !important;
					}
					.iview-timer_Anim{
						display:none !important;
					}
					@media screen and (max-width:700px){
						.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlNextNav{
							cursor:default !important;
						}
						.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?>{
							cursor:default !important;
						}
						#iview-timer<?php echo $Rich_Web_VSlider_ID; ?>{
							cursor:default !important;
						}
					}
				</style>
 		 		<div id="cont<?php echo $Rich_Web_VSlider_ID; ?>">
					<div class="container" style='width:auto;'>
						<div id="iview<?php echo $Rich_Web_VSlider_ID; ?>" style='max-width:100%;'>
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<div class="rw_iv_im<?php echo $Rich_Web_VSlider_ID; ?>" data-iview:image="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" data-iview:src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>?rel=0&amp" data-iview:type="video" style='position:relative;'>
								<iframe src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type1'){ ?> 
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title==''){ ?> 
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?> iview-caption caption1 titcol<?php echo $Rich_Web_VSlider_ID; ?><?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } else { ?>
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?> iview-caption caption1 titcol<?php echo $Rich_Web_VSlider_ID; ?><?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } ?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc==''){ ?> 
									<div class="
									Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?> iview-caption caption2 descCol<?php echo $Rich_Web_VSlider_ID; ?><?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } else { ?>
									<div class="
									Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?> iview-caption caption2 descCol<?php echo $Rich_Web_VSlider_ID; ?><?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } ?>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type2'){ ?> 
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 iview-caption caption7 descCol<?php echo $Rich_Web_VSlider_ID; ?>_2<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="0" data-y="0" data-width="180" data-height="480" data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;'>
										<h3 class='titcol<?php echo $Rich_Web_VSlider_ID; ?>_2 titcol<?php echo $Rich_Web_VSlider_ID; ?>_2<?php echo $i+1; ?>' name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' style='font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>'><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type3'){ ?> 
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title==''){ ?> 
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_3 iview-caption caption4 titcol<?php echo $Rich_Web_VSlider_ID; ?>_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } else { ?>
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_3 iview-caption caption4 titcol<?php echo $Rich_Web_VSlider_ID; ?>_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } ?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc==''){ ?> 
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 iview-caption blackcaption descCol<?php echo $Rich_Web_VSlider_ID; ?>_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } else { ?>
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 iview-caption blackcaption descCol<?php echo $Rich_Web_VSlider_ID; ?>_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;padding:6px;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } ?>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type4'){ ?> 
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title==''){ ?> 
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_4 iview-caption caption5 titcol<?php echo $Rich_Web_VSlider_ID; ?>_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } else { ?>
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_4 iview-caption caption5 titcol<?php echo $Rich_Web_VSlider_ID; ?>_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } ?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc==''){ ?> 
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 iview-caption caption6 descCol<?php echo $Rich_Web_VSlider_ID; ?>_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } else { ?>
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 iview-caption caption6 descCol<?php echo $Rich_Web_VSlider_ID; ?>_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } ?>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type5'){ ?> 
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title==''){ ?> 
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_5 iview-caption caption5 titcol<?php echo $Rich_Web_VSlider_ID; ?>_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } else { ?>
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_5 iview-caption caption5 titcol<?php echo $Rich_Web_VSlider_ID; ?>_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } ?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc==''){ ?> 
									<div class=" Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 iview-caption caption6 descCol<?php echo $Rich_Web_VSlider_ID; ?>_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } else { ?>
									<div class=" Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 iview-caption caption6 descCol<?php echo $Rich_Web_VSlider_ID; ?>_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } ?>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type6'){ ?> 
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title==''){ ?> 
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_6 iview-caption caption4 titcol<?php echo $Rich_Web_VSlider_ID; ?>_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } else { ?>
									<div class="titcol<?php echo $Rich_Web_VSlider_ID; ?>_6 iview-caption caption4 titcol<?php echo $Rich_Web_VSlider_ID; ?>_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;padding:6px;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<?php } ?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc==''){ ?> 
									<div class=" Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 iview-caption blackcaption descCol<?php echo $Rich_Web_VSlider_ID; ?>_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } else { ?>
									<div class=" Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 iview-caption blackcaption descCol<?php echo $Rich_Web_VSlider_ID; ?>_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;padding:6px;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
									<?php } ?>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type7'){ ?> 
									<div class="Desc_Tot descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 iview-caption caption7 descCol<?php echo $Rich_Web_VSlider_ID; ?>_7<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="0" data-y="0" data-width="180" data-height="480" data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;'>
										<h3 class='titcol<?php echo $Rich_Web_VSlider_ID; ?>_7 titcol<?php echo $Rich_Web_VSlider_ID; ?>_7<?php echo $i+1; ?>' name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' style='font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>'><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<input type='text' style='display:none;' class='dirNavCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VS_CS_AP;?>'>
				<input type='text' style='display:none;' class='pauseOnHoveCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VS_CS_HP;?>'>
				<input type='text' style='display:none;' class='RandomStartCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VS_CS_RS;?>'>
				<input type='text' style='display:none;' class='controlNavCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_CN;?>'>
				<input type='text' style='display:none;' class='controlNextPrevCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_NPB;?>'>
				<input type='text' style='display:none;' class='navTumbsCS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_NT;?>'>
				<input type='text' style='display:none;' class='slWV<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SL_Width;?>'>
				<input type='text' style='display:none;' class='slHV<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SL_Height;?>'>
				<input type='text' style='display:none;' class='TFSV<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>'>
				<input type='text' style='display:none;' class='DFSV<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>'>
				<input type='text' style='display:none;' class='countVIDEOS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo count($Rich_Web_VSlider_Videos);?>'>
				<input type='text' style='display:none;' class='TitDescType<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type;?>'>
				<input type='text' style='display:none;' class='Rich_Web_VSlider_ID<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_ID; ?>'>
				<!-- <script src="<?php echo plugins_url('/Scripts/iview.js',__FILE__);?>"></script> -->
				<script>
				// jQuery("#cont<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
					(function ($, window, undefined) {
			var Rich_Web_VSlider_ID = jQuery(".Rich_Web_VSlider_ID<?php echo $Rich_Web_VSlider_ID; ?>").val();
			var iView<?php echo $Rich_Web_VSlider_ID; ?> = function (el, options) {
			var iv = this;
			iv.options = options;
			iv.sliderContent = el, iv.sliderInner = iv.sliderContent.html();
			iv.sliderContent.html("<div class='iviewSlider'>" + iv.sliderInner + "</div>");
			iv.slider = $('.iviewSlider', iv.sliderContent);
			iv.slider.css('position', 'relative');
			iv.defs = {
				slide: 0,
				total: 0,
				image: '',
				images: [],
				width: iv.sliderContent.width(),
				height: iv.sliderContent.height(),
				timer: options.timer.toLowerCase(),
				lock: false,
				paused: (options.autoAdvance) ? false : true,
				time: options.pauseTime,
				easing: options.easing
			};
			iv.disableSelection(iv.slider[0]);
			iv.slides = iv.slider.children();
			iv.slides.each(function (i) {
				var slide = $(this);
				iv.defs.images.push(slide.data("iview:image"));
				if (slide.data("iview:thumbnail")) iv.defs.images.push(slide.data("iview:thumbnail"));
				slide.css('display', 'none');
				if (slide.data("iview:type") == "video") {
					var element = slide.children().eq(0),
						video = $('<div class="iview-video'+Rich_Web_VSlider_ID+'-show"><div class="iview-video'+Rich_Web_VSlider_ID+'-container"><a class="iview-video'+Rich_Web_VSlider_ID+'-close" title="' + options.closeLabel + '">&#735;</a></div></div>');
					slide.append(video);
					element.appendTo($('div.iview-video'+Rich_Web_VSlider_ID+'-container', video));
					video.css({
						width: iv.defs.width,
						height: iv.defs.height,
						top: '-' + iv.defs.height + 'px'
					}).hide();
					slide.addClass('iview-video'+Rich_Web_VSlider_ID+'').css({
						'cursor': 'pointer'
					});
				}
				iv.defs.total++;
			}).css({
				width: iv.defs.width,
				height: iv.defs.height
			});
			iv.sliderContent.append('<div id="iview-preloader<?php echo $Rich_Web_VSlider_ID; ?>"><div></div></div>');
			var iviewPreloader = $('#iview-preloader<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent);
			var preloaderBar = $('div', iviewPreloader);
			iviewPreloader.css({
				top: ((iv.defs.height / 2) - (iviewPreloader.height() / 2)) + 'px',
				left: ((iv.defs.width / 2) - (iviewPreloader.width() / 2)) + 'px'
			});
			iv.sliderContent.append('<div id="iview-timer<?php echo $Rich_Web_VSlider_ID; ?>"><div></div></div>');
			iv.iviewTimer = $('#iview-timer<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent);
			iv.iviewTimer.hide();
			$('.iview-caption', iv.slider).each(function (i) {
				var caption = $(this);
				caption.html('<div class="caption-contain">' + caption.html() + '</div>');
			});
			options.startSlide = (options.randomStart) ? Math.floor(Math.random() * iv.defs.total) : options.startSlide;
			options.startSlide = (options.startSlide > 0 && options.startSlide >= iv.defs.total) ? iv.defs.total - 1 : options.startSlide;
			iv.defs.slide = options.startSlide;
			iv.defs.image = iv.slides.eq(iv.defs.slide);
			iv.defs.time = (iv.defs.image.data('iview:pausetime')) ? iv.defs.image.data('iview:pausetime') : options.pauseTime;
			iv.defs.easing = (iv.defs.image.data('iview:easing')) ? iv.defs.image.data('iview:easing') : options.easing;
			iv.pieDegree = 0;
			var padding = options.timerPadding,
				diameter = options.timerDiameter,
				stroke = options.timerStroke;
			if (iv.defs.total > 1 && iv.defs.timer != "bar") {
				stroke = (iv.defs.timer == "360bar") ? options.timerStroke : 0;
				var width = (diameter + (padding * 2) + (stroke * 2)),
					height = width,
					r = Raphael(iv.iviewTimer[0], width, height);
				iv.R = (diameter / 2);
				var param = {
					stroke: options.timerBg,
					"stroke-width": (stroke + (padding * 2))
				},
					param2 = {
						stroke: options.timerColor,
						"stroke-width": stroke,
						"stroke-linecap": "round"
					},
					param3 = {
						fill: options.timerColor,
						stroke: 'none',
						"stroke-width": 0
					},
					bgParam = {
						fill: options.timerBg,
						stroke: 'none',
						"stroke-width": 0
					};
				r.customAttributes.arc = function (value, R) {
					var total = 360,
						alpha = 360 / total * value,
						a = (90 - alpha) * Math.PI / 180,
						cx = ((diameter / 2) + padding + stroke),
						cy = ((diameter / 2) + padding + stroke),
						x = cx + R * Math.cos(a),
						y = cy - R * Math.sin(a),
						path;
					if (total == value) {
						path = [["M", cx, cy - R], ["A", R, R, 0, 1, 1, 299.99, cy - R]];
					} else {
						path = [["M", cx, cy - R], ["A", R, R, 0, +(alpha > 180), 1, x, y]];
					}
					return {
						path: path
					};
				};
				r.customAttributes.segment = function (angle, R) {
					var a1 = -90;
					R = R - 1;
					angle = (a1 + angle);
					var flag = (angle - a1) > 180,
						x = ((diameter / 2) + padding),
						y = ((diameter / 2) + padding);
					a1 = (a1 % 360) * Math.PI / 180;
					angle = (angle % 360) * Math.PI / 180;
					return {
						path: [["M", x, y], ["l", R * Math.cos(a1), R * Math.sin(a1)], ["A", R, R, 0, +flag, 1, x + R * Math.cos(angle), y + R * Math.sin(angle)], ["z"]]
					};
				};
				if (iv.defs.total > 1 && iv.defs.timer == "pie") {
					r.circle(iv.R + padding, iv.R + padding, iv.R + padding - 1).attr(bgParam);
				}
				iv.timerBgPath = r.path().attr(param), iv.timerPath = r.path().attr(param2), iv.pieTimer = r.path().attr(param3);
			}
			iv.barTimer = $('div', iv.iviewTimer);
			if (iv.defs.total > 1 && iv.defs.timer == "360bar") {
				iv.timerBgPath.attr({
					arc: [359.9, iv.R]
				});
			}
			if (iv.defs.timer == "bar") {
				iv.iviewTimer.css({
					opacity: options.timerOpacity,
					width: diameter,
					height: stroke,
					border: options.timerBarStroke + 'px ' + options.timerBarStrokeColor + ' ' + options.timerBarStrokeStyle,
					padding: padding,
					background: options.timerBg
				});
				iv.barTimer.css({
					width: 0,
					height: stroke,
					background: options.timerColor,
					'float': 'left'
				});
			} else {
				iv.iviewTimer.css({
					opacity: options.timerOpacity,
					width: width,
					height: height
				});
			}
			iv.setTimerPosition();
			new ImagePreload(iv.defs.images, function (i) {
				var percent = (i * 10);
				preloaderBar.stop().animate({
					width: percent + '%'
				});
			}, function () {
				preloaderBar.stop().animate({
					width: '100%'
				}, function () {
					iviewPreloader.remove();
					iv.startSlider();
					options.onAfterLoad.call(this);
				});
			});
			iv.sliderContent.bind('swipeleft', function () {
				if (iv.defs.lock) return false;
				iv.cleanTimer();
				iv.goTo('next');
			}).bind('swiperight', function () {
				if (iv.defs.lock) return false;
				iv.cleanTimer();
				iv.defs.slide -= 2;
				iv.goTo('prev');
			});
			if (options.keyboardNav) {
				$(document).bind('keyup.iView<?php echo $Rich_Web_VSlider_ID; ?>', function (event) {
					if (event.keyCode == '37') {
						if (iv.defs.lock) return false;
						iv.cleanTimer();
						iv.defs.slide -= 2;
						iv.goTo('prev');
					}
					if (event.keyCode == '39') {
						if (iv.defs.lock) return false;
						iv.cleanTimer();
						iv.goTo('next');
					}
				});
			}
			iv.iviewTimer.live('click', function () {
				if (iv.iviewTimer.hasClass('paused')) {
					iv.playSlider();
				} else {
					iv.stopSlider();
				}
			});
			iv.sliderContent.bind('iView<?php echo $Rich_Web_VSlider_ID; ?>:pause', function () {
				iv.stopSlider();
			});
			iv.sliderContent.bind('iView<?php echo $Rich_Web_VSlider_ID; ?>:play', function () {
				iv.playSlider();
			});
			iv.sliderContent.bind('iView<?php echo $Rich_Web_VSlider_ID; ?>:previous', function () {
				if (iv.defs.lock) return false;
				iv.cleanTimer();
				iv.defs.slide -= 2;
				iv.goTo('prev');
			});
			iv.sliderContent.bind('iView<?php echo $Rich_Web_VSlider_ID; ?>:next', function () {
				if (iv.defs.lock) return false;
				iv.cleanTimer();
				iv.goTo('next');
			});
			iv.sliderContent.bind('iView<?php echo $Rich_Web_VSlider_ID; ?>:goSlide', function (event, slide) {
				if (iv.defs.lock || iv.defs.slide == slide) return false;
				if ($(this).hasClass('active')) return false;
				iv.cleanTimer();
				iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
				iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
				iv.defs.slide = slide - 1;
				iv.goTo('control');
			});
			iv.sliderContent.bind('resize', function () {
				t = $(this),
				tW = t.width(),
				tH = t.height(),
				width = iv.slider.width(),
				height = iv.slider.height();
				if(iv.defs.width != tW){
					var ratio = (tW / width),
						newHeight = Math.round(iv.defs.height * ratio);
					iv.slider.css({
						'-webkit-transform-origin' : '0 0',
						'-moz-transform-origin' : '0 0',
						'-o-transform-origin' : '0 0',
						'-ms-transform-origin' : '0 0',
						'transform-origin' : '0 0',
						'-webkit-transform' : 'scale('+ ratio +')',
						'-moz-transform' : 'scale('+ ratio +')',
						'-o-transform' : 'scale('+ ratio +')',
						'-ms-transform' : 'scale('+ ratio +')',
						'transform' : 'scale('+ ratio +')'
					});
					t.css({ height: newHeight });
					iv.defs.width = tW;
					iv.setTimerPosition();
				}
			});
			$('.iview-video'+Rich_Web_VSlider_ID+'', iv.slider).click(function(e){
				var t = $(this),
					video = $('.iview-video'+Rich_Web_VSlider_ID+'-show', t);
				if(!$(e.target).hasClass('iview-video'+Rich_Web_VSlider_ID+'-close') && !$(e.target).hasClass('iview-caption') && !$(e.target).parents().hasClass('iview-caption')){
					iframe = $('iframe', video),
					src = iframe.attr('src');
					iframe.removeAttr('src').attr('src',t.data('iview:src'));
					video.show().animate({ top: 0 }, 1200, 'easeOutBounce');
					iv.sliderContent.trigger('iView<?php echo $Rich_Web_VSlider_ID; ?>:pause');
				}
				jQuery('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
			});
			$('.iview-video'+Rich_Web_VSlider_ID+'-close', iv.slider).click(function(){
				var video = $(this).parents('.iview-video'+Rich_Web_VSlider_ID+'-show'),
					iframe = $('iframe', video),
					src = iframe.attr('src');
				iframe.removeAttr('src').attr('src','');
				video.animate({ top: '-' + iv.defs.height + 'px' }, 1200, 'easeOutBounce', function(){
					video.hide();
					iv.sliderContent.trigger('iView<?php echo $Rich_Web_VSlider_ID; ?>:play');
					jQuery('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
				});
				
			});
		};
	iView<?php echo $Rich_Web_VSlider_ID; ?>.prototype = {
		timer: null,
		startSlider: function () {
			var iv = this;
			var img = new Image();
			img.src = iv.slides.eq(0).data('iview:image');
			imgWidth = img.width;
			if(imgWidth != iv.defs.width){
				iv.defs.width = imgWidth;
				iv.sliderContent.trigger('resize');
			}
			iv.iviewTimer.show();
			iv.slides.eq(iv.defs.slide).css('display', 'block');
			iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
			iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
			iv.setCaption(iv.options);
			iv.iviewTimer.addClass('paused').attr('title', iv.options.playLabel);
			if (iv.options.autoAdvance && iv.defs.total > 1) {
				iv.iviewTimer.removeClass('paused').attr('title', iv.options.pauseLabel);
				iv.setTimer();
			}
			if (iv.options.directionNav) {
				iv.sliderContent.append('<div class="iview-directionNav<?php echo $Rich_Web_VSlider_ID; ?>"><a class="iview-prevNav<?php echo $Rich_Web_VSlider_ID; ?>" title="' + iv.options.previousLabel + '">' + iv.options.previousLabel + '</a><a class="iview-nextNav" title="' + iv.options.nextLabel + '">' + iv.options.nextLabel + '</a></div>');
				$('.iview-directionNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).css({
					opacity: iv.options.directionNavHoverOpacity
				});
				iv.sliderContent.hover(function () {
					$('.iview-directionNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).stop().animate({
						opacity: 1
					}, 300);
				}, function () {
					$('.iview-directionNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).stop().animate({
						opacity: iv.options.directionNavHoverOpacity
					}, 300);
				});
				$('a.iview-prevNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).live('click', function () {
					if (iv.defs.lock) return false;
					iv.cleanTimer();
					iv.defs.slide -= 2;
					iv.goTo('prev');
				});
				$('a.iview-nextNav', iv.sliderContent).live('click', function () {
					if (iv.defs.lock) return false;
					iv.cleanTimer();
					iv.goTo('next');
				});
			}
			if (iv.options.controlNav) {
				var iviewControl = '<div class="iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>">',
					iviewTooltip = '';
				if (!iv.options.directionNav && iv.options.controlNavNextPrev) iviewControl += '<a class="iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?>" title="' + iv.options.previousLabel + '">' + iv.options.previousLabel + '</a>';
				iviewControl += '<div class="iview-items"><ul>';
				for (var i = 0; i < iv.defs.total; i++) {
					var slide = iv.slides.eq(i);
					iviewControl += '<li>';
					if (iv.options.controlNavThumbs) {
						var thumb = (slide.data('iview:thumbnail')) ? slide.data('iview:thumbnail') : slide.data('iview:image');
						iviewControl += '<a class="iview-control" rel="' + i + '"><img src="' + thumb + '" /></a>';
					} else {
						var thumb = (slide.data('iview:thumbnail')) ? slide.data('iview:thumbnail') : slide.data('iview:image');
						iviewControl += '<a class="iview-control" rel="' + i + '">' + (i + 1) + '</a>';
						if (iv.options.controlNavTooltip) iviewTooltip += '<div rel="' + i + '"><img src="' + thumb + '" /></div>';
					}
					iviewControl += '</li>';
				}
				iviewControl += '</ul></div>';
				if (!iv.options.directionNav && iv.options.controlNavNextPrev) iviewControl += '<a class="iview-controlNextNav" title="' + iv.options.nextLabel + '">' + iv.options.nextLabel + '</a>';
				iviewControl += '</div>';
				if (!iv.options.controlNavThumbs && iv.options.controlNavTooltip) iviewControl += '<div id="iview-tooltip"><div class="holder"><div class="container">' + iviewTooltip + '</div></div></div>';
				iv.sliderContent.append(iviewControl);
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control:eq(' + iv.defs.slide + ')', iv.sliderContent).addClass('active');
				$('a.iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).live('click', function () {
					if (iv.defs.lock) return false;
					iv.cleanTimer();
					iv.defs.slide -= 2;
					iv.goTo('prev');
				});
				$('a.iview-controlNextNav', iv.sliderContent).live('click', function () {
					if (iv.defs.lock) return false;
					iv.cleanTimer();
					iv.goTo('next');
				});
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control', iv.sliderContent).live('click', function () {
					if (iv.defs.lock) return false;
					if ($(this).hasClass('active')) return false;
					iv.cleanTimer();
					iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
					iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
					iv.defs.slide = $(this).attr('rel') - 1;
					iv.goTo('control');
				});
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).css({
					opacity: iv.options.controlNavHoverOpacity
				});
				iv.sliderContent.hover(function () {
					$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).stop().animate({
						opacity: 1
					}, 300);
					iv.sliderContent.addClass('iview-hover');
				}, function () {
					$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>', iv.sliderContent).stop().animate({
						opacity: iv.options.controlNavHoverOpacity
					}, 300);
					iv.sliderContent.removeClass('iview-hover');
				});
				var tooltipTimer = null;
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control', iv.sliderContent).hover(function (e) {
					var t = $(this),
						i = t.attr('rel'),
						tooltip = $('#iview-tooltip', iv.sliderContent),
						holder = $('div.holder', tooltip),
						x = t.offset().left - iv.sliderContent.offset().left - (tooltip.outerWidth() / 2) + iv.options.tooltipX,
						y = t.offset().top - iv.sliderContent.offset().top - tooltip.outerHeight() + iv.options.tooltipY,
						imD = $('div[rel=' + i + ']')
						scrollLeft = (i * imD.width());
					tooltip.stop().animate({
						left: x,
						top: y,
						opacity: 1
					}, 300);
					if (tooltip.not(':visible')) tooltip.fadeIn(300);
					holder.stop().animate({
						scrollLeft: scrollLeft
					}, 300);
					clearTimeout(tooltipTimer);
				}, function (e) {
					var tooltip = $('#iview-tooltip', iv.sliderContent);
					tooltipTimer = setTimeout(function () {
						tooltip.animate({
							opacity: 0
						}, 300, function () {
							tooltip.hide();
						});
					}, 200);
				});
				function resp<?php echo $Rich_Web_VSlider_ID; ?>(){
					if(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width() <= 90+<?php echo count($Rich_Web_VSlider_Videos)*17;?>+25 || jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width() <= 400) {
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> div.iview-items").addClass('iview-items_Anim');
					}else{
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> div.iview-items").removeClass('iview-items_Anim');
					}

					if(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width() <= 400){
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?>,.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlNextNav").css({"width":"30px","height":"30px"});
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>").css("height","30px");
					}else{
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlPrevNav<?php echo $Rich_Web_VSlider_ID; ?>,.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-controlNextNav").css({"width":"44px","height":"44px"});
						jQuery(".iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>").css("height","44px");
					}
				}
				resp<?php echo $Rich_Web_VSlider_ID; ?>();
				jQuery(window).resize(function(){
					resp<?php echo $Rich_Web_VSlider_ID; ?>();
				})
			}
			iv.sliderContent.bind('mouseover.iView<?php echo $Rich_Web_VSlider_ID; ?> mousemove.iView<?php echo $Rich_Web_VSlider_ID; ?>', function () {
				if (iv.options.pauseOnHover && !iv.defs.paused) iv.cleanTimer();
				iv.sliderContent.addClass('iView<?php echo $Rich_Web_VSlider_ID; ?>-hover');
			}).bind('mouseout.iView<?php echo $Rich_Web_VSlider_ID; ?>', function () {
				if (iv.options.pauseOnHover && !iv.defs.paused && iv.timer == null && iv.pieDegree <= 359 && iv.options.autoAdvance) iv.setTimer();
				iv.sliderContent.removeClass('iview-hover');
			});
		},
		setCaption: function () {
			var iv = this,
				slide = iv.slides.eq(iv.defs.slide),
				captions = $('.iview-caption', slide),
				timeEx = 0;
			captions.each(function (i) {
				var caption = $(this),
					fx = (caption.data('transition')) ? $.trim(caption.data('transition').toLowerCase()) : "fade",
					speed = (caption.data('speed')) ? caption.data('speed') : iv.options.captionSpeed,
					easing = (caption.data('easing')) ? caption.data('easing') : iv.options.captionEasing,
					x = (caption.data('x')!="undefined") ? caption.data('x') : "center",
					y = (caption.data('y')!="undefined") ? caption.data('y') : "center",
					w = (caption.data('width')) ? caption.data('width') : caption.width(),
					h = (caption.data('height')) ? caption.data('height') : caption.height(),
					oW = caption.outerWidth(),
					oH = caption.outerHeight();
					if(x == "center") x = ((iv.defs.width/2) - (oW/2));
					if(y == "center") y = ((iv.defs.height/2) - (oH/2));
				var captionContain = $('.caption-contain', caption);
				caption.css({
					opacity: 0
				});
				captionContain.css({
					opacity: 0,
					position: 'relative',
					width: w,
					height: h
				});
				switch (fx) {
				case "wipedown":
					caption.css({
						top: (y - h),
						left: x
					});
					captionContain.css({
						top: (h + (h * 3)),
						left: 0
					});
					break;
				case "wipeup":
					caption.css({
						top: (y + h),
						left: x
					});
					captionContain.css({
						top: (h - (h * 3)),
						left: 0
					});
					break;
				case "wiperight":
					caption.css({
						top: y,
						left: (x - w)
					});
					captionContain.css({
						top: 0,
						left: (w + (w * 2))
					});
					break;
				case "wipeleft":
					caption.css({
						top: y,
						left: (x + w)
					});
					captionContain.css({
						top: 0,
						left: (w - (w * 2))
					});
					break;
				case "fade":
					caption.css({
						top: y,
						left: x
					});
					captionContain.css({
						top: 0,
						left: 0
					});
					break;
				case "expanddown":
					caption.css({
						top: y,
						left: x,
						height: 0
					});
					captionContain.css({
						top: (h + (h * 3)),
						left: 0
					});
					break;
				case "expandup":
					caption.css({
						top: (y + h),
						left: x,
						height: 0
					});
					captionContain.css({
						top: (h - (h * 3)),
						left: 0
					});
					break;
				case "expandright":
					caption.css({
						top: y,
						left: x,
						width: 0
					});
					captionContain.css({
						top: 0,
						left: (w + (w * 2))
					});
					break;
				case "expandleft":
					caption.css({
						top: y,
						left: (x + w),
						width: 0
					});
					captionContain.css({
						top: 0,
						left: (w - (w * 2))
					});
					break;
				}
				setTimeout(function () {
					caption.animate({
						opacity: iv.options.captionOpacity,
						top: y,
						left: x,
						width: w,
						height: h
					}, speed, easing, function () {});
				}, timeEx);
				setTimeout(function () {
					captionContain.animate({
						opacity: iv.options.captionOpacity,
						top: 0,
						left: 0
					}, speed, easing);
				}, (timeEx + 100));
				timeEx += 250;
			});
		},
		processTimer: function () {
			var iv = this;
			if (iv.defs.timer == "360bar") {
				var degree = (iv.pieDegree == 0) ? 0 : iv.pieDegree + .9;
				iv.timerPath.attr({
					arc: [degree, iv.R]
				});
			} else if (iv.defs.timer == "pie") {
				var degree = (iv.pieDegree == 0) ? 0 : iv.pieDegree + .9;
				iv.pieTimer.attr({
					segment: [degree, iv.R]
				});
			} else {
				iv.barTimer.css({
					width: ((iv.pieDegree / 360) * 100) + '%'
				});
			}
			iv.pieDegree += 3;
			
		},
		transitionEnd: function (iv) {
			iv.options.onAfterChange.call(this);
			iv.defs.lock = false;
			iv.slides.css('display', 'none');
			iv.slides.eq(iv.defs.slide).show();
			iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
			iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
			$('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>, .iview-block<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).remove();
			iv.defs.time = (iv.defs.image.data('iview:pausetime')) ? iv.defs.image.data('iview:pausetime') : iv.options.pauseTime;
			iv.iviewTimer.animate({
				opacity: iv.options.timerOpacity
			});
			iv.pieDegree = 0;
			iv.processTimer();
			iv.setCaption(iv.options);
			if (iv.timer == null && !iv.defs.paused) iv.timer = setInterval(function () {
				iv.timerCall(iv);
				jQuery('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
			}, (iv.defs.time / 120));
		},
		addStrips: function (vertical, opts) {
			var iv = this;
			opts = (opts) ? opts : iv.options;
			for (var i = 0; i < opts.strips; i++) {
				var stripWidth = Math.round(iv.slider.width() / opts.strips),
					stripHeight = Math.round(iv.slider.height() / opts.strips),
					bgPosition = '-' + ((stripWidth + (i * stripWidth)) - stripWidth) + 'px 0%',
					top = ((vertical) ? (stripHeight * i) + 'px' : '0px'),
					left = ((vertical) ? '0px' : (stripWidth * i) + 'px');
				if (vertical) bgPosition = '0% -' + ((stripHeight + (i * stripHeight)) - stripHeight) + 'px';
				if (i == opts.strips - 1) {
					var width = ((vertical) ? '0px' : (iv.slider.width() - (stripWidth * i)) + 'px'),
						height = ((vertical) ? (iv.slider.height() - (stripHeight * i)) + 'px' : '0px');
				} else {
					var width = ((vertical) ? '0px' : stripWidth + 'px'),
						height = ((vertical) ? stripHeight + 'px' : '0px');
				}
				var strip = $('<div class="iview-strip<?php echo $Rich_Web_VSlider_ID; ?>"></div>').css({
					width: width,
					height: height,
					top: top,
					left: left,
					background: 'url("' + iv.defs.image.data('iview:image') + '") no-repeat ' + bgPosition,
					backgroundSize: ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px',
					opacity: 0
				});
				iv.slider.append(strip);
			}
		},
		addBlocks: function () {
			var iv = this,
				blockWidth = iv.slider.width() / iv.options.blockCols,

				blockHeight = iv.slider.height() / iv.options.blockRows;
			for (var rows = 0; rows < iv.options.blockRows; rows++) {
				for (var columns = 0; columns < iv.options.blockCols; columns++) {
					var top = (rows * blockHeight) + 'px',
						left = (columns * blockWidth) + 'px',
						width = blockWidth + 'px',
						height = blockHeight + 'px',
						bgPosition = '-' + ((blockWidth + (columns * blockWidth)) - blockWidth) + 'px -' + ((blockHeight + (rows * blockHeight)) - blockHeight) + 'px';
					if (columns == iv.options.blockCols - 1) width = (iv.slider.width() - (blockWidth * columns)) + 'px';
					var block = $('<div class="iview-block<?php echo $Rich_Web_VSlider_ID; ?>"></div>').css({
						width: blockWidth + 'px',
						height: blockHeight + 'px',
						top: (rows * blockHeight) + 'px',
						left: (columns * blockWidth) + 'px',
						background: 'url("' + iv.defs.image.data('iview:image') + '") no-repeat ' + bgPosition,
						backgroundSize: ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px',
						opacity: 0
					});
					iv.slider.append(block);
				}
			}
		},
		runTransition: function (fx) {
			var iv = this;
			switch (fx) {
			case 'strip-up-right':
			case 'strip-up-left':
				iv.addStrips();
				var timeDelay = 0;
				i = 0, strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-up-left') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					strip.css({
						top: '',
						bottom: '0px'
					});
					setTimeout(function () {
						strip.animate({
							height: '100%',
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'strip-down':
			case 'strip-down-right':
			case 'strip-down-left':
				iv.addStrips();
				var timeDelay = 0,
					i = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-down-left') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					strip.css({
						bottom: '',
						top: '0px'
					});
					setTimeout(function () {
						strip.animate({
							height: '100%',
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'strip-left-right':
			case 'strip-left-right-up':
			case 'strip-left-right-down':
				iv.addStrips(true);
				var timeDelay = 0,
					i = 0,
					v = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-left-right-down') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					if (i == 0) {
						strip.css({
							right: '',
							left: '0px'
						});
						i++;
					} else {
						strip.css({
							left: '',
							right: '0px'
						});
						i = 0;
					}
					setTimeout(function () {
						strip.animate({
							width: '100%',
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (v == iv.options.strips - 1) iv.transitionEnd(iv);
							v++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'strip-up-down':
			case 'strip-up-down-right':
			case 'strip-up-down-left':
				iv.addStrips();
				var timeDelay = 0,
					i = 0,
					v = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-up-down-left') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					if (i == 0) {
						strip.css({
							bottom: '',
							top: '0px'
						});
						i++;
					} else {
						strip.css({
							top: '',
							bottom: '0px'
						});
						i = 0;
					}
					setTimeout(function () {
						strip.animate({
							height: '100%',
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (v == iv.options.strips - 1) iv.transitionEnd(iv);
							v++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'left-curtain':
			case 'right-curtain':
			case 'top-curtain':
			case 'bottom-curtain':
				if (fx == 'left-curtain' || fx == 'right-curtain') iv.addStrips();
				else iv.addStrips(true);
				var timeDelay = 0,
					i = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'right-curtain' || fx == 'bottom-curtain') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					var width = strip.width();
					var height = strip.height();
					if (fx == 'left-curtain' || fx == 'right-curtain') strip.css({
						top: '0px',
						height: '100%',
						width: '0px'
					});
					else strip.css({
						left: '0px',
						height: '0px',
						width: '100%'
					});
					setTimeout(function () {
						if (fx == 'left-curtain' || fx == 'right-curtain') strip.animate({
							width: width,
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
						else strip.animate({
							height: height,
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'strip-up-right':
			case 'strip-up-left':
				iv.addStrips();
				var timeDelay = 0,
					i = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-up-left') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					strip.css({
						'bottom': '0px'
					});
					setTimeout(function () {
						strip.animate({
							height: '100%',
							opacity: '1.0'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
					}, (100 + timeDelay));
					timeDelay += 50;
				});
				break;
			case 'strip-left-fade':
			case 'strip-right-fade':
			case 'strip-top-fade':
			case 'strip-bottom-fade':
				if (fx == 'strip-left-fade' || fx == 'strip-right-fade') iv.addStrips();
				else iv.addStrips(true);
				var timeDelay = 0,
					i = 0,
					strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'strip-right-fade' || fx == 'strip-bottom-fade') strips = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				strips.each(function () {
					var strip = $(this);
					var width = strip.width();
					var height = strip.height();
					if (fx == 'strip-left-fade' || fx == 'strip-right-fade') strip.css({
						top: '0px',
						height: '100%',
						width: width
					});
					else strip.css({
						left: '0px',
						height: height,
						width: '100%'
					});
					setTimeout(function () {
						strip.animate({
							opacity: '1.0'
						}, iv.options.animationSpeed * 1.7, iv.defs.easing, function () {
							if (i == iv.options.strips - 1) iv.transitionEnd(iv);
							i++;
						});
					}, (100 + timeDelay));
					timeDelay += 35;
				});
				break;
			case 'slide-in-up':
			case 'slide-in-down':
				opts = {
					strips: 1
				};
				iv.addStrips(false, opts);
				var strip = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>:first', iv.slider),
					top = 0;
				if (fx == 'slide-in-up') top = '-' + iv.defs.height + 'px';
				else top = iv.defs.height + 'px';
				strip.css({
					top: top,
					'height': '100%',
					'width': iv.defs.width
				});
				strip.animate({
					'top': '0px',
					opacity: 1
				}, (iv.options.animationSpeed * 2), iv.defs.easing, function () {
					iv.transitionEnd(iv);
				});
				break;
			case 'zigzag-top':
			case 'zigzag-bottom':
			case 'zigzag-grow-top':
			case 'zigzag-grow-bottom':
			case 'zigzag-drop-top':
			case 'zigzag-drop-bottom':
				iv.addBlocks();
				var totalBlocks = (iv.options.blockCols * iv.options.blockRows),
					timeDelay = 0,
					blockToArr = new Array(),
					blocks = $('.iview-block<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				for (var rows = 0; rows < iv.options.blockRows; rows++) {
					var odd = (rows % 2),
						start = (rows * iv.options.blockCols),
						end = ((rows + 1) * iv.options.blockCols);
					if (odd == 1) {
						for (var columns = end - 1; columns >= start; columns--) {
							blockToArr.push($(blocks[columns]));
						}
					} else {
						for (var columns = start; columns < end; columns++) {
							blockToArr.push($(blocks[columns]));
						}
					}
				}
				if (fx == 'zigzag-bottom' || fx == 'zigzag-grow-bottom' || fx == 'zigzag-drop-bottom') blockToArr.reverse();
				blocks.each(function (i) {
					var block = $(blockToArr[i]),
						h = iv.slider.height() / iv.options.blockRows,
						w = iv.slider.width() / iv.options.blockCols,
						top = block.css('top');
					if (fx == 'zigzag-grow-top' || fx == 'zigzag-grow-bottom') block.width(0).height(0);
					else if (fx == 'zigzag-drop-top' || fx == 'zigzag-drop-bottom') block.css({
						top: '-=50'
					});
					setTimeout(function () {
						if (fx == 'zigzag-grow-top' || fx == 'zigzag-grow-bottom') block.animate({
							opacity: '1',
							height: h,
							width: w
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == totalBlocks - 1) iv.transitionEnd(iv);
						});
						else if (fx == 'zigzag-drop-top' || fx == 'zigzag-drop-bottom') block.animate({
							top: top,
							opacity: '1'
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == totalBlocks - 1) iv.transitionEnd(iv);
						});
						else block.animate({
							opacity: '1'
						}, (iv.options.animationSpeed * 2), 'easeInOutExpo', function () {
							if (i == totalBlocks - 1) iv.transitionEnd(iv);
						});
					}, (100 + timeDelay));
					timeDelay += 20;
				});
				break;
			case 'block-fade':
			case 'block-fade-reverse':
			case 'block-expand':
			case 'block-expand-reverse':
				iv.addBlocks();
				var totalBlocks = (iv.options.blockCols * iv.options.blockRows),
					i = 0,
					timeDelay = 0;
				var rowIndex = 0;
				var colIndex = 0;
				var blockToArr = new Array();
				blockToArr[rowIndex] = new Array();
				var blocks = $('.iview-block<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider);
				if (fx == 'block-fade-reverse' || fx == 'block-expand-reverse') {
					blocks = $('.iview-block<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider).reverse();
				}
				blocks.each(function () {
					blockToArr[rowIndex][colIndex] = $(this);
					colIndex++;
					if (colIndex == iv.options.blockCols) {
						rowIndex++;
						colIndex = 0;
						blockToArr[rowIndex] = new Array();
					}
				});
				for (var columns = 0; columns < (iv.options.blockCols * 2); columns++) {
					var Col = columns;
					for (var rows = 0; rows < iv.options.blockRows; rows++) {
						if (Col >= 0 && Col < iv.options.blockCols) {
							(function () {
								var block = $(blockToArr[rows][Col]);
								var w = iv.slider.width() / iv.options.blockCols;
								var h = iv.slider.height() / iv.options.blockRows;
								if (fx == 'block-expand' || fx == 'block-expand-reverse') {
									block.width(0).height(0);
								}
								setTimeout(function () {
									block.animate({
										opacity: '1',
										width: w,
										height: h
									}, iv.options.animationSpeed / 1.3, iv.defs.easing, function () {
										if (i == totalBlocks - 1) iv.transitionEnd(iv);
										i++;
									});
								}, (100 + timeDelay));
							})();
						}
						Col--;
					}
					timeDelay += 100;
				}
				break;
			case 'block-random':
			case 'block-expand-random':
			case 'block-drop-random':
				iv.addBlocks();
				var totalBlocks = (iv.options.blockCols * iv.options.blockRows),
					timeDelay = 0;
				var blocks = iv.shuffle($('.iview-block<?php echo $Rich_Web_VSlider_ID; ?>', iv.slider));
				blocks.each(function (i) {
					var block = $(this),
						h = iv.slider.height() / iv.options.blockRows,
						w = iv.slider.width() / iv.options.blockCols,
						top = block.css('top');
					if (fx == 'block-expand-random') block.width(0).height(0);
					if (fx == 'block-drop-random') block.css({
						top: '-=50'
					});
					setTimeout(function () {
						block.animate({
							top: top,
							opacity: '1',
							height: h,
							width: w
						}, iv.options.animationSpeed, iv.defs.easing, function () {
							if (i == totalBlocks - 1) iv.transitionEnd(iv);
						});
					}, (100 + timeDelay));
					timeDelay += 20;
				});
				break;
			case 'slide-in-right':
			case 'slide-in-left':
			case 'fade':
			default:
				opts = {
					strips: 1
				};
				iv.addStrips(false, opts);

				var strip = $('.iview-strip<?php echo $Rich_Web_VSlider_ID; ?>:first', iv.slider);
				strip.css({
					'height': '100%',
					'width': iv.defs.width
				});
				if (fx == 'slide-in-right') strip.css({
					'height': '100%',
					'width': iv.defs.width,
					'left': iv.defs.width + 'px',
					'right': ''
				});
				else if (fx == 'slide-in-left') strip.css({
					'left': '-' + iv.defs.width + 'px'
				});
				strip.animate({
					left: '0px',
					opacity: 1
				}, (iv.options.animationSpeed * 2), iv.defs.easing, function () {
					iv.transitionEnd(iv);
				});
				break;
			}
		},
		shuffle: function (oldArray) {
			var newArray = oldArray.slice();
			var len = newArray.length;
			var i = len;
			while (i--) {
				var p = parseInt(Math.random() * len);
				var t = newArray[i];
				newArray[i] = newArray[p];
				newArray[p] = t;
			}
			return newArray;
		},
		timerCall: function (iv) {
			iv.processTimer();
			if (iv.pieDegree >= 360) {
				iv.cleanTimer();
				iv.goTo(false);
			}
		},
		setTimer: function () {
			var iv = this;
			iv.timer = setInterval(function () {
				iv.timerCall(iv);
			}, (iv.defs.time / 120));
		},
		cleanTimer: function () {
			var iv = this;
			clearInterval(iv.timer);
			iv.timer = null;
		},
		goTo: function (action) {
			var iv = this;
			if (iv.defs && (iv.defs.slide == iv.defs.total - 1)) {
				iv.options.onLastSlide.call(this);
			}
			iv.cleanTimer();
			iv.iviewTimer.animate({
				opacity: 0
			});
			iv.options.onBeforeChange.call(this);
			if (!action) {
				iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
				iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
			} else {
				if (action == 'prev' || action == 'next') {
					iv.slider.css('background', 'url("' + iv.defs.image.data('iview:image') + '") no-repeat');
					iv.slider.css('background-size', ''+jQuery("#iview"+Rich_Web_VSlider_ID).width()+'px '+jQuery("#iview"+Rich_Web_VSlider_ID).height()+'px');
				}
			}
			iv.defs.slide++;
			if (iv.defs.slide == iv.defs.total) {
				iv.defs.slide = 0;
				iv.options.onSlideShowEnd.call(this);
			}
			if (iv.defs.slide < 0) iv.defs.slide = (iv.defs.total - 1);
			iv.defs.image = iv.slides.eq(iv.defs.slide);
			if (iv.options.controlNav) {
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control', iv.sliderContent).removeClass('active');
				$('.iview-controlNav<?php echo $Rich_Web_VSlider_ID; ?> a.iview-control:eq(' + iv.defs.slide + ')', iv.sliderContent).addClass('active');
			}
			var fx = iv.options.fx;
			if (iv.options.fx.toLowerCase() == 'random') {
				var transitions = new Array('left-curtain', 'right-curtain', 'top-curtain', 'bottom-curtain', 'strip-down-right', 'strip-down-left', 'strip-up-right', 'strip-up-left', 'strip-up-down', 'strip-up-down-left', 'strip-left-right', 'strip-left-right-down', 'slide-in-right', 'slide-in-left', 'slide-in-up', 'slide-in-down', 'fade', 'block-random', 'block-fade', 'block-fade-reverse', 'block-expand', 'block-expand-reverse', 'block-expand-random', 'zigzag-top', 'zigzag-bottom', 'zigzag-grow-top', 'zigzag-grow-bottom', 'zigzag-drop-top', 'zigzag-drop-bottom', 'strip-left-fade', 'strip-right-fade', 'strip-top-fade', 'strip-bottom-fade', 'block-drop-random');
				fx = transitions[Math.floor(Math.random() * (transitions.length + 1))];
				if (fx == undefined) fx = 'fade';
				fx = $.trim(fx.toLowerCase());
			}
			if (iv.options.fx.indexOf(',') != -1) {
				var transitions = iv.options.fx.split(',');
				fx = transitions[Math.floor(Math.random() * (transitions.length))];
				if (fx == undefined) fx = 'fade';
				fx = $.trim(fx.toLowerCase());
			}
			if (iv.defs.image.data('iview:transition')) {
				var transitions = iv.defs.image.data('iview:transition').split(',');
				fx = transitions[Math.floor(Math.random() * (transitions.length))];
				fx = $.trim(fx.toLowerCase());
			}
			iv.defs.easing = (iv.defs.image.data('iview:easing')) ? iv.defs.image.data('iview:easing') : iv.options.easing;
			iv.defs.lock = true;
			iv.runTransition(fx);
		},
		playSlider: function () {
			var iv = this;
			if (iv.timer == null && iv.defs.paused) {
				iv.iviewTimer.removeClass('paused').attr('title', iv.options.pauseLabel);
				iv.setTimer();
				iv.defs.paused = false;
				iv.options.onPlay.call(this);
			}
		},
		stopSlider: function () {
			var iv = this;
			iv.iviewTimer.addClass('paused').attr('title', iv.options.playLabel);
			iv.cleanTimer();
			iv.defs.paused = true;
			iv.options.onPause.call(this);
		},
		setTimerPosition: function(){
			var iv = this,
			position = iv.options.timerPosition.toLowerCase().split('-');
			for (var i = 0; i < position.length; i++) {
				if (position[i] == 'top') {
					iv.iviewTimer.css({
						top: iv.options.timerY + 'px',
						bottom: ''
					});
				} else if (position[i] == 'middle') {
					iv.iviewTimer.css({
						top: (iv.options.timerY + (iv.defs.height / 2) - (iv.options.timerDiameter / 2)) + 'px',
						bottom: ''
					});
				} else if (position[i] == 'bottom') {
					iv.iviewTimer.css({
						bottom: iv.options.timerY + 'px',
						top: ''
					});
				} else if (position[i] == 'left') {
					iv.iviewTimer.css({
						left: iv.options.timerX + 'px',
						right: ''
					});
				} else if (position[i] == 'center') {
					iv.iviewTimer.css({
						left: (iv.options.timerX + (iv.defs.width / 2) - (iv.options.timerDiameter / 2)) + 'px',
						right: ''
					});
				} else if (position[i] == 'right') {
					iv.iviewTimer.css({
						right: iv.options.timerX + 'px',
						left: ''
					});
				}
			}
		},
		disableSelection: function (target) {
			if (typeof target.onselectstart != "undefined") target.onselectstart = function () {
				return false;
			};
			else if (typeof target.style.MozUserSelect != "undefined") target.style.MozUserSelect = "none";
			else if (typeof target.style.webkitUserSelect != "undefined") target.style.webkitUserSelect = "none";
			else if (typeof target.style.userSelect != "undefined") target.style.userSelect = "none";
			else target.onmousedown = function () {
				return false;
			};
			target.unselectable = "on";
		},
		isTouch: function () {
			return !!('ontouchstart' in window);
		}
	};
	var ImagePreload = function (p_aImages, p_pfnPercent, p_pfnFinished) {
			this.m_pfnPercent = p_pfnPercent;
			this.m_pfnFinished = p_pfnFinished;
			this.m_nLoaded = 0;
			this.m_nProcessed = 0;
			this.m_aImages = new Array;
			this.m_nICount = p_aImages.length;
			for (var i = 0; i < p_aImages.length; i++) this.Preload(p_aImages[i])
		};
	ImagePreload.prototype = {
		Preload: function (p_oImage) {
			var oImage = new Image;
			this.m_aImages.push(oImage);
			oImage.onload = ImagePreload.prototype.OnLoad;
			oImage.onerror = ImagePreload.prototype.OnError;
			oImage.onabort = ImagePreload.prototype.OnAbort;
			oImage.oImagePreload = this;
			oImage.bLoaded = false;
			oImage.source = p_oImage;
			oImage.src = p_oImage
		},
		OnComplete: function () {
			this.m_nProcessed++;
			if (this.m_nProcessed == this.m_nICount) this.m_pfnFinished();
			else this.m_pfnPercent(Math.round((this.m_nProcessed / this.m_nICount) * 10))
		},
		OnLoad: function () {
			this.bLoaded = true;
			this.oImagePreload.m_nLoaded++;
			this.oImagePreload.OnComplete()
		},
		OnError: function () {
			this.bError = true;
			this.oImagePreload.OnComplete()
		},
		OnAbort: function () {
			this.bAbort = true;
			this.oImagePreload.OnComplete()
		}
	}
	$.fn.iView<?php echo $Rich_Web_VSlider_ID; ?> = function (options) {
		options = jQuery.extend({
			fx: 'random',
			easing: 'easeOutQuad',
			strips: 20,
			blockCols: 10,
			blockRows: 5,
			animationSpeed: 500,
			pauseTime: 15000,
			startSlide: 0,
			directionNav: true,
			directionNavHoverOpacity: 0.6,
			controlNav: false,
			controlNavNextPrev: true,
			controlNavHoverOpacity: 0.6,
			controlNavThumbs: false,
			controlNavTooltip: true,
			captionSpeed: 500,
			captionEasing: 'easeInOutSine',
			captionOpacity: 1,
			autoAdvance: true,
			keyboardNav: true,
			touchNav: true,
			pauseOnHover: false,
			nextLabel: "",
			previousLabel: "",
			playLabel: "Play",
			pauseLabel: "Pause",
			closeLabel: "Close",
			randomStart: false,
			timer: 'pie',
			timerBg: '#000',
			timerColor: '#EEE',
			timerOpacity: 0.5,
			timerDiameter: 30,
			timerPadding: 4,
			timerStroke: 3,
			timerBarStroke: 1,
			timerBarStrokeColor: '#EEE',
			timerBarStrokeStyle: 'solid',
			timerPosition: 'top-right',
			timerX: 10,
			timerY: 10,
			tooltipX: 5,
			tooltipY: -5,
			onBeforeChange: function () {},
			onAfterChange: function () {},
			onAfterLoad: function () {},
			onLastSlide: function () {},
			onSlideShowEnd: function () {},
			onPause: function () {},
			onPlay: function () {}
		}, options);
		$(this).each(function () {
			var el = $(this);
			new iView<?php echo $Rich_Web_VSlider_ID; ?>(el, options);
		});
	};
	$.fn.reverse = [].reverse;
	var elems = $([]),
		jq_resize = $.resize = $.extend($.resize, {}),
		timeout_id, str_setTimeout = "setTimeout",
		str_resize = "resize",
		str_data = str_resize + "-special-event",
		str_delay = "delay",
		str_throttle = "throttleWindow";
	jq_resize[str_delay] = 250;
	jq_resize[str_throttle] = true;
	$.event.special[str_resize] = {
		setup: function () {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false
			}
			var elem = $(this);
			elems = elems.add(elem);
			$.data(this, str_data, {
				w: elem.width(),
				h: elem.height()
			});
			if (elems.length === 1) {
				loopy()
			}
		},
		teardown: function () {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false
			}
			var elem = $(this);
			elems = elems.not(elem);
			elem.removeData(str_data);
			if (!elems.length) {
				clearTimeout(timeout_id)
			}
		},
		add: function (handleObj) {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false
			}
			var old_handler;
			function new_handler(e, w, h) {
				var elem = $(this),
					data = $.data(this, str_data);
				//data.w = w !== undefined ? w : elem.width();
				//data.h = h !== undefined ? h : elem.height();
				old_handler.apply(this, arguments)
			}
			if ($.isFunction(handleObj)) {
				old_handler = handleObj;
				return new_handler
			} else {
				old_handler = handleObj.handler;
				handleObj.handler = new_handler
			}
		}
	};
	function loopy() {
		timeout_id = window[str_setTimeout](function () {
			elems.each(function () {
				var elem = $(this),
					width = elem.width(),
					height = elem.height(),
					data = $.data(this, str_data);
				if (width !== data.w || height !== data.h) {
					elem.trigger(str_resize, [data.w = width, data.h = height])
				}
			});
			loopy()
		}, jq_resize[str_delay])
	}
	var supportTouch = !! ('ontouchstart' in window),
		touchStartEvent = supportTouch ? "touchstart" : "mousedown",
		touchStopEvent = supportTouch ? "touchend" : "mouseup",
		touchMoveEvent = supportTouch ? "touchmove" : "mousemove";
	$.event.special.swipe = {
		scrollSupressionThreshold: 10,
		durationThreshold: 1200,
		horizontalDistanceThreshold: 30,
		verticalDistanceThreshold: 75,
		setup: function () {
			var thisObject = this,
				$this = $(thisObject);
			$this.bind(touchStartEvent, function (event) {
				var data = event.originalEvent.touches ? event.originalEvent.touches[0] : event,
					start = {
						time: (new Date()).getTime(),
						coords: [data.pageX, data.pageY],
						origin: $(event.target)
					},
					stop;
				function moveHandler(event) {
					if (!start) {
						return;
					}
					var data = event.originalEvent.touches ? event.originalEvent.touches[0] : event;
					stop = {
						time: (new Date()).getTime(),
						coords: [data.pageX, data.pageY]
					};
					if (Math.abs(start.coords[0] - stop.coords[0]) > $.event.special.swipe.scrollSupressionThreshold) {
						event.preventDefault();
					}
				}
				$this.bind(touchMoveEvent, moveHandler).one(touchStopEvent, function (event) {
					$this.unbind(touchMoveEvent, moveHandler);
					if (start && stop) {
						if (stop.time - start.time < $.event.special.swipe.durationThreshold && Math.abs(start.coords[0] - stop.coords[0]) > $.event.special.swipe.horizontalDistanceThreshold && Math.abs(start.coords[1] - stop.coords[1]) < $.event.special.swipe.verticalDistanceThreshold) {
							start.origin.trigger("swipe").trigger(start.coords[0] > stop.coords[0] ? "swipeleft" : "swiperight");
						}
					}
					start = stop = undefined;
				});
			});
		}
	};
	$.each({
		swipeleft: "swipe",
		swiperight: "swipe"
	}, function (event, sourceEvent) {
		$.event.special[event] = {
			setup: function () {
				$(this).bind(sourceEvent, $.noop);
			}
		};
	});
	
})(jQuery, this);
				</script>
				<script>					
					jQuery(document).ready(function(){
						var dirNavCS = jQuery('.dirNavCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var pauseOnHoveCS = jQuery('.pauseOnHoveCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var RandomStartCS = jQuery('.RandomStartCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var controlNavCS = jQuery('.controlNavCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var controlNextPrevCS = jQuery('.controlNextPrevCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var navTumbsCS = jQuery('.navTumbsCS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						
						if(dirNavCS==''){ dirNavCS=false; }else{ dirNavCS=true; }
						if(pauseOnHoveCS==''){ pauseOnHoveCS=false; }else{ pauseOnHoveCS=true; }
						if(RandomStartCS==''){ RandomStartCS=false;	}else{ RandomStartCS=true; }
						if(controlNavCS==''){ controlNavCS=false; }else{ controlNavCS=true; }
						if(controlNextPrevCS==''){ controlNextPrevCS=false; }else{ controlNextPrevCS=true; }
						if(navTumbsCS==''){ navTumbsCS=false; }else{ navTumbsCS=true; }
						function opt(){
							jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').iView<?php echo $Rich_Web_VSlider_ID; ?>({
								fx: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CE;?>',
								easing: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_EE;?>',
								strips: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_S;?>,
								blockCols: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BlC;?>,
								blockRows: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BlR;?>,
								animationSpeed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AS;?>,
								pauseTime: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_PT*1200;?>,
								startSlide: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_SS-1;?>,
								directionNav: false,
								directionNavHoverOpacity: 0.6,
								controlNav: controlNavCS,
								controlNavNextPrev: controlNextPrevCS,
								controlNavHoverOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_NO/100;?>,
								controlNavThumbs: navTumbsCS,
								controlNavTooltip: true,
								captionSpeed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapS;?>,
								captionEasing: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapEs;?>',
								captionOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapO/100;?>,
								autoAdvance: dirNavCS,
								keyboardNav: true,
								touchNav: true,
								pauseOnHover: pauseOnHoveCS,
								nextLabel: "",
								previousLabel: "",
								playLabel: "Play",
								pauseLabel: "Pause",
								closeLabel: "Close",
								randomStart: RandomStartCS,
								timer: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiT;?>',
								timerBg: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TiBgC;?>',
								timerColor: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TiC;?>',
								timerOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiO/100;?>,
								timerDiameter: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiD;?>*jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+150),
								timerPadding: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiP;?>*jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+150),
								timerStroke: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiS;?>*jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+150),
								timerBarStroke: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBS;?>,    
								timerBarStrokeColor: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBC;?>',
								timerBarStrokeStyle: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBSt;?>',
								timerPosition: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiPos;?>',
								timerX: 10,
								timerY: 10,
								tooltipX: 5,
								tooltipY: 5
							});
						}
						//jQuery(window).on('load resize',function(){
						    opt();
						//})
						
					});
				</script>
				<script>
					jQuery(document).ready(function(){
						 var slWV=jQuery('.slWV<?php echo $Rich_Web_VSlider_ID; ?>').val();
						 var slHV=jQuery('.slHV<?php echo $Rich_Web_VSlider_ID; ?>').val();
						 var TFSV=jQuery('.TFSV<?php echo $Rich_Web_VSlider_ID; ?>').val();
						 var DFSV=jQuery('.DFSV<?php echo $Rich_Web_VSlider_ID; ?>').val();
						 var TitDescType=jQuery('.TitDescType<?php echo $Rich_Web_VSlider_ID; ?>').val();
						 var countVIDEOS=jQuery('.countVIDEOS<?php echo $Rich_Web_VSlider_ID; ?>').val();
						
						 function resp<?php echo $Rich_Web_VSlider_ID; ?>(){
						 	jQuery(".iview-caption").addClass("iview-caption_Anim");
						 	jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>,#iview<?php echo $Rich_Web_VSlider_ID; ?> .iviewSlider,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show').css('width',slWV+"px");
						 	jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>,#iview<?php echo $Rich_Web_VSlider_ID; ?> .iviewSlider,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show').css('height',slHV+"px");
						 	jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>,#iview<?php echo $Rich_Web_VSlider_ID; ?> .iviewSlider,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show').css('max-width',"100%");
						 	jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>,#iview<?php echo $Rich_Web_VSlider_ID; ?> .iviewSlider,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>,.iview-video<?php echo $Rich_Web_VSlider_ID; ?>-show').css('max-height',parseInt(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width())*slHV/slWV);
							
							if(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()<=400){
								jQuery('.Desc_Tot').removeClass('iview-caption_Anim');
								jQuery('#iview-timer<?php echo $Rich_Web_VSlider_ID; ?>').addClass('iview-timer_Anim');
							}else{
								jQuery('.Desc_Tot').addClass('iview-caption_Anim');
								jQuery('#iview-timer<?php echo $Rich_Web_VSlider_ID; ?>').removeClass('iview-timer_Anim');
							}
							
							jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain h3,.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain,.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4 .caption-contain,.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5 .caption-contain,.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 .caption-contain h3').css('font-size',TFSV*jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+150));
							jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?> .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6 .caption-contain,.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7 .caption-contain').css('font-size',DFSV*jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+150));
							if(TitDescType=='type1'){
								for(i=1;i<=countVIDEOS;i++)
								{
								    var x=jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('name');
									var y2=x2.split('');
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('name')==''){
										jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).css('padding','0px');
									}
									if(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>'+i).css('padding','0px');
									}
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('data-width',"auto");
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('data-width',"auto");
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('data-height',2*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size')));
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('data-height',2*parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>'+i).attr('data-height')+'px');
								} 
							}else if(TitDescType=='type2'){
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_2'+i).attr('name')=='' && jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2'+i).css('display','none');
									}
								}
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2').attr('data-width',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/3);
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_2').attr('data-height',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').height());
							}else if(TitDescType=='type3'){
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3').attr('data-width',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/1.5);
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3').attr('data-height',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').height()/5);
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('name')==''){
										jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).css('padding','0px');
									}
									if(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).css('display','none');
									}
									var x=jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('data-width',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3').css('font-size'))*y.length/1.5);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('data-height',2*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_3'+i).attr('data-height')+'px');
								} 
							}else if(TitDescType=='type4'){ 
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('name')==''){
										jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).css('padding','0px');
									}
									if(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).css('padding','0px');
									}
									var x=jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('data-width',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4').css('font-size'))*y.length/1.5);
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('data-width',parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4').css('font-size'))*y2.length/1.5);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('data-height',2*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4').css('font-size')));
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('data-height',2*parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_4').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_4'+i).attr('data-height')+'px');
								} 
							}else if(TitDescType=='type5'){ 
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('name')==''){
										jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).css('padding','0px');
									}
									if(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).css('padding','0px');
									}
									var x=jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-width',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5').css('font-size'))*y.length/1.5);
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-width',parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5').css('font-size'))*y2.length/1.5);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-height',2*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5').css('font-size')));
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-height',2*parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-height')+'px');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-x',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/8);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-y',"75%");
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-x',"25%");
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_5'+i).attr('data-y',"30%");

								} 
							}else if(TitDescType=='type6'){
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6').attr('data-width',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/1.5);
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6').attr('data-height',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').height()/5);
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('name')==''){
										jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).css('padding','0px');
									}
									if(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).css('display','none');
									}
									var x=jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-width',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6').css('font-size'))*y.length/1.5);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-height',2*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-height')+'px');
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-x',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/1.5-20);
									jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-y',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').height()/8);
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-x',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-x'))/8+2*parseInt(jQuery('.iview-caption').css('padding'))-5);
									jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-y',parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-y'))+1.5*parseInt(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_6'+i).attr('data-height'))+2*parseInt(jQuery('.iview-caption').css('padding'))+5);
								} 
							}else if(TitDescType=='type7'){
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol<?php echo $Rich_Web_VSlider_ID; ?>_7'+i).attr('name')=='' && jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7'+i).attr('name')==''){
										jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7'+i).css('display','none');
									}
								}
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7').attr('data-width',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width()/3);
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7').attr('data-height',jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').height());
								jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7').attr('data-x',parseInt(jQuery('#iview<?php echo $Rich_Web_VSlider_ID; ?>').width())-parseInt(jQuery('.descCol<?php echo $Rich_Web_VSlider_ID; ?>_7').attr('data-width')));
							}
						}
    				 	jQuery(window).on('load resize',function(){
						    resp<?php echo $Rich_Web_VSlider_ID; ?>();
						})
					})
				</script>
			<?php } else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Slick Slider'){ ;?>
				<meta charset='utf-8'> 
				<!-- <link rel="stylesheet" href="<?php echo plugins_url('/Style/smoothslides.theme.css',__FILE__);?>"> -->
				<style type="text/css">
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>, .smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on { position:relative; font-size:0; line-height: 0; min-height: 40px; width: 100% !important; height: 100% !important; }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?> { background:rgba(255,255,255,.5); }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?> img { display:none; }
					@keyframes throb { 0% {	opacity:0; transform:scale(1); } 50% { opacity:1; transform:scale(.2); } 100% { opacity:0; transform:scale(1); } }
					@-webkit-keyframes throb { 0% { opacity:0; -webkittransform:scale(1); }	50% { opacity:1; -webkittransform:scale(.2); } 100% { opacity:0; -webkittransform:scale(1); } }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>:before { content:''; position: absolute; width:8px; height:8px; left:50%; top:50%; margin-left:-4px; margin-top:-4px; border-radius:15px; border:2px solid #000; animation: throb 1s infinite; -webkit-animation: throb 1s infinite; }
					.ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?> { position: relative; overflow: hidden; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); width: 100% !important; height: 100% !important; }
					.ss-slide { position: absolute; top:0; left:0; transform-origin:center; display: block; width:100%; height:100%; zoom: 1; }
					.ss-slide img {	height:100%;width:100%; }
					.ss-caption-wrap<?php echo $Rich_Web_VSlider_ID; ?> { position: absolute; width:100%; padding:5px 5px 5px 5px; text-align:center; box-sizing:border-box; }
					.ss-caption<?php echo $Rich_Web_VSlider_ID; ?> { min-height:50px; font-weight: bold; line-height: 1.4em; padding-top:15px; box-sizing:border-box; }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>, .smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on a.ss-next<?php echo $Rich_Web_VSlider_ID; ?> { position: absolute; left:5px; text-decoration: none; width: 50px; height: 50px; text-align: center; opacity:.5; transition:.2s ease-out; font-family: sans-serif; }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on  a.ss-next<?php echo $Rich_Web_VSlider_ID; ?> { left:auto; right:5px; }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on:hover .ss-prev<?php echo $Rich_Web_VSlider_ID; ?>, .smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on:hover .ss-next<?php echo $Rich_Web_VSlider_ID; ?> { opacity: 1; }
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on .ss-prev<?php echo $Rich_Web_VSlider_ID; ?>:hover, .smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on .ss-next<?php echo $Rich_Web_VSlider_ID; ?>:hover { opacity: 1; }
					.ss-paginate-wrap<?php echo $Rich_Web_VSlider_ID; ?> { position: absolute; bottom:-20px; width:100%;text-align:center !important; }
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> { display: inline-block; line-height: 0; }
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:link, .ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:visited { display: inline-block; transition: .3s; }
					.clickPrNext { top:50% !important; transform:translateY(-50%) !important; -webkit-transform:translateY(-50%) !important; -ms-transform:translateY(-50%); }
					.center<?php echo $Rich_Web_VSlider_ID; ?> { margin:0 auto; }
					#demo<?php echo $Rich_Web_VSlider_ID; ?> .center<?php echo $Rich_Web_VSlider_ID; ?> { padding:0; transition:.2s; position: relative; cursor: pointer; width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_W;?>px;height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_H;?>px;max-width:100% !important;box-sizing:border-box !important; }
					#demo<?php echo $Rich_Web_VSlider_ID; ?> { width: 100%; float: left; }

					.center<?php echo $Rich_Web_VSlider_ID; ?>
					{
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BC;?>;
					}	
					.ss-caption-wrap<?php echo $Rich_Web_VSlider_ID; ?>
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TPos=='center'){ ?>
							top: 43%;
						<?php }else{ ?>
							<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TPos;?>: 0;
						<?php }?>
					}	
					.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFF;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TC;?>;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TBgC;?>;
					}	
					.smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>, .smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NPos=='center'){ ?>
							top: 44%;
						<?php }else{ ?>
							<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NPos;?>: 5px;
						<?php }?>
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NC;?>;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NBgC;?>;
						z-index:999;
					}
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-wrap<?php echo $Rich_Web_VSlider_ID; ?>
					{
						text-align: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagPos;?>;
					}	
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:link, .ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:visited
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagW;?>px;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagH;?>px;
						margin: 0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagPB;?>px;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBgC;?>;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBR;?>px;
						outline:none !important;
					}
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:hover 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagHC;?>;
					}
					.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagCC;?>;
					}
					.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>
					{
						position: absolute;
						top: 0;
						left: 0;
						-webkit-transform: translateX(-12000px);
					    -moz-transform: translateX(-12000px);
					    -o-transform: translateX(-12000px);
					    -ms-transform: translateX(-12000px);
					    transform: translateX(-12000px);
					    z-index: 9999;
					    -webkit-transition: all 0.7s ease-in-out;
                        -moz-transition: all 0.7s ease-in-out;
                        -o-transition: all 0.7s ease-in-out;
                        -ms-transition: all 0.7s ease-in-out;
                        transition: all 0.7s ease-in-out;
					}
					.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close
					{
						position: absolute;
						top: 50%;
						right: 0;
						width: 50px;
						height: 100px;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIC;?>;
						z-index: 999999;
						border-top-left-radius: 100px;
						border-bottom-left-radius: 100px;
						text-align: center;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>:hover .Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIHC;?>;
					}
					.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>
					{
						position: absolute;
						top: 50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9;
					    text-align: center;
					}
					.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 50px;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIC;?>;
						border-radius: 10px;
						cursor: pointer;
					}
					.center<?php echo $Rich_Web_VSlider_ID; ?>:hover .Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIHC;?>;
					}
					.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close span
					{
						position:relative;
						display: block;
					    top: 50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					    font-weight: bold;
					    font-size: 20px;
					}
				</style>
				<section id="demo<?php echo $Rich_Web_VSlider_ID; ?>" style='margin:25px auto'>
					<div class="center<?php echo $Rich_Web_VSlider_ID; ?>" style='max-width:100%;'>
						<div class="Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>" >
							<iframe  class="Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Iframe" src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<div class="Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close" onclick="Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Clos()">
								<span> < </span>
							</div>
						</div>
						<div class="Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>" onclick="Rich_Web_VSlider_Play_Video<?php echo $Rich_Web_VSlider_ID; ?>()">
							<span> ►</span>
						</div>
						<div class="smoothslides<?php echo $Rich_Web_VSlider_ID; ?>" id="myslideshow1<?php echo $Rich_Web_VSlider_ID; ?>">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
								<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" alt="<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>" onclick="Rich_Web_VSlider_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>?rel=0&amp')" class="Rich_Web_VSldier_SS_Img_<?php echo $Rich_Web_VSlider_ID; ?><?php echo $i;?>" id="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>?rel=0&amp"/>
							<?php } ?>
						</div>						
					</div>
				</section>
				<input type='text' style='display:none;' class='SLWidthSC<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_W;?>'>
				<input type='text' style='display:none;' class='SLHeightSC<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_H;?>'>
				<input type='text' style='display:none;' class='SLTitFSSC<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFS;?>'>
				<input type='text' style='display:none;' class='SLIcSSC<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NS;?>'>
				<!-- <script type="text/javascript" src="<?php echo plugins_url('/Scripts/smoothslides.js',__FILE__);?>"></script> -->
				<script>
					(function($) {
						$.fn.extend({
							smoothslides<?php echo $Rich_Web_VSlider_ID; ?>: function(options) {
								var defaults = {
									effectDuration: 5000,
									transitionDuration: 500,
									autoPlay: 'true',
									effect: 'zoomOut,zoomIn,panUp,panDown,panLeft,panRight,diagTopLeftToBottomRight,diagTopRightToBottomLeft,diagBottomRightToTopLeft,diagBottomLeftToTopRight',
									effectEasing: 'ease-in-out',
									nextText: ' ►',
									prevText: '◄ ',
									captions: 'true',
									navigation: 'true',
									pagination: 'true',
									matchImageSize: 'true'
								}
								var options = $.extend(defaults, options),
									that = this,
									uniqueId = $(this).attr('id'),
									fullTime= options.effectDuration + options.transitionDuration,
									maxWidth = $(this).find('img').width()
								if (options.transitionDuration >= options.effectDuration) {
									console.log("Make sure effectDuration is greater than transitionDuration");
								}
								$('#'+uniqueId).removeClass('smoothslides<?php echo $Rich_Web_VSlider_ID; ?>').addClass('smoothslides<?php echo $Rich_Web_VSlider_ID; ?>-on');
								function fadeOutLast() {
									if (document.all && !window.atob){
										$('#'+uniqueId).find('.ss-slide:last').animate({
											'opacity':'0'
										})
										console.log('1');
									} else {
										console.log('2');
										$('#'+uniqueId).find('.ss-slide:last').css({
											'transition':'all '+options.transitionDuration+'ms',
											'opacity':'0'
										});
									}
								}
								that.crossFade = function() {
									fadeOutLast();
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1)  rotate(0deg)'
										});
									}, options.transitionDuration);
								}
								that.zoomOut = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.2) rotate(1.5deg)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1)  rotate(0deg)'
										});
									}, options.transitionDuration);
								}
								that.zoomIn = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.1) rotate(-1.5deg)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) rotate(0deg)'
										});
									}, options.transitionDuration);
								}
								that.panLeft = function() {
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateX(10%)'
									});
									fadeOutLast();
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								that.panRight = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateX(-10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								that.panUp = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%)'
										});
									}, options.transitionDuration);
								}
								that.panDown = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(-10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%)'
										});
									}, options.transitionDuration);
								}
								that.diagTopLeftToBottomRight = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(-10%) translateX(-10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								that.diagBottomRightToTopLeft= function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(10%) translateX(10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								that.diagTopRightToBottomLeft = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(-10%) translateX(10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								that.diagBottomLeftToTopRight = function() {
									fadeOutLast();
									$(this).find('.ss-slide:eq(-2)').css({
										'transition':'none',
										'transform':'scale(1.3) translateY(10%) translateX(-10%)'
									});
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1.3) translateY(0%) translateX(0%)'
										});
									}, options.transitionDuration);
								}
								if(options.matchImageSize == 'true') {
									$('#'+uniqueId).css('maxWidth',maxWidth);
									$('#'+uniqueId+' img').css('maxWidth','100%');
								} else {
									$('#'+uniqueId+' img').css('width','100%');
								}
								$(this).children().each(function(){
									$(this).wrap('<div class="ss-slide"></div>');
								});
								$('#'+ uniqueId +' .ss-slide').each(function() {
									$(this).prependTo('#'+uniqueId);
								});
								$('#'+uniqueId+' .ss-slide:first').css('position','relative');
								if(options.autoPlay == 'true') {
									$(".ss-slide:first", this).appendTo(this)
								}
								$(this).wrapInner("<div class='ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>'></div>")
								$(".ss-slide",this).each(function(){
									$(this).css({
										transition: 'all ' + options.effectDuration + 'ms ' + options.effectEasing +''
									});
								});
								function captionUpdate() {
									var nextCaption = $('#'+uniqueId).find('.ss-slide:eq(-2) img').prop('alt');
									if (!nextCaption) {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','0');
									} else {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','1').html(nextCaption);
									}
								}
								function captionUpdateBack() {
									var nextCaption = $('#'+uniqueId).find('.ss-slide:eq(-1) img').prop('alt');
									if (!nextCaption) {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','0');
									} else {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','1').html(nextCaption);
									}
								}
								if (options.captions == 'true') {
									$(that).append("<div class='ss-caption-wrap<?php echo $Rich_Web_VSlider_ID; ?>'><div class='ss-caption<?php echo $Rich_Web_VSlider_ID; ?>'></div></div>");
									if (options.autoPlay == 'true') {
										captionUpdate();
									} else {
										var nextCaption = $('#'+uniqueId).find('.ss-slide:last img').prop('alt');
										if (!nextCaption) {
											$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','0');
										} else {
											$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','1').html(nextCaption);
										}
									}
								}
								if (options.navigation == 'true') {
									$(that).append('<a href="#" class="ss-prev<?php echo $Rich_Web_VSlider_ID; ?> ss-prev<?php echo $Rich_Web_VSlider_ID; ?>-on">' + options.prevText + '</a><a href="#" class="ss-next<?php echo $Rich_Web_VSlider_ID; ?> ss-next<?php echo $Rich_Web_VSlider_ID; ?>-on">' + options.nextText + '</a>');
								}
								if (options.pagination == 'true') {
									$(that).append('<div class="ss-paginate-wrap<?php echo $Rich_Web_VSlider_ID; ?>"><div class="ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>"></div></div>');
									$(".ss-slide",that).each(function() {
										$('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>', that).append('<a href="#"></a>');
									});
									if (options.autoPlay == "true") {
										$('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:last', that).addClass("ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current");
									} else {
										$('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:first', that).addClass("ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current");
									}
								}
								function paginationUpdate() {

									var total = $(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a').length;
									var	current = $(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').index();
									var next = current + 1;				
									if (next >= total) {
										$(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').removeClass();
										$(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:eq(0)').addClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current');
									} else {
										$(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').removeClass();
										$(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:eq('+ next +')').addClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current');
									}
								}
								function paginationUpdateBack() {
									var total = $(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a').length;
									var	current = $(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').index();
									var next = current - 1;				
									if (next <= -2) {
										$(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').removeClass();
										$(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:eq('+total+')').addClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current');
									} else {
										$(that).find('a.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').removeClass();
										$(that).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:eq('+ next +')').addClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current');
									}
								}
								var autoPlay = function () {
									if (document.all && !window.atob){
										that.crossFade();
									} else {
										effectArray = options.effect.split(',');
										var effect = effectArray[Math.floor(Math.random() * effectArray.length)];
										that[effect]();
									}
									captionUpdate();
									paginationUpdate();
								}
								if (options.autoPlay == 'true') {
									autoPlay();
									var playInterval = setInterval(autoPlay, fullTime);
								}
								$('.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>, .ss-next<?php echo $Rich_Web_VSlider_ID; ?>, .ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>', that).mouseover(function() {
									clearInterval(playInterval);
								}).mouseout(function() {
									playInterval = setInterval(autoPlay, fullTime);
								});
								$('#'+uniqueId).on('click', '.ss-next<?php echo $Rich_Web_VSlider_ID; ?>-on', function(event) {
									$('.ss-next<?php echo $Rich_Web_VSlider_ID; ?>-on', that).removeClass('ss-next<?php echo $Rich_Web_VSlider_ID; ?>-on');
									$(that).find('.ss-slide:last').css({
										'transition':'all '+options.transitionDuration+'ms',
										'opacity':'0'
									});			
									captionUpdate();
									paginationUpdate();
									setTimeout(function(){
										$(that).find('.ss-slide:last').prependTo($(".ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>", that)).css({
											'opacity':'1',
											'transform':'none'
										});
										$(that).find('.ss-slide:last').css({
											'transition': 'all ' + options.effectDuration + 'ms ' + options.effectEasing +'',
											'transform':'scale(1)  rotate(0deg)'
										});
										$('.ss-next<?php echo $Rich_Web_VSlider_ID; ?>', that).addClass('ss-next<?php echo $Rich_Web_VSlider_ID; ?>-on');
									}, options.transitionDuration);
									event.preventDefault();
								});
								$('#'+uniqueId).on('click', '.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>-on', function(event) {
									$('.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>-on', that).removeClass('ss-prev<?php echo $Rich_Web_VSlider_ID; ?>-on');
									$('#'+uniqueId).find(".ss-slide:first").css({
										'transition':'none',
										'opacity':'0'
									}).appendTo('#'+uniqueId+' .ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>');
									$('#'+uniqueId).find('.ss-slide:last').css('opacity');
									$('#'+uniqueId).find('.ss-slide:last').css({
										'transition':'all '+options.transitionDuration+'ms',
										'opacity':'1'
									});
									captionUpdateBack();
									paginationUpdateBack();
									setTimeout(function(){
										$('.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').addClass('ss-prev<?php echo $Rich_Web_VSlider_ID; ?>-on');
										
									}, options.transitionDuration);
									event.preventDefault();
								});
								$('#'+uniqueId).on('click', '.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>, .ss-next<?php echo $Rich_Web_VSlider_ID; ?>', function(event) {
									event.preventDefault();
								});
								$('#'+uniqueId).on('click', '.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a', function(event) {
									var dotClicked = $(this).index(); // 0 indexed
									var currentDot = $('#'+uniqueId+' .ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').index(); // 0 indexed
									if (dotClicked < currentDot) {
										var iterate = (currentDot - dotClicked);
										for (var i = 0; i < iterate; i++) {
											$('#'+uniqueId).find('.ss-slide:first').appendTo('#'+uniqueId+' .ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>');
										}
									} else if (dotClicked > currentDot) {
										var iterate = (dotClicked - currentDot);
										for (var i = 0; i < iterate; i++) {
											$('#'+uniqueId).find('.ss-slide:last').prependTo('#'+uniqueId+' .ss-slide-stage<?php echo $Rich_Web_VSlider_ID; ?>');
										}
									}
									$('#'+uniqueId).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current').removeClass();
									$('#'+uniqueId).find('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a:eq('+dotClicked+')').addClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current');
									var nextCaption = $('#'+uniqueId).find('.ss-slide:eq(-1) img').prop('alt');
									if (!nextCaption) {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','0');
									} else {
										$('#'+uniqueId).find(".ss-caption<?php echo $Rich_Web_VSlider_ID; ?>").css('opacity','1').html(nextCaption);
									}
									event.preventDefault();
								});
							}
						});
					})(jQuery);
				</script>
				<script type="text/javascript">
					jQuery(window).load( function() {
						jQuery('#myslideshow1<?php echo $Rich_Web_VSlider_ID; ?>').smoothslides<?php echo $Rich_Web_VSlider_ID; ?>({
							effectDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_ED*1000;?>,
							transitionDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PT;?>,
							autoPlay: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_AP=='on'){echo 'true';}else{echo 'false';}?>',
							effect: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_Eff;?>',
							effectEasing: 'ease-in-out',
							nextText: ' ►',
							prevText: '◄ ',
							captions: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TShow=='on'){echo 'true';}else{echo 'false';}?>',
							navigation: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NShow=='on'){echo 'true';}else{echo 'false';}?>',
							pagination: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagShow=='on'){echo 'true';}else{echo 'false';}?>',
							matchImageSize: 'false'
						});
					});
				</script>
				<script>
					function Rich_Web_VSlider_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>(Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>)
					{
						jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
						jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});

						jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src',Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>);
					}
					function Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Clos()
					{
						var RW_VS_SS_W=jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width();
						jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>').css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
						jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src','');
						jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('display','inline');
					}
					function Rich_Web_VSlider_Play_Video<?php echo $Rich_Web_VSlider_ID; ?>()
					{
						var Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>;
						jQuery('.ss-paginate<?php echo $Rich_Web_VSlider_ID; ?> a').each(function(){
							if(jQuery(this).hasClass('ss-paginate<?php echo $Rich_Web_VSlider_ID; ?>-current'))
							{
								Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>=jQuery('.Rich_Web_VSldier_SS_Img_<?php echo $Rich_Web_VSlider_ID; ?>'+jQuery(this).index()).attr('id');
							}
						})
						Rich_Web_VSlider_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>(Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>);
					}
				</script>
				<script>
					jQuery(document).ready(function(){
						var SLWidthSC = jQuery('.SLWidthSC<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var SLHeightSC = jQuery('.SLHeightSC<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var SLTitFSSC = jQuery('.SLTitFSSC<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var SLIcSSC = jQuery('.SLIcSSC<?php echo $Rich_Web_VSlider_ID; ?>').val();
						
						function resp<?php echo $Rich_Web_VSlider_ID; ?>(){
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').css('width','100%');
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>').css('width','100%');
							jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').css('height',SLHeightSC/SLWidthSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width());
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').css('height','100%');
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>').css('height','100%');
							
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close').css('width',50*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width()+150));
							jQuery('.Rich_Web_VSldier_Src<?php echo $Rich_Web_VSlider_ID; ?>_Close').css('height',100*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').width()+150));
							jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('width',80*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+250));
							jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('height',50*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+250));
							jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('height',50*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()+250));
							jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('line-height',jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').height()+'px');
							jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('font-size',jQuery('.Rich_Web_VSldier_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').height()/2+'px');
							if(parseInt(jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').css('width'))<=450){
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').addClass('clickPrNext');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').addClass('clickPrNext');
								jQuery('.ss-caption-wrap<?php echo $Rich_Web_VSlider_ID; ?>').css('padding','0px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('width',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('height',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('width',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('height',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000);
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000+'px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',3*SLIcSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/1000+'px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('padding','0px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('min-height','0px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLTitFSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/450);
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',SLTitFSSC*jQuery('.center<?php echo $Rich_Web_VSlider_ID; ?>').parent().parent().width()/450+2+'px');
							}else{
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').removeClass('clickPrNext');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').removeClass('clickPrNext');
								jQuery('.ss-caption-wrap<?php echo $Rich_Web_VSlider_ID; ?>').css('padding','5px');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('width',3*SLIcSSC+'px');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('height',3*SLIcSSC+'px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('width',3*SLIcSSC+'px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('height',3*SLIcSSC+'px');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',3*SLIcSSC+'px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',3*SLIcSSC+'px');
								jQuery('a.ss-prev<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLIcSSC+'px');
								jQuery('a.ss-next<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLIcSSC+'px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('padding-top',SLIcSSC+'px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('min-height',3*SLIcSSC+'px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',SLTitFSSC+'px');
								jQuery('.ss-caption<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',SLTitFSSC+'px');
							}
						}
						jQuery(window).load(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						})
						jQuery(window).resize(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						})
					})	
				</script>
				
			<?php } else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Thumbnails Slider'){ ?>
				<style type="text/css">
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>{
						width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
						height:auto !important;
						max-width:100% !important;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BC;?> !important;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #gallery-main<?php echo $Rich_Web_VSlider_ID; ?> { margin: 0 auto; padding: 0; z-index: 0; position: relative; cursor: pointer; width:100% !important; }
					#gallery-main<?php echo $Rich_Web_VSlider_ID; ?> img { height: 100%; width: 100%; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #gallery-hidden<?php echo $Rich_Web_VSlider_ID; ?> { margin: 0; padding: 0; position: absolute; display: none; z-index: -1; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> { height: 132px; z-index: 10; opacity: 0.9; position: relative; margin: 0 auto; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?>:hover { -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> { height: 100%; display: inline-block; margin: 0; overflow: hidden; white-space: nowrap; float: left; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb:hover { -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .selected { -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .ui-button { width: 32px; height: 32px; opacity: 0.60; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .ui-button:hover { -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; opacity: 1; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #left-arrow<?php echo $Rich_Web_VSlider_ID; ?> { position:relative; top: 50%; margin-left: 1px; margin-right: 1px; display: inline-block; float: left; transform:translateY(-50%); -webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #right-arrow<?php echo $Rich_Web_VSlider_ID; ?> { position:relative; top: 50%; margin-right: 1px; margin-left: 1px; display: inline-block; float: right; transform:translateY(-50%); -webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon { position:absolute; display: inline-block; width: 100%; height: 100%; top:0%; left:0%; background-repeat: no-repeat; cursor: pointer; z-index: 22; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon-play { background: url(<?php echo plugins_url('/Images/play.png',__FILE__);?>) no-repeat center center; background-size:50% 50%; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon:after,#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon:before{
						content:"";
						background:none !important;
						border:none !important;
					}
					
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon-pause { background: url(<?php echo plugins_url('/Images/stop.png',__FILE__);?>) no-repeat center center; background-size:50% 50%; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon-arrow-right { background: url(<?php echo plugins_url('/Images/next.png',__FILE__);?>) no-repeat center center; background-size:75% 45%; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .icon-arrow-left { background: url(<?php echo plugins_url('/Images/prev.png',__FILE__);?>) no-repeat center center; background-size:75% 45%; -moz-transition: all 0.5s ease; -webkit-transition: all 0.5s ease; -o-transition: all 0.5s ease; transition: all 0.5s ease; }
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #gallery-main<?php echo $Rich_Web_VSlider_ID; ?> 
					{
  						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
  						
						box-sizing:border-box !important;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							border-top:none;
  						<?php }else{ ?>
  							border-bottom:none;
  						<?php }?>
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType=='on' && $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType==''){ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }?>
  						<?php }?>		  						
					}
					#gallery-main<?php echo $Rich_Web_VSlider_ID; ?>_Anim{
						position:absolute !important;
						top:0px !important;
						left:0px !important;
						width:100% !important;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> {
					  margin: 25px auto;
					  padding: 0;
					  border: 1px solid rgba(0, 0, 0, 0);
					  position: relative;
					  box-sizing:border-box !important;
					  width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> 
					{
						position:relative;
						width: 100% !important;
						height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIH+24;?>px;
						box-sizing:border-box !important;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							border-bottom: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBC;?>;
  						<?php }else{ ?>
  							border-top: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBC;?>;
  						<?php }?>
  						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBgC;?>;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType=='on' && $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='bottom'){ ?>
  								-webkit-box-shadow:  0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow:  0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType==''){ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }?>
  						<?php }?>	
					}
					.Rich_Web_VSlider_TS_Src_Iframe<?php echo $Rich_Web_VSlider_ID; ?>{
						border:none !important;
						border-bottom:none !important;
						box-sizing:border-box !important;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?>
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W-110;?>px;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
						#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #playtoggle<?php echo $Rich_Web_VSlider_ID; ?> {
						  	position: absolute;
						    top: 140px;
						    right: 10px;
						}
					<?php }else{ ?>
						#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #playtoggle<?php echo $Rich_Web_VSlider_ID; ?> {
						  	position: absolute;
						    top: -40px;
						    right: 10px;
						}
					<?php }?>
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .ui-button
					{
  						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBgC;?>;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBC;?>;
  						-moz-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-webkit-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-o-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-ms-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-khtml-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb
					{
  						margin: 12px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIPB;?>px;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBC;?>;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBR;?>px;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
  							<?php }?>
  						<?php }?>
						width: auto;
						height: 0px;
						display: inline;
						opacity: 1;
						-moz-transition: all 0.5s ease;
						-webkit-transition: all 0.5s ease;
						-o-transition: all 0.5s ease;
						transition: all 0.5s ease;
						cursor: pointer;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb:hover
					{
						border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBC;?>;
						border-style: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBS;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
  							<?php }?>
  						<?php }?>	
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .selected
					{
						border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBC;?>;
						border-style: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBS;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>
					{
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_H;?>px;
  						width: 100% !important;
  						margin: 0 auto;
  						position: absolute;
  						left: 0;
  						right: 0;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							bottom: 0;
						<?php }else{ ?>
							top: 0;
						<?php }?>
						display: none;
						z-index: 9999;
					}
					.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>
					{
						position: absolute;
						top:50% !important;
						transform:translateY(-50%) !important;	
						-webkit-transform:translateY(-50%) !important;
						-ms-transform:translateY(-50%) !important;
						-moz-transform:translateY(-50%) !important;
						-o-transform:translateY(-50%) !important;					
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9999;
					    text-align: center;						
					}
					.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 50px;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIC;?>;
						border-radius: 10px;
						cursor: pointer;
					}
					#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>:hover .Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIHC;?>;
					}						
				</style>
				<section id="gallery-con<?php echo $Rich_Web_VSlider_ID; ?>">
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
						<section id="thumbnails<?php echo $Rich_Web_VSlider_ID; ?>" style="padding:0px;">
							<div id="left-arrow<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button"><div class="icon icon-arrow-left"></div></div>
							<div id="thumbcon<?php echo $Rich_Web_VSlider_ID; ?>">
							</div>
							<div id="right-arrow<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button"><div class="icon icon-arrow-right"></div></div>
							<div id="playtoggle<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button">
								<div class="icon <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ echo 'icon-pause'; }else{ echo 'icon-play'; }?>"></div>
							</div>
						</section>
					<?php }?>
					<section id="gallery-main<?php echo $Rich_Web_VSlider_ID; ?>" class="Rich_Web_Gallery_Main">
						<img src="<?php echo $Rich_Web_VSlider_Videos[0]->Rich_Web_VSldier_Add_Img;?>" onclick="Rich_Web_VSlider_TS_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>('<?php echo $Rich_Web_VSlider_Videos[0]->Rich_Web_VSldier_Add_Src;?>')"/>
						
					</section>
					<section id="gallery-main<?php echo $Rich_Web_VSlider_ID; ?>_Anim" class="Rich_Web_Gallery_Main">
						<div class="Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>" onclick="Rich_Web_VSlider_TS_Play_Video<?php echo $Rich_Web_VSlider_ID; ?>()">
							<span> ►</span>
						</div>
					</section>
					<section id="gallery-hidden<?php echo $Rich_Web_VSlider_ID; ?>">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" onclick="Rich_Web_VSlider_TS_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>')"/>
						<?php } ?>
					</section>
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='bottom'){ ?>
						<section id="thumbnails<?php echo $Rich_Web_VSlider_ID; ?>" style="padding:0px;">
							<div id="left-arrow<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button" onclick="Rich_Web_VSlider_TS_Close_Video<?php echo $Rich_Web_VSlider_ID; ?>()"><div class="icon icon-arrow-left"></div></div>
							<div id="thumbcon<?php echo $Rich_Web_VSlider_ID; ?>">
							</div>
							<div id="right-arrow<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button" onclick="Rich_Web_VSlider_TS_Close_Video<?php echo $Rich_Web_VSlider_ID; ?>()"><div class="icon icon-arrow-right"></div></div>
							<div id="playtoggle<?php echo $Rich_Web_VSlider_ID; ?>" class="ui-button">
								<div class="icon <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ echo 'icon-pause'; }else{ echo 'icon-play'; }?>"></div>
							</div>
						</section>
					<?php }?>
					<div class="Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>">
						<iframe class="Rich_Web_VSlider_TS_Src_Iframe<?php echo $Rich_Web_VSlider_ID; ?>" src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					</div>
					
				</section>
				<input type='text' style='display:none;' class='marginLeft' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIPB;?>'>
				<input type='text' style='display:none;' class='SlWidth3<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>'>
				<input type='text' style='display:none;' class='SlHeight3<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_H;?>'>
				<input type='text' style='display:none;' class='carDivWidth<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>'>
				<input type='text' style='display:none;' class='carDivImgHeight<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIH;?>'>
				<input type='text' style='display:none;' class='BW<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>'>
				<input type='text' style='display:none;' class='carTopLeft<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos;?>'>				
				<script>
					function Rich_Web_VSlider_TS_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>(Rich_Web_VSldier_Src)
					{
						jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
						jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_VSlider_TS_Src_Iframe<?php echo $Rich_Web_VSlider_ID; ?>').attr('src',Rich_Web_VSldier_Src+'?autoplay=1&rel=0&amp');
						jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
					}
					function Rich_Web_VSlider_TS_Play_Video<?php echo $Rich_Web_VSlider_ID; ?>()
					{
						var Rich_Web_VSldier_Src;
						jQuery('#thumbcon<?php echo $Rich_Web_VSlider_ID; ?> img').each(function(){
							if(jQuery(this).hasClass('selected'))
							{
								Rich_Web_VSldier_Src=jQuery(this).attr('alt');
							}
						})
						Rich_Web_VSlider_TS_Open_Video<?php echo $Rich_Web_VSlider_ID; ?>(Rich_Web_VSldier_Src)
					}
					function Rich_Web_VSlider_TS_Close_Video<?php echo $Rich_Web_VSlider_ID; ?>()
					{
						jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
						jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_VSlider_TS_Src_Iframe<?php echo $Rich_Web_VSlider_ID; ?>').attr('src', '');
						jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
					}
				</script>
				<script defer >
					var $transitionLength<?php echo $Rich_Web_VSlider_ID; ?> = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_CS;?>;
					var $timeBetweenTransitions = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PT*1000;?>;
					//STORAGE
					var imageCount<?php echo $Rich_Web_VSlider_ID; ?> = 0;
					var currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?> = 0;
					var currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> = 1;
					var $imageBank<?php echo $Rich_Web_VSlider_ID; ?> = [];
					var $thumbBank<?php echo $Rich_Web_VSlider_ID; ?> = [];
					var $mainContainer<?php echo $Rich_Web_VSlider_ID; ?> = jQuery("#gallery-main<?php echo $Rich_Web_VSlider_ID; ?>");
					var $thumbContainer<?php echo $Rich_Web_VSlider_ID; ?> = jQuery("#thumbcon<?php echo $Rich_Web_VSlider_ID; ?>");
					var $progressBar<?php echo $Rich_Web_VSlider_ID; ?> = jQuery("#progressbar<?php echo $Rich_Web_VSlider_ID; ?>");
					var currentElement;
					//CONTROLS
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ ?>
						var $go<?php echo $Rich_Web_VSlider_ID; ?> = true;
					<?php }else{ ?>
						var $go<?php echo $Rich_Web_VSlider_ID; ?> = false;
					<?php }?>
					jQuery(document).ready(function(){
						jQuery("#gallery-hidden<?php echo $Rich_Web_VSlider_ID; ?> img").each(function() {
							$imageBank<?php echo $Rich_Web_VSlider_ID; ?>.push(jQuery(this).attr("id", imageCount<?php echo $Rich_Web_VSlider_ID; ?>));
							imageCount<?php echo $Rich_Web_VSlider_ID; ?>++;
						});
						generateThumbs<?php echo $Rich_Web_VSlider_ID; ?>();
						setTimeout(function () {
							imageScroll<?php echo $Rich_Web_VSlider_ID; ?>(0);
						}, $timeBetweenTransitions);
						jQuery('#left-arrow<?php echo $Rich_Web_VSlider_ID; ?>').click(function () {
							thumbScroll<?php echo $Rich_Web_VSlider_ID; ?>("left");
							toggleScroll<?php echo $Rich_Web_VSlider_ID; ?>(true);
					    });
						jQuery('#right-arrow<?php echo $Rich_Web_VSlider_ID; ?>').click(function () {
							thumbScroll<?php echo $Rich_Web_VSlider_ID; ?>("right");
							toggleScroll<?php echo $Rich_Web_VSlider_ID; ?>(true);
					    });
						jQuery('#thumbcon<?php echo $Rich_Web_VSlider_ID; ?> img').on('click',function () {

							imageFocus<?php echo $Rich_Web_VSlider_ID; ?>(this);
						});
						jQuery('#playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').click(function () {
							toggleScroll<?php echo $Rich_Web_VSlider_ID; ?>(false);
						});
					});
					function progress<?php echo $Rich_Web_VSlider_ID; ?>(imageIndex){
						var parts = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>/imageCount<?php echo $Rich_Web_VSlider_ID; ?>-1;
						var pxProgress = parts*(imageIndex+1);

						$progressBar<?php echo $Rich_Web_VSlider_ID; ?>.css({ width: pxProgress , transition: "all 0.7s ease"});
					}
					function imageFocus<?php echo $Rich_Web_VSlider_ID; ?>(focus){
						for(var i = 0; i < imageCount<?php echo $Rich_Web_VSlider_ID; ?>; i++){
							if($imageBank<?php echo $Rich_Web_VSlider_ID; ?>[i].attr('src') == jQuery(focus).attr('src')){
								$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.fadeOut($transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
								$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?>].removeClass("selected");
								setTimeout(function () {
									$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.html($imageBank<?php echo $Rich_Web_VSlider_ID; ?>[i]);
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[i].addClass("selected");
									$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.fadeIn($transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
								}, $transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
								currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> = i+1;
								currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?> = i;
								progress<?php echo $Rich_Web_VSlider_ID; ?>(currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?>);
								toggleScroll<?php echo $Rich_Web_VSlider_ID; ?>(true);
								return false;
							}
						}
					}
					function toggleScroll<?php echo $Rich_Web_VSlider_ID; ?>(bool){
						if($go<?php echo $Rich_Web_VSlider_ID; ?>){
							$go<?php echo $Rich_Web_VSlider_ID; ?> = false;
							jQuery('#playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').children().removeClass('icon-pause').addClass('icon-play');
						}else{
							$go<?php echo $Rich_Web_VSlider_ID; ?> = true;
							jQuery('#playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').children().removeClass('icon-play').addClass('icon-pause');
						}
						if(bool){
							$go<?php echo $Rich_Web_VSlider_ID; ?> = false;
							jQuery('#playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').children().removeClass('icon-pause').addClass('icon-play');
						}
					}
					var y=false;
					function autoScroll<?php echo $Rich_Web_VSlider_ID; ?>(){
						if(y==true){
							return;
						}
						var imgW=jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb').width();
						var mLeft=jQuery('.marginLeft').val();
						AutImgW=parseInt(imgW)+2*parseInt(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb').css('border-width'))+2*parseInt(mLeft);
						var tumCWidth=jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?>').width();
						if(currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> >= 0 || currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> < imageCount<?php echo $Rich_Web_VSlider_ID; ?>){
							if(parseInt($thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css('margin-left'))<=-parseInt((imageCount<?php echo $Rich_Web_VSlider_ID; ?>)*AutImgW-parseInt(tumCWidth))){
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: "5px" , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> = 1;
								}else{
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: "-="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?>++;
								}
						}
					}
					function thumbScroll<?php echo $Rich_Web_VSlider_ID; ?>(direction){
						if(y==true){
							return;
						}
						y=true;
						var imgW=jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb').width();
						var mLeft=jQuery('.marginLeft').val();
						AutImgW=parseInt(imgW)+2*parseInt(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb').css('border-width'))+2*parseInt(mLeft);
						var tumCWidth=jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?>').width();
						if(currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> >= 0 || currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> < imageCount<?php echo $Rich_Web_VSlider_ID; ?>){
							var marginTemp = currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?>;
							var k=0;
							if(direction == "left"){
								if(currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?>-1 <= 0){
									k = ((imageCount<?php echo $Rich_Web_VSlider_ID; ?>)*AutImgW-parseInt(tumCWidth));
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: -k , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> = imageCount<?php echo $Rich_Web_VSlider_ID; ?>-1;
								}else{
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: "+="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?>--;
								}
							}else if(direction == "right"){
								if(parseInt($thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css('margin-left'))<=-parseInt((imageCount<?php echo $Rich_Web_VSlider_ID; ?>)*AutImgW-parseInt(tumCWidth))){
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: "5px" , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?> = 1;
								}else{
									$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[0].css({ marginLeft: "-="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex<?php echo $Rich_Web_VSlider_ID; ?>++;
								}
							}
						}
						setTimeout(function(){
							y=false;
						},1000)
					}
					function generateThumbs<?php echo $Rich_Web_VSlider_ID; ?>(){
						progress<?php echo $Rich_Web_VSlider_ID; ?>(currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?>);
						for(var i = 0; i < imageCount<?php echo $Rich_Web_VSlider_ID; ?>; i++){
							var $tempObj<?php echo $Rich_Web_VSlider_ID; ?> = jQuery('<img id="'+i+'t" class="thumb thumb<?php echo $Rich_Web_VSlider_ID; ?>" src="'+$imageBank<?php echo $Rich_Web_VSlider_ID; ?>[i].attr('src')+'" alt="'+$imageBank<?php echo $Rich_Web_VSlider_ID; ?>[i].attr('onclick').split("('")[1].split("')")[0]+'" onclick="Rich_Web_VSlider_TS_Close_Video<?php echo $Rich_Web_VSlider_ID; ?>()"/>');
							if(i == 0)
								$tempObj<?php echo $Rich_Web_VSlider_ID; ?>.addClass("selected");
							$thumbContainer<?php echo $Rich_Web_VSlider_ID; ?>.append($tempObj<?php echo $Rich_Web_VSlider_ID; ?>);
							$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>.push($tempObj<?php echo $Rich_Web_VSlider_ID; ?>);
						}
					}
					function imageScroll<?php echo $Rich_Web_VSlider_ID; ?>(c){
						if($go<?php echo $Rich_Web_VSlider_ID; ?>){
							$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[c].removeClass("selected");
							c++
							if(c == $imageBank<?php echo $Rich_Web_VSlider_ID; ?>.length)
								c = 0;
							$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.fadeOut($transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
							setTimeout(function () {
								$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.html($imageBank<?php echo $Rich_Web_VSlider_ID; ?>[c]);
								$thumbBank<?php echo $Rich_Web_VSlider_ID; ?>[c].addClass("selected");
								autoScroll<?php echo $Rich_Web_VSlider_ID; ?>("left");
								$mainContainer<?php echo $Rich_Web_VSlider_ID; ?>.fadeIn($transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
							}, $transitionLength<?php echo $Rich_Web_VSlider_ID; ?>);
						}
						progress<?php echo $Rich_Web_VSlider_ID; ?>(c);
						setTimeout(function () {
							imageScroll<?php echo $Rich_Web_VSlider_ID; ?>(currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?>);
						}, $timeBetweenTransitions);
						currentImageIndex<?php echo $Rich_Web_VSlider_ID; ?> = c;
					}
				</script>
				<script>
					// jQuery(document).ready(function(){
						var SlWidth3 = jQuery('.SlWidth3<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var SlHeight3 = jQuery('.SlHeight3<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var carDivWidth = jQuery('.carDivWidth<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var carDivImgHeight = jQuery('.carDivImgHeight<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var BW = jQuery('.BW<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var carTopLeft = jQuery('.carTopLeft<?php echo $Rich_Web_VSlider_ID; ?>').val();			
						function resp<?php echo $Rich_Web_VSlider_ID; ?>(){
							// jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').css('width',SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').parent().width()/1000);
							// jQuery('#gallery-main<?php echo $Rich_Web_VSlider_ID; ?>').css('width',SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').parent().width()/1000);
							jQuery('#gallery-main<?php echo $Rich_Web_VSlider_ID; ?>,#gallery-main<?php echo $Rich_Web_VSlider_ID; ?>_Anim').css('height',SlHeight3/SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width());
							// jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?>').css('width',SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').parent().width()/1000);
							// jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>').css('width',SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').parent().width()/1000);
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> .Rich_Web_TS_Play_Video_Div<?php echo $Rich_Web_VSlider_ID; ?>').css('height',SlHeight3/SlWidth3*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width());							
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?> .thumb').css('height',carDivImgHeight*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?>').css('height',carDivImgHeight*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250)+24);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('width',80*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('height',50*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('font-size',25*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?> span').css('line-height',50*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/1000+'px');
							jQuery('.Rich_Web_VSlider_TS_PlayIcon<?php echo $Rich_Web_VSlider_ID; ?>').css('height',50*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/1000);
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .ui-button').css('width',32*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> .ui-button').css('height',32*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
							if(carTopLeft=='bottom'){
								jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').css('top',-40*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
							}else{
								jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').css('top',carDivImgHeight*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250)+26);
							}							
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #playtoggle<?php echo $Rich_Web_VSlider_ID; ?>').css('right',10*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
							jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?> #thumbnails<?php echo $Rich_Web_VSlider_ID; ?> #thumbcon<?php echo $Rich_Web_VSlider_ID; ?>').css('width',jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()-15-64*jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()/(jQuery('#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>').width()+250));
						}						
						// jQuery("#gallery-con<?php echo $Rich_Web_VSlider_ID; ?>").load(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						// })	
						setTimeout(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						},200)					
						jQuery(window).resize(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						})
					// })
				</script>
 		 	<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Carousel/Content Popup'){ ?>
				<!-- <link href="<?php echo plugins_url('/Style/carSt.css',__FILE__);?>" rel="stylesheet" type="text/css" /> -->
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.anoslide.js',__FILE__);?>"></script>
				<style type="text/css">
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> { position:relative; min-height: 20px; height:auto !important;  background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Bg_Color;?> center center no-repeat;border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Color;?>;box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Box_Shadow;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Shadow_Color;?>;}
					.wrap<?php echo $Rich_Web_VSlider_ID; ?> {
						padding-left: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_PBImgs;?>px;
						padding-right: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_PBImgs;?>px;
						width:100% !important;
						box-sizing:border-box !important;
					}
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> .next<?php echo $Rich_Web_VSlider_ID; ?>,
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> .prev<?php echo $Rich_Web_VSlider_ID; ?> { display:none; width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size;?>px; height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size;?>px; position:absolute; bottom:0px; z-index:9999; cursor:pointer; border:none; }
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> .prev<?php echo $Rich_Web_VSlider_ID; ?> {background:url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'.png',__FILE__);?>) 0 0 no-repeat;background-size:100% 100%; top:50%; transform:translateY(-50%); -webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); left:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size/2;?>px;}
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> .next<?php echo $Rich_Web_VSlider_ID; ?> {background:url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'.png',__FILE__);?>) 0 0 no-repeat;background-size:100% 100%;right:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size/2;?>px; top:50%;transform:translateY(-50%); -webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);}
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> li { display:none; padding:0px !important;background:none !important; }
					.carousel<?php echo $Rich_Web_VSlider_ID; ?> li img { width:100%; height:auto; max-width:none;}
					.paging { position:absolute; z-index:9998; }
					.paging > a { display:block; cursor:pointer; width:40px; height:40px; float:left; background:url(<?php echo plugins_url('/Images/dots.png',__FILE__);?>) 0px -40px no-repeat; }
					.paging > a:hover,
					.paging > a.current { background:url(<?php echo plugins_url('/Images/dots.png',__FILE__);?>) 0px 0px no-repeat;  }
					img {
					  -webkit-user-select: none;  /* Chrome all / Safari all */
					  -moz-user-select: none;     /* Firefox all */
					  -ms-user-select: none;      /* IE 10+ */
					  -o-user-select: none;
					  user-select: none;    
					}
					.popF1<?php echo $Rich_Web_VSlider_ID; ?>{
						position:fixed;
						background:red;
						left:0px;
						width:100%;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						height:0%;
						z-index:99999999;
						-webkit-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popF1<?php echo $Rich_Web_VSlider_ID; ?>_1{
						height:100% !important;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>{
						position:fixed;
						background:#fff;
						left:50%;
						width:0%;
						top:50%;
						border-radius:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						height:0%;
						z-index:99999999;
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Box_Shadow;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Shadow_Color;?>;
						-webkit-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>_1{
						height:500px;
						width:1000px;
						max-width:90%;
						border-radius:0%;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>_2{
						height:420px;
						width:560px;
						max-width:90%;
						border-radius:0%;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>_rel{
						position:relative;
						overflow:hidden;
						width:100%;
						height:100%;
					}
					.vid{
						position:relative;
						width:50%;
						height:60%;
						float:left;
						margin:2%;
					}
					.videoo<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						top:-150%;
						left:0px;
						width:100%;
						height:100%;
						-webkit-transition: all 350ms linear; 
						-moz-transition: all 350ms linear; 
						-o-transition: all 350ms linear; 
						transition: all 350ms linear;
					}
					.videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim{
						top:0% !important;
						-webkit-transition: all 250ms linear; 
						-moz-transition: all 250ms linear; 
						-o-transition: all 250ms linear; 
						transition: all 250ms linear;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>{
						position:relative;
						width:40%;
						height:90%;
						float:right;
						margin:2%;
						overflow:hidden;
					}
					.descr<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						margin:0px 10px 0px 10px;
						margin-bottom:0px;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim{
						position:absolute;
						width:100%;
						height:100%;
						left:100%;
						background:red;
						overflow-x:hidden;
						-webkit-transition: all 350ms linear; 
						-moz-transition: all 350ms linear; 
						-o-transition: all 350ms linear; 
						transition: all 350ms linear;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim2{
						left:0px !important;
						-webkit-transition: all 250ms linear; 
						-moz-transition: all 250ms linear; 
						-o-transition: all 250ms linear; 
						transition: all 250ms linear;
					}	
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>3{
						width:100% !important;
						height:28% !important;
						float:none !important;
						margin:0px !important;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>3 h2{
						text-align:center !important;
					}
					.popL<?php echo $Rich_Web_VSlider_ID; ?>{
						position: absolute;
						right: 0px;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Size;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Family;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Color;?>;
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Bg_Color;?>;
						bottom: 0px;
						border-radius:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Radius;?>px;
						transform:translateY(120%);
						-webkit-transform:translateY(120%);
						-ms-transform:translateY(120%);
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Color;?>;
						border-width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px !important;
						text-decoration: none !important;
						padding: 3px 10px;
						display:none;
						transition:all 0.4s linear;
						z-index:9999;
					}
					.popL<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Bg_Color;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Color;?>;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Border_Color;?>;
						text-decoration:none;
					}
					.minTit<?php echo $Rich_Web_VSlider_ID; ?>{
						position: absolute;
						left: 0px;
						font-size: 20px;
						bottom: 0px;
						transform:translateY(120%);
						-webkit-transform:translateY(120%);
						-ms-transform:translateY(120%);
						padding: 3px 10px;
						display:none;
					}
					.figurForImg<?php echo $Rich_Web_VSlider_ID; ?>{
						width:100%;
						height:100%;
						overflow:hidden;
						margin-left:0%;
						margin:0px;
					}
					.fImgH1{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						max-width:none;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH1:hover {
						width:150%;
						margin-left:-25%;
						margin-top:-25%;
					}
					.fImgH2{
						position:relative;
						transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						-ms-transform:rotate(0deg);
						width:100%;
						height:50px;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.2s ease-in;
						-webkit-transition:all 0.2s ease-in;
						-ms-transition:all 0.2s ease-in;
					}
					.fImgH2:hover{
						transform:rotate(45deg);
						-webkit-transform:rotate(45deg);
						-ms-transform:rotate(45deg);
						width:250%;
						margin-left:-25%;
						margin-top:-15%;
					}
					.fImgH3{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH3:hover {
						width:150%;
					}
					.fImgH4{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH4:hover {
						width:150%;
						margin-left:-50%;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Bg_Color;?>;
					}
					.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;
					}
					.comment_content ul li:before, .entry-content ul li:before{
						display:none;
					}
				</style>
				<div class="wrapper">
					<div class="carousel<?php echo $Rich_Web_VSlider_ID; ?>" data-mixed>
						<a class="prev<?php echo $Rich_Web_VSlider_ID; ?>" data-prev></a>
						<ul class='forPoppUll<?php echo $Rich_Web_VSlider_ID; ?>' style='list-style:none;margin:5px;padding:0px;'>
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
								<li class='forPopp<?php echo $Rich_Web_VSlider_ID; ?>' onclick='popp<?php echo $Rich_Web_VSlider_ID; ?>("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>?rel=0&amp","<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>","<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>","<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>","<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT;?>")' >
									<div class="wrap<?php echo $Rich_Web_VSlider_ID; ?>" >
										<figure class='figurForImg<?php echo $Rich_Web_VSlider_ID; ?>'>
											<img class='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Imgs_Hover_Type;?>'  src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>"  />
										</figure>
									</div>
								</li>
							<?php } ?>
						</ul>
						<a class="next<?php echo $Rich_Web_VSlider_ID; ?>" data-next ></a>
					</div>
				</div>
				<div class='popF1<?php echo $Rich_Web_VSlider_ID; ?>' onclick='delPopp<?php echo $Rich_Web_VSlider_ID; ?>()' style='background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Overlay_Bg_Color;?>;'></div>
				<div class='popVideo1<?php echo $Rich_Web_VSlider_ID; ?>' style='opacity:0;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Bg_Color;?>;border-style:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Style;?>;border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Color;?>;'>
				<i class='rich_web <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Type;?>' id='IconForPop<?php echo $Rich_Web_VSlider_ID; ?>' style='position:absolute;top:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size/3*2;?>px;font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size;?>px;right:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size/3*2;?>px;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Color;?>;cursor:pointer;z-index:2;display:none;' onclick='delPopp<?php echo $Rich_Web_VSlider_ID; ?>()'>
				</i>
					<div class='popVideo1<?php echo $Rich_Web_VSlider_ID; ?>_rel'>
						<div class='vid'>
							<iframe class='videoo<?php echo $Rich_Web_VSlider_ID; ?>' src="" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<a href='#' class='popL<?php echo $Rich_Web_VSlider_ID; ?>'>
								<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Text;?>
							</a>
							<span class='minTit<?php echo $Rich_Web_VSlider_ID; ?>' style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Color;?>;'>
							</span>
						</div>
						<div class='titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>'>
							<div class='titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim' style='background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Bg_Color;?>;'>
								<h2 class='tit<?php echo $Rich_Web_VSlider_ID; ?>' style='pasdding:0px;margin:0px;margin-bottom:20px;text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Text_Align;?>;font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Color;?>;'>
								</h2>
								<p class='descr<?php echo $Rich_Web_VSlider_ID; ?>' style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Text_Align;?>'>
								</p>
							</div>
						</div>
					</div>
				</div>
				<input type='text' style='display:none;' class='imgCols<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Count_Imgs;?>' />
				<input type='text' style='display:none;' class='imgCount<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo count($Rich_Web_VSlider_Videos);?>' />
				<input type='text' style='display:none;' class='poppTitleFS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>' />
				<input type='text' style='display:none;' class='poppDescFS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Size;?>' />
				<input type='text' style='display:none;' class='poppLinkFS<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Size;?>' />
				
				<script>
					var poppTitleFS=jQuery('.poppTitleFS<?php echo $Rich_Web_VSlider_ID; ?>').val();
					var poppDescFS=jQuery('.poppDescFS<?php echo $Rich_Web_VSlider_ID; ?>').val();
					var poppLinkFS=jQuery('.poppLinkFS<?php echo $Rich_Web_VSlider_ID; ?>').val();
					function resp2<?php echo $Rich_Web_VSlider_ID; ?>(){
						if(jQuery(window).width()<=1100){
							jQuery('.tit<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',poppTitleFS*jQuery(window).width()/1100);
							jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',poppTitleFS*jQuery(window).width()/1100);
							jQuery('.descr<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',poppDescFS*jQuery(window).width()/1100);
							jQuery('.descr<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',parseInt(jQuery('.descr<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size'))+2+'px');
							jQuery('.tit<?php echo $Rich_Web_VSlider_ID; ?>').css('margin-bottom',20*jQuery(window).width()/1100);
							jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size',poppLinkFS*jQuery(window).width()/1100);
							jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('line-height',jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('font-size'));
						}
					}
					jQuery(window).load(function(){
						resp2<?php echo $Rich_Web_VSlider_ID; ?>();
					})
					jQuery(window).on('load resize',function(){
						resp2<?php echo $Rich_Web_VSlider_ID; ?>();
					})
					var y=false;
					function popp<?php echo $Rich_Web_VSlider_ID; ?>(src,title,desc,link,Ont){
						y=true;
						jQuery('.popF1<?php echo $Rich_Web_VSlider_ID; ?>').addClass('popF1<?php echo $Rich_Web_VSlider_ID; ?>_1');
						jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').attr('src',src);
						jQuery('.tit<?php echo $Rich_Web_VSlider_ID; ?>').text(title);
						jQuery('.descr<?php echo $Rich_Web_VSlider_ID; ?>').text(desc);
						setTimeout(function(){
							if(desc==''){
								jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
								jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/2+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
									jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').addClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
								});
								jQuery('.vid').css({'width':'100%','margin':'0px','height':'80%',});
								jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
								jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').text(title);
								jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('right','5px');
								jQuery('#IconForPop<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
								if(link!=''){
									jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
									jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('href',link);
									jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('target',Ont);
								}else{
									jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
								}
								jQuery(window).resize(function(){
									if(y==true){
										jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/2+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
											jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').addClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
										});
									}
									
								})
							}else{
								jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
								
								if(jQuery(window).width()<=600){
									jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/1.5+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
										jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').addClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
									});
									jQuery('.vid').css({'width':'100%','margin':'0px','height':'70%',});
									jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim').addClass('titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim2');
									jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>').addClass('titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>3');
									//jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
									//jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').text(title);
									jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('right','5px');
									jQuery('#IconForPop<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
									if(link!=''){
										jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
										jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('href',link);
										jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('target',Ont);
									}else{
										jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
									}
									jQuery(window).resize(function(){
										if(y==true){
											jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/1.5+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
												jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').addClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
											});
										}
										
									})
								}else{
									jQuery('.vid').css('height','70%');
									jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({'opacity':'1','height':'500px','width':'1000px','max-width':'85%','border-radius':'0%','max-height':jQuery(window).width()/3+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
										jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').addClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
										if(desc==''){
											jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
										}else{
											jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim').addClass('titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim2');
										}
										if(link!=''){
											jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
											jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('href',link);
											jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').attr('target',Ont);
										}else{
											jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
										}
										jQuery('#IconForPop<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
										jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
										jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('right','0px');
									});	
									jQuery(window).resize(function(){
										if(y==true){
											jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({"opacity":"1","height":"500px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/3+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400);
										}
										
									})				
								}
												
							}
						},150)
					}
					
					function delPopp<?php echo $Rich_Web_VSlider_ID; ?>(){
						y=false;
						jQuery('#IconForPop<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
						jQuery('.popL<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
						jQuery('.minTit<?php echo $Rich_Web_VSlider_ID; ?>').css('display','none');
						jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').removeClass('videoo<?php echo $Rich_Web_VSlider_ID; ?>_anim');
						jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim').removeClass('titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>_anim2');
						//jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>_rel').find('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').attr('src','');
						jQuery('.videoo<?php echo $Rich_Web_VSlider_ID; ?>').attr('src','');
						setTimeout(function(){
							jQuery('.popVideo1<?php echo $Rich_Web_VSlider_ID; ?>').animate({'opacity':'0','height':'0px','width':'0px','max-width':'85%','border-radius':'50%','max-height':jQuery(window).width()/3+'px','border-width':'0px',},100);	
						},150)
						setTimeout(function(){
							jQuery('.popF1<?php echo $Rich_Web_VSlider_ID; ?>').removeClass('popF1<?php echo $Rich_Web_VSlider_ID; ?>_1');
							jQuery('.titleDescLink<?php echo $Rich_Web_VSlider_ID; ?>').css('display','block');
							jQuery('.vid').css({'width':'50%','margin':'2%'})
						},250)
					}
				</script>
				<script type="text/javascript">
					var sum=0;
					var imgCols = parseInt(jQuery('.imgCols<?php echo $Rich_Web_VSlider_ID; ?>').val());
					var imgCount = parseInt(jQuery('.imgCount<?php echo $Rich_Web_VSlider_ID; ?>').val());
					console.log(imgCount + ' ' + imgCols);
					if(imgCount<imgCols){
						sum=imgCount;
					}else{
						sum=imgCols;
					}
					jQuery('.carousel<?php echo $Rich_Web_VSlider_ID; ?>[data-mixed] ul').anoSlide(
					{
						items: parseInt(sum),
						speed: 500,
						prev: 'a.prev<?php echo $Rich_Web_VSlider_ID; ?>[data-prev]',
						next: 'a.next<?php echo $Rich_Web_VSlider_ID; ?>[data-next]',
						lazy: true,
						delay: 100
					})
					function resp(){
						jQuery('.forPoppUll<?php echo $Rich_Web_VSlider_ID; ?>').css('min-height',jQuery('.forPopp<?php echo $Rich_Web_VSlider_ID; ?>').innerWidth()/1.853-3+'px');
						jQuery('.forPoppUll<?php echo $Rich_Web_VSlider_ID; ?>').css('max-height',jQuery('.forPopp<?php echo $Rich_Web_VSlider_ID; ?>').innerWidth()/1.853-3+'px');
					}
					jQuery(window).load(function(){
						resp();
					})
					jQuery(window).resize(function(){
						resp();
					})
				</script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Simple Video Slider'){ ?>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/Simple_Video_Slider.css',__FILE__);?>">
				<style media="screen">
					.RichWeb_SVS_<?php echo $Rich_Web_Video;?>{
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BC;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>
					{
						max-width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_W;?>px;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-bullet-nav 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_Show!='on'){ ?> 
							display: none;
						<?php }?>
						<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_Pos;?>: 5%;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-bullet-nav a 
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_W;?>px;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_H;?>px;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BR;?>px;
						margin:0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_PB;?>px;
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_C;?>;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-bullet-nav a.iis-bullet-active
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_CC;?>; 
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-bullet-nav a:hover 
					{ 
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_HC;?>; 
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-caption 
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TBgC;?>;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-caption .iis-caption-content span
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TC;?>;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFF;?>;
						display:block;
						text-align:center;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-caption .iis-caption-content p
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFF;?>;
						text-align: justify;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-caption .iis-caption-content a
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LFF;?>;
						text-decoration: underline;
						border: 0;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-caption .iis-caption-content a:hover
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LHC;?>;
					}
					.RichWeb_SVS_<?php echo $Rich_Web_Video;?>
					{
						position: relative;
						max-width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_W;?>px;
						margin: 20px auto;
					}
					.Rich_Web_SVS_Nav
					{
						position: absolute;
					    top: 50%;
					    z-index: 999999;
					    display:<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Show=='on'){ echo 'block !important';}else{ echo 'none !important';}?>;
					    text-align: center;
					    background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_C;?>;
					    padding: 10px 15px;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_S;?>px;
					    text-decoration: none;
					    cursor: pointer;
					    border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BC;?>;
					    border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BR;?>px;
					    opacity: 0;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_SVS_Nav:hover
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_C;?>;
					}
					.Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>
					{
						left: 2%;
					}
					.Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>
					{
						right: 2%;
					}
					.RichWeb_SVS iframe
					{
						width: 100%;
						height: 100%;
						position: absolute;
						top: 0;
						left: 0;
						z-index: -1;
					}
					.Rich_Web_VSlider_SVS_PlayIcon
					{
						position: absolute;
						top: 50%;
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9999;
					    text-align: center;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_VSlider_SVS_PlayIcon span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 100%;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIBR;?>px;
						cursor: pointer;
					}
					.RichWeb_SVS_<?php echo $Rich_Web_Video;?>:hover .Rich_Web_VSlider_SVS_PlayIcon span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIHBgC;?> !important;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIHC;?> !important;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-has-bullet-nav .iis-caption::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-has-bullet-nav .iis-caption::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TBgC;?>;
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?> .iis-has-bullet-nav .iis-caption::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
					}
					.Rich_Web_SVS_Nav{
						
					}
				</style>
				<div class="RichWeb_SVS RichWeb_SVS_<?php echo $Rich_Web_Video;?>">
					<div id="Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" data-src-2x="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" data-caption="#caption-<?php echo $Rich_Web_Video . $i?>"/>
						<?php } ?>
					</div>
					<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on' || $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
							<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' || $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != ''){ ?>
								<div id="caption-<?php echo $Rich_Web_Video . $i?>" style="display:none;">
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on'){ ?>
										<span><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></span>
									<?php }?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
										<p><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?></p>
										<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?>
											<a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){ echo '_blank'; } ?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LText;?></a>
										<?php }?>
									<?php }?>							
								</div>
							<?php }?>
						<?php }?>
					<?php } ?>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Prev Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>" onclick="RIch_Web_SVS_Close_Video(<?php echo $Rich_Web_Video;?>)"><i class='rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type;?>-left' ></i></a>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Next Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>" onclick="RIch_Web_SVS_Close_Video(<?php echo $Rich_Web_Video;?>)"><i class='rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type;?>-right' ></i></a>
					<iframe src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<div class="Rich_Web_VSlider_SVS_PlayIcon" >
						<span onclick="RIch_Web_SVS_Play_Video(<?php echo $Rich_Web_Video;?>)"> ►</span>
					</div>
				</div>
				<input type='text' style='display:none;' class='RichVSTitle<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFS;?>'>
				<input type='text' style='display:none;' class='RichVSDesc<?php echo $Rich_Web_VSlider_ID; ?>' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFS;?>'>
				<script type="text/javascript">
					var IdealImageSlider = (function() {
						"use strict";
						var _requestAnimationFrame = function(win, t) {
							return win["r" + t] || win["webkitR" + t] || win["mozR" + t] || win["msR" + t] || function(fn) {
								setTimeout(fn, 1000 / 60);
							};
						}(window, 'equestAnimationFrame');
						var _requestTimeout = function(fn, delay) {
							var start = new Date().getTime(),
								handle = {};
							function loop() {
								var current = new Date().getTime(),
									delta = current - start;
								if (delta >= delay) {
									fn.call();
								} else {
									handle.value = _requestAnimationFrame(loop);
								}
							}
							handle.value = _requestAnimationFrame(loop);
							return handle;
						};
						var _isType = function(type, obj) {
							var _class = Object.prototype.toString.call(obj).slice(8, -1);
							return obj !== undefined && obj !== null && _class === type;
						};
						var _isInteger = function(x) {
							return Math.round(x) === x;
						};
						var _deepExtend = function(out) {
							out = out || {};
							for (var i = 1; i < arguments.length; i++) {
								var obj = arguments[i];
								if (!obj)
									continue;
								for (var key in obj) {
									if (obj.hasOwnProperty(key)) {
										if (_isType('Object', obj[key]) && obj[key] !== null)
											_deepExtend(out[key], obj[key]);
										else
											out[key] = obj[key];
									}
								}
							}
							return out;
						};
						var _hasClass = function(el, className) {
							if (!className) return false;
							if (el.classList) {
								return el.classList.contains(className);
							} else {
								return new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
							}
						};
						var _addClass = function(el, className) {
							if (!className) return;
							if (el.classList) {
								el.classList.add(className);
							} else {
								el.className += ' ' + className;
							}
						};
						var _removeClass = function(el, className) {
							if (!className) return;
							if (el.classList) {
								el.classList.remove(className);
							} else {
								el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
							}
						};
						var _toArray = function(obj) {
							return Array.prototype.slice.call(obj);
						};
						var _arrayRemove = function(array, from, to) {
							var rest = array.slice((to || from) + 1 || array.length);
							array.length = from < 0 ? array.length + from : from;
							return array.push.apply(array, rest);
						};
						var _addEvent = function(object, type, callback) {
							if (object === null || typeof(object) === 'undefined') return;

							if (object.addEventListener) {
								//object["on" + type] = callback;
								object.addEventListener(type, callback, false);
							} else if (object.attachEvent) {
								object.attachEvent("on" + type, callback);
							} else {
								object["on" + type] = callback;
							}
						};
						var _loadImg = function(slide, callback) {
							if (!slide.style.backgroundImage) {
								var img = new Image();
								img.setAttribute('src', slide.getAttribute('data-src'));
								img.onload = function() {
									slide.style.backgroundImage = 'url(' + slide.getAttribute('data-src') + ')';
									slide.setAttribute('data-actual-width', this.naturalWidth);
									slide.setAttribute('data-actual-height', this.naturalHeight);
									if (typeof(callback) === 'function') callback(this);
								};
							}
						};
						var _isHighDPI = function() {
							var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";
							if (window.devicePixelRatio > 1)
								return true;
							if (window.matchMedia && window.matchMedia(mediaQuery).matches)
								return true;
							return false;
						};
						var _translate = function(slide, dist, speed) {
							slide.style.webkitTransitionDuration =
								slide.style.MozTransitionDuration =
								slide.style.msTransitionDuration =
								slide.style.OTransitionDuration =
								slide.style.transitionDuration = speed + 'ms';
							slide.style.webkitTransform =
								slide.style.MozTransform =
								slide.style.msTransform =
								slide.style.OTransform = 'translateX(' + dist + 'px)';
						};
						var _unTranslate = function(slide) {
							slide.style.removeProperty('-webkit-transition-duration');
							slide.style.removeProperty('transition-duration');
							slide.style.removeProperty('-webkit-transform');
							slide.style.removeProperty('-ms-transform');
							slide.style.removeProperty('transform');
						};
						var _animate = function(item) {
							var duration = item.time,
								end = +new Date() + duration;
							var step = function() {
								var current = +new Date(),
									remaining = end - current;
								if (remaining < 60) {
									item.run(1); //1 = progress is at 100%
									return;
								} else {
									var progress = 1 - remaining / duration;
									item.run(progress);
								}
								_requestAnimationFrame(step);
							};
							step();
						};
						var _setContainerHeight = function(slider, shouldAnimate) {
							if (typeof shouldAnimate === 'undefined') {
								shouldAnimate = true;
							}
							if (_isInteger(slider.settings.height)) {
								return;
							}
							var currentHeight = Math.round(slider._attributes.container.offsetHeight),
								newHeight = currentHeight;
							if (slider._attributes.aspectWidth && slider._attributes.aspectHeight) {
								newHeight = (slider._attributes.aspectHeight / slider._attributes.aspectWidth) * slider._attributes.container.offsetWidth;
							} else {
								var width = slider._attributes.currentSlide.getAttribute('data-actual-width');
								var height = slider._attributes.currentSlide.getAttribute('data-actual-height');
								if (width && height) {
									newHeight = (height / width) * slider._attributes.container.offsetWidth;
								}
							}
							var maxHeight = parseInt(slider.settings.maxHeight, 10);
							if (maxHeight && newHeight > maxHeight) {
								newHeight = maxHeight;
							}
							newHeight = Math.round(newHeight);
							if (newHeight === currentHeight) {
								return;
							}
							if (shouldAnimate) {
								_animate({
									time: slider.settings.transitionDuration,
									run: function(progress) {
										slider._attributes.container.style.height = Math.round(progress * (newHeight - currentHeight) + currentHeight) + 'px';
									}
								});
							} else {
								slider._attributes.container.style.height = newHeight + 'px';
							}
						};
						var _touch = {
							vars: {
								start: {},
								delta: {},
								isScrolling: undefined,
								direction: null
							},
							start: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								var touches = event.touches[0];
								_touch.vars.start = {
									x: touches.pageX,
									y: touches.pageY,
									time: +new Date()
								};
								_touch.vars.delta = {};
								_touch.vars.isScrolling = undefined;
								_touch.vars.direction = null;
								this.stop(); // Stop slider
								this.settings.beforeChange.apply(this);
								_addClass(this._attributes.container, this.settings.classes.touching);
							},
							move: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								if (event.touches.length > 1 || event.scale && event.scale !== 1) return;
								var touches = event.touches[0];
								_touch.vars.delta = {
									x: touches.pageX - _touch.vars.start.x,
									y: touches.pageY - _touch.vars.start.y
								};
								if (typeof _touch.vars.isScrolling == 'undefined') {
									_touch.vars.isScrolling = !!(_touch.vars.isScrolling || Math.abs(_touch.vars.delta.x) < Math.abs(_touch.vars.delta.y));
								}
								if (!_touch.vars.isScrolling) {
									event.preventDefault(); // Prevent native scrolling
									_translate(this._attributes.previousSlide, _touch.vars.delta.x - this._attributes.previousSlide.offsetWidth, 0);
									_translate(this._attributes.currentSlide, _touch.vars.delta.x, 0);
									_translate(this._attributes.nextSlide, _touch.vars.delta.x + this._attributes.currentSlide.offsetWidth, 0);
								}
							},
							end: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								var duration = +new Date() - _touch.vars.start.time;
								var isChangeSlide = Number(duration) < 250 && Math.abs(_touch.vars.delta.x) > 20 || Math.abs(_touch.vars.delta.x) > this._attributes.currentSlide.offsetWidth / 2;
								var direction = _touch.vars.delta.x < 0 ? 'next' : 'previous';
								var speed = this.settings.transitionDuration ? this.settings.transitionDuration / 2 : 0;
								if (!_touch.vars.isScrolling) {
									if (isChangeSlide) {
										_touch.vars.direction = direction;
										if (_touch.vars.direction == 'next') {
											_translate(this._attributes.currentSlide, -this._attributes.currentSlide.offsetWidth, speed);
											_translate(this._attributes.nextSlide, 0, speed);
										} else {
											_translate(this._attributes.previousSlide, 0, speed);
											_translate(this._attributes.currentSlide, this._attributes.currentSlide.offsetWidth, speed);
										}
										_requestTimeout(_touch.transitionEnd.bind(this), speed);
									} else {
										if (direction == 'next') {
											_translate(this._attributes.currentSlide, 0, speed);
											_translate(this._attributes.nextSlide, this._attributes.currentSlide.offsetWidth, speed);
										} else {
											_translate(this._attributes.previousSlide, -this._attributes.previousSlide.offsetWidth, speed);
											_translate(this._attributes.currentSlide, 0, speed);
										}
									}
									if (speed) {
										_addClass(this._attributes.container, this.settings.classes.animating);
										_requestTimeout(function() {
											_removeClass(this._attributes.container, this.settings.classes.animating);
										}.bind(this), speed);
									}
								}
							},
							transitionEnd: function(event) {
								if (_touch.vars.direction) {
									_unTranslate(this._attributes.previousSlide);
									_unTranslate(this._attributes.currentSlide);
									_unTranslate(this._attributes.nextSlide);
									_removeClass(this._attributes.container, this.settings.classes.touching);
									_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
									_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
									_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
									this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
									var slides = this._attributes.slides,
										index = slides.indexOf(this._attributes.currentSlide);
									if (_touch.vars.direction == 'next') {
										this._attributes.previousSlide = this._attributes.currentSlide;
										this._attributes.currentSlide = slides[index + 1];
										this._attributes.nextSlide = slides[index + 2];
										if (typeof this._attributes.currentSlide === 'undefined' &&
											typeof this._attributes.nextSlide === 'undefined') {
											this._attributes.currentSlide = slides[0];
											this._attributes.nextSlide = slides[1];
										} else {
											if (typeof this._attributes.nextSlide === 'undefined') {
												this._attributes.nextSlide = slides[0];
											}
										}
										_loadImg(this._attributes.nextSlide);
									} else {
										this._attributes.nextSlide = this._attributes.currentSlide;
										this._attributes.previousSlide = slides[index - 2];
										this._attributes.currentSlide = slides[index - 1];
										if (typeof this._attributes.currentSlide === 'undefined' &&
											typeof this._attributes.previousSlide === 'undefined') {
											this._attributes.currentSlide = slides[slides.length - 1];
											this._attributes.previousSlide = slides[slides.length - 2];
										} else {
											if (typeof this._attributes.previousSlide === 'undefined') {
												this._attributes.previousSlide = slides[slides.length - 1];
											}
										}
										_loadImg(this._attributes.previousSlide);
									}
									_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
									_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
									_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
									this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
									_setContainerHeight(this);
									this.settings.afterChange.apply(this);
								}
							}
						};
						var Slider = function(args) {
							// Defaults
							this.settings = {
								selector: '',
								height: '16:9', // "auto" | px value (e.g. 400) | aspect ratio (e.g. "16:9")
								initialHeight: 400, // for "auto" and aspect ratio
								maxHeight: null, // for "auto" and aspect ratio
								interval: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PT*1000;?>,
								transitionDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_CS;?>,
								effect: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Eff;?>',
								disableNav: <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Show=='on'){ echo 'false';}else{ echo 'true';}?>,
								keyboardNav: true,
								previousNavSelector: '.Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>',
								nextNavSelector: '.Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>',
								classes: {
									container: 'ideal-image-slider',
									slide: 'iis-slide',
									previousSlide: 'iis-previous-slide',
									currentSlide: 'iis-current-slide',
									nextSlide: 'iis-next-slide',
									previousNav: '',
									nextNav: '',
									animating: 'iis-is-animating',
									touchEnabled: 'iis-touch-enabled',
									touching: 'iis-is-touching',
									directionPrevious: 'iis-direction-previous',
									directionNext: 'iis-direction-next'
								},
								onInit: function() {},
								onStart: function() {},
								onStop: function() {},
								onDestroy: function() {},
								beforeChange: function() {},
								afterChange: function() {}
							};
							if (typeof args === 'string') {
								this.settings.selector = args;
							} else if (typeof args === 'object') {
								_deepExtend(this.settings, args);
							}
							var sliderEl = document.querySelector(this.settings.selector);
							if (!sliderEl) return null;
							var origChildren = _toArray(sliderEl.children),
								validSlides = [];
							sliderEl.innerHTML = '';
							Array.prototype.forEach.call(origChildren, function(slide, i) {
								if (slide instanceof HTMLImageElement || slide instanceof HTMLAnchorElement) {
									var slideEl = document.createElement('a'),
										href = '',
										target = '';
									if (slide instanceof HTMLAnchorElement) {
										href = slide.getAttribute('href');
										target = slide.getAttribute('target');
										var img = slide.querySelector('img');
										if (img !== null) {
											slide = img;
										} else {
											return;
										}
									}
									if (typeof slide.dataset !== 'undefined') {
										_deepExtend(slideEl.dataset, slide.dataset);
										
										if (slide.dataset.src) {
											slideEl.dataset.src = slide.dataset.src;
										} else {
											slideEl.dataset.src = slide.src;
										}
										// if (_isHighDPI() && slide.dataset['src-2x']) {
											// slideEl.dataset.src = slide.dataset['src-2x'];
										// }
									}
									else {	
										if (slide.getAttribute('data-src')) {
											slideEl.setAttribute('data-src', slide.getAttribute('data-src'));
										} else {
											slideEl.setAttribute('data-src', slide.getAttribute('src'));
										}
									}
									if (href) slideEl.setAttribute('href', href);
									if (target) slideEl.setAttribute('target', target);
									if (slide.getAttribute('className')) _addClass(slideEl, slide.getAttribute('className'));
									if (slide.getAttribute('id')) slideEl.setAttribute('id', slide.getAttribute('id'));
									if (slide.getAttribute('title')) slideEl.setAttribute('title', slide.getAttribute('title'));
									if (slide.getAttribute('alt')) slideEl.innerHTML = slide.getAttribute('alt');
									slideEl.setAttribute('role', 'tabpanel');
									slideEl.setAttribute('aria-hidden', 'true');
									slideEl.style.cssText += '-webkit-transition-duration:' + this.settings.transitionDuration + 'ms;-moz-transition-duration:' + this.settings.transitionDuration + 'ms;-o-transition-duration:' + this.settings.transitionDuration + 'ms;transition-duration:' + this.settings.transitionDuration + 'ms;';
									sliderEl.appendChild(slideEl);
									validSlides.push(slideEl);
								}
							}.bind(this));
							var slides = validSlides;
							if (slides.length <= 1) {
								sliderEl.innerHTML = '';
								Array.prototype.forEach.call(origChildren, function(child, i) {
									sliderEl.appendChild(child);
								});
								return null;
							}
							if (!this.settings.disableNav) {
								var previousNav, nextNav;
								if (this.settings.previousNavSelector) {
									previousNav = document.querySelector(this.settings.previousNavSelector);
								} else {
									previousNav = document.createElement('a');
									sliderEl.appendChild(previousNav);
								}
								if (this.settings.nextNavSelector) {
									nextNav = document.querySelector(this.settings.nextNavSelector);
								} else {
									nextNav = document.createElement('a');
									sliderEl.appendChild(nextNav);
								}
								_addClass(previousNav, this.settings.classes.previousNav);
								_addClass(nextNav, this.settings.classes.nextNav);
								_addEvent(previousNav, 'click', function() {
									if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
									this.stop();
									this.previousSlide();
								}.bind(this));
								_addEvent(nextNav, 'click', function() {
									if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
									this.stop();
									this.nextSlide();
								}.bind(this));
								if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
									this.settings.effect = 'slide';
									previousNav.style.display = 'none';
									nextNav.style.display = 'none';
									_addClass(sliderEl, this.settings.classes.touchEnabled);
									_addEvent(sliderEl, 'touchstart', _touch.start.bind(this), false);
									_addEvent(sliderEl, 'touchmove', _touch.move.bind(this), false);
									_addEvent(sliderEl, 'touchend', _touch.end.bind(this), false);
								}
								if (this.settings.keyboardNav) {
									_addEvent(document, 'keyup', function(e) {
										e = e || window.event;
										var button = (typeof e.which == 'number') ? e.which : e.keyCode;
										if (button == 37) {
											if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
											this.stop();
											this.previousSlide();
										} else if (button == 39) {
											if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
											this.stop();
											this.nextSlide();
										}
									}.bind(this));
								}
							}
							this._attributes = {
								container: sliderEl,
								slides: slides,
								previousSlide: typeof slides[slides.length - 1] !== 'undefined' ? slides[slides.length - 1] : slides[0],
								currentSlide: slides[0],
								nextSlide: typeof slides[1] !== 'undefined' ? slides[1] : slides[0],
								timerId: 0,
								origChildren: origChildren, // Used in destroy()
								aspectWidth: 0,
								aspectHeight: 0
							};
							if (_isInteger(this.settings.height)) {
								this._attributes.container.style.height = this.settings.height + 'px';
							} else {
								if (_isInteger(this.settings.initialHeight)) {
									this._attributes.container.style.height = this.settings.initialHeight + 'px';
								}
								if (this.settings.height.indexOf(':') > -1) {
									var aspectRatioParts = this.settings.height.split(':');
									if (aspectRatioParts.length == 2 && _isInteger(parseInt(aspectRatioParts[0], 10)) && _isInteger(parseInt(aspectRatioParts[1], 10))) {
										this._attributes.aspectWidth = parseInt(aspectRatioParts[0], 10);
										this._attributes.aspectHeight = parseInt(aspectRatioParts[1], 10);
									}
								}
								_addEvent(window, 'resize', function() {
									_setContainerHeight(this, false);
								}.bind(this));
							}
							_addClass(sliderEl, this.settings.classes.container);
							_addClass(sliderEl, 'iis-effect-' + this.settings.effect);
							Array.prototype.forEach.call(this._attributes.slides, function(slide, i) {
								_addClass(slide, this.settings.classes.slide);
							}.bind(this));
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_loadImg(this._attributes.currentSlide, (function() {
								this.settings.onInit.apply(this);
								_setContainerHeight(this, false);
							}).bind(this));
							_loadImg(this._attributes.previousSlide);
							_loadImg(this._attributes.nextSlide);
						};
						Slider.prototype.get = function(attribute) {
							if (!this._attributes) return null;
							if (this._attributes.hasOwnProperty(attribute)) {
								return this._attributes[attribute];
							}
						};
						Slider.prototype.set = function(attribute, value) {
							if (!this._attributes) return null;
							return (this._attributes[attribute] = value);
						};
						Slider.prototype.start = function() {
							if (!this._attributes) return;
							this._attributes.timerId = setInterval(this.nextSlide.bind(this), this.settings.interval);
							this.settings.onStart.apply(this);
							window.onblur = function() {
								this.stop();
							}.bind(this);
						};
						Slider.prototype.stop = function() {
							if (!this._attributes) return;
							clearInterval(this._attributes.timerId);
							this._attributes.timerId = 0;
							this.settings.onStop.apply(this);
						};
						Slider.prototype.previousSlide = function() {
							this.settings.beforeChange.apply(this);
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							var slides = this._attributes.slides,
								index = slides.indexOf(this._attributes.currentSlide);
							this._attributes.nextSlide = this._attributes.currentSlide;
							this._attributes.previousSlide = slides[index - 2];
							this._attributes.currentSlide = slides[index - 1];
							if (typeof this._attributes.currentSlide === 'undefined' &&
								typeof this._attributes.previousSlide === 'undefined') {
								this._attributes.currentSlide = slides[slides.length - 1];
								this._attributes.previousSlide = slides[slides.length - 2];
							} else {
								if (typeof this._attributes.previousSlide === 'undefined') {
									this._attributes.previousSlide = slides[slides.length - 1];
								}
							}
							_loadImg(this._attributes.previousSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_addClass(this._attributes.container, this.settings.classes.directionPrevious);
							_requestTimeout(function() {
								_removeClass(this._attributes.container, this.settings.classes.directionPrevious);
							}.bind(this), this.settings.transitionDuration);
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.nextSlide = function() {
							this.settings.beforeChange.apply(this);
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							var slides = this._attributes.slides,
								index = slides.indexOf(this._attributes.currentSlide);
							this._attributes.previousSlide = this._attributes.currentSlide;
							this._attributes.currentSlide = slides[index + 1];
							this._attributes.nextSlide = slides[index + 2];
							if (typeof this._attributes.currentSlide === 'undefined' &&
								typeof this._attributes.nextSlide === 'undefined') {
								this._attributes.currentSlide = slides[0];
								this._attributes.nextSlide = slides[1];
							} else {
								if (typeof this._attributes.nextSlide === 'undefined') {
									this._attributes.nextSlide = slides[0];
								}
							}
							_loadImg(this._attributes.nextSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_addClass(this._attributes.container, this.settings.classes.directionNext);
							_requestTimeout(function() {
								_removeClass(this._attributes.container, this.settings.classes.directionNext);
							}.bind(this), this.settings.transitionDuration);
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.gotoSlide = function(index) {
							this.settings.beforeChange.apply(this);
							this.stop();
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							index--;
							var slides = this._attributes.slides,
								oldIndex = slides.indexOf(this._attributes.currentSlide);
							this._attributes.previousSlide = slides[index - 1];
							this._attributes.currentSlide = slides[index];
							this._attributes.nextSlide = slides[index + 1];
							if (typeof this._attributes.previousSlide === 'undefined') {
								this._attributes.previousSlide = slides[slides.length - 1];
							}
							if (typeof this._attributes.nextSlide === 'undefined') {
								this._attributes.nextSlide = slides[0];
							}
							_loadImg(this._attributes.previousSlide);
							_loadImg(this._attributes.currentSlide);
							_loadImg(this._attributes.nextSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							if (index < oldIndex) {
								_addClass(this._attributes.container, this.settings.classes.directionPrevious);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.directionPrevious);
								}.bind(this), this.settings.transitionDuration);
							} else {
								_addClass(this._attributes.container, this.settings.classes.directionNext);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.directionNext);
								}.bind(this), this.settings.transitionDuration);
							}
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.destroy = function() {
							clearInterval(this._attributes.timerId);
							this._attributes.timerId = 0;
							this._attributes.container.innerHTML = '';
							Array.prototype.forEach.call(this._attributes.origChildren, function(child, i) {
								this._attributes.container.appendChild(child);
							}.bind(this));
							_removeClass(this._attributes.container, this.settings.classes.container);
							_removeClass(this._attributes.container, 'iis-effect-' + this.settings.effect);
							this._attributes.container.style.height = '';
							this.settings.onDestroy.apply(this);
						};
						return {
							_hasClass: _hasClass,
							_addClass: _addClass,
							_removeClass: _removeClass,
							Slider: Slider
						};
					})();
				</script>
				<script src="<?php echo plugins_url('/Scripts/iis-bullet-nav.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('/Scripts/iis-captions.js',__FILE__);?>"></script>
				<script>
					var slider = new IdealImageSlider.Slider('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>');
					slider.addCaptions();
					slider.addBulletNav();
					slider.start();
				</script>
				<script>
					jQuery(document).ready(function(){
						var RichVSTitle = jQuery('.RichVSTitle<?php echo $Rich_Web_VSlider_ID; ?>').val();
						var RichVSDesc = jQuery('.RichVSDesc<?php echo $Rich_Web_VSlider_ID; ?>').val();
						function resp(){
							jQuery('.Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').css('max-height',jQuery('.Rich_Web_VS_SVS').height());
							jQuery('.iis-caption .iis-caption-content span').css('font-size',RichVSTitle*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()+150)+'px');
							jQuery('.iis-caption .iis-caption-content p').css('font-size',RichVSDesc*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()+150)+'px');
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon').css('height',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').height()/8);
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('width',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/8);
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('line-height',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').height()/8+'px');
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('font-size',parseInt(jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('width'))/3+'px');
							jQuery('.Rich_Web_SVS_Nav').css('font-size',30*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700);
							jQuery('.Rich_Web_SVS_Nav').css('padding',''+10*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700+'px '+15*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700+'px');
							if(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()<=400){
								jQuery('.iis-caption .iis-caption-content p').css('display','none');
								jQuery('.iis-caption .iis-caption-content a').css('display','none');
							}else{
								jQuery('.iis-caption .iis-caption-content p').css('display','block');
								jQuery('.iis-caption .iis-caption-content a').css('display','block');
							}
						}
						jQuery(window).load(function(){
							resp();
						})						
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Slider/Vertical Thumbnails'){ ?>
				<?php 
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=true; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=false; }
				?>
			    <script type="text/javascript" src="<?php echo plugins_url('/Scripts/jssor.slider-21.1.5.min.js',__FILE__);?>"></script>
			    <script>
			        Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_slider_init = function() {			            
			            var Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_SlideshowTransitions = [
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='fade slideshow'){ ?>
			            		{$Duration:1200,$Opacity:2},
								{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Opacity:2},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Opacity:2},
			            	<?php }?>
			             	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='swing slideshow'){ ?>
			             		{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='flutter slideshow'){ ?>
			            		{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Round:{$Top:2}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='collapse slideshow'){ ?>
			            		{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:200,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:2049},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$JssorEasing$.$EaseOutQuad},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='expand slideshow'){ ?>
			            		{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:1000,$Cols:3,$Rows:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseInBounce},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$Easing:$JssorEasing$.$EaseInQuad},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='stripe slideshow'){ ?>
			            		{$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseOutJump,$Round:{$Top:1.5}},
								{$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
								{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
								{$Duration:400,$Delay:100,$Rows:7,$Clip:4,$Formation:$JssorSlideshowFormations$.$FormationStraight},
								{$Duration:400,$Delay:100,$Cols:10,$Clip:2,$Formation:$JssorSlideshowFormations$.$FormationStraight},
								{$Duration:1000,$Rows:6,$Clip:4},
								{$Duration:1000,$Cols:8,$Clip:1},
								{$Duration:1000,$Rows:6,$Clip:4,$Move:true},
								{$Duration:1000,$Cols:8,$Clip:1,$Move:true},
								{$Duration:600,$Delay:100,$Rows:7,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Opacity:2},
								{$Duration:600,$Delay:100,$Cols:10,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Opacity:2},
								{$Duration:800,x:1,$Delay:80,$Rows:8,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:800,y:1,$Delay:80,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-1,$Rows:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Row:3}},
								{$Duration:1000,y:-1,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12}},
								{$Duration:600,$Delay:80,$Rows:6,$Opacity:2},
								{$Duration:600,$Delay:80,$Cols:10,$Opacity:2},
								{$Duration:800,$Delay:150,$Rows:5,$Clip:8,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:264,$Easing:$JssorEasing$.$EaseInBounce},
								{$Duration:800,$Delay:150,$Cols:10,$Clip:1,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:264,$Easing:$JssorEasing$.$EaseInBounce},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='twins slideshow'){ ?>
			            		{$Duration:700,$Opacity:2,$Brother:{$Duration:1000,$Opacity:2}},
								{$Duration:1200,$Zoom:11,$Rotate:-1,$Easing:{$Zoom:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:0.5},$Brother:{$Duration:1200,$Zoom:1,$Rotate:1,$Easing:$JssorEasing$.$EaseSwing,$Opacity:2,$Round:{$Rotate:0.5},$Shift:90}},
								{$Duration:1400,x:0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1400,x:-0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10}},
								{$Duration:1200,$Zoom:11,$Rotate:1,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Brother:{$Duration:1200,$Zoom:11,$Rotate:-1,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Shift:600}},
								{$Duration:1500,x:0.5,$Cols:2,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInOutCubic},$Opacity:2,$Brother:{$Duration:1500,$Opacity:2}},
								{$Duration:1500,x:-0.3,y:0.5,$Zoom:1,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4],$Zoom:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,$Zoom:11,$Rotate:-0.5,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Shift:200}},
								{$Duration:1500,x:0.3,$During:{$Left:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Brother:{$Duration:1000,x:-0.3,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1500,$Zoom:11,$Rotate:0.5,$During:{$Left:[0.4,0.6],$Top:[0.4,0.6],$Rotate:[0.4,0.6],$Zoom:[0.4,0.6]},$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,$Zoom:1,$Rotate:-0.5,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Shift:200}},
								{$Duration:1200,x:0.25,y:0.5,$Rotate:-0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1200,x:-0.1,y:-0.7,$Rotate:0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2}},
								{$Duration:1600,x:1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1600,x:-1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1600,y:-1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1600,y:1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,y:1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,x:1,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1200,x:-1,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
								{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
								{$Duration:1500,x:-0.1,y:-0.7,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,x:0.2,y:0.5,$Rotate:-0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2}},
								{$Duration:1600,x:-0.2,$Delay:40,$Cols:12,$During:{$Left:[0.4,0.6]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5},$Brother:{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:1028,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Round:{$Top:0.5}}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='parabola slideshow'){ ?>
			            		{$Duration:600,x:-1,y:1,$Delay:100,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInQuart,$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:30,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInQuart,$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='rotate slideshow'){ ?>
			            		{$Duration:1200,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,x:2,y:1,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.85}},
								{$Duration:1000,x:4,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-3,y:1,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,$Zoom:11,$Rotate:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,y:4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,y:0.6,$Zoom:1,$Rotate:1,$During:{$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,y:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,y:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='zoom slideshow'){ ?>
			            		{$Duration:1200,y:2,$Rows:2,$Zoom:11,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:4,$Cols:2,$Zoom:11,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:1,$Rows:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:2,$Rows:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:1,$Rows:2,$Zoom:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,$Zoom:11,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2,$Round:{$Top:2.5}},
								{$Duration:1000,y:4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,y:-4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Zoom:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:-0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,$Zoom:1,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='float slideshow'){ ?>
			            		{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:1028,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='fly slideshow'){ ?>
			            		{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:50,$Cols:8,$Rows:4,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:1028,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:-1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge dance slideshow'){ ?>
			            		{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge pet slideshow'){ ?>
			            		{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge slideshow'){ ?>
			            		{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:-0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:-0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='compound slideshow'){ ?>
			            		{$Duration:1200,y:-1,$Cols:8,$Rows:4,$Clip:15,$During:{$Top:[0.5,0.5],$Clip:[0,0.5]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12},$ScaleClip:0.5},
								{$Duration:1200,y:-1,$Cols:8,$Rows:4,$Clip:15,$During:{$Top:[0.5,0.5],$Clip:[0,0.5]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12},$ScaleClip:0.5},
								{$Duration:1200,x:-1,y:-1,$Cols:6,$Rows:6,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Clip:[0,0.2]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Clip:$JssorEasing$.$EaseSwing},$ScaleClip:0.5},
								{$Duration:1200,x:-1,y:-1,$Cols:6,$Rows:6,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Clip:[0,0.2]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Clip:$JssorEasing$.$EaseSwing},$ScaleClip:0.5},
								{$Duration:4000,x:-1,y:0.45,$Delay:80,$Cols:12,$Clip:15,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.15]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.45,$Delay:80,$Cols:12,$Clip:15,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.15]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.7,$Delay:80,$Cols:12,$Clip:11,$Move:true,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.1]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseOutQuad,$Top:$JssorEasing$.$EaseOutJump,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.7,$Delay:80,$Cols:12,$Clip:11,$Move:true,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.1]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseOutQuad,$Top:$JssorEasing$.$EaseOutJump,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='jump slideshow'){ ?>
			            		{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:800,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:800,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='wave slideshow'){ ?>
			            		{$Duration:1500,y:-0.5,$Delay:60,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:15,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
			            	<?php }?>
			            ];

			            var y="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP;?>";
			          
			            var trueFalse;
			            if(y==""){
			            	trueFalse=false;
			            }else{
			            	trueFalse=true;
			            }
			           
			            var Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_options = {
			              $AutoPlay: trueFalse,
			              $AutoPlaySteps: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APS;?>,
			              $Idle: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PT*1000;?>,
		    			  $SlideDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_CS;?>,
			              $SlideshowOptions: {
			                $Class: $JssorSlideshowRunner$,
			                $Transitions: Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_SlideshowTransitions,
			                $TransitionsOrder: 1
			              },
			              $ArrowNavigatorOptions: {
			                $Class: $JssorArrowNavigator$,
			                $Steps: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrSt;?>
			              },
			              $ThumbnailNavigatorOptions: {
			                $Class: $JssorThumbnailNavigator$,
			                $Rows: 2,
			                $Cols: <?php if((count($Rich_Web_VSlider_Videos) % 2) == 1){ echo count($Rich_Web_VSlider_Videos)/2 +1 ; } else { echo count($Rich_Web_VSlider_Videos)/2;}?>,
			                $SpacingX: 14,
			                $SpacingY: 12,
			                $Orientation: 2,
			                $Align: 156
			              }
			            };
			            
			            var Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_slider = new $JssorSlider$("Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>", Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_options);
			            
			            function ScaleSlider() {
			                var refSize = Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_slider.$Elmt.parentNode.clientWidth;
			                if (refSize) {
			                   	refSize = Math.min(refSize, <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9+240;?>);
			                    refSize = Math.max(refSize, 240);
			                    Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_slider.$ScaleWidth(refSize);
			                }
			                else {
			                    window.setTimeout(ScaleSlider, 30);
			                }
			            }
			            ScaleSlider();
			            $Jssor$.$AddEvent(window, "load", ScaleSlider);
			            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
			            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
			        };
			    </script>
			    <style>
			    	.Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Main
			        {
			        	position: relative; 
			        	margin: 0px auto; 
			        	top: 20px; 
			        	margin-bottom:50px;
			        	left: 0px; 
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9+240;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        	overflow: hidden; 
			        	visibility: hidden; 
			        	outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BC;?>;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
  							<?php }?>
  						<?php }?>
			        }
			        .jssora05l, .jssora05r {
			            display: block;
			            position: absolute;
			            width: auto !important;
			            height:auto !important;
			            cursor: pointer;
			            overflow: hidden;
			            padding: 1px;
			            font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrFS;?>px;
			            color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrC;?>;
			            <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrPos=='top'){ ?>
			        		top: 5%;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrPos=='bottom'){ ?>
			        		bottom: 7%;
			        	<?php }else{ ?> 
			        		top: 41%;
			        	<?php }?>	
			        }
			        .jssora05r i { float: right; }
			        .jssora05l i { float: left; }
			        .jssora05l:hover, .jssora05r:hover { opacity: 0.8; }
			        .jssort01-99-66 { 
			        	background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BgC;?>;
			        	position:absolute;
			        	left:0px;
			        	top:0px;
			        	width:240px;
			        	height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px;
			        }
			        .jssort01-99-66 .p {
			            position: absolute;
			            top: 0;
			            left: 0;
			            width: 99px;
			            height: 66px;
			            border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BC;?>;
			            border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BR;?>px;
						box-sizing:border-box !important;
			        }
			        .jssort01-99-66 .p:hover, .jssort01-99-66 .p.pdn, .jssort01-99-66 .pav
			        {
			            border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_HBC;?>;
			        }
			        .jssort01-99-66 .w  img{
			            border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BR-2;?>px;			        	
			        }
			        .jssort01-99-66 .t {
			            position: absolute;
			            top: 0;
			            left: 0;
			            width: 100%;
			            height: 100%;
			            border: none;
			        }
			        .jssort01-99-66 .w {
			            position: absolute;
			            top: 0px;
			            left: 0px;
			            width: 100%;
			            height: 100%;
			        }
			        .jssort01-99-66 .c {
			            position: absolute;
			            top: 0px;
			            left: 0px;
			            width: 95px;
			            height: 62px;
			            box-sizing: content-box;
			        }
			        .jssort01-99-66 .pav .c {
			            top: 2px;
			            left: 2px;
			            width: 95px;
			            height: 62px;
			        }
			        .jssort01-99-66 .p:hover .c {
			            top: 0px;
			            left: 0px;
			            width: 97px;
			            height: 64px;
			        }
			        .jssort01-99-66 .p.pdn .c {
			            width: 95px;
			            height: 62px;
			        }
			        * html .jssort01-99-66 .c, * html .jssort01-99-66 .pdn .c, * html .jssort01-99-66 .pav .c {
			            width /**/: 99px;
			            height /**/: 66px;
			        }
			        .Rich_Web_VS_VTS_Title<?php echo $Rich_Web_VSlider_ID; ?>
			        {
			        	position:absolute;				        	
			        	left:0px;
			        	width:100%;
			        	z-index: 999999999;	
			        	padding: 2px;	
			        	text-align: center;
			        	background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TBgC;?>;
			        	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TC;?>;
			        	font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TFS;?>px;
			        	font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TFF;?>;
			            <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TPos=='top'){ ?>
			        		top: 5%;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TPos=='bottom'){ ?>
			        		bottom: 7%;
			        	<?php }else{ ?> 
			        		top: 41%;
			        	<?php }?>		        	
			        }
			        .Rich_Web_VS_VTS_Link<?php echo $Rich_Web_VSlider_ID; ?>
			        {
			        	position: absolute;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-left'){ ?>
			        		left: 0;
					    	top: 0;
					   		border-bottom-right-radius: 70px;
					    	padding: 10px 20px 20px 10px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-right'){ ?>
			        		right: 0;
					    	top: 0;
					    	border-bottom-left-radius: 70px;
					    	padding: 10px 10px 20px 20px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='bottom-left'){ ?>
			        		left: 0;
					    	bottom: 0;
					    	border-top-right-radius: 70px;
					    	padding: 20px 20px 10px 10px;
			        	<?php }else{ ?> 
			        		right: 0;
					    	bottom: 0;
					    	border-top-left-radius: 70px;
					    	padding: 20px 10px 10px 20px;
			        	<?php }?>
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos==$Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos){ ?>
			        		display: none;	
			        	<?php }?>				   
					    z-index: 999999999;
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LBgC;?>;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LFS;?>px;
					    -webkit-transition: all 0.5s ease-in-out;
                        -moz-transition: all 0.5s ease-in-out;
                        -o-transition: all 0.5s ease-in-out;
                        -ms-transition: all 0.5s ease-in-out;
                        transition: all 0.5s ease-in-out;
			        }
			        .Rich_Web_VS_VTS_Link<?php echo $Rich_Web_VSlider_ID; ?> a
			        {
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LC;?>;
					    text-decoration: none;
			        }
			        .Rich_Web_VS_VTS_Play<?php echo $Rich_Web_VSlider_ID; ?>
			        {
			        	position: absolute;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-left'){ ?>
			        		left: 0;
					    	top: 0;
					   		border-bottom-right-radius: 70px;
					    	padding: 10px 20px 20px 15px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-right'){ ?>
			        		right: 0;
					    	top: 0;
					    	border-bottom-left-radius: 70px;
					    	padding: 10px 15px 20px 20px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='bottom-left'){ ?>
			        		left: 0;
					    	bottom: 0;
					    	border-top-right-radius: 70px;
					    	padding: 20px 20px 10px 15px;
			        	<?php }else{ ?> 
			        		right: 0;
					    	bottom: 0;
					    	border-top-left-radius: 70px;
					    	padding: 20px 15px 10px 20px;
			        	<?php }?>				
					    z-index: 999999999;					    
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PBgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PC;?>;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PFS;?>px;
					    -webkit-transition: all 0.5s ease-in-out;
                        -moz-transition: all 0.5s ease-in-out;
                        -o-transition: all 0.5s ease-in-out;
                        -ms-transition: all 0.5s ease-in-out;
                        transition: all 0.5s ease-in-out;
                        cursor: pointer;
			        }
			        .Rich_Web_VS_VTS_Link<?php echo $Rich_Web_VSlider_ID; ?>:hover
			        {
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-left'){ ?>
					    	padding: 15px 25px 25px 15px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-right'){ ?>
					    	padding: 15px 15px 25px 25px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='bottom-left'){ ?>
					    	padding: 25px 25px 15px 15px;
			        	<?php }else{ ?> 
					    	padding: 25px 15px 15px 25px;
			        	<?php }?>					   
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LHBgC;?>;
			        }
			        .Rich_Web_VS_VTS_Link<?php echo $Rich_Web_VSlider_ID; ?>:hover a
			        {
			        	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LHC;?>;
			        }
			        .Rich_Web_VS_VTS_Play<?php echo $Rich_Web_VSlider_ID; ?>:hover
			        {					    
					    <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-left'){ ?>
					    	padding: 15px 25px 25px 20px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-right'){ ?>
					    	padding: 15px 20px 25px 25px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='bottom-left'){ ?>
					    	padding: 25px 25px 15px 20px;
			        	<?php }else{ ?> 
					    	padding: 25px 20px 15px 25px;
			        	<?php }?>
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PHBgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PHC;?>;
			        }	
			        .Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div
			        {
			        	position: relative; 
			        	top: 0px; 
			        	left: 240px; 
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        	overflow: hidden; 
			        	display: none;
			        }	
			        #Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe
			        {
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        }	      
			    </style>
				    <div id="Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>" class="Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Main">
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo plugins_url('/Images/loader.gif',__FILE__);?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 240px; width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; overflow: hidden;">
				        	<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
				        		<div data-p="150.00" style="display: none;">
					                <img data-u="image" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
					                <img data-u="thumb" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
					                <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TShow == 'on'){ ?>
					                	<div data-u="caption" class="Rich_Web_VS_VTS_Title<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></div>
						            <?php }?>
						            <?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?> 
						            	<div data-u="caption" class="Rich_Web_VS_VTS_Link<?php echo $Rich_Web_VSlider_ID; ?>">
						                	<a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){echo '_blank';}?>"><i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LType;?>" aria-hidden="true"></i></a>
						                </div>
						            <?php }?>
					                <div data-u="caption" class="Rich_Web_VS_VTS_Play<?php echo $Rich_Web_VSlider_ID; ?>" onclick='Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'>
					                	<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PType;?>" aria-hidden="true"></i>
					                </div>
					            </div>
							<?php } ?>
				        </div>
				        <div data-u="slides" class="Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div">
				        	<iframe id="Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				        </div>
				        <div data-u="thumbnavigator" class="jssort01-99-66" data-autocenter="2" onclick='Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Stop_Video()'>
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				        </div>
				        <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrShow == 'on'){ ?> 
				        	<span data-u="arrowleft" class="jssora05l" style="left:248px;width:48px;height:48px;" onclick='Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Stop_Video()'>
				        		<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrType;?>-left" aria-hidden="true"></i>
				        	</span>
				        	<span data-u="arrowright" class="jssora05r" style="right:8px;width:48px;height:48px;" onclick='Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Stop_Video()'>
				        		<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrType;?>-right" aria-hidden="true"></i>
				        	</span>
				        <?php }?>				       
				    </div>
				   <script>
				   	function RIch_Web_SVS_Close_Video(VSlider_ID)
					{
						jQuery('.RichWeb_SVS_'+VSlider_ID+' iframe').css('z-index','-1');
						jQuery('.RichWeb_SVS_'+VSlider_ID+' iframe').attr('src','');
						jQuery('.Rich_Web_VSlider_SVS_PlayIcon'+VSlider_ID+'').fadeIn();
					}
					function Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video(Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video_Src)
					{
						jQuery('.Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div').css('display','inline');
						jQuery('#Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src',Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video_Src+'?autoplay=1&rel=0&amp');
					}
					function Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Stop_Video()
					{
						jQuery('.Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div').css('display','none');
						jQuery('#Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src','');
					}
				   </script>
			    <script>
			        Rich_Web_VSVT<?php echo $Rich_Web_VSlider_ID; ?>_slider_init();
			    </script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Horizontal Posts Slider'){ ?>
				<?php 
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car='false'; }
				?>
  				<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php echo plugins_url('/Style/Horizontal_Posts_Slider.css',__FILE__);?>"> -->
  				
  				<style type="text/css">
  					#Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?> { display: block; max-width: 100%; min-width: 180px; margin: 25px auto; font-size: 62.5%; line-height: 1; padding: 25px 0px; padding: 2px 3px; overflow:hidden;}
					.crsl-items<?php echo $Rich_Web_VSlider_ID; ?> { display: block; padding: 4px; overflow: visible !important;}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> { padding: 8px; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .thumbnail { display: block; position: relative; margin-bottom: 10px; cursor: pointer; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .thumbnail img { display: block; -webkit-transition: all 0.3s linear; -moz-transition: all 0.3s linear; transition: all 0.3s linear; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> h3 { line-height: 1; margin-bottom: 12px; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .postdate { display: block; position: absolute; bottom: 0; right: 0; padding: 6px; -webkit-transition: all 0.3s linear; -moz-transition: all 0.3s linear; transition: all 0.3s linear; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> p { line-height: 1.3; margin-bottom: 5px; }
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> p.readmore a { display: block; float: right; text-decoration: none; }
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Nav { display: block; text-align: center; margin-bottom: 5px; }
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Nav a { display: inline-block; padding: 5px 10px; margin-right: 8px; text-decoration: none; }
					@media screen and (max-width: 660px) { h1 { font-size: 2.4em; line-height: 1.2em; } .crsl-item<?php echo $Rich_Web_VSlider_ID; ?> h3 { font-size: 1.65em; } }
					@media (min-width: 0) and (max-width: 600px) { .Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div { width: 94% !important; left: 3% !important; top: 10% !important; } }
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_clearfix { display: inline-block; }
  					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Nav a
  					{
  						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_C;?>;
  						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BgC;?>;
  						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_FS;?>px;
  						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_FF;?>;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BC;?>;
  						-webkit-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
 						-moz-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
  					}
  					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Nav a:hover
  					{
  						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_HC;?>;
  						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_HBgC;?>;
  					}
  					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> 
  					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BgC;?>;
						-webkit-box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						-moz-box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						
						box-sizing:border-box !important;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .thumbnail img 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='none'){ ?> 
							-webkit-filter: none; 
    						filter: none;
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='blur'){ ?>
							-webkit-filter: blur(2px); 
    						filter: blur(2px);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='brightness'){ ?>
							-webkit-filter: brightness(200%); 
   							filter:brightness(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='contrast'){ ?>
							-webkit-filter: contrast(200%); 
    						filter: contrast(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='drop-shadow'){ ?>
							-webkit-filter: drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_StShC;?>); 
    						filter:drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_StShC;?>);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='grayscale'){ ?>
							-webkit-filter: grayscale(100%); 
    						filter: grayscale(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='hue-rotate'){ ?>
							-webkit-filter: hue-rotate(90deg); 
    						filter: hue-rotate(90deg);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='invert'){ ?>
							-webkit-filter: invert(100%); 
    						filter: invert(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='opacity'){ ?>
							-webkit-filter: opacity(30%); 
    						filter: opacity(30%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='saturate'){ ?>
							-webkit-filter: saturate(8); 
    						filter: saturate(8);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='sepia'){ ?>
							-webkit-filter: sepia(100%); 
    						filter: sepia(100%);
						<?php }?>
						cursor: pointer;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .thumbnail:hover img 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='none'){ ?> 
							-webkit-filter: none; 
    						filter: none;
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='blur'){ ?>
							-webkit-filter: blur(2px); 
    						filter: blur(2px);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='brightness'){ ?>
							-webkit-filter: brightness(200%); 
   							filter:brightness(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='contrast'){ ?>
							-webkit-filter: contrast(200%); 
    						filter: contrast(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='drop-shadow'){ ?>
							-webkit-filter: drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_HShC;?>); 
    						filter:drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_HShC;?>);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='grayscale'){ ?>
							-webkit-filter: grayscale(100%); 
    						filter: grayscale(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='hue-rotate'){ ?>
							-webkit-filter: hue-rotate(90deg); 
    						filter: hue-rotate(90deg);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='invert'){ ?>
							-webkit-filter: invert(100%); 
    						filter: invert(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='opacity'){ ?>
							-webkit-filter: opacity(30%); 
    						filter: opacity(30%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='saturate'){ ?>
							-webkit-filter: saturate(8); 
    						filter: saturate(8);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='sepia'){ ?>
							-webkit-filter: sepia(100%); 
    						filter: sepia(100%);
						<?php }?>
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> h3 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TFF;?>;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> p 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DFF;?>;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> p.readmore a 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LFF;?>;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> p.readmore a:hover 
					{
					  	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LHC;?>;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .postdate 
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PBgC;?> !important;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PFF;?>;
					}
					.crsl-item<?php echo $Rich_Web_VSlider_ID; ?> .postdate:hover
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PHC;?>;
					}
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay
					{
						position: fixed;
						height: 100%;
						width: 100%;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_OvC;?>;
						top: 0;
						left: 0;
						z-index: 9999999999;
						cursor: pointer;
						display: none;
					}
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div1 
					{
					   position: relative;
					   width: 100%;
					   padding-top: 56.25%; /* 16:9 Aspect Ratio */
					}

					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Text 
					{
					   position:  absolute;
					   top: 0;
					   left: 0;
					   bottom: 0;
					   right: 0;
					   text-align: center;
					   font-size: 20px;
					   color: white;
					}
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div
					{
						position: fixed;
						width: 50%;
						top: 25%;
						left: 25%;
						z-index: 9999999999;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BC;?>;
						display: none;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe
					{
						width: 100%;
						height: 100%;
					}
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay_Close
					{
						z-index: 99999999;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIS;?>px;
						position: absolute;
						top: 5px;
						right: 5px;
						cursor: pointer;
					}
					.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay_Close:hover
					{
						opacity: 0.8;
					}
					.crsl-items<?php echo $Rich_Web_VSlider_ID; ?>{
						box-sizing:border-box;
					}

  				</style>
				<div id="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>">
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_Show=='on'){ ?> 
						<nav class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Nav">
						    <div id="navbtns<?php echo $Rich_Web_VSlider_ID; ?>" class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_clearfix">
						        <a href="#" class="previous<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_PText;?></a>
						        <a href="#" class="next<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_NText;?></a>
						    </div>
					    </nav>
					<?php }?>
				    <div class="crsl-items<?php echo $Rich_Web_VSlider_ID; ?>" data-navigation="navbtns<?php echo $Rich_Web_VSlider_ID; ?>">
				     	<div class="crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>">
				      		<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
				      			<div class="crsl-item<?php echo $Rich_Web_VSlider_ID; ?>">				        
							        <div class="thumbnail" onclick='Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Play("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'>
							            <img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" alt="<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>">
							            <span class="postdate" onclick='Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Play("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PText;?></span>
							        </div>
							        <h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3>
							        <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DShow=='on'){ ?>
							        	<p><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?></p>
							        <?php }?>
							        <?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?> 
							        	<p class="readmore"><a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){echo '_blank';}?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LText;?></a></p>
						            <?php }?>
						        </div>
							<?php } ?>
				      	</div>
				    </div>		    
				</div>
				<div class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay" onclick='Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Close()'>
					<i class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay_Close rich_web <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIType;?>" aria-hidden="true"></i>
				</div>
				<div class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div">
					<div class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div1">
					  	<div class="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Text">
					  		<iframe id="Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					  	</div>
					</div>
				</div>
				<script>
					function Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Play(Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video_Src)
					{
						jQuery('.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay').show(500);
						jQuery('.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div').show(500);
						jQuery('#Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src',Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Play_Video_Src+'?autoplay=1&rel=0&amp');
					}
					function Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Close()
					{
						jQuery('.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Overlay').hide(500);
						jQuery('.Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe_Div').hide(500);
						jQuery('#Rich_Web_VS_HPS<?php echo $Rich_Web_VSlider_ID; ?>_Iframe').attr('src','');
					}
				</script>
				<!-- <script type="text/javascript" src="<?php echo plugins_url('/Scripts/responsiveCarousel.min.js',__FILE__);?>"></script> -->
				<script>
					(function(e){"use strict";e.fn.carousel_RW<?php echo $Rich_Web_VSlider_ID; ?>=function(t){var n,r;n={infinite:true,visible:1,speed:"fast",overflow:false,autoRotate:false,navigation:e(this).data("navigation"),itemMinWidth:0,itemEqualHeight:false,itemMargin:0,itemClassActive:"crsl-active",imageWideClass:"wide-image",carousel:true};return e(this).each(function(){r=e(this);if(e.isEmptyObject(t)===false)e.extend(n,t);if(e.isEmptyObject(e(r).data("crsl"))===false)e.extend(n,e(r).data("crsl"));n.isTouch="ontouchstart"in document.documentElement||navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)?true:false;r.init=function(){n.total=e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").length;n.itemWidth=e(r).outerWidth();n.visibleDefault=n.visible;n.swipeDistance=null;n.swipeMinDistance=100;n.startCoords={};n.endCoords={};e(r).css({width:"100%"});e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").css({position:"relative","float":"left",overflow:"hidden",height:"auto"});e(r).find("."+n.imageWideClass).each(function(){e(this).css({display:"block",width:"100%",height:"auto"})});e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?> iframe").attr({width:"100%"});if(n.carousel)e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:first-child").addClass(n.itemClassActive);if(n.carousel&&n.infinite&&n.visible<n.total)e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:first-child").before(e(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:last-child",r));if(n.overflow===false){e(r).css({overflow:"hidden"})}else{e("html, body").css({"overflow-x":"hidden"})}e(r).trigger("initCarousel",[n,r]);r.testPreload();r.config();r.initRotate();r.triggerNavs()};r.testPreload=function(){if(e(r).find("img").length>0){var t=e(r).find("img").length,i=1;e(r).find("img").each(function(){r.preloadImage(this,i,t);i++})}else{e(r).trigger("loadedCarousel",[n,r])}};r.preloadImage=function(t,i,s){var o=new Image,u={};u.src=e(t).attr("src")!==undefined?t.src:"";u.alt=e(t).attr("alt")!==undefined?t.alt:"";e(o).attr(u);e(o).on("load",function(){if(i===1)e(r).trigger("loadingImagesCarousel",[n,r]);if(i===s)e(r).trigger("loadedImagesCarousel",[n,r])})};r.config=function(){n.itemWidth=Math.floor((e(r).outerWidth()-n.itemMargin*(n.visibleDefault-1))/n.visibleDefault);if(n.itemWidth<=n.itemMinWidth){n.visible=Math.floor((e(r).outerWidth()-n.itemMargin*(n.visible-1))/n.itemMinWidth)===1?Math.floor(e(r).outerWidth()/n.itemMinWidth):Math.floor((e(r).outerWidth()-n.itemMargin)/n.itemMinWidth);n.visible=n.visible<1?1:n.visible;n.itemWidth=n.visible===1?Math.floor(e(r).outerWidth()):Math.floor((e(r).outerWidth()-n.itemMargin*(n.visible-1))/n.visible)}else{n.visible=n.visibleDefault}if(n.carousel){r.wrapWidth=Math.floor((n.itemWidth+n.itemMargin)*n.total);r.wrapMargin=r.wrapMarginDefault=n.infinite&&n.visible<n.total?parseInt((n.itemWidth+n.itemMargin)*-1,10):0;if(n.infinite&&n.visible<n.total&&e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>."+n.itemClassActive).index()===0){e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:first-child").before(e(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:last-child",r));r.wrapMargin=r.wrapMarginDefault=parseInt((n.itemWidth+n.itemMargin)*-1,10)}e(r).find(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>").css({width:r.wrapWidth+"px",marginLeft:r.wrapMargin})}else{r.wrapWidth=e(r).outerWidth();e(r).find(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>").css({width:r.wrapWidth+n.itemMargin+"px"});e("#"+n.navigation).hide()}e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").css({width:n.itemWidth+"px",marginRight:n.itemMargin-2+"px",marginTop:n.itemMargin+"px"});r.equalHeights();if(n.carousel){if(n.visible>=n.total){n.autoRotate=false;e("#"+n.navigation).hide()}else{e("#"+n.navigation).show()}}};r.equalHeights=function(){if(n.itemEqualHeight!==false){var t=0;e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").each(function(){e(this).css({height:"auto"});if(e(this).outerHeight()>t){t=e(this).outerHeight()}});e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").css({height:t+"px"})}return true};r.initRotate=function(){if(n.autoRotate!==false){r.rotateTime=window.setInterval(function(){r.rotate()},n.autoRotate)}};r.triggerNavs=function(){e("#"+n.navigation).delegate(".previous<?php echo $Rich_Web_VSlider_ID; ?>, .next<?php echo $Rich_Web_VSlider_ID; ?>","click",function(t){t.preventDefault();r.prepareExecute();if(e(this).hasClass("previous<?php echo $Rich_Web_VSlider_ID; ?>")&&r.testprevious<?php echo $Rich_Web_VSlider_ID; ?>(r.itemActive)){r.previous<?php echo $Rich_Web_VSlider_ID; ?>()}else if(e(this).hasClass("next<?php echo $Rich_Web_VSlider_ID; ?>")&&r.testNext()){r.next()}else{return}})};r.prepareExecute=function(){if(n.autoRotate){clearInterval(r.rotateTime)}r.preventAnimateEvent();r.itemActive=e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>."+n.itemClassActive);return true};r.preventAnimateEvent=function(){if(e(r).find(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>:animated").length>0){return false}};r.rotate=function(){r.preventAnimateEvent();r.itemActive=e(r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>."+n.itemClassActive);r.next();return true};r.testprevious<?php echo $Rich_Web_VSlider_ID; ?>=function(t){return e(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>",r).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>").index(t)>0};r.testNext=function(){return!n.infinite&&r.wrapWidth>=(n.itemWidth+n.itemMargin)*(n.visible+1)-r.wrapMargin||n.infinite};r.previous<?php echo $Rich_Web_VSlider_ID; ?>=function(){r.wrapMargin=n.infinite?r.wrapMarginDefault+e(r.itemActive).outerWidth(true):r.wrapMargin+e(r.itemActive).outerWidth(true);var t=e(r.itemActive).index();var i=e(r.itemActive).prev(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>");var s="previous<?php echo $Rich_Web_VSlider_ID; ?>";e(r).trigger("beginCarousel",[n,r,s]);e(r).find(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>").animate({marginLeft:r.wrapMargin+"px"},n.speed,function(){e(r.itemActive).removeClass(n.itemClassActive);e(i).addClass(n.itemClassActive);if(n.infinite){e(this).css({marginLeft:r.wrapMarginDefault}).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:first-child").before(e(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:last-child",r))}else{if(r.testprevious<?php echo $Rich_Web_VSlider_ID; ?>(i)===false)e("#"+n.navigation).find(".previous<?php echo $Rich_Web_VSlider_ID; ?>").addClass("previous<?php echo $Rich_Web_VSlider_ID; ?>-inactive");if(r.testNext())e("#"+n.navigation).find(".next<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("next<?php echo $Rich_Web_VSlider_ID; ?>-inactive")}e(this).trigger("endCarousel",[n,r,s])})};r.next=function(){r.wrapMargin=n.infinite?r.wrapMarginDefault-e(r.itemActive).outerWidth(true):r.wrapMargin-e(r.itemActive).outerWidth(true);var t=e(r.itemActive).index();var i=e(r.itemActive).next(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>");var s="next<?php echo $Rich_Web_VSlider_ID; ?>";e(r).trigger("beginCarousel",[n,r,s]);e(r).find(".crsl-wrap<?php echo $Rich_Web_VSlider_ID; ?>").animate({marginLeft:r.wrapMargin+"px"},n.speed,function(){e(r.itemActive).removeClass(n.itemClassActive);e(i).addClass(n.itemClassActive);if(n.infinite){e(this).css({marginLeft:r.wrapMarginDefault}).find(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:last-child").after(e(".crsl-item<?php echo $Rich_Web_VSlider_ID; ?>:first-child",r))}else{if(r.testprevious<?php echo $Rich_Web_VSlider_ID; ?>(i))e("#"+n.navigation).find(".previous<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("previous<?php echo $Rich_Web_VSlider_ID; ?>-inactive");if(r.testNext()===false)e("#"+n.navigation).find(".next<?php echo $Rich_Web_VSlider_ID; ?>").addClass("next<?php echo $Rich_Web_VSlider_ID; ?>-inactive")}e(this).trigger("endCarousel",[n,r,s])})};var i=false,s;e(window).on("mouseleave",function(t){if(t.target)s=t.target;else if(t.srcElement)s=t.srcElement;if(e(r).attr("id")&&e(s).parents(".crsl-items<?php echo $Rich_Web_VSlider_ID; ?>").attr("id")===e(r).attr("id")||e(s).parents(".crsl-items<?php echo $Rich_Web_VSlider_ID; ?>").data("navigation")===e(r).data("navigation")){i=true}else{i=false}return false});e(window).on("keydown",function(e){if(i===true){if(e.keyCode===37){r.prepareExecute();r.previous<?php echo $Rich_Web_VSlider_ID; ?>()}else if(e.keyCode===39){r.prepareExecute();r.next()}}return});e(r).on("loadedCarousel loadedImagesCarousel",function(){r.equalHeights()});e(window).on("carouselResizeEnd",function(){if(n.itemWidth!==e(r).outerWidth())r.config()});e(window).ready(function(){e(r).trigger("prepareCarousel",[n,r]);r.init();e(window).on("resize",function(){if(this.carouselResizeTo)clearTimeout(this.carouselResizeTo);this.carouselResizeTo=setTimeout(function(){e(this).trigger("carouselResizeEnd")},10)})});e(window).load(function(){r.testPreload();r.config()})})}})(jQuery)
				</script>
				<script type="text/javascript">
					jQuery(function(){
						jQuery('.crsl-items<?php echo $Rich_Web_VSlider_ID; ?>').carousel_RW<?php echo $Rich_Web_VSlider_ID; ?>({
							infinite: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop;?>,
							visible: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols;?>,
							speed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Speed*1000;?>,
							autoRotate: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP;?>,
							itemMinWidth:180,
							itemEqualHeight: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH;?>,
							itemMargin: <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PB>2){ echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PB; }else{ echo '2';}?>,
							carousel: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car;?>
						})
					})
				</script>
				<?php } else if ($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Rich Slider') { ?>
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/rvslider.min.css',__FILE__);?>">
				<style>
				.rvs-container<?php echo $Rich_Web_VSlider_ID; ?>{
					position:relative;
					margin-bottom:50px !important;
					/*width:800px;*/
					/*height:400px !important;*/
					/*height:auto !important;*/
					max-width:100%;
					/*padding-right:0px !important;*/
				}
				.rvs-container<?php echo $Rich_Web_VSlider_ID; ?>_mobile{
					height:auto !important;
				}
				
				.rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>{
					height:100% !important;
				}
				.rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>_mobile{
					/*height:300px !important;*/
					padding-bottom:56.25%;
				}
				/*.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>{
					position:relative;
					width:100%;
				}*/
				<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ShT == "Type 1") {?>
					.rvs-container<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_Sh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ShC; ?> !important;
					}
				<?php } else { ?>
					.rvs-container<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_Sh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_Sh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ShC; ?> !important;
					}
				<?php } ?>
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?> a.rvs-nav-item{
					border-top:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_BW; ?>px solid <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_BC; ?> !important;
					
				}
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?> a.rvs-nav-item:hover{
					background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_HBgC; ?> !important;
					border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_HBC; ?> !important;
				}
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>{
					background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_BgC; ?> !important;
				}
				.rvs-container<?php echo $Rich_Web_VSlider_ID; ?> a.rvs-nav-item.rvs-active{
					background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_CBgC; ?> !important;
					border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_CBC; ?> !important;
				}
				.rvs-nav-item-title<?php echo $Rich_Web_VSlider_ID; ?>{
					font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_FS; ?>px !important;
					font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_FF; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_C; ?> !important;
					line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_FS+3; ?>px !important;
					text-transform:none !important;
					letter-spacing: 0 !important;
				}
				.rvs-nav-item:hover .rvs-nav-item-title<?php echo $Rich_Web_VSlider_ID; ?>{
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_HC; ?> !important;
				}
				.rvs-active .rvs-nav-item-title<?php echo $Rich_Web_VSlider_ID; ?>{
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_CC; ?> !important;
				}

				.rvs-nav-item-credits<?php echo $Rich_Web_VSlider_ID; ?>{
					font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_FS; ?>px !important;
					font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_FF; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_C; ?> !important;
					line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_FS+3; ?>px !important;
				}
				.rvs-nav-item:hover .rvs-nav-item-credits<?php echo $Rich_Web_VSlider_ID; ?>{
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_HC; ?> !important;
				}
				.rvs-active .rvs-nav-item-credits<?php echo $Rich_Web_VSlider_ID; ?>{
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ND_CC; ?> !important;
				}
				.rvs-nav-item-thumb<?php echo $Rich_Web_VSlider_ID; ?>{
					border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_BW; ?>px solid <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_HBgC; ?> !important;
					border-radius:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_BR; ?>% !important;
				}
				<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_ShT == "Type 1") {?>
					.rvs-nav-item-thumb<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_ShC; ?> !important;
					}
				<?php } else { ?>
					.rvs-nav-item-thumb<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_BSh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NImg_ShC; ?> !important;
					}
				<?php } ?>
				.rvs-nav-prev<?php echo $Rich_Web_VSlider_ID; ?>{
					background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_BgC; ?> !important;
					border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_BgC; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_C; ?> !important;
				}
				.rvs-nav-next<?php echo $Rich_Web_VSlider_ID; ?>{
					background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_BgC; ?> !important;
					border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_BgC; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NScroll_C; ?> !important;
				}
				.rvs-item-text<?php echo $Rich_Web_VSlider_ID; ?>{
					font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_IT_FS; ?>px !important;
					font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_IT_FF; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_IT_C; ?> !important;
				}
				.rvs-item-text<?php echo $Rich_Web_VSlider_ID; ?> small{
					font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ID_FS; ?>px !important;
					font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ID_FF; ?> !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ID_C; ?> !important;
				}
				.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>:before{
					font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS; ?>px !important;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_C; ?> !important;
					top:0% !important;
					transform:none !important;
					-webkit-transform:none !important;
					-ms-transform:none !important;
					-moz-transform:none !important;
					-o-transform:none !important;
				}
				.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>{
					width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS*2; ?>px !important;
					height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS*2; ?>px !important;
					line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS*2; ?>px !important;
				}
				.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>{
					background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_BgC; ?> !important;
				}
				.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>:hover{
					background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_HBgC; ?> !important;
				}
				.rw_rvs-close{
					position: absolute;
					color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_C; ?> !important;
					font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_FS; ?>px !important;
				    top: 10px;
				    left: 10px;
				    padding: 5px 7px;
				    background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_BgC; ?> !important;
				    cursor: pointer;
				    border-radius: 4px;
				}
				.rw_rvs-close:hover{
					background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_HBgC; ?> !important;
				}
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar 
				{
					width: 0.5em;
				}
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-track 
				{
					-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NI_BgC; ?>;
				}
				.rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-thumb {
					background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_C; ?>;
					outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_NT_C; ?>;
				}
				.rvs-nav-item{
					border-bottom:none !important;
					box-shadow:none !important;
				}
				@media screen and (max-width:500px){
					.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>:before{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS/2; ?>px !important;
					}
					.rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>{
						width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS; ?>px !important;
						height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS; ?>px !important;
						line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_PlIc_FS/2+2; ?>px !important;
					}
					.rvs-item-text<?php echo $Rich_Web_VSlider_ID; ?> {
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_IT_FS*2/3; ?>px !important;
						line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_IT_FS*2/3+3; ?>px !important;
					}
					.rvs-item-text<?php echo $Rich_Web_VSlider_ID; ?> small{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_ID_FS*2/3; ?>px !important;
					}
					.rw_rvs-close{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_FS*2/3; ?>px !important;
					    padding: 3px 5px;
					}
				}
				</style>
				<div class="rvs-container rvs-container<?php echo $Rich_Web_VSlider_ID; ?>">
					<div class="rvs-item-container">
						<div class="rvs-item-stage rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>">
							<!-- The below is a single item, simply duplicate this layout for each item -->
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
							<div class="rvs-item rvs-item<?php echo $Rich_Web_VSlider_ID; ?>" style="background-image: url('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>')">
								<p class="rvs-item-text rvs-item-text<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><small><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc;?></small></p>
								<a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Vid;?>" class="rvs-play-video rvs-play-video<?php echo $Rich_Web_VSlider_ID; ?>"></a>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="rvs-nav-container rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>">
						<a class="rvs-nav-prev rvs-nav-prev<?php echo $Rich_Web_VSlider_ID; ?>"></a>
						<div class="rvs-nav-stage">
							<!-- The below is the corresponding nav item for the single item, simply duplicate this layout for each item -->
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
							<a class="rvs-nav-item">
								<span class="rvs-nav-item-thumb rvs-nav-item-thumb<?php echo $Rich_Web_VSlider_ID; ?>" style="background-image: url('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>')"></span>
								<h4 class="rvs-nav-item-title rvs-nav-item-title<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></h4>
								<span class="rvs-nav-item-credits rvs-nav-item-credits<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc;?></span>
							</a>
							<?php } ?>
						</div>
						<a class="rvs-nav-next rvs-nav-next<?php echo $Rich_Web_VSlider_ID; ?>"></a>
					</div>
				</div>
				<input type='text' style="display:none" class="Rich_Web_RVVS_DelIc_T" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_RVVS_DelIc_T; ?>" />
				<input type='text' style="display:none" class="Rich_Web_VSlider_ID" value="<?php echo $Rich_Web_VSlider_ID; ?>" />
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/rvslider.min.js',__FILE__);?>"></script>
				
				<script type="text/javascript">
					jQuery(document).ready(function(){
						// alert(jQuery('.rvs-item-container').width());
						function resp(){
							jQuery('.rvs-container').css('height',jQuery('.rvs-item-container').width()*9/16)
							if(jQuery(".rvs-container<?php echo $Rich_Web_VSlider_ID; ?>").width()<=500){
								jQuery(".rvs-container<?php echo $Rich_Web_VSlider_ID; ?>").addClass("rvs-container<?php echo $Rich_Web_VSlider_ID; ?>_mobile");
								jQuery(".rvs-container<?php echo $Rich_Web_VSlider_ID; ?>").css("padding-right","0px");
								jQuery(".rvs-nav-next<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
								jQuery(".rvs-nav-prev<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
								jQuery(".rvs-nav-item-thumb<?php echo $Rich_Web_VSlider_ID; ?>").css("display","block");
								jQuery(".rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>").addClass("rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>_mobile");
								jQuery(".rvs-nav-item").css({"height":"auto","padding":"10px"});
								jQuery(".rvs-nav-stage").css("max-height","160px");
								jQuery(".rvs-nav-container<?php echo $Rich_Web_VSlider_ID; ?>").css({"position":"relative","width":"100%","overflow":"visible","overflow-x":"hidden","max-height":"160px"});
								jQuery(".rvs-item-stage<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery(".rvs-container<?php echo $Rich_Web_VSlider_ID; ?>").width()*3/4);
							}
						}
						jQuery(window).load(function(){
							resp();
						})
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
				<script>
					jQuery(document).ready(function($){
						setTimeout(function(){
							$('.rvs-container<?php echo $Rich_Web_VSlider_ID; ?>').rvslider1();
						},500)
					});
				</script>
				<?php } else if ($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='TimeLine Slider') { ?>
				<?php if ($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Type=='horizontal') { ?>
				<style type="text/css">
					.sociales<?php echo $Rich_Web_VSlider_ID; ?> {
						text-align: center;
						margin-bottom: 20px;
					}
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w {
						overflow: hidden;
						margin: 20px auto !important;
						position: relative;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s {
						height: 55px;
						overflow: hidden;
						border:none !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s li {
						list-style: none;
						float: left;
						height: 50px;
						font-size: 24px;
						text-align: center;
						padding: 0px !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s a {
						line-height: 38px;
						padding-bottom: 10px;
						box-shadow:none !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s .select<?php echo $Rich_Web_VSlider_ID; ?>ed {
						font-size: 38px;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s {
						
						overflow: hidden;
					}	
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li {
						list-style: none;
						float: left;
						padding: 0px !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li:before{
						content:"" !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s li:before{
						content:"" !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li.select<?php echo $Rich_Web_VSlider_ID; ?>ed .RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?> {
						perspective:800px !important;
						-webkit-transform: scale(1.1,1.1);
						-moz-transform: scale(1.1,1.1);
						-o-transform: scale(1.1,1.1);
						-ms-transform: scale(1.1,1.1);
						transform: scale(1.1,1.1);
						transform-origin : left top;
						-webkit-transform-origin : left top;
						-ms-transform-origin : left top;
						-moz-transform-origin : left top;
						-o-transform-origin : left top;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li .RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?> {
						float: left;
						margin: 10px 30px 10px 30px;
						cursor:pointer;
						display:inline-block !important;
						overflow:hidden !important;
						perspective:800px !important;
						-webkit-perspective:800px !important;
						-ms-perspective:800px !important;
						-moz-perspective:800px !important;
						-o-perspective:800px !important;
						-webkit-transition: all 0.8s ease-in-out;
						-moz-transition: all 0.8s ease-in-out;
						-o-transition: all 0.8s ease-in-out;
						-ms-transition: all 0.8s ease-in-out; 
						transition: all 0.8s ease-in-out;
						-webkit-transform: scale(0.7,0.7);
						-moz-transform: scale(0.7,0.7);
						-o-transform: scale(0.7,0.7);
						-ms-transform: scale(0.7,0.7);
						transform: scale(0.7,0.7);
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li .RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?> .RW_tim_vid_vid {
						width:100% !important;  
						height:100% !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li .RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?> img {
						-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF)"; /* IE 8 */   
						filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF);/* IE 6 & 7 */    
						zoom: 1;
						transition:all 0.4s linear !important;
						-webkit-transition:all 0.4s linear !important;
						-ms-transition:all 0.4s linear !important;
						-moz-transition:all 0.4s linear !important;
						-o-transition:all 0.4s linear !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li h1 {
						color: #ffcc00;
						font-size: 48px;
						margin: 20px 0;
						text-shadow: #000 1px 1px 2px;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li p {
						font-size: 14px;
						margin-right: 15px;
						font-weight: normal;
						line-height: 22px;
						text-shadow: #000 1px 1px 2px;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li h1{
							
					}	
		
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v {
						position: absolute;
						top: 0;
						top: 170px;
						width: 22px;
						height: 38px;
						background-position: 0 0;
						background-repeat: no-repeat;
						overflow: hidden;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t:hover,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v:hover {
						background-position: 0 -76px;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t {
						right: 0;
					}
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v {
						left: 0;
					}
					.Timeline-right{
						background-image: url('<?php echo plugins_url("images/next_img.png",__FILE__);?>');
						text-indent: -9999px;
						font-size: 70px;
						width: 38px;
						height: 22px;
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
						cursor:pointer !important;
					}
					.Timeline-left{
						background-image: url('<?php echo plugins_url("images/prev_img.png",__FILE__);?>');
						text-indent: -9999px;
						font-size: 70px;
						width: 38px;
						height: 22px;
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
						cursor:pointer !important;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t.disabled,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v.disabled {
						opacity: 0.2;
					}
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_W; ?>px !important;
						max-width:100%;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BgC; ?> !important;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShT == "Type 1") { ?>
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShC; ?> !important;
					}
					<?php } else { ?>
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShC; ?> !important;
					}
					<?php } ?>
					
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li.select<?php echo $Rich_Web_VSlider_ID; ?>ed .RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?> .RW_tim_vid_vid{
						position:absolute !important;
						width:100% !important;
						height:100% !important;
						max-width:150% !important;
						z-index:1 !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s,#issue<?php echo $Rich_Web_VSlider_ID; ?>s{
						padding:0px !important;
						margin-bottom:0px !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s{
						height:calc(100% - <?php echo 55 + $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_S + 10; ?>px) !important;
					}

					.RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>{
						position:relative;
						/*width:40%;*/
					}
					.RW_IMGD_Anim{
						position: relative;
					    float: none !important;
					    margin: 0 !important;
					    left: 50% !important;
					    transform: translateX(-50%) !important;
					}
					#rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						width:100%;
						top:42px;
						height:0px !important;
						border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BW; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BS; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BC; ?> !important;
					}
					.rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						border:5px solid <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NIC_C; ?> !important;
						width:0px;
						height:0px;
						top:<?php echo 42-3/$Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BW; ?>px;
						left:50%;
						border-radius:50%;
						transform:translateX(-50%);
						-webkit-transform:translateX(-50%);
						-ms-transform:translateX(-50%);
						-moz-transform:translateX(-50%);
						-o-transform:translateX(-50%);
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s{
						position: relative;
						overflow:auto !important;
						border:none !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li{
						position:relative;
						height:100%;
						padding:0px !important;
						margin:0px !important;
						box-sizing: border-box !important;
						padding: 0px !important;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>{
						height:100%;
						padding-left:20px;
						box-sizing:border-box;
						overflow-x:hidden;
					}
					.rw_content_div_Anim{
						height:auto !important;
						max-height:250px !important;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t, #pre<?php echo $Rich_Web_VSlider_ID; ?>v{
						top:50%;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BgC; ?> !important;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
					}
					.rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>{
						min-width:150px !important;
						width:250px;
						text-align:center;
						position: relative;
						
					}
					.RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>{
						box-sizing:border-box !important;
						border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BW; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BS; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BC; ?> !important;
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BC; ?> !important;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShT == "Type 1") { ?>
					.RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShC; ?> !important;
					}
					<?php } else { ?>
					.RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShC; ?> !important;
					}
					<?php } ?>
					
					.RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						top:50%;
						left:50%;
						z-index:2 !important;
						border-radius:4px;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_C; ?> !important;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_BgC; ?> !important;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
					}
					.RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_HC; ?> !important;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_HBgC; ?> !important;
					}
					.RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						width:0px !important;
						height:0px !important;
						border-radius:50% !important;
						perspective:800px !important;
						-webkit-perspective:800px !important;
						-ms-perspective:800px !important;
						-moz-perspective:800px !important;
						-o-perspective:800px !important;
						overflow:hidden;
						opacity:0;
						z-index:2;
						background:#000000 !important;
					}
					.RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>,.RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>{
						width:100% !important;
						height:100% !important;
						position:absolute;
					}

					.RW_Img_VID_Div_Anim_1 {
						top:50% !important;
						left:50% !important;
						width:10% !important;
						height:10% !important;
						opacity:1;
						transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						transition: all 500ms cubic-bezier(0.64, 0.57, 0.67, 1.53);
						-webkit-transition: all 500ms cubic-bezier(0.64, 0.57, 0.67, 1.53);
						-moz-transition: all 500ms cubic-bezier(0.64, 0.57, 0.67, 1.53);
						-o-transition: all 500ms cubic-bezier(0.64, 0.57, 0.67, 1.53);
						-ms-transition: all 500ms cubic-bezier(0.64, 0.57, 0.67, 1.53);
					}
					.RW_Img_VID_Div_Anim2_1 {
						width:100% !important;
						height:100% !important;
						border-radius:0% !important;
						transition: all 0.3s cubic-bezier(1.000, -0.530, 0.405, 1.425);
						-webkit-transition: all 0.3s cubic-bezier(1.000, -0.530, 0.405, 1.425);
						-moz-transition: all 0.3s cubic-bezier(1.000, -0.530, 0.405, 1.425);
						-o-transition: all 0.3s cubic-bezier(1.000, -0.530, 0.405, 1.425);
						-ms-transition: all 0.3s cubic-bezier(1.000, -0.530, 0.405, 1.425);
					}
					.RW_Img_VID_Div_Anim_2 {
						top:50% !important;
						left:50% !important;
						width:100% !important;
						height:100% !important;
						opacity:0.5 !important;
						border-radius:0% !important;
						transform:translateY(-50%) translateX(-50%) !important;
						-webkit-transform:translateY(-50%) translateX(-50%) !important;
						-ms-transform:translateY(-50%) translateX(-50%) !important;
						-moz-transform:translateY(-50%) translateX(-50%) !important;
						-o-transform:translateY(-50%) translateX(-50%) !important;
						transition: all 500ms linear !important;
						-webkit-transition: all 500ms linear !important;
						-moz-transition: all 500ms linear !important;
						-o-transition: all 500ms linear !important;
						-ms-transition: all 500ms linear !important;
					}
					.RW_Img_VID_Div_Anim2_2 {
						opacity:1 !important;
						
						transition: all 0.3s linear !important;
						-webkit-transition: all 0.3s linear !important;
						-moz-transition: all 0.3s linear !important;
						-o-transition: all 0.3s linear !important;
						-ms-transition: all 0.3s linear !important;
					}
					.RW_Img_VID_Div_Anim_3 {
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						opacity:0.5 !important;
						border-radius:0% !important;
						transition: all 500ms linear !important;
						-webkit-transition: all 500ms linear !important;
						-moz-transition: all 500ms linear !important;
						-o-transition: all 500ms linear !important;
						-ms-transition: all 500ms linear !important;
					}
					.RW_Img_VID_Div_Anim2_3 {
						opacity:1 !important;
						
						transition: all 0.3s linear !important;
						-webkit-transition: all 0.3s linear !important;
						-moz-transition: all 0.3s linear !important;
						-o-transition: all 0.3s linear !important;
						-ms-transition: all 0.3s linear !important;
					}
					.RW_Img_VID_Div_Anim_4 {
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						opacity:0.5 !important;
						border-radius:0% !important;
						/*transform:translateY(-50%) translateX(-50%) !important;
						transition: opacity 500ms linear !important;
						-webkit-transition: opacity 500ms linear !important;
						-moz-transition: opacity 500ms linear !important;
						-o-transition: opacity 500ms linear !important;
						-ms-transition: opacity 500ms linear !important;*/
					}
					.RW_Img_VID_Div_Anim2_4 {
						opacity:1 !important;
						
						transition: all 0.3s linear !important;
						-webkit-transition: all 0.3s linear !important;
						-moz-transition: all 0.3s linear !important;
						-o-transition: all 0.3s linear !important;
						-ms-transition: all 0.3s linear !important;
					}
					.RW_Img_VID_Div_Anim_5 {
						top:0% !important;
						left:0% !important;
						width:100% !important;
						height:100% !important;
						opacity:1 !important;
						border-radius:0% !important;
						/*transform:translateY(-50%) translateX(-50%) !important;
						transition: opacity 0ms linear !important;
						-webkit-transition: opacity 0ms linear !important;
						-moz-transition: opacity 0ms linear !important;
						-o-transition: opacity 0ms linear !important;
						-ms-transition: opacity 0ms linear !important;*/
					}
					.RW_Img_VID_Div_Anim2_5 {
						transition: all 0.3s linear !important;
						-webkit-transition: all 0.3s linear !important;
						-moz-transition: all 0.3s linear !important;
						-o-transition: all 0.3s linear !important;
						-ms-transition: all 0.3s linear !important;
					}
					.RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>_big{
						z-index:3;
						cursor:pointer !important;
						width:50px !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>{
						color:#ffffff !important;
						cursor:pointer !important;
						border:none !important;
						outline:none !important;
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_C; ?> !important;
						perspective:800px !important;
						transition:all 0.3s !important;
						-webkit-transition:all 0.3s !important;
						-ms-transition:all 0.3s !important;
						-moz-transition:all 0.3s !important;
						-o-transition:all 0.3s !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>.select<?php echo $Rich_Web_VSlider_ID; ?>ed {
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FS*5/3; ?>px !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_HC; ?> !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s{
						width:<?php echo count($Rich_Web_VSlider_Videos)*250 ?>px !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s .select<?php echo $Rich_Web_VSlider_ID; ?>ed{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_CC; ?> !important;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?> h1 {
						margin:10px 0px !important;
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_C; ?> !important;
						text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TA; ?> !important;
						text-shadow:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TShC; ?> !important;
						text-transform: none !important;
						font-weight:normal !important;
						line-height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FS+4; ?>px !important;;
					}
					.rw_content_div<?php echo $Rich_Web_VSlider_ID; ?> p {
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
						text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TA; ?> !important;
						text-shadow:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TShC; ?> !important;
						text-transform: none !important;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T != "Type 12") { ?>
					.rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?>{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_S; ?>px !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_C; ?> !important;
						cursor:pointer !important;
						opacity:0.7 !important;
						text-shadow:1px 1px 1px #000000 !important;
					}
					.rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						opacity:1 !important;
					}
					<?php } ?>
					.rw_tim_icons_cont_div<?php echo $Rich_Web_VSlider_ID; ?>{
						position:relative;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_S+10; ?>px !important;
						text-align:center !important;
					}
					.rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?> {
						position:relative !important;
						top: 50% !important;
						transform:translateY(-50%) !important;
						padding:0px !important;
						width:auto !important;
						height:auto !important;
					}
					.RW_tim_vid_video{
						position:absolute;
						top:0px !important;
						left:0px !important;
						width:100% !important;
						height:100% !important;
					}
					.rw_resp_div<?php echo $Rich_Web_VSlider_ID; ?>{
						position: relative !important;
						width: 100% !important;
						padding-bottom: 56.25% !important;
						height:0px !important;
						overflow:hidden !important;
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BC; ?> !important;
					}
					</style>
					<div id="timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w">
						<div id="rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>"></div>
						<ul id="date<?php echo $Rich_Web_VSlider_ID; ?>s" style="margin:0px">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
								<?php if($i==0) { ?>
								<li class="rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>"><span class="rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>"></span><a href="#<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?> select<?php echo $Rich_Web_VSlider_ID; ?>ed"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></a></li>
								<?php } else { ?>
								<li class="rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>"><span class="rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>"></span><a href="#<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></a></li>
								<?php } ?>
							<?php } ?>
						</ul>
						<div class="rw_tim_icons_cont_div<?php echo $Rich_Web_VSlider_ID; ?>">
							<i href="#" id="pre<?php echo $Rich_Web_VSlider_ID; ?>v" class="rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T; ?>-left"></i>
							<i href="#" id="nex<?php echo $Rich_Web_VSlider_ID; ?>t" class="rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T; ?>-right"></i>
						</div>
						<ul id="issue<?php echo $Rich_Web_VSlider_ID; ?>s" style="margin:0px">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
							<li id="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="rw_resp_li<?php echo $Rich_Web_VSlider_ID; ?>">
								<div class="RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>">
									<iframe class="RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen="true" mozallowfullscreen="true" allowFullScreen="true"></iframe>
									<img class="RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
								</div>
								<div class="RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>" >
									<div class="rw_resp_div<?php echo $Rich_Web_VSlider_ID; ?>" name="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>">
										<i class="RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_T; ?>" ></i>
										<img class="RW_tim_vid_vid" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
										<iframe class="RW_tim_vid_video" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen="true" mozallowfullscreen="true" allowFullScreen="true"></iframe>
									</div>
								</div>
								<div class="rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>">
									<h1><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></h1>
									<p><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc;?></p>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<input type="text" style="display:none;" class="Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_SSh; ?>">
					<input type="text" style="display:none;" class="Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_SShChT; ?>">
					<input type="text" style="display:none;" class="Rich_Web_MS_Autoplay<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Autoplay; ?>">
					<input type="text" style="display:none;" class="Rich_Web_MS_startAt<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_startAt; ?>">
					<input type="text" style="display:none;" class="Rich_Web_MS_Sl1EfT<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Sl1EfT; ?>">
					<input type="text" style="display:none;" class="Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_S; ?>">
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery(".rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>.select<?php echo $Rich_Web_VSlider_ID; ?>ed").parent().find(".rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>").css("border-color","red");
							console.log(jQuery(".rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>.select<?php echo $Rich_Web_VSlider_ID; ?>ed").parent().children().find("span"));
							var top<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".rw_resp_li<?php echo $Rich_Web_VSlider_ID; ?>").offset().top;
							var left<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".rw_resp_li<?php echo $Rich_Web_VSlider_ID; ?>").offset().left;
							var img_top<?php echo $Rich_Web_VSlider_ID; ?> = parseInt(jQuery('.RW_tim_vid_vid').offset().top)+parseInt(jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").height())/3;
							var img_left<?php echo $Rich_Web_VSlider_ID; ?> = parseInt(jQuery('.RW_tim_vid_vid').offset().left)+parseInt(jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").width())/3;
							var type<?php echo $Rich_Web_VSlider_ID; ?>=parseInt(jQuery(".Rich_Web_MS_Sl1EfT<?php echo $Rich_Web_VSlider_ID; ?>").val());
							var Rich_Web_MS_Autoplay<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_Autoplay<?php echo $Rich_Web_VSlider_ID; ?>").val();
							var Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>").val();
							jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
							jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").css("top",(img_top<?php echo $Rich_Web_VSlider_ID; ?>-top<?php echo $Rich_Web_VSlider_ID; ?>)+"px");
							jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").css("left",(img_left<?php echo $Rich_Web_VSlider_ID; ?>-left<?php echo $Rich_Web_VSlider_ID; ?>)+"px");
							jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").attr("src","");
							jQuery(".rw_resp_div<?php echo $Rich_Web_VSlider_ID; ?>").click(function(){
								if(jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width() > 500) {
									jQuery(".RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>").css("display","block");
									jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").css("display","block");
									jQuery(this).prevUntil("div").children().attr("src",jQuery(this).attr("name"));
									if(Rich_Web_MS_Autoplay<?php echo $Rich_Web_VSlider_ID; ?> == "on") {
										jQuery(this).parent().parent().children().find(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").attr("src",jQuery(this).attr("name")+'?autoplay=1&rel=0&amp');
										if(type<?php echo $Rich_Web_VSlider_ID; ?>==5){
											jQuery(".RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
										}
									} else {
										jQuery(this).parent().parent().children().find(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").attr("src",jQuery(this).attr("name"));
									}
									jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").addClass("RW_Img_VID_Div_Anim_"+type<?php echo $Rich_Web_VSlider_ID; ?>);
									setTimeout(function(){
										jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").addClass("RW_Img_VID_Div_Anim2_"+type<?php echo $Rich_Web_VSlider_ID; ?>);
									},500)
									if(type<?php echo $Rich_Web_VSlider_ID; ?> != 5){
										setTimeout(function(){
											jQuery(".RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
											// jQuery(".RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>_big").css("display","none");
										},800)
									}
								}else{
									jQuery(".RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
									jQuery(".RW_tim_vid_vid").css("display","none");
									jQuery(".RW_tim_vid_video").css("display","block");
									var src = jQuery(this).attr("name");
									console.log(jQuery(this).children(".RW_tim_vid_video"))
									jQuery(this).children(".RW_tim_vid_video").attr("src",src+'?autoplay=1&rel=0&amp');
								}
							})
							jQuery("#date<?php echo $Rich_Web_VSlider_ID; ?>s a").click(function(event){
								event.preventDefault();
								if(jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width() > 500) {
									jQuery(".RW_tim_vid_vid_Big_Img<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
									jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").attr("src","");
									jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("RW_Img_VID_Div_Anim_"+type<?php echo $Rich_Web_VSlider_ID; ?>);
									jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
									jQuery(".RW_Img_VID_Div<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("RW_Img_VID_Div_Anim2_"+type<?php echo $Rich_Web_VSlider_ID; ?>);

								}else{
									jQuery(".RW_tim_vid_video").attr("src","");
									jQuery(".RW_tim_vid_video").css("display","none");
									jQuery(".RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>").css("display","block");
									jQuery(".RW_tim_vid_vid").css("display","block");
								}
							})
							
							jQuery(".RW_tim_vid_vid_Big_Vid<?php echo $Rich_Web_VSlider_ID; ?>").click(function(event){
								event.preventDefault();
							})
							jQuery(".ytp-fullscreen-button").click(function(){
								event.preventDefault();
								alert("sfc")
							})
							function resp<?php echo $Rich_Web_VSlider_ID; ?>() {
									jQuery(".RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>").css("font-size",Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>*jQuery(".RW_tim_vid_vid").width()/500+"px");
									jQuery(".RW_tim_vid_play<?php echo $Rich_Web_VSlider_ID; ?>").css("padding",Math.ceil(Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>/4)*jQuery(".RW_tim_vid_vid").width()/300+"px "+Math.ceil(Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>/2)*jQuery(".RW_tim_vid_vid").width()/300+"px");
									jQuery(".rw_resp_li<?php echo $Rich_Web_VSlider_ID; ?>").css("width",jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width());
								if(jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width() <= 500){
									jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").css("width","95%");
									jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").addClass("RW_IMGD_Anim");
									jQuery(".rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>").addClass("rw_content_div_Anim");
									jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").css("height","auto");
									jQuery(".RW_tim_vid_video").css("opacity","1");
								}else{
									jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").css("width","40%");
									jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("RW_IMGD_Anim");
									jQuery(".rw_content_div<?php echo $Rich_Web_VSlider_ID; ?>").removeClass("rw_content_div_Anim");
									jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").css("height",jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width()*9/16+55+jQuery(".rw_tim_icons_cont_div<?php echo $Rich_Web_VSlider_ID; ?>").height());
									jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>").css("height","auto");
									jQuery(".RW_tim_vid_video").css("opacity","0");
								}	
							}
							setTimeout(function(){
								resp<?php echo $Rich_Web_VSlider_ID; ?>();
							},100)
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
							jQuery(window).resize(function(){
								resp<?php echo $Rich_Web_VSlider_ID; ?>();
							})
						})
					</script>
					<?php } else { ?>
					<style>
					.sociales<?php echo $Rich_Web_VSlider_ID; ?> {
						text-align: center;
						margin-bottom: 20px;
					}
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w {
						overflow: hidden;
						margin: 20px auto !important;
						position: relative;
						max-width:100%;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s {
						width: 150px;
						height: 600px;
						overflow: hidden;
						float: left;
						margin-left:0px !important;
						margin: 0;
						padding-left:0px !important;

					}
					.rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>:before{
						content: "" !important;
					}
					.rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>:before{
						content: "" !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s li {
						list-style: none;
						height: 100px;
						line-height: 100px;
						font-size: 24px;
						padding-left: 15px !important;
						position:relative;
						margin: 0px !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s a {
						line-height: 38px;
						padding-bottom: 10px;
						box-shadow: none !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s .select<?php echo $Rich_Web_VSlider_ID; ?>ed {
						font-size: 38px;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s {
						width: calc(100% - 150px);
						overflow: hidden;
						float: left;
						padding-left:0px;
						margin-left:0px !important;
						margin-right:0px !important;
						
						position:relative;
					}	
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li {
						width: 100% !important;
						list-style: none;
						margin-left:0px !important;
						padding:0px !important;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li.select<?php echo $Rich_Web_VSlider_ID; ?>ed .rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?> {
						-webkit-transform: scale(1,1);
						-moz-transform: scale(1,1);
						-o-transform: scale(1,1);
						-ms-transform: scale(1,1);
						transform: scale(1,1);
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li .rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?> {
						-webkit-transition: transform 0.8s ease-in-out;
						-moz-transition: transform 0.8s ease-in-out;
						-o-transition: transform 0.8s ease-in-out;
						-ms-transition: transform 0.8s ease-in-out; 
						transition: transform 0.8s ease-in-out;
						-webkit-transform: scale(0.7,0.7);
						-moz-transform: scale(0.7,0.7);
					    -o-transform: scale(0.7,0.7);
						-ms-transform: scale(0.7,0.7);
						transform: scale(0.7,0.7);
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li h1 {
						color: #ffcc00;
						font-size: 48px;
						text-align: center;
						text-shadow: #000 1px 1px 2px;
					}
					#issue<?php echo $Rich_Web_VSlider_ID; ?>s li p {
						font-size: 14px;
						margin: 10px 20px;
						font-weight: normal;
						line-height: 22px;
						text-shadow: #000 1px 1px 2px;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v {
						position: absolute;
						left: 50%;
						transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						
						background-position: 0 -44px;
						background-repeat: no-repeat;
						
						overflow: hidden;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t:hover,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v:hover {
						background-position:  0 0;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t {
						bottom: 0;
					}
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v {
						top: 0;
					}
					.Timeline-down{
						background-image: url('<?php echo plugins_url("images/next_v.png",__FILE__);?>');
						text-indent: -9999px;
						font-size: 70px;
						width: 38px;
						height: 22px;
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
						cursor:pointer !important;
					}
					.Timeline-up{
						background-image: url('<?php echo plugins_url("images/prev_v.png",__FILE__);?>');
						text-indent: -9999px;
						font-size: 70px;
						width: 38px;
						height: 22px;
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
						cursor:pointer !important;
					}
					#nex<?php echo $Rich_Web_VSlider_ID; ?>t.disabled,
					#pre<?php echo $Rich_Web_VSlider_ID; ?>v.disabled {
						opacity: 0.2;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShT == "Type 1") { ?>
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShC; ?> !important;
					}
					<?php } else { ?>
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_ShC; ?> !important;
					}
					<?php } ?>
					#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w{
						width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_W; ?>px !important;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BgC; ?> !important;
					}
					#rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						height:100%;
						left:<?php echo 7-$Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BW; ?>px;
						border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BW; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BS; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BC; ?> !important;
					}
					.rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						position:absolute;
						border:5px solid <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NIC_C; ?> !important;
						width:0px;
						height:0px;
						top:50%;
						left:<?php echo (7-$Rich_Web_VSlider_Eff[0]->Rich_Web_MS_N_BW)/2; ?>px;
						border-radius:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						-moz-transform:translateY(-50%);
						-o-transform:translateY(-50%);
					}
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						position:relative;
						width:100%;
						box-sizing:border-box !important;
						border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BW; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BS; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BC; ?> !important;
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BC; ?> !important;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShT == "Type 1") { ?>
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShC; ?> !important;
					}
					<?php } else { ?>
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						box-shadow:0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh/2; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_BSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Img_ShC; ?> !important;
					}
					<?php } ?>
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_img{
						position:absolute !important;
						width:100% !important;
						height:100% !important;
						margin:0px !important;
					}
					.rw_cont_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						width:100%;
						height:100%;
						box-sizing:border-box;
						padding: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_S+3; ?>px 20px;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>{
						position:relative;
						margin-top:20px;
						width:100%;
						height:230px; 
						overflow-x:hidden;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_BgC; ?> !important;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
					}
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video{
						position:absolute;
						width:100%;
						height:100%;
					}
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play{
						position:absolute;
						top:50%;
						left:50%;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_C; ?> !important;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_BgC; ?> !important;
						border-radius:4px;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						z-index:3;
						cursor:pointer !important;
						transition:all 0.3s linear !important;
						-webkit-transition:all 0.3s linear !important;
						-ms-transition:all 0.3s linear !important;
						-moz-transition:all 0.3s linear !important;
						-o-transition:all 0.3s linear !important;
					}
					.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play:hover{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_HC; ?> !important;
						background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_HBgC; ?> !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>{
						color:#ffffff !important;
						cursor:pointer !important;
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_C; ?> !important;
						border:none !important;
						outline:none !important;
						transition:all 0.3s  !important;
						-webkit-transition:all 0.3s  !important;
						-ms-transition:all 0.3s  !important;
						-moz-transition:all 0.3s  !important;
						-o-transition:all 0.3s  !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>.select<?php echo $Rich_Web_VSlider_ID; ?>ed{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FS*4/3; ?>px !important;
					}
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_HC; ?> !important;
					}
					#date<?php echo $Rich_Web_VSlider_ID; ?>s .select<?php echo $Rich_Web_VSlider_ID; ?>ed{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_CC; ?> !important;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?> h1 {
						margin:0px !important;
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_C; ?> !important;
						text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TA; ?> !important;
						text-shadow:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_TShC; ?> !important;
						text-transform: none !important;
						font-weight: normal !important;
						line-height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_T_FS+4; ?>px !important;
					}
					.rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?> p {
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_FS; ?>px !important;
						font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_FF; ?> !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_C; ?> !important;
						text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TA; ?> !important;
						text-shadow:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TSh; ?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_D_TShC; ?> !important;
						text-transform: none !important;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T != "Type 12") { ?>
					.rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?>{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_S; ?>px !important;
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_C; ?> !important;
						cursor:pointer !important;
						opacity:0.7 !important;
						text-shadow:1px 1px 1px #000000 !important;
					}
					.rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?>:hover{
						opacity:1 !important;
					}
					<?php } ?>
					.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>:first-child{
						font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_NI_FS*2; ?>px !important;
					}
				</style>
				<div id="timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w">
					<div id="rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>"></div>
					<ul id="date<?php echo $Rich_Web_VSlider_ID; ?>s">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
							<?php if($i==0) { ?>
							<li class="rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>"><span class="rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>"></span><a href="#<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?> select<?php echo $Rich_Web_VSlider_ID; ?>ed"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></a></li>
							<?php } else { ?>
							<li class="rw_tim_tit_width<?php echo $Rich_Web_VSlider_ID; ?>"><span class="rw_circle_tim<?php echo $Rich_Web_VSlider_ID; ?>"></span><a href="#<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>"><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></a></li>
							<?php } ?>
						<?php } ?>
					</ul>
					<ul id="issue<?php echo $Rich_Web_VSlider_ID; ?>s">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
							<?php if($i==0) { ?>
							<li class="rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>" id="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>" class="select<?php echo $Rich_Web_VSlider_ID; ?>ed">
								<div class="rw_cont_tim<?php echo $Rich_Web_VSlider_ID; ?>">
									<div class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>">
										<iframe class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_img" />
										<i class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_T; ?>" name="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>"></i>
									</div>
									<div class="rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>">
										<h1><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></h1>
										<p><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc;?></p>
									</div>
								</div>
							</li>
							<?php } else { ?>
							<li class="rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>" id="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?><?php echo $Rich_Web_VSlider_ID; ?>">
								<div class="rw_cont_tim<?php echo $Rich_Web_VSlider_ID; ?>">
									<div class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>">
										<iframe class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_img" />
										<i class="rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_T; ?>" name="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>"></i>
									</div>
									<div class="rw_titDesc_tim<?php echo $Rich_Web_VSlider_ID; ?>">
										<h1><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title;?></h1>
										<p><?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc;?></p>
									</div>
								</div>
							</li>
							<?php } ?>
						<?php } ?>
					</ul>
					<i  id="nex<?php echo $Rich_Web_VSlider_ID; ?>t" class="rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T; ?>-down"></i>
					<i  id="pre<?php echo $Rich_Web_VSlider_ID; ?>v" class="rw_tim_ic<?php echo $Rich_Web_VSlider_ID; ?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Ic_T; ?>-up"></i>
				</div>
				<input type="text" style="display:none;" class="Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_SSh; ?>">
				<input type="text" style="display:none;" class="Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_SShChT; ?>">
				<input type="text" style="display:none;" class="Rich_Web_MS_startAt<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_startAt; ?>">
				<input type="text" style="display:none;" class="Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>" value="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_PlIc_S; ?>">
				<script type="text/javascript">
					jQuery(document).ready(function(){
						var Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>").val();
						function resp<?php echo $Rich_Web_VSlider_ID; ?>() {
							jQuery(".rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").height());
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").css("font-size",Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>*jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").width()/500+"px");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").css("padding",Math.ceil(Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>/4)*jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").width()/300+"px " + Math.ceil(Rich_Web_MS_PlIc_S<?php echo $Rich_Web_VSlider_ID; ?>/2)*jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").width()/300 +"px");
							if(jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").width() <= 500) {
								jQuery("#date<?php echo $Rich_Web_VSlider_ID; ?>s").css("display","none");
								jQuery("#rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>").css("display","none");
								jQuery("#issue<?php echo $Rich_Web_VSlider_ID; ?>s").css("width","100%");
								jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").width()*9/16);
								jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").css("height",jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").height()+300);
								jQuery(".rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").height());
							} else {
								jQuery("#date<?php echo $Rich_Web_VSlider_ID; ?>s").css("display","block");
								jQuery("#rw_tim_bord<?php echo $Rich_Web_VSlider_ID; ?>").css("display","block");
								jQuery("#issue<?php echo $Rich_Web_VSlider_ID; ?>s").css("width","calc(100% - 150px)");
								jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").width()*9/16);
								jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").css("height",jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>").height()+300);
								jQuery(".rw_tim_li<?php echo $Rich_Web_VSlider_ID; ?>").css("height",jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").height());
							}
						}
						resp<?php echo $Rich_Web_VSlider_ID; ?>();
						setTimeout(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						},100)
						jQuery(window).resize(function(){
							resp<?php echo $Rich_Web_VSlider_ID; ?>();
						})
						jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video").attr("src","");
						jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").click(function(){
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_img").css("display","none");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").css("display","none");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video").css("display","block");
							var src = jQuery(this).attr("name");
							jQuery(this).parent().find(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video").attr("src",src+'?autoplay=1&rel=0&amp');
						})
						jQuery(".rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>").bind('click',function(){
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video").attr("src","");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_video").css("display","none");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_img").css("display","block");
							jQuery(".rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").css("display","block");
						})

					})
				</script>
				<?php } ?>
				<script type="text/javascript">
					var y=false;
					var x=false;
					jQuery.fn.timelinr<?php echo $Rich_Web_VSlider_ID; ?> = function(options<?php echo $Rich_Web_VSlider_ID; ?>){
						setting<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery.extend({
							orientation<?php echo $Rich_Web_VSlider_ID; ?>: 'horizontal',
							containerDiv<?php echo $Rich_Web_VSlider_ID; ?>: '#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w',
							date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>: '#date<?php echo $Rich_Web_VSlider_ID; ?>s',			
							date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>: 'select<?php echo $Rich_Web_VSlider_ID; ?>ed',		
							date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 'normal',
							issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>: '#issue<?php echo $Rich_Web_VSlider_ID; ?>s',		
							issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>: 'select<?php echo $Rich_Web_VSlider_ID; ?>ed',		
							issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 'fast', 
							issue<?php echo $Rich_Web_VSlider_ID; ?>sTransparency<?php echo $Rich_Web_VSlider_ID; ?>: 0.2,
							issue<?php echo $Rich_Web_VSlider_ID; ?>sTransparencySpeed<?php echo $Rich_Web_VSlider_ID; ?>: 500,				
							prevButton<?php echo $Rich_Web_VSlider_ID; ?>: '#pre<?php echo $Rich_Web_VSlider_ID; ?>v',	
							nextButton<?php echo $Rich_Web_VSlider_ID; ?>: '#nex<?php echo $Rich_Web_VSlider_ID; ?>t',	
							arrowKeys<?php echo $Rich_Web_VSlider_ID; ?>: 'false',
							startAt<?php echo $Rich_Web_VSlider_ID; ?>: 1,						
							autoPlay<?php echo $Rich_Web_VSlider_ID; ?>: 'false',			
							autoPlayDirection<?php echo $Rich_Web_VSlider_ID; ?>: 'forward',		
							autoPlayPause<?php echo $Rich_Web_VSlider_ID; ?>: 2000					
						}, options<?php echo $Rich_Web_VSlider_ID; ?>);

						jQuery(function(){
							if (jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).length > 0 && jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).length > 0) {
								var howManydate<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').length;
								var howManyissue<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').length;
								var currentDate = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).find('a.'+setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
								var currentIssue = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).find('li.'+setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
								var widthContainer = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.containerDiv<?php echo $Rich_Web_VSlider_ID; ?>).width();
								var heightContainer = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.containerDiv<?php echo $Rich_Web_VSlider_ID; ?>).height();
								var widthissue<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).width();
								var heightissue<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).height();
								var widthIssue = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').width();
								var heightIssue = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').height();
								var widthdate<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).width();
								var heightdate<?php echo $Rich_Web_VSlider_ID; ?>s = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).height();
								var widthDate = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').width();
								var heightDate = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').height();
								if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'horizontal') {
									jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).width(widthIssue*howManyissue<?php echo $Rich_Web_VSlider_ID; ?>s);
									jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).width(widthDate*howManydate<?php echo $Rich_Web_VSlider_ID; ?>s).css('marginLeft',widthContainer/2-widthDate/2);
									var defaultPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').indexOf('px')));
								} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'vertical') {
									jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).height(heightIssue*howManyissue<?php echo $Rich_Web_VSlider_ID; ?>s);
									jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).height(heightDate*howManydate<?php echo $Rich_Web_VSlider_ID; ?>s).css('marginTop',heightContainer/2-heightDate/2);
									var defaultPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').indexOf('px')));
								}
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').click(function(event){
									x=false;
										event.preventDefault();
										var whichIssue = jQuery(this).text();
										var currentIndex = jQuery(this).parent().prevAll().length;
										if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'horizontal') {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).animate({'marginLeft':-widthIssue*currentIndex},{queue:false, duration:setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>});
										} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'vertical') {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).animate({'marginTop':-heightIssue*currentIndex},{queue:false, duration:setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>});
										}
										jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').animate({'opacity':setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sTransparency<?php echo $Rich_Web_VSlider_ID; ?>},{queue:false, duration:setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>}).removeClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>).eq(currentIndex).addClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>).fadeTo(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sTransparencySpeed<?php echo $Rich_Web_VSlider_ID; ?>,1);
										if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 1) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										} else if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 2) {
											if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
											 	jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
											}
											else if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
											}
										} else {
											if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
											}
											else if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
											}
											else {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('slow');
											}
										}
										jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').removeClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
										jQuery(this).addClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
										if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'horizontal') {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).animate({'marginLeft':defaultPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s-(widthDate*currentIndex)},{queue:false, duration:'setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>'});
										} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'vertical') {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).animate({'marginTop':defaultPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s-(heightDate*currentIndex)},{queue:false, duration:'setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>'});
										}
								});

								jQuery("#timeline_r<?php echo $Rich_Web_VSlider_ID; ?>w").hover(function(){
								    y=true;
								    }, function(){
								    setTimeout(function(){
								    	if(x==false){
								    		y=false;
								    	}
								    },1000)
								});
								jQuery(".RW_IMGD<?php echo $Rich_Web_VSlider_ID; ?>,.rw_vid_tim<?php echo $Rich_Web_VSlider_ID; ?>_play").click(function(){
									x=true;
									y=true;
								})
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).bind('click', function(event){
									event.preventDefault();
									var currentIndex = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).find('li.'+setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>).index();
									if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'horizontal') {
										var currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').indexOf('px')));
										var currentIssueIndex = currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s/widthIssue;
										var currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').indexOf('px')));
										var currentIssueDate = currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s-widthDate;
										if(currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s <= -(widthIssue*howManyissue<?php echo $Rich_Web_VSlider_ID; ?>s-(widthIssue))) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).stop();
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').click();
										} else {
											if (!jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).is(':animated')) {
												// bugixed from 0.9.52: now the date<?php echo $Rich_Web_VSlider_ID; ?>s gets centered when there's too much date<?php echo $Rich_Web_VSlider_ID; ?>s.
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(currentIndex+1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
											}
										}
										y=true;
									} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'vertical') {
										var currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').indexOf('px')));
										var currentIssueIndex = currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s/heightIssue;
										var currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').indexOf('px')));
										var currentIssueDate = currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s-heightDate;
										if(currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s <= -(heightIssue*howManyissue<?php echo $Rich_Web_VSlider_ID; ?>s-(heightIssue))) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).stop();
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').click();
										} else {
											if (!jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).is(':animated')) {
												// bugixed from 0.9.54: now the date<?php echo $Rich_Web_VSlider_ID; ?>s gets centered when there's too much date<?php echo $Rich_Web_VSlider_ID; ?>s.
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(currentIndex+1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
											}
										}
										y=true;
									}
									if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 1) {
										jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
									} else if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 2) {
										if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										 	jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
										}
										else if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
										}
									} else {
										if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										}
										else if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										}
										else {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('slow');
										}
									}
								});
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).click(function(event){
									event.preventDefault();
									var currentIndex = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).find('li.'+setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>).index();
									if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'horizontal') {
										var currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').indexOf('px')));
										var currentIssueIndex = currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s/widthIssue;
										var currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginLeft').indexOf('px')));
										var currentIssueDate = currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s+widthDate;
										if(currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s >= 0) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).stop();
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').click();
										} else {
											if (!jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).is(':animated')) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(currentIndex-1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
											}
										}
										y=true;
									} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?> == 'vertical') {
										var currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').indexOf('px')));
										var currentIssueIndex = currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s/heightIssue;
										var currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s = parseInt(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').substring(0,jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).css('marginTop').indexOf('px')));
										var currentIssueDate = currentPositiondate<?php echo $Rich_Web_VSlider_ID; ?>s+heightDate;
										if(currentPositionissue<?php echo $Rich_Web_VSlider_ID; ?>s >= 0) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).stop();
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child .rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').click();
										} else {
											if (!jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).is(':animated')) {
												jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(currentIndex-1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
											}
										}
										y=true;
									}
									if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 1) {
										jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
									} else if(howManydate<?php echo $Rich_Web_VSlider_ID; ?>s == 2) {
										if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										 	jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
										}
										else if(jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>)) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('fast');
										}
									} else {
										if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										}
										else if( jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').hasClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>) ) {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
										}
										else {
											jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>+','+setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeIn('slow');
										}
									}
								});
								if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.arrowKeys<?php echo $Rich_Web_VSlider_ID; ?>=='true') {
									if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?>=='horizontal') {
										jQuery(document).keydown(function(event){
											if (event.keyCode == 39) {
										       jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).click();
										    }
											if (event.keyCode == 37) {
										       jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).click();
										    }
										});
									} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.orientation<?php echo $Rich_Web_VSlider_ID; ?>=='vertical') {
										jQuery(document).keydown(function(event){
											if (event.keyCode == 40) {
										       jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.nextButton<?php echo $Rich_Web_VSlider_ID; ?>).click();
										    }
											if (event.keyCode == 38) {
										       jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).click();
										    }
										});
									}
								}
								// default position startAt<?php echo $Rich_Web_VSlider_ID; ?>, added since 0.9.3
								// jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(setting<?php echo $Rich_Web_VSlider_ID; ?>s.startAt<?php echo $Rich_Web_VSlider_ID; ?>-1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
								// jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').eq(setting<?php echo $Rich_Web_VSlider_ID; ?>s.startAt<?php echo $Rich_Web_VSlider_ID; ?>-1).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').addClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.prevButton<?php echo $Rich_Web_VSlider_ID; ?>).fadeOut('fast');
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li').addClass(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>).fadeTo(setting<?php echo $Rich_Web_VSlider_ID; ?>s.issue<?php echo $Rich_Web_VSlider_ID; ?>sTransparencySpeed<?php echo $Rich_Web_VSlider_ID; ?>,1);		
								if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.autoPlay<?php echo $Rich_Web_VSlider_ID; ?> == 'true') {
									setInterval("autoPlay<?php echo $Rich_Web_VSlider_ID; ?>()", setting<?php echo $Rich_Web_VSlider_ID; ?>s.autoPlayPause<?php echo $Rich_Web_VSlider_ID; ?>);
								}
							}
						});
					};
					function autoPlay<?php echo $Rich_Web_VSlider_ID; ?>(){
						
						if(y==true){
							return
						}
						var currentDate = jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>).find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>.'+setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sSelectedClass<?php echo $Rich_Web_VSlider_ID; ?>);
						if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.autoPlayDirection<?php echo $Rich_Web_VSlider_ID; ?> == 'forward') {
							if(currentDate.parent().is('li:last-child')) {
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:first-child').find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
							} else {
								currentDate.parent().next().find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
							}
							y=true;
						} else if(setting<?php echo $Rich_Web_VSlider_ID; ?>s.autoPlayDirection<?php echo $Rich_Web_VSlider_ID; ?> == 'backward') {
							if(currentDate.parent().is('li:first-child')) {
								jQuery(setting<?php echo $Rich_Web_VSlider_ID; ?>s.date<?php echo $Rich_Web_VSlider_ID; ?>sDiv<?php echo $Rich_Web_VSlider_ID; ?>+' li:last-child').find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
							} else {
								currentDate.parent().prev().find('.rw_tim_nav€_item<?php echo $Rich_Web_VSlider_ID; ?>').trigger('click');
							}
						}
						setTimeout(function(){
							y=false;
						},100)
					}
				</script>
				<script type="text/javascript">
					jQuery(function(){
						var Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>").val();
						var Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>").val();
						var Rich_Web_MS_startAt<?php echo $Rich_Web_VSlider_ID; ?> = jQuery(".Rich_Web_MS_startAt<?php echo $Rich_Web_VSlider_ID; ?>").val();
						if(Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?> == "on"){
							Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>="true";
						}else{
							Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>="false";
						}
						setTimeout(function(){
							jQuery().timelinr<?php echo $Rich_Web_VSlider_ID; ?>({
								orientation<?php echo $Rich_Web_VSlider_ID; ?>: 	'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Type; ?>',
								issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	300,
								date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	100,
								arrowKeys<?php echo $Rich_Web_VSlider_ID; ?>: 		'true',
								startAt<?php echo $Rich_Web_VSlider_ID; ?>:			1,
								autoPlay<?php echo $Rich_Web_VSlider_ID; ?>: "false",
								autoPlayPause<?php echo $Rich_Web_VSlider_ID; ?>:Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>,
							})
						},100)
						jQuery().timelinr<?php echo $Rich_Web_VSlider_ID; ?>({
							orientation<?php echo $Rich_Web_VSlider_ID; ?>: 	'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Type; ?>',
							issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	300,
							date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	100,
							arrowKeys<?php echo $Rich_Web_VSlider_ID; ?>: 		'true',
							startAt<?php echo $Rich_Web_VSlider_ID; ?>:			1,
							autoPlay<?php echo $Rich_Web_VSlider_ID; ?>: Rich_Web_MS_SSh<?php echo $Rich_Web_VSlider_ID; ?>,
							autoPlayPause<?php echo $Rich_Web_VSlider_ID; ?>:Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>,
						})
						jQuery(window).resize(function(){
							jQuery().timelinr<?php echo $Rich_Web_VSlider_ID; ?>({
								orientation<?php echo $Rich_Web_VSlider_ID; ?>: 	'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_MS_Type; ?>',
								issue<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	300,
								date<?php echo $Rich_Web_VSlider_ID; ?>sSpeed<?php echo $Rich_Web_VSlider_ID; ?>: 	100,
								arrowKeys<?php echo $Rich_Web_VSlider_ID; ?>: 		'true',
								startAt<?php echo $Rich_Web_VSlider_ID; ?>:			1,
								autoPlay<?php echo $Rich_Web_VSlider_ID; ?>: 'false', 
								autoPlayPause<?php echo $Rich_Web_VSlider_ID; ?>:Rich_Web_MS_SShChT<?php echo $Rich_Web_VSlider_ID; ?>,
							})
						})
					});
				</script>
			<?php }
 		 	echo $after_widget;
 		}
	}
?>
<?php
/*
  Developer : Pedro Valverde
  Github: https://github.com/pkdor509/FanpageGallery
  Purpose : Display the public photo albums of a Facebook Page (Fanpage)
  Version : 1.0
*/
defined('is_running') or die('Not an entry point...');



class Special_FanpageGallery{
	function Special_FanpageGallery(){
		echo $this->create_fp_gallery();	
	}
	function create_fp_gallery(){
			   global $addonDataFolder;
			   $FpG_cfFileName = $addonDataFolder.'/config.php'; 
			   if (file_exists($FpG_cfFileName)) {
				 include $FpG_cfFileName;
			   } else {
				return "<div id='fanpage_gallery'><p>Somebody forgot configure the plugin x.xU ...please, go to ". common::Link('Admin_Fanpage_Gallery','Config')." first</p></div>";
 		      }	   
			   require_once 'src/facebook.php';
				$app_id = $FpGConfig['app_id'];
				$app_secret = $FpGConfig['app_secret'];
				$fnpgID = $FpGConfig['fnpgID'];
					
				$facebook = new Facebook(array(
						'appId' => $app_id,
						'secret' => $app_secret,
						'cookie' => true
				));
				$gallery = '<div id="fanpage_gallery">';
				if(isset($_GET['aid'])){
					$json = $facebook->api($_GET['aid'] .'?fields=photos.fields(source,name)');
					foreach($json['photos']['data'] as $photos){
							$cover = $photos['source'];
							$gallery .= "<div class='box photo col3'><a href='".$cover."' rel='lightbox[gal]' title='<pre>".$photos['name']."</pre>' alt='".$photos['name']."'><img src='".$cover."' /></a></div>\n";
					}	
				}else{
					$json = $facebook->api($fnpgID .'?fields=albums.fields(id,name,photos.fields(source,name)),name');
					foreach($json['albums']['data'] as $album){
						if ($album['name'] != "Cover Photos" and $album['name'] != "Profile Pictures"){
							$cover = $album['photos']['data'][0]['source'];
							$gallery .= "<div class='box photo col3'><a href='?aid=".$album['id']."' title='".$album['name']."' alt='".$album['name']."'><img src='".$cover."' /></a></div>\n";
						}
					}		
				}				
					
				return $gallery.'</div>';	
	}
}

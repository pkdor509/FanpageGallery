<?php
/*
  Developer : Pedro Valverde
  GIT : http://github.com/pkdor509/lalala
  Purpose : Display the public photo albums of a Facebook Page (Fanpage)
  Version : 1.0
*/
defined('is_running') or die('Not an entry point...');

function FanpageGallery_getsections($sections){
  $sections['fnpg_gallery']['label'] = 'Fanpage Gallery';
  return  $sections;
}

function FanpageGallery_sectiontocontent($sections){
  if ($sections['type'] == 'fnpg_gallery') {
	 //common::ShowingGallery();
     require_once('Special_FanpageGallery.php');
     $sections['content'] = Special_FanpageGallery::create_fp_gallery();
  }	
  return $sections;
}
?>
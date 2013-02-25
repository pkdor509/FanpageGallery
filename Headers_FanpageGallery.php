<?php
/*  
  Developer : Pedro Valverde
  Github: https://github.com/pkdor509/FanpageGallery
  Purpose : Display the public photo albums of a Facebook Page (Fanpage)
  Version : 1.0
*/

defined('is_running') or die('Not an entry point...');
		
function fanpagegal_prep_headers($js_files){

	global $page,$addonFolderName;
	$page->head_js[] = '/data/_addoncode/'.$addonFolderName.'/js/masonry.min.js';
	$page->head_js[] = '/data/_addoncode/'.$addonFolderName.'/js/lightbox.js';
	$page->head_js[] = '/data/_addoncode/'.$addonFolderName.'/js/getGal.js';
	$page->css_user[] =  '/data/_addoncode/'.$addonFolderName.'/css/lightbox.css';
	$page->css_user[] =  '/data/_addoncode/'.$addonFolderName.'/css/style.css';
	}

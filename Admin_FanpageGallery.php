<?php
/*  
  Developer : Pedro Valverde
  Github: https://github.com/pkdor509/FanpageGallery
  Purpose : Display the public photo albums of a Facebook Page (Fanpage)
  Version : 1.0
*/

defined('is_running') or die('Not an entry point...');

class Admin_FanpageGallery{
	function Admin_FanpageGallery(){
	//Config,config
	   global $addonDataFolder;
	   $FpG_cfFileName = $addonDataFolder.'/config.php'; 
	   if (isset($_POST['store'])) {
	      $FpGConfig['app_id'] = $_POST['app_id'];
	      $FpGConfig['app_secret'] = $_POST['app_secret'];
	      $FpGConfig['fnpgID'] = $_POST['fnpgID'];
          gpFiles::SaveArray($FpG_cfFileName,'FpGConfig',$FpGConfig);
		  error_log("Save array : $FpG_cfFileName");
	   } 
	   if (file_exists($FpG_cfFileName)) {
	     include $FpG_cfFileName;
	   } else {
	      $FpGConfig['app_id'] = 'APPLICATION ID';
	      $FpGConfig['app_secret'] = 'APPLICATION SECRECT CODE';
	      $FpGConfig['fnpgID'] = 'PAGE ID';
	   }
	   echo "<h1>FanPage Gallery - </h1>by <a href='http://pkchango.com'>pkdor509</a> - <a href='https://github.com/pkdor509/FanpageGallery.git'>Github repo</a><br/>
	   <br/>
		<ol>
		<li>Go to <a href='http://developers.facebook.com/'>Facebook Developers</a> and create an app to get an Application ID and Application Secret</li>
		<li>Go to http://graph.facebook.com/YOUR_PAGE_NAME and get the ID of your Fanpage</li>
		<li>Enter the 3 ID codes and... thats all!! :D</li>
		</ol>";
	   echo "<form method='post'><p><label style='width:150px;'>Application ID </label><input type='text' name='app_id' value='{$FpGConfig['app_id']}'></p>
	   <p><label style='width:150px;'>Application Secret Code </label><input type='text' name='app_secret' size='50' value='{$FpGConfig['app_secret']}'></p>
	   <p><label style='width:150px;'>Facebook Page ID </label><input type='text' name='fnpgID' value='{$FpGConfig['fnpgID']}'></p>
	   <p><center><input type='submit' name='store' value='Save'></center></p>
	   </form>";
	   
	  
	}
}

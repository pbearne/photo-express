<?php
namespace photo_express;
// Make sure that we are uninstalling
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

require_once plugin_dir_path(__FILE__).'class-google-photo-access.php';
require_once plugin_dir_path(__FILE__).'class-settings-storage.php';

//uninstalls the plugin and delete all options / revoking oauth access
$photo_access = new Google_Photo_Access();
$photo_access->uninstall();
$configuration = new Settings_Storage();
if (is_multisite()){
	$configuration->delete_site_options();
}else{
	$configuration->delete_options();
}
?>
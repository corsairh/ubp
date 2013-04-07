<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Accesspoint_Uninstall {

	/**
	* put your comment there...
	* 
	*/
	public function _uninstall() {
		// Load uninstaller controller.
		$loader =& UBP_Lib_Classloader::getInstance();
		$loader->getInstanceOf('controller', 'uninstall')
		// Fire uninstall action.
		->doAction('uninstall');
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function bind() {
		// Initiliaze.
		$loader =& UBP_Lib_Classloader::getInstance();
		$settings = $loader->getInstanceOf('settings');
		// Register uninstall hook only if installed.
		if ($settings->isInstalled()) {
			register_uninstall_hook(UBP::FILE, array($this, '_uninstall'));
		}
	}

} // End class.
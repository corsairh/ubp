<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Accesspoint_Install extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	*/
	public function bind() {
		// Get loader instance.
		$loader =& $this->getLoader();
		// Get UBP Settings class instance.
		$appSetting = $loader->getInstanceOf('setting', 'application');
		// Check if need to be installed!
		if (!$appSetting->isInstalled()) {
			// Load installer controller.
			$loader->getInstanceOf('controller', 'install')
			// Dispatch install action
			->doAction('install');
		}
		return true;
	}
	
} // End class.
<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Accesspoint_Log extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $snaps = array();
	
	/**
	* put your comment there...
	* 
	*/
	public function _log() {
		// Process only if there is any error snapped!
		if (!empty($this->snaps)) {
			// load controller to handle the log process.
			$loader =& $this->getLoader();
			$loader->getInstanceOf('controller', 'log')
			// Log.
			->logAction($this->snaps);
		}
	}

	/**
	* put your comment there...
	* 
	* @param mixed $code
	* @param mixed $message
	* @param mixed $file
	* @param mixed $line
	* @param mixed $cotext
	*/
	public function _snap($code, $message, $file, $line, $context) {
		// Take a snap only if the error is laying under a Plugin!
		if ($pluginFile = UBP_Wordpress_Plugin_Helper::isPluginFile($file)) {
			// Use Plugin relative file instead of the Absolute.
			$file = $pluginFile['rel'];
			// Hold a snap!
			$this->snaps[] = compact('code', 'message', 'file', 'line', 'context');			
		}		
		// UBP never handle error, its just log it!
		return FALSE;
	}
	
	/**
	* Listen to PHP notices and warnings.
	* 
	* @return Boolean TRUE if successed, FALSE otherwise
	*/
	public function bind() {
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		$loader =& $this->getLoader();
		$appSettings = $loader->getInstanceOf('setting', 'application');
		// Run only if installed.
		if ($appSettings->isInstalled()) {
			// Pre-Load Plugin Helper class as it cannt be loaded under
			// error handling callback!
			$loader->importClass('UBP_Wordpress_Plugin_Helper');
			// Take issue snap!
			set_error_handler(array($this, '_snap'), E_ALL | E_STRICT);
			// Log snapped issues!
			register_shutdown_function(array($this, '_log'));
		}
		return TRUE;
	}
	
} // End class.
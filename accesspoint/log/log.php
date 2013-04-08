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
	protected $controller = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $controllerRequest = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $code
	* @param mixed $message
	* @param mixed $file
	* @param mixed $line
	* @param mixed $cotext
	*/
	public function _log($code, $message, $file, $line, $context) {
		// Read error.
		$issue = compact('code', 'message', 'file', 'line', 'context');
		// Dispatch the call to controller.
		$this->controllerRequest->set('issue', $issue, 'internal');
		$this->controller->doAction('log');
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
			// Cache controller object to be used when error triggered.
			$this->controller = $loader->getInstanceOf('controller', 'log');
			// Create register type to communicate internally and hold #refrence to the controller object.
			$this->controllerRequest =& $this->controller->getRequest()->createRegisterType('internal');
			// Register error log method.
			set_error_handler(array($this, '_log'), E_ALL | E_STRICT);
		}
		return TRUE;
	}
	
} // End class.
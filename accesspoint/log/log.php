<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Accesspoint_Log {
	
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
		$error = compact('code', 'message', 'file', 'line', 'context');
		// Dispatch the call to controller.
		$this->controllerRequest->set('error', $error, 'post');
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
		// Run only if not in backup mode!
		if ($bind = !$request->get('ubp_backup_key')) {
			// Get loader instance.
			$loader =& UBP_Lib_Classloader::getInstance();
			// Cache controller object to be used when error triggered.
			$this->controller = $loader->getInstanceOf('controller', 'log');
			$this->controllerRequest =& $this->controller->getRequest();
			// Register error log method.
			set_error_handler(array($this, '_log'), E_ALL | E_STRICT);
		}
		return $bind;
	}
	
} // End class.
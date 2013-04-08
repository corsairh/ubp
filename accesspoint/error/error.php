<?php
/**
* Access point code for detecting Plugins error!
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* Provide error access point code from which 
* that UBP plugin can detect errors caused by other Plugins.
* 
* @author Ahmed Said
*/
class UBP_Accesspoint_Error extends UBP_Lib_Object {

	/**
	* PHP registered shutdown function callback.
	* 
	* This function is registered as PHP shutdown function.
	* it then, when shutdown, look for errors, if found
	* the Error controller will be loaded to do the job.
	* 
	* @return void
	*/
	public function _error() {
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		// Only load error handling codes/files when shutdown with errors.
		if ($error = error_get_last()) {
			// Handle only errors!
			switch ($error['type']) {
				case E_COMPILE_ERROR:
				case E_CORE_ERROR:
				case E_ERROR:
				case E_USER_ERROR:
					// Instntiate error controller to handle the request.
					$error = new UBP_Controller_Error();
					$error->doAction('error');
				break;
			}
		}
	}
		
	/**
	* Look for errors!
	* 
	* @return bool TRUE when success, FALSE otherwise.
	*/
	public function bind() {
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		// Handling errors!
		register_shutdown_function(array($this, '_error'));
		// Always successed!
		return TRUE;
	}

} // End class.
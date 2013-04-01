<?php
/**
* 
*/

/**
* 
*/
class UBP_Accesspoint_Error {

	/**
	* put your comment there...
	* 
	*/
	public function _error() {
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
	* Do listen to Errors!
	* 
	*/
	public function bind() {
		// Initialize.
		$bind = false;
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		// Run only if not in backup mode!
		if ($bind = !$request->get('ubp_backup_key')) {
			// Handling errors!
			register_shutdown_function(array($this, '_error'));
		}
		return $bind;
	}

} // End class.
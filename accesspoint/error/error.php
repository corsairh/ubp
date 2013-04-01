<?php
/**
* 
*/

/**
* 
*/
class UBP_Accesspoint_Error {
	
	/**
	* Do listen to Errors!
	* 
	*/
	public function bind() {
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		// Run only if not in backup mode!
		if (!$request->get('ubp_backup_key')) {
			// Handling errors!
			register_shutdown_function(array($this, '_error'));
		}
	}
	
} // End class.
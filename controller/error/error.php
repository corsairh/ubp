<?php
/**
* 
*/

/**
* 
*/
class UBP_Controller_Error extends UBP_Lib_Mvc_Controller {

	/**
	* put your comment there...
	* 
	*/
	public function _error() {
		// Initialize!
		$result = false;
		$model =& $this->getModel();
		// Read last error!
		$error = error_get_last();
		// Handle only errors!
		switch ($error['type']) {
			case E_COMPILE_ERROR:
			case E_CORE_ERROR:
			case E_ERROR:
			case E_USER_ERROR:
				// Take action only if the error produced by Plugin!
				if ($plugin = $model->getPluginFromErrorFile($error['file'])) {
					// Get Backupkey.
					$key = $model->genBackupKey($plugin);
					// Send administrator mail with backup link!!
					$model->eMailAdmin($key, $plugin);
					// return FALSE to say 'Handled'
					$result = true;
				}
				break;
		}
		return $result;
	}
	
	/**
	* Do listen to Errors!
	* 
	*/
	public function bind() {
		// Run only if not in backup mode!
		if (!$this->getRequestParameter('ubp_backup_key')) {
			// Handling errors!
			register_shutdown_function(array($this, '_error'));
		}
	}
	
} // End class.
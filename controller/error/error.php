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
	public function error() {
		// Initialize!
		$model =& $this->getModel();
		// Read last error!
		$error = error_get_last();
		// Take action only if the error produced by Plugin!
		if ($plugin = $model->getPluginFromErrorFile($error['file'])) {
			// Generate backup key, send mail only if there is no key exists for the same Plugin!
			if ($key = $model->genBackupKey($plugin)) {
				// Send administrator mail with backup link!!
				$model->eMailAdmin($key, $plugin);
			}
		}
	}

} // End class.
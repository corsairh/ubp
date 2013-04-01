<?php
/**
* 
*/

/**
* 
*/
class UBP_Controller_Backup extends UBP_Lib_Mvc_Controller {

	/**
	* put your comment there...
	* 
	*/
	public function bind() {
		// Initialize.
		$model =& $this->getModel();
		// Check if needed to backup!
		if ($key = $this->getRequestParameter('ubp_backup_key')) {
			// Check if valid key + fetch corresponding plugin!
			if (!$plugin = $model->getPlugin($key)) {
				echo 'Access Denied!';
			}
			else {
				// Disable the requested Plugin.
				print_r($plugin);
			}
		}
	}
	
} // End class.

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
	public function backup() {
		// Initialize.
		$model =& $this->getModel();
		// Check if needed to backup!
		if ($hash = $this->getRequest()->get('ubp_backup_key')) {
			// Check if valid key + fetch corresponding Plugin/Key!
			if (!$key = $model->getKey($hash)) {
				echo 'Access Denied!';
			}
			else {
				// Key is expired!
				if (!$model->isValidKey($key)) {
					echo "Your Key is expired!";
				}
				else {
					// Import files need for using Wordpress APIs!
					require_once ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
					// Disable plugin!!
					deactivate_plugins($key['plugin']['RelFile'], true);
					echo "Plugin deactivated! Please refresh the page!";
				}
			}
		}
	}
	
} // End class.

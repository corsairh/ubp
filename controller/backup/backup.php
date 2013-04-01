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
		$keys = UBP_Lib_Backupkeys::getInstance();
		// Check if needed to backup!
		if ($hash = $this->getRequest()->get('ubp_backup_key')) {
			// Check if valid key + fetch corresponding Plugin/Key!
			if (!$key = $keys->getHashKey($hash)) {
				echo 'Access Denied!';
			}
			else {
				// Key is expired!
				if (!$keys->isValid($key)) {
					echo "Invalid key!";
				}
				else {
					// Disable plugin!!
					require_once ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
					deactivate_plugins($key['plugin']['RelFile'], true);
					// Delete Backup key!
					if ($keys->release($key)) {
						// Save into database!
						$keys->save();
					}
					// User Notification.
					echo "Plugin deactivated! Reloading the page will cause the site to load without the arget Plugin!";
				}
			}
		}
	}
	
} // End class.

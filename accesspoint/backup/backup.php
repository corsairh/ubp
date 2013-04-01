<?php
/**
* 
*/

/**
* 
*/
class UBP_Accesspoint_Backup {

	/**
	* put your comment there...
	* 
	*/
	public function bind() {
		// Initialize.
		$request =& UBP_Lib_Request::getInstance();
		// Run only if not in backup mode!
		if ($key = $request->get('ubp_backup_key')) {
			// Backup site!
			$controller = new UBP_Controller_Backup();
			$controller->doAction('backup');
		}
		return $key ? true : false;
	}
	
} // End class.

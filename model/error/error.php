<?php
/**
* Internal 'Error' functios class.
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* Model for handling and detecting Errors.
* 
* @author Ahmed Said
*/
class UBP_Model_Error extends UBP_Lib_Object {

	/**
	* Generate backup key.
	* 
	* Generate key for a Plugin only if there
	* is no key exists for the same Plugin, results to
	* send error mail until the key is expired.
	* 
	* The main purpose to don't bother site admin with 
	* many error mail everytime a page is loaded.
	* 
	* @param Array Plugin data.
	* @return Array Backup Key with @plugin data injected.
	*/
	public function genBackupKey($plugin) {
		// Initialize.
		$key = FALSE;
		$keys =& UBP_Lib_Backupkeys::getInstance();
		// Generate key only if there is NO, VALID key exists!
		if ((!$dbKey = $keys->getPluginKey($plugin['RelFile'])) || !$keys->isValid($dbKey)) {
			// Generate new key or override an exists invalid key!
			$key = $keys->generate($plugin);
			// Saving new key!
			$keys->save();
		}
		return $key;
	}

} // End class.

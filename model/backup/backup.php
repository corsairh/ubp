<?php
/**
* 
*/

/**
* 
*/
class UBP_Model_Backup {
	
	/**
	* 
	*/
	const ACCESS_KEY = 'ubp_secure_access_key';
	
	/**
	* put your comment there...
	* 
	* @param mixed $key
	*/
	public function getPlugin($hash) {
		// Initialize.
		$plugin = null;
		// Read all keys.
		$keys = get_option(self::ACCESS_KEY);
		if (is_array($keys)) {
			foreach ($keys as $key) {
				if ($key['hash'] == $hash) {
					$plugin = $key['plugin'];
					break;
				}
			}
		}
		return $plugin;
	}
	
} // End class.

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
	* 
	*/
	const KEY_LIFE_TIME_SEC = 86400;
	
	/**
	* put your comment there...
	* 
	* @param mixed $key
	*/
	public function getKey($hash) {
		// Initialize.
		$key = null;
		// Read all keys.
		$keys = get_option(self::ACCESS_KEY, array());
		foreach ($keys as $sKey) {
			if ($sKey['hash'] == $hash) {
				$key = $sKey;
				break;
			}
		}
		return $key;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $hash
	*/
	public function isValidKey($key) {
		print_r($key);
		echo "{$key['time']}<br>";
		// Check if the key generation time has passed the LIFE_TIME seconds.
		return ((time() - $key['time']) < self::KEY_LIFE_TIME_SEC);
	}
	
} // End class.

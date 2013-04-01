<?php
/**
* 
*/


/**
* 
*/
class UBP_Lib_Backupkeys {
	
	/**
	* 
	*/
	const KEY_LIFE_TIME_SEC = 86400;
	
	/**
	* 
	*/
	const KEYS = 'ubp_secure_access_key';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $keys;
	
	/**
	* put your comment there...
	* 
	*/
	protected function __construct() {
		// Cache Backup keys!
		$this->keys = get_option(self::KEYS, array());
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $pluginFile
	* @param mixed $key
	*/
	public function generate($plugin) {
		// MD5 for time with the unique salt!
		$key['hash'] = md5(time() . AUTH_SALT);
		$key['time'] = time();
		$key['plugin'] = $plugin;
		// Add key database, saved by name!
		$this->keys[$plugin['RelFile']] = $key;
		return $key;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $hash
	*/
	public function getHashKey($hash) {
		// Initialize.
		$key = null;
		// Search keys for the provided hash!
		foreach ($this->keys as $sKey) {
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
	*/
	public static function & getInstance() {
		// Don't allow multiple instances!
		static $instance = null;
		// Instantiate!
		if (!$instance) {
			$instance = new UBP_Lib_Backupkeys();
		}
		return $instance;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $rFile
	*/
	public function getPluginKey($rFile) {
		return isset($this->keys[$rFile]) ? $this->keys[$rFile] : FALSE;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $key
	*/
	public function isValid($key) {
		// Check if the key generation time has passed the LIFE_TIME seconds.
		return ((time() - $key['time']) < self::KEY_LIFE_TIME_SEC);
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $key
	*/
	public function release($key) {
		// Initialize.
		$released = false;
		// Code it well!
		if (isset($key['plugin']['RelFile'])) {
			// Check weather the key is exists!
			$pluginRelFile = $key['plugin']['RelFile'];
			if (isset($this->keys[$pluginRelFile])) {
				// Remove from list!
				unset($this->keys[$pluginRelFile]);
				// Notify!
				$released = true;
			}
		}
		return $released;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function save() {
		// Save into database.
		update_option(self::KEYS, $this->keys);
		// Chaining!
		return $this;
	}
	
} // End class.

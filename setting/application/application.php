<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Setting_Application extends UBP_Lib_Object {
	
	/**
	* 
	*/
	const WP_SETTING_OPTION_NAME = 'ubp_settings';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $settings = null;
	
	/**
	* 
	*/
	public function __construct() {
		// Cache settings.
		$this->settings = get_option(self::WP_SETTING_OPTION_NAME, array());
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getInstalledVersionNumber() {
		return isset($this->settings['dbVersion']) ? $this->settings['dbVersion'] : null;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function isInstalled() {
		// Read installed version.
		$installedDBVersion = $this->getInstalledVersionNumber();
		// TRUE if both current UBP DB version is the same as the instaleld (stored in DB).
		return ($installedDBVersion == UBP::DB_VERSION);
	}

	/**
	* put your comment there...
	* 
	*/
	public function save() {
		// Save all changes made to settings.
		update_option(self::WP_SETTING_OPTION_NAME, $this->settings);
		// Chaining.
		return $this;
	}

	/**
	* 
	* 
	*/
	public function setVersionNumber() {
		// Initialize.
		$version = UBP::DB_VERSION;
		// Complain if trying to update it with the same value!
		$oldVersion = $this->getInstalledVersionNumber();
		if ($oldVersion == $version) {
			throw new Exception('Trying to change version number to the same value! Operations recycle may occurred!!');
		}
		// Change version number.
		$this->settings['dbVersion'] = $version;
		// Chaining.
		return $this;
	}

} // End class.
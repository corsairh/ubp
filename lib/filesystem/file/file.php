<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Filesystem_File extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $file = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $file
	* @return UBP_Lib_Filesystem_File
	*/
	public function __construct($file) {
		$this->file = $file;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $file
	*/
	public static function & getInstance($file) {
		// Instantiate
		$instance = new UBP_Lib_Filesystem_File($file);
		return $instance;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function readAll() {
		return file_get_contents($this->file);
	}

} // End class.
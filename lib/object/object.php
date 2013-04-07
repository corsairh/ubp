<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $loader = null;
	
	/**
	* put your comment there...
	* 
	*/
	protected function __construct() {
		// Initiliaze.
		$this->loader =& UBP_Lib_Classloader::getInstance();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getClassFileName() {
		// Get class components.
		$components = $this->getLoader()->getClassNamePathComponent($this);
		// Concat File name with extension.
		$fileName = "{$components->file}.{$components->extension}";
		return $fileName;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getClassName() {
		// Get class name from current instance.
		return $this->getLoader()->getClassNamePathComponent($this)->file;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getLoader() {
			return $this->loader;
	}
	
} // End class.